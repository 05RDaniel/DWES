<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $conexion = new mysqli("127.0.0.1", "rufes", "1234", "Pruebas");

    if ($conexion->connect_errno) {
        echo "Error de conexión: " . $conexion->connect_error;
        exit();
    }



    function mostrarClientes($conexion)
    {
        $ssql = "SELECT * FROM Cliente";
        if ($result = $conexion->query($ssql)) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["Id"] . "</td><td>" . $row["Nombre"] . "</td><td>" . $row["Apellido"] . "</td></tr>";
            }
            $result->free();
        } else {
            echo "<p>Error al realizar la consulta: " . $conexion->error . "</p>";
        }
    }

    function mostrarProductos($conexion)
    {
        $ssql = "SELECT * FROM Productos";
        if ($result = $conexion->query($ssql)) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["Id"] . "</td><td>" . $row["Nombre"] . "</td><td>" . $row["Precio"] . "</td></tr>";
            }
            $result->free();
        } else {
            echo "<p>Error al realizar la consulta: " . $conexion->error . "</p>";
        }
    }

    function mostrarCompras($conexion)
    {
        $ssql = "SELECT * FROM Compras";
        if ($result = $conexion->query($ssql)) {
            while ($row = $result->fetch_assoc()) {
                $cliente = $conexion->query("SELECT NOMBRE FROM Cliente WHERE Id = " . $row['Id_Cliente'])->fetch_assoc();
                $producto = $conexion->query("SELECT NOMBRE FROM Productos WHERE Id = " . $row['Id_Producto'])->fetch_assoc();
                echo "<tr><td>" . $row["Id"] . "</td><td>" . $producto["NOMBRE"] . "</td><td>" . $cliente["NOMBRE"] . "</td></tr>";
            }
            $result->free();
        } else {
            echo "<p>Error al realizar la consulta: " . $conexion->error . "</p>";
        }
    }
    ?>
    <div id="clientes">
        <h2>Clientes</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
            </tr>
            <?php mostrarClientes($conexion) ?>
        </table>
        <div><a href="./crearCliente.php">Añadir nuevo cliente</a></div>
        <div><a href="./eliminarCliente.php">Eliminar cliente</a></div>
        <div><a href="./editarCliente.php">Editar cliente</a></div>
    </div>
    <div id="productos">
        <h2>Productos</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
            <?php mostrarProductos($conexion) ?>
        </table>
        <div><a href="./crearProducto.php">Añadir nuevo producto</a></div>
        <div><a href="./eliminarProducto.php">Eliminar producto</a></div>
        <div><a href="./editarProducto.php">Editar producto</a></div>
    </div>
    </div>
    <div id="compras">
        <h2>Compras</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cliente</th>
            </tr>
            <?php mostrarCompras($conexion) ?>
        </table>
        <div><a href="">Crea</a></div>
        <div><a href="">Elimina</a></div>
    </div>
</body>
<?php
$conexion->close();
?>

</html>