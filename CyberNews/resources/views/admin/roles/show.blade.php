@extends('layouts.admin')

@section('header_content')
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Roles</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
      <li class="breadcrumb-item active">Roles</li>
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
                    <h2><center> Ver Roles </center></h2>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <form role="form" id="roles" name="roles" method="post" action="{{ url('/admin/roles/' . $role->id) }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <div class="controls">
                                <label for="name"> Nombre de Rol: </label>
                                <input class="form-control" required type="text" readonly name="name" id="name" placeholder="Introducir nombre."
                                value="{{ old('name') }}"/>
                                <div id="errrolename"></div>
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
                                <a href="{{ url('/admin/roles') }}" class="btn-cancel1">Regresar</a>
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