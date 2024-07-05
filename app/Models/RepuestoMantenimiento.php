<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepuestoMantenimiento extends Model
{
    use HasFactory;
    protected $table = 'mantenimientos';
    protected $fillable = [
        'mantenimiento_id',
        'fecha_reporte',
        'repuesto',
        'proveedor',
        'cantidad',
    ];

    public function mantenimientos()
    {
        return $this->belongsTo(Mantenimiento::class, 'mantenimiento_id', 'id');
    }

}
