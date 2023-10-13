<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SMSService;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    // use SendsPasswordResetEmails;
     /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {
         return view('auth.passwords.email');
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'email'     => 'required_if:phone,null',
              'phone'     => 'required_if:email,null',
              'user_type' => 'required',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email,
              'phone' => $request->phone,
              'user_type' => $request->user_type, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
  
            if(!empty($request->phone)) {
                $resetPassword = app(SMSService::class);
                $resetPassword->resetPassword(str_replace('+','',$request->phone), $token);
            } else {
                Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
                    $message->to($request->email);
                    $message->subject('Reset Password');
                });
            }
          
  
          return back()->with('success', 'We have texted/e-mailed your password reset link!');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) { 
         return view('auth.passwords.reset', ['token' => $token]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required_if:phone,null',
              'phone' => 'required_if:email,null',
              'user_type' => 'required',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);
  
          $updatePassword = DB::table('password_resets')
                              ->where('token' , $request->token)->orWhere([
                                'phone' => $request->phone,
                                'email' => $request->email,
                              ])
                              ->where('user_type', $request->user_type)
                              ->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
          
          $email = $request->email ?? '';
          $phone = $request->phone ?? '';
          $user = User::where('email', $email)->orWhere('phonenumber', $phone)
                      ->update(['password' => Hash::make($request->password)]);
 
          DB::table('password_resets')->where(['phone'=> $request->phone])->delete();
  
          return redirect('/login')->with('success', 'Your password has been changed!');
      }
}
