@extends('layouts.welcome')

@section('page_header')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('dist/img/contact-bg.jpg') }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Contáctanos</h1>
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
                <p style="font-size:40px"><b>¿Quieres Contactarnos?</b></p>
                <p>Eso de formularios de correo ya está de moda, no te quedes atrás. Buscanos en nuestras redes.</p>

                {{-- <form name="sentMessage" id="contactForm" novalidate>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Name" id="name" name="name" required data-validation-required-message="Ingrese un nombre.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email Address</label>
              <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Ingrese un correo eletrónico.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Phone Number</label>
              <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Ingrese un número telefónico.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Ingrese un mensaje."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Enviar</button>
        </form> --}}

                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <ul class="list-inline text-center">
                                <p>
                                    <li class="list-inline-item">
                                        <a href="#" target=_blank>
                                            <span class="fa-stack fa-lg">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                            </span>
                                            twitter.com/CyberNews&MediumSpace;&MediumSpace;&MediumSpace;&MediumSpace;&MediumSpace;
                                        </a>
                                    </li>
                                </p>
                                <p>
                                    <li class="list-inline-item">
                                        <a href="#" target=_blank>
                                            <span class="fa-stack fa-lg">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                            </span>
                                            facebook.com/CyberNews
                                        </a>
                                    </li>
                                </p>
                                <p>
                                    <li class="list-inline-item">
                                        <a href="https://instagram.com/jesus.raynieri" target=_blank>
                                            <span class="fa-stack fa-lg">
                                                <i class="fas fa-circle fa-stack-2x"></i>
                                                <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                                            </span>
                                            instagram.com/CyberNews
                                        </a>
                                    </li>
                                </p>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection
