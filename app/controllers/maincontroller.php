<?php
class MainController extends Controller
{
  public function __construct($param)
  {
    //require_once "app/views/main.php";
    parent::__construct("mainView", $param);
  }
}
