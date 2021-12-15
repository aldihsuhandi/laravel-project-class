<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
