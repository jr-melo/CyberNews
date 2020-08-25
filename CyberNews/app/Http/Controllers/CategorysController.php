<?php

namespace App\Http\Controllers;

use App\categorys;
use Illuminate\Http\Request;

class CategorysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = categorys::active()->get();

        return view('admin.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Categorys($this->validateFields($request));
        $category->save();
        $request->session()->flash("flash_message", "Registro Creado con Éxito");
        return redirect('/admin/category');

    }

    /**
     * Display the specified resource.
     *
     * @param  App\categorys  $category
     * @return \Illuminate\Http\Response
     */
    public function show(categorys $category)
    {
        session()->flashInput($category->toArray());
        return view('admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categorys  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(categorys $category)
    {
        session()->flashInput($category->toArray());
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categorys  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categorys $category)
    {
        $category->update($this->validateFields($request));
        $category->save();
        request()->session()->flash("flash_message", "El registro fue actualizado de manera satisfactoria");
        return redirect('/admin/category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categorys  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(categorys $category)
    {
        $category->field_status = 0;
        $category->save();
        request()->session()->flash("flash_message","El registro fue eliminado de manera satisfactoria!");
        return redirect('/admin/category');
    }


        public function validateFields(Request $request){

        $validatedData = $request->validate(
            [
                'nombre' => 'required',
                'descripcion' => 'required',
            ],
            [
                'nombre.required' => 'El nombre de la categoria es requerido.',
                'descripcion.required' => 'La descripción es requerida.',
            ]
        );

        return $validatedData;
}
}
