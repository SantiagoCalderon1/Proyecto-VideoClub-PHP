<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01 - Area de tres conos</title>
</head>

<body>
    <h1>ÁREA DE LOS CONOS</h1>
    <?php

    define('PI', 3.1416);

    function calcularAreaCono($radio, $altura)
    {
        return PI * $radio * ($radio + (sqrt(pow($radio, 2) + pow($altura, 2))));
    }

    // /EXAMEN/Ejercicio01/index.php

    $cono1 = [
        'radio' => 3,
        'altura' => 15,
    ];

    $cono1['area'] = PI * $cono1['radio'] * ($cono1['radio'] + (sqrt(pow($cono1['radio'], 2) + pow($cono1['altura'], 2))));


    $cono2 = [
        'radio' => 8,
        'altura' => 21,
        'area' => PI * 8 * (8 + (sqrt(pow(8, 2) + pow(21, 2))))
    ];



    $cono3 = [
        'radio' => 9.5,
        'altura' => 6,
        'area' => calcularAreaCono(9.5, 6)
    ];

    $conos = [
        'cono1' => $cono1,
        'cono2' => $cono2,
        'cono3' => $cono3
    ];

    foreach ($conos as $key => $value) {
        echo "<p>El área del cono $key (radio: " . $value['radio'] . " mm, altura: " . $value['altura'] . " mm): " . $value['area'] . "mm<sup>2</sup></p>";
    }

    ?>

</body>

</html>