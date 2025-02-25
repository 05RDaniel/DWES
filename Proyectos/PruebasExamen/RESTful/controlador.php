<?php
 
 include('../modelo/db.php');  
 $m = new DB();  
  
$articulos = $m->getAll();  

include_once("../vista/vista.php");
?>