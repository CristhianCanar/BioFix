<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Empresa;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::select('id', 'nit', 'razon_social', 'telefono')->orderBy('razon_social', 'asc')->paginate(2);
        return view('admin.empresas.manage', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamento::select('id_departamento', 'nombre')->get();
        return view('admin.empresas.register', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'municipio_id' => 'required|string|exists:municipios,id_municipio',
            'nit' => 'required|string|max:50',
            'razon_social' => 'required|string|max:200',
            'numero_contrato' => 'required|string|max:200',
            'direccion' => 'required|string|max:200',
            'telefono' => 'required|string|max:20',
        ]);

        try {

            $empresa = Empresa::create([
                'municipio_id' => $request->municipio_id,
                'nit' => $request->nit,
                'razon_social' => $request->razon_social,
                'numero_contrato' => $request->numero_contrato,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
            ]);

            if (!$empresa) {
                Alert::error(
                    'No fue posible almacenar el registro de la empresa',
                    'Comunicarse con soporte técnico - +573217114140'
                );
                return $this->create();
            }
            Alert::success('Registro de la empresa completo', "$request->razon_social almacenada con éxito");
            return $this->create();
        } catch (Exception $e) {
            Alert::error(
                'No fue posible almacenar el registro de la empresa',
                "Comunicarse con soporte técnico - +573217114140. Error: " . $e->getMessage()
            );
            Log::error('EmpresaController.store ->'. $e->getMessage());
            return $this->create();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empresa = Empresa::where('id', $id)->first();
        return view('admin.empresas.show', compact('empresa'));
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

    public function getMunicipios($departamento_id)
    {
        $municipios = DB::table('departamentos')
            ->join('municipios', 'departamentos.id_departamento', '=', 'municipios.departamento_id')
            ->select('municipios.id_municipio', 'municipios.nombre')
            ->where('municipios.departamento_id', $departamento_id)
            ->get();

        foreach ($municipios as $municipio) {
            echo "<option value='{$municipio->id_municipio}'>{$municipio->nombre}</option>";
        }
    }
}
