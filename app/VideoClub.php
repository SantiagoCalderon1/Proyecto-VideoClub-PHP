<?php
//namespace Dwes\ProyectoVideoClub\Productos;

namespace ProyectoVideoClub\app;

use ProyectoVideoClub\util\ClienteNoEncontradoException;
use ProyectoVideoClub\util\SoporteNoEncontradoException;
use ProyectoVideoClub\util\SoporteYaAlquiladoException;
use ProyectoVideoClub\util\CupoSuperadoException;




use ProyectoVideoClub\app\CintaVideo;
use ProyectoVideoClub\app\Dvd;
use ProyectoVideoClub\app\Juego;
use ProyectoVideoClub\app\Cliente;

class VideoClub
{
    // Atributos privados
    private $nombre; // Nombre del videoclub
    private $productos = array(); // Array para almacenar productos (soportes) disponibles en el videoclub
    private $numProductos; // Contador de productos, calculado en base a los elementos añadidos
    private $socios = array(); // Array para almacenar socios del videoclub
    private $numSocios; // Contador de socios, calculado en base a los elementos añadidos

    private $numProductosAlquilados;
    private $numTotalAlquileres;

    // Constructor que inicializa el nombre del videoclub y el número de productos
    public function __construct($nombre)
    {
        $this->nombre = $nombre;
        $this->numProductos = 0; // Inicializa el número de productos a cero
        $this->numTotalAlquileres = 0;
        $this->numProductosAlquilados = 0;
    }

    public function getNumProductosAlquilados()
    {
        return $this->numProductosAlquilados;
    }

    public function getNumTotalAlquileres()
    {
        return $this->numTotalAlquileres;
    }

    public function setNumProductosAlquilados($numProductosAlquilados)
    {
        $this->numProductosAlquilados = $numProductosAlquilados;
    }

    public function setNumTotalAlquileres($numTotalAlquileres)
    {
        $this->numTotalAlquileres = $numTotalAlquileres;
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
        return $socio;
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

    public function encontrarSocio($numeroCliente)
    {
        $socioEncontrado = null;

        // Busca el socio correspondiente por su número
        foreach ($this->socios as $socio) {
            if ($socio->getNumero() === $numeroCliente) {
                $socioEncontrado = $socio;
                break;
            }
        }

        // Si no se encuentra el socio, lanza una excepción
        if ($socioEncontrado === null) {
            throw new ClienteNoEncontradoException("Cliente con número {$numeroCliente} no encontrado.");
        }

        return $socioEncontrado;
    }

    public function encontrarSoporte($numeroSoporte)
    {
        $productoEncontrado = null;

        // Busca el producto correspondiente por su número
        foreach ($this->productos as $producto) {
            if ($producto->getNumero() === $numeroSoporte) {
                $productoEncontrado = $producto;
                break;
            }
        }

        // Si no se encuentra el producto, lanza una excepción
        if ($productoEncontrado === null) {
            throw new SoporteNoEncontradoException("Producto con número {$numeroSoporte} no encontrado.");
        }

        return $productoEncontrado;
    }

    // Método público para alquilar un producto a un socio
    public function alquilarSocioProducto($numeroCliente, $numeroSoporte)
    {
        $socioEncontrado = $this->encontrarSocio($numeroCliente);
        $productoEncontrado = $this->encontrarSoporte($numeroSoporte);

        // Realiza el alquiler del producto al socio
        try {
            $socioEncontrado->alquilar($productoEncontrado); // Lanza excepciones si es necesario
            $this->numTotalAlquileres++; // Incrementa el contador total de alquileres
            $this->setNumProductosAlquilados($this->getNumProductosAlquilados() + 1);

        } catch (SoporteYaAlquiladoException $e) {
            echo "Error al alquilar: " . $e->getMessage() . "<br>";
        } catch (CupoSuperadoException $e) {
            echo "Error al alquilar: " . $e->getMessage() . "<br>";
        } catch (\Exception $e) {
            echo "Error inesperado: " . $e->getMessage() . "<br>";
        }

        return $this; // Devuelve el objeto con el alquiler ya realizado
    }
    public function alquilarSocioProductos(int $numSocio, array $numerosProductos)
    {
        // Verifica si el socio existe
        $socioEncontrado = $this->encontrarSocio($numSocio);

        // Array para almacenar productos disponibles
        $productosDisponibles = [];

        // Verificar la disponibilidad de todos los productos
        foreach ($numerosProductos as $numeroProducto) {
            $productoEncontrado = $this->encontrarSoporte($numeroProducto);

            // Comprueba si el producto ya está alquilado
            if ($productoEncontrado->estaAlquilado()) {
                throw new SoporteYaAlquiladoException("El producto {$productoEncontrado->getNombre()} ya está alquilado.");
            }

            // Si todo está bien, agrega el producto a la lista de disponibles
            $productosDisponibles[] = $productoEncontrado;
        }

        // Si todos los productos están disponibles, procede a alquilarlos
        foreach ($productosDisponibles as $producto) {
            try {
                $socioEncontrado->alquilar($producto); // Alquila el producto al socio
                $this->alquilarSocioProducto($socioEncontrado->getNumero(), $producto);
            } catch (CupoSuperadoException $e) {
                echo "Error al alquilar: " . $e->getMessage() . "<br>";
                // Manejo de errores específicos del cupo superado
            } catch (\Exception $e) {
                echo "Error inesperado: " . $e->getMessage() . "<br>";
                // Manejo de otros errores
            }
        }

        return $this; // Devuelve el objeto para permitir encadenamiento
    }
}
