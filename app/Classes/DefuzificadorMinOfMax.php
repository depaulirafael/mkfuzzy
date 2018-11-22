<?php

namespace App\Classes;

use App\Classes\Defuzificador;

/**
 * @author Gaston
 * @copyright 2014
 */

/* 
 clase que hereda de la clase Defuzificador e implementa la operacion defuzificar correspondiente a la defuzificacion 
 de minimo de maximos  
*/
class DefuzificadorMinOfMax extends Defuzificador{
    protected $min; 
    
    /*
    funcion que permite obtener el valor de la defuzificacion
    */
    public function get_crisp(){
        return $this->min;
    }
    
    /*
    funcion que se encarga de obtener el valor crisp en funcion del conjunto difuso de entrada 
    entrada: los una variable linguistica que ha sido activada por el motor de inferencia
    salida: el valor crisp resultado de la defuzificacion. En este caso el Minimo de los Maximos
    */
    public function defuzificar($conj_discretos){
        foreach($conj_discretos as $nombre => $conj_discreto){
            $mayor = 0;
            //para cada nombre de var linguistica con su conj discreto, obtener el par (minima etiqueta_mayor, valor_discreto)
            foreach ($conj_discreto as $par_discreto){
                if ($par_discreto[1] > $mayor){
                    
                    $etiq_mayor = $par_discreto[0];
                    $mayor = $par_discreto[1];
               }
            }
            $min_of_max[$nombre] = array($etiq_mayor, $mayor);
        };
        return $min_of_max;
    }
}

?>