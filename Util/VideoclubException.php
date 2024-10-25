<?php
namespace Dwes\ProyectoVideoClub\Util;
use Exception;

class VideoclubException extends Exception{
    // Clase base para todas las excepciones del videoclub

    public function __construct($msj = "Error en la clase VideoClub", $codigo = 0, Exception $previa = null) {
        
        parent::__construct($msj, $codigo, $previa);
    }
    
    public function miFuncion() {//EJEMPLO CONTROLAR METODO: sobrescribe un metodo para cambiar el mensaje q daria si da error
        echo "Una función personalizada para este tipo de excepción\n";
    }


}

?>