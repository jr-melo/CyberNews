<?php

namespace App\Http\Controllers;

use App\categorys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        } elseif (!$request->hasFile('cat_image') ) {

            $category = new categorys([
                "nombre" => $request->get('nombre'),
                "descripcion" => $request->get('descripcion'),
            ]);
            $category->save(); // Finally, save the record.
            $request->session()->flash("flash_message", "Registro Creado con Éxito");

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
        $image = $request->get('imageStatus');  // Obtiene el valor del input imageStatus, este valida si al imagen se está eliminando o no.
        if($image == NULL){ // Si es actualizando el registro, devuelve NULL en imageStatus, por lo cual se define 0 para que sea actualizado sin eliminar imagen.
            $image = '0';
        }

        if ($image == '0' && $request->hasFile('cat_image')) {
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
            return redirect('/admin/category');

        } elseif ($image == '0' && !$request->hasFile('cat_image') ) {
            
            $category->update([
                "nombre" => $request->get('nombre'),
                "descripcion" => $request->get('descripcion'),
            ]);

            $category->save();
            request()->session()->flash("flash_message", "El registro fue actualizado de manera satisfactoria");
            return redirect('/admin/category');

        } elseif ($image == '1'){  // Si $image es = 1 indica que se solicita eliminar la imagen, por lo que procede con este if.

            DB::update('UPDATE categorys SET cat_image = NULL WHERE id ='.$request->id);
            request()->session()->flash("flash_message", "El registro fue actualizado de manera satisfactoria");
            return redirect('/admin/category');

        } else{
            
            request()->session()->flash("flash_message", "Error, no fue actualizado el registro.");
            return redirect('/admin/category');
        }

        
    
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

}
