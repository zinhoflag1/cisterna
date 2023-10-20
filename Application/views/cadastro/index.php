<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="..\vendor\twbs\bootstrap\dist\css\bootstrap.min.css">
    <!-- Filepond stylesheet -->
    <link href="..\node_modules\filepond\dist\filepond.css" rel="stylesheet">

    <title>Projeto - GMG/CEDEC</title>
</head>

<body>

    <div class="container">
      <div class="row p-2">
        <div class="col-12 text-center"><a class="btn btn-success btn-sm" href="home">Voltar</a></div>
      </div>
        <h4 class="text-center">Formulário de pesquisa para caracterização técnica</h4><br><br>
        <h7><b>Dados do responsável pelo imóvel</b></h7>
        <form action="cadastro/store" method="post" enctype="multipart/form-data" name="frm" id="frm">
            <div class="row p-2">

                <div class="col-12">
                    <label>1) Nome completo:</label>
                    <input class="form form-control" type="text" name="nome" required><br>


                    <label>2) CPF - Insira somente os números:</label>
                    <input class="form form-control" type="text" name="cpf" pattern="[0-9]{11}" maxlength="11" id="cpf"
                        title="Insira apenas números. Ex: 98765432100" required><br>

                    <script>
                    document.getElementById('cpf').addEventListener('input', function() {
                        this.value = this.value.replace(/[^0-9]/g, '').substring(0, 11);
                    });
                    </script>

                    <label>3) Quantidade de pessoas que residem no imóvel:</label>
                    <input class="form form-control" type="number" name="qtd_pessoa" min="1" required><br>


                    <label>4) Renda familiar:</label>
                    <input class="form form-control" id="valorReal" name="renda_total" oninput="formatarValor(this)"
                        required><br>

                    <script>
                    function formatarValor(input) {
                        let valor = input.value.replace(/\D/g, '');
                        valor = (valor / 100).toLocaleString('pt-BR', {
                            minimumFractionDigits: 2
                        });
                        valor = `R$ ${valor}`;
                        input.value = valor;
                    }
                    </script>

                    <div style="display: flex; flex-wrap: wrap;">
                        <div style="flex: 0 0 50%; max-width: 50%;">
                            <label>5) Marque a situação da residência:</label><br>
                            <input type="radio" id="propria" name="tipo_moradia" value="Própria" required>
                            <label for="propria">Própria</label><br>
                            <input type="radio" id="alugada" name="tipo_moradia" value="Alugada">
                            <label for="alugada">Alugada</label><br>
                            <input type="radio" id="cedida" name="tipo_moradia" value="Cedida">
                            <label for="cedida">Cedida</label><br>
                        </div>
                    </div><br>


                    <h7><b>Localização da imóvel</b></h7><br>
                    <label>6) Endereço completo:</label>
                    <input class="form form-control" type=text name="endereco" required><br>

                    <label>7) Comunidade:</label>
                    <input class="form form-control" type=text name="comunidade" required><br>

                    <label>8) Município:</label>
                    <input class="form form-control" type=text name="municipio" required><br>



                    <h7><b>Caracterização do imóvel </b></h3><br>

                        <label>9) Informe a área total do telhado (m²):</label>
                        <input class="form form-control" type="number" min="1" step="0.01" name="area_telhado" required><br>


                        <label>10) Informe o comprimento total das testadas:</label>
                        <input class="form form-control" type="number" name="comp_testada" min="1" step="0.01"
                            required><br>


                        <label>11) Quantas caídas possui o telhado?</label>
                        <input class="form form-control" type="number" name="num_caidas" min="1" required><br>


                        <div class="row">
                            <div class="col-12">
                                <label>12) Marque o material da cobertura do imóvel:</label><br>

                            </div>
                            <div class="col-6">
                                <input type="checkbox" id="pvc" name="ck_pvc" value="1">
                                <label for="pvc">PVC</label><br>
                                <input type="checkbox" id="amianto" name="ck_amianto" value="1">
                                <label for="amianto">Amianto</label><br>
                                <input type="checkbox" id="concreto" name="ck_concreto" value="1">
                                <label for="concreto">Concreto</label><br>
                                <input type="checkbox" id="outros" name="ck_outros" value="1">
                                <label for="outros">Outros</label><br>

                            </div>
                            <div class="col-6">
                                <input type="checkbox" id="ceramica" name="ck_ceramica" value="1">
                                <label for="ceramica">Cerâmica</label><br>
                                <input type="checkbox" id="fibrocimento" name="ck_fb_cimento" value="1">
                                <label for="fibrocimento">Fibrocimento</label><br>
                                <input type="checkbox" id="zinco" name="ck_zinco" value="1">
                                <label for="zinco">Zinco</label><br>
                                <input type="checkbox" id="metalica" name="ck_metalico" value="1">
                                <label for="metalica">Metálica</label><br>
                            </div>
                            <div class="col-12">
                                <label for="descricaoOutros">Outros Descrever:</label><br>
                                <input type="text" id="descricaoOutros" name="ck_descr_out_tp_material"
                                    class="form form-control"><br>
                            </div>
                        </div>


                            <label for="fogaoLenha">13) Existe fogão a lenha próximo a cozinha?</label><br>
                            <input type="radio" id="fogaoLenhaSim" name="fogao_lenha" value="Sim" required>
                            <label for="fogaoLenhaSim">Sim</label><br>
                            <input type="radio" id="fogaoLenhaNao" name="fogao_lenha" value="Não" required>
                            <label for="fogaoLenhaNao">Não</label><br><br>

                        



                        <div id="dv_metragem_telhado" class="hidden">
                            <label>14) Caso houver fogão a lenha, informe a metragem do <b>telhado</b> a ser
                                desconsiderada :</label>
                            <input class="form form-control" type="number" name="fog_lenha_metrag_telh" step="0.01">
                        </div><br>


                        <div id="comprimentoCalha" class="hidden">
                            <label>15) Caso houver fogão a lenha, informe o comprimento da <b>calha</b> a ser
                                desconsiderada :</label>
                            <input class="form form-control" type="number" name="fog_lenha_metrag_calha" step="0.01">
                        </div><br>


                        <label for="fornecimento_pipa">16) Na residência há fornecimento de água por meio de caminhão
                            pipa?</label><br>
                        <input type="radio" id="aguaSim" name="fornecimento_pipa" value="Sim" >
                        <label for="aguaSim">Sim</label><br>
                        <input type="radio" id="aguaNao" name="fornecimento_pipa" value="Não" >
                        <label for="aguaNao">Não</label><br><br>


                        <div style="display: flex; flex-wrap: wrap;">
                            <div style="flex: 0 0 50%; max-width: 50%;">
                                <label>17) Selecione a opção do responsável pelo fornecimento de água:</label><br>
                                
                                <input type="radio" id="DefesaCivil" name="responsavel_fornec_pipa" value="DefesaCivil">
                                <label for="DefesaCivil">Defesa Civil</label>
                                <br>
                                <input type="radio" id="Exercito" name="responsavel_fornec_pipa" value="Exercito">
                                <label for="Exercito">Exército</label>
                                <br>
                                <input type="radio" id="Particular" name="responsavel_fornec_pipa" value="Particular">
                                <label for="Particular">Particular</label>
                                <br>
                                <input type="radio" id="Prefeitura" name="responsavel_fornec_pipa" value="Prefeitura">
                                <label for="Prefeitura">Prefeitura</label>
                                <br>
                                <input type="radio" id="Outros" name="responsavel_fornec_pipa" value="Outros">
                                <label for="Outros">Outros</label>
                                <br>
                            </div>
                        </div><br>


                        <label>18) São obrigatórias 3 (três) fotos do imóvel e 1 (uma) opcional, sendo: </label><br>


                        <label>&ensp;&ensp;&ensp;<span style="font-size: larger;">•</span> 2 fotos da parte externa da
                            casa, com ênfase no telhado;</label><br>
                        <label>&ensp;&ensp;&ensp;<span style="font-size: larger;">•</span> 1 foto da parte externa da
                            casa, com ênfase no local da cisterna até a casa;</label><br>
                        <label>&ensp;&ensp;&ensp;<span style="font-size: larger;">•</span> Outra</label><br><br>
                        <label"><i>Clique no ícone abaixo para registrar as fotos do imóvel</i></label>
                </div>

                <div class="col-12">
                    <!-- We'll transform this input into a pond -->
                    <input type="file" name="img[]" class="filepond img" multiple data-allow-reorder="true"
                        data-max-file-size="3MB" data-max-files="4">
                </div>
                <br><br><br>



                <div class="container">
                    <h7><b>Dados do agente </b></h7><br>
                    <div class="col-12">
                        <label>Nome do agente responsável pela pesquisa:</label>
                        <input class="form form-control" type="text" name="agente_resp_pesquisa" required><br>

                        <div id="MatriculaAgente" class="hidden">
                            <label>Matrícula do agente responsável pela pesquisa:</label>
                            <input class="form form-control" type="text" name="matricula_agente"
                                style="width: 100%;height: 38px; border: 1px solid #ccc;border-radius: 5px;" required>
                        </div><br>





                        <h7><b><label for="observacoes">Observações:</label>
                        </h7>
                        </b><br>

                        <textarea id="observacoes" name="obs" rows="4" cols="50"
                            style="width: 100%;height: 60px; border: 1px solid #ccc;border-radius: 5px;"></textarea><br><br>


                        <input class="btn btn-success" type="submit" name="btn" value="Salvar"><br><br>

                    </div>
        </form>
    </div>

