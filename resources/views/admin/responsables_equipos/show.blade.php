@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="col-12 col-md-10 mt-4 mx-auto">
            @component('components.card-form', ['title' => 'Detalles responsable equipo'])
                <div class="form-group">
                    <label class="form-label" for="departamento_id">Identificación</label>
                    <p>{{ $responsableEquipo->identificacion }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="municipio_id">Nombres</label>
                    <p>{{ $responsableEquipo->nombre }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Apellidos</label>
                    <p>{{ $responsableEquipo->apellido }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Telefono</label>
                    <p>{{ $responsableEquipo->telefono }}</p>
                </div>

                @if ($responsableEquipo->empresa_id)
                    <div class="form-group">
                        <label class="form-label" for="text">Empresa</label>
                        <p>{{ $responsableEquipo->empresas->razon_social }}</p>
                    </div>
                @endif

                <div class="form-group mt-4 mx-auto">
                    <a href="{{ route('responsables_equipos.index') }}" class="btn btn-default btn-block"><i class="la icon-logout mr-3"></i>Regresar</a>
                </div>
            @endcomponent
        </div>
    </div>
@endsection
