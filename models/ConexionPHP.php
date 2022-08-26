<?php 
class ConexionPHP{
  private $conexion, $table;

  public function __construct($conexion){
    $this->conexion = $conexion;
    $this->table = "clothes_crud";
  }

  public function getAll(){
    return $this->conexion->query("SELECT * FROM $this->table ORDER BY ID");
  }

  public function getById($id){
    $query = $this->conexion->prepare("SELECT * FROM $this->table where id = ?");
    $query->bind_param("i",$id);
    if(!$query->execute()) return false;
    return $query->get_result()->fetch_assoc();
  }

  public function insert($datos){
    $query = $this->conexion->prepare("INSERT INTO $this->table (brand_id,clothing_id,releasing) VALUES (?,?,?)");
    $query->bind_param("iii",$datos["brand"],$datos["clothing"],$datos["releasing"]);
    if(!$query->execute()) return false;
    return true;
  }

  public function update($datos){
    $query = $this->conexion->prepare("UPDATE $this->table SET brand_id = ?, clothing_id = ?, releasing = ? WHERE id = ?");
    $query->bind_param("iiii",$datos["brand"],$datos["clothing"],$datos["releasing"],$datos["id"]);
    if(!$query->execute()) return false;
    return true;
  }

  public function delete($id){
    $query = $this->conexion->prepare("DELETE FROM $this->table WHERE id = ?");
    $query->bind_param("i",$id);
    if(!$query->execute()) return false;
    return true;
  }
}
?>