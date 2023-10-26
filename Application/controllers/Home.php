<?php

use Application\core\Controller;

class Home extends Controller
{
  public $home; 
  public $admin;

  public function __construct()
  {


    $this->home = $this->model('Home');
    $this->admin = $this->model('admin');

  }

  /*
  * chama a view index.php do  /home   ou somente   /
  */
  public function index()
  {

    $this->admin::createDatabase('pesquisa10');

    $cadastro = $this->admin::verificaTbl('cadastro');
    $municipio = $this->admin::verificaTbl('municipio');
    $rpm_mun = $this->admin::verificaTbl('rpm_mun');

    # cria a tabela no banco
    if(!$cadastro){
      $this->admin::createTblCadastro(); 
    }
    
    # cria a tabela no banco
    if(!$municipio){
      $this->admin::createTblMunicipio();
    }

    # cria a tabela no banco
    if(!$rpm_mun){
      $this->admin::createTblRpmMun();
      $this->admin::importarFileSql('municipio_rpm_mun'); 
    }

    # importa da dos do .sql
    $this->admin::


    # mostra total de registros no sistema
    $reg = $this->home::findAll('cadastro');

    $this->view('home/index', [
      'total_registros' => count($reg),
      'registros' => $reg,
    ]);
  }

}
