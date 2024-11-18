<?php
// Cargar el autoload para asegurar que las clases están disponibles
require_once '../autoload.php';

session_start(); // Inicia la sesión

// Comprueba si se enviaron las credenciales
if ((isset($_POST['user']) || isset($_SESSION['user'])) && (isset($_POST['password']))) {
    $_SESSION['user'] = $_POST['user'];  // Guarda al admin en la sesión


    // Verifica si las credenciales son de un administrador
    if (verificarSesionAdmin($_POST['user'], $_POST['password'])) {

        // Verifica si los datos ya fueron cargados en la sesión
        if (!isset($_SESSION['productos']) || !isset($_SESSION['socios'])) {
            // Si no están cargados, redirigir a cargarDatos.php
            header('Location: cargarDatosAdmin.php');
            exit();
        }

        header('Location: mainAdmin.php'); // Redirige al administrador
        exit();
    }

    // Verifica si las credenciales son de un cliente
    elseif (verificarSesionCliente($_POST['user'], $_POST['password'])) {

        // Verifica si los datos ya fueron cargados en la sesión
        if (!isset($_SESSION['productos']) || !isset($_SESSION['socios'])) {
            // Si no están cargados, redirigir a cargarDatos.php
            header('Location: cargarDatosCliente.php');
            exit();
        }

        header('Location: mainCliente.php'); // Redirige al cliente
        exit();
    }


    // Si las credenciales no son correctas
    else {
        header('Location: ../index.php?error=1'); // Redirige con error
        exit();
    }
} else {
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
    // Verificación para cliente
    if (isset($_SESSION['socios'])) {
        foreach ($_SESSION['socios'] as $socio) {
            if (verificarUser($socio->getUser(), $userVerificar)) {
                // Verifica la contraseña utilizando password_verify si es que la contraseña está cifrada
                if (verificarPassword($socio->getPassword(), $passwordVerificar)) {
                    $_SESSION['socio'] = $socio;
                    return true;
                }
            }
        }
    }
    return false;
}

function verificarUser($user, $userVerificar)
{
    return $user === $userVerificar;
}

function verificarPassword($password, $passwordVerificar)
{
    return $password === $passwordVerificar;
}
