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
      <div class="col-12 p-3 text-center">
        <a href="home" class="btn btn-success btn-sm">Voltar</a>
        <div class="col-12 p-2">

        <?php 

          if($data['db_instalado']) {
            print "<a onclick=\"return confirm('Confirma a Instalação da base de dados')\" href=\"admin/instalabase\" class=\"btn btn-primary\">Rodar instalação</a>";
            print "<p class=\"alert alert-warning\">É necessário Implantar a Base de Dados ! </p>";
          }else {

            print "<p class=\"alert alert-success\">Base de dados Instalada ! </p>";
          }
          ?>
        </div>

      </div>
    </div>
  </div>



</body>

</html>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="..\node_modules\jquery\dist\jquery.min.js"></script>
<script src="..\node_modules\popper.js\dist\umd\popper.min.js"></script>
<script src="..\vendor\twbs\bootstrap\dist\js\bootstrap.min.js"></script>
<!-- Load FilePond library -->