</body>

</html>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="..\node_modules\jquery\dist\jquery.min.js"></script>
<script src="..\node_modules\popper.js\dist\umd\popper.min.js"></script>
<script src="..\vendor\twbs\bootstrap\dist\js\bootstrap.min.js"></script>
<!-- Load FilePond library -->

<script src="..\node_modules\filepond\dist\filepond.min.js"></script>
<script src="..\node_modules\jquery-filepond\filepond.jquery.js"></script>

<link href="..\node_modules\filepond\dist\filepond.css" rel="stylesheet" />
<link href="..\node_modules\filepond-plugin-image-preview\dist\filepond-plugin-image-preview.min.css" rel="stylesheet" />
<script src="..\node_modules\filepond-plugin-image-preview\dist\filepond-plugin-image-preview.min.js"></script>
<script src="..\node_modules\filepond-plugin-file-validate-size\dist\filepond-plugin-file-validate-size.min.js"></script>
<script src="..\node_modules\filepond-plugin-file-rename\dist\filepond-plugin-file-rename.js"></script>
<script type='modulo' src="..\node_modules\filepond\locale\pt-br.js"></script>

<script>
$.fn.filepond.registerPlugin(FilePondPluginFileValidateSize);
//$.fn.filepond.registerPlugin(FilePondPluginImagePreview);
//$.fn.filepond.registerPlugin(FilePondPluginFileRename);

