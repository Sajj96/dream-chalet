<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected $mobile;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->mobile = $this->findUser();
    }

    public function findUser()
    {
        $login = request()->input('login');
 
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
 
        request()->merge([$fieldType => $login]);
 
        return $fieldType;
    }
 
    public function mobile()
    {
        return $this->mobile;
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'login'    => 'required',
            'password' => 'required',
        ]);

        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL ) 
            ? 'email' 
            : 'mobile';

        $request->merge([
            $login_type => $request->input('login')
        ]);

        $remember = $request->has('remember') ? true : false;


        $login_data = $request->input('login');

        if (Auth::attempt([$login_type => $login_data, 'password' => $request->input('password'), 'status' => User::USER_VERIFIED, 'deleted_at' => NULL], $remember)) {
            if(Auth::user()->user_type == User::ADMIN_USER) {
                return redirect()->route('dashboard');
            }
            return redirect()->intended($this->redirectTo);
        }

        return redirect()->back()
            ->withInput()
            ->withErrors([
                'phone' => 'Incorrect Phone number',
                'login' => 'These credentials do not match our records',
                'password' => 'Incorrect Password'
            ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        Session::invalidate();

        Session::regenerateToken();

        return redirect('/');
    }
}
