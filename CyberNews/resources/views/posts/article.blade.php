@extends('layouts.welcome')

@section('page_header')
     <!-- Page Header -->
     
  <header class="masthead" style="background-image: url('{{ asset("dist/img/post-bg.jpg") }}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>{{$new[0]->title}}</h1>
            <span class="subheading">By {{$new[0]->name}}</span>
          </div>
        </div>
      </div>
    </div>
  </header>
@endsection

@section('page_content')  
  <!-- Main Content -->
  <article>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-md-10 mx-auto">
                <h2 class="section-heading">{{$new[0]->title}}</h2><br>
                {{$new[0]->body}}
                <a href="#">
                  <img class="img-fluid" src="img/post-sample-image.jpg" alt="">
                </a>

                <p class="post-meta">Posted by
                  {{ $new[0]->name }}
                  on {{ $new[0]->created_at }}</p>
              </div>
            </div>
          </div>
  </article>

        <hr>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-left" href="{{ url('/') }}">&larr; Inicio</a>
          <a class="btn btn-primary float-right" href="{{ url('/categories') }}">Otras publicaciones &rarr;</a>
        </div>
      </div>
    </div>
  </div>
  <hr>
  @endsection

