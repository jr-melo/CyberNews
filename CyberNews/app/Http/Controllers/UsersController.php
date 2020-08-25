<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$roles = Role::active()->get();
        $users = User::
            join('roles', 'roles.id', '=', 'users.role_id')
            ->select('users.*', 'roles.rolname')
            ->where('users.field_status', '=', '1')
            ->get();

        return view("admin.users.index", compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User($this->validateFields($request));
        $user->password = bcrypt($user->password);
        $user->save();
        $request->session()->flash("flash_message", "Registro Creado con Éxito");
        return redirect('/admin/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles=Role::active()->get();
        session()->flashInput($user->toArray());
        return view('admin.users.show',compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles=Role::active()->get();
        session()->flashInput($user->toArray());
        return view('admin.users.edit',compact('user', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //$roles=Role::active()->get();
        $user->update($this->validateFields($request));
        $user->password = bcrypt($user->password);
        $user->save();
        $request->session()->flash("flash_message","El usuario fue actualizado!");
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->field_status = 0;
        $user->save();
        request()->session()->flash("flash_message","El usuario fue eliminado de manera satisfactoria!");
        return redirect('/admin/users');
    }

    public function validateFields(Request $request){
        $validatedData = $request->validate(
            [
                'name' => 'required|min:6|max:45',
                'email' => 'required|email',
                'role_id' => 'required',
                'password' => 'required|min:8',
                'pass2' => 'required|same:password'
            ],
            [
                'name.required' => 'Por favor introduzca un nombre.',
                'name.unique' => 'El nombre introducido ya está siendo utilizado.',
                'name.min' => 'El nombre debe de contener al menos 6 carcteres.',
                'name.max' => 'El nombre no puede pasar de 45 caracteres.',
                'email.required' => 'Por favor introduzca su correo electrónico.',
                'email.unique' => 'El correo electrónico introducido ya está siendo utilizado.',
                'email.email' => 'Por favor introduzca un correo electrónico válido.',
                'role_id.required' => 'Por favor seleccione un rol.',
                'password.required' => 'Por favor introduzca una contraseña',
                'password.min' => 'Su contraseña debe de tener al menos 8 caracteres.',
                'password.max' => 'Su contraseña no debe contener mas de 16 caracteres.',
                'pass2.required' => 'Por favor debe repetir la contraseña.',
                'pass2.same' => 'Las contraseñas introducidas no coinciden.'
            ]

        );

        return $validatedData;
    }

}
