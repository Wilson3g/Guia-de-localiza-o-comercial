<?php
    include_once 'controle/empresaDAO.php';
    $id = $_GET['id'];
    
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Grid Layout</title>

        <link rel="stylesheet" href="css/bootstrap.css">

        <link rel="stylesheet" href="css/estilo.css">

        <link rel="stylesheet" href="font-awsome/css/all.min.css">

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
                include_once('controle/clienteDAO.php');

                session_start();
                if(isset($_SESSION['logado'])){
                    $idCliente = $_SESSION['logado'];
                    echo'
            <li><a href="atualizar-cliente.php?idusuario='.$idCliente.'">Meu perfil</a></li>
            <li><a href="controle/sair.php">Sair</li>';
            
                }else{
                    echo'
            <li><a href="logar.php">Entrar</a></li>';
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

            $empresaDAO = new EmpresaDAO();
            $empresa = $empresaDAO -> listarInformacoes($id);

            foreach($empresa as $linha){
                echo'
        <div class="container-conteudo">
            <section id="main">
                <nav class="mainNav">
                    <div class="nome">
                        <h1>'.$linha['nome'].'</h1>
                    </div>
                </nav>
                <article class="mainArticle">

                    <div class="foto-perfil">
                        <img src="imagens-perfil/'.$linha['foto_perfil'].'" height="40vh" width="100%" alt="">
                    </div>';
            }
        ?>

        <?php

            $inicio = $linha['inicio_expediente'];
            $fim = $linha['fim_expediente'];
            $inicioExpediente = date("H:i", strtotime($inicio));
            $fimExpediente = date("H:i", strtotime($fim));

            foreach($empresa as $linha){
                echo'
                </article>
                <aside class="mainAside">
                    <div class="informacoes">
                        <h2>Descrição</h2>
                        <p>'.$linha['descricao'].'</p>

                        </i> <h2>Estabelecimento</h2>
                        <p><i class="fas fa-store"></i>'.$linha['tipo_estabelecimento'].'</p>

                        <h2>Endereço</h2>
                        <p><i class="fas fa-map-marked-alt"></i>'.$linha['endereco'].' '.$linha['cidade'].' '.$linha['estado'].'</p>

                        <h2>Horário de funcionamento</h2>
                        <p><i class="far fa-clock"></i>Início: '.$inicioExpediente.'</p>
                        <p><i class="fas fa-clock"></i>Fim: '.$fimExpediente.'</p>

                        <h2>Telefone</h2>
                        <p><i class="fas fa-phone"></i>'.$linha['telefone'].'</p>';

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
                        if(isset($_SESSION['msg_ava'])){
                            echo $_SESSION['msg_ava'];
                            unset($_SESSION['msg_ava']);
                }
                echo
                        '<form method="POST" action="controle/clienteDTO.php" enctype="multipart/form-data">
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
                                <input type="radio" id="estrela_cinco" name="estrela" value="5"><br><br>';
                        if(isset($_SESSION['logado'])){
                            echo '<input type="submit" class="btn btn-danger" name="avaliar" value="Enviar"/>';
                        }else{
                            echo '<buttom id="avaliarBotao" class="btn btn-danger" onclick="avaliar()">Avaliar</buttom>';
                        }
                            echo'</div>
                        </form>
                        ;

                    </div>
                </aside>';
            }
        ?>
                <footer class="mainFooter">

                    <div class="comentario">
                        <h2>Comentários</h2>
        <?php

            if(isset($_SESSION['logado'])){
                echo'
                        <form action="controle/clienteDTO.php" id="menu-form" method="post">

                            <input type="hidden" name="idcomentario" value="'.$id.'">

                                <textarea rows="10" cols="50" name="comentario" placeholder="Insíra um comentário"></textarea>
                            </fieldset>
        
                            <input type="submit" class="btn btn-danger" name="comentar" value="Comentar">

                        </form>';
            }else{
                echo'
                        <form action="controle/clienteDTO.php" id="menu-form" method="post">

                                    <input type="hidden" name="idcomentario" value="'.$id.'">

                                    <fieldset><legend><h3>Deixe aqui seu comentário:</h3></legend>
                                        <textarea rows="10" cols="50" name="comentario" placeholder="Insíra um comentário"></textarea>
                                    </fieldset>
                
                                    <buttom type="submit" class="btn btn-danger" id="comentario" name="comentar" onclick="comentar()">Comentar</buttom>

                                </form>';
            }
        ?>

        <?php
            $comentario = $empresaDAO -> exibirComentario($id);

            foreach($comentario as $linha){
                echo'
                <div class="media">
                    <img src="imagens-perfil-usuario/'.$linha['foto_perfil'].'" class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0">'.$linha['nome'].' '.$linha['sobrenome'].'</h5>
                        '.$linha['comentario'].';
                    </div>
                </div>
                ';
            }
        ?>
                    </div>
                </footer>

            </section>
        </div>

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

        function avaliar(){
            var botao = document.getElementById('avaliarBotao');
            botao.innerHTML = "Faça login antes!";
        }

        function comentar(){
            var clicou = document.getElementById('comentario')
            clicou.innerHTML = "Primeiro faça login"
        }
        </script>
    </body>
</html>