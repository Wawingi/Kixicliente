<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->string('CeGeneral');
            $table->string('nome',255);
            $table->string('telefone1',20)->nullable();
            $table->string('telefone2',20)->nullable();
            $table->string('bilhete',20)->nullable();
            $table->timestamps();

            $table->primary('CeGeneral');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
