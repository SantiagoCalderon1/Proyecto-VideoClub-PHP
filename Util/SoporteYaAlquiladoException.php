<?php
namespace Dwes\ProyectoVideoClub\Util;

use \ProyectoVideoClub\Util\VideoclubException;

class SoporteYaAlquiladoException extends VideoclubException {
    public function __construct($msj = "El producto no está disponible para alquiler", $codigo = 0, Exception $previa = null) {
        
        parent::__construct($msj, $codigo, $previa);
    }
}

?>