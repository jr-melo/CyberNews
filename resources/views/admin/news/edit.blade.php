@extends('layouts.admin')

@section('header_content')
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Noticias</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
      <li class="breadcrumb-item active">Noticias</li>
    </ol>
  </div><!-- /.col -->
@endsection
@section('main_content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <h2><center>Editar Noticias </center></h2>
                </div>
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" >
                      <strong>Error! </strong> {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach

                <!-- /.card-header -->
                <div class="card-body">
                    <form role="form" id="news" name="news" method="post" action="{{ url('/admin/news/' . $news->id) }}">
                      @method('PATCH')
                      @csrf
                      <div class="form-group">
                        <div class="controls">
                          <label for="title"> Título: </label>
                          <input class="form-control" required type="text" name="title" id="title" placeholder="Editar Titulo." value="<?php echo $news->title?>"/>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="category_id"> Categoría: </label>
                        <select name="category_id" id="category_id" class="form-control" value="{{ old('category_id') }}">
                            <option value="r"> -- Seleccionar -- </option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" >{{$category->nombre}}</option>
                            @endforeach
                        </select>
                      </div>
                    
                      <div class="form-group">
                        <div class="controls">
                          <label for="body"> Cuerpo: </label>  
                          <textarea  class="form-control" required name="body" id="body"> <?=$news->body?> </textarea> 
                        </div>
                      </div>
                      
                      <input type="hidden" value={{(Auth::user()->id)}} name="updatefor" id="updatefor">

                      <div class="form-group">  <!-- Imagen -->
                        <div class="controls">
                          <label for="news_image"> Imagen: </label>
                          <input class="form-control" type="news_image" name="news_image" id="news_image" value="<?php echo $news->news_image?>"/>
                        </div>
                      </div>
                      
                      <a href="{{ url('/admin/news') }}" class="btn-cancel1">Cancelar</a>
                      <input class="btn-send1" type="submit" value="Grabar"/>           
                    </form>
                   
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
</div>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
      $.validator.setDefaults({
        submitHandler: function () {
          $("#news").submit();
        }
      });
      $('#news').validate({
        rules: {
          title: {
            required: true
          },
          
         article:{
             required: true,
         }

        },
        messages: {
          title: {
            required: "Por favor introduzca un Titulo."
          },
          article: {
            required: "Por favor introduzca un articulo.",
           
          },
         
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
</script>

@endsection



