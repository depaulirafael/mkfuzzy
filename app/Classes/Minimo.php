<?php

namespace App\Classes;

use App\Classes\TNorma;

/**
 * @author Gaston
 * @copyright 2014
 */

/* 
 clase que hereda de la clase TNorma e implementa la funcion operador del Minimo
*/
class Minimo extends TNorma{
    /*
    constructor de clase que inicializa el nombre y el tipo de operador
    */
    public function __construct($nombre){
        parent::__construct($nombre);
    }

    public function operar($x, $y){
        if ($x<$y) {return $x;}
        else return $y;
    }
}

?>