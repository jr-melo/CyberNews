<?php

namespace App\Http\Controllers;

use App\news;
use Illuminate\Http\Request;

class NewsController extends Controller
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
        $news=\DB::select('SELECT MAX(id+1) as id FROM news');
        return view('admin.news.create',compact('news'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|min:15|max:60',
                'article' => 'required'
                
            ],
            [
                'title.required' => 'Por favor introduzca un titulo.',
                'title.min' => 'Esto no parece un titulo muy descriptivo.',
                'title.max' => 'Su titulo es un poco largo.',
                'article.required'=>'Introduzca el contenido por favor'
            ]
        );

        $news = new News($request->all());
        \DB::table('news')->insert(['title'=>$news->title, 'Autor'=>$news->Autor,
        
                                        'date'=>$news->date]);
        
        
         \DB::table('article')->insert(['newsid'=>$news->newsid,'article'=>$news->article]);
            
          
            
        $request->session()->flash("flash_message", "Registro Creado con Éxito");
        return view('admin.news.index');
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


    public function validateFields(Request $request){
        $validatedData = $request->validate(
            [
                'title' => 'required|min:15|max:60',
                'article' => 'required'
                
            ],
            [
                'title.required' => 'Por favor introduzca un titulo.',
                'title.min' => 'Esto no parece un titulo muy descriptivo.',
                'title.max' => 'Su titulo es un poco largo.',
                'article.required'=>'Introduzca el contenido por favor'
            ]

        );

        return $validatedData;
    }
}
