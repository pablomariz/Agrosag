// João Pablo Souza Mariz, souzamariz27@gmail.com

<!DOCTYPE html>
  <html lang="pt-br">
    <head>


      <title>SISTEL - Controle de ordem de serviços</title>

      <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
  <?php
      require("cabecalho.php");
      if(isset($_GET['id_insumo']))
      {
        require("conexao.php");

        $id_tipoinsumo = $_POST['id_tipoinsumo'];


        $id_insumo = $_GET['id_insumo'];
        $sql = "select * from insumos where id_insumo = $id_insumo";
        $executa = mysqli_query($bancodedados, $sql);
        if ($linha = mysqli_fetch_array($executa))
        {
 
            $id_insumo = $linha['id_insumo'];
            $descricao = $linha['descricao'];
            $id_grupo = $linha['id_grupo'];
            $un = $linha['un'];
            $estoquemin = $linha['estoquemin'];
            $id_centrocusto = $linha['id_centrocusto'];
            $sn_controlaestoque = $linha['sn_controlaestoque'];
            $id_tipoinsumo = $linha['id_tipoinsumo'];

        }
      }
    ?>

  </header>
    <main role="main">
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Cadastro de Ordem de Serviços</h1>

          <?php
             if (isset($_GET['codos']))
             {
          ?>
            <form method="POST" action="cadastrar.php?codos=<?php echo $codos;?>">
          <?php } else {?>

            <form method="POST" action="cadastrar.php">
          <?php } ?>


<form method="POST" action="cadastrar.php">
  <div class="form-group">
    
  
    
    <label for="numero_os">Número da O.S.</label>
    <input type="text" class="form-control" id="numero_os" aria-describedby="emailHelp" name="numero_os"
    value = "<?php if(isset($_GET['codos'])) echo $numero_os; ?>">

    <label for="nome_cliente">Nome do cliente</label>
    <input type="text" class="form-control" id="nome_cliente" aria-describedby="emailHelp" name="nome_cliente" 
    value = "<?php if(isset($_GET['codos'])) echo $nome_cliente; ?>">

    <label for="numero_cliente">Número do cliente</label>
    <input type="text" class="form-control" id="numero_cliente" aria-describedby="emailHelp" name="numero_cliente"
    value = "<?php if(isset($_GET['codos'])) echo $numero_cliente; ?>">

    <label for="observacao">Observação</label>
    <input type="text" class="form-control" id="observacao" aria-describedby="emailHelp" name="observacao" 
    value = "<?php if(isset($_GET['codos'])) echo $observacao; ?>">

    <label for="situacao">Situação</label>
    <input type="text" class="form-control" id="situacao" aria-describedby="emailHelp" name="situacao" 
    value = "<?php if(isset($_GET['codos'])) echo $situacao; ?>">

 


    
  </div>



  <input type="submit" class="btn btn-primary" value="Gravar">

  
    </main>
    <hr>

 

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>