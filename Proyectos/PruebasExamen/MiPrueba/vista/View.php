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
        // URL base de la API
        const API_URL = "../controlador";

        // Cargar productos al cargar la página
        document.addEventListener("DOMContentLoaded", function () {
            fetch(`${API_URL}/Controller.php`) // Ruta para obtener todos los productos
                .then(response => {
                    if (!response.ok) throw new Error("Error al cargar los productos");
                    return response.json();
                })
                .then(data => {
                    const select = document.getElementById("product");
                    data.forEach(product => {
                        const option = document.createElement("option");
                        option.value = product.Id; // Suponiendo que "Id" es la clave del producto
                        option.textContent = product.Nombre; // Suponiendo que "Nombre" es el nombre del producto
                        select.appendChild(option);
                    });
                })
                .catch(error => console.error("Error al cargar productos: ", error));
        });

        // Manejar el cambio en el select
        document.getElementById("product").addEventListener("change", function () {
            const productoId = this.value;
            if (!productoId) {
                alert("Por favor, seleccione un producto válido.");
                return;
            }

            // Realizar la solicitud para obtener las ventas del producto seleccionado
            fetch(`${API_URL}/Controller.php?id=${productoId}`)
                .then(response => {
                    if (!response.ok) throw new Error("Error al cargar las ventas del producto");
                    return response.json();
                })
                .then(data => {
                    const ventasTable = document.getElementById("ventas");
                    ventasTable.innerHTML = generarTabla(data);
                })
                .catch(error => console.error("Error al cargar las ventas: ", error));
        });

        // Generar tabla a partir de datos JSON
        function generarTabla(data) {
            if (data.error) {
                return `<p>${data.error}</p>`;
            }

            let html = `<table>
                            <tr>
                                <th>ID Venta</th>
                                <th>Producto</th>
                                <th>Fecha</th>
                                <th>Cantidad</th>
                            </tr>`;
            data.forEach(venta => {
                html += `<tr>
                            <td>${venta.id}</td>
                            <td>${venta.producto}</td>
                            <td>${venta.fecha}</td>
                            <td>${venta.cantidad}</td>
                         </tr>`;
            });
            html += "</table>";
            return html;
        }
    </script>

    <style>
        table {
            border: 1px black solid;
            border-collapse: collapse;
            width: 100%;
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
