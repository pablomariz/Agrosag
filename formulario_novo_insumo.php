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
        require("conecta.php");
        $id_insumo = $_GET['id_insumo'];
        $sql = "select * from insumos where id_insumo = $id_insumo";
        $executa = mysqli_query($bancodedados, $sql);
        if ($linha = mysqli_fetch_array($executa))
        {
          $id_insumo       = $linha['id_insumo'];
          $descricao   = $linha['descricao'];
          $id_grupo      = $linha['id_grupo'];
          $un = $linha['un'];
          $estoquemin      = $linha['estoquemin'];
          $id_centrocusto      = $linha['id_centrocusto'];
          $sn_controlaestoque      = $linha['sn_controlaestoque'];
          $id_tipoinsumo      = $linha['id_tipoinsumo'];


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
            <form method="POST" action="cadastrar.php?id_insumo=<?php echo $id_insumo;?>">
          <?php } else {?>

            <form method="POST" action="cadastrar.php">
          <?php } ?>


<form method="POST" action="cadastrar.php">
  <div class="form-group">
    
  
    
    <label for="id_insumo">id insumo</label>
    <input type="text" class="form-control" id="id_insumo" aria-describedby="emailHelp" name="id_insumo"
    value = "<?php if(isset($_GET['id_insumo'])) echo $id_insumo; ?>">

    <label for="descricao">Descricao</label>
    <input type="text" class="form-control" id="descricao" aria-describedby="emailHelp" name="descricao" 
    value = "<?php if(isset($_GET['id_insumo'])) echo $descricao; ?>">

    <select name="id_tipoinsumo" class="form-control">
                    <option disabled selected>id grupo</option>
                    
                    <?php
                    include_once("conexao.php");

                        $result_nome_grupo = "select nomegrupo from gruposinsumos";
                        $resultado_nome_grupo = mysqli_query($bancodedados, $result_nome_grupo);
                        while($row = mysqli_fetch_assoc($resultado_nome_grupo)){ ?>
                          <option value="<?php echo $row['id_grupo'];?>"><?php echo $row['nomegrupo']; ?></optiion>
                        }
                
                </select>




    <label for="un">unidade</label>
    <input type="text" class="form-control" id="un" aria-describedby="emailHelp" name="un"
    value = "<?php if(isset($_GET['id_insumo'])) echo $un; ?>">

    <label for="estoquemin">estoque minimo</label>
    <input type="text" class="form-control" id="estoquemin" aria-describedby="emailHelp" name="estoquemin" 
    value = "<?php if(isset($_GET['id_insumo'])) echo $estoquemin; ?>">

    <select name="id_centro" class="form-control">
                    <option disabled selected>centro custo</option>
                    
                    <?php
                        $result_centro_custo = "select nomecentro from centrocustos";
                        $resultado_centro_custo = mysqli_query($bancodedados, $result_centro_custo);
                        while($row = mysqli_fetch_assoc($resultado_centro_custo)){ ?>
                          <option value="<?php echo $row['id_centro'];?>"><?php echo $row['nomecentro']; ?></optiion>
                        }
                
                </select>


                <select name="sn_controlaestoque" class="form-control">
                    <option disabled selected>Controla estoque</option>
                    <option value="T">Sim</option>
                    <option value="F">Não</option>
                </select>
            </div>



                <select name="id_tipoinsumo" class="form-control">
                    <option disabled selected>Tipo insumo</option>
                    
                    <?php
                        $result_tipo_inusmo = "select descricao from tipoinsumos";
                        $resultado_tipo_insumo = mysqli_query($bancodedados, $result_tipo_inusmo);
                        while($row = mysqli_fetch_assoc($resultado_tipo_insumo)){ ?>
                          <option value="<?php echo $row['id_tipoinsumo'];?>"><?php echo $row['descricao']; ?></optiion>
                        }
                
                </select>

 


    
  </div>



  <input type="submit" class="btn btn-primary" value="Gravar">

  
    </main>
    <hr>

 

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>