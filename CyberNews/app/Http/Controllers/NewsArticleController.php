<?php

namespace App\Http\Controllers;

use App\news;
use Illuminate\Http\Request;

class NewsArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = news::active()->get();
       
        return view("admin.news.index", compact('news'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\news  $news_article
     * @return \Illuminate\Http\Response
     */
    public function show(news $news_article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\news  $news_article
     * @return \Illuminate\Http\Response
     */
    public function edit(news $news_article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\news $news_article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, news $news_article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\news  $news_article
     * @return \Illuminate\Http\Response
     */
    public function destroy(news $news_article)
    {
        //
    }
}
