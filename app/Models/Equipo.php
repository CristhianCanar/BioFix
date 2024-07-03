<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = 'equipos';
    protected $fillable = [
        'municipio_id',
        'responsable_id',
        'empresa_id',
        'nombre',
        'serie',
        'marca',
        'servicio',
        'ubicacion',
        'codigo_ECRI',
        'numero_documento',
        'calibracion',
        'frecuencia_calibracion',
        'frecuencia_mantenimiento',
        'modelo',
        'activo_fijo',
        'url_imagen',
        'h_reg_INVIMA',
        'h_reg_importacion',
        'h_reg_FDA',
        'h_url_sitio_web',
        'h_direccion_proveedor',
        'h_telefono',
        'h_vida_util',
        'h_costo',
        'h_garantia',
        'fa_electrica',
        'fa_bateria',
        'fa_regulada',
        'at_medico',
        'at_apoyo',
        'at_basico',
        'at_transporte',
        'at_clase_I',
        'at_clase_I_IA',
        'at_clase_I_IB',
        'at_clase_III',
        'ct_mecanica',
        'ct_hidraulica',
        'ct_neumatica',
        'ct_electrica_electronica',
        'p_electricos',
        'p_mecanicos',
        'p_hidraulicos',
        'p_otros',
        'm_usuario',
        'm_instalacion',
        'm_partes',
        'm_otros',
        'estado_funcional',
        'registra_accesorios',
        'rf_recomendaciones',
        'rf_url_doc_adquisicion',
        'rf_fecha_instalacion',
        'rf_fecha_operacion',
        'cb_apoyo_lab_clinico',
        'cb_diagnostico',
        'cb_soporte_mto_vida',
        'cb_rehabilitacion',
        'cb_prevencion',
        'mant_preventivo',
        'mant_correctivo',
        'mant_validacion',
    ];

    public function municipios()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id', 'id_municipio');
    }

    public function responsables()
    {
        return $this->belongsTo(ResponsableEquipo::class, 'responsable_id', 'id');
    }

    public function empresas()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }

}
