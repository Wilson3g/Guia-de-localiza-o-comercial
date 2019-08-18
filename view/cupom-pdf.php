<?php
    require_once("../controle/clienteDAO.php");
?>
<!doctype html>
<html>
    <head>
        <!-- folhas de estilo -->
        <link rel="stylesheet" href="css/estilo.css">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.css">

        <!-- javascript -->
        <script type="text/javascript" src="js/funcoes.js"></script>
    </head>

    <body>

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

        <?php

            $idEmpresa = $_GET['idEmpresa'];
            $idUsuario = $_GET['idUsuario'];
            $clienteDAO = new ClienteDAO();
            $cupomCliente=$clienteDAO -> verificarCupomCliente($idEmpresa, $idUsuario);
            $cliente = $cupomCliente[0];
            $empresa = $cupomCliente[1];

            
            foreach($cupomCliente[1] as $linha){
                echo'

        <div class="container">
            <div class="pdf">
                <center>
                    <img src="../img/Capturar.PNG" alt="">
                </center>

                <center>
                    <h1>Cupom de desconto</h1>
                    <hr>    
                </center>

                <h2>Estabelecimento</h2>
                <p>'.$linha['nome_fantasia'].'</p>
                ';}

            foreach($cupomCliente[0] as $linha){
                echo'

                <h2>Desconto</h2>
                <p>5%</p>

                <h2>Nome do cliente</h2>
                <p>'.$linha['nome_completo'].'</p>

                <h2>CPF</h2>
                <p>'.$linha['cpf'].'</p>

                <hr>
            </div>
        </div>';}

        ?>
        <center>
            <button class="btn btn-danger" onclick="myFunction()">Imprimir</button>
        </center>
    </body>

    <script>
        function myFunction(){
            window.print();
        }
    </script>
</html>