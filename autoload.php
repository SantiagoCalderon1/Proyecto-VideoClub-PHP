<?php
spl_autoload_register(function ($class) {
    // Define el prefijo del namespace 
    $prefix = 'ProyectoVideoClub\\app\\';
    $baseDir = __DIR__ . '/app/';

    // Verifica si la clase comienza con el prefijo correcto
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    // Obtén el nombre de la clase relativa al espacio de nombres
    $relativeClass = substr($class, $len);

    // Reemplaza los separadores de namespace por '/', añade '.php'
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    // Si el archivo existe, lo incluye
    if (file_exists($file)) {
        require $file;
    }
});
