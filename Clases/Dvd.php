<?php
include_once "Soporte.php";

class Dvd extends Soporte
{
    public $idiomas;
    public $formatPantalla;

    public function __construct($titulo, $precio, $idiomas,  $formatPantalla)
    {
        parent::__construct($titulo, $precio);
        $this->idiomas = $idiomas;
        $this->formatPantalla = $formatPantalla;
    }

    public function muestraResumen()
    {
        parent::muestraResumen();
        echo "<br> Idiomas: " . $this->idiomas . 
        "<br>Formato Pantalla: " . $this->formatPantalla;
    }
}