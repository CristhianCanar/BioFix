<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = "equipos";
    protected $fillable = [
        'codigo',
        'nombre',
        'tipo_equipo',
        'fecha_ingreso',
        'fecha_vencimiento',
        'url_imagen',
    ];

}
