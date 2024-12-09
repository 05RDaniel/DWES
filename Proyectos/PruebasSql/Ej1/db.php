    <?php
    class Pruebas
    {

        private $conexion;

        function createConnection($host, $user, $key, $db)
        {
            $this->conexion = new mysqli($host, $user, $key, $db);
        }
        function showProducts()
        {
            $finish = "";
            $ssql = "SELECT * FROM Productos ORDER BY Nombre";
            if ($result = $this->conexion->query($ssql)) {
                while ($row = $result->fetch_assoc()) {
                    $finish .= "<option value=" . $row["Id"] . ">" . $row["Nombre"] . "</option>";
                }
                $result->free();
            } else {
                $finish = "<p>Error al realizar la consulta: " . $this->conexion->error . "</p>";
            }
            return $finish;
        }

        function showSalesClient($idClient)
        {
            $finish = "";
            $i = 0;
            $ssql = "SELECT * FROM Compras WHERE Id_Producto=" . $idClient;
            if ($result = $this->conexion->query($ssql)) {
                while ($row = $result->fetch_assoc()) {
                    $cliente = $this->conexion->query("SELECT Nombre FROM Cliente WHERE Id=" . $row["Id_Cliente"])->fetch_assoc()["Nombre"];
                    $finish .= "<tr><td>" . $cliente . "</td><td>" . $row["Fecha"] . "</td><td>" . $row["Cantidad"] . "</td</tr>";
                    $i = 1;
                }
                $result->free();
            } else {
                echo "<p>Error al realizar la consulta: " . $this->conexion->error . "</p>";
            }
            $finish = "<tr><th>Cliente</th><th>Fecha</th><th>Cantidad vendida</th></tr>" . $finish;
            $i == 0 ? $finish = "<tr><td>No hay ventas registradas</td></tr>" : null;
            return $finish;
        }

        function showProduct($idProduct){
            $finish = $this->conexion->query("SELECT Nombre FROM Productos WHERE Id=" . $idProduct)->fetch_assoc()["Nombre"];
            return $finish;
        }

        function closeConnection() {
            if ($this->conexion) $this->conexion->close();
          }
    }
    ?>