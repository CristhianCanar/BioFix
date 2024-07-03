@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="col-10 mt-4 mx-auto">
            @component('components.card-form', ['title' => 'Actualizar responsable equipo', 'show' => false])
                <form action="{{ route('responsables_equipos.update', $responsableEquipo->id) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="form-label" for="identificacion">Identificación <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('identificacion') is-invalid @enderror" name="identificacion"
                            id="identificacion" value="{{ $responsableEquipo->identificacion }}" required>

                        @error('identificacion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nombre">Nombres <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                            id="nombre" value="{{ $responsableEquipo->nombre }}" maxlength="50" required>

                        @error('nombre')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="apellido">Apellidos <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido"
                            id="apellido" value="{{ $responsableEquipo->apellido }}" maxlength="50" required>

                        @error('apellido')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="telefono">Telefono <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                            id="telefono" value="{{ $responsableEquipo->telefono }}" required>

                        @error('telefono')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="empresa_id">Empresa</label>
                        <select class="form-control" name="empresa_id" id="empresa_id" required>
                            <option value="" selected disabled>Seleccione...</option>
                            @foreach ($empresas as $empresa)
                                <option value="{{ $empresa->id }}" {{ (isset($responsableEquipo->empresa_id) && $responsableEquipo->empresa_id == $empresa->id) ? 'selected' : ''}}>
                                    {{ $empresa->nit.' - '.$empresa->razon_social }}
                                </option>
                            @endforeach
                        </select>

                        @error('empresa_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-4 d-flex justify-content-between mx-2">
                        <a href="{{ route('responsables_equipos.index') }}" class="btn btn-default col-5" type="button">
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
