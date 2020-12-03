<?php
include_once "app/model/productos.php";
class ProductosController extends Controller
{
  private $producto;
  public function __construct($param)
  {
    $this->producto = new Productos();
    parent::__construct("productos", $param);
  }

  public function getAll()
  {
    $records = $this->producto->getAll();
    $info = array(
      'success' => true,
      'records' => $records
    );

    echo json_encode($info);
  }

  public function getAllCategorias()
  {
    $records = $this->producto->getAllCategorias();
    $info = array('success' => true, 'records' => $records);
    echo json_encode($info);
  }

  public function getAllMarcas()
  {
    $records = $this->producto->getAllMarcas();
    $info = array('success' => true, 'records' => $records);
    echo json_encode($info);
  }

  public function save()
  {
    $img = "";
    if (isset($_FILES["foto"])) {
      if (is_uploaded_file($_FILES["foto"]["tmp_name"])) {
        if (($_FILES["foto"]["type"] == "image/png") || ($_FILES["foto"]["type"] == "image/jpeg")) {
          copy($_FILES["foto"]["tmp_name"], __DIR__ . "/../../public/fotos/" . $_FILES["foto"]["name"]) or die("No se pudo guardar archivo");
          $img = URL . "public/fotos/" . $_FILES["foto"]["name"];
        } else {
          $img = "";
        }
      }
    }
    if ($_POST["id_producto"] == "0") {
      if (count($this->producto->getProductoByName($_POST["producto"])) > 0) {
        $info = array('success' => false, 'msg' => 'El producto ya existe');
      } else {
        $records = $this->producto->save($_POST, $img);
        $info = array('success' => true, 'msg' => 'Registro guardado con exito');
      }
    } else {
      if (count($this->producto->getProductoByNameAndId($_POST["producto"], $_POST["id_producto"])) > 0) {
        $info = array('success' => false, 'msg' => 'El producto ya existe');
      } else {
        $records = $this->producto->update($_POST, $img);
        $info = array('success' => true, 'msg' => 'Registro guardado con exito');
      }
    }
    echo json_encode($info);
  }

  public function getOneProducto()
  {
    $records = $this->producto->getOneProducto($_GET["id"]);
    if (count($records) > 0) {
      $info = array("success" => true, "records" => $records);
    } else {
      $info = array("success" => false, "msg" => "El usuario no existe");
    }
    echo json_encode($info);
  }

  public function deleteProducto()
  {
    $records = $this->producto->deleteProducto($_GET["id"]);
    $info = array("success" => true, "msg" => "Usuario eliminado con exito");
    echo json_encode($info);
  }
}
