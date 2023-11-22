<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="..\..\vendor\twbs\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\..\node_modules\select2\dist\css\select2.css">
    <!-- Filepond stylesheet -->
    <link href="..\node_modules\filepond\dist\filepond.css" rel="stylesheet">
    <style>
        body {
            background-color: #F7F9D3;
            color: #596988;
        }

        label.lb {
            font-weight: bold;
        }
    </style>


    <title>Projeto - GMG/CEDEC</title>
</head>

<body>

    <div class="container">
        <div class="row p-2">
            <div class="col-12 text-center"><a class="btn btn-success btn-sm" href="/home">Voltar</a></div>
        </div>
        <h2 class="text-center">Formulário de Pesquisa <br>Caracterização Técnica</h2><br><br>
        <span id="msg">-</span>
        <br>


        <legend class="text-center">Dados do responsável pelo imóvel</legend>
        <br>
        <form action="cadastro/store" method="post" enctype="multipart/form-data" name="frm" id="frm">

            <div class="row p-2 border">
                <label class="lb">1) Latitude / Longitude :</label>
                <div class="col-12">
                    <input class="form form-control" type="text" name="lat_long" required maxlength="50" value="<?= $data['cadastro']['lat_long'] ?>"><br>
                    <input type="hidden" name="id" required maxlength="11" value="<?= $data['cadastro']['id'] ?>"><br>
                </div>
            </div>
            <br>
            <div class="row p-2 border">
                <label class="lb">2) Nome completo :</label>
                <div class="col-12">
                    <input class="form form-control" type="text" name="nome" required value="<?= $data['cadastro']['nome'] ?>"><br>

                </div>
            </div>
            <br>
            <div class="row p-2 border">
                <label class="lb">3) CPF :</label> <span style="font-size: 11pt">&nbsp;<i>(Insira somente os números)</i></span>
                <div class="col-12">
                    <input class="form form-control" type="text" name="cpf" pattern="[0-9]{11}" maxlength="11" id="cpf" title="Insira apenas números. Ex: 98765432100" required value="<?= $data['cadastro']['cpf'] ?>"><br>
                    <script>
                        document.getElementById('cpf').addEventListener('input', function() {
                            this.value = this.value.replace(/[^0-9]/g, '').substring(0, 11);
                        });
                    </script>
                </div>
            </div>

            <br>
            <div class="row p-2 border">
                <label class="lb">4) Quantidade de pessoas que residem no imóvel :</label>
                <div class="col-12">
                    <input class="form form-control" type="number" name="qtd_pessoa" min="1" required value="<?= $data['cadastro']['qtd_pessoa'] ?>"><br>

                </div>
            </div>
            <br>
            <div class="row p-2 border">
                <label class="lb">5) Renda familiar:</label>
                <div class="col-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                        </div>
                        <input type="text" class="form form-control" id="renda_total" name="renda_total" required value="<?= $data['cadastro']['renda_total'] ?>"><br>
                    </div>

                </div>
            </div>

            <br>
            <div class="row p-2 border">
                <label class="lb">6) Marque a situação da residência :</label><br>
                <div class="col-12">
                    <div style="display: flex; flex-wrap: wrap;">
                        <div style="flex: 0 0 50%; max-width: 50%;">
                            <input type="radio" id="propria" name="tipo_moradia" value="Própria" required <?= (($data['cadastro']['tipo_moradia'] == 'Própria') ? 'checked' : '') ?>>
                            <label for="propria">Própria</label><br>
                            <input type="radio" id="alugada" name="tipo_moradia" value="Alugada" <?= (($data['cadastro']['tipo_moradia'] == 'Alugada') ? 'checked' : '') ?>>
                            <label for="alugada">Alugada</label><br>
                            <input type="radio" id="cedida" name="tipo_moradia" value="Cedida" <?= (($data['cadastro']['tipo_moradia'] == 'Cedida') ? 'checked' : '') ?>>
                            <label for="cedida">Cedida</label><br>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <legend class="text-center">Localização da imóvel</legend>
            <br>
            <div class="row p-2 border">
                <label class="lb">7) Nome do Município :</label>
                <div class="col-12">
                    <select class="js-example-basic-single form form-control" type=text name="municipio" required>
                        <option value="<?= $data['cadastro']['municipio'] ?>"><?= $data['cadastro']['municipio'] ?></option>
                        <?php
                        foreach ($data['municipios'] as $key => $municipio) {
                            print "<option value=" . $municipio['id'] . ">" . $municipio['nome'] . "</option>";
                        }
                        ?>
                    </select>
                    <br><br>
                </div>
            </div>
            <br>

            <div class="row p-2 border">
                <label class="lb">8) Nome da Comunidade :</label>
                <div class="col-12">
                    <input class="form form-control" type=text name="comunidade" required value="<?= $data['cadastro']['comunidade'] ?>"><br>

                </div>
            </div>

            <br>
            <div class="row p-2 border">
                <label class="lb">9) Endereço Completo :</label>
                <div class="col-12">
                    <input class="form form-control" type=text name="endereco" required value="<?= $data['cadastro']['endereco'] ?>"><br>
                </div>
            </div>
            <br>

            <legend class="text-center">Caracterização do imóvel </legend>
            <br>

            <div class="row p-2 border">
                <div class="col-12">
                    <br>
                    <label class="lb">10) Informe a área total do telhado : &nbsp;</label>
                    </label><span style='font-size: 11pt'><i>( m² )</i></span>
                    <input class="form form-control" type="number" min="1" step="0.01" name="area_telhado" required value="<?= $data['cadastro']['area_telhado'] ?>"><br>

                </div>
            </div>

            <br>
            <div class="row p-2 border">
                <div class="col-12">
                    <br>
                    <label class="lb">11) Informe o comprimento total das testadas : &nbsp;</label>
                    <span style='font-size: 11pt'><i>( m )</i></span>
                    <input class="form form-control" type="number" name="comp_testada" min="1" step="0.01" required value="<?= $data['cadastro']['comp_testada'] ?>"><br>
                </div>
            </div>

            <br>
            <div class="row p-2 border">
                <div class="col-12">
                    <label class="lb">12) Quantas caídas possui o telhado ?</label>
                    <input class="form form-control" type="number" name="num_caida" min="1" required value="<?= $data['cadastro']['num_caida'] ?>"><br>
                </div>
            </div>

            <br>
            <label class="lb">13) Marque o material da cobertura do imóvel :</label><br>
            <div class="row p-2 border">
                <div class="col-6">
                    <input type="checkbox" id="pvc" name="ck_pvc" value="1" <?= (($data['cadastro']['ck_pvc'] == '1') ? 'checked' : '') ?>>
                    <label for="pvc">PVC</label><br>
                    <input type="checkbox" id="amianto" name="ck_amianto" value="1" <?= (($data['cadastro']['ck_amianto'] == '1') ? 'checked' : '') ?>>
                    <label for="amianto">Amianto</label><br>
                    <input type="checkbox" id="concreto" name="ck_concreto" value="1" <?= (($data['cadastro']['ck_concreto'] == '1') ? 'checked' : '') ?>>
                    <label for="concreto">Concreto</label><br>
                    <input type="checkbox" id="outros" name="ck_outros" value="1" <?= (($data['cadastro']['ck_outros'] == '1') ? 'checked' : '') ?>>
                    <label for="outros">Outros</label><br>
                </div>
                <div class="col-6">
                    <input type="checkbox" id="ceramica" name="ck_ceramica" value="1" <?= (($data['cadastro']['ck_ceramica'] == '1') ? 'checked' : '') ?>>
                    <label for="ceramica">Cerâmica</label><br>
                    <input type="checkbox" id="fibrocimento" name="ck_fib_cimento" value="1" <?= (($data['cadastro']['ck_fib_cimento'] == '1') ? 'checked' : '') ?>>
                    <label for="fibrocimento">Fibrocimento</label><br>
                    <input type="checkbox" id="zinco" name="ck_zinco" value="1" <?= (($data['cadastro']['ck_zinco'] == '1') ? 'checked' : '') ?>>
                    <label for="zinco">Zinco</label><br>
                    <input type="checkbox" id="metalica" name="ck_metalico" value="1" <?= (($data['cadastro']['ck_metalico'] == '1') ? 'checked' : '') ?>>
                    <label for="metalica">Metálica</label><br>
                </div>
                <div class="col-12">
                    <label for="descricaoOutros">Outros Descrever:</label><br>
                    <input type="text" id="descricaoOutros" name="descr_out_tp_material" class="form form-control" value="<?= $data['cadastro']['descr_out_tp_material'] ?>"><br>
                </div>
            </div>

            <br>
            <div class="row p-2 border">
                <div class="col-12">

                    <label for="fogaoLenha">14) Existe fogão a lenha próximo a cozinha ?</label><br>
                    <input type="radio" id="fogaoLenhaSim" name="fogao_lenha" value="1" required <?= (($data['cadastro']['fogao_lenha'] == 1) ? "checked" : "") ?>>
                    <label for="fogaoLenhaSim">Sim</label><br>
                    <input type="radio" id="fogaoLenhaNao" name="fogao_lenha" value="0" <?= (($data['cadastro']['fogao_lenha'] == 0) ? "checked" : "") ?>>
                    <label for="fogaoLenhaNao">Não</label><br>

                    <div id="div_metragem_telhado" class="hidden">
                        <label class="lb">14.1) Caso houver fogão a lenha, informe a metragem do <b>telhado</b> a ser
                            desconsiderado :</label>
                        <input class="form form-control" type="number" name="fog_lenha_metrag_telh" step="0.01" value="<?= $data['cadastro']['fog_lenha_metrag_telh'] ?>">
                    </div><br>


                    <div id="div_comprimento_calha" class="hidden">
                        <label class="lb">14.2) Caso houver fogão a lenha, informe o comprimento da <b>calha</b> a ser
                            desconsiderada :</label>
                        <input class="form form-control" type="number" name="fog_lenha_metrag_calha" step="0.01" value="<?= $data['cadastro']['fog_lenha_metrag_calha'] ?>">
                    </div>
                </div>
            </div>
            <br>

            <div class="row p-2 border">
                <div class="col-12">

                    <label for="fornecimento_pipa">15) Na residência há fornecimento de água por meio de caminhão
                        pipa ?</label><br>
                    <input type="radio" id="aguaSim" name="fornecimento_pipa" value="1" <?= (($data['cadastro']['fornecimento_pipa'] == 1) ? "checked" : "") ?>>
                    <label for="aguaSim">Sim</label><br>
                    <input type="radio" id="aguaNao" name="fornecimento_pipa" value="0" <?= (($data['cadastro']['fornecimento_pipa'] == 0) ? "checked" : "") ?>>
                    <label for="aguaNao">Não</label><br><br>


                    <div id="div_fornecimento_agua" class="" style="display: flex; flex-wrap: wrap;">
                        <div style="flex: 0 0 50%; max-width: 50%;">
                            <label class="lb">15.1) Selecione a opção do responsável pelo fornecimento de água :</label><br>

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
                    </div>
                </div>
            </div><br>

            <div class="row p-2 border">
                <div class="col-12">
                    <label class="lb">16) São obrigatórias 3 (três) fotos do imóvel e 1 (uma) opcional, sendo: </label><br>


                    <label">&ensp;&ensp;&ensp;<span style="font-size: larger;">•</span> 2 fotos da parte externa da
                        casa, com ênfase no telhado;</label><br>
                        <label>&ensp;&ensp;&ensp;<span style="font-size: larger;">•</span> 1 foto da parte externa da
                            casa, com ênfase no local da cisterna até a casa;</label><br>
                        <label>&ensp;&ensp;&ensp;<span style="font-size: larger;">•</span> Outra que julgar necessário
                        </label><br><br>
                        <label"><i>Clique no ícone abaixo para registrar as fotos do imóvel</i></label>
                </div>


                <div class="col-12 p-2 border">
                    <!-- We'll transform this input into a pond -->
                    <input type="file" name="img[]" class="filepond img" multiple data-allow-reorder="true" data-max-file-size="3MB">
                </div>
                <br>
            </div>

            <br>
            <legend class="text-center">Dados do Agente</legend>
            <br>
            <div class="row p-2 border">
                <label class="lb">Nome do agente responsável pela pesquisa:</label>
                <div class="col-12">
                    <input class="form form-control" type="text" name="agente_resp_pesquisa" required value="<?= $data['cadastro']['agente_resp_pesquisa'] ?>"><br>

                    <div id="MatriculaAgente" class="hidden">
                        <label class="lb">Matrícula do agente responsável pela pesquisa:</label>
                        <input class="form form-control" type="text" name="matricula_agente" style="width: 100%;height: 38px; border: 1px solid #ccc;border-radius: 5px;" required value="<?= $data['cadastro']['cpf'] ?>">
                    </div><br>

                </div>
            </div>


            <br>
            <div class="row p-2 border">
                <label for="observacoes">Observações:</label>
                <div class="col-12">
                    <span>Caracteres Restantes: </span> <span id='caracteres'>0</span>/255
                    <textarea id="observacoes" name="obs" rows="5" cols="50" maxlength="255" style="width: 100%;height: 60px; border: 1px solid #ccc;border-radius: 5px;"><?= $data['cadastro']['obs'] ?></textarea><br><br>
                </div>

            </div>


            <legend class="text-center">Imagens Relacionadas</legend>

            <?php



            $img_path = dir($_SERVER['DOCUMENT_ROOT']. "/imagens/" . $data['cadastro']['cpf']);

            print "<div class='row p-2'>";

            $num_imagen = 0;
            while ($file = $img_path->read()) {

                if ($file != "." && $file != "..") {

                    $num_imagen++;
                    print "<div class='col border p-2 text-center'>
                                <img class='img-fluid rounded' src='/imagens/" . $data['cadastro']['cpf'] . "/" . $file . "'/>
                                <br><br>
                                <a data-file='" . $file . "' data-folder='" . $data['cadastro']['cpf'] . "' name='lk_delete' class='btn btn-danger btn-sm'>Remover</a>
                            </div>&nbsp;";
                }
            }
            print "</div>";
            ?>

            <div class="row p-3 border">
                <div class="col-12 text-center">
                    <input class="btn btn-warning" type="submit" name="btn" id="btnSalvar" value="Atualizar">
                </div>
            </div>
            <br><br>
        </form>
    </div>

