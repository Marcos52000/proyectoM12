<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Pagaments;
use App\Categoria;
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
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function inici(){
        $pagaments = Pagaments::all();
        $categories = Categoria::all();
     
        return view("auth.login", compact('pagaments','categories'));  
    }

    public function login(){

        $captcha = $this->captchaVerify(app('request')->input('h-captcha-response')??'');

        if($captcha == true){             
        
            $credentials = $this->validate(request(),[
                'email'=>'email|required|string|max:150',
                'password'=>'required|string|max:150',
                'estat' => 'Actiu'
            ]);
            if (Auth::attempt($credentials)) {
                return redirect()->route('admin');
            }else{
                return back()->withErrors(['email' => 'Credencials incorrectes,revisa el correu i la contrasenya']);
            }
        }else{
            return redirect()->back()->withErrors(['h-captcha' =>"Has d'omplir el Captcha"]);
        }         
                
    }

    //funcion captcha

    public function captchaVerify($requestCaptcha){         
        if($requestCaptcha == '' && $requestCaptcha == null){             
            return false;       
        } 
        $data = array('secret' => "0xA88843643dEEe71B11F632a8F27E55C2fA834435", 'response' => $requestCaptcha );
        $verify = curl_init();         
        curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");         
        curl_setopt($verify, CURLOPT_POST, true);         
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));         
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);        
        $response = curl_exec($verify); 
        $responseData = json_decode($response);         
        return $responseData->success;
        
    }
   
}
