<?php
// Cargar el autoload para asegurar que las clases están disponibles
require_once '../autoload.php';

session_start(); // Inicia la sesión


// Comprobar si el usuario está guardado en la sesión
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user']; // Recupera el usuario desde la sesión
}

// Redirige si los datos de sesión no están disponibles
if (!isset($_SESSION['productos']) || !isset($_SESSION['socios'])) {
    header('Location: ../index.php?error=2');
    exit();
}

// Recuperar productos y socios de la sesión
$productos = $_SESSION['productos'];
$socios = $_SESSION['socios'];


// Aquí iría codigo2
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Administrador</title>
</head>

<body>
    <h1>Página Administrador</h1>
    <p>¡Bienvenido <?php echo htmlspecialchars($user); ?>!</p>

    <!-- Formulario para cerrar la sesión -->
    <form action="logout.php" method="post">
        <input type="submit" name="logout" value="Cerrar sesión">
    </form>

    <?php
    // Codigo 3 iría aquí
    if (!empty($socios)) {
        echo '<h2>Listado de Clientes</h2>';
        // foreach ($socios as $socio) {
        //     print_r($socio);
        //     var_dump($socio);
        // }

        $listaClientes = '<ol>';
        foreach ($socios as $id => $socio) {
            $listaClientes .= '<li>Nombre: ' . htmlspecialchars($socio->getNombre()) . '<br>';
            $listaClientes .= 'Número único: ' . htmlspecialchars($socio->getNumero()) .  '<br>';
            $listaClientes.= 'Usuario: ' . htmlspecialchars($socio->getUser()) . '</li>';
        }
        $listaClientes .= '</ol>';
        echo $listaClientes;
    } else {
        echo "<p>No hay socios registrados.</p>";
    }

    if (!empty($productos)) {
        echo '<h2>Listado de Productos</h2>';
        $listarProductos = '<ol>';
        foreach ($productos as $id => $producto) {
            $listarProductos .= '<li>Título: ' . htmlspecialchars($producto->getTitulo()) . '<br>';
            $listarProductos .= 'Número de soporte: ' . htmlspecialchars($producto->getNumero()) . '</li>';
        }
        $listarProductos .= '</ol>';
        echo $listarProductos;
    } else {
        echo "<p>No hay productos registrados.</p>";
    }
    ?>


</body>

</html>