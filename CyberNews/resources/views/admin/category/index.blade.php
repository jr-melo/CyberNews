@extends('layouts.admin')

@section('header_content')
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Categorias</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
      <li class="breadcrumb-item active">Categorias</li>
    </ol>
  </div><!-- /.col -->
@endsection
@section('main_content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if(session()->has('flash_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Excelente!</strong> {{ session()->get('flash_message') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>

            @endif

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <a class="btn bg-gradient-success" href="{{ url('/admin/category/create') }}"
                      role="button">Crear Nueva Categoria</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="users_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($categorys as $category)
                          <tr>
                              <td>{{ $category->id }}</td>
                              <td>{{ $category->nombre }}</td>
                              <td>{{ $category->descripcion}} </td>
                              <td>
                              <div class="d-flex">
                                    <ul class="list-inline center mx-auto justify-content-center m-0">
                                        <li class="list-inline-item">
                                          <a class="nav-link" 
                                            href="{{ url('/admin/category/' . $category->id ) }}"
                                            role="button"><i class="fas fa-book-open"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                          <a class="nav-link"
                                            href="{{ url('/admin/category/' . $category->id ) . '/edit' }}"
                                            role="button"><i class="fas fa-edit"></i></a>
                                        </li>
                                          {{-- <li class="list-inline-item">
                                            <a class="nav-link"
                                               href="{{ url('/admin/category/' . $categor->id ) . '/delete' }}"
                                               role="button"><i class="fas fa-trash-alt"></i></a>
                                          </li> --}}
                                        <li class="list-inline-item">
                                          <a class="nav-link" href="#" role="button"
                                            onclick="deleteModelRecord({{$category->id}})"><i
                                            class="fas fa-trash-alt"></i></a>
                                          <pre delete-dialog-model="deleteModelRecord" class="d-none">

                                            <form id="deleteModelRecord" name="delteModelRecord" action="{{ url('/admin/category/')}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                            
                                          <script>
                                            function deleteModelRecord (id) {
                                                url = $('#deleteModelRecord').attr('action') + "/" + id;

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
                                                        $('#deleteModelRecord').attr('action', url).submit();
                                                    }
                                                });
                                            }
                                          </script>
                                          </pre>
                                        </li>
                                    </ul>
                                  
                                  </div>
                              </td>
                          </tr>
                      @endforeach  
                    </tbody>                     
                  </table>
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
<script>
    document.addEventListener("DOMContentLoaded", function () {

        $('#roles_table').DataTable({
            "responsive": true,
            "autoWidth": false,
            "ordering": true
        });
  });
</script>

@endsection