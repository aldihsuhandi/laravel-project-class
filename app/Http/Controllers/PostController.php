<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\LikePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    public function index($post_id)
    {
        $post = Post::find($post_id);
        $categories = Category::all();
        return view('post.post', ["post" => $post, "categories" => $categories]);
    }

    public function createPostIndex()
    {
        $categories = Category::all();
        return view('post.newpost')->with('categories', $categories);
    }

    public function insertPost(Request $request)
    {

        $rules = [
            'title' => 'required',
            'category' => 'required',
            'description' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'insert');
        }

        $post = new Post();

        $post->category_id = $request->category;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();
        /*
            After inserting post, you will automatically goes to home.blade.php
        */
        return redirect('/');
    }

    public function deletePost(Request $request)
    {
        $post = Post::find($request->post_id);
        $post->delete();
        return redirect()->back();
    }

    /**
     * Access this method using ajax
     * Don't access it with route
     */
    public function like_handler(Request $request)
    {
        if ($request->ajax() == false) {
            return abort(404);
        }

        $post = Post::find($request->post_id);
        $value = $request->value;
        $state = $value == 1 ? "like" : "dislike";

        $user = Auth::user();
        $like = LikePost::where('user_id', $user->id)->where('post_id', $post->id)->first();

        if ($like == null) {
            $like = new LikePost();
            $like->value = $value;
            $like->user_id = $user->id;
            $like->post_id = $post->id;
            $like->save();
        } else {
            $p_value = $like->value == $value ? 0 : $value;
            if ($p_value == 0) {
                $state = "null";
            }
            LikePost::where('user_id', $user->id)
                ->where('post_id', $post->id)
                ->update(['value' => $p_value]);
        }


        $likecount = LikePost::where('post_id', $post->id)->where('value', 1)->count();
        $dislikecount = LikePost::where('post_id', $post->id)->where('value', -1)->count();
        $count = [
            "like_count" => $likecount,
            "dislike_count" => $dislikecount,
            "state" => $state,
        ];
        return response()->json($count);
    }

    /**
     * Access this method using ajax
     * Don't access it with route
     */
    public function get_post(Request $request)
    {
        if ($request->ajax() == false) {
            return abort(404);
        }

        $post = Post::find($request->post_id);
        $resp = [
            'id' => $post->id,
            'title' => $post->title,
            'category' => $post->category->name,
            'category_id' => $post->category->id,
            'description' => $post->description
        ];
        return response()->json($resp);
    }

    /**
     * Access this method using ajax
     * Don't access it with route
     */
    public function update_post(Request $request)
    {
        if ($request->ajax() == false) {
            return abort(404); 
        }

        Post::where('id', $request->id)
            ->update([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
            ]);

        return response()->json(
            [
                'success' => "post successfully updated"
            ],
            200
        );
    }
}
