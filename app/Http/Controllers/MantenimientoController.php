<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mantenimientos\MantenimientoStoreRequest;
use App\Models\Equipo;
use App\Models\Mantenimiento;
use App\Models\RepuestoMantenimiento;
use App\Models\ResponsableMantenimiento;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class MantenimientoController extends Controller
{
    public function createMantenimiento() {
        $equipos = Equipo::select('id', 'nombre', 'serie', 'modelo')->orderBy('nombre', 'desc')->get();
        $responsables = ResponsableMantenimiento::select('id', 'nombre', 'apellido')->orderBy('nombre', 'desc')->get();
        return view('admin.mantenimientos.register', compact('equipos', 'responsables'));
    }
    public function storeMantenimiento(MantenimientoStoreRequest $request) {
        $request->validate;
        try {
            //$frecuencia_calibracion_select = $request->calibracion ? $request->frecuencia_calibracion : null;
            $imagePath = null;
            if ($request->hasFile('url_imagen')) {
                $imageName = time() . '.' . $request->url_imagen->getClientOriginalExtension();
                $imagePath = $request->url_imagen->storeAs('img_mantenimientos', $imageName, 'public');
            }

            $mantenimiento = Mantenimiento::create([
                'responsable_id' => $request->responsable_id,
                'equipo_id' => $request->equipo_id,
                'retiro_equipo_IPS' => $request->retiro_equipo_IPS,
                'equipo_funcionando' => $request->equipo_funcionando,
                'fecha_mantenimiento' => $request->fecha_mantenimiento,
                'url_imagen' => $imagePath,
                /* VERIFICACION BIOSEGURIDAD */
                'vb_pregunta_uno' => $request->vb_pregunta_uno,
                'vb_pregunta_dos' => $request->vb_pregunta_dos,
                /* VERIFICACION FUNCIONAMIENTO */
                'vf_carcasa' => $request->vf_carcasa,
                'vf_etiquetado' => $request->vf_etiquetado,
                'vf_estructura_soporte' => $request->vf_estructura_soporte,
                'vf_integridad_rosca_tapa' => $request->vf_integridad_rosca_tapa,
                'vf_revision_limpieza_tanque' => $request->vf_revision_limpieza_tanque,
                'vf_revision_fuga_gas' => $request->vf_revision_fuga_gas,
                'vf_condicion_entorno' => $request->vf_condicion_entorno,
                /* MANTENIMIENTO */
                'm_limpieza_externa' => $request->m_limpieza_externa,
                'm_limpieza_interna' => $request->m_limpieza_interna,
                'm_ajustes' => $request->m_ajustes,
                'm_tiempo_usado' => $request->m_tiempo_usado,
            ]);

            if (!$mantenimiento) {
                Alert::error(
                    'No fue posible registrar el mantenimiento',
                    'Comunicarse con soporte técnico - +573217114140'
                );
                return $this->createMantenimiento();
            }

            $repuestos = null;
            if ($request->repuestos[0]['repuesto'] != null) {
                $repuestos = $request->repuestos;
                foreach ($repuestos as $repuesto) {
                    $storeRepuesto = RepuestoMantenimiento::create([
                        'mantenimiento_id' => $mantenimiento->id,
                        'fecha_reporte' => $repuesto['fecha_reporte'],
                        'repuesto' => $repuesto['repuesto'],
                        'proveedor' => $repuesto['proveedor'],
                        'cantidad' => $repuesto['cantidad'],
                    ]);
                    if (!$storeRepuesto) {
                        Alert::error(
                            'No fue posible registrar el mantenimiento',
                            'Comunicarse con soporte técnico - +573217114140'
                        );
                        return $this->createMantenimiento();
                    }
                }
            }
            Alert::success('Registro del mantenimiento completo', 'Mantenimiento realizado al equipo: '.$mantenimiento->equipos->nombre);
            return $this->createMantenimiento();
        } catch (Exception $e) {
            DB::rollBack();
            Alert::error(
                'No fue posible registrar el mantenimiento',
                "Comunicarse con soporte técnico - +573217114140. Error: " . $e->getMessage()
            );
            Log::error('MantenimientoController.storeMantenimiento -> '.$e->getMessage());
            return $this->createMantenimiento();
        }
    }
}
