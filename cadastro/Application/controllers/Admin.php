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
    
  $db_instalado = $this->admin->verificaBase();

    $this->view('admin/index', [
      'db_instalado' => $db_instalado,
    ]);
  }

  public function instalaBase()
  {

    //var_dump($this->admin);

    # verifica a base
    if (!$this->admin->verificaBase()) {

      # cria Base de dados;
      $this->admin->criarbase();
    }

    #cria a tabela
    var_dump( $this->admin->instalar());
  }
}
