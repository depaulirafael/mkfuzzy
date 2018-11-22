<?php

namespace App\Classes;

/**
 * @author Gaston
 * @copyright 2014
 */
/* Clase abastracta que se encarga de resolver la implicacion entre conjuntos difusos
*/
abstract class Implicacion {
    protected $nombre; //Nombre del tipo de Implicacion
    
    public function __construct($nombre){
        $this->nombre = $nombre;
    }

    /*
        funcion que retorna el nombre del implicador
    */
    public function get_nombre(){
        return $this->nombre;
    }
    
    /*
        funcion diferida que se encargara de realizar la operacion de implicacion entre conjuntos difusos 
    */
    public abstract function implicar($x, $y);

}

?>