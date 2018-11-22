<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('regras')->insert(
            array(
                'termo_agua'            => 1,
                'termo_carboidratos'    => 1,
                'termo_proteinas'       => 1,
                'termo_micronutrientes' => 1,
                'termo_resultado' => 1,
                'tipo_conexao' => 2,
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
