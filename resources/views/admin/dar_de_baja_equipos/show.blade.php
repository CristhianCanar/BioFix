@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="col-10 mt-4 mx-auto">
            @component('components.card-form', ['title' => 'Detalles baja de equipo'])
                <div class="form-group">
                    <label class="form-label" for="departamento_id">Nombre Equipo</label>
                    <p>{{ $bajaEquipo->equipo->nombre }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="municipio_id">Serie</label>
                    <p>{{ $bajaEquipo->equipo->serie }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Modelo</label>
                    <p>{{ $bajaEquipo->equipo->modelo }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Marca</label>
                    <p>{{ $bajaEquipo->equipo->marca }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="departamento_id">Fecha de baja</label>
                    <p>{{ $bajaEquipo->baja_fecha }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="municipio_id">Motivo de baja</label>
                    <p>{{ $bajaEquipo->baja_motivo }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Evaluación técnica</label>
                    <p>{{ $bajaEquipo->evaluacion_tecnica }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Evaluación clinica</label>
                    <p>{{ $bajaEquipo->evaluacion_clinica }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Observaciones</label>
                    <p>{{ $bajaEquipo->observaciones }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Cláusula</label>
                    <p>{{ $bajaEquipo->clausula }}</p>
                </div>

                <div class="form-group mt-4 mx-auto">
                    <a href="{{ route('unsubscribe.index') }}" class="btn btn-default btn-block"><i
                            class="la icon-logout mr-3"></i>Regresar</a>
                </div>
            @endcomponent
        </div>
    </div>
@endsection
