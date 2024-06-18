<?php

use Application\core\Controller;
use Application\core\Config;

class Admin extends Controller
{
  public $admin;
  public $cadastro;

  public function __construct()
  {
    $this->admin = $this->model('Admin');
    $this->cadastro = $this->model('Cadastro');
  }

  /*
  * chama a view index.php do  /home   ou somente   /
  */
  public function index()
  {

    $this->view('admin/index');
  }

  /**
   * Verifica se existe a base de dados e instala
   *
   * @return void
   */
  public function instalarBase()
  {

    # verifica a base
    if (!$this->admin->verificaBaseCisterna()) {

      # cria Base de dados;
      $this->admin->criarbaseCisterna();
    }

    #cria a tabela cadastro
    $this->admin->instalar();
  }


  /**
   * Importar tabela municipios
   */
  public function instalarTblMunicipio()
  {
    $this->admin->tblMunicipio();

  }


  /**
   * Importar tabela municipios
   */
  public function import()
  {

    $this->admin->createTblMunicipio();
    $this->admin->importarMunicipio();

  }


  /**
   * Sincronizar base
   *
   * @return void
   */
  public function sinc()
  {
    $config = new Config();

    $cadastros = $this->cadastro::findAll();

    $campos = $this->admin::getFieldsTbl($config->DRIVE, 'cadastro');

    

    $this->view('sinc/index', [
      'cadastros' => $cadastros,
      'campos'  => $campos,
    ]);

   
  }
}
