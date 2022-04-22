<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;


class UtilizadorController extends Controller
{
    //Logar apartir do sistema interno
    public function logar(Request $request){
        $user = User::where('username', $request->username)
                  ->where('password',sha1($request->password))
                  ->first();
dd($user);
        if (is_object($user)){
            $info = 1;
            Auth::login($user);
        }else{
            $info = 0;
        }
        echo $info;
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
                    Auth::login($user);
                    echo 1;
                }else{
                    echo 0;
                } 
            }else{
                echo 0;
            }
        } catch (RequestException $e) {
            echo GuzzleHttp\Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo GuzzleHttp\Psr7\str($e->getResponse());
            }
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->intended('/');
    }
}
