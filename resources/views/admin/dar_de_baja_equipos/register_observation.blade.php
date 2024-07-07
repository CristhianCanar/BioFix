@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="col-10 mt-4 mx-auto">
            @component('components.card-form', [
                'title' => 'Registrar observación para dar de baja al equipo',
                'show' => false,
            ])
                <form action="{{ route('unsubscribe.store.observation', ['equipoId' => $equipo->id]) }}" method="POST"
                    class="needs-validation" novalidate>
                    @csrf
                    @method('POST')
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
                            <textarea class="form-control @error('observacion_baja') is-invalid @enderror" name="observacion_baja"
                                placeholder="No hay observaciones registradas..." id="observacion_baja" required>{{ $equipo->observacion_baja != null ? $equipo->observacion_baja : '' }}</textarea>

                            @error('observacion_baja')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-between mx-2">
                        <a href="{{ route('equipos.index') }}" class="btn btn-default col-5" type="button">
                            <i class="la icon-close mr-2"></i> Cancelar
                        </a>
                        <button class="btn btn-success col-5" type="submit">
                            <i class="la icon-check mr-2"></i> Registrar
                        </button>
                    </div>
                </form>
            @endcomponent
        </div>
    </div>
@endsection
