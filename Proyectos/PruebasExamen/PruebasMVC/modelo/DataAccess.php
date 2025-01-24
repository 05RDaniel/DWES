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

    public function soldByProduct($actual){
        $db = new DataBase();
        $i=0;
        $db->establishConnection("127.0.0.1", "rufes", "1234", "Pruebas");
        $products = $db->dataQuery("SELECT * FROM Productos WHERE Nombre = '". $actual ."'");
        foreach ($products as $key){
            $sales = $db->dataQuery("SELECT * FROM Compras WHERE Id_Producto = '". $key["Id"] ."'");
            $i++;
        }
        $db->closeConnection();
        return $sales;
    }

    public function clientById($id){
        $db = new DataBase();
        $db->establishConnection("127.0.0.1", "rufes", "1234", "Pruebas");
        $client = $db->dataQuery("SELECT * FROM Cliente WHERE Id = $id");
        $db->closeConnection();
        return $client;
    }
    
    public function productById($id){
        $db = new DataBase();
        $db->establishConnection("127.0.0.1", "rufes", "1234", "Pruebas");
        $product = $db->dataQuery("SELECT * FROM Productos WHERE Id = $id");
        $db->closeConnection();
        return $product;
    }
}
