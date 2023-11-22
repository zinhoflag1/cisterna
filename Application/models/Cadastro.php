<?php

namespace Application\models;

use Application\core\Database;
use Application\core\Sqlite;
use Application\core\Config;
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

    $config = new Config();

    if ($config->DRIVE == 'mysql') {
      $conn = new Database();
    } else {
      $conn = new Sqlite();
    }

    $post = isset($_POST) ? $_POST : "";

    $files = isset($_FILES['file']) ? $_FILES['file'] : array();


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

    $id = $conn->lastInsertRowID();

    $mv = false;
    # upload imagens
    if ($result && (count($files) > 0)) {

      if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/imagens/" . $post['cpf'])) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . "/imagens/" . $post['cpf']);
      }

      //var_dump($files);
      foreach ($files['tmp_name'] as $key => $file) {

        $mv = move_uploaded_file($file, $_SERVER['DOCUMENT_ROOT'] . "/imagens/" . $post['cpf'] . "/foto" . $key . time() . ".jpg");
      }

      if ($mv) {
        print json_encode([
          'result'  => true,
          'type'    => 'success',
          'message' => 'Registro Gravado com sucesso !',
          'id'      => $id,
        ]);
      } else {
        print json_encode([
          'result'  => true,
          'type'    => 'error',
          'message' => 'Registro gravado, porem ocorreu um erro ao salvar as Fotos !',
          'id'      => $id,
        ]);
      }
    }
  }


  public static function atualizar()
  {

    $config = new Config();

    if ($config->DRIVE == 'mysql') {
      $conn = new Database();
    } else {
      $conn = new Sqlite();
    }

    $post = isset($_POST) ? $_POST : "";

    $files = isset($_FILES['file']) ? $_FILES['file'] : array();

    $dados = "";

    # tratar dados
    foreach ($post as $key => $dado) {
     if (($key != 'img') && ($key != 'id')) {
        if ($key == 'renda_total') {
          $dados .= $key . '="' . str_replace(",", ".", str_replace(".", "", $dado)) . '", ';
        } else {
          if (array_key_last($post) == $key) {
            $dados .= $key . '="' . $dado . '"';
          } else {
            $dados .= $key . '="' . $dado . '",';
          }
        }
      }
    }


    $sql = "UPDATE cadastro set " . $dados . " Where id =" . $post['id'];

    $result = $conn->query($sql);


    $mv = false;
    # upload imagens
    if ($result && (count($files) > 0)) {

      if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/imagens/" . $post['cpf'])) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . "/imagens/" . $post['cpf']);
      }

      //var_dump($files);
      foreach ($files['tmp_name'] as $key => $file) {

        $mv = move_uploaded_file($file, $_SERVER['DOCUMENT_ROOT'] . "/imagens/" . $post['cpf'] . "/foto" . $key . time() . ".php");
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
    } else {

      if ($result) {
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
    $dados = array();

    $config = new Config();

    if ($config->DRIVE == 'mysql') {

      $conn = new Database();
      $result = $conn->query('SELECT * FROM cadastro WHERE id = ' . $id);
      return $result->fetch(PDO::FETCH_ASSOC);
    } elseif ($config->DRIVE == 'sqlite') {

      $conn = new Sqlite();
      $result = $conn->query('SELECT * FROM cadastro WHERE id = ' . $id);

      while ($linha = $result->fetchArray(SQLITE3_ASSOC)) {

        $dados = $linha;
      }

      return $dados;
    }
  }


  public static function deletar($file)
  {

    if (file_exists(dirname(__DIR__, 2) . "/public" . $file)) {
      return unlink(dirname(__DIR__, 2) . "/public" . $file);
    } else {
      return 'error';
    }
  }
}
