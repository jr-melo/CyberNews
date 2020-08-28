@extends('layouts.welcome')

@section('page_header')
     <!-- Page Header -->
  <header class="masthead" style="background-image: url('{{ asset("dist/img/home-bg.jpg") }}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>CyberNews</h1>
            <span class="subheading">Tu periódico digital favorito.</span>
          </div>
        </div>
      </div>
    </div>
  </header>
@endsection

@section('page_content')  
  <!-- Main Content -->
  <div class="container">
  <br><h1 style="color:rgb(163, 41, 41)"> Noticias de la Sección</h1> <hr>
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach ($news as $new)
          <div class="post-preview">
            <a href="{{ url('/posts/'. $new->id ) }}" role="button">
              <h2 class="post-title">
                {{ $new->title }}
              </h2>
            </a>
            <p class="post-meta">Posted by
              {{ $new->name }}
              on {{ $new->created_at }}</p>
          </div>
          <hr> 
        @endforeach
        <div class="custom-pagination">{{ $news->links() }}</div>
        <hr>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-left" href="{{ url('/categories') }}">&larr; Regresar</a>
        </div>
      </div>
    </div>
  </div>
  <hr>
  @endsection

  <style>
    .pagination{
      justify-content: center;
    }
  </style>

