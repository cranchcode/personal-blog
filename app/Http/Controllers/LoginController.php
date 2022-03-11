<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function viewLogin(){
        return view('user.login');
    }

    function authenticate(Request $request){
        $inputs = $request->input();
        $credentials = $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ]);

        if(Auth::attempt($credentials)){
            $user = User::where(['email'=>$inputs['email']])->first();
            $request->session()->put('user',$user);

            return redirect('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email or Password isn\'t correct',
        ]);
    }

    function viewDashboard(){
        return view('user.dashboard');
    }
}
