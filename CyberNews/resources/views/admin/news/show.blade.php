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
    <div class="container d-flex justify-content-between">
        <div>
            <h1>Noticias</h1>
        </div>
    </div>

    <!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="NewsTable" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Datos</th>
                            <th>Información</th>
                        </tr>
                        </thead>

                        <tbody>
                            <tr>
                               
                                <td>  ID </td>
                                <td> {{ $news [0]->id }} </td>

                            </tr>
                            <tr>
                               
                                <td>  Titulo </td>
                                <td> {{ $news [0]->title }}  </td>
                                
                            </tr>
                            <tr>
                               
                                @foreach ($categories as $category)
                                    @if ($category->id == $news [0]->category_id)
                                        <td> Categoría</td>
                                        <td> {{ $category->nombre }}   </td>
                                    @endif
                                @endforeach
                                
                            </tr>
                            <tr>
                               
                                <td>  Autor </td>
                                <td> {{ $news [0]->name }}   </td>
                                
                            </tr>
                            <tr>
                               
                                <td>  Creacion</td>
                                <td> {{ $news [0]->created_at}}   </td>
                                
                            </tr>
                            @foreach ($users as $user)
                                    @if ($user->id == $news [0]->updatefor)
                             <tr>
                                        <td> Usuario actualizó</td>
                                        <td> {{ $user->name }}   </td>
                            </tr>
                            <tr>
                                <td>  Fecha de Actualización </td>
                                <td> {{$news [0]->updated_at}}  </td>
                            </tr>
                                    @endif
                                @endforeach
                        </tbody>
                    </table>
                    <div class="form-group">
                        <div class="controls">
                            <br>
                            <a href="{{ url('/admin/news') }}" class="btn-cancel1">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection