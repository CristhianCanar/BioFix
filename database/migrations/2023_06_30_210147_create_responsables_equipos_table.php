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
        Schema::create('responsables_equipos', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->smallInteger('empresa_id')->unsigned();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('telefono', 100);
            $table->timestamps();

            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsables_equipos');
    }
};
