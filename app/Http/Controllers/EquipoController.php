<?php

namespace App\Http\Controllers;

use App\Http\Requests\Equipos\EquipoStoreRequest;
use App\Models\Departamento;
use App\Models\Empresa;
use App\Models\Equipo;
use App\Models\ResponsableEquipo;
use App\Utils\Equipos\Constants;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = Equipo::orderBy('nombre', 'asc')->paginate(2);
        return view('admin.equipos.manage', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $responsables = ResponsableEquipo::select('id', 'nombre', 'apellido')->orderBy('nombre', 'desc')->get();
        $empresas = Empresa::select('id', 'razon_social')->orderBy('razon_social', 'desc')->get();
        $frecuencias_calibracion = Constants::FRECUENCIA_CALIBRACION;
        $frecuencias_mantenimiento = Constants::FRECUENCIA_MANTENIMIENTO;
        $departamentos = Departamento::select('id_departamento', 'nombre')->get();
        $estados_funcional = Constants::ESTADO_FUNCIONAL;
        $mants_validacion = Constants::MANT_VALIDACION;
        return view(
            'admin.equipos.register',
            compact(
                'responsables',
                'empresas',
                'frecuencias_calibracion',
                'frecuencias_mantenimiento',
                'departamentos',
                'estados_funcional',
                'mants_validacion'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipoStoreRequest $request)
    {
        $request->validate;
        /* dd($request->all()); */
        try {
            $frecuencia_calibracion_select = $request->calibracion ? $request->frecuencia_calibracion : null;
            $imagePath = null;

            if ($request->hasFile('url_imagen')) {
                $imageName = time() . '.' . $request->url_imagen->getClientOriginalExtension();
                $imagePath = $request->url_imagen->storeAs('img_equipos', $imageName, 'public');
            }

            $equipo = Equipo::create([
                'municipio_id' => $request->municipio_id,
                'responsable_id' => $request->responsable_id,
                'empresa_id' => $request->empresa_id,
                'nombre' => $request->nombre,
                'serie' => $request->serie,
                'marca' => $request->marca,
                'servicio' => $request->servicio,
                'ubicacion' => $request->ubicacion,
                'codigo_ECRI' => $request->codigo_ECRI,
                'numero_documento' => $request->numero_documento,
                'calibracion' => $request->calibracion,
                'frecuencia_calibracion' => $frecuencia_calibracion_select,
                'frecuencia_mantenimiento' => $request->frecuencia_mantenimiento,
                'modelo' => $request->modelo,
                'activo_fijo' => $request->activo_fijo,
                'url_imagen' => $imagePath,
                /* REGISTRO HISTORICO */
                'h_reg_INVIMA' => $request->h_reg_INVIMA,
                'h_reg_importacion' => $request->h_reg_importacion,
                'h_reg_FDA' => $request->h_reg_FDA,
                'h_url_sitio_web' => $request->h_url_sitio_web,
                'h_direccion_proveedor' => $request->h_direccion_proveedor,
                'h_telefono' => $request->h_telefono,
                'h_vida_util' => $request->h_vida_util,
                'h_costo' => $request->h_costo,
                'h_garantia' => $request->h_garantia,
                /* FUENTES DE ALIMENTACION */
                'fa_electrica' => $request->fa_electrica,
                'fa_bateria' => $request->fa_bateria,
                'fa_regulada' => $request->fa_regulada,
                /* REGISTRO DE APOYO TECNICO */
                'at_medico' => $request->at_medico,
                'at_apoyo' => $request->at_apoyo,
                'at_basico' => $request->at_basico,
                'at_transporte' => $request->at_transporte,
                'at_clase_I' => $request->at_clase_I,
                'at_clase_I_IA' => $request->at_clase_I_IA,
                'at_clase_I_IB' => $request->at_clase_I_IB,
                'at_clase_III' => $request->at_clase_III,
                /* CLASIFICACION TECNOLOGICA */
                'ct_mecanica' => $request->ct_mecanica,
                'ct_hidraulica' => $request->ct_hidraulica,
                'ct_neumatica' => $request->ct_neumatica,
                'ct_electrica_electronica' => $request->ct_electrica_electronica,
                /* PLANOS */
                'p_electricos' => $request->p_electricos,
                'p_mecanicos' => $request->p_mecanicos,
                'p_hidraulicos' => $request->p_hidraulicos,
                'p_otros' => $request->p_otros,
                /* MANUALES */
                'm_usuario' => $request->m_usuario,
                'm_instalacion' => $request->m_instalacion,
                'm_partes' => $request->m_partes,
                'm_otros' => $request->m_otros,
                /* REG EVAL OPERATIVA ESTADO FUNCIONAL */
                'estado_funcional' => $request->estado_funcional,
                /* ACCESORIOS */
                'registra_accesorios' => $request->registra_accesorios,
                /* RECOMENDACIONES DEL FABRICANTE */
                'rf_recomendaciones' => $request->rf_recomendaciones,
                'rf_url_doc_adquisicion' => $request->rf_url_doc_adquisicion,
                'rf_fecha_instalacion' => $request->rf_fecha_instalacion,
                'rf_fecha_operacion' => $request->rf_fecha_operacion,
                /* CLASIFICACIÓN BIOMÉDICA */
                'cb_apoyo_lab_clinico' => $request->cb_apoyo_lab_clinico,
                'cb_diagnostico' => $request->cb_diagnostico,
                'cb_soporte_mto_vida' => $request->cb_soporte_mto_vida,
                'cb_rehabilitacion' => $request->cb_rehabilitacion,
                'cb_prevencion' => $request->cb_prevencion,
                /* MANTENIMIENTO */
                'mant_preventivo' => $request->mant_preventivo,
                'mant_correctivo' => $request->mant_correctivo,
                'mant_validacion' => $request->mant_validacion,
            ]);

            if (!$equipo) {
                Alert::error(
                    'No fue posible almacenar el registro del equipo',
                    'Comunicarse con soporte técnico - +573217114140'
                );
                return $this->create();
            }
            Alert::success('Registro del equipo completo', "$request->nombre almacenado con éxito");
            return $this->create();
        } catch (Exception $e) {
            Alert::error(
                'No fue posible almacenar el registro del equipo',
                "Comunicarse con soporte técnico - +573217114140. Error: " . $e->getMessage()
            );
            Log::error('EquipoController.store -> '.$e->getMessage());
            return $this->create();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $equipo = Equipo::where('id', $id)->first();
        $responsables = ResponsableEquipo::select('id', 'nombre', 'apellido')->whereNot('id', $equipo->responsable_id)->orderBy('nombre', 'desc')->get();
        $empresas = Empresa::select('id', 'razon_social')->whereNot('id', $equipo->empresa_id)->orderBy('razon_social', 'desc')->get();
        $frecuencias_calibracion = array_diff(Constants::FRECUENCIA_CALIBRACION, [$equipo->frecuencia_calibracion]);
        $frecuencias_mantenimiento = array_diff(Constants::FRECUENCIA_MANTENIMIENTO, [$equipo->frecuencia_mantenimiento]);
        $departamentos = Departamento::select('id_departamento', 'nombre')->whereNot('id_departamento', $equipo->municipios->departamentos->id_departamento)->get();
        $estados_funcional = array_diff(Constants::ESTADO_FUNCIONAL, [$equipo->estado_funcional]);
        $mants_validacion = array_diff(Constants::MANT_VALIDACION, [$equipo->mant_validacion]);
        return view(
            'admin.equipos.edit',
            compact(
                'equipo',
                'responsables',
                'empresas',
                'frecuencias_calibracion',
                'frecuencias_mantenimiento',
                'departamentos',
                'estados_funcional',
                'mants_validacion'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipoStoreRequest $request, string $id)
    {
        $request->validate;
        try {
            $equipo_old = Equipo::select('id', 'url_imagen')->where('id', $id)->first();

            $frecuencia_calibracion_select = $request->calibracion ? $request->frecuencia_calibracion : null;
            $imagePath = $equipo_old->url_imagen;

            if ($request->hasFile('url_imagen')) {
                $imageName = time() . '.' . $request->url_imagen->getClientOriginalExtension();
                $imagePath = $request->url_imagen->storeAs('img_equipos', $imageName, 'public');
            }

            $equipo = Equipo::where('id', $id)->update([
                'municipio_id' => $request->municipio_id,
                'responsable_id' => $request->responsable_id,
                'empresa_id' => $request->empresa_id,
                'nombre' => $request->nombre,
                'serie' => $request->serie,
                'marca' => $request->marca,
                'servicio' => $request->servicio,
                'ubicacion' => $request->ubicacion,
                'codigo_ECRI' => $request->codigo_ECRI,
                'numero_documento' => $request->numero_documento,
                'calibracion' => $request->calibracion,
                'frecuencia_calibracion' => $frecuencia_calibracion_select,
                'frecuencia_mantenimiento' => $request->frecuencia_mantenimiento,
                'modelo' => $request->modelo,
                'activo_fijo' => $request->activo_fijo,
                'url_imagen' => $imagePath,
                /* REGISTRO HISTORICO */
                'h_reg_INVIMA' => $request->h_reg_INVIMA,
                'h_reg_importacion' => $request->h_reg_importacion,
                'h_reg_FDA' => $request->h_reg_FDA,
                'h_url_sitio_web' => $request->h_url_sitio_web,
                'h_direccion_proveedor' => $request->h_direccion_proveedor,
                'h_telefono' => $request->h_telefono,
                'h_vida_util' => $request->h_vida_util,
                'h_costo' => $request->h_costo,
                'h_garantia' => $request->h_garantia,
                /* FUENTES DE ALIMENTACION */
                'fa_electrica' => $request->fa_electrica,
                'fa_bateria' => $request->fa_bateria,
                'fa_regulada' => $request->fa_regulada,
                /* REGISTRO DE APOYO TECNICO */
                'at_medico' => $request->at_medico,
                'at_apoyo' => $request->at_apoyo,
                'at_basico' => $request->at_basico,
                'at_transporte' => $request->at_transporte,
                'at_clase_I' => $request->at_clase_I,
                'at_clase_I_IA' => $request->at_clase_I_IA,
                'at_clase_I_IB' => $request->at_clase_I_IB,
                'at_clase_III' => $request->at_clase_III,
                /* CLASIFICACION TECNOLOGICA */
                'ct_mecanica' => $request->ct_mecanica,
                'ct_hidraulica' => $request->ct_hidraulica,
                'ct_neumatica' => $request->ct_neumatica,
                'ct_electrica_electronica' => $request->ct_electrica_electronica,
                /* PLANOS */
                'p_electricos' => $request->p_electricos,
                'p_mecanicos' => $request->p_mecanicos,
                'p_hidraulicos' => $request->p_hidraulicos,
                'p_otros' => $request->p_otros,
                /* MANUALES */
                'm_usuario' => $request->m_usuario,
                'm_instalacion' => $request->m_instalacion,
                'm_partes' => $request->m_partes,
                'm_otros' => $request->m_otros,
                /* REG EVAL OPERATIVA ESTADO FUNCIONAL */
                'estado_funcional' => $request->estado_funcional,
                /* ACCESORIOS */
                'registra_accesorios' => $request->registra_accesorios,
                /* RECOMENDACIONES DEL FABRICANTE */
                'rf_recomendaciones' => $request->rf_recomendaciones,
                'rf_url_doc_adquisicion' => $request->rf_url_doc_adquisicion,
                'rf_fecha_instalacion' => $request->rf_fecha_instalacion,
                'rf_fecha_operacion' => $request->rf_fecha_operacion,
                /* CLASIFICACIÓN BIOMÉDICA */
                'cb_apoyo_lab_clinico' => $request->cb_apoyo_lab_clinico,
                'cb_diagnostico' => $request->cb_diagnostico,
                'cb_soporte_mto_vida' => $request->cb_soporte_mto_vida,
                'cb_rehabilitacion' => $request->cb_rehabilitacion,
                'cb_prevencion' => $request->cb_prevencion,
                /* MANTENIMIENTO */
                'mant_preventivo' => $request->mant_preventivo,
                'mant_correctivo' => $request->mant_correctivo,
                'mant_validacion' => $request->mant_validacion,
            ]);

            if (!$equipo) {
                Alert::error(
                    'No fue posible actualizar el registro del equipo',
                    'Comunicarse con soporte técnico - +573217114140'
                );
                return $this->edit($id);
            }
            Alert::success('Actualización del equipo completada', "$request->nombre actualizado con éxito");
            return $this->edit($id);
        } catch (Exception $e) {
            Alert::error(
                'No fue posible actualizar el registro del equipo',
                "Comunicarse con soporte técnico - +573217114140. Error: " . $e->getMessage()
            );
            Log::error('EquipoController.update -> '.$e->getMessage());
            return $this->edit($id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
