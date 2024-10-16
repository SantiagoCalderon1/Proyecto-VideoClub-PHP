<?php
include_once "Soporte.php";
class Juego extends Soporte
{
    public $consola;
    private $minNumJugadores;
    private $maxNumJugadores;

    public function __construct($titulo, $precio, $consula, $minNumJugadores, $maxNumJugadores)
    {
        parent::__construct($titulo, $precio);
        $this->consola = $consula;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    public function muestraJugadoresPosibles()
    {
        if ($this->minNumJugadores == $this->maxNumJugadores) {
            return ($this->minNumJugadores == 1 ? "Para un jugador" :  "Para " . $this->maxNumJugadores . " jugadores");
        } else {
            return "De " . $this->minNumJugadores . " a " . $this->maxNumJugadores . " jugadores";
        }
    }

    public function muestraResumen()
    {
        parent::muestraResumen();
        echo "<br> Tipo de consola: ".$this->consola.
        "<br>" . $this->muestraJugadoresPosibles();
    }
}
