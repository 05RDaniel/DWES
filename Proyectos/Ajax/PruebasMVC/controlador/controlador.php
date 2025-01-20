<?php
include_once ("../modelo/DataAccess.php");
$productos = (new DataAccess())->allProducts();
if (
    isset($_POST["product"])
){
    $productoActual = $_POST["product"];
    $listaCompras = (new DataAccess())->soldByProduct($productoActual);
    /* listaCompras es toda la información de las compras seleccionadas */
    foreach ($listaCompras as $key){
        $client [] = (new DataAccess())->clientById($key["Id_Cliente"]);
    }
}
/* productoActual es el NOMBRE del producto actual */
include_once ("../vista/vista.php");
?>