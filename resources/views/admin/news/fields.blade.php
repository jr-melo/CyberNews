<div class="form-group">
    <div class="controls">
        <label for="title"> Titulo: </label>
        <input class="form-control" required type="text" name="title" id="title" placeholder="Introducir Titulo."
        />
        <div id="errusername"></div>
    </div>
</div>
<div class="form-group">
    <div class="controls">
        <label for="body"> Cuerpo: </label>
        <textarea  class="form-control" required name="body" id="body" placeholder="Redacta tu articulo." ></textarea>      
        <div id="erremail"></div>
    </div>
</div>
<div class="form-group">
    <label for="category_id"> Categoría: </label>
    <select name="category_id" id="category_id" class="form-control" {{-- value="{{ old('category_id') }}" --}}>
        <option value="r"> -- Seleccionar -- </option>
        @foreach ($categories as $category)
            <option value="{{$category->id}}" >{{$category->nombre}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <input type="hidden" value={{(Auth::user()->id)}} name="Autor" id="Autor">
    <input type="hidden" value={{(now())}} name="created_at" id="created_at">
</div>


