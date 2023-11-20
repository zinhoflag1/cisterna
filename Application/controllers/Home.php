<?php

use Application\core\Controller;

class Home extends Controller
{
  public $home;
  public $admin;

  public function __construct()
  {


    $this->home = $this->model('Home');
    $this->admin = $this->model('Admin');
  }

  /*
  * chama a view index.php do  /home   ou somente   /
  */
  public function index()
  {

    $this->admin::createDatabase();

    $cadastro = $this->admin::verificaTbl('cadastro');
    $municipio = $this->admin::verificaTbl('municipio');
    $rpm_mun = $this->admin::verificaTbl('rpm_mun');

    # cria env
    if(!file_exists('config.env')) {
      $this->admin::createEnv();
    }

    # cria a tabela no banco
    if (!$cadastro) {
      $this->admin::createTblCadastro();
    }

    # cria a tabela no banco
    if (!$municipio) {
      $this->admin::createTblMunicipio();

      $this->admin::importarFileSql('municipio');
      sleep(10);
    }

    # cria a tabela no banco
    if (!$rpm_mun) {
      $this->admin::createTblRpmMun();
      $this->admin::importarFileSql('municipio_rpm_mun');
    }

   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $post = $_POST;

      $reg = $this->home::select('cadastro', $post);
      

    }else {
      # mostra total de registros no sistema
      $reg = $this->home::find();
    }

    

    $this->view('home/index', [
      'total_registros' => count($reg),
      'registros' => $reg,
    ]);
  }
}
