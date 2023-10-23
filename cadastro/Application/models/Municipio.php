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

  /* instala base de dados no banco */
  public static function instalarMunicipio()
  {
      $conn = new Database();

      $sql = "USE `cisterna10`;
          CREATE TABLE IF NOT EXISTS `cadastro` (
      `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
      `nome` varchar(70) NOT NULL DEFAULT '' COMMENT 'Nome do Morador',
      `cpf` varchar(12) NOT NULL DEFAULT '' COMMENT 'Cpf do Morador',
      `qtd_pessoa` int(11) NOT NULL DEFAULT 1 COMMENT 'Quantidade de Pessoas na Residencia',
      `renda_total` decimal(16,2) NOT NULL DEFAULT 0.00 COMMENT 'Renda Familiar',
      `tipo_moradia` varchar(20) NOT NULL DEFAULT '0' COMMENT 'Tipo da Moradia',
      `endereco` varchar(110) NOT NULL DEFAULT 'Endereço' COMMENT 'Endereço do Morador',
      `comunidade` varchar(100) NOT NULL DEFAULT 'Comunidade' COMMENT 'Nome da Comunidade',
    `municipio` varchar(100) NOT NULL DEFAULT 'Município' COMMENT 'Nome do Município',
    `area_telhado` decimal(16,2) NOT NULL DEFAULT 0.00 COMMENT 'Área do Telhado M²',
    `comp_testada` decimal(16,2) NOT NULL DEFAULT 0.00 COMMENT 'Comprimento da Testada',
    `num_caida` int(11) NOT NULL DEFAULT 0 COMMENT 'Número de Caídas',
    `ck_amianto` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Tipo Construção Amianto',
    `ck_pvc` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Tipo Construção PVC',
    `ck_concreto` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Tipo Construção Concreto',
    `ck_ceramica` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Tipo Construção Cerâmica',
    `ck_fib_cimento` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Tipo Constrição Fibrocimento',
    `ck_zinco` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Tipo Construção Zinco',
    `ck_metalico` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Tipo Construção Metálico',
    `ck_outros` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Tipo Construção Outros Materiais',
    `descr_out_tp_material` varchar(255) DEFAULT NULL COMMENT 'Descrição Outros Tipos Materiais',
    `fogao_lenha` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Tem Fogão à Lenha',
    `fog_lenha_metrag_telh` int(11) NOT NULL DEFAULT 0 COMMENT 'Metragem a Considedar caso tenha Fogão à Lenha',
    `fog_lenha_metrag_calha` int(11) NOT NULL DEFAULT 0 COMMENT 'Metragem da Calha a Considedar caso tenha Fogão à Lenha',
    `fornecimento_pipa` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Há Fornecimento de Caminhão Pipa',
    `responsavel_fornec_pipa` varchar(70) DEFAULT NULL COMMENT 'Responsável pelo Forncecimento de Caminhão Pipa',
    `agente_resp_pesquisa` varchar(70) NOT NULL COMMENT 'Agente Responsável pela Pesquisa',
    `matricula_agente` varchar(70) NOT NULL COMMENT 'Matricula do Agente',
    `obs` varchar(255) DEFAULT NULL COMMENT 'Observações',
    `dt_cadastro` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Data Hora do Cadastro',
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ";

      try {
          return $conn->executeQuery($sql);
      } catch (Exception $e) {
          return $e->getMessage();
      }
  }

}
