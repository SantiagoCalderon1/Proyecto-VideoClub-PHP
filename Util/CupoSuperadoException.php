<?php
namespace Dwes\ProyectoVideoClub\Util;

use \ProyectoVideoClub\Util\VideoclubException;

class CupoSuperadoException extends VideoclubException {
    public function __construct($msj = "El cupo de alquileres ha alcanzado su limite", $codigo = 0, Exception $previa = null) {
        
        parent::__construct($msj, $codigo, $previa);
    }
}

?>