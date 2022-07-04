<?php 
class ConexionPHP{
  private $conexion, $table;

  public function __construct($conexion){
    $this->conexion = $conexion;
    $this->table = "conexionphp";
  }

  public function getAll(){
    return $this->conexion->query("SELECT * FROM $this->table");
  }

  public function getById($id){
    $query = $this->conexion->prepare("SELECT * FROM $this->table where id = ?");
    $query->bind_param("i",$id);
    if(!$query->execute()) return false;
    return $query->get_result()->fetch_assoc();
  }

  public function insert($datos){
    $query = $this->conexion->prepare("INSERT INTO $this->table (marca,tipo_prenda,anio) VALUES (?,?,?)");
    $query->bind_param("iii",$datos["marca"],$datos["tipo_prenda"],$datos["anio"]);
    if(!$query->execute()) return false;
    return true;
  }

  public function update($datos){
    $query = $this->conexion->prepare("UPDATE $this->table SET marca = ?, tipo_prenda = ?, anio = ? WHERE id = ?");
    $query->bind_param("iiii",$datos["marca"],$datos["tipo_prenda"],$datos["anio"],$datos["id"]);
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