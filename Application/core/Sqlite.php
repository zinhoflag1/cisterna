<?php

namespace Application\core;


use Exception;
use PDO;
use SQLite3;

class Sqlite extends SQLite3
{

  // armazena a conexão
  public $conn;

  public function __construct()
  {
    $data = new Config();

      $this->open(dirname(__DIR__, 2).'/db/'.$data->DB.$data->DEVICE.'.db');

  }

  // /**
  //  * Este método recebe um objeto com a query 'preparada' e atribui as chaves da query
  //  * seus respectivos valores.
  //  * @param  PDOStatement  $stmt   Contém a query ja 'preparada'.
  //  * @param  string        $key    É a mesma chave informada na query.
  //  * @param  string        $value  Valor de uma determinada chave.
  //  */
  // private function setParameters($stmt, $key, $value)
  // {
  //   $stmt->bindParam($key, $value);
  // }

  // /**
  //  * A responsabilidade deste método é apenas percorrer o array de com os parâmetros
  //  * obtendo as chaves e os valores para fornecer tais dados para setParameters().
  //  * @param  PDOStatement  $stmt         Contém a query ja 'preparada'.
  //  * @param  array         $parameters   Array associativo contendo chave e valores para fornece a query
  //  */
  // private function mountQuery($stmt, $parameters)
  // {
  //   foreach ($parameters as $key => $value) {
  //     $this->setParameters($stmt, $key, $value);
  //   }
  // }

  // /**
  //  * Este método é responsável por receber a query e os parametros, preparar a query
  //  * para receber os valores dos parametros informados, chamar o método mountQuery,
  //  * executar a query e retornar para os métodos tratarem o resultado.
  //  * @param  string   $query       Instrução SQL que será executada no banco de dados.
  //  * @param  array    $parameters  Array associativo contendo as chaves informada na query e seus respectivos valores
  //  *
  //  * @return PDOStatement
  //  */
  // public function executeQuery(string $query, array $parameters = [])
  // {

  //   if (empty($parameters)) {
  //     $stmt = $this->conn->query($query);
  //     //return $stmt->execute();
  //   } else {
  //     $stmt = $this->conn->prepare($query);
  //     $this->mountQuery($stmt, $parameters);
  //     $stmt->execute();
  //     return $stmt;
  //   }
  // }

}
