<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        $subscriptions = $user->subscriptions()->whereDate('subscriptions.ends_on', ">=", date('Y-m-d'))->get();

        if($request->method() == "GET") {
            return view('pages.users.profile', [
                'subscriptions' => $subscriptions
            ]);
        }

        try {

            $user->name = $request->full_name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            if(!empty($request->password)) {
                $user->password  = Hash::make($request->password);
            }
            $user->street    = $request->street;
            $user->ward      = $request->ward;
            $user->city      = $request->city;
            $user->country   = $request->country;
            if($user->update()) {
                return back()->withSuccess('Profile updated successfully!');
            }
        } catch (\Exception $exception) {
            return back()->withSuccess('An error has occurred failed to update information!');
        }
    }
}
