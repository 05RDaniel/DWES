<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p><?php
    include 'Ej1_include.php';
    $a = new Estudiante("00000000A","Dan","dan@gmail.com","0001");
    $b = new Persona("00000000A","Dan","dan@gmail.com");
    $a->MostrarDatos();
    echo "<br><br>";
    $b->MostrarDatos();
    echo "<br><br>";
    $a->__set('numExpediente',"1111");
    $b->__set('nombre',"Calabazas");
    $a->MostrarDatos();
    echo "<br><br>";
    $b->MostrarDatos();
    ?></p>
</body>

</html>