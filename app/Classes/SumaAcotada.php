<?php

namespace App\Classes;

use App\Classes\TConorma;

/**
 * @author Gaston
 * @copyright 2014
 */

/* 
 clase que hereda de la clase TConorma e implementa la funcion operador Suma acotada
*/
class SumaAcotada extends TConorma{
    /*
    constructor de clase que inicializa el nombre y el tipo de operador
    */
    public function __construct($nombre){
        parent::__construct($nombre);
    }

    public function operar($x, $y){
        if ($x+$y < 1) return $x+$y;
        else
            return 1;
    }
}

?>