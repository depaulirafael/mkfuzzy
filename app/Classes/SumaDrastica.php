<?php

namespace App\Classes;

use App\Classes\TConorma;

/**
 * @author Gaston
 * @copyright 2014
 */

/* 
 clase que hereda de la clase TConorma e implementa la funcion operador de la Suma Drastica
*/
class SumaDrastica extends TConorma{
    /*
    constructor de clase que inicializa el nombre y el tipo de operador
    */
    public function __construct($nombre){
        parent::__construct($nombre);
    }

    public function operar($x, $y){
        if ($x==0) 
            return $y;
        elseif ($y==0) 
               return $x;
        else    
            return 1; 
    }
}

?>