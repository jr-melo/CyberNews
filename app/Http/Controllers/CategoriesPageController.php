<?php

namespace App\Http\Controllers;

use App\categorys;
use App\news;
use Illuminate\Http\Request;

class CategoriesPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = categorys::active()->paginate(2);

        return view("pages.categories", compact('categories'));
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
     * @param  \App\categorys  $categorys
     * @return \Illuminate\Http\Response
     */
    public function show(news $news)
    {
        $news = news::
            join('categorys', 'categorys.id', '=', 'news.category_id')
           ->join('users', 'users.id', '=','news.Autor')
           ->select('news.*', 'users.name', 'categorys.nombre', 'categorys.descripcion', 'categorys.cat_image')
           ->where('categorys.id', '=', $news->id)
           ->paginate(3);

        session()->flashInput($news->toArray());
        return view("posts.news", compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categorys  $categorys
     * @return \Illuminate\Http\Response
     */
    public function edit(categorys $categorys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categorys  $categorys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categorys $categorys)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categorys  $categorys
     * @return \Illuminate\Http\Response
     */
    public function destroy(categorys $categorys)
    {
        //
    }
}
