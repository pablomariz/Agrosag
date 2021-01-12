<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/estilo.css">

    <title>AgroSag - Gestão de Insumos</title>
    <link rel="icon" href="imagens/agrosag_logo.png">
  </head>
  <body>

    <header>

    <?php
      require("cabecalho.php");
      ?>
<hr>
    <div class="container">
      <h2 class=""> Insumos</h2>
      <table class="table table-bordered table-hover">
        <tr>
                <th>ID Insumo</th>
                <th>Descrição</th>
                <th>Grupo Insumo</th>
                <th>Unidade</th>
                <th>Estoque Minimo</th>
                <th>Centro Custo</th>
                <th>Controla Estoque</th>
                <th>Tipos Insumos</th>
                <th>Editar</th>
                <th>Excluir</th>
              </tr>

  
              <?php

              require("conexao.php");
              $sql = "select * from insumos";
              $executa = mysqli_query($conn, $sql);
              while($linha = mysqli_fetch_array($executa))
              {
                echo "<tr>";
                echo "<td>".$linha['id_insumo']."</td>";
                echo "<td>".$linha['descricao']."</td>";
                echo "<td>".$linha['id_grupo']."</td>";
                echo "<td>".$linha['un']."</td>";
                echo "<td>".$linha['estoquemin']."</td>";
                echo "<td>".$linha['id_centrocusto']."</td>";
                echo "<td>".$linha['sn_controlaestoque']."</td>";
                echo "<td>".$linha['id_tipoinsumo']."</td>";


                echo "<td> <a href='formulario_novo_insumo.php?id_insumo=".$linha['id_insumo']."'>EDITAR </a></td>";
                echo "<td> <a href='formulario_novo_insumo.php?id_insumo=".$linha['id_insumo']."&opcao=e'>EXCLUIR </a></td>";
              }
            ?>
  
    </main>
    <hr>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>