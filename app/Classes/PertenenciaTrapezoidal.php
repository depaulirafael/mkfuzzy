<?php

namespace App\Classes;

use App\Classes\Pertinencia;

/**
 * @author Gaston
 * @copyright 2014
 */

/* 
 clase que hereda de la clase pertenencia e implementa la operacion calcular pertenencia correspondiente
 a la trapezoidal.  
*/
class PertenenciaTrapezoidal extends Pertenencia {
    protected $soporte_izq; //valor modal que, junto a los limites izquierdo y derecho y al soporte derecho, definen el trapecio utilizado para el calculo de pertenencia
    protected $soporte_der; //valor modal que, junto a los limites izquierdo y derecho y al soporte derecho, definen el trapecio utilizado para el calculo de pertenencia
    
    /*
    constructor de clase que inicializa los limites y los soportes
    */
    public function __construct($izq, $der, $soporte_izq, $soporte_der){
        parent::__construct($izq, $der);
        $this->set_soportes($soporte_izq, $soporte_der);
    }

    /*
    funcion que permite setear los soportes
    */
    public function set_soportes($soporte_izq, $soporte_der){
        if ($soporte_izq>$soporte_der){ // el modal esta entre los limites
           $this->soporte_izq = $soporte_der;
           $this->soporte_der = $soporte_izq;
        }else{
           $this->soporte_izq = $soporte_izq;
           $this->soporte_der = $soporte_der;
        }; 
    }

    
    public function intersecciones_x($y){
    }


    /*
    funcion que se encarga de calcular la pertenencia de un valor crisp utilizando el concepto de 
    pertenencia triangular
    */
    public function calcular_pertenencia($x){
        $a = $this->limite_izquierdo;
        $b = $this->limite_derecho;
        $result = 0;
        if (($x<$a)or($x>$b)){//el valor esta fuera del trapecio
            return 0;
        }elseif ($x<$this->soporte_izq){ //el valor esta en la parte izq del trapecio
            return ($x-$a)/($this->soporte_izq-$a);
        }elseif (($x>=$this->soporte_izq) and ($x<=$this->soporte_der) ){ //el valor esta entre los soportes del trapecio
            return 1;
        }else{    //el valor esta en la parte derecha del trapecio
            return ($b-$x)/($b-$this->soporte_der);
        };
    }
    
    

    public function COG($y){
    }

    /*
    funcion que discretiza la funcion triangular tomando como paso el valor de entrada $paso. Adiciona los maximos a la discretizacion.
    Devuelve como resultado un arreglo de pares (val crisp, valor de pertenencia del valor)
    */
    public function discretizar($paso, $maximos){
         $conj_discreto = array();
         $a=$this->limite_izquierdo / $paso;
         $b = intval ($this->limite_izquierdo/$paso);
         if ($a * $paso == $b * $paso){
            $inicio = $this->limite_izquierdo;
         }else{
            if ($b>=0){
                $inicio = ($b + 1) * $paso;
            }else{
                $inicio = $b * $paso;
            }
         }
         $i=0;
         $x = $inicio;
         while ($x <= $this->limite_derecho){
            $val = $this->calcular_pertenencia($x);
            $conj_discreto[$i] = array($x,$val);
            $i++;
            foreach ($maximos as $maximo){ //si se encuentra que alguno de los valores de x de los maximos se encuentra entre los valores de x de la discretizacion
                                           //entonces se agregan los valores de x de los maximos con su valor de pertenencia en la etiqueta linguistica.
                                           //Esto sera de utilidad a la hora de realizar la agregacion de los consecuentes de las reglas activadas. 
                if ($x<$maximo and $x+$paso >$maximo){ //si al discretizar no se coincide con el modal entonces se agrega el modal con el valor 1 de pertenencia 
                   $conj_discreto[$i]= array($maximo,$this->calcular_pertenencia($maximo));
                   $i++;
                }
            }
            $x = $x + $paso;
         }
         return $conj_discreto;
    }


    public function maximos(){
        return array($this->soporte_izq, $this->soporte_der);
    }

}

?>