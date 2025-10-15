@extends('layouts.auth')

@section('title', 'Iniciar sesión')

@section('content')
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>SIPII</b></a>
                <div class="small text-muted">Sistema de Prevención de Incendios e Información Integral</div>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Inicia sesión para comenzar</p>

                <form action="{{ url('/simulacion') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="admin@example.com" aria-label="Correo">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="••••••••" aria-label="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                        </div>
                    </div>
                </form>

                <p class="mb-0 mt-3 text-center">
                    <a href="{{ route('register.index') }}" class="text-center">Registrar una nueva cuenta</a>
                </p>
            </div>
        </div>
    
@endsection


