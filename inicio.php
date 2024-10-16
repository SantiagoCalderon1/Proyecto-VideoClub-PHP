<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>

<body>
    <h1>Inicio PHP</h1>
    <h2>Prueba Clase Soporte</h2>
    <?php
    //Código de prueba para Clase Soporte
    include "Clases/Soporte.php";

    $soporte1 = new Soporte("Tenet", 3);
    echo "<strong>" . $soporte1->titulo . "</strong>";
    echo "<br>Precio: " . $soporte1->getPrecio() . " euros";
    echo "<br>Precio IVA incluido: " . $soporte1->getPrecioConIVA() . " euros";
    $soporte1->muestraResumen();
    ?>
    <br>
    <h2>Prueba Clase Dvd</h2>
    <?php
    //Código de prueba para Clase Dvd
    include "Clases/Dvd.php";

    $miDvd = new Dvd("Origen", 24, 15, "es,en,fr", "16:9");
    echo "<strong>" . $miDvd->titulo . "</strong>";
    echo "<br>Precio: " . $miDvd->getPrecio() . " euros";
    echo "<br>Precio IVA incluido: " . $miDvd->getPrecioConIva() . " euros";
    $miDvd->muestraResumen();
    ?>

    <h2>Prueba Clase CintaVideo</h2>
    <?php
    //Código de prueba para Clase CintaVideo
    include "Clases/CintaVideo.php";
    $miCinta = new CintaVideo("Los cazafantasmas", 23, 3.5, 107);
    echo "<strong>" . $miCinta->titulo . "</strong>";
    echo "<br>Precio: " . $miCinta->getPrecio() . " euros";
    echo "<br>Precio IVA incluido: " . $miCinta->getPrecioConIva() . " euros";
    $miCinta->muestraResumen();
    ?>
    
    <h2>Prueba Clase Juego</h2>
    <?php
    include "Clases/Juego.php";

    $miJuego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
    echo "<strong>" . $miJuego->titulo . "</strong>";
    echo "<br>Precio: " . $miJuego->getPrecio() . " euros";
    echo "<br>Precio IVA incluido: " . $miJuego->getPrecioConIva() . " euros";
    $miJuego->muestraResumen();
    ?>
</body>

</html>