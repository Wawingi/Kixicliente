<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabecalhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabecalho', function (Blueprint $table) {
            $table->string('CiFecha');
            $table->string('Oficina');
            $table->string('PeCodigo');
            $table->string('Producto');
            $table->string('Tecnologia');
            $table->string('Cliente');
            $table->string('PeSolicitud');
            $table->string('PeDesemFecha');
            $table->double('PeDesemMonto');
            $table->string('PeIntTipo');
            $table->double('PeIntTasa');
            $table->double('PeIntMonto');
            $table->string('Sectorista');
            $table->string('PePlaTipo');
            $table->integer('PePlaNumero');
            $table->string('PeEstado');
            $table->string('DataWO')->nullable();
            $table->string('Responsable');
            $table->string('Miembro');
            $table->double('DlMonto');
            $table->string('Destino');
            $table->integer('DlCiclo');
            $table->double('Dlmemint');
            $table->string('Identidad')->nullable();
            $table->integer('Homonimia');
            $table->integer('Pagos');
            $table->integer('Ciclo');
            $table->string('CeGenero');
            $table->double('PremioColateral')->nullable();
            $table->integer('PPxTC');
            $table->string('Observacao');
            $table->integer('Vermelho');

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
        Schema::dropIfExists('cabecalho');
    }
}
