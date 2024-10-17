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
        $this->incluirProducto(new CintaVideo($titulo, $precio, $duracion));
    }
    
    //Anthony
    public function incluirDvd($titulo, $precio, $idiomas, $pantalla) {
        $this->incluirProducto(new Dvd($titulo, $precio, $idiomas, $pantalla));
    }
    
    //Santiago
    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ) {
        $this->incluirProducto(new  Juego($titulo, $precio, $consola, $minJ, $maxJ));
    }
    
    //Anthony
    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3) {
        $socio = new Cliente($nombre, $maxAlquileresConcurrentes);
        array_push($this->socios,$socio);
        $this->numSocios++;
        echo "Incluido socio ".$socio->getNumero();
    }

    //Santiago
    public function listarProductos() {
        $contador = 0;
        //Recorre los productos guardados en el array
        foreach ($this->productos as $producto) {

            //recorre los socios guardados en el array
            foreach ($this->socios as $socio) {
                //Por cada socio pregunta si tiene alquilado el producto
                if(!$socio->tieneAlquilado($producto)){
                    //si lo tiene alquilado lo muestra en la lista
                    echo ++$contador.".-". $producto->muestraResumen();
                }
            }
        }
    }

    //Anthony
    public function listarSocios() {}

    //Santiago
    public function alquilarSocioProducto($numeroCliente, $numeroSoporte) {}
}
