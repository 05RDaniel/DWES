<?php

class DB{
    public static function crearConexion(){
        $db = new mysqli("127.0.0.1", "rufes", "1234", "Pruebas");
        if($db->connect_error){
            die('Error al conectar: '.$db->connect_error);
        }
        return $db;
    }
    public static function GET(){
        $db = new mysqli("127.0.0.1", "rufes", "1234", "Pruebas");
        $res = $db->query("SELECT * FROM Productos");
        return $res;
        $db->close();

    }
    public static function GETuno($id){
        $db = new mysqli("127.0.0.1", "rufes", "1234", "Pruebas");
        $res =$db->query("SELECT * FROM Productos WHERE id = '$id'");
        return $res;
        $db->close();

    }
    public static function POST($n,$p,$d){
        $db = new mysqli("127.0.0.1", "rufes", "1234", "Pruebas");
        $res = $db->query("INSERT INTO Productos (Nombre, Precio) VALUES ('$n','$p','$d')");
        return $res;
        $db->close();
    }
    public static function PUT($n,$p,$d,$id){
        $db = new mysqli("127.0.0.1", "rufes", "1234", "Pruebas");
        $res = $db->query("UPDATE Productos SET Nombre='$n', Precio='$p', WHERE id=$id");
        return $res;
        $db->close();
    }   

    public static function PATCH($n,$v,$id){
        $db = new mysqli("127.0.0.1", "rufes", "1234", "Pruebas");
        $res = $db->query("UPDATE Productos SET $n = '$v' WHERE id='$id' ");
        return $res;
        $db->close();
    }
    public static function DELETE($id){
        $db = new mysqli("127.0.0.1", "rufes", "1234", "Pruebas");
        $res = $db->query("DELETE FROM Productos WHERE id=$id");
        return $res;
        $db->close();
    }   

    public static function getAll()
    {
      $db = new mysqli("127.0.0.1", "rufes", "1234", "Pruebas");
      $res=$db->query("Select * from Productos");
  
      $articles = array();
      while ($row = $res->fetch_array())  {
          $articles[] = $row;
      }
      $db->close();
      return $articles;
    }


}

?>