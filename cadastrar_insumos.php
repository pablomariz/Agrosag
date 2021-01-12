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
      //require("cabecalho.php");      ?>
    </header> <!--FINAL DO CABEÇALHO -->


  <body style="margin-bottom: 0px;padding: 16px;">

    <main role="main">
      <div class="jumbotron">
        <div class="container">

        <?php
                require("conexao.php");
                  if (isset($_GET['id_insumo']))
                  {
                    if (isset($_GET['opcao']))
                    {
                      $id_insumo = $_GET['id_insumo'];
                      $sql = "delete from insumos where id_insumo = $id_insumo";
                      $executa = mysqli_query($bancodedados, $sql);
  
                      if($executa){
                        echo "Registro excluido com sucesso";
                        $sucesso = 1;
  
                      }
  
                      else{
                        echo "Erro ao excluir registro";
                        $sucesso = 0;
                      }
                    }
                    else
                    {
                      $id_insumo = $_GET['id_insumo'];
                      $descricao = $_POST['descricao'];
                      $id_grupo = $_POST['id_grupo'];
                      $un = $_POST['un'];
                      $estoquemin = $_POST['estoquemin'];
                      $id_centrocusto = $_POST['id_centrocusto'];
                      $sn_controlaestoque = $_POST['sn_controlaestoque'];
                      $id_tipoinsumo = $_POST['id_tipoinsumo'];


                      
                      $sql = "update insumos set id_insumo = '$id_insumo', descricao = '$descricao', id_grupo = '$id_grupo', un = '$un', estoquemin = '$estoquemin', id_centrocusto = '$id_centrocusto', sn_controlaestoque = '$sn_controlaestoque', id_tipoinsumo
                       = '$id_tipoinsumo'  where id_insumo = $id_insumo";
                      $executa = mysqli_query($bancodedados, $sql);
                      
                      if($executa){
                        echo "Dados alterados com sucesso!";
                        $sucesso = 1;
                      }
  
                      else{
                        echo "Erro ao alterar os dados!";
                        $sucesso = 0;
                      }
                    }
                  }
                  else
                  {

                    $ultimo_id =  "select id_insumo from insumos order by id_insumo desc limit 1";

                    if  (isset($_POST['descricao'])){

                        $id_insumo = $_POST['id_insumo'];
                        $descricao = $_POST['descricao'];
                        $id_grupo = $_POST['id_grupo'];
                        $un = $_POST['un'];
                        $estoquemin = $_POST['estoquemin'];
                        $id_centrocusto = $_POST['id_centrocusto'];
                        $sn_controlaestoque = $_POST['sn_controlaestoque'];
                        $id_tipoinsumo = $_POST['id_tipoinsumo'];

  
                      $sql = "insert into insumos (id_insumo, descricao, id_grupo, un, estoquemin,
                      id_centrocusto, sn_controlaestoque, id_tipoinsumo) values ('$id_insumo','$descricao', '$id_grupo', '$un', '$estoquemin',
                      '$id_centrocusto', '$sn_controlaestoque', '$id_tipoinsumo')";
                      $executa = mysqli_query($bancodedados, $sql);
                      
                      if($executa){
                        echo "Dados gravados com sucesso!";
                        $sucesso = 1;
                      }
  
                      else{
                        echo $sql;
                        $sucesso = 0;
                      }                    
  
  
                    } 
  
  
                  }

                




            ?>



        </div>
      </div>

  
    </main>
    <hr>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>