<?php

namespace App\Http\Controllers;

use App\news;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = news::
            join('categorys', 'categorys.id', '=', 'news.category_id')
            ->join('users', 'users.id', '=','news.Autor')
            ->select('news.*', 'users.name', 'categorys.nombre', 'categorys.descripcion')
            ->orderBy('news.id', 'desc')
            ->where('news.field_status', '=', '1')
            ->take(4)
            ->get();

        return view("pages.mainpage", compact('news'));

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
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new = news::
            join('categorys', 'categorys.id', '=', 'news.category_id')
            ->join('users', 'users.id', '=','news.Autor')
            ->select('news.*', 'users.name', 'categorys.nombre')
            ->where('news.id', '=', $id)
            ->get();

        session()->flashInput($new->toArray());
        return view("posts.article", compact('new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(news $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, news $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(news $news)
    {
        //
    }
}
