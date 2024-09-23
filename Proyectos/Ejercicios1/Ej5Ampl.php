<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ejercicio 5 ampliado</h1>
    <?php
    $n1 = rand(0, 10);
    $n2 = rand(0, 10);
    $n3 = rand(0, 10);
    echo $n1, ", ", $n2, ", ", $n3, "<br>";
    if ($n1 > $n2 && $n1 > $n3) {
        $nd = $n1;
    } else if ($n2 > $n3) {
        $nd = $n2;
    } else {
        $nd = $n3;
    }
    echo "La nota más alta es ", $nd;
    echo "<br>";
    switch ($nd) {
        case $nd < 5:
            echo "Insuficiente";
            break;
        case $nd >= 5 and $nd < 7:
            echo "Bien";
            break;
        case $nd >= 7 and $nd < 9:
            echo "Notable";
            break;
        case $nd >= 9 and $nd <= 10:
            echo "Sobresaliente";
            break;
        default:
            echo "Incorrecto";
            break;
    }
    ?>
</body>

</html>