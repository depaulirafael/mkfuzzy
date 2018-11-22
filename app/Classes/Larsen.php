<?php

namespace App\Classes;

use App\Classes\Implicacion;

/**
 * @author Gaston
 * @copyright 2014
 */

/* 
 clase que hereda de la clase implicacion y define el tipo de implicacion de Larsen (Producto)
*/
class Larsen extends Implicacion {

    /*
    Implicaci�n que concreta la operaci�n implicar(num1, num2) mediante la funci�n:
	F(x, y) = x * y
    */
    public function implicar($x, $y){
        return $x*$y;
    }
}

?>