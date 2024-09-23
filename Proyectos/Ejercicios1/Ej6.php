<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ejercicio 6</h1>
    <h3>Cuenta progresiva del 0 al 100</h3>
    <?php
    for ($i = 0; $i <= 100; $i++) {
        echo $i;
        if ($i != 100) {
            echo ", ";
        }
    }
    ?>
    
    <br>
    <h3>Cuenta regresiva del 10 al 0</h3>

    <?php
    $i = 10;
    while ($i >= 0) {
        echo $i;
        if ($i != 0) {
            echo " - ";
        }
        $i--;
    }
    ?>
</body>

</html>