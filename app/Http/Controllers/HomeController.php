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
        // $trending = Post::take(4)->get();
        $trending = Post::all()->sortBy(function ($v_post) {
            $val = $v_post->like->where('value', '1')->count();
            return $val;
        }, descending: true)->take(4);
        $categories = Category::paginate(4, ['*'], 'category');

        if ($request->ajax()) {
            return view('post.template', ["posts" => $posts]);
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

    public function get_trending(Request $request)
    {
        if ($request->ajax() == false) {
            return abort(404);
        }

        $trending = Post::all()->sortBy(function ($v_post) {
            $val = $v_post->like->where('value', '1')->count();
            return $val;
        }, descending: true)->take(4);

        return view('post.cardtemplate', ["trending" => $trending]);
    }
}
