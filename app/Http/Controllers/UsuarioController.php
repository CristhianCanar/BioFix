<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;
use Exception;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::orderBy('nombre', 'asc')->paginate(10);
        return view('admin.usuarios.manage', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::select('id', 'nit', 'razon_social')->orderBy('razon_social', 'asc')->get();
        $roles = Rol::select('id', 'name')->orderBy('name', 'asc')->get();
        return view('admin.usuarios.register', compact('empresas','roles'));
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
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'empresa_id' => ['nullable','numeric'],
            'rol' => ['required','string']
        ]);

        try {
            $usuario = User::create([
                'identificacion' => $request->identificacion,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'empresa_id' => $request->empresa_id
            ]);

            if (!$usuario) {
                Alert::error(
                    'No fue posible almacenar el registro del usuario',
                    'Comunicarse con soporte técnico - +573217114140'
                );

                return $this->create();
            }

            $rol = $usuario->assignRole($request->rol);

            if (!$rol) {
                Alert::error(
                    'No fue posible almacenar el rol del usuario',
                    'Comunicarse con soporte técnico - +573217114140'
                );

                return $this->create();
            }

            Alert::success('Registro del usuario completo', "$request->nombre almacenado con éxito");
            return $this->create();

        } catch (Exception $e) {
            Alert::error(
                'No fue posible almacenar el registro del usuario',
                "Comunicarse con soporte técnico - +573217114140. Error: " . $e->getMessage()
            );

            Log::error('UsuarioController.store ->' . $e->getMessage());
            return $this->create();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = User::where('id', $id)->first();
        return view('admin.usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = User::where('id', $id)->first();
        $empresas = Empresa::select('id', 'nit', 'razon_social')->orderBy('razon_social', 'asc')->get();
        $roles = Rol::select('id', 'name')->orderBy('name', 'asc')->get();
        return view('admin.usuarios.edit', compact('usuario','empresas','roles'));
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
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'empresa_id' => ['nullable','numeric'],
            'rol' => ['required','string']
        ]);

        try {
            $usuario = User::where('id', $id)->update([
                'identificacion' => $request->identificacion,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'empresa_id' => $request->empresa_id
            ]);

            if (!$usuario) {
                Alert::error(
                    'No fue posible actualizar el registro del usuario',
                    'Comunicarse con soporte técnico - +573217114140'
                );

                return $this->edit($id);
            }

            $usuario = User::where('id', $id)->first();
            $rol = $usuario->removeRole($request->rol);
            $rol = $usuario->assignRole($request->rol);

            if (!$rol) {
                Alert::error(
                    'No fue posible almacenar el rol del usuario',
                    'Comunicarse con soporte técnico - +573217114140'
                );

                return $this->create();
            }

            Alert::success('Actualización del usuario completa', "$request->nombre actualizado con éxito");
            return $this->edit($id);

        } catch (Exception $e) {
            Alert::error(
                'No fue posible actualizar el registro del usuario',
                "Comunicarse con soporte técnico - +573217114140. Error: " . $e->getMessage()
            );

            Log::error('UsuarioController.store ->' . $e->getMessage());
            return $this->edit($id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $usuario = User::where('id', $id)->delete();

            if (!$usuario) {
                Alert::error(
                    'No fue posible eliminar el registro del usuario',
                    'Comunicarse con soporte técnico - +573217114140'
                );

                return $this->index();
            }

            Alert::success('Eliminación del usuario completa');
            return $this->index();

        } catch (Exception $e) {
            Alert::error(
                'No fue posible eliminar el registro del usuario',
                "Comunicarse con soporte técnico - +573217114140. Error: " . $e->getMessage()
            );

            Log::error('UsuarioController.store ->' . $e->getMessage());
            return $this->index();
        }
    }
}
