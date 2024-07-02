<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsableEquipo extends Model
{
    use HasFactory;

    protected $table = 'responsables_equipos';
    protected $fillable = [
        'empresa_id',
        'nombre',
        'apellido',
        'telefono',
    ];

    public function empresas()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }
}