</body>

</html>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="..\..\node_modules\jquery\dist\jquery.min.js"></script>
<script src="..\..\node_modules\popper.js\dist\umd\popper.min.js"></script>
<script src="..\..\vendor\twbs\bootstrap\dist\js\bootstrap.min.js"></script>
<script src="..\..\node_modules\select2\dist\js\select2.full.js"></script>
<!-- Load FilePond library -->
<script>
    $('.js-example-basic-single').select2();
</script>

<script src="..\..\node_modules\filepond\dist\filepond.min.js"></script>
<script src="..\..\node_modules\jquery-filepond\filepond.jquery.js"></script>

<link href="..\..\node_modules\filepond\dist\filepond.css" rel="stylesheet" />
<link href="..\..\node_modules\filepond-plugin-image-preview\dist\filepond-plugin-image-preview.min.css" rel="stylesheet" />
<script src="..\..\node_modules\filepond-plugin-image-preview\dist\filepond-plugin-image-preview.min.js"></script>
<script src="..\..\node_modules\filepond-plugin-file-validate-size\dist\filepond-plugin-file-validate-size.min.js"></script>
<script src="..\..\node_modules\filepond-plugin-file-rename\dist\filepond-plugin-file-rename.js"></script>
<script type='modulo' src="..\..\node_modules\filepond\locale\pt-br.js"></script>

