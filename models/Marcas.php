<?php 
class Marcas{
  private $conexion, $table;

  public function __construct($conexion){
    $this->conexion = $conexion;
    $this->table = "catalogo_marcas";
  }

  public function getAll(){
    return $this->conexion->query("SELECT * FROM $this->table");
  }

  public function getAssocId(){
    $query = $this->conexion->query("SELECT * FROM $this->table");
    $arrAssocId = array();
    while ($row = $query->fetch_row()){
      $arrAssocId[$row[0]] = $row[1];
    }
    return $arrAssocId;
  }

  // public function getById($id){
  //   $query = $this->conexion->prepare("SELECT * FROM $this->table where id = ?");
  //   $query->bind_param("i",$id);
  //   if(!$query->execute()) return false;
  //   return $query->get_result();
  // }

  // public function insert($datos){
  //   $query = $this->conexion->prepare("INSERT INTO $this->table (marca,tipo_prenda,anio) VALUES (?,?,?)");
  //   $query->bind_param("iii",$datos["marca"],$datos["prenda"],$datos["anio"]);
  //   if(!$query->execute()) return false;
  //   return true;
  // }

  // public function update($datos){
    
  // }

  // public function delete($id){
  //   $query = $this->conexion->prepare("DELETE FROM $this->table WHERE id = ?");
  //   $query->bind_param("i",$id);
  //   if(!$query->execute()) return false;
  //   return true;
  // }
}