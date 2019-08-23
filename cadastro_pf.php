<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">

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

	<!-- FIM DA ZONA DE MENU -->

	<!-- FORMULARIO DE CADASTRO -->
	<div class="d1">
		<img src="img/bg2.jpeg" alt="">
	</div>

	<div class="login">
		<form action="controle/clienteDTO.php" method="POST">
		<h2>Cadastrar como usuário</h2>

		<label for="">Email</label>
		<input class="txtb" name="email" type="email">

		<label for="Senha">Senha</label>
		<input class="txtb" name="senha" type="password">

		<input class="btn" value="Vamos continuar" name="cadastrar" type="submit">

		<p>Já é cadastrado? <a href="logar.php">clique aqui</a> </p>
		</form>
	</div>
	<!-- FIM DO FORMULARIO DE CADASTRO -->
		
	<script type="text/javascript">
		$(document).ready(function(){
			$("#cpf").mask("000.000.000-00")
		})

      function openSlideMenu(){
        document.getElementById('side-menu').style.width = '250px';
        document.getElementById('main').style.marginLeft = '250px';
      }

      function closeSlideMenu(){
        document.getElementById('side-menu').style.width = '0';
        document.getElementById('main').style.marginLeft = '0';
      }
	</script>
</html>
