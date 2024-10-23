<?php
// tests/prueba.php

use Dwes\ProyectoVideoclub\Cliente;
use Dwes\ProyectoVideoclub\Soporte;
use Dwes\ProyectoVideoclub\VideoClub;


// Crear instancias de clases
$vc = new VideoClub("Severo 8A"); 
echo "<h2>Incluyendo Soportes</h2>";

//voy a incluir unos cuantos soportes de prueba 
$vc->incluirJuego("God of War", 19.99, "PS4", 1, 1); 
$vc->incluirJuego("The Last of Us Part II", 49.99, "PS4", 1, 1);
$vc->incluirDvd("Torrente", 4.5, "es","16:9"); 
$vc->incluirDvd("Origen", 4.5, "es,en,fr", "16:9"); 
$vc->incluirDvd("El Imperio Contraataca", 3, "es,en","16:9"); 
$vc->incluirCintaVideo("Los cazafantasmas", 3.5, 107); 
$vc->incluirCintaVideo("El nombre de la Rosa", 1.5, 140); 

// Agregar clientes y productos al videoclub
$vc->incluirSocio("Amancio Ortega"); 
$vc->incluirSocio("Pablo Picasso", 2); 
echo PHP_EOL;
echo PHP_EOL;

// Alquilar productos
$vc->alquilaSocioProducto(2,3)->alquilaSocioProducto(2,4); 
