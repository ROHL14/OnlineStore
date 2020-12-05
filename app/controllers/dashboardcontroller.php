<?php
class DashboardController extends Controller
{
  private $user;
  public function __construct($param)
  {
    parent::__construct("mainView", $param, true);
  }
}
