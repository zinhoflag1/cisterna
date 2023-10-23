<?php

//use \Application\core\Controller;
//use Psr\Http\Message\RequestInterface;

class CadastroController extends Controller
{
  /**
  * chama a view index.php da seguinte forma /user/index   ou somente   /user
  * e retorna para a view todos os usuários no banco de dados.
  */
  public function index()
  {
   
    $this->view('cadastro/index');#, ['users' => $data]);
  }

  /**
  * chama a view show.php da seguinte forma /user/show passando um parâmetro 
  * via URL /user/show/id e é retornado um array contendo (ou não) um determinado
  * usuário. Além disso é verificado se foi passado ou não um id pela url, caso
  * não seja informado, é chamado a view de página não encontrada.
  * @param  int   $id   Identificado do usuário.
  */
  public function show($id = null)
  {
    if (is_numeric($id)) {
      $Users = $this->model('Users');
      $data = $Users::findById($id);
      $this->view('user/show', ['user' => $data]);
    } else {
      $this->pageNotFound();
    }
  }


  /* store */

  public function store(){

    //var_dump($_POST);

    $post = [
            "nome"                      => $_POST["nome"],               
            "cpf"                       => $_POST["cpf"],                
            "qtd_pessoa"                => $_POST["qtd_pessoa"],         
            "renda_total"               => $_POST["renda_total"],          
            "tipo_moradia"              => $_POST["tipo_moradia"],        
            "endereco"                  => $_POST["endereco"],           
            "comunidade"                => $_POST["comunidade"],         
            "municipio"                 => $_POST["municipio"], 
            "area_telhado"              => $_POST["area_telhado"],         
            "comp_testada"              => $_POST["comp_testada"],
            "num_caidas"                => $_POST["num_caidas"],          
            "ck_amianto"                => $_POST["ck_amianto"],    
            "ck_pvc"                    => $_POST["ck_pvc"],    
            "ck_concreto"               => $_POST["ck_concreto"],    
            "ck_ceramica"               => $_POST["ck_ceramica"],    
            "ck_fb_cimento"             => $_POST["ck_fb_cimento"],    
            "ck_zinco"                  => $_POST["ck_zinco"],    
            "ck_metalico"               => $_POST["ck_metalico"],    
            "ck_outros"                 => $_POST["ck_outros"],    
            "ck_descr_out_tp_material"  => $_POST["ck_descr_out_tp_material"],     
            "fogao_lenha"               => $_POST["fogao_lenha"],         
            "fog_lenha_metrag_telh"     => $_POST["fog_lenha_metrag_telh"],    
            "fog_lenha_metrag_calha"    => $_POST["fog_lenha_metrag_calha"],   
            "fornecimento_pipa"         => $_POST["fornecimento_pipa"],           
            "responsavel_fornec_pipa"   => $_POST["responsavel_fornec_pipa"],
            "agente_resp_pesquisa"      => $_POST["agente_resp_pesquisa"],         
            "matricula_agente"          => $_POST["matricula_agente"],    
            "obs"                       => $_POST["obs"]
  ];



    $model = $this->model('Cadastros');
    
    //$model->setNome = $post['nome'];
    
    //var_dump($model);

    var_dump($model->store($post));

    die();

  //     $nome = isset($_POST['name']) ? $_POST['name'] : null;
  // $cpf  = isset($_POST['cpf'])  ? $_POST['cpf']  : null;
  // $btn  = isset($_POST['btn'])  ? $_POST['btn']  : null;
  // $files = isset($_POST['files']) ? $_POST['files'] : null;

  // if ($btn) {

  //   if (isset($files)) {
  //     foreach ($files as $key => $file) {
  //       $fileName = 'img' . $cpf . "-" . time() . $key . '.' . $file->getClientOriginalExtension();
  //       move_uploaded_file($file, 'img/' . $fileName);
  //     }
  //   }
  // }





  }


}
