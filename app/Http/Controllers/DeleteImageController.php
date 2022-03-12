<?php

namespace App\Http\Controllers;

use App\categorys;
use Illuminate\Http\Request;

class DeleteImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* return redirect('/admin'); */
        /* return $this->destroy($categorys,$request,$id); */
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
    public function show(categorys $categorys)
    {
        //
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
    public function destroy(categorys $categorys, Request $request, $id)
    {
        /* {{DB::update('UPDATE categorys SET cat_image = NULL WHERE id ='. $category->id)}} 
        return redirect('/admin/category');*/

        /* if ($request->ajax()){

            $categorys = categorys::findOrFail($id);

            if ($categorys){

                $categorys->cat_image->NULL;

                return response()->json(array('success' => true));
            }else{
                request()->session()->flash("flash_message", "No existe.");
            }

        }else{
            request()->session()->flash("flash_message", "Error");
        } */
/* 
        return redirect('/admin'); */

    }
}
