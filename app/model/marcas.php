<?php
include_once "app/model/db.class.php";
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