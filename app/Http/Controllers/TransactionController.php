<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Plan;
use App\Models\Property;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
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
                'property_id'  => $request->property_id,
                'description' => $request->description,
                'amount' => (int) $request->amount,
                'status' => Transaction::STATUS_NOTPAID
            ]);

            $user = null;

            if(Auth::check()) {
                $user = Auth::user();
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

            return redirect()->route('property.show',[strtolower(preg_replace('/[ ,]+/', '-',$property->title.' '.$property->houseType->name.' '.$property->id))])->withSuccess('Billing information have been submitted successfully!');
        } catch (\Exception $exception) {
            return back()->withError('An error has occurred failed to send information');
        }
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
