<?php

namespace Database\Seeders;

use App\Models\Equipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Equipo::create([
            "municipio_id" => '703',
            "responsable_id" => '1',
            "empresa_id" => '1',
            "nombre" => 'Equipo 1',
            "serie" => '12321231564',
            "marca" => 'Marca 1',
            "servicio" => 'Servicio 1',
            "ubicacion" => 'Carrera 11',
            "codigo_ECRI" => '001',
            "numero_documento" => '1234567890',
            "calibracion" => '1',
            "frecuencia_calibracion" => 'Bimestral',
            "frecuencia_mantenimiento" => 'Anual',
            "modelo" => 'Modelo 1',
            "activo_fijo" => 'Activo',
            "url_imagen" => 'NULL',
            "h_reg_INVIMA" => 'Invima',
            "h_reg_importacion" => 'Importacion',
            "h_reg_FDA" => 'FDA',
            "h_url_sitio_web" => 'N/A',
            "h_direccion_proveedor" => 'Carrera 11',
            "h_telefono" => '3216549872',
            "h_vida_util" => '1 año',
            "h_costo" => '11000',
            "h_garantia" => '1',
            "fa_electrica" => '1',
            "fa_bateria" => '0',
            "fa_regulada" => '0',
            "at_medico" => '1',
            "at_apoyo" => '1',
            "at_basico" => '0',
            "at_transporte" => '0',
            "at_clase_I" => '0',
            "at_clase_I_IA" => '0',
            "at_clase_I_IB" => '0',
            "at_clase_III" => '0',
            "ct_mecanica" => '1',
            "ct_hidraulica" => '1',
            "ct_neumatica" => '0',
            "ct_electrica_electronica" => '0',
            "p_electricos" => '1',
            "p_mecanicos" => '1',
            "p_hidraulicos" => '0',
            "p_otros" => '0',
            "m_usuario" => '1',
            "m_instalacion" => '0',
            "m_partes" => '0',
            "m_otros" => '0',
            "estado_funcional" => 'Bueno',
            "registra_accesorios" => '1',
            "rf_recomendaciones" => 'Buenas ',
            "rf_url_doc_adquisicion" => 'Documento',
            "rf_fecha_instalacion" => '2024-07-04',
            "rf_fecha_operacion" => '2024-07-04',
            "cb_apoyo_lab_clinico" => '1',
            "cb_diagnostico" => '1',
            "cb_soporte_mto_vida" => '0',
            "cb_rehabilitacion" => '0',
            "cb_prevencion" => '0',
            "mant_preventivo" => '1',
            "mant_correctivo" => '0',
            "mant_validacion" => 'Anual',
        ]);

    }
}
