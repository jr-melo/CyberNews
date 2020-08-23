@extends('layouts.admin')

@section('header_content')
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Categorias</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
      <li class="breadcrumb-item active">Categoria</li>
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
                    <h2> Detalle de categoria </h2>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <form role="form" id="users" name="users" method="post" action="{{ url('/admin/category/') . $categorys->id }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
    <div class="controls">
        <label for="nambre"> Nombre: </label>
        <input class="form-control"  type="text" name="nombre" id="nombre" placeholder="Introducir Categoria."
        value="{{ old('nombre') }}"/>
        <div id="errcategoria"></div>
    </div>
</div>

<div class="form-group">
    <div class="controls">
        <label for="descripcion"> Descripcion: </label>
        <input class="form-control" required type="text" name="descripcion" id="descripcion" placeholder="Introducir una descripcion."
        value="{{ old('descripcion') }}" />
        <div id="errdescripcion"></div>
    </div>
</div>
                        <div class="form-group">
                            <div class="controls">
                                <a href="{{ url('/admin/category') }}" class="btn-cancel1">Regresar</a>
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

@endsection