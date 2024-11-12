<?php
session_start();  // Inicia la sesión

// Destruir todas las variables de la sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir a la página de login
header('Location: ../index.php?logout=1');
exit();
?>
