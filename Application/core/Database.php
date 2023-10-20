<?php


//namespace Application\core;
namespace Application\core\phpActiveRecord;

//use PDO;
class Database
{

  // // configuração do banco de dados
  // private $DB_NAME = 'cisterna10';
  // private $DB_USER = 'root';
  // private $DB_PASSWORD = '12345678';
  // private $DB_HOST = 'localhost';
  // private $DB_PORT = 3307;

  // // armazena a conexão
  // private $conn;

  public function __construct()
  {

    // //'mysql:host=localhost;dbname=meuBancoDeDados', $username, $password
    // // Quando essa classe é instanciada, é atribuido a variável $conn a conexão com o db
    // $this->conn = new PDO("mysql:host=$this->DB_HOST;dbname=$this->DB_NAME;port=$this->DB_PORT", $this->DB_USER, $this->DB_PASSWORD,
    // array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // // $this->conn = new PDO("mysql:dbname=$this->DB_NAME;host=$this->DB_HOST;port=$this->DB_PORT;user=$this->DB_USER;password=$this->DB_PASSWORD");
  }

  // /**
  // * Este método recebe um objeto com a query 'preparada' e atribui as chaves da query
  // * seus respectivos valores.
  // * @param  PDOStatement  $stmt   Contém a query ja 'preparada'.
  // * @param  string        $key    É a mesma chave informada na query.
  // * @param  string        $value  Valor de uma determinada chave.
  // */
  // private function setParameters($stmt, $key, $value)
  // {
  //   $stmt->bindParam($key, $value);
  // }

  // /**
  // * A responsabilidade deste método é apenas percorrer o array de com os parâmetros
  // * obtendo as chaves e os valores para fornecer tais dados para setParameters().
  // * @param  PDOStatement  $stmt         Contém a query ja 'preparada'.
  // * @param  array         $parameters   Array associativo contendo chave e valores para fornece a query
  // */
  // private function mountQuery($stmt, $parameters)
  // {
  //   foreach( $parameters as $key => $value ) {
  //     $this->setParameters($stmt, $key, $value);
  //   }
  // }

  // /**
  // * Este método é responsável por receber a query e os parametros, preparar a query
  // * para receber os valores dos parametros informados, chamar o método mountQuery,
  // * executar a query e retornar para os métodos tratarem o resultado.
  // * @param  string   $query       Instrução SQL que será executada no banco de dados.
  // * @param  array    $parameters  Array associativo contendo as chaves informada na query e seus respectivos valores
  // *
  // * @return PDOStatement
  // */
  // // public function executeQuery(string $query, array $parameters = [])
  // // {
  // //   $stmt = $this->conn->prepare($query);
  // //   $this->mountQuery($stmt, $parameters);
  // //   $stmt->execute();
  // //   return $stmt;
  // // }

}
