<?php
session_start(); //Inicia la sesión

// Comprueba si se enviaron las credenciales
if (isset($_POST['user'])  && isset($_POST['password'])) {
    $user = $_POST['user'];
    $pass  = $_POST['password'];

    if ($user  == 'admin' && $pass == 'admin') {
        // header('Location: http://localhost:8080/ProyectoVideoClub/app/mainAdmin.php');
        $_SESSION['user'] = $user;
        header('Location: cargarDatos.php');
        //header('Location: mainAdmin.php');

        exit();
    } elseif ($user  == 'usuario' && $pass == 'usuario') {
        // header('Location: http://localhost:8080/ProyectoVideoClub/app/maincliente.php');
        $_SESSION['user'] = $user;
        header('Location: maincliente.php');

        exit();
    } else {
        header('Location: ../index.php?error=1');
        exit();
    }
}
?>