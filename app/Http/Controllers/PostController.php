<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class PostController extends Controller
{
    function createPostIndex()
    {
        $categories = Category::all();
        return view('newpost')->with('categories', $categories);
    }
}
