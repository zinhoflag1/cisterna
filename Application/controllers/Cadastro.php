<?php

use Application\core\Controller;
use Application\core\Config;

class Cadastro extends Controller
{

  public $cadastro;
  public $municipio;
  public $admin;

  public function __construct()
  {
    $this->municipio = $this->model('Municipio');
    $this->cadastro = $this->model('Cadastro');
    $this->admin = $this->model('Admin');
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
  public function edit($id)
  {

    $municipios = $this->municipio::findAll();

    $cadastro = $this->cadastro::findById($id);

    $this->view('cadastro/edit', [
      'cadastro' => $cadastro,
      'municipios' => $municipios,
      'result' => false,
    ]);
  }


  public function store()
  {
    $municipios = $this->municipio::findAll();

    if ($this->cadastro::cadastrar()) {

      $this->view('cadastro/index', [
        'municipios' => $municipios,
        'result' => true,
      ]);
    }

    //var_dump($_FILES);
    # imagens
    $files = $_FILES;


    //die();
    //$this->upload($_FILES);
    //$cadastro = $this->cadastrar($_POST);
    //var_dump($cadastro);

  }


  public function update()
  {

    if ($this->cadastro::atualizar()) {

      print 'success';
    }

    # imagens
    //$files = $_FILES;

  }

  /**
   * Show
   */
  public function show($id)
  {

    $config = new Config();

    $cadastro = $this->cadastro::findById($id);

    $campos = $this->admin::getFieldsTbl($config->DRIVE, 'cadastro');

    

    $this->view('cadastro/show', [
      'cadastro' => $cadastro,
      'campos'  => $campos,
    ]);
  }
  
  public function showImage($file)
  {

    header('Content-Type: image/png');
    readfile("../imagens/" . $file);
  }

  public function delete()
  {
    $file = $_POST['file'];

    var_dump( $this->cadastro::deletar($file));
  }


  /**
   * Show
   */
  public function showAll()
  {

    $config = new Config();

    $cadastro = $this->cadastro::findAll();

    $campos = $this->admin::getFieldsTbl($config->DRIVE, 'cadastro');

    

    $this->view('cadastro/sinc', [
      'cadastro' => $cadastro,
      'campos'  => $campos,
    ]);
  }
}
