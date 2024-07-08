@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="col-12 col-md-10 mt-4 mx-auto">
            @component('components.card-form', [
                'title' => 'Ver observaciones para dar de baja al equipo',
                'show' => true,
            ])
                <div class="form-group">
                    <h4><b>Datos del equipo</b></h4>
                    <div class="row justify-content-around">
                        <div>
                            <strong class="text-dark">Nombre:</strong>
                            <p class="text-muted">{{ $equipo->nombre }}</p>
                        </div>
                        <div>
                            <strong class="text-dark">Serie:</strong>
                            <p class="text-muted">{{ $equipo->serie }}</p>
                        </div>
                        <div>
                            <strong class="text-dark">Modelo:</strong>
                            <p class="text-muted">{{ $equipo->modelo }}</p>
                        </div>
                        <div>
                            <strong class="text-dark">Marca:</strong>
                            <p class="text-muted">{{ $equipo->marca }}</p>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label" for="text">Observaciones para dar de baja al equipo</label>
                        <textarea class="form-control" placeholder="No hay observaciones registradas..." disabled>{{ $equipo->observacion_baja != null ? $equipo->observacion_baja : '' }}</textarea>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('unsubscribe.index.observation') }}" class="btn btn-default col" type="button">
                        <i class="la icon-close mr-2"></i> Regresar
                    </a>
                </div>
            @endcomponent
        </div>
    </div>
@endsection
