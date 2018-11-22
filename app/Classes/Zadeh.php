<?php

namespace App\Classes;

use App\Classes\Implicacion;

/**
 * @author Gaston
 * @copyright 2014
 */

/* 
 clase que hereda de la clase implicacion y define el tipo de implicacion de Zadeh
*/
class Zadeh extends Implicacion{

    /*
    Implicacion que concreta la operacion implicar(num1, num2) mediante la funcion:
	F(x, y) = max(min(x, y), 1-x)
    */
    public function implicar($x, $y){ 
        $b = 1-$x;
        if ($x<=$y)
            $min = $x;
        else 
            $min = $y;
        if ($min>=$b)
            return $min;
        else
            return $b;
    }
}

?>