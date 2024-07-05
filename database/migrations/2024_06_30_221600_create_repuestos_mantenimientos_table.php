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
        Schema::create('repuestos_mantenimientos', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->bigInteger('mantenimiento_id')->unsigned();
            $table->date('fecha_reporte');
            $table->string('repuesto', 100);
            $table->string('proveedor', 100);
            $table->smallInteger('cantidad')->unsigned();
            $table->timestamps();

            $table->foreign('mantenimiento_id')
                ->references('id')
                ->on('mantenimientos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repuestos_mantenimientos');
    }
};
