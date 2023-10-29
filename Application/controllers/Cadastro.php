<?php

use Application\core\Controller;

class Cadastro extends Controller
{

  public $cadastro;
  public $municipio;

  public function __construct()
  {
    $this->municipio = $this->model('Municipio');
    $this->cadastro = $this->model('Cadastro');
  }

  public function create()
  {

    $municipios = $this->municipio::findAll();

    $this->view('cadastro/create', [
      'municipios' => $municipios,
    ]);
  }

  /**
   * Editar 
   *
   * 
   * @return void
   */
  public function edit($id){

    $municipios = $this->municipio::findAll();

    $cadastro = $this->cadastro::findById($id);

    $this->view('cadastro/edit', [
      'cadastro' => $cadastro,
      'municipios' => $municipios,
      'result' => true,
    ]);

  }


  public function store()
  {
    $municipios = $this->municipio::findAll();
    
    if ($this->cadastro::cadastrar()) {

      // $this->view('cadastro/index', [
      //   'municipios' => $municipios,
      //   'result' => true,
      // ]);
    }

    //var_dump($_FILES);
    # imagens
    $files = $_FILES;


    //die();
    //$this->upload($_FILES);
    //$cadastro = $this->cadastrar($_POST);
    //var_dump($cadastro);

  }
}
