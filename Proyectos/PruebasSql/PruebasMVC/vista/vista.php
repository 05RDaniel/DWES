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
                <?= isset($productoActual)?"<option selected>". $productoActual ."</option>":"<option disabled selected>Seleccione un producto</option>"; ?>
                <?php
                    foreach ($productos as $key) {
                        echo ("<option>" . $key["Nombre"] . "</option>");
                    }
                ?>
            </select>
        </p>
        <input type="submit" value="Ver ventas">
    </form>

    <table>
        <?php
        foreach ($productos as $key) {
            echo ("<tr><td>" . $key["Nombre"] . "</td><td>" . $key["Precio"] . "</td></tr>");
        }
        ?>
    </table>

    <style>
    </style>
</body>

</html>