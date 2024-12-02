<?php
/* Esta función recibe por parámetro un elemento de un array, comprueba la coincidencia de usuarios y contraseñas y,
o bien reconduce al usuario a otra página o bien devuelve un booleano, que será utilizado más adelante */
function checkUsr($key){
    if ($key["username"] == $_POST["username"] && $key["password"] == $_POST["password"]) {
            if (isset($_POST["recordarme"])) {
                setcookie("user", $_POST["username"], time() + 3600, "/", "localhost");
            }
            session_start();
            $_SESSION["username"] = $_POST["username"];
            header("Location:../views/dashboard.php");
            exit;
        } else {
            return false;
        }
}
/*  ----------------------------------------------
                RESPECTIVO AL LOGIN
    ---------------------------------------------- */
$archivo = json_decode(file_get_contents("../data/users.json"), true);
if ($_POST["source"] == "login") {
    foreach ($archivo as $key) {
        $correcto = checkUsr($key);
    }
    if (!$correcto) {
        header("Location:../views/login.php?error='Usuario y/o contraseña incorrectos'");
        exit;
    }


/*  ----------------------------------------------
            RESPECTIVO AL REGISTRO
---------------------------------------------- */
} else if ($_POST["source"] == "register") {
    if (file_exists("../data/users.json")) {
        $archivo = json_decode(file_get_contents("../data/users.json"), true);
        foreach ($archivo as $key) {
            if ($key["username"] == $_POST["username"]) {
                $existente = true;
                echo "Existe";
            }
        }
        if (!$existente) {
            $archivo[] = ["username" => $_POST["username"], "password" => $_POST["password"]];
        } else {
            header("Location:../views/register.php?error='Este usuario ya existe'");
            exit;
        }
        $archivo = json_encode($archivo);
        file_put_contents("../data/users.json", $archivo);
        header("Location:../index.php");
        exit;
    }
}

?>
