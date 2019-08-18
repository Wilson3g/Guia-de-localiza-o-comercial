<?php
  include_once '../controle/empresaDAO.php';
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- folhas de estilo -->
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
        <li><a href="social.php">Social Flip</a></li>
        <li><a href="logar.php">Entrar</a></li>
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
              <a class="nav-link" href="bar.php">Bar</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="restaurante.php">Restaurante</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="loja.php">Loja</a>
            </li>

          </ul>
        <div>
      </center>

        <div class="row">

      <?php

        $empresaDAO = new EmpresaDAO();
        $empresa = $empresaDAO -> listarEmpresas();
        $loopH = 4;
        $x = 1;

          foreach($empresa as $linha){
            
            if($x < $loopH){
              echo'
              <div class="card">
                <a href="descricao.php?id='.$linha['empresa_id'].'">
                  <img src="../imagens-perfil/'.$linha['foto_perfil'].'" alt="Denim Jeans">
                </a>
                  <h4>'.$linha['nome'].'</h4>
                <p class="price">'.$linha['tipo_estabelecimento'].'</p>
                <p>'.$linha['cidade'].'</p>
                <p><button>Ver mais</button></p>
              </div>
              ';

            }elseif($x = $loopH){
              echo'
              <div class="card">
              <a href="descricao.php?id='.$linha['empresa_id'].'">
                <img src="../imagens-perfil/'.$linha['foto_perfil'].'" alt="Denim Jeans">
              </a>
                <h4>'.$linha['nome'].'</h4>
              <p class="price">'.$linha['tipo_estabelecimento'].'</p>
              <p>'.$linha['cidade'].'</p>
              <p><button>Ver mais</button></p>
            </div>
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
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/popper.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
