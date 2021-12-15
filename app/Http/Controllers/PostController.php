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

    function insertPost(Request $request){
        
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

        $post->save();
        /*
            redirect ke /post/new sementara karena belum ada page home.blade nya
        */
        return redirect('/post/new');
    }
}
