<?php
namespace Dwes\ProyectoVideoClub\Util;

use \ProyectoVideoClub\Util\VideoclubException;

class SoporteNoEncontradoException extends VideoclubException {
    public function __construct($msj = "Producto no encontrado en el videoclub", $codigo = 0, Exception $previa = null) {
        
        parent::__construct($msj, $codigo, $previa);
    }
}

?>