<?php
include_once "app/model/categorias.php";
<<<<<<< HEAD
class CategoriasController extends Controller{
	private $categoria;
	public function __construct($param) {
		$this->categoria=new Categorias();
		parent::__construct("categorias",$param);
	}

	public function getAll() {
		$records=$this->categoria->getAll();
		$info=array('success'=>true,'records'=>$records);
		echo json_encode($info);
	}

	public function save() {
		$img="";
		if ($_POST["id_cate"]=="0") {
			if (count($this->categoria->getCategoriaByName($_POST["categoria"]))>0) {
				$info=array('success'=>false,'msg'=>"La categoria ya existe");
			} else {
				$records=$this->categoria->save($_POST,$img);
				$info=array('success'=>true,'msg'=>"Registro guardado con exito");
			}
		} else {
			if (count($this->categoria->getCategoriaByNameAndId($_POST["categoria"],$_POST["id_cate"]))>0) {
				$info=array('success'=>false,'msg'=>"La categoria ya existe");
			} else {
				$records=$this->categoria->update($_POST,$img);
				$info=array('success'=>true,'msg'=>"Registro guardado con exito");
			}
		}
		echo json_encode($info);
	}

	public function getOneCategoria() {
		$records=$this->categoria->getOneCategoria($_GET["id"]);
		if (count($records)>0) {
			$info=array('success'=>true,'records'=>$records);
		} else {
			$info=array('success'=>false,'msg'=>"La categoria no existe");
		}
		echo json_encode($info);
	}

	public function deleteCategoria() {
		$records=$this->categoria->deleteCategoria($_GET["id"]);
		$info=array('success'=>true,'msg'=>'Categoria eliminada con exito');
		echo json_encode($info);
	}
}
?>
=======
class CategoriasController extends Controller
{
  private $categorias;
  public function __construct($param)
  {
    $this->categorias = new Categorias();
    parent::__construct("categorias", $param);
  }
  public function getAll()
  {
    $records = $this->categorias->getAll();
    $info = array('success' => true, 'records' => $records);
    echo json_encode($info);
  }

  public function save()
  {
    if ($_POST["id_cate"] == "0") {
      if (count($this->categorias->getCategoriaByName($_POST["categoria"])) > 0) {
        $info = array('success' => false, 'msg' => "La categoria ya existe");
      } else {
        $records = $this->categorias->save($_POST);
        $info = array('success' => true, 'msg' => "Registro guardado con exito");
      }
    } else {
      if (count($this->categorias->getCategoriaByNameAndId($_POST["categoria"], $_POST["id_categoria"])) > 0) {
        $info = array('success' => false, 'msg' => "La categoria ya existe");
      } else {
        $records = $this->categorias->update($_POST);
        $info = array('success' => true, 'msg' => "Registro guardado con exito");
      }
    }
    echo json_encode($info);
  }

  public function getOneCategoria()
  {
    $records = $this->categorias->getOneCategoria($_GET["id"]);
    if (count($records) > 0) {
      $info = array('success' => true, 'records' => $records);
    } else {
      $info = array('success' => false, 'msg' => "La categoria no existe");
    }
    echo json_encode($info);
  }

  public function deleteCategoria()
  {
    $records = $this->categorias->deleteCategoria($_GET["id"]);
    $info = array('success' => true, 'msg' => 'Categoria eliminada con exito');
    echo json_encode($info);
  }
}
>>>>>>> d86b544e6b0a62572fe7546a5dc0aeec08217e9e
