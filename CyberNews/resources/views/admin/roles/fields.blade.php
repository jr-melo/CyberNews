<div class="form-group">
    <div class="controls">
        <label for="rolname"> Nombre de Rol: </label>
        <input class="form-control" required type="text" name="rolname" id="rolname" placeholder="Introducir rol."
        value="{{ old('rolname') }}"/>
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
