<?php

namespace App\Http\Requests\Equipos;

use App\Utils\Equipos\Constants;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EquipoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'municipio_id' => 'required|string|exists:municipios,id_municipio',
            'responsable_id' => 'required|string|exists:responsables_equipos,id',
            'empresa_id' => 'required|string|exists:empresas,id',
            'nombre' => 'required|string|max:200',
            'serie' => 'required|string|max:100',
            'marca' => 'required|string|max:100',
            'servicio' => 'nullable|string|max:200',
            'ubicacion' => 'required|string|max:200',
            'codigo_ECRI' => 'required|string|max:100',
            'calibracion' => 'boolean',
            'frecuencia_calibracion' => ['required_if:calibracion,1', 'in:'.implode(',',Constants::FRECUENCIA_CALIBRACION)],
            'frecuencia_mantenimiento' => ['required', 'in:'.implode(',',Constants::FRECUENCIA_MANTENIMIENTO)],
            'modelo' => 'required|string|max:100',
            'activo_fijo' => 'required|string|max:100',
            'url_imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            /* REGISTRO HISTORICO */
            'h_reg_INVIMA' => 'required|string|max:100',
            'h_reg_importacion' => 'required|string|max:100',
            'h_reg_FDA' => 'required|string|max:100',
            'h_url_sitio_web' => 'required|string|max:200',
            'h_direccion_proveedor' => 'required|string|max:100',
            'h_telefono' => 'required|string|max:20',
            'h_vida_util' => 'required|string|max:20',
            'h_costo' => 'required|string|max:50',
            'h_garantia' => 'required|string|max:50',
            /* FUENTES DE ALIMENTACION */
            'fa_electrica' => 'boolean',
            'fa_bateria' => 'boolean',
            'fa_regulada' => 'boolean',
            /* REGISTRO DE APOYO TECNICO */
            'at_medico' => 'boolean',
            'at_apoyo' => 'boolean',
            'at_basico' => 'boolean',
            'at_transporte' => 'boolean',
            'at_clase_I' => 'boolean',
            'at_clase_I_IA' => 'boolean',
            'at_clase_I_IB' => 'boolean',
            'at_clase_III' => 'boolean',
            /* CLASIFICACION TECNOLOGICA */
            'ct_mecanica' => 'boolean',
            'ct_hidraulica' => 'boolean',
            'ct_neumatica' => 'boolean',
            'ct_electrica_electronica' => 'boolean',
            /* PLANOS */
            'p_electricos' => 'boolean',
            'p_mecanicos' => 'boolean',
            'p_hidraulicos' => 'boolean',
            'p_otros' => 'boolean',
            /* MANUALES */
            'm_usuario' => 'boolean',
            'm_instalacion' => 'boolean',
            'm_partes' => 'boolean',
            'm_otros' => 'boolean',
            /* REG EVAL OPERATIVA ESTADO FUNCIONAL */
            'estado_funcional' => ['required', 'in:'.implode(',',Constants::ESTADO_FUNCIONAL)],
            /* ACCESORIOS */
            'registra_accesorios' => 'boolean',
            /* RECOMENDACIONES DEL FABRICANTE */
            'rf_recomendaciones' => 'required|string',
            'rf_url_doc_adquisicion' => 'required|string',
            'rf_fecha_instalacion' => 'required|date',
            'rf_fecha_operacion' => 'required|date',
            /* CLASIFICACIÓN BIOMÉDICA */
            'cb_apoyo_lab_clinico' => 'boolean',
            'cb_diagnostico' => 'boolean',
            'cb_soporte_mto_vida' => 'boolean',
            'cb_rehabilitacion' => 'boolean',
            'cb_prevencion' => 'boolean',
            /* MANTENIMIENTO */
            'mant_preventivo' => 'boolean',
            'mant_correctivo' => 'boolean',
            'mant_validacion' => ['required', 'in:'.implode(',',Constants::MANT_VALIDACION)],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'calibracion' => $this->boolean('calibracion'),
            'fa_electrica' => $this->boolean('fa_electrica'),
            'fa_bateria' => $this->boolean('fa_bateria'),
            'fa_regulada' => $this->boolean('fa_regulada'),
            'at_medico' => $this->boolean('at_medico'),
            'at_apoyo' => $this->boolean('at_apoyo'),
            'at_basico' => $this->boolean('at_basico'),
            'at_transporte' => $this->boolean('at_transporte'),
            'at_clase_I' => $this->boolean('at_clase_I'),
            'at_clase_I_IA' => $this->boolean('at_clase_I_IA'),
            'at_clase_I_IB' => $this->boolean('at_clase_I_IB'),
            'at_clase_III' => $this->boolean('at_clase_III'),
            'ct_mecanica' => $this->boolean('ct_mecanica'),
            'ct_hidraulica' => $this->boolean('ct_hidraulica'),
            'ct_neumatica' => $this->boolean('ct_neumatica'),
            'ct_electrica_electronica' => $this->boolean('ct_electrica_electronica'),
            'p_electricos' => $this->boolean('p_electricos'),
            'p_mecanicos' => $this->boolean('p_mecanicos'),
            'p_hidraulicos' => $this->boolean('p_hidraulicos'),
            'p_otros' => $this->boolean('p_otros'),
            'm_usuario' => $this->boolean('m_usuario'),
            'm_instalacion' => $this->boolean('m_instalacion'),
            'm_partes' => $this->boolean('m_partes'),
            'm_otros' => $this->boolean('m_otros'),
            'registra_accesorios' => $this->boolean('registra_accesorios'),
            'cb_apoyo_lab_clinico' => $this->boolean('cb_apoyo_lab_clinico'),
            'cb_diagnostico' => $this->boolean('cb_diagnostico'),
            'cb_soporte_mto_vida' => $this->boolean('cb_soporte_mto_vida'),
            'cb_rehabilitacion' => $this->boolean('cb_rehabilitacion'),
            'cb_prevencion' => $this->boolean('cb_prevencion'),
            'mant_preventivo' => $this->boolean('mant_preventivo'),
            'mant_correctivo' => $this->boolean('mant_correctivo'),
        ]);
    }

    /* protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'message'   => 'Error en el formulario: ' . $validator->errors(),
                    'status'    => 'error',
                ],
                422
            )
        );
    } */
}
