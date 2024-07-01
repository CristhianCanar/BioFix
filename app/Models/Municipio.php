<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $table = 'municipios';
    protected $primaryKey   = 'id_municipio';

    protected $fillable = [
        'id_municipio',
        'nombre',
        'departamento_id',
    ];
    public function departamentos()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id', 'id_departamento');
    }
}
