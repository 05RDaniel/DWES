<?php
include_once 'vehiculo.php';
include_once 'moto.php';
include_once 'coche.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>COCHES Y MOTOS EN STOCK</h1>
    <?php
    $car1 = new coche("Toyota","Corolla",25000,2200);
    $moto1 = new moto("Harley-Davidson","Sporster",15000,true);
    $moto2 = new moto("Ducati","Diavel",18000,false);
    echo $car1->mostrarDetalles();
    echo $moto1->mostrarDetalles();
    ?>

    
</body>

</html>