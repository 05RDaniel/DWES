<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Hola <?php echo htmlspecialchars($_POST['nombre']); ?>.</p>
    <p>Usted tiene <?php echo (int)$_POST['edad']; ?> años, es decir, nació en el año <?php echo date("Y") - (int)$_POST['edad'] ?></p>
    <p>Nació en <?php echo $_POST['lugar']; ?></p>
</body>

</html>