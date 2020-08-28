@extends('layouts.admin')

@section('header_content')
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Usuarios</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
      <li class="breadcrumb-item active">Usuarios</li>
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
                    <h2><center> Ver Usuario </center></h2>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <form role="form" id="users" name="users" method="post" action="{{ url('/admin/users/' . $user->id) }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <div class="controls">
                                <label for="name"> Nombre de Usuario: </label>
                                <input class="form-control" required type="text" readonly name="name" id="name" placeholder="Vacío."
                                value="{{ old('name') }}"/>
                                <div id="errusername"></div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="controls">
                                <label for="email"> Email: </label>
                                <input class="form-control" required type="text" readonly name="email" id="email" placeholder="Vacío."
                                value="{{ old('email') }}" />
                                <div id="erremail"></div>
                            </div>
                        </div>

                        <div class="form-group">
                          <div class="controls">
                              <label for="rolname"> Rol: </label>
                              <input class="form-control" required type="text" readonly name="rolname" id="rolname" placeholder="Vacío."
                              @foreach ($roles as $role)
                                @if($role->id == $user->role_id)
                                  value="{{$role->rolname}}" />
                                @endif
                              @endforeach
                              <div id="errrolname"></div>
                          </div>
                      </div>

                        <div class="form-group">
                            <div class="controls">
                                <a href="{{ url('/admin/users') }}" class="btn-cancel1">Regresar</a>
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