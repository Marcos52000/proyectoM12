<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Pagaments;
use App\Categoria;

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

    use SendsPasswordResetEmails;

    public function showLinkRequestForm(Request $request, $token = null){
        $pagaments = Pagaments::all();
        $categories = Categoria::all();
     
        return view("auth.passwords.email", compact('pagaments','categories'))->with(
            ['token' => $token, 'email' => $request->email]
        );;  
    }
}
