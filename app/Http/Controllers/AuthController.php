<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        $required = $request->validate([
            'email' => ['required'],
            'password' => ['required', 'min:6']
        ]);

        if(Auth::attempt($required)) {
            return redirect('/test'); // Ntar Diubah
        }

        return back() -> withErrors("Your Email or Password is not correct!");
    }

    public function logout() {
        Auth::logout();

        return redirect('/login');
    }
}
