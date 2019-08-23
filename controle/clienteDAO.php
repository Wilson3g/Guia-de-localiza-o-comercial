<?php
  //CHAMADA DOS ARQUIVOS
  require_once "usuario.php";
  require_once "class.conexao.php";

  // CRIACAO DA CLASSSE CLIENTE (HERDA A CLASSSE USUARIO)
  class ClienteDAO extends Usuario{
    private $cpf;
    private $pdo;

    // INSTANCIA DA CONEXAO
    public function __construct(){
      $this->pdo = Conexao::getInstance();
    }

    // SETTERS E GETTER TELEFONE
    public function setCpf($cpf){
      $this->cpf = $cpf;
    }

    public function getCpf(){
      return $this->cpf;
    }
    
    // INSERE OS DADOS NO BANCO DE DADOS
    function salvar($array){

      try{
        $sql = "INSERT INTO login (email, senha) VALUES (?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $array->getEmail());
        $stmt->bindValue(2, $array->getSenha());
        $stmt->execute();
        $idusuario = $this->pdo->lastInsertId();

        if(isset($stmt)){
          echo "<script>
					window.location.href='../info_cliente.php?idusuario={$idusuario}';
					</script>";
        }
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }

    public function informacoesCliente($dados, $img, $idusuario){
  
      $id =  $idusuario;
                        
      $name = $img['name'];
      $tmp = $img['tmp_name'];
      $size = $img['size'];

        // Pega a extensão
        $ext = pathinfo ( $name, PATHINFO_EXTENSION );
  
      $pasta = '../imagens-perfil-usuario';
      $maxSize = '1024 * 1024 *2';
      $permitir = array('jpg', 'jpeg', 'png');

      $novoNome = uniqid ( time () ) . '.' . $ext;

      $sql = "INSERT INTO cliente (nome, sobrenome, cpf, foto_perfil, login_login_id) VALUES (?,?,?,?,?)";
      $stmt = $this->pdo->prepare($sql);
      $stmt -> bindValue(1, $dados->getNome());
      $stmt -> bindValue(2, $dados->getSobrenome());
      $stmt -> bindValue(3, $dados->getCpf());
      $stmt -> bindValue(4, $novoNome);
      $stmt -> bindValue(5, $id);
      $stmt->execute();

      if(isset($stmt)){
        $upload = move_uploaded_file($tmp, $pasta.'/'.$novoNome);
        if($upload){
          header("../logar.php");
        }
    }
    }

    public function avaliarEstabelecimento($idEmpresa, $idUsuario, $avaliacao){
      try{
        // Busca o id do usuário
        $select = "SELECT cliente_id FROM cliente INNER JOIN login on cliente.login_login_id = login.login_id WHERE login_id = ?";
        $select1 = $this->pdo->prepare($select);
        $select1 -> bindValue(1, $idUsuario);
        $select1 -> execute();
        $idCliente = $select1->fetchALL(PDO::FETCH_ASSOC);

        foreach($idCliente as $linha){
          $id = $linha['cliente_id'];

          $check = "SELECT * FROM avaliacao WHERE cliente_cliente_id = ? AND empresa_empresa_id = ?";
          $check2 = $this->pdo->prepare($check);
          $check2->bindValue(1, $id);
          $check2->bindValue(2, $idEmpresa);
          $check2->execute();
          $validate = $check2->fetchALL(PDO::FETCH_ASSOC);

          if(empty($validate)){

            $sql = "INSERT INTO avaliacao (avaliacao, empresa_empresa_id, cliente_cliente_id) VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $avaliacao);
            $stmt->bindValue(2, $idEmpresa);
            $stmt->bindValue(3, $id);
            $stmt->execute();

            if(isset($stmt)){
              $_SESSION['msg_ava'] = "<div class='alert alert-success' role='alert'>Avaliado com sucesso!</div>";
              echo"<script>window.location.href='javascript:history.go(-1)'</script>";
            }

          }else{
            $_SESSION['msg_ava'] = "<div class='alert alert-success' role='alert'>Sua avaliacão já foi registrada!</div>";
              echo"<script>window.location.href='javascript:history.go(-1)'</script>";
          }
        }

      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }

    public function comentar($idEmpresa, $idUsuario, $comentario){

      try{
        // Busca o id do usuário
        $select = "SELECT cliente_id FROM cliente INNER JOIN login on cliente.login_login_id = login.login_id WHERE login_id = ?";
        $select2 = $this->pdo->prepare($select);
        $select2 -> bindValue(1, $idUsuario);
        $select2 -> execute();
        $idCliente = $select2->fetchALL(PDO::FETCH_ASSOC);

        foreach($idCliente as $linha){
          $id = $linha['cliente_id'];

          $sql = "INSERT INTO comentario (comentario, empresa_empresa_id, cliente_cliente_id) VALUES (?, ?, ?)";
          $stmt = $this->pdo->prepare($sql);
          $stmt->bindValue(1, $comentario);
          $stmt->bindValue(2, $idEmpresa);
          $stmt->bindValue(3, $id);
          $stmt->execute();
        }
        //

        if(isset($stmt)){
          $_SESSION['msg_com'] = "<div class='alert alert-success' role='alert'>Postado com sucesso!</div>";
          echo"<script>window.location.href='javascript:history.go(-1)'</script>";
        }
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }

    public function listarInformacoesCliente($id){

      $sql = "SELECT * FROM cliente INNER JOIN login on cliente.login_login_id = login.login_id WHERE login.login_id = ?";
      $stmt = $this->pdo->prepare($sql);
      $stmt -> bindValue(1, $id);
      $stmt -> execute();
      $clientes = $stmt->fetchALL(PDO::FETCH_ASSOC);
      return $clientes;
    }

    function atualizarInformacoesCliente($id, $array){
      try{

        $sql = "UPDATE cliente SET nome=?, sobrenome=? WHERE cliente_id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $array->getNome());
        $stmt->bindValue(2, $array->getSobrenome());
        $stmt->bindValue(3, $id);
        $stmt->execute();

        if(isset($stmt)){
          session_start();
          $idusuario = $_SESSION['logado'];

          $_SESSION['cliente_atu'] = "<div class='alert alert-success' role='alert'>Atualizado com sucesso!</div>";
          header("Location: ../atualizar-cliente.php?idusuario=$idusuario");
        }

      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }

  }
?>
