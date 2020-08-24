@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lo sentimos.') }}</div>

                <div class="card-body">
                    <label for="name" class="col-form-label text-md-right">{{ __('Debes solicitar la cuenta a un administrador.') }}</label>
                    <br><a href="{{ url('/login') }}"> Ir al Login. </a>
                    <br><a href="{{ url('/') }}"> Ir al Inicio. </a>       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
