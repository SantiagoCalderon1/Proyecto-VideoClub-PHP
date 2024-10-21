<?php
include_once "Soporte.php";

class Dvd extends Soporte
{
    // Atributos públicos que almacenan los idiomas disponibles y el formato de pantalla del DVD
    public $idiomas;
    public $formatPantalla;

    // Constructor de la clase Dvd
    public function __construct($titulo, $precio, $idiomas, $formatPantalla)
    {
        // Llama al constructor de la clase padre (Soporte) para inicializar título y precio
        parent::__construct($titulo, $precio);
        // Inicializa los atributos específicos del DVD: idiomas y formato de pantalla
        $this->idiomas = $idiomas;
        $this->formatPantalla = $formatPantalla;
    }

    // Método para mostrar un resumen del contenido del DVD
    public function muestraResumen()
    {
        // Imprime el tipo de soporte (Pelicula en DVD)
        echo "<br>Pelicula en DVD: ";
        // Llama al método muestraResumen() de la clase padre para mostrar la información básica
        parent::muestraResumen();
        // Muestra los detalles específicos del DVD: idiomas y formato de pantalla
        echo "<br> Idiomas: " . $this->idiomas .
            "<br> Formato Pantalla: " . $this->formatPantalla;
    }
}
