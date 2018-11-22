<?php

namespace App\Classes;

use App\Classes\PertenenciaTrapezoidal;

/**
 * @author Gaston
 * @copyright 2014
 */

/* 
 clase que hereda de la clase pertenencia e implementa la operacion calcular pertenencia correspondiente
 a la Gamma  
*/
class PertenenciaGamma extends PertenenciaTrapezoidal{
    
    /*
    constructor de clase que inicializa los limites y los soportes
    */
    public function __construct($izq, $der, $soporte_izq){
        parent::__construct($izq, $der, $soporte_izq, $der);
    }

    /*
    funcion que permite setear el soporte
    */
    public function set_soporte($soporte_izq){
        $this->soporte_der = $this->limite_derecho;
        if (($soporte_izq>=$this->limite_izquierdo) and ($soporte_izq<$this->limite_derecho)){ // el soporte esta entre los limites
           $this->soporte_izq = $soporte_izq;
        }else{
           $this->soporte_izq = $this->limite_izquierdo;
        }; 
    }

    
    public function intersecciones_x($y){
    }


    /*
    funcion que se encarga de calcular la pertenencia de un valor crisp utilizando el concepto de 
    pertenencia Gamma
    */
    public function calcular_pertenencia($x){
        if ($x<$this->limite_izquierdo){
           return 0;
        }else{
           return parent::calcular_pertenencia($x);
        }
    }
    
    

    public function COG($y){
    }

}

?>