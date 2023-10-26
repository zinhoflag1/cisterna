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

    //$db_instalado    = $this->admin->verificaBase();
    $tb_municipio = $this->admin->verificaTblMunicipio();

    $this->view('admin/index', [
      //'db_instalado' => $db_instalado,
      'tb_municipio' => $tb_municipio,
    ]);
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
    var_dump($this->admin->tblMunicipio());

  }


  /**
   * Importar tabela municipios
   */
  public function import()
  {

    var_dump($this->admin->createTblMunicipio());
    var_dump($this->admin->importarMunicipio());

  }
}
