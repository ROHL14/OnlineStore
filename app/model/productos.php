<?php
include_once "app/model/db.class.php";

class Productos extends BaseDeDatos
{
  public function __construct()
  {
    parent::conectar();
  }

  public function getAll()
  {
    return $this->executeQuery("
    Select a.*, b.categoria,c.marca from marcas c inner join (categorias b inner join productos a on b.id_categoria=a.id_categoria) on c.id_marca=a.id_marca");
  }

  public function getProductoByName($name)
  {
    return $this->executeQuery("
    Select id_producto,nombre_producto,precio_producto,descripcion,cantidad,imagen,id_categoria,id_marca
    from productos
    where nombre_producto='$name'");
  }

  public function getProductoByNameAndId($name, $id)
  {
    return $this->executeQuery("
    Select id_producto,nombre_producto,precio_producto,descripcion,cantidad,imagen,id_categoria,id_marca
    from productos
    where nombre_producto='$name' and id_producto<>'$id'");
  }

  public function save($data, $img)
  {
    return $this->executeInsert("insert into productos set nombre_producto='{$data['nombre_producto']}'
    ,precio_producto='{$data['precio_producto']}'
    ,descripcion='{$data['descripcion']}'
    ,cantidad='{$data['cantidad']}'
    ,imagen='{$img}'
    ,id_categoria='{$data['id_categoria']}'
    ,id_marca='{$data['id_marca']}'");
  }

  public function update($data, $img)
  {
    return $this->executeUpdate("update productos set nombre_producto='{$data['nombre_producto']}'
    ,precio_producto='{$data['precio_producto']}'
    ,decripcion='{$data['decripcion']}'
    ,cantidad='{$data['cantidad']}'
    ,imagen=if('{$img}'='',imagen,'{$img}')
    ,id_categoria='{$data['id_categoria']}'
    ,id_marca='{$data['id_marca']}'
    where id_producto='{$data['id_producto']}'");
  }

  public function getOneProducto($id)
  {
    return $this->executeQuery("
    Select a.*, b.categoria,c.marca from marcas c inner join (categorias b inner join productos a on b.id_categoria=a.id_categoria) on c.id_marca=a.id_marca
    where id_producto='$id'");
  }

  public function deleteProducto($id)
  {
    return $this->executeUpdate("delete from productos where id_producto='$id'");
  }

  public function getAllCategorias()
  {
    return $this->executeQuery("Select * from categorias");
  }

  public function getAllMarcas()
  {
    return $this->executeQuery("Select * from marcas");
  }
}
