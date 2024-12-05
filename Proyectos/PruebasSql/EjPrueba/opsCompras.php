<?php
$conexion = new mysqli("127.0.0.1", "rufes", "1234", "Pruebas");

if ($conexion->connect_errno) {
    echo "Error de conexión: " . $conexion->connect_error;
    exit();
}

if ($_POST["origen"] == "crear") {
    insertarCompra($conexion, $_POST["nombre"], $_POST["precio"]);
} elseif ($_POST["origen"] == "eliminar") {
    eliminarCompra($conexion, $_POST["id"], $_POST["nombre"]);
} elseif ($_POST["origen"] == "editar") {
    editarCompra($conexion, $_POST["id"], $_POST["newnombre"], $_POST["newprecio"]);
}

function eliminarCompra($conexion, $id, $nombre)
{
    $ssql = "DELETE FROM Productos WHERE Id='$id' AND Nombre='$nombre'";
    if ($conexion->query($ssql)) {
        echo "<p>Registro eliminado con éxito</p>";
    } else {
        echo "<p>Error al eliminar el registro: " . $conexion->error . "</p>";
    }
}

function insertarCompra($conexion, $nombre, $precio)
{
    $ssql = "INSERT INTO Productos (Id, Nombre, Precio) VALUES (null,'$nombre', '$precio')";

    if ($conexion->query($ssql)) {
        echo "<p>Registro insertado con éxito</p>";
    } else {
        echo "<p>Error al insertar el registro: " . $conexion->error . "</p>";
    }
}

function editarCompra($conexion, $id, $newnombre, $newprecio){
    $ssql = "UPDATE Productos SET Nombre='$newnombre', Precio='$newprecio' WHERE Id='$id'";

    if ($conexion->query($ssql)) {
        echo "<p>Registro editado con éxito</p>";
    } else {
        echo "<p>Error al editar el registro: ". $conexion->error. "</p>";
    }
}
$conexion->close();
header("Location: index.php");
