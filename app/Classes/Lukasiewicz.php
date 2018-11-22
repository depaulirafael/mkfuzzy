<?php

namespace App\Classes;

use App\Classes\Implicacion;

/**
 * @author Gaston
 * @copyright 2014
 */

/* 
 clase que hereda de la clase implicacion y define el tipo de implicacion de Lukasiewicz
*/
class Lukasiewicz extends Implicacion{

    /*
    Implicacion que concreta la operacion implicar(num1, num2) mediante la funcion:
	F(x, y) = min(1, 1 - x + y)
    */
    public function implicar($x, $y){
        $b = 1-$x+$y;
        if ($b<=1)
            return $b;
        else 
            return 1;
    }
}

?>