<div class="form-group">
    <div class="contPermisos">
        <label for="name"> Nombre de Permiso: </label>
        <input class="form-control" required type="text" name="name" id="name" placeholder="Introducir nombre de permiso."
        value="{{ old('name') }}"/>
        <div id="errname"></div>
    </div>
</div>

<div class="form-group">
    <div class="contPermisos">
        <label for="description"> Descripción: </label>
        <input class="form-control" required type="text" name="description" id="description" placeholder="Introducir descripción."
        value="{{ old('description') }}" />
        <div id="errdescription"></div>
    </div>
</div>
