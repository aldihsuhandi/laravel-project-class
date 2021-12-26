<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $user->profile_img = "image/blank_profile.png";
        $user->save();

        return redirect('/login');
    }

    function updateUser(Request $request)
    {
        $rules = [
            'email' => "required|email",
            'username' => "required|min:5",
            'password' => "nullable|min:6|alphanum",
            'image' => "nullable|image",
        ];

        $request->validate($rules);

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image = Storage::put('public/profile', $image, 'public');
            $image = explode('/', $image)[2];
            $image = 'storage/profile/' . $image;
            User::where('id', Auth::user()->id)
                ->update([
                    'profile_img' => $image,
                ]);
        }

        $description = $request->description;
        if ($description == null) $description = "";

        User::where('id', Auth::user()->id)
            ->update([
                'email' => $request->email,
                'username' => $request->username,
                'description' => $description,
            ]);

        if ($request->password != NULL) {;
            User::where('id', Auth::user()->id)
                ->update([
                    'password' => bcrypt($request->password),
                ]);
        }

        return redirect()->back();
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
