@extends('layouts.auth')

@section('title', 'Registrar')

@section('content')
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>SIPII</b></a>
                <div class="small text-muted">Sistema de Prevención de Incendios e Información Integral</div>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Registrar una nueva cuenta</p>

                <form action="{{ route('login.index') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nombre completo" aria-label="Nombre">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-user"></span></div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Correo electrónico" aria-label="Correo">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Confirmar contraseña" aria-label="Confirmar">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Teléfono" aria-label="Teléfono">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-phone"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                        </div>
                    </div>
                </form>

                <p class="mb-0 mt-3 text-center">
                    <a href="{{ route('login.index') }}" class="text-center">Ya tengo una cuenta</a>
                </p>
            </div>
        </div>
    
@endsection


