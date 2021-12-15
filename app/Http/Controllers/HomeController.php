<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::paginate(5, ['*'], 'page');
        $trending = Post::take(4)->get();
        $categories = Category::paginate(4, ['*'], 'category');

        if ($request->ajax()) {
            return view(
                'post.template',
                [
                    "posts" => $posts
                ]
            );
        }

        return view(
            'home',
            [
                "posts" => $posts,
                "trending" => $trending,
                "categories" => $categories,
            ]
        );
    }
}
