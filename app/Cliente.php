<?php
//namespace Dwes\ProyectoVideoClub\Clientes;
namespace ProyectoVideoClub\app;

use ProyectoVideoClub\util\SoporteYaAlquiladoException;
use ProyectoVideoClub\util\CupoSuperadoException;
use ProyectoVideoClub\util\SoporteNoEncontradoException;



class Cliente
{
    // Variable estática que lleva el control del número de clientes creados
    protected static $numero_cliente = 0;

    // Atributos del cliente
    public $nombre;  // Nombre del cliente
    private $numero;  // Número único de cliente
    private $soportesAlquilados = [];  // Array que almacena los soportes alquilados por el cliente
    private $numSoportesAlquilados;  // Contador de los soportes alquilados actualmente
    private $maxAlquilerConcurrente;  // Límite de alquileres que un cliente puede tener al mismo tiempo

    // Constructor de la clase Cliente
    public function __construct($nombre, $mAlquilerConcurrente = 3)
    {
        // Inicializa el nombre del cliente
        $this->nombre = $nombre;

        // Inicializa el número de alquileres actuales a 0
        $this->numSoportesAlquilados = 0;

        // Define el número máximo de alquileres concurrentes, por defecto es 3
        $this->maxAlquilerConcurrente = $mAlquilerConcurrente;

        // Asigna un número único al cliente de forma incremental
        $this->numero = ++self::$numero_cliente;
    }

    // Método para obtener el número del cliente
    public function getNumero()
    {
        return $this->numero;
    }

    // Método que devuelve la cantidad de soportes que el cliente tiene alquilados
    public function getNumSoportesAlquilados()
    {
        return $this->numSoportesAlquilados;
    }

    // Método que devuelve la cantidad maxima de soportes que el cliente puede tener
    public function getMaxAlquilerConcurrente()
    {
        return $this->maxAlquilerConcurrente;
    }

    // Método que muestra un resumen de los alquileres del cliente
    public function muestraResumen()
    {
        // Muestra el nombre del cliente y la cantidad de alquileres actuales
        echo '<br>El cliente de nombre ' . $this->nombre . ' tiene un total de ' . count($this->soportesAlquilados) . ' alquileres.<br>';
    }

    /** 
     * Método para verificar si el cliente tiene un soporte alquilado
     * @param Soporte $s - El soporte que queremos verificar si está alquilado
     * @return bool - Devuelve true si el soporte está alquilado, false si no lo está
     */
    public function tieneAlquilado(Soporte $s): bool
    {
        // Iteramos por el array de soportes alquilados para ver si el cliente tiene el soporte
        foreach ($this->soportesAlquilados as $soporte) {
            if ($soporte == $s) {
                // Si el soporte coincide con el proporcionado, retornamos true
                return true;
            }
        }
        // Si no encuentra coincidencias, retorna false
        return false;
    }

    /**
     * Método para alquilar un soporte
     * Verifica si el cliente ya tiene alquilado el soporte y si no ha alcanzado el límite de alquileres permitidos
     * @param Soporte $s - Soporte que el cliente desea alquilar
     * @return Cliente - Devuelve true si el alquiler fue exitoso, false en caso contrario
     */
    public function alquilar(Soporte $s): Cliente
    {
        // Verificamos si el cliente no tiene alquilado el soporte
        if (!$this->tieneAlquilado($s)) {
            // Comprobamos si el cliente no ha excedido su límite de alquileres
            if ($this->numSoportesAlquilados < $this->maxAlquilerConcurrente) {
                // Incrementamos el contador de soportes alquilados
                $this->numSoportesAlquilados++;
                // Añadimos el soporte al array de soportes alquilados
                array_push($this->soportesAlquilados, $s);
                // Mensaje de confirmación
                echo "<br> Alquilado soporte a: $this->nombre <br>";
                // Mostramos el resumen del soporte alquilado
                $s->muestraResumen();


                return $this;
            } else {
                // Si el socio ha superado su cupo de soportes alquilables se lanza una excepción
                throw new CupoSuperadoException("El socio ha alcanzado su límite de alquileres.");
            }
        } else {
            throw new SoporteYaAlquiladoException("El producto ya está alquilado: " . $s->titulo);
        }

        return $this;
    }

    /**
     * Método para devolver un soporte alquilado
     * @param int $numSoporte - El número del soporte que el cliente desea devolver
     * @return Object - Devuelve true si la devolución fue exitosa, false en caso contrario
     */
    public function devolver(int $numSoporte): Object
    {
        // Verificamos si el cliente tiene soportes alquilados
        if (count($this->soportesAlquilados) != 0) {
            $encontrado = false;
            // Recorremos los soportes alquilados para encontrar el soporte a devolver
            foreach ($this->soportesAlquilados as $clave => $soporte) {
                if ($soporte instanceof Soporte) {
                    // Si encontramos el soporte que coincide con el número proporcionado
                    if ($soporte->getNumero() == $numSoporte) {
                        $encontrado = true;
                        // Lo eliminamos del array de soportes alquilados
                        unset($this->soportesAlquilados[$clave]);
                    }
                }
            }
            // Actualizamos el contador de soportes alquilados
            if ($encontrado) {
                $this->numSoportesAlquilados--;
                echo '<br> Se ha completado la devolución<br> ';
                return $this;
            } else {
                //si el producto no se ha encontrado se lanza una excepcion
                throw new SoporteNoEncontradoException("El soporte no estaba alquilado por este cliente.");
            }
        } else {
            // Mensaje si no hay soportes alquilados
            echo "<br>Este cliente no tiene alquilado ningún elemento<br>";
        }
        return $this;;
    }


    /**
     * Método que lista todos los alquileres que el cliente tiene actualmente
     * Muestra un resumen de todos los soportes alquilados
     */
    public function listarAlquileres()
    {
        // Imprime la cantidad de soportes alquilados
        echo "<br><strong>El cliente tiene $this->numSoportesAlquilados alquileres</strong><br>";

        // Recorre y muestra el resumen de cada soporte alquilado
        foreach ($this->soportesAlquilados as $soporte) {
            $soporte->muestraResumen();
        }
    }
}
