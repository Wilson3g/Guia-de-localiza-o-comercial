<?php
  include_once('../controle/administradorDAO.php');
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <!-- folhas de estilo -->
    <link rel="stylesheet" href="css/estilo.css">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- javascript -->
    <script type="text/javascript" src="js/funcoes.js"></script>
    
  </head>
  <body>

    <!-- INICIO DA ZONA DE MENU -->

    <header>

      <!-- MENU -->
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

    </header>

    <!-- FIM DA ZONA DE MENU -->

    <!-- INICIO DA ZONA FORMULARIO DE INFORMACOES -->
   
    <div class="container">
      <form>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="nome">Nome Fantasia</label>
            <input type="email" class="form-control" id="nome" placeholder="Ex: Stratus Restaurante">
          </div>
          <div class="form-group col-md-6">
            <label for="cnpj">CNPJ</label>
            <input type="number" class="form-control" id="cnpj" placeholder="Ex: 21.717.837/0001-26">
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="endereco">Endereco</label>
            <input type="text" class="form-control" id="endereco" placeholder="Ex: St. L Norte QNL 11">
          </div>
          <div class="form-group col-md-4">
            <label for="cidade">Cidade</label>
            <input type="text" class="form-control" id="cidade" placeholder="Ex: Taguatinga">
          </div>
          <div class="form-group col-md-4">
            <label for="numero">Número</label>
            <input type="number" class="form-control" id="numero" placeholder="Ex: 54">
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="estado">Estado</label>
            <select id="estado" class="form-control">
              <option selected>Escolha</option>
              <option value="AC">Acre</option>
              <option value="AL">Alagoas</option>
              <option value="AP">Amapá</option>
              <option value="AM">Amazonas</option>
              <option value="BA">Bahia</option>
              <option value="CE">Ceará</option>
              <option value="DF">Distrito Federal</option>
              <option value="ES">Espírito Santo</option>
              <option value="GO">Goiás</option>
              <option value="MA">Maranhão</option>
              <option value="MT">Mato Grosso</option>
              <option value="MS">Mato Grosso do Sul</option>
              <option value="MG">Minas Gerais</option>
              <option value="PA">Pará</option>
              <option value="PB">Paraíba</option>
              <option value="PR">Paraná</option>
              <option value="PE">Pernambuco</option>
              <option value="PI">Piauí</option>
              <option value="RJ">Rio de Janeiro</option>
              <option value="RN">Rio Grande do Norte</option>
              <option value="RS">Rio Grande do Sul</option>
              <option value="RO">Rondônia</option>
              <option value="RR">Roraima</option>
              <option value="SC">Santa Catarina</option>
              <option value="SP">São Paulo</option>
              <option value="SE">Sergipe</option>
              <option value="TO">Tocantins</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao">
          </div>
          <div class="form-group col-md-2">
            <label for="telefone">Telefone</label>
            <input type="number" class="form-control" id="telefone" placeholder="Ex: (61) 2930-9304">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="tipo">Tipo de estabelecimento</label>
            <select id="tipo" class="form-control">
              <option selected>Escolha</option>
              <option>Bar</option>
              <option>Loja</option>
              <option>Restaurante</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="inicio">Início de expediente</label>
            <input type="time" class="form-control" id="inicio">
          </div>
          <div class="form-group col-md-4">
            <label for="final">Final de expediente</label>
            <input type="timr" class="form-control" id="final">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="perfil">Foto de perfil</label>
            <input type="file" name="myFile">
          </div>
        </div>

        <input type="submit" class="btn" value="Atualizar">
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
