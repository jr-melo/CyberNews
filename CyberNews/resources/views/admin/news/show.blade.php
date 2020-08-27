@extends('layouts.admin')

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
                            <th>Informacion</th>
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
                               
                                <td>  Autor </td>
                                <td> {{ $news [0]->name }}   </td>
                                
                            </tr>
                            <tr>
                               
                                <td>  Creacion</td>
                                <td> {{ $news [0]->date }}   </td>
                                
                            </tr>
                             <tr>
                               
                                <td> ID de usuario que actualizo</td>
                                <td> {{ $news [0]->updatefor }}   </td>
                                
                            </tr>
                            <tr>
                               
                                <td>  Fecha de Actualizacion </td>
                                <td> {{$news [0]->updated_at}}  </td>
                                
                            </tr>
                           

                           
                           

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection