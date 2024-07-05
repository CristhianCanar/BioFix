<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BajaEquipo extends Model
{
    use HasFactory;
    protected $table = 'bajas_equipos';
    protected $fillable = [
        'equipo_id',
        'evaluacion_tecnica',
        'evaluacion_clinica',
        'baja_motivo',
        'baja_fecha',
        'observaciones',
        'clausula',
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id', 'id');
    }
}
