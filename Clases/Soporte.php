<?php
class Soporte
{
    private static $IVA =  0.21;
    public $titulo = "";
    protected $numero = "";
    private $precio = "";

    public function __construct($titulo,  $numero, $precio)
    {
        
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;

    }

    public function getPrecio()
    {
        return  $this->precio;
    }

    public function getPrecioConIva()
    {
        return  $this->precio * self::$IVA;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function muestraResumen()
    {
        echo "<br>".$this->titulo . "<br>" . $this->getPrecio() . " € " . "(IVA no incluido)";
    }
}
