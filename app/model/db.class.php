<?php
class BaseDeDatos
{
  protected $conexion;
  protected $isConeccted;

  public function conectar()
  {
    $this->conexion = new mysqli(
      "localhost",
      "user_store",
      "catolica",
      "OnlineStore"
    );

    if ($this->conexion->connect_errno) {
      echo "Error de conexion: {$this->conexion->connect_error}";
      $this->isConnected = false;
    } else {
      $this->isConnected = true;
    }
    return $this->isConnected;
  }
}
