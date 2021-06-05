<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    protected $redirectTo = '/home';

     public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function connexion(){
         return view('auth.login');
    }

     public function login(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // return redirect()->intended('dashboard')
            //             ->withSuccess('You have Successfully loggedin');
            return redirect()->route('destination.index');
            
        }
  
        // return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
        return 'verifier votre mail ou mot de passe';
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
