<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Empresa;
use App\Models\Equipo;
use App\Models\ResponsableEquipo;
use App\Utils\Equipos\Constants;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = Equipo::orderBy('nombre', 'asc')->paginate(2);
        return view('admin.equipos.manage', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $responsables = ResponsableEquipo::select('id', 'nombre', 'apellido')->orderBy('nombre', 'desc')->get();
        $empresas = Empresa::select('id', 'razon_social')->orderBy('razon_social', 'desc')->get();
        $frecuencias_calibracion = Constants::FRECUENCIA_CALIBRACION;
        $frecuencias_mantenimiento = Constants::FRECUENCIA_MANTENIMIENTO;
        $departamentos = Departamento::select('id_departamento', 'nombre')->get();
        $estados_funcional = Constants::ESTADO_FUNCIONAL;
        $mants_validacion = Constants::MANT_VALIDACION;
        return view(
            'admin.equipos.register',
            compact(
                'responsables',
                'empresas',
                'frecuencias_calibracion',
                'frecuencias_mantenimiento',
                'departamentos',
                'estados_funcional',
                'mants_validacion'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->has('calibracion') ? true : false);

        // Captura el valor del select si está habilitado
        // $selectedOption = $enableSelect ? $request->input('options') : null;
        $request->validate([
            'codigo' => 'required|string|unique:equipos,codigo',
            'nombre' => 'required|string|max:200',
            'tipo_equipo' => 'required|string|max:200',
            'fecha_ingreso' => 'required|date',
            'fecha_vencimiento' => 'required|date|after_or_equal:fecha_ingreso',
            'url_imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $imagePath = null;

            if ($request->hasFile('url_imagen')) {
                $imageName = time() . '.' . $request->url_imagen->getClientOriginalExtension();
                $imagePath = $request->url_imagen->storeAs('img_equipos', $imageName, 'public');
            }

            $equipo = Equipo::create([
                'codigo' => $request->codigo,
                'nombre' => $request->nombre,
                'tipo_equipo' => $request->tipo_equipo,
                'fecha_ingreso' => $request->fecha_ingreso,
                'fecha_vencimiento' => $request->fecha_vencimiento,
                'url_imagen' => $imagePath,
            ]);

            if (!$equipo) {
                Alert::error(
                    'No fue posible almacenar el registro del equipo',
                    'Comunicarse con soporte técnico - +573217114140'
                );
                return $this->create();
            }
            Alert::success('Registro del equipo completo', "$request->nombre almacenado con éxito");
            return $this->create();
        } catch (Exception $e) {
            Alert::error(
                'No fue posible almacenar el registro del equipo',
                "Comunicarse con soporte técnico - +573217114140. Error: " . $e->getMessage()
            );
            return $this->create();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
