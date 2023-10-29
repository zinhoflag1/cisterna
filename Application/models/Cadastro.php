<?php

namespace Application\models;

use Application\core\Database;
use Exception;
use PDO;

class Cadastro
{


  /**
   * Grava no banco os dados do cadastro
   * 
   * @param    array
   *
   * @return   bol
   */
  public static function cadastrar()
  {
    $conn = new Database();

    $post = $_POST;

    $files = $_FILES['file'];

    var_dump($files);

    $dados = array();

    # tratar dados
    foreach ($post as $key => $dado) {
      if ($key != 'img') {
        if ($key == 'renda_total') {
          $dados[$key] = str_replace(",", ".", str_replace(".", "", $dado));
        } else {
          $dados[$key] = $dado;
        }
      }
    }

    $values = "'" . implode("','", $dados) . "'";
    $campos = "`" . implode("`,`", array_keys($dados)) . "`";

    $sql = "INSERT INTO cadastro (" . $campos . ") VALUES (" . $values . ")";

    $result = $conn->query($sql);

    # upload imagens
    if( $result && (count($files) > 0) ) {
      foreach ($files as $key => $file) {
        var_dump($file['tmp_name'], $key);
        //move_uploaded_file($file['tmp_name'][$key], "/images/dd/".$file[$key]['name']);
      }
    }else if($result){
      return true;
    } 



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
    $result = $conn->query('SELECT * FROM cadastro WHERE id = ' . $id);

    return $result->fetch(PDO::FETCH_ASSOC);
  }
}
