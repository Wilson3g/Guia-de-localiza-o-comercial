<?php
      //CHAMADA DOS ARQUIVOS
  require_once "usuario.php";
  require_once "class.conexao.php";

  // CRIACAO DA CLASSSE CLIENTE (HERDA A CLASSSE USUARIO)
  class EmpresaDAO extends Usuario{
    private $pdo;

    // INSTANCIA DA CONEXAO
    public function __construct(){
      $this->pdo = Conexao::getInstance();
    }

    // SETTERS E GETTER TELEFONE
    public function setCNPJ($cnpj){
      $this->cnpj = $cnpj;
    }

    public function getCNPJ(){
      return $this->cnpj;
    }

    // SESSAO DE LISTA

      public function listarEmpresas(){
        $sql = "SELECT * FROM empresa INNER JOIN endereco ON empresa.empresa_id = endereco.empresa_empresa_id ORDER BY empresa_id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt -> execute();
        $empresas = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $empresas;
      }

      public function listarInformacoes($id){
        $sql = "SELECT * FROM empresa INNER JOIN endereco ON empresa.empresa_id = endereco.empresa_empresa_id WHERE empresa_id = ? ORDER BY empresa_id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt -> execute();
        $empresas = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $empresas;
      }

      // lista estabelecimentos por categorias

      public function listarLojas(){
        $sql = "SELECT * FROM empresa INNER JOIN endereco ON empresa.empresa_id = endereco.empresa_empresa_id WHERE tipo_estabelecimento = 'loja' ORDER BY empresa_id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt -> execute();
        $empresas = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $empresas;
      }

      public function listarRestaurantes(){
        $sql = "SELECT * FROM empresa INNER JOIN endereco ON empresa.empresa_id = endereco.empresa_empresa_id WHERE tipo_estabelecimento = 'restaurante' ORDER BY empresa_id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt -> execute();
        $empresas = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $empresas;
      }

      public function listarBares(){
        $sql = "SELECT * FROM empresa INNER JOIN endereco ON empresa.empresa_id = endereco.empresa_empresa_id WHERE tipo_estabelecimento = 'bares' ORDER BY empresa_id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt -> execute();
        $empresas = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $empresas;
      }

      public function exibirAvaliacao($id){
        $sql = "SELECT avaliacao FROM avaliacao WHERE empresa_empresa_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt -> execute();
        $avaliacao = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $avaliacao;
      }

      public function exibirComentario($id){
        $sql = "SELECT * FROM comentario INNER JOIN cliente on comentario.cliente_cliente_id = cliente.cliente_id WHERE empresa_empresa_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt -> execute();
        $comentario = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $comentario;
      }

      public function atualizarInformacoes($id, $dados, $img){
                      
        $name = $img['name'];
        $tmp = $img['tmp_name'];
        $size = $img['size'];

         // Pega a extensão
         $ext = pathinfo ( $name, PATHINFO_EXTENSION );
    

        $pasta = '../imagens-perfil';
        $maxSize = '1024 * 1024 *2';
        $permitir = array('jpg', 'jpeg', 'png');

        $novoNome = uniqid ( time () ) . '.' . $ext;
        
        $sql = "UPDATE empresa SET nome_fantasia=?, endereco=?, descricao_da_empresa=?, inicio_expediente=?, fim_expediente=?, tipo_estabelecimento=?, foto_perfil=?, cnpj=? WHERE empresa_id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt -> bindValue(1, $dados->getNome());
        $stmt -> bindValue(2, $dados->getEndereco());
        $stmt -> bindValue(3, $dados->getDescricao());
        $stmt -> bindValue(4, $dados->getInicioExpediente());
        $stmt -> bindValue(5, $dados->getFimExpediente());
        $stmt -> bindValue(6, $dados->getTipoEstabelecimento());
        $stmt -> bindValue(7, $novoNome);
        $stmt -> bindValue(8, $dados->getCNPJ());
        $stmt -> bindValue(9, $id);
        $stmt -> execute();
            
        if(isset($stmt)){
            $upload = move_uploaded_file($tmp, $pasta.'/'.$novoNome);
            if($upload){
              session_start();
              $idUsuario = $_SESSION['logado'];

              $_SESSION['cliente_atu'] = "<div class='alert alert-success' role='alert'>Atualizado com sucesso!</div>";
              header("Location: ../atualizar-clienteC.php?id='.$idUsuario.'");
            }
        }
      }

      public function listarInformacoesEmpresa($id){

        $sql = "SELECT * FROM empresa WHERE empresa_id = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt -> execute();
        $informacoes = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $informacoes;
      }

      // fim da sessão listar estabelecimentos por categoria

      // FIM DA SESSAO LISTA
    }

?>