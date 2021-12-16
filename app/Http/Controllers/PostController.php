<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\LikePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Foreach_;

class PostController extends Controller
{
    function createPostIndex()
    {
        $categories = Category::all();
        return view('newpost')->with('categories', $categories);
    }

    function insertPost(Request $request)
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
            redirect ke /post/new sementara karena belum ada page home.blade nya
        */
        return redirect('/post/new');
    }

    /**
     * Access this method using ajax
     * Don't access it with route
     */
    public function like($post_id)
    {
        $post = Post::find($post_id);
        $user = Auth::user();
        $like = LikePost::where('user_id', $user->id)->where('post_id', $post->id)->first();
        $state = "like";
        if ($like == null) {
            $like = new LikePost();
            $like->value = 1;
            $like->user_id = $user->id;
            $like->post_id = $post->id;
            $like->save();
        } else {
            $value = $like->value == 1 ? 0 : 1;
            if ($value == 0) {
                $state = "null";
            }
            LikePost::where('user_id', $user->id)->where('post_id', $post->id)->update(['value' => $value]);
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
    public function dislike($post_id)
    {
        $post = Post::find($post_id);
        $user = Auth::user();
        $like = LikePost::where('user_id', $user->id)->where('post_id', $post->id)->first();
        $state = "dislike";
        if ($like == null) {
            $like = new LikePost();
            $like->value = -1;
            $like->user_id = $user->id;
            $like->post_id = $post->id;
            $like->save();
        } else {
            $value = $like->value == -1 ? 0 : -1;
            if ($value == 0) {
                $state = "null";
            }
            LikePost::where('user_id', $user->id)->where('post_id', $post->id)->update(['value' => $value]);
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
}
