<?php
include_once "app/model/db.class.php";

class Categorias extends BaseDeDatos
{
  public function __construct()
  {
    parent::conectar();
  }

  public function getAll()
  {
    return $this->executeQuery("Select id_categoria,categoria from categorias order by id_categoria");
  }

  public function getCategoriaByName($name)
  {
    return $this->executeQuery("Select id_categoria,categoria from categorias where ='$name'");
  }

  public function getCategoriaByNameAndId($name, $id)
  {
    return $this->executeQuery("Select id_categoria,categoria from categorias where ='$name' and id_categoria<>'$id'");
  }

  public function save($data)
  {
    return $this->executeInsert("insert into categorias set categoria='{$data['categoria']}'");
  }

  public function update($data)
  {
    return $this->executeUpdate("update categorias set categoria='{$data['categoria']}' where id_categoria='{$data['id_categoria']}'");
  }

  public function getOneCategoria($id)
  {
    return $this->executeQuery("Select id_categoria,categoria from categorias where id_categoria='$id'");
  }

  public function deleteCategoria($id)
  {
    return $this->executeUpdate("delete from categorias where id_categoria='$id'");
  }
}
