@extends('layouts.admin')

@section('estilos')
  <style>
    /* Cambiar el fondo al hacer hover */
    .btn-outline-secondary:hover {
      background-color: #ff69b4; /* Cambia a rosa (puedes elegir otro color) */
      border-color: #ff69b4; /* Cambiar el borde al mismo color del fondo */
      color: #fff; /* Cambia el texto a blanco para mejor contraste */
    }
    /* Cambiar el color del borde al hacer focus */
    input:focus {
      border-color: #ff69b4 !important; /* Cambia al color rosado */
      box-shadow: 0 0 0 0.25rem rgba(255, 105, 180, 0.25); /* Añade un efecto de sombra suave */
      outline: none; /* Opcional: remueve el borde interno */
    }
  </style>
@endsection

@section('content')
  <div class="content" style="margin-left: 20px">
    <h1>Actualización del un usuario</h1>

    @if ($message = Session::get('mensaje'))
      <script>
          Swal.fire({
            title: "Buen trabajo!",
            text: "{{$message}}",
            icon: "success"
          });
      </script>
    @endif

    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-pink">
          <div class="card-header">
            <h3 class="card-title"><b>Llene los datos de forma correcta</b></h3>
          </div>
          <div class="card">        
            <div class="card-body">
              <form method="POST" action="{{ url('/usuarios',$usuario->id) }}">
                @csrf  
                {{method_field('PATCH')}}      
                <div class="row mb-3">
                  <label for="name" class="col-md-4 col-form-label text-md-end">Nombre completo</label>        
                    <div class="col-md-6">
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$usuario->name}}" required autocomplete="name" autofocus>
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                </div>
                <div class="row mb-3">
                  <label for="email" class="col-md-4 col-form-label text-md-end">Correo electrónico</label>
                  <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$usuario->email}}" required autocomplete="email">        
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>        
                <div class="row mb-3">
                  <label for="password" class="col-md-4 col-form-label text-md-end">Nueva contraseña</label>
                  <div class="col-md-6">
                    <div class="input-group">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      <button type="button" class="btn btn-outline-secondary toggle-password">
                        <i class="fa fa-eye"></i>
                    </button>
                    </div>
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>        
                <div class="row mb-3">
                  <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmar contraseña</label>
                  <div class="col-md-6">
                    <div class="input-group">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      <button type="button" class="btn btn-outline-secondary toggle-password">
                        <i class="fa fa-eye"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <a href="{{url('usuarios')}}" class="btn btn-secondary">
                      Cancelar
                    </a>
                    <button type="submit" class="btn" style="background-color:#E83E8C; color:white">
                      Actualizar usuario
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('códigoJS')
  <script>
    document.getElementById('registerForm').addEventListener('submit', function (e) {
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('password-confirm').value;

      if (password !== confirmPassword) {
        e.preventDefault(); // Evita el envío del formulario
        Swal.fire({
          title: "Error",
          text: "Las contraseñas no coinciden. Por favor, verifica.",
          icon: "error"
        });
      }
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
        const togglePasswordButtons = document.querySelectorAll('.toggle-password');

        togglePasswordButtons.forEach(button => {
            button.addEventListener('click', () => {
                const passwordField = button.previousElementSibling; // El campo input antes del botón
                const isPasswordVisible = passwordField.type === 'text';
                passwordField.type = isPasswordVisible ? 'password' : 'text';

                // Cambiar el ícono
                const icon = button.querySelector('i');
                icon.classList.toggle('fa-eye', isPasswordVisible);
                icon.classList.toggle('fa-eye-slash', !isPasswordVisible);
            });
        });
    });
</script>  
@endpush