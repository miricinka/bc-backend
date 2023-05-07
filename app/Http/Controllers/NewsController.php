<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the news.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at','desc')->get();
        $response = array();
        foreach($news as $new){
            $count = $new->comments()->get()->count();
            $newWithCount = ['news' => $new, 'commentCount' => $count];
            array_push($response, $newWithCount);
        }
        return $response;
    }

    /**
     * Store a newly created news in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        News::create($request->validate([ 
            'title' => ['required'],
            'text' => ['required']
        ]));
        return response()->json("New news created");
    }

    /**
     * Display the specified news by id.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return [
            'id' => $news->id,
            'title' => $news->title,
            'text' => $news->text,
            'created_at' => $news->created_at,
        ];
    }

    /**
     * Update the specified news in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $news->update($request->validate([ 
            'title' => ['required'],
            'text' => ['required']
        ]));
        return response()->json("News updated");
    }

    /**
     * Remove the specified news from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return response()->json("News deleted");
    }
}
