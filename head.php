<?php
require_once("./db/Conexion.php");
require_once("./models/ConexionPHP.php");
require_once("./models/Marcas.php");
require_once("./models/Prendas.php");

function limpiarDatos($arr){
  $datos = array();
  foreach($arr as $key=>$value){
    $datos[$key] = pg_escape_string($value);
  }
  return $datos;
}
$conexion = Conexion::getInstance("pruebasconexion")->getConexion();
$objConPhp = new ConexionPHP($conexion);
$objMarcas = new Marcas($conexion);
$objPrendas = new Prendas($conexion);
$arrAssocMarcas = $objMarcas->getAssocId();
$arrAssocPrendas = $objPrendas->getAssocId();
$arrayMarcas = $objMarcas->getAll();
$arrayPrendas = $objPrendas->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Document</title>
</head>
<body class="font-mono">
  <header class="flex justify-between items-center p-6 bg-gray-800">
    <h1 class="text-slate-50 font-black text-2xl">SIMPLE CRUD</h1>
    <nav>
      <ul class="flex justify-even items-center p-1 gap-x-3">
      <li><a href="consulta.php" class="text-slate-50 px-4 py-2 bg-orange-700 hover:bg-orange-500 rounded-md">Consultar Registros</a></li>
        <li><a href="insertar.php" class="text-slate-50 px-4 py-2 bg-orange-700 hover:bg-orange-500 rounded-md">Insertar registro</a></li>
      </ul>
    </nav>
  </header>