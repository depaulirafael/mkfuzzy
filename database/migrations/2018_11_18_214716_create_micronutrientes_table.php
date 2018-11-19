<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMicronutrientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('micronutrientes', function (Blueprint $table) {
            $table->increments('id');
            $table->double('ruim_a', 8, 2);
            $table->double('ruim_b', 8, 2);
            $table->double('regular_a', 8, 2);
            $table->double('regular_b', 8, 2);
            $table->double('regular_c', 8, 2);
            $table->double('bom_a', 8, 2);
            $table->double('bom_b', 8, 2);
            $table->double('bom_c', 8, 2);
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
        Schema::dropIfExists('micronutrientes');
    }
}
