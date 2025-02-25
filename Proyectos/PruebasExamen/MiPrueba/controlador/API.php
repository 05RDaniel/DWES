<?php
include_once ("../modelo/DataAccess.php");

$db = new DataAccess();

$requestMethod = $_SERVER["REQUEST_METHOD"];
$requestUri = explode("/", trim($_SERVER["REQUEST_URI"]));
$requestBody = json_decode(file_get_contents("php://input"), true);

switch ($requestMethod) {
    case "GET":
        handleGet($db, $requestUri);
        break;
    case "POST":
        handlePost($db, $requestBody);
        break;
    case "PUT":
    case "PATCH":
        handlePut($db, $requestBody);
        break;
    case "DELETE":
        handleDelete($db, $requestBody);
        break;
    default:
        echo json_encode("Método no permitido");
        break;
}

function handleGet($db, $uri)
{
    if (isset($_GET["id"])){
        $res = $db->productById($_GET["id"]);
    }
    if (is_numeric(end($uri))) {
        $res = $db->productById(end($uri));
    } elseif (end($uri) == "API.php"){
        $res = $db->allProducts();
    }
    echo json_encode($res);
}

function handlePost($db, $data)
{
    if (isset($data["nombre"], $data["precio"])) {
        $nombre = $data["nombre"];
        $precio = $data["precio"];
        if ($db->insertProduct($nombre, $precio)) {
            echo json_encode("Producto creado con exito");
        } else {
            echo json_encode("Error al crear el producto");
        }
    } else {
        echo json_encode("Datos incompletos/erroneos");
    }
}

function handlePut($db, $data)
{
    if (isset($data["id"])) {
        $id = (int) $data["id"];
        $updates = [];
        if (isset($data["nombre"])) {
            $updates[] = "Nombre = '" . $data["nombre"] . "'";
        }
        if (isset($data["precio"])) {
            $updates[] = "Precio = " . $data["precio"];
        }
        if (count($updates) > 0) {
            $sql = "UPDATE Productos SET " . implode(", ", $updates) . " WHERE Id = $id";
            if ($db->dataQuery($sql)) {
                echo json_encode("Producto actualizado con éxito");
            } else {
                echo json_encode("Error al actualizar el producto");
            }
        } else {
            echo json_encode("No se proporcionaron datos para actualizar");
        }
    } else {
        echo json_encode("ID no proporcionado");
    }
}

function handleDelete($db, $data)
{
    if (isset($data["id"])) {
        $id = (int) $data["id"];
        $sql = "DELETE FROM Productos WHERE Id = $id";
        if ($db->dataQuery($sql)) {
            echo json_encode("Producto eliminado con éxito");
        } else {
            echo json_encode("Error al eliminar el producto");
        }
    } else {
        echo json_encode("ID no proporcionado");
    }
}
?>