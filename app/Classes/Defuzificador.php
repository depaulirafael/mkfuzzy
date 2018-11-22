<?php

namespace App\Classes;

/**
 * @author Gaston
 * @copyright 2014
 */


/* 
    Clase abastracta que transforma un conjunto difuso en un valor concreto
*/
abstract class Defuzificador {
    
    
    public function __construct(){
    }
    
    /*
        funcion diferida que se encargara de calcular el valor crisp a partir del conjunto difuso generado por el motor 
        de inferencia 
    */
    public abstract function defuzificar($x);
     
}

?>