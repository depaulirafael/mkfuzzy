<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultado', function (Blueprint $table) {
            $table->increments('id');
            $table->double('ruim_a', 8, 2);
            $table->double('ruim_b', 8, 2);
            $table->double('satisfatorio_a', 8, 2);
            $table->double('satisfatorio_b', 8, 2);
            $table->double('satisfatorio_c', 8, 2);
            $table->double('excelente_a', 8, 2);
            $table->double('excelente_b', 8, 2);
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
        Schema::dropIfExists('resultado');
    }
}
