<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
include './db.php';
$db = new Pruebas;
$db->createConnection("127.0.0.1", "rufes", "1234", "Pruebas");
    ?>
    <form action="./index.php" method="POST">
        <p>
            <select id="product" name="product">
                <?= isset($_GET["product"])?"<option selected>". $_GET["product"] ."</option>":"<option disabled selected>Seleccione un producto</option>"; ?>
                
                <?= $db->showProducts(); ?>
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