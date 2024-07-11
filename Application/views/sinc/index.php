<!doctype html>
<html lang="pt-Br">

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
      <div class="col-12 col-md-6 p-3 text-center">
        <a href="/home" class="btn btn-success btn-sm">Voltar</a>
      </div>
      <div class="col-12 col-md-6 text-center">
        <a href="#" class="btn btn-primary">Sincronizar Dados</a>
      </div>
    </div>

    <div class="row p-3">
      <div class="col-12 text-center">
        <div class="table-responsive">
          <table class="table table-primary">
            <thead>
              <tr>
                <th scope="col">Column 1</th>
                <th scope="col">Column 2</th>
                <th scope="col">Column 3</th>
              </tr>
            </thead>

            <?php

            var_dump($data['cadastros']);

            ?>
            
            <tbody>
              <tr class="">
                <td scope="row">R1C1</td>
                <td>R1C2</td>
                <td>R1C3</td>
              </tr>
              <tr class="">
                <td scope="row">Item</td>
                <td>Item</td>
                <td>Item</td>
              </tr>
            </tbody>
          </table>
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