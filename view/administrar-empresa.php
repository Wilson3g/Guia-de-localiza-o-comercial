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

    <style>
      table{
        margin-top: 48px;
      }

      @font-face {
        font-family: Josefin Sans;
        src: url(fonts/JosefinSans-Regular.ttf);
      }

      @font-face {
        font-family: Kalam;
        src: url(fonts/Kalam-Regular.ttf);
      }

      .collapse .nav-item .nav-link, .navbar-brand{
        color: #fff;
        font-family: 'Josefin Sans', sans-serif;
        font-size: 25px;
      }

      body{
        font-family: Kalam, sans-serif;
      } 
    </style>

    <title>Administrar empresa</title>

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
      
    <span id="result"></span>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

      
    <!-- baixar a biblioteca -->
    <script type="text/javascript">

      $("#buscar").keyup(function(){
        var busca = $("#buscar").val();
        $.post('../controle/buscar-empresa.php', {buscar: busca}, function(data){
          $("#result").html(data);
        });
      });

      $("#buscar").focusout(function(){
        $("#result").html(data);
      });
      
      </script>
  </body>
</html>