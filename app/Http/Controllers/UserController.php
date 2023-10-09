<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(UsersDataTable $datatable)
    {
        return $datatable->render('pages.dashboard.users.index');
    }

    public function view($id)
    {
        $user = User::find($id);
        if (!$user) {
            return back()->withError('User not found');
        }

        $orders = $user->inquiries;

        return view('pages.dashboard.users.view', [
            'user' => $user,
            'orders' => $orders
        ]);
    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        $subscriptions = $user->subscriptions()->whereDate('subscriptions.ends_on', ">=", date('Y-m-d'))->get();
        $orders = $user->inquiries;

        if($request->method() == "GET") {
            return view('pages.users.profile', [
                'subscriptions' => $subscriptions,
                'orders' => $orders
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
