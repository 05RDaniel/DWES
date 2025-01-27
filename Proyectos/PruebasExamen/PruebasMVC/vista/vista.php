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
    </form>

    <table id="ventas">

    </table>

    <style>
        table{
            border: 1px black solid;
            border-collapse: collapse;
        }
        table *{
            border: 1px black solid;
            padding: 5px;
        }
    </style>

    <script>
            addEventListener("change" , function(){
            var producto = document.getElementById("product").value;
            query_string = "product=" + encodeURIComponent(producto);

            peticion_http = new XMLHttpRequest();
            peticion_http.onreadystatechange = procesaRespuesta;
            peticion_http.open("POST", "../controlador/ajax.php");
            peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            peticion_http.send(query_string);
            })

        function procesaRespuesta() {
            if (peticion_http.readyState == 4) {
                if (peticion_http.status == 200) {
                    var answer = peticion_http.responseText;
                    document.getElementById("ventas").innerHTML = answer;
                }
            }
        }
    </script>
</body>

</html>