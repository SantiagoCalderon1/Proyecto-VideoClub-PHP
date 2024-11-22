<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02 - Gestión del sistema de vehículos</title>
</head>

<body>
    <?php
    // Definición de las clases
    // Declaro la clase abstracta por que no me intera hacer instancias de esta clase
    abstract class  Vehiculo
    {
        //Por alguna extraña razón la constante no me sirve
        //define("IMPUESTO", 21);  ---> asi esta en la chuleta pero no me funcionó, intenté con comillas y sin comillas
        // private const $IMPUESTO = 21

        protected $marca;
        protected $modelo;
        protected $precio;

        /**Constructor que recibe 3 paremetros, 
         * 2 String y 1 númerico */

        public function __construct($marca, $modelo, $precio)
        {
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->precio = $precio;
        }

        /** Función para calcular el impuesto del vehiculo */
        public function calcularImpuesto()
        {
            return ($this->precio * (1 * 21 / 100));
        }

        /**Funcion para imprimir los detalles de los vehiculos, más adelante será reescrita */
        function mostrarDetalles()
        {
            return "<br>Marca: " . $this->marca . "<br> Modelo: " . $this->modelo . "<br>Precio: " . $this->precio . "<br>Impuesto:  " . $this->calcularImpuesto() . "<br>Precio Total (con impuestos):" . ($this->precio + $this->calcularImpuesto());
        }
    }


    //Clase hija de la clase Vehiculo
    class Coche  extends Vehiculo
    {
        private float $cilindrada;

        public function __construct($marca, $modelo, $precio, $cilindrada)
        {
            parent::__construct($marca, $modelo, $precio);
            $this->cilindrada = $cilindrada;
        }

        public function calcularImpuesto()
        {
            if ($this->cilindrada > 200) {
                return parent::calcularImpuesto() + 150;
            } else {
                return parent::calcularImpuesto();
            }
        }

        function mostrarDetalles()
        {
            echo "<p>Detalles del coche:" . parent::mostrarDetalles() . " <br>Cilindrada: " . $this->cilindrada . " cc</p>";
        }
    }

    // Clase hija de la clase vehiculo
    class Moto extends Vehiculo
    {
        private bool $tieneSidecar;

        public function __construct($marca, $modelo, $precio, $tieneSidecar)
        {
            parent::__construct($marca, $modelo, $precio);
            $this->tieneSidecar =  $tieneSidecar;
        }

        public function calcularImpuesto()
        {
            if ($this->tieneSidecar) {

                return parent::calcularImpuesto() + 50;
            } else {
                return parent::calcularImpuesto();
            }
        }

        function mostrarDetalles()
        {
            echo "<p>Detalles de la moto:" . parent::mostrarDetalles() . "<br>Tiene sidecar: " . ($this->tieneSidecar ? "Sí" : "No") . "</p>";
        }
    }
    ?>

    <h1>Examen</h1>

    <h2>COCHES Y MOTOS EN STOCK</h2>

    <?php
    $coche1 = new Coche("Toyota", "Corolla", 25000, 2200);
    $moto1 = new Moto("Harley-Davidson", "Sportster", 15000, true);
    $moto2 = new Moto("Ducati", "Diavel", 18000, false);

    $coche1->mostrarDetalles();
    $moto1->mostrarDetalles();
    $moto2->mostrarDetalles();
    ?>
</body>

</html>