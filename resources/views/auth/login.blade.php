@extends('layouts.app')

@section('content')
    <section class="vh-100" style="background-color: #fff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                    <div class="col-md-6 col-lg-5 d-none d-md-block">
                        <img src="{{ asset('images/frontITSCH.jpg') }}"
                        alt="Imagen del ITSCH" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="d-flex align-items-center mb-3 pb-1">
                                    <img src="{{ asset('images/itsch.jpg') }}" alt="Logo ITSCH" style="width: 60px">
                                    <span class="h1 fw-bold mb-0">ITSCH</span>
                                </div>

                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Panel de administración del ITSCH</h5>

                                <div class="form-outline mb-4">
                                    <input type="email" id="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                    <label class="form-label" for="email">Email address</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="password" class="form-control form-control-lg" name="password" required autocomplete="current-password" />
                                    <label class="form-label" for="password">Password</label>
                                </div>

                                <div class="pt-1 mb-4">
                                    <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                </div>
                                <br>  
                                <a href="{{ route('password.request') }}" class="small text-muted">¿Olvidaste tu contraseña?</a>                                              
                                <br>
                                <br>
                                <a href="https://github.com/kioselsa" target="about_blank" class="small text-muted" >Created by kioselsa</a>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
@endsection
