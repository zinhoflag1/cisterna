<?php

namespace Application\models;
//namespace Application\core\phpActiveRecord;
//use Application\core\phpActiveRecord;
//use PDO;
class Cadastros extends ActiveRecord\model
{


    static $table_name = 'cadatros';

    # explicit pk since our pk is not "id" 
    static $primary_key = 'id';

    # explicit connection name since we always want our test db with this model
    static $connection = 'development';
     
    # explicit database name will generate sql like so => my_db.my_book
    //static $db = 'cisterna';


  /** Poderiamos ter atributos aqui */

  /**
  * Este método busca todos os usuários armazenados na base de dados
  *
   * @return   array
   */
//   public static function findAll()
//   {

//     $cadastro = Cadastro::
//     $conn = new Database();
//     $result = $conn->executeQuery('SELECT * FROM cadastros');
//     return $result->fetchAll(PDO::FETCH_ASSOC);
//   }

//   /**
//   * Este método busca um usuário armazenados na base de dados com um
//   * determinado ID
//   * @param    int     $idusers   Identificador único do usuário
//   *
//   * @return   array
//   */
//   public static function findById(int $id)
//   {
//     $conn = new Database();
//     $result = $conn->executeQuery('SELECT * FROM users WHERE idusers = :ID LIMIT 1', array(
//       ':ID' => $id
//     ));

//     return $result->fetchAll(PDO::FETCH_ASSOC);
//   }

// /**
//  * Undocumented function
//  *
//  * @param [type] $cadastro
//  * @return void
//  */
//   public static function store($cadastro) {

//     var_dump($cadastro);

//     $conn = new Database();

//     $resut = $conn->executeQuery('insert into cadastros ('.$cadastro.')');

//   }

}
