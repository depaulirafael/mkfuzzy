<?php

namespace App\Classes;

use App\Classes\OperadorDifuso;

/**
 * @author Gaston
 * @copyright 2014
 */

/* 
 clase que hereda de la clase operador difuso y define el tipo de operador como de Union
*/
abstract class TConorma extends OperadorDifuso {
    /*
    constructor de clase que inicializa el nombre y el tipo de operador
    */
    public function __construct($nombre){
        parent::__construct($nombre);
        $this->tipo = "Union";
    }
}

?>