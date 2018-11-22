<?php

namespace App\Classes;

/**
 * @author Gaston
 * @copyright 2014
 */

/* 
    Clase abastracta que calcula la pertenencia de un valor en un termino lingusitico
*/
abstract class Pertenencia{
    protected $limite_izquierdo; //menor valor del intervalo donde pude ser aplicada la funcion de pertenencia
    protected $limite_derecho;   //mayor valor del intervalo donde pude ser aplicada la funcion de pertenencia
    
    public function __construct($izq, $der){
        $this->set_limits($izq, $der);
    }
    /*
        funcion para asignar los limites donde sera aplicada la funcion de pertenencia
    */
    public function set_limits($izq, $der){
        if ($izq<$der){
            $this->limite_izquierdo = $izq;
            $this->limite_derecho = $der;
        } else{
            $this->limite_izquierdo = $der;
            $this->limite_derecho = $izq;
        }
    }
    
    public function get_limite_izquierdo(){
        return $this->limite_izquierdo;
    }

    public function get_limite_derecho(){
        return $this->limite_derecho;
    }

    /*
        funcion que discretiza la funcion de pertenencia en funcion del valor de paso que se recibe como entrada y en caso de encontrar algun maximo de otros terminos lo agrega.
    */
    public abstract function discretizar($paso, $maximos);

    
    /*
        funcion que devuelve los valores de x donde la funcion de pertenencia alcanza los maximos
    */
    public abstract function maximos();
    
    
    /*
        funcion diferida que se encargara de calcular el grado de pertenencia de un valor crisp (o entrada abrupta) 
    */
    public abstract function calcular_pertenencia($x);

    
    /*
        funcion que calcula el centro de gravedad de la figura definida por la funcion de pertenencia junto con la 
        asintota definida por y (y es el valor de pertenencia de la etapa de fuzificacion)
        entrada: valor de pertenencia del termino linguistico que tiene asociada la funcion de pertenencia actual
        salida: el centro de gravedad de la figura determinada por el area de la funcion de pertenencia y el valor y
        + el area de la misma
    */
    public abstract function COG($y);
     
}

?>
