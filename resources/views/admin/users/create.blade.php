@extends('layouts.admin')

@section('header_content')
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Usuarios</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
      <li class="breadcrumb-item active">Usuarios</li>
    </ol>
  </div><!-- /.col -->
@endsection
@section('main_content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <h2><center> Crear Usuario </center></h2>
                </div>
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" >
                      <strong>Error! </strong> {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach

                <!-- /.card-header -->
                <div class="card-body">
                    <form role="form" id="users" name="users" method="post" action="{{ url('/admin/users') }}">
                        @method('POST')
                        @csrf
                        @include('admin.users.fields')       
                        <div class="form-group">
                            <div class="controls">
                                <a href="{{ url('/admin/users') }}" class="btn-cancel1">Cancelar</a>
                                <input class="btn-send1" type="submit" name="send" id="send" value="Grabar"/>
                            </div>
                        </div>             
                    </form>
        
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
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
      $.validator.setDefaults({
        submitHandler: function () {
          $("#users").submit();
        }
      });
      $('#users').validate({
        rules: {
          name: {
            required: true
          },
          email: {
            required: true,
            email: true,
          },
          role_id: {
            required: true
          },
          password: {
            required: true,
            minlength: 8,
            maxlength: 16
          },
          pass2: {
            required: true,
            equalTo: "#password"
          },

        },
        messages: {
          name: {
            required: "Por favor introduzca un nombre."
          },
          email: {
            required: "Por favor introduzca su correo electrónico.",
            email: "Por favor introduzca un correo electrónico válido."
          },
          role_id: {
            required: "Por favor seleccione un rol."
          },
          password: {
            required: "Por favor introduzca una contraseña",
            minlength: "Su contraseña debe de tener al menos 8 caracteres.",
            maxlength: "Su contraseña no debe contener mas de 16 caracteres."
          },
          pass2: {
            required: "Por favor debe repetir la contraseña.",
            equalTo: "Las contraseñas introducidas no coinciden."
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
</script>

@endsection