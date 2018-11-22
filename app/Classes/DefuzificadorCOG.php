<?php

namespace App\Classes;

use App\Classes\Defuzificador;

/**
 * @author Gaston
 * @copyright 2014
 */

/* 
 clase que hereda de la clase Defuzificador e implementa la operacion defuzificar correspondiente a la defuzificacion 
 del Centroide  
*/
class DefuzificadorCOG extends Defuzificador{
    protected $COG; 
    
    /*
    funcion que permite obtener el valor de la defuzificacion
    */
    public function get_crisp(){
        return $this->COG;
    }
    

    /*
    funcion que se encarga de obtener el valor crisp en funcion del conjunto difuso de entrada 
    entrada: los conjuntos discretos resultado de la implicacion identificados por el nombre de cada Variable Linguistica
    salida: un arreglo donde los subindices son los nombre de las variables linguisticas y los elementos son el valor crisp resultado de la defuzificacion del centroide
    */
    public function defuzificar($conj_discretos){
        $centroides = array();
        foreach($conj_discretos as $nombre => $conj_discreto){
            $suma_areas = 0;
            $suma_alturas = 0;
            //para cada nombre de var linguistica con su conj discreto, obtener la media de los pares (minima etiqueta_mayor, valor_discreto)
            foreach ($conj_discreto as $par_discreto){
                if ($par_discreto[1] > 0){ //Si el resultado de la implicacion en el punto es mayor que 0 entonces sumar areas
                    $suma_areas = $suma_areas + $par_discreto[0]*$par_discreto[1];

//                    $suma_areas = $suma_areas + $par_discreto[0]*$par_discreto[1];
                    $suma_alturas = $suma_alturas + $par_discreto[1];
               }
            }
            $centroides[$nombre] = array($suma_areas/$suma_alturas);
//            $centroides[$nombre] = array($suma_areas/$suma_alturas);
        }
        return $centroides;
    }

}

?>