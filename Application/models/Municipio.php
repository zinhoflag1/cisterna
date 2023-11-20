<?php

namespace Application\models;

use Application\core\Database;
use Application\core\Config;
use Application\core\Sqlite;
use Exception;
use PDO;

class Municipio
{
  /** Poderiamos ter atributos aqui */

  /**
   * Este método busca todos os usuários armazenados na base de dados
   *
   * @return   array
   */
  public static function findAll()
  {
    $config = new Config();

    if ($config->DRIVE == 'mysql') {
      $conn = new Database();
      $result = $conn->query('SELECT * FROM municipio');
      return $result->fetchAll(PDO::FETCH_ASSOC);

    } elseif ($config->DRIVE == 'sqlite') {

      $dados = array();
      $conn = new Sqlite();
      $result = $conn->query('SELECT * FROM municipio');

      while($linha = $result->fetchArray(SQLITE3_ASSOC)){
        $dados[] = $linha;
      }

      return $dados;

    }
  }

  /**
   * 
   */
  public static function municipio()
  {
    $conn = new Database();
    $result = $conn->query('SELECT * FROM municipio');

    $result->fetchAll(PDO::FETCH_ASSOC);
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


  public static function getNome(int $id)
  {
    $conn = new Database();
    $result = $conn->query('SELECT nome FROM municipio WHERE id = ' . $id);

    $result->fetchAll(PDO::FETCH_ASSOC);
    return $result['nome'];
  }



  public static function find()
  {
    $conn = new Database();
    $result = $conn->query('SELECT cadastro.nome, cadastro.cpf, cadastro.renda_total, cadastro.comunidade, municipio.nome AS municipio_nome
                            FROM cadastro
                            INNER JOIN municipio 
                            ON cadastro.municipio = municipio.id');

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
}
