@extends('layouts.admin')

@section('header_content')
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Permisos</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
      <li class="breadcrumb-item active">Permisos</li>
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
                    <h2><center> Ver Permisos </center></h2>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <form rol="form" id="permissions" name="permissions" method="post" action="{{ url('/admin/permissions/' . $permission->id) }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <div class="controls">
                                <label for="name"> Nombre de Permiso: </label>
                                <input class="form-control" required type="text" readonly name="name" id="name" placeholder="Introducir nombre."
                                value="{{ old('name') }}"/>
                                <div id="errpermissionname"></div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="controls">
                                <label for="description"> Descripción: </label>
                                <input class="form-control" required type="text" readonly name="description" id="description" placeholder="Introducir descripción."
                                value="{{ old('description') }}" />
                                <div id="errdescription"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <a href="{{ url('/admin/permissions') }}" class="btn-cancel1">Regresar</a>
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