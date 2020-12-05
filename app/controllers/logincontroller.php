<?php
include_once "app/model/login.php";
class LoginController extends Controller
{
  private $user;
  public function __construct($param)
  {
    $this->user = new Login();
    parent::__construct("login", $param);
  }

  public function validar()
  {
    $u = $_POST["user"] ?? "";
    $p = $_POST["pass"] ?? "";

    if ($record = $this->user->validarLogin($u, $p)) {
      if (!isset($_SESSION)) {
        session_start();
      }

      $_SESSION["id_usuario"] = $record["id_usuario"];
      $_SESSION["usuario"] = $record["user_name"];
      $_SESSION["nuser"] = "{$record['nombres']} {$record['apellidos']}";


      $info = array(
        'success' => true,
        'msg' => 'Usuario correcto',
        'link' => URL . "dashboard",
        'datos' => $_SESSION
      );
    } else {
      $info = array('success' => false, 'msg' => 'Usuario o password incorrecto');
    }

    echo json_encode($info);
  }

  public function cerrar()
  {
    if (!isset($_SESSION)) {
      session_start();
    }

    session_destroy();
    $this->view->render("login");
  }
}
