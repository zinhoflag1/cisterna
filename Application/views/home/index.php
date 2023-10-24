
<!doctype html>
<html lang="pt-Br">

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
      <div class="col-12 p-3">
        <a class="btn btn-primary btn-sm" href="admin">Admin</a>
        <a class="btn btn-primary btn-sm" href="cadastro">Cadastro</a>

        <div class="row p-2">
          <div class="col-6 text-center">
            Total de Registro Cadastrados<br>
            <h3><?=$data['total_registros'];?></h3>
          </div>
          <div class="col-6">
            -
          </div>
        </div>
        <br>

        <div class="row">
          <div class="col-12 responsive">

            <table class="table table-bordered table-striped table-condensend table-sm">
              <tr>
                <td>#</td>
                <td>Nome</td>
                <td>CPF</td>
                <td>Renda Familiar</td>
                <td>Municipio</td>
                <td>Comunidade</td>
              </tr>

              <?php

                foreach ($data['registros'] as $key => $registro) {
                  print "</tr>";
                  print "<td>".$key."</td>";
                  print "<td>".$registro['nome']."</td>";
                  print "<td>".$registro['cpf']."</td>";
                  print "<td>".$registro['renda_total']."</td>";
                  print "<td>".$registro['municipio']."</td>";
                  print "<td>".$registro['comunidade']."</td>";
                  print "</tr>";
                  
                }

              ?>

            </table>

          </div>
        </div>


      </div>
    </div>
  </div>




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
          url: 'process.php',
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

  <?php

  $nome = isset($_POST['name']) ? $_POST['name'] : null;
  $cpf  = isset($_POST['cpf'])  ? $_POST['cpf']  : null;
  $btn  = isset($_POST['btn'])  ? $_POST['btn']  : null;
  $files = isset($_POST['files']) ? $_POST['files'] : null;

  if ($btn) {

    if (isset($files)) {
      foreach ($files as $key => $file) {
        $fileName = 'img' . $cpf . "-" . time() . $key . '.' . $file->getClientOriginalExtension();
        move_uploaded_file($file, 'img/' . $fileName);
      }
    }
  }

  ?>

</body>



</html>