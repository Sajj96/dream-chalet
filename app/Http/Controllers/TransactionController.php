<?php

namespace App\Http\Controllers;

use App\DataTables\TransactionsDataTable;
use App\Models\Inquiry;
use App\Models\Plan;
use App\Models\Property;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\User;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index(TransactionsDataTable $datatable)
    {
        return $datatable->render('pages.dashboard.transactions.index');
    }

    public function view($id)
    {
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return back()->withError('Transaction not found');
        }

        $property = Property::whereId($transaction->property_id)->where('deleted_at', NULL)->first();
        if (!$property) {
            return back()->withError('Property not found');
        }

        return view('pages.dashboard.transactions.view', [
            'transaction' => $transaction,
            'property' => $property
        ]);
    }

    public function checkout(Request $request)
    {
        if ($request->method() == 'GET') {

            $property = Property::find((int) $request->input('property'));

            if ($request->exists('property') && ($request->exists('plan') == false || $request->get('plan') == null )) {
                return redirect()->route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$property->title.' '.$property->houseType->name.' '.$property->id))])->withErrors('Please select subscription plan to continue!');
            }

            if($request->exists('inquiry') && $request->get('inquiry') == null) {
                return redirect()->route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$property->title.' '.$property->houseType->name.' '.$property->id))])->withErrors('Something is missing in your request. Please try again!');
            }

            $price = 0;
            $inquiry = (object) [];
            $plan = null;

            if($request->has('plan')) {
                $plan = Plan::find((int) $request->get('plan'));

                if(!$plan) {
                    return back()->withErrors('Plan not found');
                }

                $type = Transaction::TYPE_SUBSCRIPTION;
                $price = $plan->price;
            }

            if($request->has('inquiry')) {
                $inquiry_id = (int) $request->get('inquiry');
                $inquiry = Inquiry::find($inquiry_id);

                if(!$inquiry) {
                    return back()->withErrors('Information not found');
                }

                $property = Property::find($inquiry->property_id);
                $type = Transaction::TYPE_INQUIRY;
                $price = $inquiry->amount + $inquiry->delivery_fee;
                
            }

            return view('pages.transactions.checkout', [
                'inquiry' => $inquiry,
                'price' => $price,
                'property' => $property,
                'plan' => $plan,
                'type' => $type
            ]);
        }
    }

    public function add(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'type'            => 'required|string',
            'full_name'       => 'required|string',
            'email'           => 'required|string',
            'mobile'          => 'required|string',
            'street'          => 'required|string',
            'ward'            => 'required|string',
            'city'            => 'required|string',
            'country'         => 'required|string'
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        try {

            $property = Property::whereId($request->property_id)->where('deleted_at', NULL)->first();

            if(!$property) {
                return back()->withError('Property not found');
            }

            $transaction = Transaction::create([
                'type'         => $request->type,
                'property_id'  => $property->id,
                'description' => $request->description,
                'reference_no' => "DCE" . $this->getToken(12),
                'amount' => (float) $request->amount,
                'status' => Transaction::STATUS_NOTPAID
            ]);

            $user = null;

            if(Auth::check()) {
                $user = Auth::user();
                $user->street    = $request->street;
                $user->ward      = $request->ward;
                $user->city      = $request->city;
                $user->country   = $request->country;
                $user->save();
            } else {
                $user = User::updateOrCreate(
                    [ 'email' => $request->email ],
                    [
                        'name' => $request->full_name,
                        'email' => $request->email,
                        'mobile' => $request->mobile,
                        'password' => Hash::make($request->password),
                        'user_type' => User::NORMAL_USER,
                        'street'    => $request->street,
                        'ward'      => $request->ward,
                        'city'      => $request->city,
                        'country'   => $request->country,
                        'status'  => User::USER_VERIFIED, 
                    ]
                );
            }

            $transaction->update([
                'user_id' => $user->id
            ]);

            if($transaction->type == Transaction::TYPE_SUBSCRIPTION) {
                $plan = Plan::find($request->plan_id);

                Subscription::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'plan_id' => $plan->id,
                        'property_id' => $request->property_id
                    ],
                    [
                        'user_id'     => $user->id,
                        'plan_id'     => $plan->id,
                        'property_id' => $request->property_id,
                        'ends_on'      => date('Y-m-d H:i:s')
                    ]
                );
            }

            $reference = $transaction->reference_no;

            $order = (object) array(
                "name" => $property->title,
                "price" => (float) $request->amount,
                "user" => $user
            );

            // $payment = app(PaymentService::class);
            // $response = $payment->submitPayment($order, $reference);

            // $order_id = $response->getData()->order_tracking_id;
            // $redirect_url = $response->getData()->redirect_url;

            // $transaction->payment_reference = $order_id;

            // if ($response->getStatusCode() == 200 && $response->statusText() == "OK") {
            //     return $redirect_url;
            // }

            return redirect()->route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$property->title.' '.$property->houseType->name.' '.$property->id))])->withSuccess('Billing information have been submitted successfully!');
        } catch (\Exception $exception) {
            return back()->withError('An error has occurred failed to send information');
        }
    }

    public function callback(Request $request)
    {
        try {

            $transaction = Transaction::where('reference_no', $request->get("OrderMerchantReference"))->first();

            if ($transaction) {
                $payment = app(PaymentService::class);
                $response = $payment->getTransactionStatus($transaction->payment_reference)->getData();

                $transaction->amount = $response->amount;
                $transaction->payment_method = $response->payment_method;
                $transaction->currency = $response->currency;
                $transaction->message = $response->description;
                if ($response->status_code == 1) {
                    $transaction->status = Transaction::STATUS_PAID;
                    if ($transaction->type == "Inquiry") {
                    }

                    if ($transaction->type == "Subscription") {
                        $property = Property::find($transaction->product_id);
                        $property->is_featured = 1;
                        $property->update();
                    }
                } else if ($response->status_code == 2) {
                    $transaction->status = Transaction::STATUS_FAILED;
                } else {
                    $transaction->status = Transaction::STATUS_NOTPAID;
                } 

                return redirect()->back()->withSuccess('Payment received successfully!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function getToken($len)
    {
        $characters = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $len; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }

        return $string;
    }

    public function delete(Request $request) 
    {
        try {
            if ($request->has('transaction_id')) {
                $transaction = Transaction::find($request->input('transaction_id'));
                $transaction->delete();
                return redirect('/dashboard/transactions')->withSuccess('Transaction deleted successfully');
            }
        } catch(\Exception $exception) {
            Log::error($exception->getMessage());
        }
        return redirect('/dashboard/transactions')->withError('Transaction could not be deleted');
    }
}