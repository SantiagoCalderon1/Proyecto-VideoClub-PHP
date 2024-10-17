<?php
include_once "Soporte.php";

class CintaVideo extends Soporte{
    private int $duracion;

    public function __construct($titulo, $precio, $duracion){
        parent::__construct($titulo, $precio);
        $this->duracion = $duracion;
    }

    public function muestraResumen(){
        parent::muestraResumen();
        echo "<br>Duracion: ".$this->duracion . " minutos";
    }
}
?>