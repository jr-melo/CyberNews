<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::active()->get();
        return view("admin.permissions.index", compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = new Permission($this->validateFields($request));
        $permission->save();
        $request->session()->flash("flash_message", "Registro Creado con Éxito");
        return redirect('/admin/permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        session()->flashInput($permission->toArray());
        return view('admin.permissions.show',compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        session()->flashInput($permission->toArray());
        return view('admin.permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $permission->update($this->validateFields($request));
        $permission->save();
        $request->session()->flash("flash_message","El registro fue actualizado!");
        return redirect('/admin/permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->field_status = 0;
        $permission->save();
        request()->session()->flash("flash_message","El registro fue eliminado de manera satisfactoria!");
        return redirect('/admin/permissions');
    }

    public function validateFields(Request $request){

        $validatedData = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
            ],
            [
                'name.required' => 'El nombre es requerido.',
                'description.required' => 'La descripción es requerida.',
            ]
        );

        return $validatedData;
    }
}
