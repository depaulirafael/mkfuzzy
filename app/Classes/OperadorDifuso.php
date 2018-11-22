<?php

namespace App\Classes;

/**
 * @author Gaston
 * @copyright 2014
 */
/* Clase abastracta que calcula la pertenencia de un valor en un termino lingusitico
*/
abstract class OperadorDifuso {
    protected $nombre; //Nombre del operador difuso
    protected $tipo;   //tipo de operador (Interseccion o union)
    
    public function __construct($nombre){
        $this->nombre = $nombre;
    }

    /*
        funcion que retorna el nombre del operador
    */
    public function get_nombre(){
        return $this->nombre;
    }
    
    /*
        funcion que retorna el nombre del operador
    */
    public function get_tipo(){
        return $this->tipo;
    }
    
    /*
        funcion diferida que se encargara de realizar la operacion difusa entre dos valores 
    */
    public abstract function operar($x, $y);

}

?>