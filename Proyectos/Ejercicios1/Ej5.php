<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<h1>Ejercicio 5</h1>
    <?php
    $n1 = rand(0, 10);
    $n2 = rand(0, 10);
    $n3 = rand(0, 10);
    echo $n1,", ",$n2,", ",$n3,"<br>";
    if($n1 > $n2 && $n1 > $n3){
        $nd=$n1;
    } else if ($n2 > $n3) {
        $nd=$n2;
    } else {
        $nd=$n3;
    }
    echo "La nota más alta es ",$nd;
    ?>
</body>

</html>