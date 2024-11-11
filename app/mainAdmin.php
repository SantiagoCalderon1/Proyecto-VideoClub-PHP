<?php
session_start(); // Inicia la sesión

// Comprobar si el usuario está guardado en la sesión
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user']; // Recupera el usuario desde la sesión
}

if (isset($_SESSION['productos']) && isset($_SESSION['socios'])) {
    $productos = $_SESSION['productos'];
    $socios = $_SESSION['socios'];
}else{
    header('Location: ../index.php?error=2');
    exit();
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

    <!-- Formulario para cerrar la sesión -->
    <form action="logOut.php" method="post">
        <input type="submit" name="logout" value="Cerrar sesión">
    </form>

</body>

</html>