<?php

use Application\core\Controller;

class Admin extends Controller
{
  public $admin;

  public function __construct()
  {
    $this->admin = $this->model('Admin');
  }

  /*
  * chama a view index.php do  /home   ou somente   /
  */
  public function index()
  {

    $db_instalado    = $this->admin->verificaBase();
    $tb_municipio = $this->admin->tbl_municipio();

    $this->view('admin/index', [
      'db_instalado' => $db_instalado,
      'tb_municipio' => $tb_municipio,
    ]);
  }

  public function instalaBase()
  {

    # verifica a base
    if (!$this->admin->verificaBase()) {

      # cria Base de dados;
      $this->admin->criarbase();
    }

    #cria a tabela
    $this->admin->instalar();
  }

  /**
   * Importar tabela municipios
   */
  public function import()
  {
    var_dump($this->admin->importarMunicipio());

  }
}
