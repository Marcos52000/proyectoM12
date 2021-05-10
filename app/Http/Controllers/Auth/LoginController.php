<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Pagaments;
use App\Categoria;

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

        $credentials = $this->validate(request(),[
            'email'=>'email|required|string|max:150',
            'password'=>'required|string|max:150'
        ]);
            
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin');
        }else{
            return back()->withErrors(['email' => 'Credencials incorrectes,revisa el correu i la contrasenya']);
        }
}

   
}