<script>
    $.fn.filepond.registerPlugin(FilePondPluginFileValidateSize);
    //$.fn.filepond.registerPlugin(FilePondPluginImagePreview);
    //$.fn.filepond.registerPlugin(FilePondPluginFileRename);

    $.fn.filepond.setDefaults({
        maxFileSize: '3MB',
    });


    $(document).ready(function() {

        let valor1 = $("#renda_total").val().replace(/\D/g, '');
            valor1 = (valor1 / 100).toLocaleString('pt-BR', {
                minimumFractionDigits: 2
            });
            $("#renda_total").val(valor1);

        $("#renda_total").blur(function(){
            let valor = $(this).val().replace(/\D/g, '');
            valor = (valor / 100).toLocaleString('pt-BR', {
                minimumFractionDigits: 2
            });
            this.value = valor;

        })


        $('#outros').click(function() {
            if ($('#outros').attr('checked', true)) {
                $("#descricaoOutros").attr('required', true);
            } else {
                $("#descricaoOutros").attr('required', false);
            }
        });

        var result = '<?= $data['result'] ?>';
        if (result === true) {
            toastr.options.closeMethod = 'fadeOut';
            toastr.options.closeDuration = 300;
            toastr.options.closeEasing = 'swing';

            toastr.success('We do have the Kapua suite available.', 'Turtle Bay Resort', {
                timeOut: 5000
            })
        }


        $("#observacoes").keyup(function() {
            var leng = $("#observacoes").val().length;
            $("#caracteres").text(leng);

        });

        var x = document.getElementById("msg");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
                //x.innerText = "opa";
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            x.innerHTML = "Latitude: " + position.coords.latitude +
                " Longitude: " + position.coords.longitude + " <br>Precisão :" + position.coords.accuracy
        }

        /* A carregar form edit opção 14 */
        var result1 = $("input[name='fogao_lenha']:checked").attr('id');
        if (result1 == 'fogaoLenhaNao') {
            $("#div_metragem_telhado").hide();
            $("#div_comprimento_calha").hide();
        } else {
            $("#div_metragem_telhado").show();
            $("#div_comprimento_calha").show();
        }

        /*item 13  */
        $("input[name='fogao_lenha']").bind('change', function() {

            var result = $("input[name='fogao_lenha']:checked").attr('id');
            if (result == 'fogaoLenhaNao') {
                $("#div_metragem_telhado").hide();
                $("#div_comprimento_calha").hide();
            } else {
                $("#div_metragem_telhado").show();
                $("#div_comprimento_calha").show();
            }
        });


        /* A carregar form edit opção 15 */
        var result2 = $("input[name='fornecimento_pipa']:checked").attr('id');
        if (result2 == 'aguaNao') {
            $("#div_fornecimento_agua").hide();
        } else {
            $("#div_fornecimento_agua").show();
        }

        /* item */
        $("input[name='fornecimento_pipa']").change(function() {
            var result = $("input[name='fornecimento_pipa']:checked").attr('id');
            if (result == 'aguaNao') {
                $("#div_fornecimento_agua").hide();
            } else {
                $("#div_fornecimento_agua").show();
            }
        });

        $('.img').filepond({
            allowMultiple: true,
            allowImagePreview: false,
            maxFiles: '<?= (4 - $num_imagen) ?>',
            locale: 'pt_BR',
            maxParallelUploads: '2',
            credits: 'CEDEC-MG',
            labelIdle: 'Arraste o arquivo ou <span class="filepond--label-action"> Clique Aqui </span><br> Max. 4 arquivos',
        })


        $("a[name='lk_delete']").click(function(e) {
            var result = confirm('Deseja Apagar este registro ?');

            var file = "/imagens/" + $(this).data('folder') + "/" + $(this).data('file');

            //console.log(file);

            if (result) {

                var form = new FormData();
                form.append('file', file)

                $.ajax({
                    url: '/cadastro/delete',
                    type: 'POST',
                    data: form,
                    //dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(e) {
                        //window.location.reload();
                        console.log(e+"opa");
                    },
                    error: function(e) {
                        //    todo the logic
                        console.log(e);
                    }
                });
            }


        });

        $("#frm").submit(function(e) {

            var fd = new FormData(this);
            // append files array into the form data
            pondFiles = $('.img').filepond('getFiles');
            for (var i = 0; i < pondFiles.length; i++) {
                fd.append('file[]', pondFiles[i].file);
            }

            $.ajax({
                url: '/cadastro/update',
                type: 'POST',
                data: fd,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if (data.type == 'success') {
                        alert(data.message);
                        window.location.href = '/cadastro/show/'+data.id;
                    } else if (data.type == 'error') {
                        alert('Ocorreu um erro ');
                    }
                },
                error: function(data) {
                    console.log(data);
                    alert(data);
                }
            });

            e.preventDefault();


        });


    });

</script>

</body>

</html>