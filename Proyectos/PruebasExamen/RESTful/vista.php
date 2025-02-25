<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Listar un Producto</title>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <style>
      table,
      th,
      td {
         border: 1px solid black;
         border-collapse: collapse;
      }

      th,
      td {
         padding: 10px;
      }
   </style>
</head>

<body>


   <button onclick="GET()">Get TODOS</button>


   <div id="mostrar">

   </div>

</body>
<!-- AJAX -->
<script>
   var id = document.getElementById("lista");
   var mostrar = document.getElementById("mostrar");

   // Funcion para generar la tabla

   function GET() {
      $.ajax({
         url: './api.php',
         type: 'GET',
         contentType: 'application/json',
         dataType: '',
         success: function(data) {
            var tabla = "<table>";
            tabla += "<tr><th>ID</th><th>Nombre</th><th>Precio</th></tr>";
            data = JSON.parse(data)
            console.log(data); // Verifica si es un objeto o un array

            if (data) {
               data.forEach(function(datos) {
                  tabla += "<tr><td>" + datos.Id + "</td><td>" + datos.Nombre + "</td><td>" + datos.Precio + "</td></tr>";
               });
               tabla += "</table>";
               mostrar.innerHTML = tabla;
            } else {
               mostrar.innerHTML = "No hay productos registrados";
            }
         },
         error: function() {
            console.log("Error en la petición.");
         }
      });
   }
</script>

</html>