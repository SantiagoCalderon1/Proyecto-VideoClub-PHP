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
        <form action="/app/login.php" method="post">
            <label for="user">Usuario: </label>
            <input type="text" name="user" id="user" value="" required>

            <label for="password">Contraseña: </label>
            <input type="password" name="password" id="password" value="" required>
        </form>
    </div>
</body>
</html>