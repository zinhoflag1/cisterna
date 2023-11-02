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

    $post = isset($_POST) ? $_POST : "";

    $files = isset($_FILES['file']) ? $_FILES['file'] : array();

    //var_dump($files, $post);

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

    $mv = false;
    # upload imagens
    if ($result && (count($files) > 0)) {

      if (!file_exists("../imagens/" . $post['cpf'])) {
        mkdir("../imagens/" . $post['cpf']);
      }

      //var_dump($files);
      foreach ($files['tmp_name'] as $key => $file) {
        $mv = move_uploaded_file($file, dirname($_SERVER['DOCUMENT_ROOT'], 1) . "/imagens/" . $post['cpf'] . "/foto" . $key . time() . ".php");
      }

      if ($mv) {
        print json_encode([
                            'result'  => true,
                            'type'    => 'success',
                            'message' => 'Registro Gravado com sucesso !',
                          ]);
      } else {
        print json_encode([
                          'result'  => true,
                          'type'    => 'error',
                          'message' => 'Registro gravado, porem ocorreu um erro ao salvar as Fotos !',
                        ]);
      }
    }
  }


  public static function atualizar()
  {
    $conn = new Database();

    $post = isset($_POST) ? $_POST : "";

    $files = isset($_FILES['file']) ? $_FILES['file'] : array();

    $dados = "";

    # tratar dados
    foreach ($post as $key => $dado) {
      if ($key != 'img') {
        if ($key == 'renda_total') {
          $dados .= $key. '="'.str_replace(",", ".", str_replace(".", "", $dado)).'", ';
        } else {
          if(array_key_last($post) == $key) {
            $dados .= $key. '="'. $dado.'"';
          }else {
            $dados .= $key. '="'. $dado.'",';
          }
        }
      }
    }


    $sql = "UPDATE cadastro set " . $dados." Where id =".$post['id'];

    $result = $conn->query($sql);

    $mv = false;
    # upload imagens
    if ($result && (count($files) > 0)) {

      if (!file_exists("../imagens/" . $post['cpf'])) {
        mkdir("../imagens/" . $post['cpf']);
      }

      //var_dump($files);
      foreach ($files['tmp_name'] as $key => $file) {
        $mv = move_uploaded_file($file, dirname($_SERVER['DOCUMENT_ROOT'], 1) . "/imagens/" . $post['cpf'] . "/foto" . $key . time() . ".php");
      }

      if ($mv) {
        print  json_encode([
                            'result'  => true,
                            'type'    => 'success',
                            'message' => 'Registro Gravado com sucesso !',
                            'id'      => $post['id'],
                          ]);
      } else {
        print json_encode([
                            'result'  => true,
                            'type'    => 'error',
                            'message' => 'Registro gravado, porem ocorreu um erro ao salvar as Fotos !',
                            'id'      => $post['id'],
                          ]);
      }
    }else {

      if($result){
        print  json_encode([
                            'result'  => true,
                            'type'    => 'success',
                            'message' => 'Registro Atualizado com sucesso !',
                            'id'      => $post['id'],
                          ]);
      }
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


  public static function deletar($file)
  {

   // var_dump(file_exists('../'.$file));

    //die();

    if (file_exists('../'.$file)) {
      return unlink($_SERVER['DOCUMENT_ROOT'].$file);
    }
  }
}
