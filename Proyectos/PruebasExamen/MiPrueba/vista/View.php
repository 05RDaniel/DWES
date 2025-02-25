<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos y Ventas</title>
    <script src="../js/jquery-3.6.0.min.js"></script>
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

    <button onclick="enviarDatos(this.value)">Enviar</button>

    <script>
        window.onload = function() {
            cargarProductos();
        };

        function cargarProductos() {
            $.ajax({
                url: '../controlador/API.php',
                type: 'GET',
                contentType: 'application/json',
                success: function(data) {
                    select = document.getElementById("product")
                    options = "<option>Seleccione un producto</option>"
                    data = JSON.parse(data)
                    if (data) {
                        data.forEach(function(datos) {
                            options += "<option>" + datos.Nombre + "</option>"
                        })
                        select.innerHTML = options
                    }
                },
                error: function() {}
            })
        }

        function enviarDatos() {
            let datos = {
                nombre: "Algo",
                precio: 100
            };

            $.ajax({
                url: '../controlador/API.php',
                type: 'POST',
                data: JSON.stringify(datos),
                contentType: 'application/json',
                dataType: 'json',
                success: function(response) {
                    console.log("Respuesta del servidor:", response);
                    alert(response);
                },
                error: function(error) {
                    console.error("Error en la petición:", error);
                    alert("Error al enviar los datos");
                }
            });
        }






        function cargarProductos2() {
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

        function cargarVenta2(idProducto) {
            var url = `../controlador/API.php?id=${idProducto}`;
            var peticion_http = new XMLHttpRequest();
            var producto = document.getElementById("product").value;

            peticion_http.onreadystatechange = function() {
                if (peticion_http.readyState === 4) {
                    if (peticion_http.status === 200) {
                        var da = new DataAccess;
                        listaCompras = da.soldByProduct(productoActual);
                        listaCompras.forEach(key => {
                            compras = (new DataAccess()).clientById(key["Id_Cliente"]);
                        });
                        document.getElementById("ventas").innerHTML = compras

                        var ventas = JSON.parse(peticion_http.responseText);
                        var tabla = `
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                            </tr>`;
                        ventas.forEach(venta => {
                            console.log(venta)
                            tabla += `
                                <tr>
                                    <td>${venta["Id"]}</td>
                                    <td>${venta["Nombre"]}</td>
                                </tr>`;
                        });
                        document.getElementById("ventas").innerHTML = tabla;
                    } else {
                        console.error("Error al cargar ventas: " + peticion_http.status);
                    }
                }
            };

            peticion_http.open("GET", url, true);
            peticion_http.send();
        }

        function cargarVentas2(idProducto) {
            var url = `../controlador/API.php?soldByProduct=${idProducto}`;
            var peticion_http = new XMLHttpRequest();

            peticion_http.onreadystatechange = function() {
                if (peticion_http.readyState === 4) {
                    if (peticion_http.status === 200) {
                        var ventas = JSON.parse(peticion_http.responseText);
                        window.alert(ventas)
                        if (ventas.error) {
                            console.error("Error:", ventas.error);
                            return;
                        }

                        // Crear la tabla con los datos de ventas
                        var tabla = `
                    <tr>
                        <th>ID Compra</th>
                        <th>Producto</th>
                        <th>Cliente</th>
                    </tr>`;

                        ventas.forEach(venta => {
                            tabla += `
                        <tr>
                            <td>${venta["Id"]}</td>
                            <td>${venta["Nombre"]}</td>
                            <td id="cliente-${venta["Id_Cliente"]}">Cargando...</td>
                        </tr>`;

                            // Llamar a la API para obtener los datos del cliente
                            cargarCliente(venta["Id_Cliente"]);
                        });

                        document.getElementById("ventas").innerHTML = tabla;
                    } else {
                        console.error("Error al cargar ventas: " + peticion_http.status);
                    }
                }
            };

            peticion_http.open("GET", url, true);
            peticion_http.send();
        }

        function cargarCliente2(idCliente) {
            var url = `../controlador/API.php?clientById=${idCliente}`;
            var peticion_http = new XMLHttpRequest();

            peticion_http.onreadystatechange = function() {
                if (peticion_http.readyState === 4) {
                    if (peticion_http.status === 200) {
                        var cliente = JSON.parse(peticion_http.responseText);
                        if (cliente.error) {
                            console.error("Error:", cliente.error);
                            return;
                        }

                        // Actualizar la celda correspondiente con el nombre del cliente
                        document.getElementById(`cliente-${idCliente}`).innerText = cliente.Nombre;
                    } else {
                        console.error("Error al cargar cliente: " + peticion_http.status);
                    }
                }
            };

            peticion_http.open("GET", url, true);
            peticion_http.send();
        }






        function enviarDatos2() {
            var url = "../controlador/API.php"; // Endpoint para enviar datos
            var peticion_http = new XMLHttpRequest();
            var datos = JSON.stringify({
                nombre: "Pepe",
                precio: 1
            });

            peticion_http.onreadystatechange = function() {
                if (peticion_http.readyState === 4) {
                    if (peticion_http.status === 200) {
                        console.log("Respuesta del servidor:", peticion_http.responseText);
                        alert("Datos enviados correctamente.");
                    } else {
                        console.error("Error al enviar datos: " + peticion_http.status);
                    }
                }
            };

            peticion_http.open("POST", url, true);
            peticion_http.setRequestHeader("Content-Type", "application/json");
            peticion_http.send(datos);
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