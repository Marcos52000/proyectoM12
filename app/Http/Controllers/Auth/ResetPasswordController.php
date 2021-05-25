<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\User;
use App\Pagaments;
use App\Categoria;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
    protected $redirectPath = '/admin';

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    
    public function showResetForm(Request $request, $token = null){
        $pagaments = Pagaments::all();
        $categories = Categoria::all();

        return view('auth.passwords.reset', compact('pagaments','categories'))->with([
            'token' => $token,
        ]);
    }
 

}
