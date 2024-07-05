<?php

namespace App\Http\Controllers;

use App\Models\BajaEquipo;
use App\Models\Equipo;
use App\Utils\Equipos\Constants;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class UnsubscribeController extends Controller
{
    public function index()
    {
        $bajasEquipos = BajaEquipo::orderBy('baja_fecha', 'asc')->paginate(10);
        return view('admin.dar_de_baja_equipos.manage', compact('bajasEquipos'));
    }

    public function create(int $equipoId)
    {
        $equipo = Equipo::select('id', 'nombre', 'serie', 'modelo', 'marca')->where('id', $equipoId)->first();
        $bajaMotivos = Constants::BAJA_MOTIVO;
        return view('admin.dar_de_baja_equipos.register', compact('equipo', 'bajaMotivos'));
    }

    public function store(Request $request, int $equipoId)
    {
        $request->validate([
            'baja_fecha' => ['required', 'date'],
            'baja_motivo' => ['required', 'string', 'max:50'],
            'evaluacion_tecnica' => ['required', 'string'],
            'evaluacion_clinica' => ['required', 'string'],
            'observaciones' => ['required', 'string'],
            'clausula' => ['required', 'string']
        ]);

        try {
            $bajaEquipo = BajaEquipo::create([
                'equipo_id' => $equipoId,
                'baja_fecha' => $request->baja_fecha,
                'baja_motivo' => $request->baja_motivo,
                'evaluacion_tecnica' => $request->evaluacion_tecnica,
                'evaluacion_clinica' => $request->evaluacion_clinica,
                'observaciones' => $request->observaciones,
                'clausula' => $request->clausula
            ]);

            if (!$bajaEquipo) {
                Alert::error(
                    'No fue posible almacenar el registro de la baja de equipo',
                    'Comunicarse con soporte técnico - +573217114140'
                );

                return $this->create($equipoId);
            }

            $equipo = Equipo::where('id', $equipoId)->update(['estado' => false]);

            if (!$equipo) {
                Alert::error(
                    'No fue posible almacenar el registro del equipo',
                    'Comunicarse con soporte técnico - +573217114140'
                );

                return $this->create($equipoId);
            }

            Alert::success('Registro de la baja completo', "Almacenado con éxito");
            return redirect()->route('equipos.index');
        } catch (Exception $e) {
            Alert::error(
                'No fue posible almacenar el registro del equipo',
                "Comunicarse con soporte técnico - +573217114140. Error: " . $e->getMessage()
            );

            Log::error('UnsubscribeController.store ->' . $e->getMessage());
            return $this->create($equipoId);
        }
    }

    public function show(int $id)
    {
        $bajaEquipo = BajaEquipo::where('id', $id)->first();
        return view('admin.dar_de_baja_equipos.show', compact('bajaEquipo'));
    }
}
