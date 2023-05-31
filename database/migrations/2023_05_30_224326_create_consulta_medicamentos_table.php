<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta_medicamentos', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');


            //Relación con medicamento
            $table->unsignedBigInteger('idMedicamento')->nullable();
            $table->foreign('idMedicamento')
                ->references('id')
                ->on('medicamentos')
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
        Schema::dropIfExists('consulta_medicamentos');
    }
};
