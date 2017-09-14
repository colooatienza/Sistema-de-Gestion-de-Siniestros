<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Requests\loginRequest;

class loginController extends Controller
{
   

    public function authenticate(loginRequest $request){
     
        $user = array(
            'usuario' =>  $request->input('usuario'),
            'password' =>  $request->input('password')
        );

        if(Auth::attempt($user)){
             return redirect()->intended('/'); 
         }else{       
             return redirect()->intended('/login')->with('msj', 'Los datos ingresados no son validos, intente nuevamente...');
         }
      }

     public function postLogout(){
         Auth::logout();
        return redirect()->intended('/');
     }
}
