<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\ResponsableEquipo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class ResponsableEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $responsablesEquipos = ResponsableEquipo::orderBy('nombre', 'asc')->paginate(10);
        return view('admin.responsables_equipos.manage', compact('responsablesEquipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::select('id', 'nit', 'razon_social')->orderBy('razon_social', 'asc')->get();
        return view('admin.responsables_equipos.register', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'empresa_id' => ['required','numeric'],
            'identificacion' => ['required', 'numeric'],
            'nombre' => ['required', 'string', 'max:50'],
            'apellido' => ['required', 'string', 'max:50'],
            'telefono' => ['required', 'string', 'max:20']
        ]);

        try {
            $responsableEquipo = ResponsableEquipo::create([
                'empresa_id' => $request->empresa_id,
                'identificacion' => $request->identificacion,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'telefono' => $request->telefono
            ]);

            if (!$responsableEquipo) {
                Alert::error(
                    'No fue posible almacenar el registro del responsable',
                    'Comunicarse con soporte técnico - +573217114140'
                );

                return $this->create();
            }

            Alert::success('Registro del responsable completo', "$request->nombre almacenado con éxito");
            return $this->create();

        } catch (Exception $e) {
            Alert::error(
                'No fue posible almacenar el registro del responsable',
                "Comunicarse con soporte técnico - +573217114140. Error: " . $e->getMessage()
            );

            Log::error('ResponsableEquipoController.store ->' . $e->getMessage());
            return $this->create();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $responsableEquipo = ResponsableEquipo::where('id', $id)->first();
        return view('admin.responsables_equipos.show', compact('responsableEquipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $responsableEquipo = ResponsableEquipo::where('id', $id)->first();
        $empresas = Empresa::select('id', 'nit', 'razon_social')->orderBy('razon_social', 'asc')->get();
        return view('admin.responsables_equipos.edit', compact('responsableEquipo','empresas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'empresa_id' => ['required','numeric'],
            'identificacion' => ['required', 'numeric'],
            'nombre' => ['required', 'string', 'max:50'],
            'apellido' => ['required', 'string', 'max:50'],
            'telefono' => ['required', 'string', 'max:20']
        ]);

        try {
            $responsableEquipo = ResponsableEquipo::where('id', $id)->update([
                'empresa_id' => $request->empresa_id,
                'identificacion' => $request->identificacion,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'telefono' => $request->telefono
            ]);

            if (!$responsableEquipo) {
                Alert::error(
                    'No fue posible actualizar el registro del responsable',
                    'Comunicarse con soporte técnico - +573217114140'
                );

                return $this->edit($id);
            }

            Alert::success('Actualización del responsable completa', "$request->nombre actualizado con éxito");
            return $this->edit($id);

        } catch (Exception $e) {
            Alert::error(
                'No fue posible actualizar el registro del responsable',
                "Comunicarse con soporte técnico - +573217114140. Error: " . $e->getMessage()
            );

            Log::error('ResponsableEquipoController.store ->' . $e->getMessage());
            return $this->edit($id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $responsableEquipo = ResponsableEquipo::where('id', $id)->delete();

            if (!$responsableEquipo) {
                Alert::error(
                    'No fue posible eliminar el registro del responsable',
                    'Comunicarse con soporte técnico - +573217114140'
                );

                return $this->index();
            }

            Alert::success('Eliminación del responsable completa');
            return $this->index();

        } catch (Exception $e) {
            Alert::error(
                'No fue posible eliminar el registro del responsable',
                "Comunicarse con soporte técnico - +573217114140. Error: " . $e->getMessage()
            );

            Log::error('ResponsableEquipoController.store ->' . $e->getMessage());
            return $this->index();
        }
    }
}
