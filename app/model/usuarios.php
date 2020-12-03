<?php
include_once "app/models/db.class.php";

class Usuarios extends BaseDeDatos
{
  public function __construct()
  {
    parent::conectar();
  }

  public function getAll()
  {
    return $this->executeQuery("
    Select id_usuario,nombres,apellidos,user_name,
     from usuarios
    order by id_usuario");
  }

  public function getUserByName($name)
  {
    return $this->executeQuery("
    Select id_usuario,nombres,apellidos,user_name,
     from usuarios
    where user_name='$name'");
  }

  public function getUserByNameAndId($name, $id)
  {
    return $this->executeQuery("
    Select id_usuario,nombres,apellidos,user_name,
     from usuarios
    where user_name='$name' and id_usuario<>'$id'");
  }

  public function save($data, $img)
  {
    return $this->executeInsert("insert into usuarios set user_name='{$data['user_name']}'
    ,password=md5('{$data['password']}'),nombres='{$data['nombres']}'
    ,apellidos='{$data['apellidos']}'");
  }

  public function update($data, $img)
  {
    return $this->executeUpdate("update usuarios set user_name='{$data['user_name']}'
    ,password=if('{$data['password']}'='',password,md5('{$data['password']}')),nombres='{$data['nombres']}'
    ,apellidos='{$data['apellidos']}'
    where id_usuario='{$data['id_usuario']}'");
  }

  public function getOneUser($id)
  {
    return $this->executeQuery("
    Select id_usuario,nombres,apellidos,user_name,
    from usuarios
    where id_usuario='$id'");
  }

  public function deleteUser($id)
  {
    return $this->executeUpdate("delete from usuarios where id_usuario='$id'");
  }
}
