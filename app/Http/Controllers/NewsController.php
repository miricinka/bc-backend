<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at','desc')->get();
        //$news = News::with('comments')->get();
        $response = array();
        foreach($news as $new){
            $count = $new->comments()->get()->count();
            $newWithCount = ['news' => $new, 'commentCount' => $count];
            array_push($response, $newWithCount);
        }
        return $response;
        //return News::orderBy('created_at','desc')->get();
        //return new ResourceCollection(News::orderBy('created_at','desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        News::create($request->validated());
        return response()->json("New news created");
    }

    /**
     * Display the specified resource.
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNewsRequest $request, News $news)
    {
        $news->update($request->validated());
        return response()->json("News updated");
    }

    /**
     * Remove the specified resource from storage.
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
