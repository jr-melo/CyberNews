<div class="form-group">
    <div class="controls">
        
        <input class="form-control" required type="text" name="title" id="title" placeholder="Introducir Titulo."
        />
        <div id="errusername"></div>
    </div>
</div>

<div class="form-group">
    <div class="controls">
        
        <textarea  class="form-control" required name="article" id="article" placeholder="Redacta tu articulo." ></textarea> 
         
        <div id="erremail"></div>
    </div>
</div>

<input type="hidden" value={{(Auth::user()->id)}} name='id' id='id'>
<input type="hidden" value={{(now())}}>

