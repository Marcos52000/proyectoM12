<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Socialite;
use Auth;
use Exception;
use App\User;
  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function loginWithGoogle()
    {
        try {

            $googleUser = Socialite::driver('google')->user();
            $user = User::where('email', $googleUser->email)->first();

            if($user){
                if($user->estat == 'Actiu'){
                    $reg = '/^["A-z"]+@(inscamidemar.cat)$/';

                    if(preg_match($reg,$user->email)) {
                        Auth::login($user);
                        return redirect('/admin');   
                    }else {
                        return redirect('/login')->withErrors(['google' =>"Nomes estan permessos correus amb el domini @inscamidemar.cat"]);
                    }
             
                }else{
                    return redirect('/login')->withErrors(['google' =>"Usuari en estat inactiu,contacti amb un administrador"]);
                }
            }
            else{
                    $reg = '/^["A-z"]+@(inscamidemar.cat)$/';

                    if(preg_match($reg,$user->email)) {
                        $createUser = User::create([
                            'user' => $googleUser->name,
                            'email' => $googleUser->email,
                            'google_id' => $googleUser->id,
                            'password' => encrypt('1234'),
                            'estat' => 'Inactiu',
                            'rol' =>'admin'
                        ]);
                    }

                return redirect('/login')->with('success', 'Usuari registrat,esperi a que un administrador activi el teu compte');;
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
    
    
}
