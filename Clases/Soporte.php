<?php
class Soporte
{
    /**Definir una constante mediante un propiedad privada y estática 
     * denominada IVA con un valor del 21%
     **/
    private static $IVA =  0.21;
    public $titulo;
    protected $numero = 0;
    private $precio;

    public function __construct($titulo, $precio)
    {
        $this->titulo = $titulo;
        $this->precio = $precio;
        $this->numero = ++$this->numero;
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
        echo "<br> Titulo: " . $this->titulo .
            "<br> Numero de soporte: " . $this->numero .
            "<br> Precio:" . $this->getPrecio() . " € (IVA no incluido)".
            "<br> Precio: ".$this->getPrecioConIva()." € (IVA incluido)";
    }
}
