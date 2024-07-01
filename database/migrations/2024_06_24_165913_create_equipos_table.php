<?php

use App\Utils\Equipos\Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('municipio_id')->unsigned();
            $table->smallInteger('responsable_id')->unsigned();
            $table->string('nombre', 200);
            $table->string('serie', 100);
            $table->string('marca', 100);
            $table->string('servicio', 200)->nullable();
            $table->text('ubicacion');
            $table->string('codigo_ECRI');
            $table->string('numero_documento');
            $table->boolean('calibracion');
            $table->enum('frecuencia_calibracion', Constants::FRECUENCIA_CALIBRACION)->nullable();
            $table->enum('frecuencia_mantenimiento', Constants::FRECUENCIA_CALIBRACION);
            $table->string('modelo');
            $table->string('activo_fijo');
            $table->text('url_imagen')->nullable();
            /* REGISTRO HISTORICO */
            $table->string('h_reg_INVIMA');
            $table->string('h_reg_importacion');
            $table->string('h_reg_FDA');
            $table->string('h_url_sitio_web');
            $table->string('h_direccion_proveedor');
            $table->string('h_telefono');
            $table->string('h_vida_util');
            $table->string('h_costo');
            $table->string('h_garantia');
            /* FUENTES DE ALIMENTACION */
            $table->boolean('fa_electrica');
            $table->boolean('fa_bateria');
            $table->boolean('fa_regulada');
            /* REGISTRO DE APOYO TECNICO */
            $table->boolean('at_medico');
            $table->boolean('at_apoyo');
            $table->boolean('at_basico');
            $table->boolean('at_transporte');
            $table->boolean('at_clase_I');
            $table->boolean('at_clase_I_IA');
            $table->boolean('at_clase_I_IB');
            $table->boolean('at_clase_III');
            /* CLASIFICACION TECNOLOGICA */
            $table->boolean('ct_electricos');
            $table->boolean('ct_mecanicos');
            $table->boolean('ct_neumatica');
            $table->boolean('ct_electrica_electronica');
            /* PLANOS */
            $table->boolean('p_electricos');
            $table->boolean('p_mecanicos');
            $table->boolean('p_hidraulicos');
            $table->boolean('p_otros');
            /* MANUALES */
            $table->boolean('m_usuario');
            $table->boolean('m_instalacion');
            $table->boolean('m_partes');
            $table->boolean('m_otros');
            /* REG EVAL OPERATIVA ESTADO FUNCIONAL */
            $table->enum('estado_funcional', Constants::ESTADO_FUNCIONAL);
            /* ACCESORIOS */
            $table->boolean('registra_accesorios');
            /* RECOMENDACIONES DEL FABRICANTE */
            $table->text('rf_recomendaciones');
            $table->text('rf_url_doc_adquisicion');
            $table->date('rf_fecha_instalacion');
            $table->date('rf_fecha_operacion');
            /* MANTENIMIENTO */
            $table->boolean('mant_preventivo');
            $table->boolean('mant_correctivo');
            $table->enum('mant_validacion', Constants::MANT_VALIDACION);
            $table->timestamps();

            $table->foreign('municipio_id')
                ->references('id_municipio')
                ->on('municipios');

            $table->foreign('responsable_id')
                ->references('id')
                ->on('responsables_equipos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
