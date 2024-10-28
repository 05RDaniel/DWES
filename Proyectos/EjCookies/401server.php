<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Get</h2>
<?php
    echo $_SERVER["PHP_SELF"]."<br>";
    echo $_SERVER["SERVER_SOFTWARE"]."<br>";
    echo $_SERVER["SERVER_NAME"]."<br>";
    echo $_SERVER["REQUEST_METHOD"]."<br>";
    echo $_SERVER["REQUEST_URI"]."<br>";
    echo $_SERVER["QUERY_STRING"]."<br><br>";
    echo $_SERVER["HTTP_REFERER"]."<br>";
    ?>
    
    <h2>Post</h2>
    <p>Hola <?php echo htmlspecialchars($_POST['nombre']); ?>.</p>
    <p>Usted tiene <?php echo (int)$_POST['edad']; ?> años, es decir, nació en el año <?php echo date("Y") - (int)$_POST['edad'] ?></p>
    <p>Nació en <?php echo $_POST['lugar']; ?></p>
</body>

</html>