<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use App\Models\Mantenimiento;

class HomeController extends Controller
{
    public function index()
    {
        $equiposTotal = Equipo::where('estado', 1)->count();;
        $mantenimientosTotal = Mantenimiento::count();;
        $equiposBajasTotal = Equipo::where('estado', 0)->count();
        return view('admin.stadistics.dashboard', compact('equiposTotal', 'mantenimientosTotal', 'equiposBajasTotal'));
    }
}
