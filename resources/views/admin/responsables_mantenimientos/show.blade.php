@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="col-10 mt-4 mx-auto">
            @component('components.card-form', ['title' => 'Detalles responsable mantenimiento'])
                <div class="form-group">
                    <label class="form-label" for="departamento_id">Identificación</label>
                    <p>{{ $responsableMantenimiento->identificacion }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="municipio_id">Nombres</label>
                    <p>{{ $responsableMantenimiento->nombre }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Apellidos</label>
                    <p>{{ $responsableMantenimiento->apellido }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Telefono</label>
                    <p>{{ $responsableMantenimiento->telefono }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Cargo</label>
                    <p>{{ $responsableMantenimiento->cargo }}</p>
                </div>

                <div class="form-group mt-4 mx-auto">
                    <a href="{{ route('responsables_mantenimientos.index') }}" class="btn btn-default btn-block"><i class="la icon-logout mr-3"></i>Regresar</a>
                </div>
            @endcomponent
        </div>
    </div>
@endsection
