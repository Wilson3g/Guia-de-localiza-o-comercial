<?php
  $id = $_GET['idusuario'];
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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

    <!-- INICIO DA ZONA FORMULARIO DE INFORMACOES -->
    <div class="container">
      <form action="controle/clienteDTO.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="idUsuario" value="<?php echo $id ?>">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="nome">Nome</label>
            <input type="nome" class="form-control" name="nome" id="nome" placeholder="Ex: Maria">
          </div>
          <div class="form-group col-md-6">
            <label for="sobrenome">Sobrenome</label>
            <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Ex: Sousa">
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="endereco" name="cpf" placeholder="Ex: 938.938.938-30">
          </div>
          <div class="form-group col-md-4">
            <label for="cidade">Foto de perfil</label>
            <input class="btn btn-danger" type="file" name="img" id="produto">
          </div>
        </div>
        
        <input type="submit" class="btn btn-primary" name="inserirInformacoes" value="Terminar">
      </form>
    </div>
    <!-- FIM DA ZONA FORMULARIO INFORMACOES  -->

    <script>

			$(document).ready(function(){
			  $("#cnpj").mask("00.000.000/0000-00")
			});

      $(document).ready(function(){
			  $("#telefone").mask("(00) 0000-0000")
		  });

      function openSlideMenu(){
        document.getElementById('side-menu').style.width = '250px';
        document.getElementById('main').style.marginLeft = '250px';
      }

      function closeSlideMenu(){
        document.getElementById('side-menu').style.width = '0';
        document.getElementById('main').style.marginLeft = '0';
      }

		</script>

  </body>
</html>
