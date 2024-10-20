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
    private function incluirProducto(Soporte $producto)
    {
        array_push($this->productos, $producto);
        $this->numProductos++;
        echo "Incluido soporte " . $producto->getNumero() . "<br>";
    }

    //Santiago
    public function incluirCintaVideo($titulo, $precio, $duracion)
    {
        $this->incluirProducto(new CintaVideo($titulo, $precio, $duracion));
    }

    //Anthony
    public function incluirDvd($titulo, $precio, $idiomas, $pantalla)
    {
        $this->incluirProducto(new Dvd($titulo, $precio, $idiomas, $pantalla));
    }

    //Santiago
    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ)
    {
        $this->incluirProducto(new  Juego($titulo, $precio, $consola, $minJ, $maxJ));
    }

    //Anthony
    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3)
    {
        $socio = new Cliente($nombre, $maxAlquileresConcurrentes);
        array_push($this->socios, $socio);
        $this->numSocios++;
        echo "Incluido socio " . $socio->getNumero() . "<br>";
    }

    //Santiago
    public function listarProductos()
    {
        $contador = 0;
        $alquilado = false;
        $lista = "";

        foreach ($this->productos as $producto) {
            foreach ($this->socios as $socio) {
                //Por cada socio pregunta si tiene alquilado el producto
                if ($socio->tieneAlquilado($producto)) {
                    //si alguno lo tiene alquilado se guarda true
                    $alquilado = true;
                    break; //
                }
            }
            //Si no esta alquilado lo muestra en la lista
            if (!$alquilado) {
                /**
                 * No podía modificar Soporte.php, y necesitaba tener primer el contador y luego imprimir
                 * muestraResumen(), pero es un echo con lo cual no lo puedo concadenar a una variable String.
                 * así que capturo la salida del echo.
                 * Abro un buffer de salida, llamo a la función que ejecuta el echo, luego capturo
                 * y limpio el buffer (se limpia y cierra al timpo)
                 */

                // Inicia el buffer de salida
                ob_start();
                // Llama a muestraResumen() que haría echo
                $producto->muestraResumen();
                // Captura el contenido del buffer en una variable y limpia el buffer (cerrándolo)
                $resumen = ob_get_clean();
                //Concadeno la variable a mi resumen
                $lista .= "<br>" . ++$contador . ".-" . $resumen;
            }
        }
        //Finalmente imprimo la información
        echo "Listado de los" . $contador . " productos disponibles:" . $lista;
    }

    //Anthony
    public function listarSocios()
    {
        //contador para la lista
        $contador = 0;
        //Cabecera de la lista
        echo "<br>Listado de " . count($this->socios) . " socios del videoclub:<br>";
        //Recorre el array de los socios y los va mostrando con sus soportes alquilados
        foreach ($this->socios as $socio) {
            echo ++$contador . ".- Cliente " . $socio->getNumero() . ": " . $socio->nombre . "<br>";
            echo "Alquileres actuales: " . $socio->getNumSoportesAlquilados() . "<br>";
        }
    }

    //Santiago
    public function alquilaSocioProducto($numeroCliente, $numeroSoporte)
    {
        $alquilado = false;
        //Busca el socio con el numero de cliente
        foreach ($this->socios as $socio) {
            if ($socio->getNumero() === $numeroCliente) {
                foreach ($this->productos as $producto) {
                    if ($producto->getNumero() === $numeroSoporte) {
                        $socio->alquilar($producto);
                        //$alquilado = true;
                    }
                }
            }
        }
        //if ($alquilado) {
        # code...
        //}
    }
}
