<?php
spl_autoload_register(function ($class) {
    // Define el prefijo del namespace para app y util
    $appPrefix = 'ProyectoVideoClub\\app\\';
    $utilPrefix = 'ProyectoVideoClub\\util\\';
    
    // Define los directorios base
    $appBaseDir = __DIR__ . '/app/';
    $utilBaseDir = __DIR__ . '/util/'; // Asegúrate de que este directorio existe

    // Verifica si la clase comienza con el prefijo de app
    $lenApp = strlen($appPrefix);
    if (strncmp($appPrefix, $class, $lenApp) === 0) {
        // Obtén el nombre de la clase relativa al espacio de nombres
        $relativeClass = substr($class, $lenApp);
        // Reemplaza los separadores de namespace por '/', añade '.php'
        $file = $appBaseDir . str_replace('\\', '/', $relativeClass) . '.php';
        // Si el archivo existe, lo incluye
        if (file_exists($file)) {
            require $file;
        }
        return;
    }

    // Verifica si la clase comienza con el prefijo de util
    $lenUtil = strlen($utilPrefix);
    if (strncmp($utilPrefix, $class, $lenUtil) === 0) {
        // Obtén el nombre de la clase relativa al espacio de nombres
        $relativeClass = substr($class, $lenUtil);
        // Reemplaza los separadores de namespace por '/', añade '.php'
        $file = $utilBaseDir . str_replace('\\', '/', $relativeClass) . '.php';
        // Si el archivo existe, lo incluye
        if (file_exists($file)) {
            require $file;
        }
    }
});
