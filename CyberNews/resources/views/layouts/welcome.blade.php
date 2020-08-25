<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CyberNews</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('dist/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/clean-blog.min.css') }}">

         <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

        <!-- Custom fonts for this template -->
        <link href="{{ asset('dist/css/fontawesome/all.min.css') }}" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="{{ asset('css/clean-blog.min.css" rel="stylesheet') }}">
        
        @include('general.navigator')
    </head>
    <body>
        <div class="all-content">
            <div class="content-header">
                @yield('page_header')
            </div>
            <section class="content">
            <div class="flex-center position-ref full-height">  
                <div class="content">
                    @yield('page_content')
                </div>
            </div>
            </section>
        </div>
    @include('general.footer')
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('js/clean-blog.min.js') }}"></script>
  
</body>

</html>
