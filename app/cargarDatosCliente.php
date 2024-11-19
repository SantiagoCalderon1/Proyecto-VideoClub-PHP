<?php
// Iniciar sesión
session_start();

// Asegura de que las clases están cargadas
require_once '../autoload.php';

use ProyectoVideoClub\app\VideoClub;

try {
    // Crear una instancia de VideoClub
    $vc = new VideoClub("Severo 8A");

    // Incluir algunos soportes de prueba 
    $vc->incluirJuego("God of War", 19.99, "PS4", 1, 1);
    $vc->incluirJuego("The Last of Us Part II", 49.99, "PS4", 1, 1);
    $vc->incluirDvd("Torrente", 4.5, "es", "16:9");
    $vc->incluirDvd("Origen", 4.5, "es,en,fr", "16:9");
    $vc->incluirDvd("El Imperio Contraataca", 3, "es,en", "16:9");
    $vc->incluirCintaVideo("Los cazafantasmas", 3.5, 107);
    $vc->incluirCintaVideo("El nombre de la Rosa", 1.5, 140);

    // Crear algunos socios
    $vc->incluirSocio("Amancio Ortega", "AmOr01", "1234");
    $vc->incluirSocio("Pablo Picasso", "PaPi01", "5678");

    $vc->alquilarSocioProducto(1, 1);
    $vc->alquilarSocioProducto(1, 2);
    $vc->alquilarSocioProducto(2, 3);
    $vc->alquilarSocioProducto(2, 4);

    foreach ($vc->getSocios() as $socio) {
        if ($_SESSION['usuarioSocio'] === $socio->getUser()) {
            $_SESSION['socio'] = $socio;
        }
    }

    // Redireccionar a mainAdmin con los datos guardados en la sesión
    header('Location: mainCliente.php');

    exit();
} catch (Exception $e) {
    // Manejo de errores: redirigir o mostrar mensaje
    error_log($e->getMessage()); // Registrar el error en el log del servidor
    header('Location: ../index.php?error=2'); // Redirigir con código de error
    exit();
}
