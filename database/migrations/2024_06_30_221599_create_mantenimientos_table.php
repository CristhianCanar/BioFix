<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('responsable_id')->unsigned();
            $table->bigInteger('equipo_id')->unsigned();
            $table->boolean('retiro_equipo_IPS');
            $table->boolean('equipo_funcionando');
            $table->date('fecha_mantenimiento');
            $table->text('url_imagen');
            /* VERIFICACION BIOSEGURIDAD */
            $table->boolean('vb_pregunta_uno');
            $table->boolean('vb_pregunta_dos');
            /* VERIFICACION FUNCIONAMIENTO */
            $table->boolean('vf_carcasa');
            $table->boolean('vf_etiquetado');
            $table->boolean('vf_estructura_soporte');
            $table->boolean('vf_integridad_rosca_tapa');
            $table->boolean('vf_revision_limpieza_tanque');
            $table->boolean('vf_revision_fuga_gas');
            $table->boolean('vf_condicion_entorno');
            /* MANTENIMIENTO */
            $table->boolean('m_limpieza_externa');
            $table->boolean('m_limpieza_interna');
            $table->boolean('m_ajustes');
            $table->smallInteger('m_tiempo_usado');/* Tiempo usado en minutos */
            $table->timestamps();

            $table->foreign('equipo_id')
                ->references('id')
                ->on('equipos');

            $table->foreign('responsable_id')
                ->references('id')
                ->on('responsables_mantenimientos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};
