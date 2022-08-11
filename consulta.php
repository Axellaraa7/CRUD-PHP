<?php 
require_once("./head.php");

$claseExito = "border-green-700 bg-green-200 text-green-600";
$claseError = "border-red-700 bg-red-200 text-red-600";

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
  <?php if(isset($mensaje)){ 
    echo <<<SEC
      <section class="container mx-10 border-2 py-2 px-8 rounded-md $clase"> $mensaje </section>
    SEC;
  }
  ?>
  <section id="sectionTable" class="container flex justify-center items-center">
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
            <td class="px-5 py-2 border border-gray-800"><?php echo $arrAssocMarcas[$row[1]]; ?></td>
            <td class="px-5 py-2 border border-gray-800"><?php echo $arrAssocPrendas[$row[2]];?></td>
            <td class="px-5 py-2 border border-gray-800"><?php echo $row[3];?></td>
            <td class="px-5 py-2 border border-gray-800">
              <div class="flex justify-center align-center flex-wrap gap-1">
                <a href="./insertar.php?id=<?php echo $row[0] ?>" class="py-2 px-4 border-2 bg-teal-500 border-teal-500 rounded-md transition-all hover:bg-transparent hover:text-teal-700   ">EDIT</a>
                <form action="" method="post">
                  <input type="hidden" value="<?php echo $row[0]; ?>" id="id" name="id">
                  <button type="submit" name="crud" value="delete" class="py-2 px-4 border-2 bg-red-600 border-red-600 rounded-md transition-all hover:bg-transparent hover:text-red-600  ">DELETE</button>
                </form>
              </div>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </section>
</main>

<?php require_once("./footer.php"); ?>