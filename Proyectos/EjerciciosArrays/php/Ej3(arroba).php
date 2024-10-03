<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $fichero = "../txt/datos.txt";
    $fichero2 = "../txt/datos2.txt";
    $newContent = "default";
    $replaced = "";
    $nFichero = "";
    file_exists($fichero);
        @$fichero_dividido = file($fichero);
        foreach ($fichero_dividido as $f){
            if (preg_match("/([^@]{3,})([@]{1}\w{3,}[\.]{1}\w{1,})/", $f, $partes) == 1){
                $sustituto = "secured".$partes[2];
                $replaced = preg_replace("/([^@]{3,})([@]{1}\w{3,}[\.]{1}\w{1,})/", $sustituto, $f);
                $f = $replaced;
            }
            $nFichero.=$f;
        }
        echo $nFichero;
        file_put_contents($fichero2,$nFichero);
    ?>
</body>

</html>