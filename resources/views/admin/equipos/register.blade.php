@extends('admin.layouts.app')

@section('content')
<div class="page-inner">
    <div class="col-10 mt-4 mx-auto">
        @component('components.card-form', ['title' => 'Registrar equipo'])
            <form class="needs-validation" method="POST" action="{{ route('equipos.store') }}" novalidate>
                @csrf
                @method('POST')
                <div class="form-group">
                    <label class="form-label" for="text">Código <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo"
                        id="codigo" value="{{ old('codigo') }}" maxlength="15" required>
                    <div class="invalid-feedback">
                        Escribe el código
                    </div>
                    @error('codigo')
                    <div class="invalid-feedback">
                        El código no cumple con las características mínimas
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Nombre <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                        id="nombre" value="{{ old('nombre') }}" maxlength="15" required>
                    <div class="invalid-feedback">
                        Escribe el nombre
                    </div>
                    @error('nombre')
                    <div class="invalid-feedback">
                        El nombre no cumple con las características mínimas
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Tipo de equipo <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('tipo_equipo') is-invalid @enderror" name="tipo_equipo"
                        id="tipo_equipo" value="{{ old('tipo_equipo') }}" maxlength="15" required>
                    <div class="invalid-feedback">
                        Escribe el tipo de equipo
                    </div>
                    @error('tipo_equipo')
                    <div class="invalid-feedback">
                        El tipo de equipo no cumple con las características mínimas
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Fecha de ingreso <span class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('fecha_ingreso') is-invalid @enderror" name="fecha_ingreso"
                        id="fecha_ingreso" value="{{ old('fecha_ingreso') }}" maxlength="15" required>
                    <div class="invalid-feedback">
                        Escribe la fecha de ingreso
                    </div>
                    @error('fecha_ingreso')
                    <div class="invalid-feedback">
                        La fecha de ingreso no cumple con las características mínimas
                    </div>
                    @enderror
                </div>


                <div class="form-group mt-4 mx-auto">
                    <button class="btn btn-success w-100" type="submit"><i class="la icon-pencil mr-3"></i>
                        Registrar</button>
                </div>
            </form>
        @endcomponent
    </div>
</div>
@endsection
