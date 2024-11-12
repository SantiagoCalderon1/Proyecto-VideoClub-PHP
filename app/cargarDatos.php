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
    $vc->incluirSocio("Amancio Ortega");
    $vc->incluirSocio("Pablo Picasso");

    // Variables array asociativos
    $productos = [];
    $socios = [];


    // Obtener los productos y socios del VideoClub y hacer copias con clone
    foreach ($vc->getProductos() as $producto) {
        // Hacer una copia de cada producto con clone
        $productos[$producto->getNumero()] = clone $producto;
    }

    foreach ($vc->getSocios() as $socio) {
        // Hacer una copia de cada socio con clone
        $socios[$socio->getNumero()] = clone $socio;
    }

    // Guardar las copias en la sesión
    $_SESSION['productos'] = $productos;
    $_SESSION['socios'] = $socios;



    // Almacenar los arrays en la sesión
    $_SESSION['productos'] = $productos;
    $_SESSION['socios'] = $socios;

    // Redireccionar a mainAdmin con los datos guardados en la sesión
    header('Location: mainAdmin.php');
    exit();
} catch (Exception $e) {
    // Manejo de errores: redirigir o mostrar mensaje
    error_log($e->getMessage()); // Registrar el error en el log del servidor
    header('Location: ../index.php?error=2'); // Redirigir con código de error
    exit();
}
