<?php
namespace Dwes\ProyectoVideoClub\Util;

use \ProyectoVideoClub\Util\VideoclubException;

class ClienteNoEncontradoException extends VideoclubException {
    public function __construct($msj = "Socio no encontrado en el videoclub", $codigo = 0, Exception $previa = null) {
        
        parent::__construct($msj, $codigo, $previa);
    }
}

?>