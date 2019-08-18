<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="utf-8">

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
      <li><a href="cadastro_pj.php">Cadastrar Empresa</a></li>
      <li><a href="cadastro_pf.php">Cadastrar Cliente</a></li>
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

    <!-- FIM DA ZONA DE MENU -->

  <!-- INICIO DO FORMULARIO DE LOGIN -->
	<div class="d1">
    <img src="../img/bg2.jpeg" alt="">
  </div>

  <div class="login">
    <form action="../controle/logar.php" method="POST">
      <h2>Login</h2>

      <label for="">Email</label>
      <input class="txtb" type="text" name="email">

      <label for="Senha">Senha</label>
      <input class="txtb" type="password" name="senha">

      <input class="btn" value="Vamos lá" type="submit">
    </form>
  </div>

  <!-- FIM DO FORMULARIO DE LOGIN -->

    <script>
      function openSlideMenu(){
        document.getElementById('side-menu').style.width = '250px';
        document.getElementById('main').style.marginLeft = '250px';
      }

      function closeSlideMenu(){
        document.getElementById('side-menu').style.width = '0';
        document.getElementById('main').style.marginLeft = '0';
      }
    </script>

    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>
