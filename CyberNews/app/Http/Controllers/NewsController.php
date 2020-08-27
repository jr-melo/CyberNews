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
        
        return view('admin.news.create');
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
                'body' => 'required'
                
            ],
            [
                'title.required' => 'Por favor introduzca un titulo.',
                'title.min' => 'Esto no parece un titulo muy descriptivo.',
                'title.max' => 'Su titulo es un poco largo.',
                'body.required'=>'Introduzca el contenido por favor'
            ]
        );

        $news = new News($request->all());
        \DB::table('news')->insert(['title'=>$news->title, 'Autor'=>$news->Autor,
        
        'body'=>$news->body, 'date'=>$news->date]);
        
        
         
            
          
            
        $request->session()->flash("flash_message", "Registro Creado con Éxito");
        return  redirect('/admin/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\news  $news_article
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        

        //$news=\DB::table('news')->select('title','body','Autor','date','updatefor')->where ('id','=',$id)->get();
        // $news=\DB::table('news')->join('article', function($join,$id)
        // {
        //     $join->on('news.id','=','article.newsid')->where('article.newsid','=',$id);
        // });

        $news=\DB::table('news')
        ->join('users', 'users.id', '=','news.Autor')
        ->select('news.id','news.title', 'users.name','news.date', 'news.updatefor','news.updated_at')
        ->where ('news.id','=',$id)
        ->get();

        return view('admin.news.show',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\news  $news_article
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $news=news::findOrfail($id);
        return view('admin.news.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\news $news_article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $new)
    {
        $news=request()->except('_token','_method','_send');

        news::where('id','=',$new)->update($news);

        $request->session()->flash("flash_message","La Noticia fue actualizada de manera satisfactoria!");

        return redirect('/admin/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\news  $news_article
     * @return \Illuminate\Http\Response
     */
    public function destroy(news $news)
    {
        \DB::table('news')
        ->where('id', $news->id)
        ->update(['field_status' => 0]);
        return redirect('/admin/news');
    }


    public function validateFields(Request $request){
        $validatedData = $request->validate(
            [
                'title' => 'required|min:15|max:60',
                'body' => 'required'
                
            ],
            [
                'title.required' => 'Por favor introduzca un titulo.',
                'title.min' => 'Esto no parece un titulo muy descriptivo.',
                'title.max' => 'Su titulo es un poco largo.',
                'body.required'=>'Introduzca el contenido por favor'
            ]

        );

        return $validatedData;
    }
}
