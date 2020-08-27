@extends('layouts.welcome')

@section('page_header')
     <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
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
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        {{-- @foreach ($news as $article)
          <div class="post-preview">
            <a href="{{ url('/news/' . $article->id ) }}">
              <h2 class="post-title">
                {{ $article->title }}
              </h2>
            </a>
            <p class="post-meta">Posted by
              {{ $article->author }}
              on {{ $article->date }}</p>
          </div>
          <hr> 
        @endforeach --}}
        
        <!-- División -->
        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
              I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.
            </h2>
          </a>
          <p class="post-meta">Posted by
            Start Bootstrap
            on September 18, 2019</p>
        </div>
        <hr>
        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
              Science has not yet mastered prophecy
            </h2>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on August 24, 2019</p>
        </div>
        <hr>
        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
              Failure is not an option
            </h2>{{--  --}}
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on July 8, 2019</p>
        </div>
        <hr>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="{{ url('/posts') }}">Publicaciones Anteriores &rarr;</a>
        </div>
      </div>
    </div>
  </div>
  <hr>
  @endsection

