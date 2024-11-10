<?php
session_start(); // Inicia la sesión

// Comprobar si el usuario está guardado en la sesión
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user']; // Recupera el usuario desde la sesión
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

    <form action="logOut.php" method="post">
        <input type="submit" name="logout" value="Cerrar sesión">
    </form>

</body>

</html>