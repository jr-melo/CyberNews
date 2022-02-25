@extends('layouts.welcome')

@section('page_header')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('dist/img/news2.jpg') }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Publicaciones</h1>
                        <span class="subheading">Todas nuestras noticias por categorías.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('page_content')
    <!-- Main Content -->
    {{-- <div class="container"> --}}
    <div class="container">
        @foreach ($categories as $category)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="#">
                                <img class="img-fluid rounded" src="https://via.placeholder.com/700x400" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="card-title">{{ $category->nombre }}</h2>
                            <p class="card-text">{{ $category->descripcion }}</p>
                            <a href="{{ url('/categories/news/' . $category->id) }}" class="btn btn-primary">Ver
                                Publicaciones &rarr;</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted"></div>
            </div>
        @endforeach
        <div class="custom-pagination">{{ $categories->links() }}</div>
    </div>
    {{-- </div> --}}
    <hr>
@endsection

<style>
    .pagination {
        justify-content: center;
    }

</style>
