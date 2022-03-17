@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-4 ">
            <div class="card" style="width:290px">
                <img class="card-img-top" src="{{asset('images/login-w-icon.png')}}" alt="Card image" style="width:100%">
                <div class="card-body">
                  <h4 class="card-title">Login</h4>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Correo</span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Contraseña</span>
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordar datos de usuario') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">
                                    Entrar
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link"href="{{ route('password.request') }}">
                                        {{ __('No recuerda su contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
<br>
<br>
@endsection
