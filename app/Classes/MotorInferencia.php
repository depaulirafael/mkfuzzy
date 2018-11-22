<?php

namespace App\Classes;

/**
 * @author Gaston
 * @copyright 2014
 */
/* Clase abastracta que evalua las reglas de inferencia. Recibe como entrada la base de conocimiento con las reglas de inferencia y devuelve  un conjunto de reglas activadas para ser desfuzificadas. Por ejemplo el motor de inferencia mamadni evalua los antecedentes. 
  Las reglas con antecedente mayor que cero son activadas 
  y devueltas para resolver la defuzificacion con el metodo de desfuzificacion seleccionado

  Otro posible motor de inferencia es el de Takagi_Sugeno en el cual las salidas son funcion de las variables del antecedente
*/
abstract class MotorInferencia {
    protected $base_conocimiento; //reglas de inferencia de entrada al motor de inferencia
    protected $tnorma;            //TNorma utilizada para evaluar la conjuncion en los antecedentes   
    protected $tconorma;          //TConorma utilizada para evaluar la disjuncion en los antecedentes   
    protected $implicacion;       //Tipo de implicacion utilizada en las reglas de inferencia
    protected $agregacion;        //Tipo de TConorma usada en la agregacion de los resultados de las reglas de inferencia  


    public function __construct($BaseC, $tnorma, $tconorma, $implicacion, $agregacion){
        $this->set_base_conocimiento($BaseC);
        $this->tnorma = $tnorma;
        $this->tconorma = $tconorma;
        $this->implicacion = $implicacion;
        $this->agregacion = $agregacion;
    }
    /*
        funcion para asignar los limites donde sera aplicada la funcion de pertenencia
    */
    public function set_base_conocimiento($baseC){
        if ($baseC instanceOf BaseConocimiento){
            $this->base_conocimiento = $baseC;
        } else{
            throw new baseConocimientoException('Asignacion erronea de la base de conocimiento');
        }
    }
    
    public function set_tnorma($tnorma){
        $this->tnorma = $tnorma;
    }
    
    public function get_tnorma(){
        return $this->tnorma;
    }
    
    
    public function set_tconorma($tconorma){
        $this->tconorma = $tconorma;
    }

    public function get_tconorma(){
        return $this->tconorma;
    }

    public function set_implicacion($implicacion){
        $this->implicacion = $implicacion;
    }

    public function get_implicacion(){
        return $this->implicacion;
    }
    
    
    public function set_agregacion($agregacion){
        $this->agregacion = $agregacion;
    }

    public function get_agregacion(){
        return $this->agregacion;
    }
   

    /*
        funcion diferida que se encargara realizar la inferencia de las reglas de la base de conocimiento dados los valores de entrada
        Entrada: pares de valores variable fuzzy + valor crisp 
    */
    public abstract function inferir($valores);
    
     
    /*
    funcion que unifica los resultados individuales de las reglas activadas
    */
    public abstract function agregacion($activadas);
    
    /*
    funcion encargada de obtener el resultado de la inferencia a partir de la agregacion de las reglas activadas
    */
    public abstract function resultado();
     
}

?>