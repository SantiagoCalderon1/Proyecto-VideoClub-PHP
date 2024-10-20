<?php
include_once "CintaVideo.php";
include_once "Dvd.php";
include_once "Juego.php";
include_once "Cliente.php";
class VideoClub
{
    private $nombre;
    private $productos = array(); //Array de soporte
    private $numProductos; //Campo calculado
    private $socios  = array(); //Array de cliente
    private $numSocios; //Campo Calculado

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
        $this->numProductos = 0;
    }

    //Anthony
    private function incluirProducto(Soporte $producto) {
        array_push($this->productos,$producto);
        $this->numProductos++;
        echo "Incluido soporte ".$producto->getNumero()."<br>";

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
        echo "Incluido socio ".$socio->getNumero()."<br>";
    }

    //Santiago
    public function listarProductos() {
        $contador = 0;
        $alquilado = false;
        //Recorre los productos guardados en el array
        foreach ($this->productos as $producto) {
            //Recorre los socios guardados en el array
            foreach ($this->socios as $socio) {
                //Por cada socio pregunta si tiene alquilado el producto
                if($socio->tieneAlquilado($producto)){
                    //si alguno lo tiene alquilado se guarda true
                    $alquilado = true;
                }
            }
            //Si no esta alquilado lo muestra en la lista
            if($alquilado==false){
                echo "<br>".++$contador.".-";
                echo $producto->muestraResumen();
            }
        }
        echo "<br>";
    }

    //Anthony
    public function listarSocios() {
        //contador para la lista
        $contador = 0;
        //Cabecera de la lista
        echo "<br>Listado de " . count($this->socios) . " socios del videoclub:<br>";
        //Recorre el array de los socios y los va mostrando con sus soportes alquilados
        foreach ($this->socios as $socio) {
            echo ++$contador.".- Cliente ".$socio->getNumero() . ": ". $socio->nombre."<br>";
            echo "Alquileres actuales: ".$socio->getNumSoportesAlquilados()."<br>";
        }
    }

    //Santiago
    public function alquilarSocioProducto($numeroCliente, $numeroSoporte) {}
}
