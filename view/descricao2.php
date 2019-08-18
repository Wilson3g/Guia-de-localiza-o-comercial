<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <link rel="stylesheet" href="css/estilo.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="../font-awsome/css/all.min.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <title>Descrição || Guia Guariroba</title>

    <style>
        

        .imagem img{
            width: 730px;
            height: 450px;
        }


        h2{
            margin-top: 80px;
            border-top: 1px solid red;
            padding-top: 80px;
        }

        h4{
            border-bottom: 1px solid red;
        }

        .comentarios{
            margin-top: 80px;
        }

        .media{
            margin-top: 40px;
            padding: 10px;
            border: 2px groove grey;
        }

        .media h4{
            margin-right: 70%;
        }

        .media img{
            width: 40px;
            height: 40px;
        }

    </style>
		
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
        <?php
            session_start();
            if(isset($_SESSION['logado'])){
                echo'
        <li><a href="logar.php">Sair</a></li>'
            else{
                echo'
        <li><a href="logar.php">Entrar</a></li>'
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

  <?php

    include_once '../controle/empresaDAO.php';

    $id = $_GET['id'];

    $empresaDAO = new EmpresaDAO();
    $empresa = $empresaDAO -> listarInformacoes($id);

    foreach($empresa as $linha){
        echo'

        <div class="container">
            <h1 class="text-center">'.$linha['nome'].'</h1>
            <hr>
            

            <div class="row">
                <div class="col-sm-8">
                    <div class="imagem">
                    <img src="../imagens-perfil/'.$linha['foto_perfil'].'">
                    </div>

                    <h2 class="text-center"><strong>Localização</strong></h2>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15355.608525630754!2d-48.090313040611676!3d-15.809113685363874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935bccc77f7d7197%3A0xc44eda07a6e73937!2sJK+Shopping!5e0!3m2!1spt-PT!2sbr!4v1557761827389!5m2!1spt-PT!2sbr" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>';}
  ?>
            <?php
                if(isset($_SESSION['logado'])){
                    
                    echo'
                    <div class="comentarios">
                        <form action="controle/clienteDTO.php" id="menu-form" method="post">

                            <input type="hidden" name="idcomentario" value="'.$id.'">

                            <fieldset><legend><h3>Deixe aqui seu comentário:</h3></legend>
                                <textarea rows="10" cols="50" name="comentario" placeholder="Insíra um comentário"></textarea>
                            </fieldset>
        
                            <input type="submit" class="btn btn-danger" name="comentar" value="Comentar">

                        </form>';

                        if(isset($_SESSION['msg_com'])){
                            echo $_SESSION['msg_com'];
                            unset($_SESSION['msg_com']);
                        }
                }else{
                    echo'
                    <div class="comentarios">
                        <form action="controle/clienteDTO.php" method="post">

                            <input type="hidden" name="idcomentario" value="<?php echo $id?>">

                                <fieldset><legend><h3>Deixe aqui seu comentário:</h3></legend>
                                    <textarea rows="10" cols="50" name="comentario" placeholder="Insíra um comentário"></textarea>
                                </fieldset>

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#comentario">
                                    Comentar
                                </button>
        
                        </form>

                        <div class="modal fade" id="comentario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ops!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Quer deixar seu comentário? Faça login clicando no botão abaixo.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Agora não.</button>
                                    <a href="logar.html" class="btn btn-danger">Logar</a>
                                </div>
                                </div>
                            </div>
                        </div>
                        ';
                }
            ?>

            <?php
                $comentario = $empresaDAO -> exibirComentario($id);

                foreach($comentario as $key){

                    echo'

                        <div class="media">
                            <div class="media-body">
                                <img src="../img/user.png" class="mr-3" alt="...">
                                <span class="nome">'.$key['nome'].'</span>
                                <p class="komen">'.$key['comentario'].'</p>
                            </div>
                        </div>

                    ';}
?>
                        </div>

                    </div>
                <?php

                    $inicio = $linha['inicio_expediente'];
                    $fim = $linha['fim_expediente'];
                    $inicioExpediente = date("H:i", strtotime($inicio));
                    $fimExpediente = date("H:i", strtotime($fim));

                    foreach($empresa as $linha){

                echo'

                <div class="col-sm-4" id="contact2">

                    <h4 class="pt-2"><strong>Descricao</strong></h4>
                    <p>'.$linha['descricao'].'</p>

                    <h4 class="pt-2"><strong>Tipo de estabelecmento</strong></h4>
                    <p><i class="fas fa-store"></i>&nbsp;'.$linha['tipo_estabelecimento'].'</p>

                    <h4 class="pt-2"><strong>Endereço</strong></h4>
                    <p><i class="fas fa-home">&nbsp;</i>'.$linha['endereco'].'</p>

                    <h4 class="pt-2"><strong>Horário de funcionamento</strong></h4>
                    <p><i class="far fa-clock"></i><strong>&nbsp;Início:</strong>'.$inicioExpediente.'<br>
                    <i class="fas fa-clock"></i><strong>&nbsp;Fim: </strong>'.$fimExpediente.'</p>

                    <h4 class="pt-2"><strong>Telefone</strong></h4>
                    <p><i class="fas fa-phone" style="color:#000"></i> <a href="">'.$linha['telefone'].'</a></p>
                    
                    <h4 class="pt-2"><strong>Cupons</strong></h4><br>';}

                    if(isset($_SESSION['logado'])){
                        $idUsuario = $_SESSION['logado'];

                        echo'
                        <form action="controle/clienteDTO.php" method="post">
                            <input type="hidden" name="idUsuario" value='.$idUsuario.'>
                            <input type="hidden" name="idEmpresa" value='.$id.'>
                            <input type="text" class="form-control" name="cupom" placeholder="Insíra seu cupom aqui!" maxlength="10"><br>
                            <input type="submit" class="btn btn-danger" name="valida_cupom" value="Validar Cupom">
                        </form>';

                        if(isset($_SESSION['msg_cum'])){
                            echo $_SESSION['msg_cum'];
                            unset($_SESSION['msg_cum']);
                        }
                        if(isset($_SESSION['msg_ava_null'])){
                            echo $_SESSION['msg_ava_null'];
                            unset($_SESSION['msg_ava_null']);
                        }
                    }else{
                        echo'
                        <form action="controle/clienteDTO.php" method="post">
                            <input type="text" class="form-control" name="cupom" placeholder="Insíra seu cupom aqui!"><br>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cupom">
                                Inserir cupom
                            </button>
                        </form>
                        
                        <div class="modal fade" id="cupom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ops!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Você precisa estar logado para inserir os cupouns. Clique no botão abaixo para logar!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Agora não.</button>
                                    <a href="logar.html" class="btn btn-danger">Logar</a>
                                </div>
                                </div>
                            </div>
                        </div>
                        ';
                    }

                    $empresa = $empresaDAO -> exibirAvaliacao($id);

                    $soma = 0;
                    foreach ($empresa as $key => $value){
                        $soma += $value['avaliacao'];
                        $div = count($empresa);
                        $val = $soma/$div;
                        $result=number_format($val, 2, ',', '.');
                    }
                   
                    if(!isset($result)){
                        echo"<strong><h4><br>Avaliação média:</strong> Não avaliada</h4>";
                    }else{

                        echo"
                        <h4 class='pt-2'><strong><br>Avaliação média:</strong> $result</h4>";
                    }

?>
<?php

            if(isset($_SESSION['logado'])){

            echo'

            <form method="POST" action="controle/clienteDTO.php" enctype="multipart/form-data">
                <div class="estrelas">

                    <input type="hidden" name="idcomentario" value="'.$id.'">

                    <br><input type="radio" id="vazio" name="estrela" value="" checked>
                            
                    <label for="estrela_um"><i class="fa"></i></label>
                    <input type="radio" id="estrela_um" name="estrela" value="1">
                            
                    <label for="estrela_dois"><i class="fa"></i></label>
                    <input type="radio" id="estrela_dois" name="estrela" value="2">
                            
                    <label for="estrela_tres"><i class="fa"></i></label>
                    <input type="radio" id="estrela_tres" name="estrela" value="3">
                            
                    <label for="estrela_quatro"><i class="fa"></i></label>
                    <input type="radio" id="estrela_quatro" name="estrela" value="4">
                            
                    <label for="estrela_cinco"><i class="fa"></i></label>
                    <input type="radio" id="estrela_cinco" name="estrela" value="5"><br><br>
                            
                    <input type="submit" class="btn btn-danger" name="avaliar" value="Enviar"/>
                            
                </div>
            </form>';

            if(isset($_SESSION['msg_ava'])){
                echo $_SESSION['msg_ava'];
                unset($_SESSION['msg_ava']);
            }

            }else{
                echo'

            <form method="POST" action="controle/clienteDTO.php" enctype="multipart/form-data">
                <div class="estrelas">

                    <input type="hidden" name="idcomentario" value="'.$id.'">

                    <br><input type="radio" id="vazio" name="estrela" value="" checked>
                            
                    <label for="estrela_um"><i class="fa"></i></label>
                    <input type="radio" id="estrela_um" name="estrela" value="1">
                            
                    <label for="estrela_dois"><i class="fa"></i></label>
                    <input type="radio" id="estrela_dois" name="estrela" value="2">
                            
                    <label for="estrela_tres"><i class="fa"></i></label>
                    <input type="radio" id="estrela_tres" name="estrela" value="3">
                            
                    <label for="estrela_quatro"><i class="fa"></i></label>
                    <input type="radio" id="estrela_quatro" name="estrela" value="4">
                            
                    <label for="estrela_cinco"><i class="fa"></i></label>
                    <input type="radio" id="estrela_cinco" name="estrela" value="5"><br><br>
                            
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#avaliacao">
                        Avaliar
                    </button>
                            
                </div>
            </form>

            <div class="modal fade" id="avaliacao" tabindex="-1" role="dialog" aria-labelledby="avaliacao" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ops!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Você precisa estar logado para Avaliar. Clique no botão abaixo para logar!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Agora não.</button>
                        <a href="logar.html" class="btn btn-danger">Logar</a>
                    </div>
                    </div>
                </div>
            </div>
            ';
            }
?>
                    </div>
                </div>
            </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper/dist/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

    <script>
        // document.getElementById('enviar').addEventListener('click', function() {
        // document.getElementById('menu_form').submit();
        // });

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
