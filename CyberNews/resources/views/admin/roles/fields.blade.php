<div class="form-group">
    <div class="controls">
        <label for="name"> Nombre de Rol: </label>
        <input class="form-control" required type="text" name="name" id="name" placeholder="Introducir rol."
        value="{{ old('name') }}"/>
        <div id="errrolname"></div>
    </div>
</div>

<div class="form-group">
    <div class="controls">
        <label for="description"> Descripción: </label>
        <input class="form-control" required type="text" name="description" id="description" placeholder="Introducir descripción."
        value="{{ old('description') }}" />
        <div id="errdescription"></div>
    </div>
</div>
