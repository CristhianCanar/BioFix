@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="col-10 mt-4 mx-auto">
            @component('components.card-form', ['title' => 'Registrar baja de equipo', 'show' => false])
                <form action="{{ route('unsubscribe.store', ['equipoId' => $equipo->id]) }}" method="POST"
                    enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('POST')
                    <div class="form-row justify-content-center">
                        <h2><b>Datos básicos</b></h2>
                    </div>
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

                    <div class="row form-group">
                        <div class="form-group col-md-6 col-12">
                            <label class="form-label" for="baja_fecha">Fecha de baja <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('baja_fecha') is-invalid @enderror"
                                name="baja_fecha" id="baja_fecha" value="{{ old('baja_fecha') }}" maxlength="50" required>

                            @error('baja_fecha')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-12">
                            <label class="form-label" for="baja_motivo">Motivo de baja <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="baja_motivo" id="baja_motivo" required>
                                <option value="" selected disabled>Seleccione...</option>
                                @foreach ($bajaMotivos as $bajaMotivo)
                                    <option value="{{ $bajaMotivo }}">
                                        {{ $bajaMotivo }}
                                    </option>
                                @endforeach
                            </select>

                            @error('baja_motivo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="text">Evaluación técnica <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('evaluacion_tecnica') is-invalid @enderror" name="evaluacion_tecnica"
                            id="evaluacion_tecnica" value="{{ old('evaluacion_tecnica') }}" required>{{ old('evaluacion_tecnica') }}</textarea>

                        @error('evaluacion_tecnica')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="text">Evaluación clinica <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('evaluacion_clinica') is-invalid @enderror" name="evaluacion_clinica"
                            id="evaluacion_clinica" value="{{ old('evaluacion_clinica') }}" required>{{ old('evaluacion_clinica') }}</textarea>

                        @error('evaluacion_clinica')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="text">Observaciones <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('observaciones') is-invalid @enderror" name="observaciones" id="observaciones"
                            value="{{ old('observaciones') }}" required>{{ old('observaciones') }}</textarea>

                        @error('observaciones')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="text">Cláusula <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('clausula') is-invalid @enderror" name="clausula" id="clausula"
                            value="{{ old('clausula') }}" required>{{ old('clausula') }}</textarea>

                        @error('clausula')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
