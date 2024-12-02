<?php
session_start();
if (file_exists("../data/notes.json")) {
    $archivo = json_decode(file_get_contents("../data/notes.json"), true);
    $archivo[] = ["username" => $_SESSION["username"], "note" => $_POST["note"], "Created_at" => date("Y-m-d H:i:s")];
    $archivo = json_encode($archivo);
    file_put_contents("../data/notes.json", $archivo);
    header("Location:../views/dashboard.php");
    exit;
}
