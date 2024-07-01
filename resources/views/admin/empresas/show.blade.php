@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="col-10 mt-4 mx-auto">
            @component('components.card-form', ['title' => 'Detalles empresa'])
                <div class="form-group">
                    <label class="form-label" for="departamento_id">Departamento</label>
                    <p>{{ $empresa->municipios->departamentos->nombre }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="municipio_id">Municipio</label>
                    <p>{{ $empresa->municipios->nombre }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">NIT</label>
                    <p>{{ $empresa->nit }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Razón social</label>
                    <p>{{ $empresa->razon_social }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Número de contrato</label>
                    <p>{{ $empresa->numero_contrato }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Dirección</label>
                    <p>{{ $empresa->direccion }}</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="text">Teléfono</label>
                    <p>{{ $empresa->telefono }}</p>
                </div>

                <div class="form-group mt-4 mx-auto">
                    <a href="{{ route('empresas.index') }}" class="btn btn-danger w-100 text-white"><i class="la icon-logout mr-3"></i>Regresar</a>
                </div>
            @endcomponent
        </div>
    </div>
@endsection
