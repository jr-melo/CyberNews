<div class="form-group">
    <div class="controls">
        
        <input class="form-control" required type="text" name="title" id="title" placeholder="Introducir Titulo."
        />
        <div id="errusername"></div>
    
    </div>
</div>
<input type="hidden" value={{(Auth::user()->id)}} name="Autor" id="Autor">
<input type="hidden" value={{(now())}} name="date" id="date">
<div class="controls">
    <input type="hidden"  name="newsid" id="newsid" value={{($news[0]->id)}}>  
    <textarea  class="form-control" required name="article" id="article" placeholder="Redacta tu articulo." ></textarea> 
     
    <div id="erremail"></div>
</div>
<div class="form-group">
   
</div>


