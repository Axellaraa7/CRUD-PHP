<?php 
class Conexion {
  private static $instance;
  private $conexion, $dbInfo;

  private function __construct(){
    $this->dbInfo = require_once(realpath(__DIR__ . "/../config.php"));
    $this->conexion = new mysqli($this->dbInfo["host"],$this->dbInfo["user"],$this->dbInfo["psw"],$this->dbInfo["dbname"]);
    if($this->conexion->connect_errno){
      die("Error de conexion (".$this->conexion->connect_errno.")".$this->conexion->connect_error);
    }
    $this->conexion->set_charset($this->dbInfo["charset"]);
  }

  public static function getInstance(){
    if(!isset(self::$instance)){
      self::$instance = new Conexion();
    }
    return self::$instance;
  }

  public function getConexion(){ return $this->conexion; }

  public function __clone(){
    trigger_error("Este es un objeto único, no se puede clonar".E_USER_ERROR);
  }
}
?>