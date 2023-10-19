<?php

use Application\core\Controller;

class Admin extends Controller
{
  /*
  * /
  */
  public function index()
  {

    $admin = $this->model('Admin');

    $db_instalado = $admin->verificaBase();


    $this->view('admin/index',[
        'db_instalado' => $db_instalado, 
      ]  
    );
  }

  public function instalaBase()
  {

    # verifica a base
    //if (!Conexao::verificaBase()) {

      # cria Base de dados;
      //Conexao::criarbase();

      #cria a tabela
      //return Conexao::instalar();
    }
  
}
