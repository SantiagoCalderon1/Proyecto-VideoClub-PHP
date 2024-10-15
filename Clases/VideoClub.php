<?php
class VideoClub
{
    private $nombre;
    private $productos = array(); //Array de soporte
    private $numProductos; //Campo calculado
    private $socios  = array(); //Array de cliente
    private $numSocios; //Campo Calculado

    public function __construct($nombre, $productos, $socios)
    {
        $this->nombre = $nombre;
        $this->numProductos++;
        $this->numSocios++;
    }

    //Anthony
    private function incluirProducto(producto $Soporte) {}
    
    //Santiago
    public function incluirCintaVideo($titulo, $precio, $duracion) {}
    
    //Anthony
    public function incluirDvd($titulo, $precio, $idiomas, $pantalla) {}
    
    //Santiago
    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ) {}
    
    //Anthony
    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3) {}

    //Santiago
    public function listarProductos() {
        $texto = "Listado de los ".$numProductos." productos disponibles:  ";
        for ($i=0; $i < count($productos) ; $i++) { 
            $producto =  $productos[$i];
            $texto += "<br>".$i.".-".$producto[$i]->muestraResumen();
        }
    }

    //Anthony
    public function listarSocios() {}

    //Santiago
    public function alquilarSocioProducto($numeroCliente, $numeroSoporte) {}
}
