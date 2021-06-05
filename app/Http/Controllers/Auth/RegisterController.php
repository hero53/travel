<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Rules\Password;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Rules\Password as PasswordValidationRules;


class RegisterController extends Controller 
{
    //
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function register(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255','min:3'],
            'surname' => ['required', 'string', 'max:255','min:3'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                 Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ]);

        if($validator->fails())
        {
            session()->flash('type', 'alert-danger');
            session()->flash('message', 'Erreur dans le formulaire');
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        if(htmlspecialchars($request->password) != htmlspecialchars($request->password_V)){
             session()->flash('type', 'alert-danger');
             session()->flash('message', 'verifier votre mot de passe ');
            return back();

        }else{

        
            $user = new User;
            $user->name = htmlspecialchars($request->name);
            $user->surname= htmlspecialchars($request->surname);
            $user->email = htmlspecialchars($request->email);
            $user->password = Hash::make(htmlspecialchars($request->password));
            $user->save();                       

            session()->flash('type', 'alert-success');
            session()->flash('message', 'Enregistrement effectuer avec succes');
            return redirect()->route('login.connexion');
        }
    }

    protected function passwordRules()
    {
        return ['required'];
        // return ['required', 'string', new Password, 'confirmed'];
    }
}
