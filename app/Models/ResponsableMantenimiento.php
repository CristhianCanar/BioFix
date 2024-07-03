<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsableMantenimiento extends Model
{
    use HasFactory;

    protected $table = 'responsables_mantenimientos';
    protected $fillable = [
        'empresa_id',
        'identificacion',
        'nombre',
        'apellido',
        'telefono',
        'cargo',
    ];
}
