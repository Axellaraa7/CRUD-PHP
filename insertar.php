<?php 
require_once("./head.php");
$crud = "insert";

if(isset($_GET["id"])){
  $datos = limpiarDatos($_GET);
  $infoCon = $objConPhp->getById($datos["id"]);
  $crud = "update";
}
?>
<main class="flex justify-center align-center py-10">
  <form action="./consulta.php" method="post" class="container shadow-xl shadow-gray-400">
    <div class="flex flex-col p-5 gap-y-4 ">
      <label for="marca">Selecciona la marca</label>
      <select class="p-2" name="marca" id="marca">
      <?php while($row = $arrayMarcas->fetch_row()){ 
        if(isset($infoCon) && $infoCon["marca"] == $row[0]){ ?>
          <option value="<?php echo $row[0]; ?>" selected><?php echo $row[1]; ?></option>
        <?php }else{ ?>
          <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
      <?php } 
      }
      ?>
      </select>
    </div>
    <div class="flex flex-col p-5 gap-y-4 ">
      <label for="tipo_prenda">Selecciona el tipo de prenda</label>
      <select class="p-2" name="tipo_prenda" id="tipo_prenda">
        <?php while($row = $arrayPrendas->fetch_row()){
          if(isset($infoCon) && $infoCon["tipo_prenda"] == $row[0]){ ?>
            <option value="<?php echo $row[0]; ?>" selected><?php echo $row[1]; ?></option>
          <?php }else{ ?>
          <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
        <?php }
        } ?>
      </select>
    </div>
    <div class="flex flex-col p-5 gap-y-4 ">
      <label for="anio">Año de lanzamiento</label>
      <input class="p-2 border-2 border-green-800 focus:outline-none focus:outline-offset-0 focus:outline-2 focus:outline-green-800" type="number" name="anio" id="anio" min="1850" max="2099" value="<?php echo (isset($infoCon)) ? $infoCon["anio"] : 2022; ?>">
    </div>
    <div class="flex justify-end p-5 gap-4">
    <?php if(isset($infoCon)) echo "<input type='hidden' name='id' id='id' value='".$infoCon['id']."'>"; ?> 
      <button type="submit" value="<?php echo $crud; ?>" name="crud" class="bg-green-500 hover:bg-green-400 px-4 py-2 rounded-md">Registrar</button>
      <button type="reset" class="bg-stone-800 hover:bg-stone-700 px-4 py-2 rounded-md text-white">Limpiar</button>
    </div>
  </form>
</main>