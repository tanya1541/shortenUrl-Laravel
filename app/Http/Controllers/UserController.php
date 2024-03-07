<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $incomingFields = $request->validate([
            'name'=>['required'],
            'email'=>['required', 'email'],
            'password'=>['required', 'min:8']
        ]);
        $incomingFields['password']= bcrypt($incomingFields['password']);
        $user = User::create([
            'name'=>$incomingFields['name'],
            'email'=>$incomingFields['email'],
            'password'=>$incomingFields['password']
        ]);
        return redirect('/login');
    }

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required', 'min:8']
        ]);
        
        $credentials = [
            'email'=>$incomingFields['email'],
            'password'=>$incomingFields['password']
        ];
        if(auth()->attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/');
        }
        return redirect('/login');
    }
    public function logout(Request $request) {
        auth()->logout();
        return redirect('/login');
    }

}
