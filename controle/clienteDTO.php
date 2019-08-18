<?php

  // INCLUSÃO DOS ARQUIVOS
  require_once 'clienteDao.php';
  require_once 'administradorDAO.php';

    // INSTANCIA DA CLASSE CLIENTE NO ARQUIVO 'CLIENTE.PHP'
    if(isset($_POST['alterarInfoCliente'])){

      $nome = $_POST['nome'];
      $sobrenome = $_POST['sobrenome'];
      $id = $_POST['fid'];

      $img = $_FILES['img'];

      $clienteDAO = new ClienteDAO();
      $clienteDAO -> setNome($nome);
      $clienteDAO -> setSobrenome($sobrenome);
      
      $array = $clienteDAO;

      $clienteDAO -> atualizarInformacoesCliente($id, $array);

    }elseif(isset($_POST['cadastrar'])){

      $senha = sha1($_POST['senha']);
      $email = $_POST['email'];

      $clienteDAO = new ClienteDAO();
      $clienteDAO -> setEmail($email);
      $clienteDAO -> setSenha($senha);

      $array = $clienteDAO;

      $clienteDAO -> salvar($array);
    }

    if(isset($_POST['inserirInformacoes'])){

      $nome = $_POST['nome'];
      $sobrenome = $_POST['sobrenome'];
      $cpf = $_POST['cpf'];
      $idUsuario = $_POST['idUsuario'];

      $img = $_FILES['img'];

      $clienteDAO = new ClienteDAO();
      $clienteDAO -> setNome($nome);
      $clienteDAO -> setSobrenome($sobrenome);
      $clienteDAO -> setCpf($cpf);
      
      $dados = $clienteDAO;

      $clienteDAO -> informacoesCliente($dados, $img, $idUsuario);
    }

    // avaliar

    if(isset($_POST['avaliar'])){

      session_start();

      if(isset($_SESSION['logado'])){

        // id da empresa
        $id = $_POST['idcomentario'];

        // id do usuario logado
        $idUsuario = $_SESSION['logado'];

        // avaliacao do usuario
        $avaliacao = $_POST['estrela'];

        $clienteDAO = new ClienteDAO();
        $clienteDAO -> avaliarEstabelecimento($id, $idUsuario, $avaliacao);

      }else{
        echo"<script>alert('Você precisa logar');window.location.href='javascript:history.go(-1)'</script>";
      }
    }

    if(isset($_POST['comentar'])){

      session_start();

        // id da empresa
        $id = $_POST['idcomentario'];

        // id do usuario logado
        $idUsuario = $_SESSION['logado'];

        // avaliacao do usuario
        $comentario = $_POST['comentario'];

        $clienteDAO = new ClienteDAO();
        $clienteDAO -> comentar($id, $idUsuario, $comentario);

    }

    if(isset($_POST['valida_cupom'])){
    
      if(empty($_POST['cupom'])){
        $_SESSION['msg_ava_null'] = "<div class='alert alert-success' role='alert'>Digite um número</div>";
          echo"<script>window.location.href='javascript:history.go(-1)'</script>";

        }elseif(!empty($_POST['valida_cupom'])){
          session_start();

          if(isset($_SESSION['logado']) && $_SESSION['status'] == 0){
            $cupom = $_POST['cupom'];

            $idEmpresa = $_POST['idEmpresa'];
            $idUsuario = $_POST['idUsuario'];

            $clienteDAO = new ClienteDAO();
            $clienteDAO -> validarCupom($cupom, $idEmpresa, $idUsuario);

          }elseif(isset($_SESSION['logado']) && $_SESSION['status'] == 1){
            echo"Apenas clientes podem inserir cupons";
          }else{
            echo"você precisa estar logado";
          }
        }
    }
?>