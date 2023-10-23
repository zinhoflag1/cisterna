<?php

use Application\core\Controller;

class Cadastro extends Controller
{

  public $municipio; 

  public function __construct()
  {
    $this->municipio = $this->model('Municipio');
  }
  
  public function index()
  {

    $municipios = $this->municipio::findAll('');

        $this->view('cadastro/index', [
            'municipios' => $municipios,
                ]);
  }

  

}
