
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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
      <form action="controle/informacoesDTO.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="idusuario" value="<?php echo $_GET['idusuario']?>">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="nome">Nome Fantasia</label>
            <input type="text" class="form-control" name="nomeFantasia" id="nome" placeholder="Ex: Stratus Restaurante">
          </div>
          <div class="form-group col-md-6">
            <label for="cnpj">CNPJ</label>
            <input type="number" class="form-control" name="cnpj" id="cnpj" placeholder="Ex: 21.717.837/0001-26">
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" name="descricao" id="descricao">
          </div>
          <div class="form-group col-md-4">
            <label for="tipo">Tipo de estabelecimento</label>
            <select id="tipo" name="categoria" class="form-control">
              <option selected>Escolha</option>
              <option value="Bar">Bar</option>
              <option value="Loja">Loja</option>
              <option value="Restaurante">Restaurante</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="telefone">Telefone</label>
            <input type="number" class="form-control" name="telefone" id="telefone" placeholder="Ex: (61) 2930-9304">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inicio">Início de expediente</label>
            <input type="time" class="form-control" name="inicioExpediente" id="inicio">
          </div>
          <div class="form-group col-md-4">
            <label for="final">Final de expediente</label>
            <input type="time" class="form-control" name="fimExpediente" id="final">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="perfil">Foto de perfil</label>
            <input type="file" name="img">
          </div>
        </div>

        <input type="submit" class="btn btn-primary" name="terminar" value="Terminar">

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
