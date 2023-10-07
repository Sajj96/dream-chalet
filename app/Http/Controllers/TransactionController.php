<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Plan;
use App\Models\Property;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function checkout(Request $request)
    {
        if ($request->method() == 'GET') {

            if ($request->exists('property') && ($request->exists('plan') == false || $request->get('plan') == null )) {
                return redirect()->back()->withErrors('Please select subscription plan to continue!');
            }

            if($request->exists('inquiry') && $request->get('inquiry') == null) {
                return redirect()->back();
            }

            $price = 0;
            $inquiry = (object) [];

            if($request->has('plan')) {
                $plan = Plan::find((int) $request->get('plan'));
                $property = Property::find((int) $request->get('property'));
                $price = $plan->price;
            }

            if($request->has('inquiry')) {
                $inquiry_id = (int) $request->get('inquiry');
                $inquiry = Inquiry::find($inquiry_id);
                $property = Property::find($inquiry->property_id);
                $price = $inquiry->amount + $inquiry->delivery_fee;
            }

            return view('pages.transactions.checkout', [
                'inquiry' => $inquiry,
                'price' => $price,
                'property' => $property
            ]);
        }


    }
}
