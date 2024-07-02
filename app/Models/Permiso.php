<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permiso extends SpatiePermission
{
    use HasFactory;

    protected $table = 'permissions';

    protected $fillable = ['name','guard_name'];
}
