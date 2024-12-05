<?php
$conexion = new mysqli("127.0.0.1", "rufes", "1234", "Pruebas");
if (isset($_POST["product"])) {
    header("Location:./index.php?result=" . mostrarProductos($conexion)."&product=" . $conexion->query("SELECT Nombre FROM Productos WHERE Id=" . $_POST["product"])->fetch_assoc()["Nombre"]);
} else {
    header("Location:./index.php");
}

function mostrarProductos($conexion)
{
    $finish = "";
    $i = 0;
    $ssql = "SELECT * FROM Compras WHERE Id_Producto=" . $_POST["product"];
    if ($result = $conexion->query($ssql)) {
        while ($row = $result->fetch_assoc()) {
            $cliente = $conexion->query("SELECT Nombre FROM Cliente WHERE Id=" . $row["Id_Cliente"])->fetch_assoc()["Nombre"];
            $finish .= "<tr><td>" . $cliente . "</td><td>" . $row["Fecha"] . "</td><td>" . $row["Cantidad"] . "</td</tr>";
            $i = 1;
        }
        $result->free();
    } else {
        echo "<p>Error al realizar la consulta: " . $conexion->error . "</p>";
    }
    $finish = "<tr><th>Cliente</th><th>Fecha</th><th>Cantidad</th></tr>" . $finish;
    $i == 0 ? $finish = "<tr><td>No hay ventas registradas</td></tr>" : null;
    return $finish;
}
