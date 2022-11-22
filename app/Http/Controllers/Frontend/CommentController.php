<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'comment_body' => 'required|string'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('message', 'Comment area is mandetory');
            }

            $post = post::where('slug', $request->post_slug)->where('status', '0')->first();
            if ($post) {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body
                ]);
                return redirect()->back()->with('message', 'Comment Successfuly ');
            } else {
                return redirect()->back()->with('message', 'No such Post Found ');
            }
        } else {
            return redirect('/login')->with('message', 'login first to comment');
        }
    }
    public function destroy(Request $request)
    {
        if (Auth::check()) {
            $comment = Comment::where('id', $request->comment_id)
                ->where('user_id', Auth::user()->id)
                ->first();
            $comment->delete();
            return response()->json([
                'status' => 401,
                'message' => 'Comment Deleted successfully'
            ]);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'login to Delete this comment'
            ]);
        }
    }
}
