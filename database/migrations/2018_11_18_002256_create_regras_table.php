<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('termo_agua');
            $table->boolean('not_agua');
            $table->integer('termo_carboidratos');
            $table->boolean('not_carboidratos');
            $table->integer('termo_proteinas');
            $table->boolean('not_proteinas');
            $table->integer('termo_micronutrientes');
            $table->boolean('not_micronutrientes');
            $table->integer('termo_resultado');
            $table->boolean('not_resultado');
            $table->integer('tipo_conexao');
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
        Schema::dropIfExists('regras');
    }
}
