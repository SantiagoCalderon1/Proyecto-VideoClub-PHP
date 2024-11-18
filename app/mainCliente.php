<?php
// Cargar el autoload para asegurar que las clases están disponibles
require_once '../autoload.php';
session_start(); // Inicia la sesión

// Comprobar si el usuario está guardado en la sesión
if (isset($_SESSION['user']) && isset($_SESSION['socio'])) {
    $user = $_SESSION['user']; // Recupera el usuario desde la sesión
    $socio = $_SESSION['socio'];
} else {
    // Si no se han encontrado las variables de sesión, redirigir al login
    header('Location: ../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Cliente</title>
</head>

<body>
    <h1>Página Cliente</h1>
    <p>¡Bienvenido <?php echo htmlspecialchars($user); ?>!</p>

    <form action="logout.php" method="post">
        <input type="submit" name="logout" value="Cerrar sesión">

        <?php

        if (!empty($socio->getAlquileres())) {
            echo '<h2>Listado de Productos</h2>';
            $listarProductos = '<ol>';
            foreach ($socio->getAlquileres() as $producto) {
                $listarProductos .= '<li>Título: ' . htmlspecialchars($producto->getTitulo()) . '<br>';
                $listarProductos .= 'Número de soporte: ' . htmlspecialchars($producto->getNumero()) . '</li>';
            }
            $listarProductos .= '</ol>';
            echo $listarProductos;
        } else {
            echo "<p>No hay productos alquilados.</p>";
        }
        ?>

    </form>

</body>

</html>