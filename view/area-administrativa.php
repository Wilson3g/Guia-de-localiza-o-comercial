<?php
  require_once "../controle/administradorDAO.php";
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- folhas de estilo -->
    <link rel="stylesheet" href="css/estilo.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- javascript -->
    <script type="text/javascript" src="js/funcoes.js"></script>
		
  </head>
  <body>
    <header>
      <!-- MENU -->
      <nav>
        <div class="topnav" id="myTopnav">
          <a href="#home" class="active">Página inicial</a>
          <a href="catalogo.php">Catálogo</a>
          <a href="social.php">Social Club</a>
          <a href="logar.php">Login</a>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
          </a>
        </div>
      </nav>

        <div class="container">

            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                        <strong><h5 class="card-title">Listar empresas</h5></strong>
                        <p class="card-text">Clique aqui para editar, excluir e visualizar todas as informações das empresas cadastradas.</p>
                        <a href="administrar-empresa.php" class="btn btn-danger">Listar</a>
                    </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Listar clientes</h5>
                        <p class="card-text">Clique aqui para editar, excluir e visualizar todas as informações dos clientes cadastrados.</p>
                        <a href="administrar-cliente.php" class="btn btn-danger">Listar</a>
                    </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Criar cupons de desconto</h5>
                        <form class="form" action="controle/administradorDTO.php" method="post">
                            <input type="text" class="form-control" name="cupom" placeholder="Insíra apenas números" maxlength="10"><br>
                            <input type="submit" class="btn btn-danger" name="registrar_cupom" value="Criar Cupom">
                        </form>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="cupom">
                      <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cupom existente</h5>
                            <?php

                              $cupons = new Administrador();
                              $cupons2 = $cupons->listarCupons();
                              foreach($cupons2 as $key){
                                echo'
                                <p class="card-text">'.$key['cupom'].'</p>';
                              }
                            ?>
                            <a href="controle/administradorDTO.php" value="deletarCupom" name="deleteCupom" class="btn btn-danger">deletar</a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>

            <center>
              <a class="btn btn-danger" href="../controle/sair.php">Sair do sistema</a>
            </center>

        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  </body>
</html>
