<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $n1=152;
    $n2=27;
    $n3=1;
    function cuenta($a,$b,$c){
        if ($a-$c==$a){
            $c=1;
        }
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
    cuenta($n1,$n2,$n3);
    ?>
</body>
</html>