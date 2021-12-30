<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(5, ['*'], 'page');
        // $trending = Post::take(4)->get();
        $trending = Post::all()->sortBy(function ($v_post) {
            $val = $v_post->like->where('value', '1')->count();
            return $val;
        }, descending: true)->take(4);
        $categories = Category::all();

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

    public function search(Request $request) 
    {
        $categories = Category::all();
        // title filtering
        $posts = Post::where('title', 'like', '%'.$request -> search.'%') -> get();

        // category filtering
        if(isset($request -> category) && $request -> category != -1) {
            $posts = $posts -> where('category_id', $request -> category);
        }

        return view(
            'search',
            [
                "action" => "search",
                "search" => $request -> search,
                "category_id" => $request -> category,
                "categories" => $categories,
                "posts" => $posts,
            ]
        );
    }
}
