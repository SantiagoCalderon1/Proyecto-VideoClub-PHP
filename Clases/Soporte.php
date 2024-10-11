<?php
class Soporte
{
    /**Definir una constante mediante un propiedad privada y estática 
     * denominada IVA con un valor del 21%
     **/
    private static $IVA =  0.21;
    public $titulo;
    protected $numero;
    private $precio;

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
        return  $this->precio + ($this->precio * self::$IVA);
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
