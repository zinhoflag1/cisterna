<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="..\vendor\twbs\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\node_modules\select2\dist\css\select2.css">
    <link ref="stylesheet" href="..\node_modules\toastr\toastr.min.css">
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
        <h2 class="text-center">Formulário de pesquisa <br> caracterização técnica</h2><br>

        <legend class="text-center">Dados do Responsável pelo Imóvel</legend>
        <br>
        <form action="store" method="post" enctype="multipart/form-data" name="frm" id="frm">

            <div class="row p-2 border">
                <label class="lb">1) Latitude/Longitude</label>
                <div class="col-12">
                    <input class="form form-control" type="text" name="lat_long" required maxlength="50"><br>
                </div>
            </div>
            <br>
            <div class="row p-2 border">
                <label class="lb">2) Nome completo:</label>
                <div class="col-12">
                    <input class="form form-control" type="text" name="nome" required><br>

                </div>
            </div>
            <br>
            <div class="row p-2 border">
                <label class="lb">3) CPF - Insira somente os números:</label>
                <div class="col-12">
                    <input class="form form-control" type="text" name="cpf" pattern="[0-9]{11}" maxlength="11" id="cpf" title="Insira apenas números. Ex: 98765432100" required><br>
                    <script>
                        document.getElementById('cpf').addEventListener('input', function() {
                            this.value = this.value.replace(/[^0-9]/g, '').substring(0, 11);
                        });
                    </script>
                </div>
            </div>

            <br>
            <div class="row p-2 border">
                <label class="lb">4) Quantidade de pessoas que residem no imóvel:</label>
                <div class="col-12">
                    <input class="form form-control" type="number" name="qtd_pessoa" min="1" required><br>

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
                        <input type="text" class="form form-control" id="valorReal" name="renda_total" oninput="formatarValor(this)" required><br>
                    </div>

                    <script>
                        function formatarValor(input) {
                            let valor = input.value.replace(/\D/g, '');
                            valor = (valor / 100).toLocaleString('pt-BR', {
                                minimumFractionDigits: 2
                            });
                            input.value = valor;
                        }
                    </script>
                </div>
            </div>

            <br>
            <div class="row p-2 border">
                <label class="lb">6) Marque a situação da residência:</label><br>
                <div class="col-12">
                    <div style="display: flex; flex-wrap: wrap;">
                        <div style="flex: 0 0 50%; max-width: 50%;">
                            <input type="radio" id="propria" name="tipo_moradia" value="Própria" required>
                            <label for="propria">Própria</label><br>
                            <input type="radio" id="alugada" name="tipo_moradia" value="Alugada">
                            <label for="alugada">Alugada</label><br>
                            <input type="radio" id="cedida" name="tipo_moradia" value="Cedida">
                            <label for="cedida">Cedida</label><br>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <legend class="text-center">Localização da imóvel</legend>
            <br>
            <div class="row p-2 border">
                <label class="lb">7) Nome do Município:</label>
                <div class="col-12">
                    <select class="js-example-basic-single form form-control" type=text name="municipio" required>
                        <option value="0">Escolha um Município</option>
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
                <label class="lb">8) Nome da Comunidade:</label>
                <div class="col-12">
                    <input class="form form-control" type=text name="comunidade" required><br>

                </div>
            </div>

            <br>
            <div class="row p-2 border">
                <label class="lb">9) Endereço Completo:</label>
                <div class="col-12">
                    <input class="form form-control" type=text name="endereco"><br>
                </div>
            </div>
            <br>

            <legend class="text-center">Caracterização do imóvel </legend>
            <br>

            <div class="row p-2 border">
                <div class="col-12">
                    <br>
                    <label class="lb">10) Informe a área total do telhado (m²):</label>
                    <input class="form form-control" type="number" min="1" step="0.01" name="area_telhado" required><br>

                </div>
            </div>

            <br>
            <div class="row p-2 border">
                <div class="col-12">
                    <br>
                    <label class="lb">11) Informe o comprimento total das testadas:</label>
                    <input class="form form-control" type="number" name="comp_testada" min="1" step="0.01" required><br>
                </div>
            </div>

            <br>
            <div class="row p-2 border">
                <div class="col-12">
                    <label class="lb">12) Quantas caídas possui o telhado?</label>
                    <input class="form form-control" type="number" name="num_caida" min="1" required><br>
                </div>
            </div>

            <br>
            <label class="lb">13) Marque o material da cobertura do imóvel:</label><br>
            <div class="row p-2 border">
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
                    <input type="checkbox" id="fibrocimento" name="ck_fib_cimento" value="1">
                    <label for="fibrocimento">Fibrocimento</label><br>
                    <input type="checkbox" id="zinco" name="ck_zinco" value="1">
                    <label for="zinco">Zinco</label><br>
                    <input type="checkbox" id="metalica" name="ck_metalico" value="1">
                    <label for="metalica">Metálica</label><br>
                </div>
                <div class="col-12">
                    <label for="descricaoOutros">Outros Descrever:</label><br>
                    <input type="text" id="descricaoOutros" name="descr_out_tp_material" class="form form-control"><br>
                </div>
            </div>

            <br>
            <div class="row p-2 border">
                <div class="col-12">

                    <label for="fogaoLenha">14) Existe fogão a lenha próximo a cozinha?</label><br>
                    <input type="radio" id="fogaoLenhaSim" name="fogao_lenha" value="1" required>
                    <label for="fogaoLenhaSim">Sim</label><br>
                    <input type="radio" id="fogaoLenhaNao" name="fogao_lenha" value="0" required>
                    <label for="fogaoLenhaNao">Não</label><br>

                    <div id="div_metragem_telhado" class="hidden">
                        <label class="lb">14.1) Caso houver fogão a lenha, informe a metragem do <b>telhado</b> a ser
                            desconsiderada :</label>
                        <input class="form form-control" type="number" name="fog_lenha_metrag_telh" step="0.01" value="0">
                    </div><br>


                    <div id="div_comprimento_calha" class="hidden">
                        <label class="lb">14.2) Caso houver fogão a lenha, informe o comprimento da <b>calha</b> a ser
                            desconsiderada :</label>
                        <input class="form form-control" type="number" name="fog_lenha_metrag_calha" step="0.01" value="0">
                    </div>
                </div>
            </div>
            <br>

            <div class="row p-2 border">
                <div class="col-12">

                    <label for="fornecimento_pipa">15) Na residência há fornecimento de água por meio de caminhão
                        pipa?</label><br>
                    <input type="radio" id="aguaSim" name="fornecimento_pipa" value="1">
                    <label for="aguaSim">Sim</label><br>
                    <input type="radio" id="aguaNao" name="fornecimento_pipa" value="0">
                    <label for="aguaNao">Não</label><br><br>


                    <div id="div_fornecimento_agua" class="" style="display: flex; flex-wrap: wrap;">
                        <div style="flex: 0 0 50%; max-width: 50%;">
                            <label class="lb">15.1) Selecione a opção do responsável pelo fornecimento de água:</label><br>

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


                    <label class="lb">&ensp;&ensp;&ensp;<span style="font-size: larger;">•</span> 2 fotos da parte externa da
                        casa, com ênfase no telhado;</label><br>
                    <label class="lb">&ensp;&ensp;&ensp;<span style="font-size: larger;">•</span> 1 foto da parte externa da
                        casa, com ênfase no local da cisterna até a casa;</label><br>
                    <label class="lb">&ensp;&ensp;&ensp;<span style="font-size: larger;">•</span> Outra</label><br><br>
                    <label"><i>Clique no ícone abaixo para registrar as fotos do imóvel</i></label>
                </div>


                <div class="col-12 p-2 border">
                    <!-- We'll transform this input into a pond -->
                    <input type="file" name="img[]" class="filepond img" multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="4" required>
                </div>
                <br>
            </div>

            <br>
            <legend class="text-center">Dados do Agente</legend>
            <br>
            <div class="row p-2 border">
                <label class="lb">Nome do agente responsável pela pesquisa:</label>
                <div class="col-12">
                    <input class="form form-control" type="text" name="agente_resp_pesquisa" required><br>
                </div>
            </div>
            <br>
            <div class="row p-2 border">
                <label class="lb">Matrícula do agente responsável pela pesquisa:</label>
                <div class="col-12">
                    <div id="MatriculaAgente" class="hidden">
                        <input class="form form-control" type="text" name="matricula_agente" style="width: 100%;height: 38px; border: 1px solid #ccc;border-radius: 5px;" required>
                    </div>
                </div>
            </div>


            <br>
            <div class="row p-2 border">
                <label for="observacoes">Observações:</label>
                <div class="col-12">
                    <span>Caracteres Restantes: </span> <span id='caracteres'>0</span>/255
                    <textarea id="observacoes" name="obs" rows="5" cols="50" maxlength="255" style="width: 100%;height: 60px; border: 1px solid #ccc;border-radius: 5px;"></textarea><br><br>
                </div>

            </div>
            <div class="row p-3 border">
                <div class="col-12 text-center">
                    <input class="btn btn-success" type="submit" name="btn" id="btnSalvar" value="Salvar">
                </div>
            </div>
            <br><br>
        </form>
    </div>

