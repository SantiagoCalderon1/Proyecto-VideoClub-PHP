<?php
spl_autoload_register(function ($nombreClase) {
    // Ruta a la carpeta "app" desde el directorio principal
    $rutaArchivo =  $nombreClase . '.php';
    $rutaArchivo = str_replace("\\", "/", $rutaArchivo); // Sustituimos las barras

    // Verificar si el archivo de la clase existe antes de incluirlo
    if (file_exists($rutaArchivo)) {
        include_once $rutaArchivo;
    } else {
        echo "La clase $nombreClase no pudo ser cargada. El archivo $rutaArchivo no existe.";
    }
});
