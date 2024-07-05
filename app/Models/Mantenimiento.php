<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $table = 'mantenimientos';
    protected $fillable = [
        'responsable_id',
        'equipo_id',
        'retiro_equipo_IPS',
        'equipo_funcionando',
        'fecha_mantenimiento',
        'url_imagen',
        'vb_pregunta_uno',
        'vb_pregunta_dos',
        'vf_carcasa',
        'vf_etiquetado',
        'vf_estructura_soporte',
        'vf_integridad_rosca_tapa',
        'vf_revision_limpieza_tanque',
        'vf_revision_fuga_gas',
        'vf_condicion_entorno',
        'm_limpieza_externa',
        'm_limpieza_interna',
        'm_ajustes',
        'm_tiempo_usado',
    ];

    public function responsables()
    {
        return $this->belongsTo(ResponsableMantenimiento::class, 'responsable_id', 'id');
    }

    public function equipos()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id', 'id');
    }
}
