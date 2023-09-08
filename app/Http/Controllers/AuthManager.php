<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class AuthManager extends Controller
{
    function login(){
        return view('login');
    }
    function registration(){
        return view('registration');
    }
    
    function loginPost(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);

        $credentials = $request->only('email','password');
        // if(Auth::attempt($credentials)){
        //     return redirect()->intended(route('home'));
        // }
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password], $request->remember)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with('error', 'Invalid email or password');
    }

    function registrationPost(Request $request){
        $request->validate([
            'name'=>'required|min:3|max:30',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        if(!$user){
            return redirect(route('registration'))->with('error', 'Registration failed, Please try again.');
        }
        return redirect(route('login'))->with('Success', 'Registration Successful.');
    }

    function logout(){
        session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
