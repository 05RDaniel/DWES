<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $conexion = new mysqli("127.0.0.1", "rufes", "1234", "Pruebas");
    function mostrarProductos($conexion)
    {
        $ssql = "SELECT * FROM Productos ORDER BY Nombre";
        if ($result = $conexion->query($ssql)) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value=" . $row["Id"] . ">" . $row["Nombre"] . "</option>";
            }
            $result->free();
        } else {
            echo "<p>Error al realizar la consulta: " . $conexion->error . "</p>";
        }
    }
    ?>
    <form action="./ventas.php" method="POST">
        <p>
            <select id="product" name="product">
                <?= isset($_GET["product"])?"<option selected>". $_GET["product"] ."</option>":"<option disabled selected>Seleccione un producto</option>"; ?>
                
                <?php mostrarProductos($conexion) ?>
            </select>
        </p>
        <input type="submit" value="Ver ventas">
    </form>
    <br>
    <?php
        if (isset($_GET["product"])) {
            echo "Ventas de <b>".$_GET["product"]."</b>:<br><br>";
        }
    ?>
    <table>
        <?php
        if (isset($_GET["result"])) {
            echo $_GET["result"];
        } else {
            echo "<tr><td>Seleccione un producto por favor</td></tr>";
        }
        ?>
    </table>
    <style>
        table {
            border-collapse: collapse;
        }

        table td {
            border: 1px solid black;
            width: 100px;
            height: 50px;
            text-align: center;
        }
    </style>
</body>

</html>