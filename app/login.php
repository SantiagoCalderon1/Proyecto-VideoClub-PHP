<?php
if (isset($_POST['user'])  && isset($_POST['pass'])) {
    $user = $_POST['user'];
    $pass  = $_POST['pass'];

    if ($user  == 'admin' && $pass == 'admin') {
        header('Location: http://localhost:8080/mainAdmin.php');
    }

    if ($user  == 'usuario' && $pass == 'usuario') {
        header('Location: http://localhost:8080/maincliente.php');
    }
}
