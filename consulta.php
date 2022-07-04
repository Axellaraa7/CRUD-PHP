<?php 
require_once("./head.php");

$claseExito = "border-green-800 bg-green-200 text-green-600";
$claseError = "border-red-800 bg-red-200 text-red-600";

if(isset($_POST["crud"])){
  switch($_POST["crud"]){
    case "insert":
      $exito = $objConPhp->insert($_POST);
      $mensaje = ($exito) ? "Se registró 1 producto" : "No se registró el producto";
      $clase = ($exito) ?  $claseExito : $claseError;
      break;
    case "update":
      $exito = $objConPhp->update($_POST);
      $mensaje = ($exito) ? "Se actualizó un producto" : "No se actualizó el producto";
      $clase = ($exito) ? $claseExito : $claseError;
      break;
    case "delete":
      $exito = $objConPhp->delete($_POST["id"]);
      $mensaje = ($exito) ? "Se eliminó el producto" : "No se eliminó el producto";
      $clase = ($exito) ? $claseExito : $claseError;
      break;
  }
}

$results = $objConPhp->getAll();

?>
<main class="flex flex-wrap justify-center items-center gap-y-4 py-10">
  <?php if(isset($mensaje)){ ?>
    <section class="container border-2 py-2 px-8 <?php echo $clase ?>">
    <?php  echo $mensaje ?>
    </section>
  <?php } ?>
  <section id="sectionTable" class="flex justify-center items-center container">
    <table class="text-center border border-gray-800 table-fixed ">
      <thead>
        <tr class="bg-gray-800 text-slate-50">
          <th class="px-10 py-2 border border-gray-800">Marca</th>
          <th class="px-10 py-2 border border-gray-800">Prenda</th>
          <th class="px-10 py-2 border border-gray-800">Año</th>
          <th class="px-10 py-2 border border-gray-800">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $results->fetch_row()){ ?>
          <tr>
            <td class="px-10 py-2 border border-gray-800"><?php echo $arrAssocMarcas[$row[1]]; ?></td>
            <td class="px-10 py-2 border border-gray-800"><?php echo $arrAssocPrendas[$row[2]];?></td>
            <td class="px-10 py-2 border border-gray-800"><?php echo $row[3];?></td>
            <td class="flex justify-center px-10 py-2 border border-gray-800">
              <a href="./insertar.php?id=<?php echo $row[0] ?>" class="bg-teal-500 hover:bg-teal-300 py-2 px-4 mx-2 rounded-md">EDIT</a>
              <form action="" method="post">
                <input type="hidden" value="<?php echo $row[0]; ?>" id="id" name="id">
                <button type="submit" name="crud" value="delete" class="bg-red-600 hover:bg-red-400 py-2 px-4 mx-2 rounded-md">DELETE</button>
              </form>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </section>
</main>