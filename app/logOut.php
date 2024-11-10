<?php 
    // Decidí crear un archivo más para manejar el cierre de sesión, lo podía haber hecho en login sí, pero
    // me parece correcto en un archivo diferente. ya que serías más claro y escalable.
    session_start();
    session_unset(); // Elimina todas las variables de sesión
    session_destroy(); // Destruye la sesión

    header('Location: ../index.php?logout=1'); // Redirige al formulario de login
    exit();
?>
