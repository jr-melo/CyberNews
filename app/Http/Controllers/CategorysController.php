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

        return view('admin.category.index', compact('categorys'));
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
        $this->validateFields($request);

        if ($request->hasFile('cat_image')) {
            $request->validate([
                'cat_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048', // Only allow .jpg, .bmp and .png file types.
            ]);
            // Save the file locally in the storage/public/ folder under a new folder named /category
            $request->cat_image->store('category', 'public');

            // Store the record, using the new file hashname which will be it's new filename identity.
            $category = new categorys([
                "nombre" => $request->get('nombre'),
                "descripcion" => $request->get('descripcion'),
                "cat_image" => $request->cat_image->hashName(),
            ]);
            $category->save(); // Finally, save the record.
            $request->session()->flash("flash_message", "Registro Creado con Éxito");
        } else {
            $request->session()->flash("flash_message", "No creado");
        }

        $request->session()->flash("flash_message", "test");
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
        return view('admin.category.show', compact('category'));
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
        $this->validateFields($request);

        if ($request->hasFile('cat_image')) {

            $request->validate([
                'cat_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $request->cat_image->store('category', 'public');

            $category->update([
                "nombre" => $request->get('nombre'),
                "descripcion" => $request->get('descripcion'),
                "cat_image" => $request->cat_image->hashName(),
            ]);

            $category->save();
            request()->session()->flash("flash_message", "El registro fue actualizado de manera satisfactoria");
            
        } elseif (!$request->hasFile('cat_image')) {

            $category->update([
                "nombre" => $request->get('nombre'),
                "descripcion" => $request->get('descripcion'),
            ]);

            $category->save();
            request()->session()->flash("flash_message", "El registro fue actualizado de manera satisfactoria");
        }
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
            request()->session()->flash("flash_message", "El registro fue eliminado de manera satisfactoria!");
            return redirect('/admin/category');
        
    }


    public function validateFields(Request $request)
    {

        $validatedData = $request->validate(
            [
                'nombre' => 'required',
                'descripcion' => 'required',
                'cat_image' => '',
            ],
            [
                'nombre.required' => 'El nombre de la categoria es requerido.',
                'descripcion.required' => 'La descripción es requerida.',
            ]
        );

        return $validatedData;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categorys  $category
     * @return \Illuminate\Http\Response
     */

    public function deleteImage(categorys $category)
    {
        $category->cat_image = NULL;
        $category->save();
        request()->session()->flash("flash_message", "El registro fue eliminado de manera satisfactoria!");
        return redirect('/admin/category');

        /* request()->session()->flash("flash_message", "La imagen fue eliminada de manera satisfactoria!");
        return redirect('/admin/category'); */
    }
}
