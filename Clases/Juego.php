<?php

use Dwes\Soporte;
include_once "Soporte.php";

class Juego extends Soporte
{
    // Atributos públicos y privados que definen las propiedades del juego
    public $consola; // Almacena el tipo de consola en la que se juega
    private $minNumJugadores; // Número mínimo de jugadores permitidos
    private $maxNumJugadores; // Número máximo de jugadores permitidos

    // Constructor de la clase Juego
    public function __construct($titulo, $precio, $consula, $minNumJugadores, $maxNumJugadores)
    {
        // Llama al constructor de la clase padre (Soporte) para inicializar título y precio
        parent::__construct($titulo, $precio);
        // Inicializa los atributos específicos del juego: consola y el rango de jugadores
        $this->consola = $consula;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    // Método que muestra el número de jugadores posibles
    public function muestraJugadoresPosibles()
    {
        // Si el mínimo y el máximo de jugadores son iguales
        if ($this->minNumJugadores == $this->maxNumJugadores) {
            // Si el juego es para un jugador, muestra un mensaje apropiado, sino muestra el número de jugadores
            return ($this->minNumJugadores == 1 ? "Para un jugador" : "Para " . $this->maxNumJugadores . " jugadores");
        } else {
            // Si hay un rango de jugadores, muestra el rango (De X a Y jugadores)
            return "De " . $this->minNumJugadores . " a " . $this->maxNumJugadores . " jugadores";
        }
    }

    // Método heredado que muestra un resumen de las propiedades del juego
    public function muestraResumen()
    {
        // Llama al método muestraResumen() de la clase padre para mostrar información básica del soporte
        parent::muestraResumen();
        // Añade detalles específicos del juego: tipo de consola y número de jugadores posibles
        echo "<br> Tipo de consola: " . $this->consola .
            "<br>" . $this->muestraJugadoresPosibles(); // Muestra el número de jugadores posibles
    }
}
