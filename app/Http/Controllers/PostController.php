<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

    public function insertPost(Request $request){
        
        $rules = [
            'title' => 'required',
            'category' => 'required',
            'description' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator, 'insert');
        }

        $post = new Post();
        
        $post->category_id = $request->category;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->description = $request->description;

        if(isset($request->category_id)){
            $post->category_id = $request->category;
        }
        if(isset($request->user_id)){
            $post->user_id = Auth::user()->id;
        }
        if(isset($request->title)){
            $post->title = $request->title;
        }
        if(isset($request->description)){
            $post->description = $request->description;
        }

        $post->save();
        return redirect('/home');
    }
}
