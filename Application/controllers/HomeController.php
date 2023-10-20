<?php

use Application\core\Controller;
use Application\models\Cadastros;

///use Application\models\Cadastros;

class Home extends Controller
{
  /*
  * chama a view index.php do  /home   ou somente   /
  */
  public function index()
  {

    $cadastro = new Cadastros();
    $cadastro->find('all');

    //$cadastro = new Cadastros();

    //$total_registros = $cadastro->findAll();

    //var_dump($total_registros);
    $this->view('home/index', 
      [
        //'total_registros' => $total_registros,
      ]
    );
  }

}