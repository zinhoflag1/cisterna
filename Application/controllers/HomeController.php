<?php

//namespace Application;

#use \Application\core;
//use Application\core\controllers as CoreController;

#use \Application\models as Model;
//use \Application\controllers\CadastroController;

//require $_SERVER['DOCUMENT_ROOT']."/cisterna/Application/models/Cadastros.php";

class HomeController extends Controller
{
  /*
  * chama a view index.php do  /home   ou somente   /
  */
  public function index()
  {

    //print_r(get_declared_classes());

    $cadModel = new Cadastro();
    $cadModel->findAll();
    //$cadastro = new CadastroController();

    var_dump($cadModel);

    $total_registros = 0;

    $total_registros = $cadModel;

    //var_dump($total_registros);
    $this->view('home/index', 
      [
        'total_registros' => $total_registros,
      ]
    );
  }

}