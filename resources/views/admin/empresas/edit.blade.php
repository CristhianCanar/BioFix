@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="col-10 mt-4 mx-auto">
            @component('components.card-form', ['title' => 'Actualizar empresa', 'show' => false])
                <form action="{{ route('empresas.update', ['empresa' => $empresa->id]) }}" method="POST"
                    enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="form-label" for="departamento_id">Departamento <span class="text-danger">*</span></label>
                        <select class="form-control" name="departamento_id" id="departamento_id" required>
                            <option value="{{ $empresa->municipios->departamentos->id_departamento }}" selected>
                                {{ $empresa->municipios->departamentos->nombre }}</option>
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id_departamento }}">
                                    {{ $departamento->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('departamento_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="municipio_id">Municipio <span class="text-danger">*</span></label>
                        <select class="form-control" name="municipio_id" id="municipio_id" required
                            src={{ route('empresas.get_municipios', '#') }}>
                            <option value="{{ $empresa->municipio_id }}" selected>{{ $empresa->municipios->nombre }}</option>
                        </select>
                        @error('municipio_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="text">NIT <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nit') is-invalid @enderror" name="nit"
                            id="nit" value="{{ $empresa->nit }}" maxlength="50" required>
                        @error('nit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="text">Razón social <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('razon_social') is-invalid @enderror"
                            name="razon_social" id="razon_social" value="{{ $empresa->razon_social }}" maxlength="200" required>
                        @error('razon_social')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="text">Número de contrato <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('numero_contrato') is-invalid @enderror"
                            name="numero_contrato" id="numero_contrato" value="{{ $empresa->numero_contrato }}" maxlength="200"
                            required>
                        @error('numero_contrato')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="text">Dirección <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion"
                            id="direccion" value="{{ $empresa->direccion }}" maxlength="200" required>
                        @error('direccion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="text">Teléfono <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                            id="telefono" value="{{ $empresa->telefono }}" maxlength="20" required>
                        @error('telefono')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-4 mx-auto">
                        <button class="btn btn-info w-100" type="submit"><i class="la icon-note mr-3"></i>
                            Actualizar</button>
                    </div>
                </form>
            @endcomponent
        </div>
    </div>
    <script>
        /* municipalities */
        $("#departamento_id").on('change', function() {
            $("#municipio_id").empty();
            if ($(this).val().length == 0) {
                return false;
            } else {
                $("#municipio_id")
                    .addClass('fas fa-spinner')
                    .load($("#municipio_id").attr('src').replace('#', $(this).val()), function() {
                        $("#municipio_id").prepend($("<option/>").attr({
                                selected: true,
                                disabled: true
                            }).html('Seleccione municipio'))
                            .removeClass('fas fa-spinner')
                    });
            }
        });
    </script>
@endsection
