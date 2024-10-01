<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    const PI = 3.14;
    $radio = 5;
    $area = number_format(PI*$radio,2);
    $textoResultado = "El área del círculo es ".$area;
    echo $textoResultado;
    echo "<br>";
    $textoResultadoMayus = strtoupper($textoResultado);
    echo $textoResultadoMayus;
    ?>
</body>
</html>