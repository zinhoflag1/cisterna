<?php

namespace Application\models;

use Application\core\Database;
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
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM cadastro');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * 
   */
  public static function municipio() 
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM municipio');

    var_dump($result->fetc(PDO::FETCH_ASSOC));

  

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

  

}
