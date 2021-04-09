<?php
    session_start();
    include "conexao.php"
?>

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
      if(isset($_GET['id_insumo']))
      {
        require("conexao.php");
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

  <body style="margin-bottom: 0px;padding: 16px;">

    
    <br>

    <div class="container">
      <div class="d-flex justify-content-center mt-5">
        <div class="card" style="width: 36rem;">
          <div class="card-body">
            <div class="d-flex justify-content-center">
              <img src="imagens/agrosag_logo.png" width="20">
  </head>
        </div>

        <div class="row">
          <div class="col">
          <h4 style="text-align: center;">Cadastro de insumos</h4>
          </div>
        </div>
        <div class="row">
          <div class="col">
            
          <?php
             if (isset($_GET['id_insumo']))
             {
          ?>
            <form method="POST" action="cadastrar_insumos.php?id_insumo=<?php echo $id_insumo;?>">
          <?php } else {?>

            <form method="POST" action="cadastrar_insumos.php">
          <?php } ?>
          
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Codigo do insumo" name="id_insumo">
              </div>

              <div class="form-group">
                <input type="text" class="form-control" placeholder="Descrição do insumo" name="descricao">
              </div>

              <div class="form-group">
                <input type="text" class="form-control" placeholder="Unidade" name="un" maxlength="3">
              </div>

              <div class="form-group">
                <input type="text" class="form-control" placeholder="Estoque mínimo" name="estoquemin">
            </div>
              
            <div class="form-group">            
                <select name="sn_controlaestoque" class="form-control">
                    <option value="F">Controla estoque</option>
                    <option value="T">Sim</option>
                    <option value="F">Não</option>

                </select>
            </div>

            <div class="form-group">  
            <select name="id_tipoinsumo" class="form-control" required>
                <option value="" disabled selected>Tipo insumo</option>
                <?php
                    $query_tipo = mysqli_query($bancodedados, "select * from tiposinsumos");
                    while($dados = mysqli_fetch_assoc($query_tipo)){ 
                        $id_tipo = $dados['id_tipo'];
                        echo "<option value='$id_tipo'>".$dados['descricao']."</option>";
                    }
                ?>
            </select>

            </div>

            <div class="form-group">  
            <select name="id_grupo" class="form-control" required>
                <option value="" >Grupo de insumo</option>
                <?php
                        $query_grupo = mysqli_query($bancodedados, "select * from gruposinsumos");
                        while($row = mysqli_fetch_assoc($query_grupo)){ 
                            $id_grupo = $row['id_grupo'];
                            echo "<option value='$id_grupo'>".$row['nomegrupo']."</option>";
                        }
                ?>
                </select>
            </div>

            <div class="form-group">  
            <select name="id_centrocusto" class="form-control" required>
                    <option value="" disabled selected>Centro de custos</option>
                    <?php
                        $query_centro = mysqli_query($bancodedados, "select * from centrocustos");
                        while($row = mysqli_fetch_array($query_centro)){ 
                            $id_centro = $row['id_centro'];
                            echo "<option value='$id_centro'>".$row['nomecentro']."</option>";
                        }
                    ?>
             </select>
                    <?php
                          $teste = mysqli_query($bancodedados, "SELECT id_insumo from insumos order by id_insumo desc limit 1");
                          $endereco = mysqli_fetch_assoc($teste);
                    ?>
            </div>
              <div class="mt-4 mb-4">
              </div>
              <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>

            </form>
                
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
