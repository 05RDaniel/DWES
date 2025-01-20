<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../controlador/controlador.php" method="POST">
        <p>
            <select id="product" name="product">
                <?= isset($productoActual) ? "<option selected>" . $productoActual . "</option>" : "<option disabled selected>Seleccione un producto</option>"; ?>
                <?php
                foreach ($productos as $key) {
                    echo ("<option>" . $key["Nombre"] . "</option>");
                }
                ?>
            </select>
        </p>
        <input type="submit" value="Ver ventas">
    </form>

    <table border="1">
        <tr>
            <th>Cliente</th>
            <th>Cantidad</th>
            <th>Fecha</th>
        </tr>
        <?php
        echo "<br>";
        foreach ($listaCompras as $key) {
            echo "<tr>";
            foreach ($client as $key2) {
                if ($key["Id_Cliente"] == $key2[0]["Id"]) {
                    echo "<td>".$key2[0]["Nombre"] . "</td>";
                }
            }
            echo "<td>".$key["Cantidad"] . "</td>";
            echo "<td>".$key["Fecha"] . "</td></tr>";
        }
        ?>

    </table>

    <style>
    </style>
</body>

</html>