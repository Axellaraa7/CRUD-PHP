<?php
require_once("./db/Conexion.php");
require_once("./models/ConexionPHP.php");

$conexion = Conexion::getInstanceConexion("pruebasconexion")->getDatabase();

$objConPhp = new ConexionPHP($conexion);
$results = $objConPhp->getAll();
foreach($results as $row){
  var_dump($row);
}

?>
