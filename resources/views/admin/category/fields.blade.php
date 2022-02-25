<div class="form-group">
    <div class="controls">
        <label for="nambre"> Nombre: </label>
        <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Introducir Categoria."
            value="{{ old('nombre') }}" />
        <div id="errcategoria"></div>
    </div>
</div>

<div class="form-group">
    <div class="controls">
        <label for="descripcion"> Descripción: </label>
        <input class="form-control" required type="text" name="descripcion" id="descripcion"
            placeholder="Introducir una descripcion." value="{{ old('descripcion') }}" />
        <div id="errdescripcion"></div>
    </div>
</div>


<div class="form-group">
    <!-- Imagen -->
    <div class="controls">
        <label for="cat_image"> Imagen: </label>
        <input class="form" type="file" name="cat_image" id="cat_image" value="{{ old('descripcion') }}" />
    </div>
</div>
