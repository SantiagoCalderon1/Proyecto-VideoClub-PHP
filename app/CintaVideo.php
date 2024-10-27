<?php
//namespace Dwes\ProyectoVideoClub\Productos;
namespace ProyectoVideoClub\app;

class CintaVideo extends Soporte
{
    // Atributo privado que almacena la duración de la cinta en minutos
    private $duracion;

    // Constructor de la clase CintaVideo
    public function __construct($titulo, $precio, $duracion)
    {
        // Llamada al constructor de la clase padre (Soporte)
        parent::__construct($titulo, $precio);
        // Inicializa el atributo específico de CintaVideo: duración
        $this->duracion = $duracion;
    }

    // Método que muestra un resumen del contenido de la cinta de video
    public function muestraResumen()
    {
        // Imprime el tipo de soporte
        echo "<br>Pelicula en VHS: ";
        // Llama al método muestraResumen() de la clase padre para mostrar la información básica
        parent::muestraResumen();
        // Imprime la duración específica de la cinta en minutos
        echo "<br>Duración: " . $this->duracion . " minutos";
    }
}
