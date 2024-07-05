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
            $table->string('baja_motivo', 50);
            $table->date('baja_fecha');
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
