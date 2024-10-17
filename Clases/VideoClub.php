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
    }

    //Anthony
    private function incluirProducto(Soporte $producto) {
        array_push($this->productos,$producto);
        $this->numProductos++;
        echo "Incluido soporte ".$producto->getNumero();

    }
    
    //Santiago
    public function incluirCintaVideo($titulo, $precio, $duracion) {
        incluirProducto(new CintaVideo($titulo, $precio, $duracion));
    }
    
    //Anthony
    public function incluirDvd($titulo, $precio, $idiomas, $pantalla) {}
    
    //Santiago
    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ) {
        incluirProducto(new  Juego($titulo, $precio, $consola, $minJ, $maxJ));
    }
    
    //Anthony
    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3) {}

    //Santiago
    public function listarProductos() {
        $contador = 0;
        foreach ($this->productos as $producto) {
            $contador++;
            echo $contador.".-".
        }  
    }

    //Anthony
    public function listarSocios() {}

    //Santiago
    public function alquilarSocioProducto($numeroCliente, $numeroSoporte) {}
}
