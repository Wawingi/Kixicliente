<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;   
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;


class UtilizadorController extends Controller
{
    //Logar apartir do sistema interno
    public function logar(Request $request){
        $user = User::where('username', $request->username)
                ->where('password',sha1($request->password))
                ->first();
                  
        if(is_object($user)){
            Auth::login($user);
            return redirect()->intended('home');
        } else {
            return redirect()->intended('/');
        }
    }


    //Login através da API do Kixiagenda
    public function loginAPI(Request $request){
        try {
            $client = new Client(); //GuzzleHttp\Client
            $url = "http://192.168.5.83:8080/kixiagenda/public/api/loginAPI"; 
            //$url = "http://kixiagenda.kixicredito.com/public/api/loginAPI";

            $response = $client->request('POST', $url, [
                'form_params' => [
                    'username' => $request->username,
                    'password' => $request->password
                ]
            ]);
            $user = json_decode($response->getBody());       
            
            if($response->getStatusCode() == "200"){
                if(is_object($user)){ 
                    Session::put('user',$user);
                    if(Session::has('user')){
                        return redirect()->intended('home');
                    }else{
                        return redirect()->intended('/');
                    }                      
                }else{
                    return redirect()->intended('/');
                } 
            }else{
                return redirect()->intended('/');
            }
        } catch (RequestException $e) {
            echo GuzzleHttp\Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo GuzzleHttp\Psr7\str($e->getResponse());
            }
        }
    }

    public function logout(){
        //Auth::logout();
        Session::flush();
        return redirect()->intended('/');
    }
}
