<?php
  include_once 'controle/empresaDAO.php';
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

    <!-- INICIO DA ZONA DE MENU -->

    <nav class="navbar1">
        <span class="open-slide">
        <a href="#" onclick="openSlideMenu()">
            <svg width="30" height="30">
                <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
                <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
                <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
            </svg>
        </a>
        </span>

        <ul class="navbar-nav1">
        <li><a href="index.php">Início</a></li>
        <?php
            include_once('controle/clienteDAO.php');

            session_start();
            if(isset($_SESSION['logado'])){
                $idCliente = $_SESSION['logado'];
                echo'
        <li><a href="atualizar-cliente.php?idusuario='.$idCliente.'">Meu perfil</a></li>
        <li><a href="controle/sair.php">Sair</li>';
        
            }else{
                echo'
        <li><a href="logar.php">Entrar</a></li>';
            }
        ?>
        </ul>
    </nav>

    <div id="side-menu" class="side-nav">
      <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
      <a href="#">Restaurantes</a>
      <a href="#">Lojas</a>
      <a href="#">Bares</a>
      <a href="#">Parque</a>
      <a href="#">Ponto Turístico</a>
    </div>

    <div class="container">
    
    <center>
      <div class="bottom">

        <h2>Categorias</h2>

        <ul class="nav nav-tabs d-flex justify-content-center">

          <li class="nav-item">
              <a class="nav-link" href="index.php">Todos</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="bar.php">Bar</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="restaurante.php">Restaurante</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="loja.php">Loja</a>
          </li>

        </ul>
      <div>
    </center>

    <div class="row">

      <?php

            $empresaDAO = new EmpresaDAO();
            $empresa = $empresaDAO -> listarLojas();
            $loopH = 4;
            $x = 1;

              foreach($empresa as $linha){
                if($x < $loopH){
                  echo'
                  <div class="card">
                  <a href="descricao.php?id='.$linha['empresa_id'].'">
                    <img src="imagens-perfil/'.$linha['foto_perfil'].'" alt="Guia">
                  </a>
                      <h4>'.$linha['nome'].'</h4>
                    <p class="price">'.$linha['tipo_estabelecimento'].'</p>
                    <p>'.$linha['endereco'].'</p>
                    <p><button onclick= "redirect('.$linha['empresa_id'].')">Ver mais</button></p>
                  </div>
                  ';

                }elseif($x = $loopH){
                  echo'
                  ';

                  $x = 0;
                }
            $x++;
              }
          ?>

      </div>
    </div>

    <script type="text/javascript">
      function openSlideMenu(){
        document.getElementById('side-menu').style.width = '250px';
        document.getElementById('main').style.marginLeft = '250px';
      }

      function closeSlideMenu(){
        document.getElementById('side-menu').style.width = '0';
        document.getElementById('main').style.marginLeft = '0';
      }

      function redirect(id){
        window.location.href="descricao.php?id="+id
      }
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  </body>
</html>
