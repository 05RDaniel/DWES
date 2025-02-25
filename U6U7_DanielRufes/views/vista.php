<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Matrículas</title>
    <script src="../js/jquery-3.6.0.min.js"></script> <!-- Incluimos jQuery si lo vamos a utilizar -->
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>

    <h1>Gestión de Matrículas</h1>

    <!-- Desplegables para elegir alumno y asignatura -->
    <label for="alumno">Seleccionar Alumno:</label>
    <select id="alumno">
        <!-- Rellena los alumnos a partir de una llamada AJAX -->
        <!-- <option value="1001">Juan Pérez Gómez</option> -->
    </select>

    <label for="asignatura">Seleccionar Asignatura:</label>
    <select id="asignatura">
        <!-- Rellena las asignaturas a partir de una llamada AJAX -->
        <!-- <option value="101">Matemáticas</option> -->
    </select>

    <button id="matricular">Matricular</button>

    <h2>Lista de Matrículas</h2>
    <ul id="matriculas-lista">
        <!-- Rellena las matrículas a partir de una llamada AJAX -->
        <!-- 
            <li>
                1001 - Juan Pérez Gómez - Matemáticas (2025)
                <button class="eliminar-matricula" data-nia="1001" data-codigo="101">Eliminar</button>
            </li>
        -->
    </ul>

</body>
<script>
    window.onload = function() {
        getAllStudents();
        getAllSubjects();
    }
    boton = document.getElementById("matricular")
    boton.addEventListener("click",function () {
        insertMatricula();
    })

    function getAllStudents() {
        tabla = "alumnos"
        $.ajax({
            url: './Api.php?tabla='+tabla,
            type: 'GET',
            contentType: 'application/json',
            success: function(response) {
                console.log(response)
                /* alumnos = JSON.parse(response)
                alumnos.forEach(element => {
                    show += "<option value="+element["codigo"]+">"+element["nombre"]+"</option>";
                });
                document.getElementById("alumno").innerHTML = show */
            },
            error: function(xhr, nsq, error, response) {
                console.log(error)
            }
        })
    }

    function getAllSubjects() {
        tabla = "asignaturas"
        $.ajax({
            url: './Api.php?tabla='+tabla,
            type: 'GET',
            contentType: 'application/json',
            success: function(response) {
                console.log(response)
                /* asignaturas = JSON.parse(response)
                asignaturas.forEach(element => {
                    show += "<option value="+element["codigo"]+">"+element["nombre"]+"</option>";
                });
                document.getElementById("asignatura").innerHTML = show */
            },
            error: function(xhr, nsq, error, response) {
                console.log(error)
            }
        })
    }

    function insertMatricula() {
        datos = {
            nia: "1",
            codigo: "1",
            año: "2000"
        }
        $.ajax({
            url: './Api.php',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(datos),
            dataType: '',
            success: function(response) {
                console.log((response))
            },
            error: function(xhr, nsq, error, response) {
                console.log(xhr + " - " + nsq + " - " + error + " - " + response)
            }
        })
    }

    
</script>

</html>