    <?php
    require_once 'autoload.php';

    use ProyectoVideoClub\app\VideoClub;

    echo '<h1>Inicio 3 </h1>';

    $vc = new VideoClub("Severo 8A");

    echo "<h2>Incluyendo Soportes</h2>";
    //voy a incluir unos cuantos soportes de prueba w
    $vc->incluirJuego("God of War", 19.99, "PS4", 1, 1);
    $vc->incluirJuego("The Last of Us Part II", 49.99, "PS4", 1, 1);
    $vc->incluirDvd("Torrente", 4.5, "es", "16:9");
    $vc->incluirDvd("Origen", 4.5, "es,en,fr", "16:9");
    $vc->incluirDvd("El Imperio Contraataca", 3, "es,en", "16:9");
    $vc->incluirCintaVideo("Los cazafantasmas", 3.5, 107);
    $vc->incluirCintaVideo("El nombre de la Rosa", 1.5, 140);


    echo "<h2>Listando Productos Sin haber alquilado alguno</h2>";
    //listo los productos 
    $vc->listarProductos();


    echo "<h2>Incluyendo socios</h2>";
    //voy a crear algunos socios 
    $vc->incluirSocio("Amancio Ortega");
    $vc->incluirSocio("Pablo Picasso", 2);

    echo "<h2>Alquilando Productos</h2>";

    $vc->alquilaSocioProducto(2, 3)->alquilaSocioProducto(2, 4);
    //alquilo otra vez el soporte 2 al socio 1. 
    // no debe dejarme porque ya lo tiene alquilado 

    echo "<h2>Alquilando Productos con error</h2>";
    $vc->alquilaSocioProducto(2, 3)->alquilaSocioProducto(2, 5);
    //alquilo el soporte 3 al socio 2. 
    //no se puede porque el socio 2 tiene 2 alquileres como máximo 

    echo "<h2>Listado de socios del club</h2>";
    //listo los socios 
    $vc->listarSocios();
    ?>