@extends('layouts.admin')

@section('header_content')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Categorias</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
            <li class="breadcrumb-item active">Categorías</li>
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
                            <h2> Editar Categoria</h2>
                        </div>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> {{ $error }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach

                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" id="category" name="category" method="post"
                                action="{{ url('/admin/category/' . $category->id) }}" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf

                                <div class="form-group">
                                    <div class="controls">
                                        <label for="nambre"> Nombre: </label>
                                        <input class="form-control" type="text" name="nombre" id="nombre"
                                            placeholder="Introducir Categoria." value="{{ old('nombre') }}" />
                                        <div id="errcategoria"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="controls">
                                        <label for="descripcion"> Descripción: </label>
                                        <input class="form-control" required type="text" name="descripcion"
                                            id="descripcion" placeholder="Introducir una descripcion."
                                            value="{{ old('descripcion') }}" />
                                        <div id="errdescripcion"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Imagen -->
                                    <div class="controls">
                                        <label for="cat_image"> Imagen: </label>
                                        <input class="form" type="file" name="cat_image" id="cat_image"
                                            value="{{ old('descripcion') }}" />

                                        @if (!is_null($category->cat_image))
                                        <li class="list-inline-item">
                                            <a class="#" href="#" role="button"
                                                onclick="deleteImage({{ $category->id }})"><i
                                                    class="fas fa-trash-alt"></i> Eliminar Imagen</a>
                                            <pre delete-dialog-model="deleteImage" class="d-none">

                                                {{-- <form id="deleteImage" name="deleteImage" action="{{ url('/admin/category/' . $category->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    
                                                    {{-- {{DB::update('UPDATE categorys SET cat_image = NULL WHERE id=' . $category->id)}} 
                                                </form>  --}}

                                                    <script>
                                                        function deleteImage(id) {
                                                            url = $('#deleteImage').attr('action') + "/" + id;
                                                            Swal.fire({
                                                                title: '¿Estás seguro que deseas eliminar este registro?',
                                                                text: "La acción no podrá ser revertida!",
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonColor: '#3085d6',
                                                                cancelButtonColor: '#d33',
                                                                confirmButtonText: 'Sí, eliminarlo!',
                                                                cancelButtonText: 'Cancelar',
                                                            }).then((result) => {
                                                                if (result.value) {
                                                                    $('#deleteImage').attr('action', url).submit();
                                                                }
                                                            });
                                                        }
                                                    </script>
                                            </pre>
                                        </li>
                                            <div class="imageDisplay">
                                                <img width="25%"
                                                    src="{{ 'http://localhost:8080/CyberNews/storage/app/public/category' . '/' . $category->cat_image }}"
                                                    alt={{ $category->cat_image }} title="">
                                            </div>
                                            <hr>
                                        @endif
                                    </div>
                                    {{-- <img width="30%" class="img-circle" src="{{ URL::asset('storage/app/public/category/'.$category->cat_image) }}"> --}}

                                </div>

                                <div class="form-group">
                                    <div class="controls">
                                        <a href="{{ url('/admin/category') }}" class="btn-cancel1">Cancelar</a>
                                        <input class="btn-send1" type="submit" name="send" id="send"
                                            value="Actualizar" />
                                    </div>
                                </div>
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
                submitHandler: function() {
                    $("#category").submit();
                }
            });
            $('#category').validate({
                rules: {
                    nombre: {
                        required: true
                    },
                    descripcion: {
                        required: true,
                    },
                    messages: {
                        nombre: {
                            required: "Por favor introduzca un nombre."
                        },
                        descripcion: {
                            required: "Por favor introduzca una breve descripcion."

                        },

                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
