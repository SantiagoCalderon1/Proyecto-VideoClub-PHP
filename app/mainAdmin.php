<?php
session_start(); // Inicia la sesión


// Comprobar si el usuario está guardado en la sesión
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user']; // Recupera el usuario desde la sesión
}

if (!isset($_SESSION['productos']) && !isset($_SESSION['socios'])) {
    header('Location: ../index.php?error=2');
    exit();
}

if (isset($_SESSION['productos']) && isset($_SESSION['socios'])) {
    $productos = $_SESSION['productos'];
    $socios = $_SESSION['socios'];
}

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
            $listaClientes .= 'Número único: ' . htmlspecialchars($socio->getNumero()) . '</li>';
        }
        $listaClientes .= '</ol>';
        echo $listaClientes;
        
    } else {
        echo "<p>No hay socios registrados.</p>";
    }

    if (!empty($productos)) {
        echo '<h2>Listado de Productos</h2>';
        foreach ($productos as $producto) {
            //print_r($socio);
            var_dump($producto);
        }
        /**
        $listarProductos = '<ol>';
        foreach ($productos as $id => $producto) {
            $listarProductos .= '<li>Titulo: ' . htmlspecialchars($producto->titulo) . '<br>';
            $listarProductos .= 'Número de soporte: ' . htmlspecialchars($producto->numero) . '</li>';
        }
        $listarProductos .= '</ol>';
        echo $listarProductos;
         */
    } else {
        echo "<p>No hay productos registrados.</p>";
    }
    ?>

    <!-- Formulario para cerrar la sesión -->
    <form action="logOut.php" method="post">
        <input type="submit" name="logout" value="Cerrar sesión">
    </form>

</body>

</html>