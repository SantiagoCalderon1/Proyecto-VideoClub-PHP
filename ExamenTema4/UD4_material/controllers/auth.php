<?php
session_start();

include '../data/Usuario.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

$usersJson = '../data/users.json';

if (file_exists($usersJson)) {
    $content = file_get_contents($usersJson);
    $persona = new Usuario($username, $password);

    $user = [
        'username' => $persona->getUsername(),
        'password' => $persona->getPassword()
    ];

    if (empty($content)) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header('location: ../models/user.php');
    }else{
    
    $usuarios = decodificar($content);

    foreach ($usuarios as $key => $userr) {
        if ($userr['username'] == $username && $userr['password'] == $password) {
            echo 'ya hay un usuario con esos datos';
        }else{
            echo 'creando usuario';
        }
    }

    setcookie('users', $username, time() + 86400, '/', 'localhost');
    setcookie('paswor', $username, time() + 86400, '/', 'localhost');
    }
}else{
    echo '<p>Aún no sé ha registrado nadie</p>';
}
}


function codificar($codificar)
{
    return json_encode($codificar, JSON_PRETTY_PRINT);
}

function decodificar($decodificar)
{
    return json_decode($decodificar, true);
}
