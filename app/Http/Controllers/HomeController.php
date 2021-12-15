<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $trending = Post::take(4)->get();
        $categories = Category::paginate(4);
        return view(
            'home',
            [
                "trending" => $trending,
                "categories" => $categories,
            ]
        );
    }
}
