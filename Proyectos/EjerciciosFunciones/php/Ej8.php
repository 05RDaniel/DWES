<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    date_default_timezone_set('Europe/Madrid');
    $hour = "23:30:12";
    if (preg_match("/^([0-2]{1}[0-9]{1})\:([0-5]{1}[0-9]{1})\:([0-5]{1}[0-9]{1})$/", $hour, $partes) == 1) {
        if ((int)$partes[1] < 24) {
        echo "La hora completa es " . $partes[0];
        echo "<br>La hora es " . $partes[1];
        echo "<br>El minuto es " . $partes[2];
        echo "<br>El segundo es " . $partes[3];
        } else {
            echo "Formato de hora no válido";
        }
    } else {
        echo "Formato de hora no válido";
    }
    ?>
</body>

</html>