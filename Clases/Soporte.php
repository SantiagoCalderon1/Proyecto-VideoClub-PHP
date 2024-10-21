<?php
include_once "Interfaces/Resumible.php";

abstract class Soporte implements Resumible
{
    /** 
     *  ¿Qué conseguimos al hacer la clase abstracta?
     * 
     *  1.Definir una estructura común: Una clase abstracta nos permite definir una base común para las
     *   clases hijas. Todas las clases que hereden de esta deben tener ciertos métodos o propiedades
     *   que se comparten entre ellas.
     * 
     *  2.Evitar la instanciación directa: Al ser abstracta, la clase `Soporte` no puede ser instanciada 
     *   directamente, solo a través de sus clases hijas. Esto es útil cuando la clase padre no tiene sentido
     *   por sí sola, pero sirve para establecer comportamientos comunes para las clases hijas.
     * 
     *  3.Facilitar la extensión y mantenimiento: Las clases abstractas permiten la reutilización de código 
     *   común, ayudando a aplicar el principio DRY (Don't Repeat Yourself), ya que el código compartido 
     *   se centraliza en una sola clase, reduciendo duplicaciones y facilitando el mantenimiento.
     *  
     * 
     *  ¿Cuándo usar una clase abstracta?
     * 
     *  -Cuando tienes un concepto general que puede tener varias implementaciones concretas y quieres
     *   que todas sigan una estructura común.
     *  -Cuando deseas obligar a las clases hijas a implementar ciertos métodos o comportamientos.
     *  -Cuando tienes lógica compartida que puede ser reutilizada por las clases hijas.
     *  -Cuando quieres que las instancias solo se creen a partir de las clases derivadas, no de la clase base.
     * 
     *  ¿Hace falta que las interfaces también sean implementadas por las clases hijas?
     * 
     *  No, si una clase padre como `Soporte` implementa una interfaz (en este caso `Resumible`), 
     *  las clases hijas automáticamente heredan esa implementación. Las clases hijas no necesitan 
     *  declarar explícitamente la interfaz nuevamente, aunque pueden sobrescribir los métodos 
     *  de la interfaz si necesitan modificar el comportamiento.
     */

    // Atributo estático que almacena el número consecutivo de soportes creados
    protected static $numero_soporte = 0;

    // Atributo estático que almacena el valor del IVA (21%)
    private static $IVA =  0.21;

    // Atributos públicos y protegidos que almacenan el título, número y precio del soporte
    public $titulo; // Almacena el título del soporte
    protected $numero; // Número de soporte (incremental)
    private $precio; // Precio del soporte sin IVA

    // Constructor que inicializa el título, precio, y asigna un número único al soporte
    public function __construct($titulo, $precio)
    {
        $this->titulo = $titulo;
        $this->precio = $precio;
        $this->numero = ++self::$numero_soporte; // Incrementa el número de soporte de manera automática
    }

    // Método que devuelve el precio sin IVA
    public function getPrecio()
    {
        return  $this->precio;
    }

    // Método que calcula y devuelve el precio con IVA incluido
    public function getPrecioConIva()
    {
        return  $this->precio + ($this->precio * self::$IVA);
    }

    // Método que devuelve el número único del soporte
    public function getNumero()
    {
        return $this->numero;
    }

    // Método que muestra un resumen básico del soporte, incluyendo título, número, y precios (con y sin IVA)
    public function muestraResumen()
    {
        echo "<br> Titulo: " . $this->titulo .
            "<br> Numero de soporte: " . $this->numero .
            "<br> Precio:" . $this->getPrecio() . " € (IVA no incluido)" .
            "<br> Precio: " . $this->getPrecioConIva() . " € (IVA incluido)";
    }
}
