<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $input = $request->all();
        
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'],'password' => $input['password']))){
            $user = User::where('email', $request->email)->first();
            if(auth()->user()->roles == 'Admin'){
                return redirect()->route('admins.dashboard');
            }elseif(auth()->user()->roles == 'Petugas'){
                return redirect()->route('petugas.dashboard');
            }elseif(auth()->user()->roles == 'User'){
                return redirect()->route('user.home');
            }
        }
    }
}
