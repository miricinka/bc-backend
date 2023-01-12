<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\News;

class CommentController extends Controller
{
    public function getComments(News $news)
    {
        return $news->comments()->get();
    }

    public function store(Request $request)
    {
        Comment::create($request->all());
        return response()->json("Comment created");
    }
}
