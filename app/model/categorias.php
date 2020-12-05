<?php
include_once "app/model/db.class.php";
<<<<<<< HEAD
class Categorias extends BaseDeDatos {
	public function __construct() {
		parent::conectar();
	}

	public function getAll() {
		return $this->executeQuery("Select * from categorias order by id_categoria");
	}

	public function save($data,$img) {
		return $this->executeInsert("insert into categorias set categoria='{$data['categoria']}'");
	}

	public function update($data,$img) {
		return $this->executeUpdate("update categorias SET categoria='{$data['categoria']}' where id_categoria='{$data['id_categoria']}'");
	}

	public function getCategoriaByName($categoria) {
		return $this->executeQuery("Select * from categorias where categoria='$categoria'");
	}

	public function getCategoriaByNameAndId($categoria,$id) {
		return $this->executeQuery("Select * from categorias where categoria='$categoria' and id_categoria<>'$id'");
	}

	public function getOneCategoria($id) {
		return $this->executeQuery("Select * from categorias where id_categoria='$id'");
	}

	public function deleteCategoria($id) {
		return $this->executeUpdate("delete from categorias where id_categoria='$id'");
	}
}

?>
=======

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
>>>>>>> d86b544e6b0a62572fe7546a5dc0aeec08217e9e
