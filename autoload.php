<?php
spl_autoload_register(function( $nombreClase ) {
    $ruta = "app\\".$nombreClase.'.php';
    $ruta = str_replace("\\", "/", $ruta); // Sustituimos las barras
    include_once '$ruta';
} );
?>