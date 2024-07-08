@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="col-12 col-md-10 mt-4 mx-auto">
            @component('components.card-form', ['title' => 'Detalles usuario'])
                <div class="form-group">
                    <label class="form-label" for="departamento_id">Identificación</label>
                    <p>{{ $usuario->identificacion }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="municipio_id">Nombres</label>
                    <p>{{ $usuario->nombre }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Apellidos</label>
                    <p>{{ $usuario->apellido }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Email</label>
                    <p>{{ $usuario->email }}</p>
                </div>

                @if ($usuario->empresa_id)
                    <div class="form-group">
                        <label class="form-label" for="text">Empresa</label>
                        <p>{{ $usuario->empresa->razon_social }}</p>
                    </div>
                @endif

                <div class="form-group">
                    <label class="form-label" for="text">Rol</label>
                    <p>{{ str_replace('[','',str_replace(']','',$usuario->getRoleNames())) }}</p>
                </div>

                <div class="form-group mt-4 mx-auto">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-default btn-block"><i class="la icon-logout mr-3"></i>Regresar</a>
                </div>
            @endcomponent
        </div>
    </div>
@endsection
