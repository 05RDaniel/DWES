<?php
class Db
{
    private $connection;

    public function establishConnection($host, $user, $key, $db)
    {
        $this->connection = new mysqli($host, $user, $key, $db);
        if ($this->connection->connect_errno) return -1;
        else return 0;
    }
    public function allProducts()
    {
        $products = $this->dataQuery("SELECT * FROM Productos ORDER BY Nombre");
        return $products;
    }

    public function soldByProduct($actual)
    {
        $i = 0;
        $this->establishConnection("127.0.0.1", "rufes", "1234", "Pruebas");
        $products = $this->dataQuery("SELECT * FROM Productos WHERE Nombre = '" . $actual . "'");
        foreach ($products as $key) {
            $sales = $this->dataQuery("SELECT * FROM Compras WHERE Id_Producto = '" . $key["Id"] . "'");
            $i++;
        }
        return $sales;
    }

    public function clientById($id)
    {
        $client = $this->dataQuery("SELECT * FROM Cliente WHERE Id = $id");
        return $client;
    }

    public function productById($id)
    {
        $product = $this->dataQuery("SELECT * FROM Productos WHERE Id = $id");
        return $product;
    }

    public function closeConnection()
    {
        if ($this->connection) $this->connection->close();
    }

    public function dataQuery($sql)
    {
        $res = $this->connection->query($sql);
        if ($res === true) {
            return true;
        } elseif ($res) {
            return $res->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }
}
