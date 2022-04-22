<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //função autenticar se utilizador tiver a conta activa
    public function authenticate()
    {
        /*$credentials = $request->only('username','password');

        $username = $credentials['username'];
        $password = $credentials['password'];

        /*$user = User::where('username', $username)
                  ->where('password',sha1($password))
                  ->first();
                  
                  dd($user);

        /*Auth::login($user);

        if (is_object($user))
            $info = 1;
        else
            $info = 0;

        /*if (Auth::attempt(['username' => $username, 'password' => $password, 'estado' => 1])) {
            //return redirect()->intended('home');
            
        } else {
            //return redirect()->intended('/');
            
        }*/
        //echo $info;
    }
}
