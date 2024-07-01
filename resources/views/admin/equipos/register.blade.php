@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="col-10 mt-4 mx-auto">
            @component('components.card-form', ['title' => 'Registrar equipo', 'show' => false])
                <form action="{{ route('equipos.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation"
                    novalidate>
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label class="form-label" for="text">Código <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo"
                            id="codigo" value="{{ old('codigo') }}" maxlength="100" required>
                        @error('codigo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="text">Nombre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                            id="nombre" value="{{ old('nombre') }}" maxlength="200" required>
                        @error('nombre')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="text">Tipo de equipo <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('tipo_equipo') is-invalid @enderror" name="tipo_equipo"
                            id="tipo_equipo" value="{{ old('tipo_equipo') }}" maxlength="200" required>
                        @error('tipo_equipo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="text">Fecha de ingreso <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('fecha_ingreso') is-invalid @enderror"
                            name="fecha_ingreso" id="fecha_ingreso" value="{{ old('fecha_ingreso') }}" required>
                        @error('fecha_ingreso')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="text">Fecha de vencimiento <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('fecha_vencimiento') is-invalid @enderror"
                            name="fecha_vencimiento" id="fecha_vencimiento" value="{{ old('fecha_vencimiento') }}" required>
                        @error('fecha_vencimiento')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="text">Imagen del equipo</label>
                        <input type="file" class="form-control @error('url_imagen') is-invalid @enderror" name="url_imagen"
                            id="url_imagen" value="{{ old('url_imagen') }}" accept="image/*">
                        @error('url_imagen')
                            <div class="invalid-feedback">
                                {{ $message }}
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
