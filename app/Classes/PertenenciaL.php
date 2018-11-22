<?php

namespace App\Classes;

use App\Classes\PertenenciaTrapezoidal;

/**
 * @author Gaston
 * @copyright 2014
 */

/* 
 clase que hereda de la clase pertenenciaTrapezoidal e implementa la operacion calcular pertenencia correspondiente
 a la L.  
*/
class PertenenciaL extends PertenenciaTrapezoidal{
    
    /*
    constructor de clase que inicializa los limites y los soportes
    */
    public function __construct($izq, $der, $soporte_der){
        parent::__construct($izq, $der, $izq, $soporte_der);
    }

    /*
    funcion que permite setear el soporte
    */
    public function set_soporte($soporte_der){
        $this->soporte_izq = $this->limite_izquierdo;
        if (($soporte_der>$this->limite_izquierdo) and ($soporte_der<=$this->limite_derecho)){ // el soporte esta entre los limites
           $this->soporte_der = $soporte_der;
        }else{
           $this->soporte_der = $this->limite_derercho;
        }; 
    }

    
    public function intersecciones_x($y){
    }


    /*
    funcion que se encarga de calcular la pertenencia de un valor crisp utilizando el concepto de 
    pertenencia L
    */
    public function calcular_pertenencia($x){
        if ($x>$this->limite_derecho){
           return 0;
        }else{
           return parent::calcular_pertenencia($x);
        }
    }
    
    

    public function COG($y){
    }

 
    public function maximos(){
        return array($this->soporte_izq, $this->soporte_der);
    }


}


?>