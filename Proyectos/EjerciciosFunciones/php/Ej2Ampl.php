<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "../inc/Funciones.inc";
    $n1=59;
    $n2=27;
    $n3=0;
    if (empty($n3)){
        $n3=1;
    }
    echo "Del ",$n1," al ",$n2," de ",$n3," en ",$n3,"<br><br>";
    cuenta($n1,$n2,$n3);
    ?>
</body>
</html>