@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="col-10 mt-4 mx-auto">
            @component('components.card-form', ['title' => 'Actualizar responsable mantenimiento', 'show' => false])
                <form action="{{ route('responsables_mantenimientos.update', $responsableMantenimiento->id) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="form-label" for="identificacion">Identificación <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('identificacion') is-invalid @enderror" name="identificacion"
                            id="identificacion" value="{{ $responsableMantenimiento->identificacion }}" required>

                        @error('identificacion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nombre">Nombres <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                            id="nombre" value="{{ $responsableMantenimiento->nombre }}" maxlength="50" required>

                        @error('nombre')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="apellido">Apellidos <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido"
                            id="apellido" value="{{ $responsableMantenimiento->apellido }}" maxlength="50" required>

                        @error('apellido')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="telefono">Telefono <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                            id="telefono" value="{{ $responsableMantenimiento->telefono }}" required>

                        @error('telefono')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="cargo">Cargo <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('cargo') is-invalid @enderror" name="cargo"
                            id="cargo" value="{{ $responsableMantenimiento->cargo }}" maxlength="50" required>

                        @error('cargo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-4 d-flex justify-content-between mx-2">
                        <a href="{{ route('responsables_mantenimientos.index') }}" class="btn btn-default col-5" type="button">
                            <i class="la icon-close mr-2"></i> Cancelar
                        </a>

                        <button class="btn btn-success col-5" type="submit">
                            <i class="la icon-check mr-2"></i> Actualizar
                        </button>
                    </div>
                </form>
            @endcomponent
        </div>
    </div>
@endsection
