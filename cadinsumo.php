// João Pablo Souza Mariz, souzamariz27@gmail.com

<!DOCTYPE html>
  <html lang="pt-br">
    <head>


      <title>SISTEL - Controle de ordem de serviços</title>

      <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <header>

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
             if (isset($_GET['id_insumo']))
             {
          ?>
            <form method="POST" action="cadinsumo.php?codos=<?php echo $codos;?>">
          <?php } else {?>

            <form method="POST" action="cadinsumo.php">
          <?php } ?>


<form method="POST" action="cadinsumo.php">
  <div class="form-group">
    
  
    
    <label for="numero_os">ID_insumo</label>
    <input type="text" class="form-control" id="id_insumo" aria-describedby="emailHelp" name="id_insumo"
    value = "<?php if(isset($_GET['id_insumo'])) echo $id_insumo; ?>">

    <label for="nome_cliente">Descricao</label>
    <input type="text" class="form-control" id="descricao" aria-describedby="emailHelp" name="descricao" 
    value = "<?php if(isset($_GET['id_insumo'])) echo $descricao; ?>">

    <label for="numero_cliente">unidade</label>
    <input type="text" class="form-control" id="un" aria-describedby="emailHelp" name="un"
    value = "<?php if(isset($_GET['id_insumo'])) echo $un; ?>">

    <label for="observacao">estoque minimo</label>
    <input type="text" class="form-control" id="estoquemin" aria-describedby="emailHelp" name="estoquemin" 
    value = "<?php if(isset($_GET['id_insumo'])) echo $estoquemin; ?>">
           
                <select name="sn_controlaestoque">
                    <option value="" disabled selected>Controla estoque</option>
                    <option value="T">Sim</option>
                    <option value="F">Não</option>
                </select>

          
                <select name="id_tipoinsumo" >
                    <option value="" disabled selected>Tipo insumo</option>
                    
                    <?php
                        $bancodedados = mysqli_connect('localhost', 'root', '', 'banco2') or die(mysqli_error());
                        mysqli_set_charset($bancodedados, 'utf8') or die (mysqli_error($bancodedados));
                        $query_tipos_insumos = mysqli_query($bancodedados, "select descricao from tiposinsumos");
                        while($row = mysqli_fetch_assoc($query_tipos_insumos)){
                            echo "<option>".$row['descricao']."</option>";
                        }
                    ?>
                </select>
         
                <select name="id_grupo">
                    <option value="" disabled selected>Nome do grupo</option>
            
                    <?php

                        $query_nomegrupo = mysqli_query($bancodedados, "select nomegrupo from gruposinsumos");
                        while($row = mysqli_fetch_assoc($query_nomegrupo)){
                            echo "<option>".$row['nomegrupo']."</option>";
                        }
                    ?>
                </select>


 


    
  </div>



  <input type="submit" class="btn btn-primary" value="Gravar">

  
    </main>
    <hr>

 

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>