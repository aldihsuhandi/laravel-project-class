<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\LikeComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function add_comment(Request $request, $post_id)
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

    public function like_handler(Request $request)
    {
        if ($request->ajax() == false) {
            return abort(404);
        }

        $comment = Comment::find($request->comment_id);
        $value = $request->value;
        $state = $value == 1 ? "like" : "dislike";

        $user = Auth::user();
        $like = LikeComment::where('user_id', $user->id)
            ->where('comment_id', $comment->id)->first();

        if ($like == null) {
            $like = new LikeComment();
            $like->value = $value;
            $like->user_id = $user->id;
            $like->comment_id = $comment->id;
            $like->save();
        } else {
            $p_value = $like->value == $value ? 0 : $value;
            if ($p_value == 0) {
                $state = "null";
            }

            LikeComment::where('user_id', $user->id)
                ->where('comment_id', $comment->id)
                ->update([
                    'value' => $p_value,
                ]);
        }

        $likecount = LikeComment::where('comment_id', $comment->id)
            ->where('value', 1)->count();
        $dislikecount = LikeComment::where('comment_id', $comment->id)
            ->where('value', -1)->count();

        $res = [
            "like_count" => $likecount,
            "dislike_count" => $dislikecount,
            "state" => $state,
        ];

        return response()->json($res);
    }
}
