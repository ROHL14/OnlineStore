<?php
include_once "app/model/productos.php";
class ProductosController extends Controller
{
	private $productos;
	public function __construct($param)
	{
		$this->productos = new Productos();
		parent::__construct("productosView", $param);
	}
	public function getAll()
	{
		$records = $this->productos->getAll();
		$info = array('success' => true, 'records' => $records);
		echo json_encode($info);
	}
	public function getAllCategorias()
	{
		$records = $this->productos->getAllCategorias();
		$info = array('success' => true, 'records' => $records);
		echo json_encode($info);
	}
	public function getAllAutores()
	{
		$records = $this->productos->getAllMarcas();
		$info = array('success' => true, 'records' => $records);
		echo json_encode($info);
	}
	public function save()
	{
		$img = "";

		if (isset($_FILES["foto"])) {
			if (is_uploaded_file($_FILES["foto"]["tmp_name"])) {
				if (($_FILES['foto']['type'] == "image/png") || ($_FILES['foto']['type'] == "image/jpeg")) {
					copy($_FILES["foto"]["tmp_name"], __DIR__ . "/../../public_html/fotos/" . $_FILES["foto"]["name"]) or die("No se pudo guardar el archivo");
					$imgP = URL . "public/fotos/" . $_FILES["foto"]["name"];
				} else {
					$imgP = "";
				}
			}
		}

		if ($_POST["id_producto"] == "0") {
			if (count($this->productos->getProductoByName($_POST["nombre_producto"])) > 0) {
				$info = array('success' => false, 'msg' => "El producto ya existe");
			} else {
				$records = $this->productos->save($_POST, $img);
				$info = array('success' => true, 'msg' => "Registro guardado con exito");
			}
		} else {
			if (count($this->productos->getProductoByNameAndId($_POST["nombre_producto"], $_POST["id_producto"])) > 0) {
				$info = array('success' => false, 'msg' => "El producto ya existe");
			} else {
				$records = $this->producto->update($_POST, $img);
				$info = array('success' => true, 'msg' => "Registro guardado con exito");
			}
		}
		echo json_encode($info);
	}
	public function getOneProducto()
	{
		$records = $this->productos->getOneProducto($_GET["id"]);
		if (count($records) > 0) {
			$info = array('success' => true, 'records' => $records);
		} else {
			$info = array('success' => false, 'msg' => "El producto no existe");
		}
		echo json_encode($info);
	}

	public function getOneProductoJoin()
	{
		$records = $this->productos->getOneProductoJoin($_GET["id"]);
		if (count($records) > 0) {
			$info = array('success' => true, 'records' => $records);
		} else {
			$info = array('success' => false, 'msg' => "El producto no existe");
		}
		echo json_encode($info);
	}

	public function deleteProducto()
	{
		$records = $this->productos->deleteProducto($_GET["id"]);
		$info = array('success' => true, 'msg' => 'Producto eliminado con exito');
		echo json_encode($info);
	}
}
