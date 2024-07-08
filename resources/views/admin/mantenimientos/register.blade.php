@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="col-12 col-md-10 mt-4 mx-auto">
            @component('components.card-form', ['title' => 'Registrar mantenimiento', 'show' => false])
                <form action="{{ route('mantenimientos.store') }}" method="POST" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    @csrf
                    @method('POST')
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12">
                            <label class="form-label" for="text">Seleccione equipo ( Serie - Nombre - Modelo )
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" name="equipo_id" id="equipo_id" required>
                                <option value="" selected disabled>Seleccione...</option>
                                @foreach ($equipos as $equipo)
                                    <option value="{{ $equipo->id }}">
                                        {{ $equipo->serie }} - {{ $equipo->nombre }} - {{ $equipo->modelo }}
                                    </option>
                                @endforeach
                            </select>
                            @error('equipo_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Fecha mantenimiento
                                <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('fecha_mantenimiento') is-invalid @enderror"
                                name="fecha_mantenimiento" id="fecha_mantenimiento" value="{{ old('fecha_mantenimiento') }}"
                                required>
                            @error('fecha_mantenimiento')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-4 d-flex align-items-center mt-4">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('retiro_equipo_IPS') is-invalid @enderror"
                                    name="retiro_equipo_IPS" id="retiro_equipo_IPS"
                                    {{ old('retiro_equipo_IPS') ? 'checked' : '' }}>
                                <span class="form-check-sign">¿Retiro equipo de IPS? <span class="text-danger">*</span></span>
                            </label>
                            @error('retiro_equipo_IPS')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-4 d-flex align-items-center mt-4">
                            <label class="form-check-label">
                                <input type="checkbox"
                                    class="form-check-input @error('equipo_funcionando') is-invalid @enderror"
                                    name="equipo_funcionando" id="equipo_funcionando"
                                    {{ old('equipo_funcionando') ? 'checked' : '' }}>
                                <span class="form-check-sign">¿El equipo queda en funcionamiento? <span
                                        class="text-danger">*</span></span>
                            </label>
                            @error('equipo_funcionando')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- VERIFICACION BIOSEGURIDAD --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Verificación de bioseguridad</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-8 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('vb_pregunta_uno') is-invalid @enderror"
                                    name="vb_pregunta_uno" id="vb_pregunta_uno" {{ old('vb_pregunta_uno') ? 'checked' : '' }}>
                                <span class="form-check-sign">
                                    ¿El equipo médico se entrega limpio y desinfectado para realizar
                                    la actividad de mantenimiento?
                                    <span class="text-danger">*</span>
                                </span>
                            </label>
                            @error('vb_pregunta_uno')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-8 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('vb_pregunta_dos') is-invalid @enderror"
                                    name="vb_pregunta_dos" id="vb_pregunta_dos" {{ old('vb_pregunta_dos') ? 'checked' : '' }}>
                                <span class="form-check-sign">
                                    ¿El mantenimiento cuenta con los implementos de dotación necesarios para garantizar la
                                    seguridad?
                                    <span class="text-danger">*</span>
                                </span>
                            </label>
                            @error('vb_pregunta_dos')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- REPUESTOS --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Repuestos</b></h2>
                    </div>
                    <div class="row">
                        <div class="col-10">
                            <div id="repuestos-container">
                                <div class="form-row justify-content-center repuesto">
                                    <div class="form-group col-3 col-md-3">
                                        <label class="form-label" for="text">
                                            Fecha reporte
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" class="form-control" name="repuestos[0][fecha_reporte]">
                                    </div>
                                    <div class="form-group col-4 col-md-3">
                                        <label class="form-label" for="text">
                                            Nombre repuesto
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="repuestos[0][repuesto]" maxlength="100">
                                    </div>
                                    <div class="form-group col-4 col-md-3">
                                        <label class="form-label" for="text">
                                            Nombre proveedor
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="repuestos[0][proveedor]" maxlength="100">
                                    </div>
                                    <div class="form-group col-2 col-md-3">
                                        <label class="form-label" for="text">
                                            Cantidad
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control" name="repuestos[0][cantidad]" min="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 mt-4">
                            <div class="row">
                                <div class="col-2 col-md-3">
                                    <a class="text-decoration-none" id="add-repuesto" style="cursor: pointer;">
                                        <i class="fas fa-plus-circle text-primary" style="font-size: 1.5rem;"></i>
                                    </a>
                                </div>
                                <div class="col-2 col-md-3">
                                    <a class="text-decoration-none" id="remove-repuesto" style="cursor: pointer;">
                                        <i class="fas fas fa-trash text-danger" style="font-size: 1.5rem;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- VERIFICACION FUNCIONAMIENTO --}}
                    <div class="form-row justify-content-center  mt-4">
                        <h2><b>Verificación de funcionamiento</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-3 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('vf_carcasa') is-invalid @enderror"
                                    name="vf_carcasa" id="vf_carcasa" {{ old('vf_carcasa') ? 'checked' : '' }}>
                                <span class="form-check-sign">
                                    ¿El equipo tiene carcasa?
                                    <span class="text-danger">*</span>
                                </span>
                            </label>
                            @error('vf_carcasa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-3 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('vf_etiquetado') is-invalid @enderror"
                                    name="vf_etiquetado" id="vf_etiquetado" {{ old('vf_etiquetado') ? 'checked' : '' }}>
                                <span class="form-check-sign">
                                    ¿El equipo tiene etiquetado?
                                    <span class="text-danger">*</span>
                                </span>
                            </label>
                            @error('vf_etiquetado')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-3 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox"
                                    class="form-check-input @error('vf_estructura_soporte') is-invalid @enderror"
                                    name="vf_estructura_soporte" id="vf_estructura_soporte"
                                    {{ old('vf_estructura_soporte') ? 'checked' : '' }}>
                                <span class="form-check-sign">
                                    ¿El equipo tiene estructura de soporte?
                                    <span class="text-danger">*</span>
                                </span>
                            </label>
                            @error('vf_estructura_soporte')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-4 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox"
                                    class="form-check-input @error('vf_integridad_rosca_tapa') is-invalid @enderror"
                                    name="vf_integridad_rosca_tapa" id="vf_integridad_rosca_tapa"
                                    {{ old('vf_integridad_rosca_tapa') ? 'checked' : '' }}>
                                <span class="form-check-sign">
                                    ¿La integridad de la rosca es correcta?
                                    <span class="text-danger">*</span>
                                </span>
                            </label>
                            @error('vf_integridad_rosca_tapa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-4 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox"
                                    class="form-check-input @error('vf_revision_limpieza_tanque') is-invalid @enderror"
                                    name="vf_revision_limpieza_tanque" id="vf_revision_limpieza_tanque"
                                    {{ old('vf_revision_limpieza_tanque') ? 'checked' : '' }}>
                                <span class="form-check-sign">
                                    ¿Revisión de la limpieza de tanque?
                                    <span class="text-danger">*</span>
                                </span>
                            </label>
                            @error('vf_revision_limpieza_tanque')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-4 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox"
                                    class="form-check-input @error('vf_revision_fuga_gas') is-invalid @enderror"
                                    name="vf_revision_fuga_gas" id="vf_revision_fuga_gas"
                                    {{ old('vf_revision_fuga_gas') ? 'checked' : '' }}>
                                <span class="form-check-sign">
                                    ¿Revisión fuga de gas?
                                    <span class="text-danger">*</span>
                                </span>
                            </label>
                            @error('vf_revision_fuga_gas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-4 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox"
                                    class="form-check-input @error('vf_condicion_entorno') is-invalid @enderror"
                                    name="vf_condicion_entorno" id="vf_condicion_entorno"
                                    {{ old('vf_condicion_entorno') ? 'checked' : '' }}>
                                <span class="form-check-sign">
                                    ¿Condiciones de entorno (Humedad, temperatura)?
                                    <span class="text-danger">*</span>
                                </span>
                            </label>
                            @error('vf_condicion_entorno')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- MANTENIMIENTO --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Mantenimiento</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-4 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox"
                                    class="form-check-input @error('m_limpieza_externa') is-invalid @enderror"
                                    name="m_limpieza_externa" id="m_limpieza_externa"
                                    {{ old('m_limpieza_externa') ? 'checked' : '' }}>
                                <span class="form-check-sign">
                                    ¿Limpieza externa?
                                    <span class="text-danger">*</span>
                                </span>
                            </label>
                            @error('m_limpieza_externa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-4 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox"
                                    class="form-check-input @error('m_limpieza_interna') is-invalid @enderror"
                                    name="m_limpieza_interna" id="m_limpieza_interna"
                                    {{ old('m_limpieza_interna') ? 'checked' : '' }}>
                                <span class="form-check-sign">
                                    ¿Limpieza interna?
                                    <span class="text-danger">*</span>
                                </span>
                            </label>
                            @error('m_limpieza_interna')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-4 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('m_ajustes') is-invalid @enderror"
                                    name="m_ajustes" id="m_ajustes" {{ old('m_ajustes') ? 'checked' : '' }}>
                                <span class="form-check-sign">
                                    ¿Ajustes?
                                    <span class="text-danger">*</span>
                                </span>
                            </label>
                            @error('m_ajustes')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Tiempo usado (minutos) <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('m_tiempo_usado') is-invalid @enderror"
                                name="m_tiempo_usado" id="m_tiempo_usado" value="{{ old('m_tiempo_usado') }}"
                                min="1" required>
                            @error('m_tiempo_usado')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row justify-content-center">
                        <h2><b>Responsable</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <p><b>Quien recibe y compromete a realizar la actividad necesaria para que el equipo este limpio y
                                desinfectado</b></p>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12">
                            <label class="form-label" for="text">Seleccione responsable <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="responsable_id" id="responsable_id" required>
                                <option value="" selected disabled>Seleccione...</option>
                                @foreach ($responsables as $responsable)
                                    <option value="{{ $responsable->id }}">
                                        {{ $responsable->nombre }} {{ $responsable->apellido }}
                                    </option>
                                @endforeach
                            </select>
                            @error('responsable_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4 justify-content-between mx-2">
                        <a href="{{ route('dashboard') }}" class="btn btn-default col-12 col-md-5 mt-2 " type="button">
                            <i class="la icon-close mr-2"></i> Cancelar
                        </a>

                        <button class="btn btn-success col-12 col-md-5 mt-2 " type="submit">
                            <i class="la icon-check mr-2"></i> Registrar
                        </button>
                    </div>

                </form>
            @endcomponent
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let index = 1;

            $('#add-repuesto').click(function() {
                $('#repuestos-container').append(
                    `<div class="form-row justify-content-center repuesto">
                        <div class="form-group col-3 col-md-3">
                            <label class="form-label" for="text">
                                Fecha reporte
                                <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control" name="repuestos[${index}][fecha_reporte]">
                        </div>
                        <div class="form-group col-4 col-md-3">
                            <label class="form-label" for="text">
                                Nombre repuesto
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="repuestos[${index}][repuesto]">
                        </div>
                        <div class="form-group col-4 col-md-3">
                            <label class="form-label" for="text">
                                Nombre proveedor
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="repuestos[${index}][proveedor]">
                        </div>
                        <div class="form-group col-2 col-md-3">
                            <label class="form-label" for="text">
                                Cantidad
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control" name="repuestos[${index}][cantidad]" min="1">
                        </div>
                    </div>`
                );
                index++;
            });

            $('#remove-repuesto').click(function() {
                if (index > 1) {
                    $('#repuestos-container .repuesto:last').remove();
                    index--;
                }
            });
        });
    </script>
@endsection
