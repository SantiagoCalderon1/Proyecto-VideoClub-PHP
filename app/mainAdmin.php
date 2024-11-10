<?php
session_start(); // Inicia la sesión

// Comprobar si el usuario está guardado en la sesión
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user']; // Recupera el usuario desde la sesión
}

// Verifica si los datos de 'listaProductos' ya están cargados
if (!isset($_SESSION['listaProductos']) || !isset($_SESSION['listaSocios'])) {
    // Redirige a inicio3.php para cargar los datos en la sesión y luego vuelve aquí
    header("Location: ../inicio3.php?redirect=admin");
    exit();
}

if (isset($_SESSION['listaProductos']) && isset($_SESSION['listaSocios'])) {
    $listaProductos = $_SESSION['listaProductos'];
    $listaSocios = $_SESSION['listaSocios'];
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
    echo '<h2>Listado de Clientes</h2>';
    echo $listaSocios;
    echo '<h2>Listado de Productos</h2>';
    echo $listaProductos;
    ?>

    <!-- Fomrulario para cerrar la sesión -->
    <form action="logOut.php" method="post">
        <input type="submit" name="logout" value="Cerrar sesión">
    </form>

</body>

</html>