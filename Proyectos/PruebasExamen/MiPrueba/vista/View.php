<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos y Ventas</title>
</head>

<body>
    <form>
        <p>
            <label for="product">Seleccione un producto:</label>
            <select id="product" name="product">
                <option disabled selected>Seleccione un producto</option>
            </select>
        </p>
    </form>

    <table id="ventas">
        <!-- Aquí se generará dinámicamente el contenido -->
    </table>

    <script>
        window.onload = function() {
            cargarProductos();
        };

        function cargarProductos() {
            var url = "../controlador/API.php"; // Endpoint para obtener productos
            var peticion_http = new XMLHttpRequest();

            peticion_http.onreadystatechange = function() {
                if (peticion_http.readyState === 4) {
                    if (peticion_http.status === 200) {
                        var productos = JSON.parse(peticion_http.responseText);
                        var opciones = '<option disabled selected>Seleccione un producto</option>';
                        productos.forEach(function(producto) {
                            opciones += `<option value="${producto.Id}">${producto.Nombre}</option>`;
                        });
                        document.getElementById("product").innerHTML = opciones;

                        // Agregar evento change al select
                        document.getElementById("product").addEventListener("change", function() {
                            var idProducto = this.value;
                            cargarVentas(idProducto);
                        });
                    } else {
                        console.error("Error al cargar productos: " + peticion_http.status);
                    }
                }
            };

            peticion_http.open("GET", url, true);
            peticion_http.send();
        }

        function cargarVentas(idProducto) {
            var url = `../controlador/API.php?id=${idProducto}`;
            var peticion_http = new XMLHttpRequest();
            var producto = document.getElementById("product").value;

            peticion_http.onreadystatechange = function() {
                if (peticion_http.readyState === 4) {
                    if (peticion_http.status === 200) {
                        da = new DataAccess;
                        listaCompras = da.soldByProduct(productoActual);
                        listaCompras.forEach(key=>{
                            compras = (new DataAccess()).clientById(key["Id_Cliente"]);
                        });
                        document.getElementById("ventas").innerHTML = compras

                        /* 
                        var ventas = JSON.parse(peticion_http.responseText);
                        var tabla = `
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                            </tr>`;
                        ventas.forEach(venta=> {
                            console.log(venta)
                            tabla += `
                                <tr>
                                    <td>${venta["Id"]}</td>
                                    <td>${venta["Nombre"]}</td>
                                </tr>`;
                        });
                        document.getElementById("ventas").innerHTML = tabla; */
                    } else {
                        console.error("Error al cargar ventas: " + peticion_http.status);
                    }
                }
            };

            peticion_http.open("GET", url, true);
            peticion_http.send();
        }
    </script>

    <style>
        table {
            border: 1px black solid;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px black solid;
            padding: 5px;
            text-align: left;
        }
    </style>
</body>

</html>