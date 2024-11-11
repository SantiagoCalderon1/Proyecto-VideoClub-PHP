<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
</head>

<body>
    <h1>Formulario de Login</h1>
    <div id="container">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == '1') {
            echo "<p style='color: red;'>Usuario o contraseña incorrectos. Inténtelo de nuevo.</p>";
            // Espera 5 segundos antes de redirigir a la misma página sin el parámetro "error=1"
            echo '<meta http-equiv="refresh" content="5;url=' . $_SERVER['PHP_SELF'] . '">';
            // $_SERVER['PHP_SELF'] retorna la url original del archivo
        }
        ?>
        <form action="app/login.php" method="post">
            <fieldset>
                <legend>Ingrese sus credenciales</legend>
                <label for="user">Usuario: </label>
                <input type="text" name="user" id="user" value="" required>

                <label for="password">Contraseña: </label>
                <input type="password" name="password" id="password" value="" required>

                <input type="submit" value="Iniciar Sesión">
            </fieldset>
        </form>

        <?php
        // Mensaje de cierre de sesión
        if (isset($_GET['logout']) && $_GET['logout'] == '1') {
            echo "<h2 style='color: green;'>Sesión cerrada. Vuelva a iniciar sesión.</h2>";
            // Espera 5 segundos antes de redirigir a la misma página sin el parámetro "logout=1"
            echo '<meta http-equiv="refresh" content="5;url=' . $_SERVER['PHP_SELF'] . '">';
            // $_SERVER['PHP_SELF'] retorna la url original del archivo
        }

        // Mensaje de error
        if (isset($_GET['error']) && $_GET['error'] == '2') {
            echo "<h2 style='color: red;'>Error al obtener los datos. Vuelva a iniciar sesión.</h2>";
            // Espera 5 segundos antes de redirigir a la misma página sin el parámetro "logout=2"
            echo '<meta http-equiv="refresh" content="5;url=' . $_SERVER['PHP_SELF'] . '">';
            // $_SERVER['PHP_SELF'] retorna la url original del archivo
        }
        ?>
    </div>
</body>

</html>