<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $n1=36;
    $n2=27;
    function cuenta($a,$b){
        if($a<$b){
            for ($a;$a<=$b;$a++){
                echo $a,"<br>";
            }
        } else if($a>$b){
            for ($a;$a>=$b;$a--){
                echo $a,"<br>";
            }
        }
    }
    echo "Del ",$n1," al ",$n2,"<br><br>";
    cuenta($n1,$n2);
    ?>
</body>
</html>