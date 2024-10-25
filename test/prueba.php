<?php
// tests/prueba.php
    /*
    require_once '../app/VideoClub.php';
    require_once '../app/CintaVideo.php';
    require_once '../app/Dvd.php';
    require_once '../app/Juego.php';
    require_once '../app/Cliente.php';
    require_once '../Util/SoporteNoEncontradoException.php';
    require_once '../Util/ClienteNoEncontradoException.php';
    require_once '../Util/SoporteYaAlquiladoException.php';
    require_once '../Util/CupoSuperadoException.php';
    */

use Dwes\ProyectoVideoClub\app\VideoClub;
use Dwes\ProyectoVideoClub\Util\SoporteNoEncontradoException;
use Dwes\ProyectoVideoClub\Util\ClienteNoEncontradoException;
use Dwes\ProyectoVideoClub\Util\SoporteYaAlquiladoException;
use Dwes\ProyectoVideoClub\Util\CupoSuperadoException;

// Crear instancias de clases
$vc = new VideoClub("Severo 8A"); 
echo "<h2>Incluyendo Soportes</h2>";

//voy a incluir unos cuantos soportes de prueba 
$vc->incluirJuego("God of War", 19.99, "PS4", 1, 1); 
$vc->incluirJuego("The Last of Us Part II", 49.99, "PS4", 1, 1);
$vc->incluirDvd("Torrente", 4.5, "es","16:9"); 
$vc->incluirDvd("Origen", 4.5, "es,en,fr", "16:9"); 
$vc->incluirDvd("El Imperio Contraataca", 3, "es,en","16:9"); 
$vc->incluirCintaVideo("Los cazafantasmas", 3.5, 107); 
$vc->incluirCintaVideo("El nombre de la Rosa", 1.5, 140); 

// Agregar clientes y productos al videoclub
$vc->incluirSocio("Amancio Ortega"); 
$vc->incluirSocio("Pablo Picasso", 2); 
echo PHP_EOL;
echo PHP_EOL;

// Alquilar productos
try{
    $vc->alquilaSocioProducto(2,3)->alquilaSocioProducto(2,4); 
}catch(Exception $e){
    throw new VideoclubException($e->getMessage(),$e->getCode(),$e);
}
