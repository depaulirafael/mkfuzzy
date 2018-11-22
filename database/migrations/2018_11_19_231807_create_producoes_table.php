<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_animal');
            $table->date('data');
            $table->double('agua', 8, 2);
            $table->double('carboidratos', 8, 2);
            $table->double('proteinas', 8, 2);
            $table->double('micronutrientes', 8, 2);
            $table->double('resultado', 8, 2)->nullable();
            $table->text('obs')->nullable();
            $table->double('producao_real', 8, 2)->nullable();
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
        Schema::dropIfExists('producoes');
    }
}
