<?php

namespace Application\models;

use Application\core\Database;
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


  public static function select($table, array $param = null)
  {
    $conn = new Database();

    $nome = isset($param['nome']) ? $param['nome'] : "";
    $cpf  = isset($param['cpf'])  ? $param['cpf']  : "";

    $sql = "Select * from " . $table . " WHERE ";

    # busca parte do Nome
    if ((!empty($nome)) && (empty($cpf))) {
      $sql .= "nome like \"%" . $nome . "%\" ORDER BY nome";
      #busca parte do CPF
    } elseif ((empty($nome)) && (!empty($cpf))) {
      $sql .= "cpf like \"%" . $cpf . "%\" ORDER BY nome";
      #busca parte do Nome e parte do CPF
    } else if ((!empty($nome)) && (!empty($cpf))) {
      $sql .= "nome like \"%" . $nome . "%\" AND cpf = \"" . $cpf . "\" ORDER BY nome";
    }

    $result = $conn->query($sql);


    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
}
