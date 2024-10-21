<?php
include_once "CintaVideo.php";
include_once "Dvd.php";
include_once "Juego.php";
include_once "Cliente.php";

class VideoClub
{
    // Atributos privados
    private $nombre; // Nombre del videoclub
    private $productos = array(); // Array para almacenar productos (soportes) disponibles en el videoclub
    private $numProductos; // Contador de productos, calculado en base a los elementos añadidos
    private $socios = array(); // Array para almacenar socios del videoclub
    private $numSocios; // Contador de socios, calculado en base a los elementos añadidos

    // Constructor que inicializa el nombre del videoclub y el número de productos
    public function __construct($nombre)
    {
        $this->nombre = $nombre;
        $this->numProductos = 0; // Inicializa el número de productos a cero
    }

    // Método privado para incluir un producto al array de productos
    private function incluirProducto(Soporte $producto)
    {
        array_push($this->productos, $producto); // Añade el producto al array de productos
        $this->numProductos++; // Incrementa el contador de productos
        echo "Incluido soporte " . $producto->getNumero() . "<br>"; // Imprime un mensaje de confirmación
    }

    // Método público para incluir una cinta de video como producto
    public function incluirCintaVideo($titulo, $precio, $duracion)
    {
        // Crea una nueva instancia de CintaVideo y la incluye en los productos
        $this->incluirProducto(new CintaVideo($titulo, $precio, $duracion));
    }

    // Método público para incluir un DVD como producto
    public function incluirDvd($titulo, $precio, $idiomas, $pantalla)
    {
        // Crea una nueva instancia de Dvd y la incluye en los productos
        $this->incluirProducto(new Dvd($titulo, $precio, $idiomas, $pantalla));
    }

    // Método público para incluir un juego como producto
    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ)
    {
        // Crea una nueva instancia de Juego y la incluye en los productos
        $this->incluirProducto(new Juego($titulo, $precio, $consola, $minJ, $maxJ));
    }

    // Método público para incluir un socio en el videoclub
    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3)
    {
        // Crea una nueva instancia de Cliente (socio) y la añade al array de socios
        $socio = new Cliente($nombre, $maxAlquileresConcurrentes);
        array_push($this->socios, $socio); // Añade el socio al array de socios
        $this->numSocios++; // Incrementa el contador de socios
        echo "Incluido socio " . $socio->getNumero() . "<br>"; // Imprime un mensaje de confirmación
    }

    // Método público para listar todos los productos disponibles (no alquilados)
    public function listarProductos()
    {
        $contador = 0; // Contador para enumerar los productos
        $alquilado = false; // Variable para determinar si un producto está alquilado
        $lista = ""; // Variable para almacenar la lista de productos disponibles

        // Recorre el array de productos
        foreach ($this->productos as $producto) {
            // Verifica si el producto está alquilado por algún socio
            foreach ($this->socios as $socio) {
                if ($socio->tieneAlquilado($producto)) {
                    $alquilado = true; // Si está alquilado, marca como true
                    break; // Sale del bucle si se encuentra alquilado
                }
            }
            // Si el producto no está alquilado, lo añade a la lista
            if (!$alquilado) {
                // Se captura la salida del método muestraResumen() (que realiza echo)
                ob_start(); // Inicia el buffer de salida
                $producto->muestraResumen(); // Llama al método para mostrar el resumen del producto
                $resumen = ob_get_clean(); // Captura el contenido del buffer y lo almacena en $resumen
                $lista .= "<br>" . ++$contador . ".-" . $resumen; // Concadena el producto a la lista
            }
        }
        // Finalmente, imprime la lista de productos disponibles
        echo "Listado de los " . $contador . " productos disponibles:" . $lista;
    }

    // Método público para listar todos los socios del videoclub
    public function listarSocios()
    {
        $contador = 0; // Contador para enumerar los socios
        echo "<br>Listado de " . count($this->socios) . " socios del videoclub:<br>"; // Cabecera de la lista

        // Recorre el array de socios y los va mostrando
        foreach ($this->socios as $socio) {
            echo ++$contador . ".- Cliente " . $socio->getNumero() . ": " . $socio->nombre . "<br>"; // Imprime el número de socio y su nombre
            echo "Alquileres actuales: " . $socio->getNumSoportesAlquilados() . "<br>"; // Muestra cuántos alquileres tiene el socio
        }
    }

    // Método público para alquilar un producto a un socio
    public function alquilaSocioProducto($numeroCliente, $numeroSoporte)
    {
        // Busca el socio correspondiente por su número
        foreach ($this->socios as $socio) {
            if ($socio->getNumero() === $numeroCliente) { // Si encuentra el socio
                // Busca el producto correspondiente por su número
                foreach ($this->productos as $producto) {
                    if ($producto->getNumero() === $numeroSoporte) { // Si encuentra el producto
                        $socio->alquilar($producto); // Realiza el alquiler del producto
                    }
                }
            }
        }
    }
}
?>
