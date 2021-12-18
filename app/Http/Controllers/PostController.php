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
        return view('post.post', ["post" => $post]);
    }

    public function createPostIndex()
    {
        $categories = Category::all();
        return view('newpost')->with('categories', $categories);
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
            redirect ke /post/new sementara karena belum ada page home.blade nya
        */
        return redirect('/post/new');
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
            LikePost::where('user_id', $user->id)->where('post_id', $post->id)->update(['value' => $p_value]);
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
