<?php
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
