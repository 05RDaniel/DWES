<?php
include './db.php';
$db = new Pruebas;
$db->createConnection("127.0.0.1", "rufes", "1234", "Pruebas");



if (isset($_POST["product"])) {
    header("Location:./ventas.php?result=" . $db->showSalesClient($_POST["product"])."&product=" . $db->showProduct($_POST["product"]) );
} else {
    header("Location:./ventas.php");
}