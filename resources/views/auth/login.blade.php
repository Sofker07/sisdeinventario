@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-white rounded-5" style="margin-top: 3rem;">
                <div class="card-header bg-white rounded-5" style="color: #DB0F7B; text-align:center; font-size: 25px">
                    {{ __('Iniciar Sesión') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <br><br>
                        <div class="mb-3">
                            <label for="email" class="form-label" style="font-size:22px">{{ __('Correo electrónico') }}</label>
                            <input id="email" type="email" placeholder="Correo electrónico" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  
                                style="font-size:18px">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label"  style="font-size:22px">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" placeholder="Contraseña" 
                                class="form-control @error('password') is-invalid @enderror" 
                                name="password" required autocomplete="current-password"  
                                style="font-size:18px">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Recuérdame') }}
                                </label>
                            </div>
                        </div>
                        <br><br>
                        <div class="mb-3">
                            <button type="submit" class="btn w-100" style="background-color: #DB0F7B; color: white;">
                                {{ __('Acceder') }}
                            </button>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #DB0F7B">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
