<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="opsClientes.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
        <br><br>
        <label for="newnombre">Nuevo nombre:</label>
        <input type="text" id="newnombre" name="newnombre" required>
        <br><br>
        <label for="newapellido">Nuevo apellido:</label>
        <input type="text" id="newapellido" name="newapellido" required>
        <input type="hidden" name="origen" value="editar">
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>