<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\ResponsableMantenimiento;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class ResponsableMantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $responsablesMantenimientos = ResponsableMantenimiento::orderBy('nombre', 'asc')->paginate(10);
        return view('admin.responsables_mantenimientos.manage', compact('responsablesMantenimientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::select('id', 'nit', 'razon_social')->orderBy('razon_social', 'asc')->get();
        return view('admin.responsables_mantenimientos.register', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'identificacion' => ['required', 'numeric'],
            'nombre' => ['required', 'string', 'max:50'],
            'apellido' => ['required', 'string', 'max:50'],
            'telefono' => ['required', 'string', 'max:20'],
            'cargo' => ['required', 'string', 'max:50']
        ]);

        try {
            $responsableMantenimiento = ResponsableMantenimiento::create([
                'identificacion' => $request->identificacion,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'telefono' => $request->telefono,
                'cargo' => $request->cargo
            ]);

            if (!$responsableMantenimiento) {
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

            Log::error('ResponsableMantenimientoController.store ->' . $e->getMessage());
            return $this->create();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $responsableMantenimiento = ResponsableMantenimiento::where('id', $id)->first();
        return view('admin.responsables_mantenimientos.show', compact('responsableMantenimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $responsableMantenimiento = ResponsableMantenimiento::where('id', $id)->first();
        $empresas = Empresa::select('id', 'nit', 'razon_social')->orderBy('razon_social', 'asc')->get();
        return view('admin.responsables_mantenimientos.edit', compact('responsableMantenimiento','empresas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'identificacion' => ['required', 'numeric'],
            'nombre' => ['required', 'string', 'max:50'],
            'apellido' => ['required', 'string', 'max:50'],
            'telefono' => ['required', 'string', 'max:20'],
            'cargo' => ['required', 'string', 'max:50']
        ]);

        try {
            $responsableMantenimiento = ResponsableMantenimiento::where('id', $id)->update([
                'identificacion' => $request->identificacion,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'telefono' => $request->telefono,
                'cargo' => $request->cargo
            ]);

            if (!$responsableMantenimiento) {
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

            Log::error('ResponsableMantenimientoController.store ->' . $e->getMessage());
            return $this->edit($id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $responsableMantenimiento = ResponsableMantenimiento::where('id', $id)->delete();

            if (!$responsableMantenimiento) {
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

            Log::error('ResponsableMantenimientoController.store ->' . $e->getMessage());
            return $this->index();
        }
    }
}
