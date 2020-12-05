<?php
<<<<<<< HEAD

include_once "app/model/marcas.php";
class MarcasController extends Controller{
	private $marca;
	public function __construct($param) {
		$this->marca=new Marcas();
		parent::__construct("marcas",$param);
	}

	public function getAll () {
       
		$records=$this->marca->getAll();
		$info=array('success'=>true,'records'=>$records);
		echo json_encode($info);
	}

	public function save() {
		$img="";
		if ($_POST["id_marca"]=="0") {
			if (count($this->marca->getMarcaByName($_POST["marca"]))>0) {
				$info=array('success'=>false,'msg'=>"la marca ya existe");
			} else {
				$records=$this->marca->save($_POST,$img);
				$info=array('success'=>true,'msg'=>"Registro guardado con exito");
			}
		} else {
			if (count($this->marca->getMarcaByNameAndId($_POST["marca"],$_POST["id_marca"]))>0) {
				$info=array('success'=>false,'msg'=>"la marca ya existe");
			} else {
				$records=$this->marca->update($_POST,$img);
				$info=array('success'=>true,'msg'=>"Registro guardado con exito");
			}
		}
		echo json_encode($info);
	}

	public function getOneMarca() {
		$records=$this->marca->getOneMarca($_GET["id"]);
		if (count($records)>0) {
			$info=array('success'=>true,'records'=>$records);
		} else {
			$info=array('success'=>false,'msg'=>"la marca no existe");
		}
		echo json_encode($info);
	}

	public function deleteMarca() {
		$records=$this->marca->deleteMarca($_GET["id"]);
		$info=array('success'=>true,'msg'=>'marca eliminado con exito');
		echo json_encode($info);
	}
}
?>
=======
include_once "app/model/marcas.php";
class MarcasController extends Controller
{
  private $marcas;
  public function __construct($param)
  {
    $this->marcas = new Marcas();
    parent::__construct("marcas", $param);
  }
  public function getAll()
  {
    $records = $this->marcas->getAll();
    $info = array('success' => true, 'records' => $records);
    echo json_encode($info);
  }

  public function save()
  {
    if ($_POST["id_marca"] == "0") {
      if (count($this->marcas->getMarcaByName($_POST["marca"])) > 0) {
        $info = array('success' => false, 'msg' => "La marca ya existe");
      } else {
        $records = $this->marcas->save($_POST);
        $info = array('success' => true, 'msg' => "Registro guardado con exito");
      }
    } else {
      if (count($this->marcas->getMarcaByNameAndId($_POST["marca"], $_POST["id_marca"])) > 0) {
        $info = array('success' => false, 'msg' => "La marca ya existe");
      } else {
        $records = $this->marcas->update($_POST);
        $info = array('success' => true, 'msg' => "Registro guardado con exito");
      }
    }
    echo json_encode($info);
  }

  public function getOneMarca()
  {
    $records = $this->marcas->getOneMarca($_GET["id"]);
    if (count($records) > 0) {
      $info = array('success' => true, 'records' => $records);
    } else {
      $info = array('success' => false, 'msg' => "La marca no existe");
    }
    echo json_encode($info);
  }

  public function deleteMarca()
  {
    $records = $this->marcas->deleteMarca($_GET["id"]);
    $info = array('success' => true, 'msg' => 'marca eliminada con exito');
    echo json_encode($info);
  }
}
>>>>>>> d86b544e6b0a62572fe7546a5dc0aeec08217e9e
