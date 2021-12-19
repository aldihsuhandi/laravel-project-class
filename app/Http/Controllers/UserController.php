<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function createUser(Request $request)
    {
        $rules = [
            'email' => "required|email|unique:users,email",
            'username' => "required|min:5",
            'password' => "required|min:6|alphanum",
        ];

        $request->validate($rules);

        $user = new User();
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->description = "";
        $user->profile_img = "";
        $user->save();

        return redirect('/login');
    }

    function updateUser(Request $request) {
        $rules = [
            'email' => "required|email|unique:users,email",
            'username' => "required|min:5",
            'password' => "required|min:6|alphanum",
            'description' => "nullable|min:10",
            // 'image' => "nullable|image", // !Gak Terlalu Butuh Buat Sekarang
        ];

        $request->validate($rules);

        $user = User::find(Auth::user()->id);

        // !Masih Gagal Update ke Database
        if(isset($request->name)) {
            $user->username = $request->name;
        }

        $user->email = $request->email;

        $user->password = $request->password;

        $user->description = $request->description;

        $user->save();
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
