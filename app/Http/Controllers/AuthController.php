<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //

    

     //mag register sa user
     public function registerSave(Request $request){


        Validator::make($request->all(), [
            'name' =>  'required',
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();


        

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),   
        ]);


    return redirect()->route('dealers');
        
    }

    
    //login authentication
    public function loginAction(Request $request){
        
        Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ])->validate();

        if(!Auth::attempt($request->only('email','password'),$request->boolean('remember'))){
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }


//logout ang user
public function logout(Request $request){
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    
    return redirect('/');
}



}
