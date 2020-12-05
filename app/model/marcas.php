<?php
include_once "app/model/db.class.php";
<<<<<<< HEAD
class Marcas extends BaseDeDatos {
	public function __construct() {
		parent::conectar();
	}

	public function getAll() {
		return $this->executeQuery("Select * from marcas order by id_marca");
	}

	public function save($data,$img) {
		return $this->executeInsert("insert into marcas set marca='{$data['marca']}'");
	}

	public function update($data,$img) {
		return $this->executeUpdate("update marcas set marca='{$data['marca']}' where id_marca='{$data['id_marca']}'");
	}

	public function getMarcaByName($marca) {
		return $this->executeQuery("Select * from marcas where marca='$marca'");
	}

	public function getMarcaByNameAndId($marca,$id) {
		return $this->executeQuery("Select * from marcas where nombre='$marca' and id_marca<>'$id'");
	}

	public function getOneMarca($id) {
		return $this->executeQuery("Select * from marcas where id_marca='$id'");
	}

	public function deleteMarca($id) {
		return $this->executeUpdate("delete from marcas where id_marca='$id'");
	}
}

?>
=======

class Marcas extends BaseDeDatos
{
  public function __construct()
  {
    parent::conectar();
  }

  public function getAll()
  {
    return $this->executeQuery("Select id_marca,marca from marcas order by id_marca");
  }

  public function getMarcaByName($name)
  {
    return $this->executeQuery("Select id_marca,marca from marcas where ='$name'");
  }

  public function getMarcaByNameAndId($name, $id)
  {
    return $this->executeQuery("Select id_marca,marca from marcas where ='$name' and id_marca<>'$id'");
  }

  public function save($data)
  {
    return $this->executeInsert("insert into marcas set marca='{$data['marca']}'");
  }

  public function update($data)
  {
    return $this->executeUpdate("update marcas set marca='{$data['marca']}' where id_marca='{$data['id_marca']}'");
  }

  public function getOneMarca($id)
  {
    return $this->executeQuery("Select id_marca,marca from marcas where id_marca='$id'");
  }

  public function deleteMarca($id)
  {
    return $this->executeUpdate("delete from marcas where id_marca='$id'");
  }
}
>>>>>>> d86b544e6b0a62572fe7546a5dc0aeec08217e9e
