<?php
// Iniciar sesión
session_start();

require_once '../autoload.php';

use ProyectoVideoClub\app\VideoClub;

$vc = new VideoClub("Severo 8A");

//voy a incluir unos cuantos soportes de prueba 
$vc->incluirJuego("God of War", 19.99, "PS4", 1, 1);
$vc->incluirJuego("The Last of Us Part II", 49.99, "PS4", 1, 1);
$vc->incluirDvd("Torrente", 4.5, "es", "16:9");
$vc->incluirDvd("Origen", 4.5, "es,en,fr", "16:9");
$vc->incluirDvd("El Imperio Contraataca", 3, "es,en", "16:9");
$vc->incluirCintaVideo("Los cazafantasmas", 3.5, 107);
$vc->incluirCintaVideo("El nombre de la Rosa", 1.5, 140);

// Creando algunos socios
$vc->incluirSocio("Amancio Ortega");
$vc->incluirSocio("Pablo Picasso");


//Variables array que será asociativo
$productos = [];
$socios = [];

// Iterando los arrays para almacenarnos en el array asociativo
$productosAUX = $vc->getProductos();
foreach ($productosAUX as $producto) {
    $productos[$producto->getNumero()] = $producto;
}

$clientesAUX = $vc->getSocios();
foreach ($clientesAUX as $socio) {
    $socios[$socio->getNumero()] = $socio;
}

//Almacenando los arrays en la sesión
$_SESSION['productos'] = $productos;
$_SESSION['socios'] = $socios;

// Redirecciono a mainAdmin con los datos ya guardados en la sesión
header('Location: mainAdmin.php');
exit();
