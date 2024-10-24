<?php
//namespace Dwes\ProyectoVideoClub\Productos;
namespace Dwes\ProyectoVideoClub\app;

include_once("Soporte.php");



class CintaVideo extends Soporte
{
    // Atributo privado que almacena la duración de la cinta en minutos
    private $duracion;

    // Constructor de la clase CintaVideo
    public function __construct($titulo, $precio, $duracion)
    {
        // Llamada al constructor de la clase padre (Soporte)
        parent::__construct($titulo, $precio);
        // Inicializa el atributo duración con el valor proporcionado
        $this->duracion = $duracion;
    }

    // Método que muestra un resumen del contenido de la cinta de video
    public function muestraResumen()
    {
        // Imprime el tipo de soporte (Pelicula en VHS)
        echo "<br>Pelicula en VHS: ";
        // Llama al método `muestraResumen()` de la clase padre (Soporte) para mostrar el resumen general
        parent::muestraResumen();
        // Imprime la duración específica de la cinta en minutos
        echo "<br>Duración: " . $this->duracion . " minutos";
    }
}
