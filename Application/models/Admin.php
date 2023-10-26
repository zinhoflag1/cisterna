<?php

namespace Application\models;

use Application\core\Database;
use Exception;
use PDO;

class Admin
{

  /**
  * Cria o Banco de Dados
  *
  * @return void
  */
  public static function createDatabase($db)
  {

    error_reporting(E_ALL);
    $conn = new Database();
    return $conn->query("CREATE DATABASE IF NOT EXISTS `".$db."`");
  
  }


  /**
   * verifica se existe a Tabela de $table
   */
  public static function verificaTbl($tbl)
  {

    error_reporting(E_ALL);

    $conn = new Database();
    $result = $conn->query('SHOW TABLES');

    $tables = $result->fetchAll();

    if (isset($table)) {
      foreach ($tables as $key => $table) {
        if ($table[0] == $tbl) {
          return true;
        } else {
          return false;
        }
      }
    } else {
      return false;
    }
  }



  /**
   * Cria a Tabela cadastro
   * @return void
   */

  public static function createTblCadastro()
  {

    error_reporting(E_ALL);

    $conn = new Database();

    $sql = "CREATE TABLE IF NOT EXISTS `cadastro` (
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
      return $conn->query($sql);
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }


  /**
   * cria a tabela municipio
   * @return void
   */

  public static function createTblMunicipio()
  {
    $conn = new Database();

    $sql = "CREATE TABLE IF NOT EXISTS `municipio` (
        `id` int(11) NOT NULL COMMENT 'Identificador do Municipio',
        `nome` varchar(30) DEFAULT NULL COMMENT 'Nome do Municipio',
        `macroregiao` varchar(255) DEFAULT NULL COMMENT 'Macroregiao do Estado',
        `latitude` varchar(13) DEFAULT NULL COMMENT 'Latitude',
        `longitude` varchar(13) DEFAULT NULL COMMENT 'Longitude',
        `latitude_dec` double DEFAULT NULL COMMENT 'Latitude Decimal',
        `longitude_dec` double DEFAULT NULL COMMENT 'Longitude Decimal',
        `distancia_bh` double DEFAULT 0 COMMENT 'Distancia de BH',
        `populacao` double DEFAULT 0 COMMENT 'População',
        `territorio_desenv` varchar(70) DEFAULT NULL COMMENT 'Território de Desenvolvimento',
        `tel` varchar(16) DEFAULT NULL COMMENT 'Telefone Prefeitura',
        `fax` varchar(16) DEFAULT NULL COMMENT 'Fax Prefeitura',
        `endereco` varchar(70) DEFAULT NULL COMMENT 'Endereço Prefeitura',
        `bairro` varchar(45) DEFAULT NULL COMMENT 'Bairro Prefeitura',
        `cep` varchar(45) DEFAULT NULL COMMENT 'cep prefeitura',
        `email` varchar(45) DEFAULT NULL COMMENT 'Email Prefeitura',
        `tel_pref` varchar(20) DEFAULT NULL COMMENT 'Telefone Prefeito',
        `cel_pref` varchar(20) DEFAULT NULL COMMENT 'Celular Prefeito',
        `pop_rural` int(11) DEFAULT 0 COMMENT 'Populacao Rural',
        `qtd_pipa` int(11) DEFAULT 0 COMMENT 'Quantidade de Pipa Contratados ou de Propriedade Prefeitura',
        `prefeito` varchar(45) DEFAULT NULL COMMENT 'Nome do Prefeito',
        `area` varchar(45) DEFAULT NULL COMMENT 'Area Territorio',
        `aliquota_iss` decimal(16,2) DEFAULT NULL COMMENT 'Aluquita Iss',
        `resp_cob_iss` varchar(15) DEFAULT NULL COMMENT 'Responsabilidade Cobranca Iss',
        `num_lei_iss` varchar(30) DEFAULT NULL COMMENT 'Número Lei Cobranca Iss',
        `cobra_iss` varchar(10) DEFAULT NULL COMMENT 'Isenção de ISS',
        `CodUf` varchar(2) DEFAULT NULL,
        `Codmundv` varchar(10) DEFAULT NULL,
        `Codmun` varchar(10) DEFAULT NULL,
        `id_meso` int(11) DEFAULT NULL COMMENT 'Identificador da Mesorregiao',
        `id_micro` int(11) DEFAULT NULL COMMENT 'Identificador Microrregiao',
        `NOME_IBGE` varchar(60) DEFAULT NULL,
        `semi_arido` tinyint(4) DEFAULT 0 COMMENT 'Faz Parte do Semi-Arido',
        PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Regional de DC dos Municipios';
      ";

    try {
      $result =  $conn->query($sql);
      return $result;
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }


  /**
   * Cria tabela rpm_mun
   *
   * @return void
   */
  public static function createTblRpmMun()
  {

    $conn = new Database();

    $sql = "CREATE TABLE IF NOT EXISTS `rpm_mun` (
      `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
      `nome` varchar(45) DEFAULT NULL COMMENT 'Nome Região',
      `unidade` varchar(45) DEFAULT NULL COMMENT 'Unidade Batalhão',
      `id_municipio` int(11) DEFAULT NULL COMMENT 'Identificador do Municipio',
      `id_rpm` int(11) DEFAULT NULL COMMENT 'Identificador da RPM',
      `rdc` varchar(45) DEFAULT NULL COMMENT 'Regial de Defesa Civil',
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=1708 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Regional de DC dos Municipios';
    ";

    try {
      $result =  $conn->query($sql);
      return $result;
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }


  /**
   * Sql Importar de arquivo com script .sql
   * @return void
   */
  public static function importarFileSql($fileSql)
  {

    $conn = new Database();

    $filename = dirname(__DIR__, 2) . "/" . $fileSql . '.sql';

    $sql = '';

    $lines = file($filename);

    foreach ($lines as $line) {
      $sql .= $line;
    }

    try {
      $result = $conn->query($sql);
      return $result
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }


  /** Poderiamos ter atributos aqui */

  /**
   * Este método busca todos os usuários armazenados na base de dados
   *
   * @return   array
   */
  public static function findAll()
  {
    $conn = new Database();
    $result = $conn->query('SELECT * FROM users');
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
    // $result = $conn->query('SELECT * FROM users WHERE id = :ID LIMIT 1', array(
    //   ':ID' => $id
    // ));

    //return $result->fetchAll(PDO::FETCH_ASSOC);
  }
}
