<?php
include_once ("../modelo/DataAccess.php");
/* if (isset($_POST["product"])) {
    header("Location:./ventas.php?result=" . $db->showSalesClient($_POST["product"])."&product=" . $db->showProduct($_POST["product"]) );
} else {
    header("Location:./ventas.php");
} */
/* Falta el equivalente a esto $db->showSalesClient($_POST["product"]) */
$productos = (new DataAccess())->allProducts();
isset($_POST["product"])?$productoActual = $_POST["product"]:null;
include_once ("../vista/vista.php");
?>