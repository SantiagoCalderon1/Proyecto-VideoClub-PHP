<?php 
include_once "Soporte.php";

class Dvd extends Soporte{

    public $idiomas = "";
    public $formatPantalla = "";

    public function __construct($titulo,  $numero, $precio, $idiomas,  $formatPantalla)
    {
        parent::__construct($titulo,  $numero, $precio);
        $this->idiomas = $idiomas;
        $this->formatPantalla = $formatPantalla;
    }

    public function muestraResumen()
    {
        parent::muestraResumen()."<br> Idiomas:".$this->idiomas."Formato pantalla:".$this->formatPantalla;
    }
}
?>