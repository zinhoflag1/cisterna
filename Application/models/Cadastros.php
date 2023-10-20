<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Cadastros
{



  /** Poderiamos ter atributos aqui */

  /**
  * Este método busca todos os usuários armazenados na base de dados
  *
  * @return   array
  */
  public static function findAll()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM cadastros');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * Este método busca um usuário armazenados na base de dados com um
  * determinado ID
  * @param    int     $idusers   Identificador único do usuário
  *
  * @return   array
  */
  public static function findById(int $id)
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM users WHERE idusers = :ID LIMIT 1', array(
      ':ID' => $id
    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

/**
 * Undocumented function
 *
 * @param [type] $cadastro
 * @return void
 */
  public static function store($cadastro) {

    var_dump($cadastro);

    $conn = new Database();

    $resut = $conn->executeQuery('insert into cadastros ('.$cadastro.')');

  }

}
