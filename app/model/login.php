<?php
include_once "app/model/db.class.php";
class Login extends BaseDeDatos
{
  public function __construct()
  {
    parent::conectar();
  }

  public function validarLogin($user, $pass)
  {
    $result = $this->conexion->query(
      "Select * from usuarios where user_name='$user' and password=md5('$pass')"
    );

    //return $result->fetch_assoc();

    if ($record = $result->fetch_assoc()) {
      return $record;
    } else {
      return false;
    }
  }
}
