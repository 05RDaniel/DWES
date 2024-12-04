<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="opsProductos.php" method="POST">
        <label for="id">Id:</label>
        <input type="text" id="id" name="id" required>
        <br><br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>
        <input type="hidden" name="origen" value="eliminar">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>