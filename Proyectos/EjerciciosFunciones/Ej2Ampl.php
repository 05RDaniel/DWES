<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $n1=59;
    $n2=27;
    $n3=0;
    if (empty($n3)){
        $n3=1;
    }
    function cuenta($a,$b,$c){
        if($a<$b){
            for ($a;$a<$b;$a+=$c){
                echo $a,"<br>";
            }
        } else if($a>$b){
            for ($a;$a>$b;$a-=$c){
                echo $a,"<br>";
            }
        }
    }
    echo "Del ",$n1," al ",$n2," de ",$n3," en ",$n3,"<br><br>";
    cuenta($n1,$n2,$n3);
    ?>
</body>
</html>