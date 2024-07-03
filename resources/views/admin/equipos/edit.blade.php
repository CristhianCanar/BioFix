@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="col-10 mt-4 mx-auto">
            @component('components.card-form', ['title' => 'Actualizar equipo', 'show' => false])
                <form action="{{ route('equipos.update', ['equipo' => $equipo->id]) }}" method="POST"
                    enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-row justify-content-center">
                        <h2><b>Datos básicos</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="text">Nombre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                id="nombre" value="{{ $equipo->nombre }}" maxlength="200" required>
                            @error('nombre')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="text">Serie <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('serie') is-invalid @enderror" name="serie"
                                id="serie" value="{{ $equipo->serie }}" maxlength="100" required>
                            @error('serie')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="text">Servicio</label>
                            <input type="text" class="form-control @error('servicio') is-invalid @enderror" name="servicio"
                                id="servicio" value="{{ $equipo->servicio }}" maxlength="200">
                            @error('servicio')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="text">Marca <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('marca') is-invalid @enderror" name="marca"
                                id="marca" value="{{ $equipo->marca }}" maxlength="100" required>
                            @error('marca')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="text">Responsable del equipo <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="responsable_id" id="responsable_id" required>
                                <option value="{{ $equipo->responsable_id }}" selected>{{ $equipo->responsables->nombre }}
                                    {{ $equipo->responsables->apellido }}</option>
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
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="text">Ubicación <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('ubicacion') is-invalid @enderror" name="ubicacion"
                                id="ubicacion" value="{{ $equipo->ubicacion }}" maxlength="200" required>
                            @error('ubicacion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Código ECRI <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('codigo_ECRI') is-invalid @enderror"
                                name="codigo_ECRI" id="codigo_ECRI" value="{{ $equipo->codigo_ECRI }}" maxlength="100"
                                required>
                            @error('codigo_ECRI')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Empresa <span class="text-danger">*</span></label>
                            <select class="form-control" name="empresa_id" id="empresa_id" required>
                                <option value="{{ $equipo->empresa_id }}" selected>{{ $equipo->empresas->razon_social }}
                                </option>
                                @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa->id }}">
                                        {{ $empresa->razon_social }}
                                    </option>
                                @endforeach
                            </select>
                            @error('empresa_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Número documento</label>
                            <input type="text" class="form-control @error('numero_documento') is-invalid @enderror"
                                name="numero_documento" id="numero_documento" value="{{ $equipo->numero_documento }}"
                                maxlength="100" required>
                            @error('numero_documento')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-4 d-flex align-items-center mt-4">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('calibracion') is-invalid @enderror"
                                    name="calibracion" id="calibracion" onclick="cambiarEstadoSelectFrecCalibracion()"
                                    {{ $equipo->calibracion ? 'checked' : '' }}>
                                <span class="form-check-sign">Necesita calibración <span class="text-danger">*</span></span>
                            </label>
                            @error('calibracion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Frecuencia calibración <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="frecuencia_calibracion" id="frecuencia_calibracion"
                                {{ !$equipo->calibracion ? 'disabled' : '' }}>
                                <option value="{{ $equipo->frecuencia_calibracion }}" selected>
                                    {{ $equipo->frecuencia_calibracion }}</option>
                                @foreach ($frecuencias_calibracion as $frecuencia_calibracion)
                                    <option value="{{ $frecuencia_calibracion }}">
                                        {{ $frecuencia_calibracion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('frecuencia_calibracion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Frecuencia mantenimiento <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="frecuencia_mantenimiento" id="frecuencia_mantenimiento"
                                required>
                                <option value="{{ $equipo->frecuencia_mantenimiento }}" selected>
                                    {{ $equipo->frecuencia_mantenimiento }}
                                </option>
                                @foreach ($frecuencias_mantenimiento as $frecuencia_mantenimiento)
                                    <option value="{{ $frecuencia_mantenimiento }}">
                                        {{ $frecuencia_mantenimiento }}
                                    </option>
                                @endforeach
                            </select>
                            @error('frecuencia_mantenimiento')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="text">Modelo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('modelo') is-invalid @enderror" name="modelo"
                                id="modelo" value="{{ $equipo->modelo }}" maxlength="100">
                            @error('modelo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="text">Activo fijo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('activo_fijo') is-invalid @enderror"
                                name="activo_fijo" id="activo_fijo" value="{{ $equipo->activo_fijo }}" maxlength="100"
                                required>
                            @error('activo_fijo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
                            <input type="file" class="form-control @error('url_imagen') is-invalid @enderror"
                                name="url_imagen" id="url_imagen" value="{{ $equipo->url_imagen }}" accept="image/*">
                            @error('url_imagen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- REGISTRO HISTORICO --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Registro histórico</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Registro INVIMA <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('h_reg_INVIMA') is-invalid @enderror"
                                name="h_reg_INVIMA" id="h_reg_INVIMA" value="{{ $equipo->h_reg_INVIMA }}" maxlength="100"
                                required>
                            @error('h_reg_INVIMA')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Registro de importación <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('h_reg_importacion') is-invalid @enderror"
                                name="h_reg_importacion" id="h_reg_importacion" value="{{ $equipo->h_reg_importacion }}"
                                maxlength="100" required>
                            @error('h_reg_importacion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Registro FDA <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('h_reg_FDA') is-invalid @enderror"
                                name="h_reg_FDA" id="h_reg_FDA" value="{{ $equipo->h_reg_FDA }}" maxlength="100" required>
                            @error('h_reg_FDA')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Sitio web <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('h_url_sitio_web') is-invalid @enderror"
                                name="h_url_sitio_web" id="h_url_sitio_web" value="{{ $equipo->h_url_sitio_web }}"
                                maxlength="200" required>
                            @error('h_url_sitio_web')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Dirección proveedor <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('h_direccion_proveedor') is-invalid @enderror"
                                name="h_direccion_proveedor" id="h_direccion_proveedor"
                                value="{{ $equipo->h_direccion_proveedor }}" maxlength="100" required>
                            @error('h_direccion_proveedor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Teléfono <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('h_telefono') is-invalid @enderror"
                                name="h_telefono" id="h_telefono" value="{{ $equipo->h_telefono }}" maxlength="20"
                                required>
                            @error('h_telefono')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="departamento_id">Departamento <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="departamento_id" id="departamento_id" required>
                                <option value="{{ $equipo->municipios->departamentos->id_departamento }}" selected>
                                    {{ $equipo->municipios->departamentos->nombre }}
                                </option>
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

                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="municipio_id">Municipio <span class="text-danger">*</span></label>
                            <select class="form-control" name="municipio_id" id="municipio_id" required
                                src={{ route('empresas.get_municipios', '#') }}>
                                <option value="{{ $equipo->municipio_id }}" selected>{{ $equipo->municipios->nombre }}
                                </option>
                            </select>
                            @error('municipio_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Vida útil <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('h_vida_util') is-invalid @enderror"
                                name="h_vida_util" id="h_vida_util" value="{{ $equipo->h_vida_util }}" maxlength="20"
                                required>
                            @error('h_vida_util')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Costo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('h_costo') is-invalid @enderror" name="h_costo"
                                id="h_costo" value="{{ $equipo->h_costo }}" maxlength="50" required>
                            @error('h_costo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-4">
                            <label class="form-label" for="text">Garantía <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('h_garantia') is-invalid @enderror"
                                name="h_garantia" id="h_garantia" value="{{ $equipo->h_garantia }}" maxlength="50"
                                required>
                            @error('h_garantia')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- FUENTES DE ALIMENTACION --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Fuentes de alimentación</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('fa_electrica') is-invalid @enderror"
                                    name="fa_electrica" id="fa_electrica" {{ $equipo->fa_electrica ? 'checked' : '' }}>
                                <span class="form-check-sign">Eléctrica </span>
                            </label>
                            @error('fa_electrica')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('fa_bateria') is-invalid @enderror"
                                    name="fa_bateria" id="fa_bateria" {{ $equipo->fa_bateria ? 'checked' : '' }}>
                                <span class="form-check-sign">Batería</span>
                            </label>
                            @error('fa_bateria')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('fa_regulada') is-invalid @enderror"
                                    name="fa_regulada" id="fa_regulada" {{ $equipo->fa_regulada ? 'checked' : '' }}>
                                <span class="form-check-sign">Regulada</span>
                            </label>
                            @error('fa_regulada')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- REGISTRO DE APOYO TECNICO --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Registro de apoyo técnico</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('at_medico') is-invalid @enderror"
                                    name="at_medico" id="at_medico" {{ $equipo->at_medico ? 'checked' : '' }}>
                                <span class="form-check-sign">Médico</span>
                            </label>
                            @error('at_medico')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('at_apoyo') is-invalid @enderror"
                                    name="at_apoyo" id="at_apoyo" {{ $equipo->at_apoyo ? 'checked' : '' }}>
                                <span class="form-check-sign">Apoyo</span>
                            </label>
                            @error('at_apoyo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('at_basico') is-invalid @enderror"
                                    name="at_basico" id="at_basico" {{ $equipo->at_basico ? 'checked' : '' }}>
                                <span class="form-check-sign">Básico</span>
                            </label>
                            @error('at_basico')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('at_transporte') is-invalid @enderror"
                                    name="at_transporte" id="at_transporte" {{ $equipo->at_transporte ? 'checked' : '' }}>
                                <span class="form-check-sign">Transporte</span>
                            </label>
                            @error('at_transporte')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('at_clase_I') is-invalid @enderror"
                                    name="at_clase_I" id="at_clase_I" {{ $equipo->at_clase_I ? 'checked' : '' }}>
                                <span class="form-check-sign">Clase I</span>
                            </label>
                            @error('at_clase_I')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('at_clase_I_IA') is-invalid @enderror"
                                    name="at_clase_I_IA" id="at_clase_I_IA" {{ $equipo->at_clase_I_IA ? 'checked' : '' }}>
                                <span class="form-check-sign">Clase I IA</span>
                            </label>
                            @error('at_clase_I_IA')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('at_clase_I_IB') is-invalid @enderror"
                                    name="at_clase_I_IB" id="at_clase_I_IB" {{ $equipo->at_clase_I_IB ? 'checked' : '' }}>
                                <span class="form-check-sign">Clase I IB</span>
                            </label>
                            @error('at_clase_I_IB')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('at_clase_III') is-invalid @enderror"
                                    name="at_clase_III" id="at_clase_III" {{ $equipo->at_clase_III ? 'checked' : '' }}>
                                <span class="form-check-sign">Clase III</span>
                            </label>
                            @error('at_clase_III')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- CLASIFICACION TECNOLOGICA --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Clasificación tecnológica</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('ct_mecanica') is-invalid @enderror"
                                    name="ct_mecanica" id="ct_mecanica" {{ $equipo->ct_mecanica ? 'checked' : '' }}>
                                <span class="form-check-sign">Mecánica</span>
                            </label>
                            @error('ct_mecanica')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('ct_hidraulica') is-invalid @enderror"
                                    name="ct_hidraulica" id="ct_hidraulica" {{ $equipo->ct_hidraulica ? 'checked' : '' }}>
                                <span class="form-check-sign">Hidráulica</span>
                            </label>
                            @error('ct_hidraulica')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('ct_neumatica') is-invalid @enderror"
                                    name="ct_neumatica" id="ct_neumatica" {{ $equipo->ct_neumatica ? 'checked' : '' }}>
                                <span class="form-check-sign">Neumática</span>
                            </label>
                            @error('ct_neumatica')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox"
                                    class="form-check-input @error('ct_electrica_electronica') is-invalid @enderror"
                                    name="ct_electrica_electronica" id="ct_electrica_electronica"
                                    {{ $equipo->ct_electrica_electronica ? 'checked' : '' }}>
                                <span class="form-check-sign">Eléctrica electrónica</span>
                            </label>
                            @error('ct_electrica_electronica')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- PLANOS --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Planos</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('p_electricos') is-invalid @enderror"
                                    name="p_electricos" id="p_electricos" {{ $equipo->p_electricos ? 'checked' : '' }}>
                                <span class="form-check-sign">Eléctricos</span>
                            </label>
                            @error('p_electricos')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('p_mecanicos') is-invalid @enderror"
                                    name="p_mecanicos" id="p_mecanicos" {{ $equipo->p_mecanicos ? 'checked' : '' }}>
                                <span class="form-check-sign">Mecánicos</span>
                            </label>
                            @error('p_mecanicos')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('p_hidraulicos') is-invalid @enderror"
                                    name="p_hidraulicos" id="p_hidraulicos" {{ $equipo->p_hidraulicos ? 'checked' : '' }}>
                                <span class="form-check-sign">Hidráulicos</span>
                            </label>
                            @error('p_hidraulicos')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('p_otros') is-invalid @enderror"
                                    name="p_otros" id="p_otros" {{ $equipo->p_otros ? 'checked' : '' }}>
                                <span class="form-check-sign">Otros</span>
                            </label>
                            @error('p_otros')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- MANUALES --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Manuales</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('m_usuario') is-invalid @enderror"
                                    name="m_usuario" id="m_usuario" {{ $equipo->m_usuario ? 'checked' : '' }}>
                                <span class="form-check-sign">Usuario</span>
                            </label>
                            @error('m_usuario')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('m_instalacion') is-invalid @enderror"
                                    name="m_instalacion" id="m_instalacion" {{ $equipo->m_instalacion ? 'checked' : '' }}>
                                <span class="form-check-sign">Instalación</span>
                            </label>
                            @error('m_instalacion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('m_partes') is-invalid @enderror"
                                    name="m_partes" id="m_partes" {{ $equipo->m_partes ? 'checked' : '' }}>
                                <span class="form-check-sign">Partes</span>
                            </label>
                            @error('m_partes')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('m_otros') is-invalid @enderror"
                                    name="m_otros" id="m_otros" {{ $equipo->m_otros ? 'checked' : '' }}>
                                <span class="form-check-sign">Otros</span>
                            </label>
                            @error('m_otros')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{--  REG EVAL OPERATIVA ESTADO FUNCIONAL --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Registro evaluación operativa estado funcional</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-8">
                            <label class="form-label" for="text">Estado funcional <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="estado_funcional" id="estado_funcional" required>
                                <option value="{{ $equipo->estado_funcional }}" selected>{{ $equipo->estado_funcional }}
                                </option>
                                @foreach ($estados_funcional as $estado_funcional)
                                    <option value="{{ $estado_funcional }}">
                                        {{ $estado_funcional }}
                                    </option>
                                @endforeach
                            </select>
                            @error('estado_funcional')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{--  ACCESORIOS --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Accesorios</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-2 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox"
                                    class="form-check-input @error('registra_accesorios') is-invalid @enderror"
                                    name="registra_accesorios" id="registra_accesorios"
                                    {{ $equipo->registra_accesorios ? 'checked' : '' }}>
                                <span class="form-check-sign"> ¿Registra accesorios?</span>
                            </label>
                            @error('registra_accesorios')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- RECOMENDACIONES DEL FABRICANTE --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Recomendaciones del fabricante</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-10">
                            <label class="form-label" for="text">Recomendaciones <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control @error('rf_recomendaciones') is-invalid @enderror" name="rf_recomendaciones"
                                id="rf_recomendaciones" value="{{ $equipo->rf_recomendaciones }}" required>{{ $equipo->rf_recomendaciones }}</textarea>
                            @error('rf_recomendaciones')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-10">
                            <label class="form-label" for="text">URL documento adquisición <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('rf_url_doc_adquisicion') is-invalid @enderror"
                                name="rf_url_doc_adquisicion" id="rf_url_doc_adquisicion"
                                value="{{ $equipo->rf_url_doc_adquisicion }}" required>
                            @error('rf_url_doc_adquisicion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-12 col-md-5">
                            <label class="form-label" for="text">Fecha instalación <span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('rf_fecha_instalacion') is-invalid @enderror"
                                name="rf_fecha_instalacion" id="rf_fecha_instalacion"
                                value="{{ $equipo->rf_fecha_instalacion }}" required>
                            @error('rf_fecha_instalacion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-5">
                            <label class="form-label" for="text">Fecha de operación <span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('rf_fecha_operacion') is-invalid @enderror"
                                name="rf_fecha_operacion" id="rf_fecha_operacion" value="{{ $equipo->rf_fecha_operacion }}"
                                required>
                            @error('rf_fecha_operacion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- CLASIFICACIÓN BIOMÉDICA --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Clasificación biomédica</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-3 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox"
                                    class="form-check-input @error('cb_apoyo_lab_clinico') is-invalid @enderror"
                                    name="cb_apoyo_lab_clinico" id="cb_apoyo_lab_clinico"
                                    {{ $equipo->cb_apoyo_lab_clinico ? 'checked' : '' }}>
                                <span class="form-check-sign">Apoyo / lab. clínico</span>
                            </label>
                            @error('cb_apoyo_lab_clinico')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-3 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('cb_diagnostico') is-invalid @enderror"
                                    name="cb_diagnostico" id="cb_diagnostico"
                                    {{ $equipo->cb_diagnostico ? 'checked' : '' }}>
                                <span class="form-check-sign">Diagnóstico</span>
                            </label>
                            @error('cb_diagnostico')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-3 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox"
                                    class="form-check-input @error('cb_soporte_mto_vida') is-invalid @enderror"
                                    name="cb_soporte_mto_vida" id="cb_soporte_mto_vida"
                                    {{ $equipo->cb_soporte_mto_vida ? 'checked' : '' }}>
                                <span class="form-check-sign">Soporte / Mto. de vida</span>
                            </label>
                            @error('cb_soporte_mto_vida')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-3 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox"
                                    class="form-check-input @error('cb_rehabilitacion') is-invalid @enderror"
                                    name="cb_rehabilitacion" id="cb_rehabilitacion"
                                    {{ $equipo->cb_rehabilitacion ? 'checked' : '' }}>
                                <span class="form-check-sign">Rehabilitación</span>
                            </label>
                            @error('cb_rehabilitacion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-3 d-flex align-items-center">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input @error('cb_prevencion') is-invalid @enderror"
                                    name="cb_prevencion" id="cb_prevencion" {{ $equipo->cb_prevencion ? 'checked' : '' }}>
                                <span class="form-check-sign">Prevención</span>
                            </label>
                            @error('cb_prevencion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- Mantenimiento --}}
                    <div class="form-row justify-content-center">
                        <h2><b>Mantenimiento</b></h2>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-check col-12 col-md-3 d-flex align-items-center mt-4">
                            <label class="form-check-label">
                                <input type="checkbox"
                                    class="form-check-input @error('mant_preventivo') is-invalid @enderror"
                                    name="mant_preventivo" id="mant_preventivo"
                                    {{ $equipo->mant_preventivo ? 'checked' : '' }}>
                                <span class="form-check-sign">Mantenimiento preventivo</span>
                            </label>
                            @error('mant_preventivo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check col-12 col-md-3 d-flex align-items-center mt-4">
                            <label class="form-check-label">
                                <input type="checkbox"
                                    class="form-check-input @error('mant_correctivo') is-invalid @enderror"
                                    name="mant_correctivo" id="mant_correctivo"
                                    {{ $equipo->mant_correctivo ? 'checked' : '' }}>
                                <span class="form-check-sign">Mantenimiento correctivo</span>
                            </label>
                            @error('mant_correctivo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-3">
                            <label class="form-label" for="text">Validación mantenimiento <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="mant_validacion" id="mant_validacion" required>
                                <option value="{{ $equipo->mant_validacion }}" selected>{{ $equipo->mant_validacion }}
                                </option>
                                @foreach ($mants_validacion as $mant_validacion)
                                    <option value="{{ $mant_validacion }}">
                                        {{ $mant_validacion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('mant_validacion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="mt-4 d-flex justify-content-between mx-2">
                        <a href="{{ route('equipos.index') }}" class="btn btn-default col-5" type="button">
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
    <script>
        function cambiarEstadoSelectFrecCalibracion() {
            var checkboxCalibracion = document.getElementById('calibracion');
            var selectFrecCalibracion = document.getElementById('frecuencia_calibracion');
            selectFrecCalibracion.disabled = !checkboxCalibracion.checked;
        }
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
