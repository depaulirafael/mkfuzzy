<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('agua')->insert(
            array(
                'ruim_a' => 0,
                'ruim_b' => 90,
                'regular_a' => 90,
                'regular_b' => 100,
                'regular_c' => 110,
                'bom_a' => 110,
                'bom_b' => 115,
                'bom_c' => 120,
                'excelente_a' => 120,
                'excelente_b' => 180,
            )
        );
        DB::table('carboidratos')->insert(
            array(
                'ruim_a' => 0,
                'ruim_b' => 15,
                'regular_a' => 15,
                'regular_b' => 17,
                'regular_c' => 19,
                'bom_a' => 18,
                'bom_b' => 20,
                'bom_c' => 22,
                'excelente_a' => 22,
                'excelente_b' => 30,
            )
        );
        DB::table('proteinas')->insert(
            array(
                'ruim_a' => 0,
                'ruim_b' => 3.3,
                'regular_a' => 3.1,
                'regular_b' => 3.4,
                'regular_c' => 3.7,
                'bom_a' => 3.6,
                'bom_b' => 3.9,
                'bom_c' => 4.2,
                'excelente_a' => 3.9,
                'excelente_b' => 5,
            )
        );
        DB::table('micronutrientes')->insert(
            array(
                'ruim_a' => 0,
                'ruim_b' => 30,
                'regular_a' => 40,
                'regular_b' => 50,
                'regular_c' => 60,
                'bom_a' => 50,
                'bom_b' => 70,
                'bom_c' => 90,
                'excelente_a' => 80,
                'excelente_b' => 100,
            )
        );
        DB::table('resultado')->insert(
            array(
                'ruim_a' => 0,
                'ruim_b' => 20,
                'satisfatorio_a' => 20,
                'satisfatorio_b' => 22,
                'satisfatorio_c' => 24,
                'excelente_a' => 24,
                'excelente_b' => 30,
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
