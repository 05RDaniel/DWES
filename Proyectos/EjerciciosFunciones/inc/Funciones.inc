<?php
function saludo($n){
        echo "Hola, ",$n;
    }

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

function intercambia(&$a,&$b){
    $c = $a;
    $a = $b;
    $b = $c;
    }    

    function calculaDescuento($precio,$descuento=0){
    return $precio-($precio*($descuento/100));
    }
    ?>
