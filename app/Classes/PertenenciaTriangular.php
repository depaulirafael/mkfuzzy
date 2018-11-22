<?php

namespace App\Classes;

use App\Classes\Pertinencia;

/**
 * @author Gaston
 * @copyright 2014
 */

/*  Clase que hereda de la clase pertenencia e implementa la operacion calcular 
    pertenencia correspondiente a la triangular. 
*/
class PertenenciaTriangular extends Pertenencia{
    protected $modal; //valor modal que, junto a los limites izquierdo y derecho, definen el triangulo utilizado para el calculo de pertenencia
    
    /*
    constructor de clase que inicializa los limites y el modal
    */
    public function __construct($izq, $der, $modal){
        parent::__construct($izq, $der);
        $this->modal = $modal;
    }
    /*
    funcion que permite setear el valor modal
    */
    public function set_modal($modal){
        if (($modal>=$this->limite_izquierdo) and ($modal<=$this->limite_derecho)) // el modal esta entre los limites
            $this->modal = $modal;
        else{
            $this->modal = ($this->limite_derecho - $this->limite_izquierdo)/2; // si el modal no se encuentra entre los limites se asigna el valor medio arbitrariamente
        };
    }
    
    /*
        funcion que determina las intersecciones del perimetro triangular con la recta de y con valor entre 0 y 1
        el valor de entrada es el valor de y que representa la recta
        la salida son los valores de x que son la interseccion del triangulo con la recta de y
    */
    public function intersecciones_x($y){
        if ($y==1){
            return array($this->modal);
        }else{
            $x1 = $y*($this->modal - $this->limite_izquierdo) + $this->limite_izquierdo;
            $x2 = -($y*($this->limite_derecho - $this->modal)- $this->limite_derecho);
            return array($x1,$x2); 
        }
    }


    
    /*
    funcion que se encarga de calcular la pertenencia de un valor crisp utilizando el concepto de 
    pertenencia triangular
    */
    public function calcular_pertenencia($x){
        $a = $this->limite_izquierdo;
        $b = $this->limite_derecho;
        $result;


        if (($x<$a)or($x>$b)){//el valor esta fuera del triangulo
            return 0;
        }elseif ($x<$this->modal){ //el valor esta en la parte izq del triangulo
            return ($x-$a)/($this->modal-$a);
        }elseif (($x>=$this->modal) and ($this->modal==$b)){ //RINFINITY
            return 1;  
        }elseif ($x>=$this->modal){ //el valor esta en la parte derecha del triangulo
            return ($b-$x)/($b-$this->modal);
        };
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
        return array($this->modal);
        
    } 


    public function COG($y){
        if (($this->modal - $this->limite_izquierdo) == ($this->limite_derecho - $this->modal)){
            //estamos en el caso de una funcion de pertenencia triangular simetrica
            //el centro de gravedad coincide con el modal
            return $this->modal;
        }else{
            //calcular intersecciones con y
            //calcular centros de gravedad de los triangulos entre el limite izq y la interseccion y la segunda interseccion y el limite derecho
            //calcular el centro de gravedad del rectangulo entre ambas intersecciones y luego aplicar la formula de suma de centros
            $xs = $this->intersecciones_x($y);
            $c1 = $this->limite_izquierdo + ($xs[0]-$this->limite_izquierdo)*2/3;
            $a1 = abs(($xs[0]-$this->limite_izquierdo)*$y/2);
            $c2 = $xs[1] + ($this->limite_derecho - $xs[1])/3;
            $a2 = abs(($this->limite_derecho-$xs[1])*$y/2);
            $c3 = $xs[0]+abs(($xs[1]-$xs[0])/2);
            $a3 = abs(($xs[1]-$xs[0])*$y);
            return array(($c1*$a1+$c2*$a2+$c3*$a3)/($a1+$a2+$a3), $a1+$a2+$a3);
        };
    
    }
}


?>
