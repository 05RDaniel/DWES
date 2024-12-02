<?php
    $conos = ["cono1" => array("radio"=>3, "altura"=>15), "cono2" => array(8, 21), "cono3" => array(9.5, 6)];
    $new = json_encode($conos);
    echo $new;
    echo "<br>";
    echo $conos;
?>