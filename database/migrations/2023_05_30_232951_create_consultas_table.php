<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();

            // relacion con usuario
            $table->unsignedBigInteger('idUsuario')->nullable();
            $table->foreign('idUsuario')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            // relacion paciente
            $table->unsignedBigInteger('idPaciente')->nullable();
            $table->foreign('idPaciente')
                ->references('id')
                ->on('pacientes')
                ->onDelete('set null');

            // relacion con medicamento
            $table->unsignedBigInteger('idMedicamento')->nullable();
            $table->foreign('idMedicamento')
                ->references('id')
                ->on('consulta_medicamentos')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
};
