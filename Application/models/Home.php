<?php

namespace Application\models;

use Application\core\Database;
use Application\core\Sqlite;
use Application\core\Config;

use Exception;
use PDO;

class Home
{
  /** Poderiamos ter atributos aqui */

  /**
   * Este método busca todos os usuários armazenados na base de dados
   *
   * @return   array
   */
  public static function findAll($table)
  {
    $conn = new Database();
    $result = $conn->query('SELECT * FROM ' . $table);
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }



  /**
   * Este método busca um usuário armazenados na base de dados com um
   * determinado ID
   * @param    int     $id   Identificador único do usuário
   *
   * @return   array
   */
  public static function findById(int $id)
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM users WHERE id = :ID LIMIT 1', array(
      ':ID' => $id
    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }


  /**
   * 
   */

  public static function select($table, array $param = null)
  {

    $config = new Config();

    $dados =array();
    
    $nome = isset($param['nome']) ? $param['nome'] : "";
    $cpf  = isset($param['cpf'])  ? $param['cpf']  : "";
    
    
    $sql = "SELECT cadastro.id, cadastro.nome, cadastro.cpf, cadastro.renda_total, cadastro.comunidade, municipio.nome AS municipio_nome
    FROM cadastro
    INNER JOIN municipio 
    ON cadastro.municipio = municipio.id ";



    # busca parte do Nome
    if ((!empty($nome)) && (empty($cpf))) {
      $sql .= "WHERE cadastro.nome like \"%" . $nome . "%\" ORDER BY cadastro.nome";
      #busca parte do CPF
    } elseif ((empty($nome)) && (!empty($cpf))) {
      $sql .= "WHERE cadastro.cpf like \"%" . $cpf . "%\" ORDER BY cadastro.nome";
      #busca parte do Nome e parte do CPF
    } else if ((!empty($nome)) && (!empty($cpf))) {
      $sql .= "WHERE cadastro.nome like \"%" . $nome . "%\" AND cadastro.cpf = \"" . $cpf . "\" ORDER BY cadastro.nome";
    }

  if($config->DRIVE == 'mysql') {
    $conn = new Database();
    $result = $conn->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);
    
  }elseif($config->DRIVE == 'sqlite') {

    $conn = new Sqlite();
    $result = $conn->query($sql);
    
    while($linha = $result->fetchArray(SQLITE3_ASSOC)) {

      $dados[] = $linha;

    }

    return $dados;
  }


  }


  public static function find()
  {

    $config = new Config();

    ## mysql
    if ($config->DRIVE == 'mysql') {

      $conn = new Database();
      $result = $conn->query('SELECT cadastro.id, cadastro.nome, cadastro.cpf, cadastro.renda_total, cadastro.comunidade, municipio.nome AS municipio_nome
                            FROM cadastro
                            INNER JOIN municipio 
                            ON cadastro.municipio = municipio.id');

      return $result->fetchAll(PDO::FETCH_ASSOC);

    } elseif ($config->DRIVE == 'sqlite') {

      $dados = array();

      $conn = new Sqlite();
      $result = $conn->query('SELECT cadastro.id, cadastro.nome, cadastro.cpf, cadastro.renda_total, cadastro.comunidade, municipio.nome AS municipio_nome
                            FROM cadastro
                            INNER JOIN municipio 
                            ON cadastro.municipio = municipio.id');

        while($linha = $result->fetchArray(SQLITE3_ASSOC)){
          $dados[] = $linha;
        }

      return $dados;
    }
  }
}
