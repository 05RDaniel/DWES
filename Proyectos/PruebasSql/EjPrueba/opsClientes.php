<?php
$conexion = new mysqli("127.0.0.1", "rufes", "1234", "Pruebas");

if ($conexion->connect_errno) {
    echo "Error de conexión: " . $conexion->connect_error;
    exit();
}

if ($_POST["origen"] == "crear") {
    insertarCliente($conexion, $_POST["nombre"], $_POST["apellido"]);
} elseif ($_POST["origen"] == "eliminar") {
    eliminarCliente($conexion, $_POST["id"], $_POST["nombre"], $_POST["apellido"]);
} elseif ($_POST["origen"] == "editar") {
    editarCliente($conexion, $_POST["id"], $_POST["newnombre"], $_POST["newapellido"]);
}

function eliminarCliente($conexion, $id, $nombre, $apellido)
{
    $ssql = "DELETE FROM Cliente WHERE Id='$id' AND Nombre='$nombre' AND Apellido='$apellido'";
    if ($conexion->query($ssql)) {
        echo "<p>Registro eliminado con éxito</p>";
    } else {
        echo "<p>Error al eliminar el registro: " . $conexion->error . "</p>";
    }
}

function insertarCliente($conexion, $nombre, $apellido)
{
    $ssql = "INSERT INTO Cliente (Id, Nombre, Apellido) VALUES (null,'$nombre', '$apellido')";

    if ($conexion->query($ssql)) {
        echo "<p>Registro insertado con éxito</p>";
    } else {
        echo "<p>Error al insertar el registro: " . $conexion->error . "</p>";
    }
}

function editarCliente($conexion, $id, $newnombre, $newapellido){
    $ssql = "UPDATE Cliente SET Nombre='$newnombre', Apellido='$newapellido' WHERE Id='$id'";

    if ($conexion->query($ssql)) {
        echo "<p>Registro editado con éxito</p>";
    } else {
        echo "<p>Error al editar el registro: ". $conexion->error. "</p>";
    }
}
$conexion->close();
header("Location: index.php");
