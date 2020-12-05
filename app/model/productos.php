<?php
include_once "app/model/db.class.php";
class Productos extends BaseDeDatos {
	public function __construct() {
		parent::conectar();
	}

	public function getAll() {
		return $this->executeQuery("
    Select a.*, b.categoria,c.marca from marcas c inner join (categorias b inner join productos a on b.id_categoria=a.id_categoria) on c.id_marca=a.id_marca");
	}

	public function getProductoByCategory($id) {
		return $this->executeQuery("Select a.*, b.categoria,c.marca from marcas c inner join (categorias b inner join productos a on b.id_categoria=a.id_categoria) on c.id_marca=a.id_marca where b.id_categoria='$id'");
	}

	public function getOneProductoByID($id) {
		return $this->executeQuery("Select a.*, b.categoria,c.marca from marcas c inner join (categorias b inner join productos a on b.id_categoria=a.id_categoria) on c.id_marca=a.id_marca where a.id_marca='$id'");
	}

	public function getAllCategorias() {
		return $this->executeQuery("Select * from categorias");
	}

	public function getAllMarcas() {
		return $this->executeQuery("Select * from marcas");
	}

	public function save($data,$img) {
		return $this->executeInsert("insert into productos set nombre_producto='{$data['nombre_producto']}', descripcion='{$data['descripcion']}', id_categoria='{$data['id_categoria']}', id_marca='{$data['id_marca']}', imagen='{$img}', precio_producto='{$data['[precio_producto']}'");
	}

	public function update($data,$img) {
		return $this->executeUpdate("update productos set nombre_producto='{$data['nombre_producto']}', descripcion='{$data['descripcion']}', id_categoria='{$data['id_categoria']}', id_marca='{$data['id_marca']}', imagen=if('$img',imagen,'$img'), precio_producto='{$data['precio_producto']}' where id_producto='{$data['id_producto']}'");
	}

	public function getProductoByName($nombre_producto) {
		return $this->executeQuery("Select * from productos where nombre_producto='$nombre_producto'");
	}

	public function getProductoByNameAndId($nombre_producto,$id) {
		return $this->executeQuery("Select * from productos where nombre_producto='$nombre_producto' and id_producto<>'$id'");
	}

	public function getOneProducto($id) {
		return $this->executeQuery("Select * from productos where id_producto='$id'");
	}

	public function deleteProducto($id) {
		return $this->executeUpdate("delete from productos where id_producto='$id'");
	}

	
}

?>