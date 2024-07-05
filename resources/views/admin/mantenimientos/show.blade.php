@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <h1 class="text-center"><b>Detalles de mantenimientos</b></h1>
        @foreach ($mantenimientos as $mantenimiento)
            <div class="col-10 mt-4 mx-auto">
                @component('components.card-form', ['title' => 'Mantenimiento N°' . $loop->iteration])
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12">
                            <label class="form-label" for="text">
                                Equipo ( Serie - Nombre - Modelo )
                            </label>
                            <p>{{ $mantenimiento->equipos->serie }} - {{ $mantenimiento->equipos->nombre }} -
                                {{ $mantenimiento->equipos->modelo }}</p>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">
                                Fecha mantenimiento
                            </label>
                            <p> {{ $mantenimiento->fecha_mantenimiento }} </p>
                        </div>
                        <div class="form-check col-12 col-md-4 d-flex align-items-center mt-4">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $mantenimiento->retiro_equipo_IPS ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">¿Retiro equipo de IPS?</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-4 d-flex align-items-center mt-4">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $mantenimiento->equipo_funcionando ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">¿El equipo queda en funcionamiento?</span>
                            </label>
                        </div>
                    </div>

                    {{-- VERIFICACION BIOSEGURIDAD --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Verificación de bioseguridad</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-8 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $mantenimiento->vb_pregunta_uno ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">
                                    ¿El equipo médico se entrega limpio y desinfectado para realizar
                                    la actividad de mantenimiento?
                                </span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-8 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $mantenimiento->vb_pregunta_dos ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">
                                    ¿El mantenimiento cuenta con los implementos de dotación necesarios para garantizar la
                                    seguridad?
                                </span>
                            </label>
                        </div>
                    </div>

                    {{-- REPUESTOS --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Repuestos</b></h2>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @foreach ($mantenimiento->repuestos as $repuesto)
                                <div class="form-row justify-content-center repuesto">
                                    <div class="form-group col-3 col-md-3">
                                        <label class="form-label" for="text">
                                            Fecha reporte
                                        </label>
                                        <input type="date" class="form-control" value="{{ $repuesto['fecha_reporte'] }}"
                                            disabled>
                                    </div>
                                    <div class="form-group col-4 col-md-3">
                                        <label class="form-label" for="text">
                                            Nombre repuesto
                                        </label>
                                        <input type="text" class="form-control" value="{{ $repuesto['repuesto'] }}" disabled>
                                    </div>
                                    <div class="form-group col-4 col-md-3">
                                        <label class="form-label" for="text">
                                            Nombre proveedor
                                        </label>
                                        <input type="text" class="form-control" value="{{ $repuesto['proveedor'] }}"
                                            disabled>
                                    </div>
                                    <div class="form-group col-2 col-md-3">
                                        <label class="form-label" for="text">
                                            Cantidad
                                        </label>
                                        <input type="number" class="form-control" value="{{ $repuesto['cantidad'] }}"
                                            disabled>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- VERIFICACION FUNCIONAMIENTO --}}
                    <div class="form-row justify-content-center  mt-4">
                        <h2><b>Verificación de funcionamiento</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-3 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $mantenimiento->vf_carcasa ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">
                                    ¿El equipo tiene carcasa?
                                </span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-3 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $mantenimiento->vf_etiquetado ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">
                                    ¿El equipo tiene etiquetado?
                                </span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-3 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $mantenimiento->vf_estructura_soporte ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">
                                    ¿El equipo tiene estructura de soporte?
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-4 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $mantenimiento->vf_integridad_rosca_tapa ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">
                                    ¿La integridad de la rosca es correcta?
                                </span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-4 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $mantenimiento->vf_revision_limpieza_tanque ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">
                                    ¿Revisión de la limpieza de tanque?
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-4 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $mantenimiento->vf_revision_fuga_gas ? 'checked' : '' }} disabled>
                            </label>
                            @error('vf_revision_fuga_gas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-4 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $mantenimiento->vf_condicion_entorno ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">
                                    ¿Condiciones de entorno (Humedad, temperatura)?
                                </span>
                            </label>
                        </div>
                    </div>

                    {{-- MANTENIMIENTO --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Mantenimiento</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-4 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $mantenimiento->m_limpieza_externa ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">
                                    ¿Limpieza externa?
                                </span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-4 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $mantenimiento->m_limpieza_interna ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">
                                    ¿Limpieza interna?
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-4 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $mantenimiento->m_ajustes ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">
                                    ¿Ajustes?
                                </span>
                            </label>
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Tiempo usado (minutos)</label>
                            <p>{{ $mantenimiento->m_tiempo_usado }}</p>
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
                            <label class="form-label" for="text">Responsable (Nombres Apellidos)</label>
                            <p>{{ $mantenimiento->responsables->nombre }} {{ $mantenimiento->responsables->apellido }}</p>
                        </div>
                    </div>
                @endcomponent
            </div>
        @endforeach
        <div class="form-group col-10 mt-4 mx-auto">
            <a href="{{ route('equipos.index') }}" class="btn btn-default btn-block"><i
                    class="la icon-logout mr-3"></i>Regresar</a>
        </div>
    </div>
@endsection
