<?php 
class Conexion {
  private static $instance;
  private $conexion;

  private function __construct($dbname){
    $this->conexion = new mysqli("localhost","root","180598",$dbname);
    if($this->conexion->connect_errno){
      die("Error de conexion (".$this->conexion->connect_errno.")".$this->conexion->connect_error);
    }
    $this->conexion->set_charset("UTF8");
  }

  public static function getInstance($dbname){
    if(!isset(self::$instance)){
      self::$instance = new Conexion($dbname);
    }
    return self::$instance;
  }

  public function getConexion(){ return $this->conexion; }

  public function __clone(){
    trigger_error("Este es un objeto único, no se puede clonar".E_USER_ERROR);
  }
}
?>