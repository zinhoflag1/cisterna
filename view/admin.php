<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Filepond stylesheet -->
  <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">

  <title>Projeto - GMG/CEDEC</title>
</head>

<body>

  <div class="container">
    <div class="row p-2">
      <div class="col-12 p-3">
        <form action="#" method="post" enctype="multipart/form-data" name="frm" id="frm">

          <label>Nome</label>
          <input class="form form-control" type="text" name="nome">

          <br>
          <label>CPF</label>
          <input class="form form-control" type="text" name="cpf">

          <br>
          <!-- We'll transform this input into a pond -->
          <input type="file" name="img[]" class="filepond img" multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="4">

          <br>
          <input class="btn btn-success" type="submit" name="btn" value="Salvar">

        </form>


      </div>
    </div>
  </div>




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Load FilePond library -->

  <script src="node_modules/filepond/dist/filepond.min.js"></script>
  <script src="node_modules/filepond/dist/filepond.jquery.js"></script>
  <link href="node_modules/filepond/dist/filepond.css" rel="stylesheet" />
  <link href="node_modules/filepond/dist/filepond-plugin-image-preview.min.css" rel="stylesheet" />
  <script src="node_modules/filepond/dist/filepond-plugin-image-preview.min.js"></script>
  <script src="node_modules/filepond/dist/filepond-plugin-file-validate-size.min.js"></script>
  <script src="node_modules/filepond/dist/filepond-plugin-file-rename.js"></script>
  <script type='modulo' src="node_modules/filepond/dist/locale/pt-br.js"></script>

  <script>
    $.fn.filepond.registerPlugin(FilePondPluginImagePreview);
    //$.fn.filepond.registerPlugin(FilePondPluginImageValidateSize);
    $.fn.filepond.registerPlugin(FilePondPluginFileValidateSize);
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