$.fn.filepond.setDefaults({
    maxFileSize: '3MB',
});


$(document).ready(function() {

  $("input[name='fogaoLenha']").change(function(){
    
    var result = $(this).attr('id');
    if(result == 'fogaoLenhaNao'){
      $("#metragemTelhado").hide();
      $("#comprimentoCalha").hide();
    }else {
      $("#metragemTelhado").show();
      $("#comprimentoCalha").show();
    }

  });

    $('.img').filepond({
        allowMultiple: true,
        allowImagePreview: false,
        maxFiles: '4',
        locale: 'pt_BR',
        maxParallelUploads: '2',
        credits: 'CEDEC-MG',
        labelIdle: 'Arraste o arquivo ou <span class="filepond--label-action"> Clique Aqui </span><br> Max. 4 arquivos',
    })

    $("#frm").submit(function(e) {
        var fd = new FormData(this);
        // append files array into the form data
        pondFiles = $('.img').filepond('getFiles');
        for (var i = 0; i < pondFiles.length; i++) {
            fd.append('file[]', pondFiles[i].file);
        }

        $.ajax({
            url: 'cadastro/store',
            type: 'POST',
            data: fd,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                //    todo the logic
                // remove the files from filepond, etc
            },
            error: function(data) {
                //    todo the logic
            }
        });
        e.preventDefault();
    });

});
</script>


</body>



</html>