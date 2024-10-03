<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $coches = array("0000AAA" => array( "Ford","Focus", "5"));
    $coches += array("1111BBB" => array( "Suzuki","Swift", "3"));
    $coches += array("2222CCC" => array( "Peugeot","3008", "5"));
    ksort($coches);
    foreach ($coches as $c => $coche) {
        echo $c," ";
        for ($i=0;$i<count($coche);$i++){
            echo $coche[$i]," ";
        }
        echo "<br>";
    }
    ?>
</body>
</html>