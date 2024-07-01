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
        Schema::create('bajas_equipos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('equipo_id')->unsigned();
            $table->text('evaluacion_tecnica');
            $table->text('evaluacion_clinica');
            $table->boolean('baja_garantia_proveedor');
            $table->boolean('baja_mal_uso');
            $table->boolean('baja_hurto');
            $table->boolean('baja_obsoleto');
            $table->boolean('baja_siniestro');
            $table->boolean('baja_venta');
            $table->boolean('baja_donacion');
            $table->text('observaciones');
            $table->text('clausula');/* Compromiso de quien da de baja */
            $table->timestamps();

            $table->foreign('equipo_id')
                ->references('id')
                ->on('equipos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bajas_equipos');
    }
};
