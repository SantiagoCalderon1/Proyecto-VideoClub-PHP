<?php

namespace ProyectoVideoClub\util;

use Exception;

class VideoclubException extends Exception
{
    // Clase base para todas las excepciones del videoclub
    public function __construct($message = "Ocurrió un error en el videoclub.", $code = 0, Exception $previous = null)
    {
        // Llama al constructor de la clase padre (Exception)
        parent::__construct($message, $code, $previous);
    }
}
