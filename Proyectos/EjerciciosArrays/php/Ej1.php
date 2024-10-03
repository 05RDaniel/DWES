<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nums = array();
    for ($i=0;$i<11;$i++){
        for ($j=0;$j<11;$j++){
            $nums[$i][] = $i*$j;
        }
    }
    for ($i=0;$i<count($nums);$i++){
        for ($j=0;$j<count($nums);$j++){
            echo $nums[$i][$j],"\n";
        }
        echo "<br>";
    }
    ?>
</body>
</html>