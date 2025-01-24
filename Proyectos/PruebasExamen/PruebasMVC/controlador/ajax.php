<?php
include_once("../modelo/DataAccess.php");
$productos = (new DataAccess())->allProducts();
if (
  isset($_POST["product"])
) {
  $productoActual = $_POST["product"];
  $listaCompras = (new DataAccess())->soldByProduct($productoActual);
  /* listaCompras es toda la información de las compras seleccionadas */
  foreach ($listaCompras as $key) {
    $client[] = (new DataAccess())->clientById($key["Id_Cliente"]);
  }
}
$answer = "";
if (isset($listaCompras) && count($listaCompras) > 0) {
  $answer .= "<tr>
  <th>Cliente</th>
  <th>Cantidad</th>
  <th>Fecha</th>
</tr>";
  foreach ($listaCompras as $key) {
    $answer .= "<tr>";
    foreach ($client as $key2) {
      if ($key["Id_Cliente"] == $key2[0]["Id"]) {
        $answer .= "<td>" . $key2[0]["Nombre"] . "</td>";
      }
    }
    $answer .= "<td>" . $key["Cantidad"] . "</td>";
    $answer .= "<td>" . $key["Fecha"] . "</td></tr>";
  }
} else {
  $answer .= "<tr><td>No hay ventas del producto seleccionado</td></tr>";
}
echo $answer
?>