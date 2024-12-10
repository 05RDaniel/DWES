<?php
include ("DataBase.php");
class DataAccess
{
    public function allProducts()
    {
        $db = new DataBase();
        $db->establishConnection("127.0.0.1", "rufes", "1234", "Pruebas");
        $products = $db->dataQuery("SELECT * FROM Productos ORDER BY Nombre");
        $db->closeConnection();
        return $products;
    }
}
