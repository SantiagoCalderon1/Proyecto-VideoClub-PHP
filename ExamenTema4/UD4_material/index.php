<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <style>
        #registro, #login {
            width: 120px;
            height: 50px;
            text-align: center;
            line-height: 50px;
            background-color: #556871;
            float: left;
            cursor: pointer;
        }

        #login {
            margin-left: 20px;
        }

        a {
            color: white;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <h1>Bienvenido al sistema de Gestión de Notas</h1>

    <?php 
    
    $time = new DateTime();
    $hora = $time->format('H:i:s');
    $fecha = $time->format('d-m-Y');
    $horaActual = $hora . " " . $fecha;
    $horaActual = str_replace(" ", " ", $horaActual);
    
    //ExamenTema4/UD4_material/index.php
    
    ?>
    <div>
        <div id="registro"><a href="../UD4_material/views/register.php">Regístrate</a></div>
        <div id="login"><a href="../UD4_material/views/login.php">Accede</a></div>
    </div>
</body>
</html>