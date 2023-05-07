<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\News;

class CommentController extends Controller
{
    /**
     * Display a listing of comments for specific news.
     *
     * @return \Illuminate\Http\Response
     */
    public function getComments(News $news)
    {
        return $news->comments()->orderBy('created_at','desc')->get();
    }

    public function store(Request $request)
    {
        Comment::create($request->validate([ 
            'text' => ['required','min:3'],
            'news_id' => ['required'],
            'username' => ['required']
        ]));
        return response()->json("Comment created");
    }

    public function update(Request $request, Comment $comment)
    {
        if($request->user()->role != 'admin' && $request->user()->username != $comment->username){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $comment->update($request->validate([ 
            'text' => ['required','min:3']
        ]));
        return response()->json("Comment updated");
    }

    public function destroy(Request $request, Comment $comment){
        if($request->user()->role != 'admin' && $request->user()->username != $comment->username){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $comment->delete();
        return response()->json("Comment deleted");
    }
}
