<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addComment(Request $request, $post_id)
    {
        $user = Auth::user();
        $rules = [
            "comment" => "required"
        ];

        $request->validate($rules);

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->post_id = $post_id;
        $comment->description = $request->comment;
        $comment->save();

        return redirect()->back();
    }
}
