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
    public function incluirCintaVideo($titulo, $precio, $duracion) {
        array_push($this->productos, new CintaVideo($titulo, $precio, $duracion))
        $this->numProductos++;
    }
    
    //Anthony
    public function incluirDvd($titulo, $precio, $idiomas, $pantalla) {}
    
    //Santiago
    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ) {}
    
    //Anthony
    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3) {}

    //Santiago
    public function listarProductos() {
        echo $this->productos();
    }

    //Anthony
    public function listarSocios() {}

    //Santiago
    public function alquilarSocioProducto($numeroCliente, $numeroSoporte) {}
}
