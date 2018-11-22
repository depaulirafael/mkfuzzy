<?php

namespace App\Classes;

use App\Classes\Implicacion;

/**
 * @author Gaston
 * @copyright 2014
 */

/* 
 clase que hereda de la clase implicacion y define el tipo de implicacion de Mamdani (Minimo)
*/
class Mamdani extends Implicacion {

    /*
    Implicacion que concreta la operacion implicar(num1, num2) mediante la funcion:
	F(x, y) = min(x, y)
    */
    public function implicar($x, $y){
        if ($x<=$y)
            return $x;
        else 
            return $y;
    }
}

?>