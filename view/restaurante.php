<?php
  include_once '../controle/empresaDAO.php';
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
            <a class="nav-link" href="index.php">Todos</a>
        </li>
          
          <li class="nav-item">
            <a class="nav-link" href="bar.php">Bar</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="restaurante.php">Restaurante</a>
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
            $empresa = $empresaDAO -> listarRestaurantes();
            $loopH = 4;
            $x = 1;

              foreach($empresa as $linha){
                if($x < $loopH){
                  echo'
                    <div class="card">
                      <a href="#">
                        <img src="../imagens-perfil/15578548345cdafa72ce45c.jpg" alt="Denim Jeans" style="width:100%; height:250px">
                      </a>
                        <h4>'.$linha['nome'].'</h4>
                      <p class="price">'.$linha['tipo_estabelecimento'].'</p>
                      <p>'.$linha['endereco'].'</p>
                      <p><button>Ver mais</button></p>
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

    <!-- FIM DA ZONA DE MENU -->

    <!-- INICIO DA ZONA DE CARDS -->

    
    <!-- INICIO DA SECTION JANELA MODAL -->
    <?php

      foreach($empresa as $key){
              
        echo'

    <div class="modal" id="modal">
            <div class="modal_dialog">
                <section class="modal_content">
                    <header class="modal_header">
                      
                        <h2 class="modal_title">'.$linha['nome'].'</h2>
                        <a class="modal_close" href="#">Fechar</a>
                    </header>
                    <div class="modal_body">

                        <img class="modal_image" src="imagens-perfil/'.$linha['foto_perfil'].'" alt="" width="400px" height="60%">
                        
                        <div class="modal_text">
                            <h3>Descrição</h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore quia omnis aspernatur, at sint officia sunt magnam hic quo nam quasi vel tenetur amet, natus reiciendis repellendus minus neque rerum!</p>

                            <h3>Endereço</h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>

                            <h3>Horário de funcionamento</h3>
                            <p>12:00 às 00:00</p>

                            <h3>tipo de estabelecimento: bar</h3>

                            <h3>Estacionamento próprio: sim</h3>

                            <h3>Telefone: (61) 9 9999-9999</h3>
                        </div>
                    </div>
                    <footer class="modal_footer">
                        <a class="modal_link" href=""></a>
                    </footer>
                </section>';}

                ?>
            </div>
        </div>      

    <!-- FIM DA ZONA DE CARDS -->

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
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  </body>
</html>
