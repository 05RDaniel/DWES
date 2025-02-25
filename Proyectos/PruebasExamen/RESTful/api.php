<?php
include("db.php");

$method = strtoupper($_SERVER["REQUEST_METHOD"]);

switch ($method) {
    case 'PUT':
        Api::put();
        break;
    case 'PATCH':
        Api::patch();
        break;
    case 'DELETE':
        Api::delete();
        break;
    case 'GET':
        Api::get();
        break;
    case 'POST':
        Api::post();
        break;
    default:
        break;
}

class Api
{
    public static function get(){
        $db = new DB;
        $path = $_SERVER["REQUEST_URI"];
        $path_parts = explode("/", $path);
        // RUTA: http://localhost/UD5/RESTful/api.php/id
        $id = isset($path_parts[6]) ? $path_parts[6] : null;
        if (isset($id) && !is_null($id) && $id != "") {
            $res = $db->GETuno($id);
        } else {
            $res = $db->GET();
        }
      $datos = $res->fetch_all(MYSQLI_ASSOC);
        echo json_encode($datos);
    }

    public static function post(){
        $db = new  DB;
        $datos = json_decode(file_get_contents('php://input'), true);
        $n = $datos["nombre"];
        $p = $datos["precio"];
        $d = $datos["descripcion"];
        $res = $db->POST($n, $p, $d);

        echo json_encode($res);
    }

    public static function put(){
        $db = new DB;
        $datos = json_decode(file_get_contents('php://input'), true);
        $id = $datos["id"];
        $n = $datos["nombre"];
        $p = $datos["precio"];
        $d = $datos["descripcion"];
        $res = $db->PUT($n, $p, $d, $id);
        echo json_encode($res);
    }

    public static function patch(){
        $db = new DB;
        $datos = json_decode(file_get_contents('php://input'), true);
        $id = $datos["id"];

        foreach ($datos as $key => $value) {
            if ($key != "id") {
                $res = $db->PATCH($key, $value, $id);
            }
        }
        echo json_encode($res);
    }

    public static function delete(){
        $db = new DB;
        $path = $_SERVER["REQUEST_URI"];
        $path_parts = explode("/", $path);
        $id = isset($path_parts[6]) ? $path_parts[6] : null;
        if ($id == null) {
            $res = false;
        } else {
            $res = $db->DELETE($id);
        }
        echo json_encode($res);
    }
}
