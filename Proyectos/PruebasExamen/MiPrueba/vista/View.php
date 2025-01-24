<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form>
        <p>
            <select id="product" name="product">
                <option disabled selected>Seleccione un producto</option>
                <?php
                if (isset($answer)) {
                    $things = json_decode($answer, true);

                    foreach ($things as $key) {
                        echo ("<option>" . $key["Nombre"] . "</option>");
                    }
                }
                ?>
            </select>
        </p>
    </form>

    <table id="ventas">

    </table>

    <style>
        table {
            border: 1px black solid;
            border-collapse: collapse;
        }

        table * {
            border: 1px black solid;
            padding: 5px;
        }
    </style>
</body>

</html>