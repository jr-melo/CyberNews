<?php

namespace App\Http\Controllers;

use App\news;
use App\User;
use App\categorys;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

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

        $news = new News($this->validateFields($request));
        $news->save();

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
        /* $categories = categorys::active()->get(); */
        $users = User::get();
        $news=\DB::table('news')
        ->join('users', 'users.id', '=','news.Autor')
        ->join('categorys', 'categorys.id', '=', 'news.category_id')
        ->select('news.id','news.title', 'users.name','news.date', 'news.updatefor','news.updated_at', 'news.category_id', 'categorys.nombre')
        ->where ('news.id','=',$id)
        ->get();

        session()->flashInput($news->toArray());
        return view('admin.news.show',compact('news', 'users', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\news  $news_article
     * @return \Illuminate\Http\Response
     */
    public function edit(news $news)
    {
        /* $categories = categorys::active()->get(); */
        /* $news=news::findOrfail($id); */
        session()->flashInput($news->toArray());
        return view('admin.news.edit',compact('news'/* , 'categories' */));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\news $news_article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, news $news)
    {
        $news->update($this->validateFields($request));
        $news->save();
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
                'Autor' => '',
                'body' => 'required',
                'date' => ''
                
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