</body>

</html>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="..\node_modules\jquery\dist\jquery.min.js"></script>
<script src="..\node_modules\popper.js\dist\umd\popper.min.js"></script>
<script src="..\vendor\twbs\bootstrap\dist\js\bootstrap.min.js"></script>
<script src="..\node_modules\select2\dist\js\select2.full.js"></script>
<script src="..\node_modules\toastr\toastr.min.js"></script>
<!-- Load FilePond library -->
<script>
    $('.js-example-basic-single').select2();
</script>

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

        toastr.error('rere');

        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "showDuration": "800",
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




        /*item 13  */
        $("input[name='fogao_lenha']").change(function() {
            var result = $(this).attr('id');
            if (result == 'fogaoLenhaNao') {
                $("#div_metragem_telhado").hide();
                $("#div_comprimento_calha").hide();
            } else {
                $("#div_metragem_telhado").show();
                $("#div_comprimento_calha").show();
            }
        });

        /* item */
        $("input[name='fornecimento_pipa']").change(function() {
            var result = $(this).attr('id');
            if (result == 'aguaNao') {
                $("#div_fornecimento_agua").hide();
            } else {
                $("#div_fornecimento_agua").show();
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
                url: 'store',
                type: 'POST',
                data: fd,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data.type == 'success') {
                        alert(data.message);
                        window.location.href = 'cadatro/show';
                    } else if (data.type == 'error') {
                        alert(data.message);
                    }
                },
                error: function(data) {
                    console.log(data);

                }
            });

            e.preventDefault();
        });

    });
</script>

</body>

</html>