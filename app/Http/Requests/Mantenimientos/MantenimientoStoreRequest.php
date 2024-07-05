<?php

namespace App\Http\Requests\Mantenimientos;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MantenimientoStoreRequest extends FormRequest
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
            'responsable_id' => 'required|string|exists:responsables_mantenimientos,id',
            'equipo_id' => 'required|string|exists:equipos,id',
            'retiro_equipo_IPS' => 'boolean',
            'equipo_funcionando' => 'boolean',
            'fecha_mantenimiento' => 'required|date',
            'url_imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'vb_pregunta_uno' => 'boolean',
            'vb_pregunta_dos' => 'boolean',
            'vf_carcasa' => 'boolean',
            'vf_etiquetado' => 'boolean',
            'vf_estructura_soporte' => 'boolean',
            'vf_integridad_rosca_tapa' => 'boolean',
            'vf_revision_limpieza_tanque' => 'boolean',
            'vf_revision_fuga_gas' => 'boolean',
            'vf_condicion_entorno' => 'boolean',
            'm_limpieza_externa' => 'boolean',
            'm_limpieza_interna' => 'boolean',
            'm_ajustes' => 'boolean',
            'm_tiempo_usado' => 'required|numeric',
            /* Lista de repuestos */
            'repuestos.*.fecha_reporte' => 'nullable|string|date',
            'repuestos.*.repuesto' => 'nullable|string|max:100',
            'repuestos.*.proveedor' => 'nullable|string|max:100',
            'repuestos.*.cantidad' => 'nullable|integer|min:1',
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'retiro_equipo_IPS' => $this->boolean('retiro_equipo_IPS'),
            'equipo_funcionando' => $this->boolean('equipo_funcionando'),
            'vb_pregunta_uno' => $this->boolean('vb_pregunta_uno'),
            'vb_pregunta_dos' => $this->boolean('vb_pregunta_dos'),
            'vf_carcasa' => $this->boolean('vf_carcasa'),
            'vf_etiquetado' => $this->boolean('vf_etiquetado'),
            'vf_estructura_soporte' => $this->boolean('vf_estructura_soporte'),
            'vf_integridad_rosca_tapa' => $this->boolean('vf_integridad_rosca_tapa'),
            'vf_revision_limpieza_tanque' => $this->boolean('vf_revision_limpieza_tanque'),
            'vf_revision_fuga_gas' => $this->boolean('vf_revision_fuga_gas'),
            'vf_condicion_entorno' => $this->boolean('vf_condicion_entorno'),
            'm_limpieza_externa' => $this->boolean('m_limpieza_externa'),
            'm_limpieza_interna' => $this->boolean('m_limpieza_interna'),
            'm_ajustes' => $this->boolean('m_ajustes'),
        ]);
    }

    protected function failedValidation(Validator $validator)
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
    }
}
