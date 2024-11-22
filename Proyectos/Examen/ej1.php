<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    /* Contsante pi y array con los datos de cada cono */
    define("pi", 3.1416);
    $conos = ["cono1" => array(3, 15), "cono2" => array(8, 21), "cono3" => array(9.5, 6)];

    /* Función para calcular el área del cono */
    function calculArea($conos, $cono) /* Recibe por parámetro el array de conos y la clave a la que debe acceder */
    {
        /* Guarda el radio y la altura del cono en variables */
        $r = $conos[$cono][0];
        $h = $conos[$cono][1];
        /* Llama a la función para guardar la generatriz */
        $l = calculGeneratriz($r, $h);
        /* Hace el cálcula llamando a la función calculGeneratriz */
        $area = pi * $r * ($r + $l);
        /* Retorna el área del cono */
        return $area;
    }

    /* Función para calcular la generatriz del cono */
    function calculGeneratriz($r, $h) /* Recibe por parámetro radio y altura del cono */
    { 
        /* Calcula primero el número al que hace la raíz cuadrada */
        $base = (pow($r, 2)) + (pow($h, 2));
        /* Calcula la raíz cuadrada */
        $gen = sqrt($base);
        /* Devuelve la generatriz */
        return $gen;
    }

    ?>

    <h1>ÁREA DE LOS CONOS</h1>
    <p><?php echo ("Área del cono 1 (radio: " . $conos["cono1"][0] . " mm, altura: " . $conos["cono1"][1] . " mm):" .
            calculArea($conos, "cono1") . " mm<sup>2</sup><br>"
        ); ?></p>
    <p><?php echo ("Área del cono 2 (radio: " . $conos["cono2"][0] . " mm, altura: " . $conos["cono2"][1] . " mm):" .
            calculArea($conos, "cono2") . " mm<sup>2</sup><br>"
        ); ?></p>
    <p><?php echo ("Área del cono 3 (radio: " . $conos["cono3"][0] . " mm, altura: " . $conos["cono3"][1] . " mm):" .
            calculArea($conos, "cono3") . " mm<sup>2</sup><br>"
        ); ?></p>
</body>

</html>