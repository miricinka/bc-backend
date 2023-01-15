<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\News;

class CommentController extends Controller
{
    public function getComments(News $news)
    {
        return $news->comments()->orderBy('created_at','desc')->get();
    }

    public function store(Request $request)
    {
        Comment::create($request->validate([ 
            'text' => ['required','min:3'],
            'news_id' => ['required']
        ]));
        return response()->json("Comment created");
    }

    public function update(Request $request, Comment $comment)
    {
        // $comment->update($request->validate([ 
        //     'text' => ['required','min:3', 'max:20']
        // ]));
        //$validated = $request->validate(['text' => ['required','min:3', 'max:20']]);
        $comment->update($request->validate([ 
            'text' => ['required','min:3']
        ]));

        //return $product;
        return response()->json("Comment updated");
    }

    public function destroy(Comment $comment){
        $comment->delete();
        return response()->json("Comment deleted");
    }
}
