<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="..\..\vendor\twbs\bootstrap\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\..\node_modules\select2\dist\css\select2.css">
    <link ref="stylesheet" href="..\..\node_modules\toastr\toastr.min.css">
    <!-- Filepond stylesheet -->
    <link href="..\..\node_modules\filepond\dist\filepond.css" rel="stylesheet">

    <title>Projeto - GMG/CEDEC</title>
</head>

<body>

    <div class="container">
        <div class="row p-2">
            <div class="col-12 text-center"><a class="btn btn-success btn-sm" href="/home">Voltar</a></div>
        </div>

        <h4 class="text-center">Visualização de Registro</h4><br><br>
        <span id="msg">-</span>
        <br>


        <legend class="text-center">Dados do responsável pelo imóvel</legend>
        <br>

        <?php

        foreach ($data['campos'] as $key => $value) {

            print "<div class='row p-2'>
                        <div class='col-4 border'>
                                " . $value['column_comment'] . "
                        </div>
                        <div class='col-8 border'>
                            " . $data['cadastro'][$value['column_name']] . "
                        </div>
                    </div>";
        }

        ?>

        <legend class="text-center">Imagens Relacionadas</legend>

        <?php

        $img_path = dir($_SERVER['DOCUMENT_ROOT']. "/imagens/" . $data['cadastro']['cpf']);

        print "<div class='row text-center'>";
            while ($file = $img_path->read()) {


                if ($file != "." && $file != "..") {
        print "<div class='col-12 col-lg-6 border p-2 text-center'>
                                <img class='img-fluid rounded' src='/imagens/".$data['cadastro']['cpf']."/" . $file . "'/>
                            </div>";
                }
            }
        print "</div>";
        ?>

    </div>

</body>

</html>