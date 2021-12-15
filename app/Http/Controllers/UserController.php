<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function createUser(Request $request) {
        $user = new User();
        $user->email = $request->emailRegister;
        $user->username = $request->usernameRegister;
        $user->password = $request->passwordRegister;
        $user->description = "";
        $user->profile_img = "";
        $user->save();

        return redirect('/login');
    }

    function registerIndex()
    {
        return view('authenticate.register');
    }

    function loginIndex()
    {
        return view('authenticate.login');
    }

    function profileIndex()
    {
        return view('profile');
    }
}
