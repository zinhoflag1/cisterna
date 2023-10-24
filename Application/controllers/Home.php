<?php

use Application\core\Controller;

class Home extends Controller
{
  public $home; 

  public function __construct()
  {
    $this->home = $this->model('Home');
  }

  /*
  * chama a view index.php do  /home   ou somente   /
  */
  public function index()
  {

    $reg = $this->home::findAll();

    $this->view('home/index', [

      'total_registros' => count($reg),
      'registros' => $reg,
    ]);
  }

}
