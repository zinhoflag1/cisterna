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
  <?php

use Application\core\Config;

  ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">GMG/CEDEC</a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="cadastro/create">Cadastro <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin/sinc">Sincronizar</a>
        </li>

      </ul>
      <span style="color: white;">Dispositivo : <?php $config = new Config(); print $config->DEVICE; ?></span>

    </div>
  </nav>
  <div class="container">

    <form action="home" method="POST" name="frmPesquisa" id="frmPesquisa">
      <legend>Pesquisa</legend>
      <div class="row">
        <div class="col">
            <label>Nome Candidato :</label>
            <br>
            <span style="font-size: 9pt;">( Digite o Nome ou Parte )</span>
            <input type="text" id="nome" name="nome" class="form form-control"><br>
        </div>
        <div class="col">
          <label>CPF do Candidato :</label>
          <br>
          <span style="font-size: 9pt;">( Digite o CPF ou Parte )</span>
          <input type="text" class="form form-control" id="cpf" name="cpf">
        </div>
      </div>
      <input type="submit" value="Pesquisar" class="btn btn-primary btn-sm" name="btnPesquisar" id="btnPesquisar">
    </form>

    <div class="row">
      <div class="col-12 responsive">

        Total de Registros : <?= $data['total_registros']; ?>
        <table class="table table-bordered table-striped table-condensend table-sm alert-success">
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Renda Familiar</th>
            <th>Município</th>
            <th>Comunidade</th>
            <th>Ações</th>
          </tr>

          <?php

          foreach ($data['registros'] as $key => $registro) {
            print "</tr>";
            print "<td>" . ($key + 1) . "</td>";
            print "<td>" . $registro['nome'] . "</td>";
            print "<td>" . $registro['cpf'] . "</td>";
            print "<td>" . $registro['renda_total'] . "</td>";
            print "<td>" . $registro['municipio_nome'] . "</td>";
            print "<td>" . $registro['comunidade'] . "</td>";
            print "<td><a href='/cadastro/edit/" . $registro['id'] . "' title='Editar registro'><img width='25' src='/images/edit.png'></a>
                <a href='#' title='Deletar Registro'><img  width='25' src='/images/delete.png'></a>
                <a href='cadastro/show/" . $registro['id'] . "' title='Visualizar Registro'><img  width='25' src='/images/report.png'></a></td>";
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


</body>

</html>