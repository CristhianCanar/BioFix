@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="col-10 mt-4 mx-auto">
            @component('components.card-form', ['title' => 'Detalles equipo', 'show' => true])
                <form action="{{ route('equipos.update', ['equipo' => $equipo->id]) }}" method="POST"
                    enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-row justify-content-center">
                        <h2><b>Datos básicos</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="text">Nombre</label>
                            <p>{{ $equipo->nombre }}</p>

                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="text">Serie</label>
                            <p>{{ $equipo->serie }}</p>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="text">Servicio</label>
                            <p>{{ $equipo->servicio }}</p>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="text">Marca</label>
                            <p>{{ $equipo->marca }}</p>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="text">Responsable del equipo</label>
                            <p>{{ $equipo->responsables->nombre }}</p>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="text">Ubicación</label>
                            <p>{{ $equipo->ubicacion }}</p>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Código ECRI</label>
                            <p>{{ $equipo->codigo_ECRI }}</p>
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Empresa</label>
                            <p>{{ $equipo->empresas->razon_social }}</p>
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Número documento</label>
                            <p>{{ $equipo->numero_documento }}</p>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-4 d-flex align-items-center mt-4">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" onclick="cambiarEstadoSelectFrecCalibracion()"
                                    {{ $equipo->calibracion ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">Necesita calibración</span>
                            </label>
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Frecuencia calibración</label>
                            <p>{{ $equipo->frecuencia_calibracion }}</p>
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Frecuencia mantenimiento</label>
                            <p>{{ $equipo->frecuencia_mantenimiento }}</p>
                        </div>

                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="text">Modelo</label>
                            <p>{{ $equipo->modelo }}</p>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="text">Activo fijo</label>
                            <p>{{ $equipo->activo_fijo }}</p>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="text">Imagen del equipo</label>
                            @if ($equipo->url_imagen)
                                <div class="d-flex">
                                    <img class="img-fluid rounded w-25 mx-auto m-2"
                                        src="{{ URL::asset('storage/' . $equipo->url_imagen) }} ">
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- REGISTRO HISTORICO --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Registro histórico</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Registro INVIMA </label>
                            <p>{{ $equipo->h_reg_INVIMA }}</p>
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Registro de importación </label>
                            <p>{{ $equipo->h_reg_importacion }}</p>
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Registro FDA</label>
                            <p>{{ $equipo->h_reg_FDA }}</p>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Sitio web</label>
                            <p>{{ $equipo->h_url_sitio_web }}</p>
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Dirección proveedor</label>
                            <p>{{ $equipo->h_direccion_proveedor }}</p>
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Teléfono</label>
                            <p>{{ $equipo->h_telefono }}</p>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="departamento_id">Departamento</label>
                            <p>{{ $equipo->municipios->departamentos->nombre }}</p>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="municipio_id">Municipio</label>
                            <p>{{ $equipo->municipios->nombre }}</p>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Vida útil</label>
                            <p>{{ $equipo->h_vida_util }}</p>
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Costo</label>
                            <p>{{ $equipo->h_costo }}</p>
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Garantía</label>
                            <p>{{ $equipo->h_garantia }}</p>
                        </div>
                    </div>
                    {{-- FUENTES DE ALIMENTACION --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Fuentes de alimentación</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->fa_electrica ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Eléctrica</span>
                            </label>
                        </div>

                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->fa_bateria ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Batería</span>
                            </label>
                        </div>

                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->fa_regulada ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Regulada</span>
                            </label>
                        </div>
                    </div>

                    {{-- REGISTRO DE APOYO TECNICO --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Registro de apoyo técnico</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->at_medico ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Médico</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->at_apoyo ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Apoyo</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->at_basico ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Básico</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->at_transporte ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Transporte</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->at_clase_I ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Clase I</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->at_clase_I_IA ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Clase I IA</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->at_clase_I_IB ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Clase I IB</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->at_clase_III ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Clase III</span>
                            </label>
                        </div>
                    </div>

                    {{-- CLASIFICACION TECNOLOGICA --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Clasificación tecnológica</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->ct_mecanica ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Mecánica</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->ct_hidraulica ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Hidráulica</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->ct_neumatica ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Neumática</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $equipo->ct_electrica_electronica ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">Eléctrica electrónica</span>
                            </label>
                        </div>
                    </div>

                    {{-- PLANOS --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Planos</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->p_electricos ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Eléctricos</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->p_mecanicos ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Mecánicos</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->p_hidraulicos ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Hidráulicos</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->p_otros ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Otros</span>
                            </label>
                        </div>
                    </div>

                    {{-- MANUALES --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Manuales</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->m_usuario ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Usuario</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->m_instalacion ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Instalación</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->m_partes ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Partes</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->m_otros ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Otros</span>
                            </label>
                        </div>
                    </div>

                    {{--  REG EVAL OPERATIVA ESTADO FUNCIONAL --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Registro evaluación operativa estado funcional</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-8">
                            <label class="form-label" for="text">Estado funcional</label>
                            <p>{{ $equipo->estado_funcional }}</p>
                        </div>
                    </div>

                    {{--  ACCESORIOS --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Accesorios</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $equipo->registra_accesorios ? 'checked' : '' }} disabled>
                                <span class="form-check-sign"> ¿Registra accesorios?</span>
                            </label>
                        </div>
                    </div>

                    {{-- RECOMENDACIONES DEL FABRICANTE --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Recomendaciones del fabricante</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-10">
                            <label class="form-label" for="text">Recomendaciones</label>
                            <textarea class="form-control" disabled>{{ $equipo->rf_recomendaciones }}</textarea>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-10">
                            <label class="form-label" for="text">URL documento adquisición</label>
                            <p>{{ $equipo->rf_url_doc_adquisicion }}</p>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-5">
                            <label class="form-label" for="text">Fecha instalación</label>
                            <p>{{ $equipo->rf_fecha_instalacion }}</p>
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label class="form-label" for="text">Fecha de operación</label>
                            <p>{{ $equipo->rf_fecha_operacion }}</p>
                        </div>
                    </div>

                    {{-- CLASIFICACIÓN BIOMÉDICA --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Clasificación biomédica</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-3 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $equipo->cb_apoyo_lab_clinico ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">Apoyo / lab. clínico</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-3 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $equipo->cb_diagnostico ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">Diagnóstico</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-3 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $equipo->cb_soporte_mto_vida ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">Soporte / Mto. de vida</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-3 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $equipo->cb_rehabilitacion ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">Rehabilitación</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-3 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" {{ $equipo->cb_prevencion ? 'checked' : '' }}
                                    disabled>
                                <span class="form-check-sign">Prevención</span>
                            </label>
                        </div>
                    </div>

                    {{-- Mantenimiento --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Mantenimiento</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-3 d-flex align-items-center mt-4">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $equipo->mant_preventivo ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">Mantenimiento preventivo</span>
                            </label>
                        </div>
                        <div class="form-check col-12 col-md-3 d-flex align-items-center mt-4">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"
                                    {{ $equipo->mant_correctivo ? 'checked' : '' }} disabled>
                                <span class="form-check-sign">Mantenimiento correctivo</span>
                            </label>
                        </div>
                        <div class="form-group col-12 col-md-3">
                            <label class="form-label" for="text">Validación mantenimiento</label>
                            <p>{{ $equipo->mant_validacion }}</p>
                        </div>
                    </div>

                    <div class="form-group mt-4 mx-auto">
                        <a href="{{ route('equipos.index') }}" class="btn btn-default btn-block"><i
                                class="la icon-logout mr-3"></i>Regresar</a>
                    </div>
                </form>
            @endcomponent
        </div>
    </div>
@endsection
