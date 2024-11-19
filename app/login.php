<?php
// Cargar el autoload para asegurar que las clases están disponibles
require_once '../autoload.php';

session_start(); // Inicia la sesión

$users = [1 => ['AmOr01', '1234'], 2 => ['PaPi01', '1234']];

// Comprueba si se enviaron las credenciales
if (isset($_POST['user']) && isset($_POST['password'])) {
    // Obtiene los datos del formulario
    $user = $_POST['user'];
    $password = $_POST['password'];

    // Verifica si las credenciales son de un administrador
    if (verificarSesionAdmin($user, $password)) {
        header('Location: cargarDatosAdmin.php');
        exit();
    }

    // Verifica si las credenciales son de un cliente
    elseif (verificarSesionCliente($user, $password)) {
        echo 'entra al tercer if';
        header('Location: cargarDatosCliente.php');
        exit();
    }

    // Si las credenciales no son correctas
    else {
        echo 'entra al primer else';
        header('Location: ../index.php?error=1'); // Redirige con error
        exit();
    }
} else {
    echo 'entra al segundo else';
    // Si no hay credenciales en el POST, redirige a la página de login
    header('Location: ../index.php');
    exit();
}

function verificarSesionAdmin($userVerificar, $passwordVerificar)
{
    // Verificación para admin (uso directo de admin para credenciales)
    if (verificarUser('admin', $userVerificar) && verificarPassword('admin', $passwordVerificar)) {
        return true;
    }
    return false;
}

function verificarSesionCliente($userVerificar, $passwordVerificar)
{
    global $users;

    foreach ($users as $credenciales) {
        $username = $credenciales[0];
        $password = $credenciales[1];

        echo $username, $userVerificar;

        if (verificarUser($username, $userVerificar) && verificarPassword($password, $passwordVerificar)) {
            $_SESSION['usuarioSocio'] = $username;
            return true; // Usuario y contraseña válidos
        }
    }
    return false; // Credenciales no válidas
}

function verificarUser($user, $userVerificar)
{
    return $user === $userVerificar;
}

function verificarPassword($password, $passwordVerificar)
{
    return $password === $passwordVerificar;
}
