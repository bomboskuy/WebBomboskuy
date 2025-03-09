<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){}
    public function authenticate(Request $request){

        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'remember_me' => 'boolean'
        ]);

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        }

        return redirect('/')->with('error', 'Email or Password doenst match in our database');

    }
    public function logout(){}
}
