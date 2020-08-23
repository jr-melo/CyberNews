{{$roles = DB::table('roles')
        ->select('roles.*')
    ->get()}}

<div class="form-group">
    <div class="controls">
        <label for="name"> Nombre de Usuario: </label>
        <input class="form-control" required type="text" name="name" id="name" placeholder="Introducir usuario."
        value="{{ old('name') }}"/>
        <div id="errusername"></div>
    </div>
</div>

<div class="form-group">
    <div class="controls">
        <label for="email"> Email: </label>
        <input class="form-control" required type="text" name="email" id="email" placeholder="Introducir correo."
        value="{{ old('email') }}" />
        <div id="erremail"></div>
    </div>
</div>

{{-- <div class="form-group">
    <div class="controls">
        <label for="rolname"> Rol: </label>
        <input class="form-control" required type="text" name="rolname" id="rolname" placeholder="Introducir correo."
        value="{{ old('role_id') }}" />
        <div id="erremail"></div>
    </div>
</div> --}}

<div class="form-group">
    <label for="role"> Rol: </label>
    <select name="role" id="role" class="form-control" value="{{old('role_id')}}">
        <option value=""> -- Seleccionar -- </option>
        {{-- @foreach ($roles as $role)     --}}
        <option value="1" >1</option>
        <option value="2" >1</option>
        <option value="3" >1</option>
        <option value="4" >1</option>
        {{-- @endforeach --}}
    </select>
</div>


<div class="form-group">
    <div class="controls">
        <label for="password"> Contraseña: </label>
        <input class="form-control" required type="password" name="password" id="password" minlength="6" maxlength="16" 
        placeholder="Introducir contraseña."/>
        <div id="errpassword"></div>
    </div>
</div>

<div class="form-group">
    <div class="controls">
        <label for="pass2"> Repetir Contraseña: </label>
        <input class="form-control" required type="password" name="pass2" id="pass2" minlength="6" maxlength="16" 
        placeholder="Repetir contraseña." />
        <div id="errpassword"></div>
    </div>
</div>