<?php
include('../models/DataBase.php');

$db = new DataBase;

$requestMethod = $_SERVER['REQUEST_METHOD'];
/* $requestBody = file_get_contents('input/php'); */

switch ($requestMethod) {
    case 'GET':
        handleGet($db);
        break;
    case 'POST':
        handlePost($db, $requestBody);
        break;
    case 'DELETE':
        handleDelete($db, $requestBody);
        break;
    default:
        echo json_encode("Petición incorrecta");
        break;
}

function handleGet($db)
{
    if (isset($_GET['tabla'])) {
        $tabla = $_GET['tabla'];
        if ($tabla == "alumnos") {
            echo json_encode($db->getAllStudents());
        } elseif ($tabla == "asignaturas") {
            echo json_encode($db->getAllSubjects());
        } elseif ($tabla == "matrículas") {
            $mtr = $db->getAllMatriculas();
            $result = "";
            foreach ($mtr as $key) {
                $result += "<tr><td>" . $key["nia"] . "</td><td>" . $key["codigo"] . "</td><td>" . $key["año"] . "</td><td>" . "</td></tr>";
            }
            header('Content-Type: application/html;  charset=UTF-8');
            echo ($result);
        } else {
        }
    } else {
        echo json_encode("Tabla no especificada");
    }
}
function handlePost($db, $body)
{
    if (isset($body)){
        $data = json_decode($body, true);
    if ($db->insertMatricula($data)) {
        echo json_encode("True");
    } else {
        echo json_encode("False");
    }
    }
}

function handleDelete($db, $id)
{
    $data = json_decode($id, true);
    if ($db->deleteMatricula($data)) {
        echo json_encode("True");
    } else {
        echo json_encode("False");
    }
}
