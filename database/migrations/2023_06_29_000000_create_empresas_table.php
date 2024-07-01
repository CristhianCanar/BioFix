<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->smallInteger('municipio_id')->unsigned();
            $table->string('nit', 50);
            $table->string('razon_social', 200);
            $table->string('numero_contrato', 200);
            $table->string('direccion', 200);
            $table->string('telefono', 20);
            $table->timestamps();

            $table->foreign('municipio_id')
                ->references('id_municipio')
                ->on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
