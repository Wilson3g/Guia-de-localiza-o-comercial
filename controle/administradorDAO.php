<?php
    include_once('class.conexao.php');

    class Administrador{
        private $pdo;

        public function __construct(){
            $this->pdo = Conexao::getInstance();
        }

        // CRUD EMPRESAS

        public function deletarEmpresa($id){
            try {
                $sql = "UPDATE empresa SET situacao = '0' WHERE empresa_id = ?";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(1, $id);
                $stmt->execute();

                if(isset($stmt)){
                    echo"<script>window.location.href='../view/administrar-empresa.php'</script>";
                }else{
                  echo"<script>alert('Erro ao deletar empresa');window.location.href='../view/administrar-empresa.php'</script>";
                }

            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        }

        public function ativarEmpresa($id) {
          try {
              $sql = "UPDATE empresa SET situacao = '1' WHERE empresa_id = ?";
              $stmt = $this->pdo->prepare($sql);
              $stmt->bindValue(1, $id);
              $stmt->execute();

              if(isset($stmt)){
                echo"<script>window.location.href='../view/administrar-empresa.php'</script>";
              }else{
                echo"<script>alert('Erro ao deletar empresa');window.location.href='../view/administrar-empresa.php'</script>";
              }

          } catch (PDOException $exc) {
              echo $exc->getMessage();
          }
        }

        public function buscarEmpresas($buscar){
            echo'
              <table class="table">
              
              <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">CNPJ</th>
                <th scope="col">Alterar</th>
                <th scope="col">Excluir</th>
                </tr>
              </thead>';
              
      
            $sql = "SELECT * FROM empresa INNER JOIN login_usuario on empresa.login_id = login_usuario.login_id WHERE nome_fantasia LIKE '%$buscar%'";
            $stmt = $this->pdo->prepare($sql);
            $stmt -> execute();
            $empresas = $stmt->fetchALL(PDO::FETCH_ASSOC);
      
      
            foreach($empresas as $key){
              echo'
            <tbody>
              <tr>
                <td>'.$key['nome_fantasia'].'</td>
                <td>'.$key['email'].'</td>
                <td id="cnpj">'.$key['cnpj'].'</td>
              <td><a href="atualizar-empresa.php?id='.$key['empresa_id'].'"><img src="img/troca.png" height="30px" width="30px"></a></td>
              <td>';
              if(isset($key['situacao']) && $key['situacao'] == 0){
                echo '<a href="controle/ativarEmpresaDTO.php?id='.$key['empresa_id'].'">
                <img src="img/ativo.png" height="30px" width="30px">
                </a>';
              }elseif(isset($key['situacao']) && $key['situacao'] == 1){
                echo '<a href="controle/deletarEmpresaDTO.php?id='.$key['empresa_id'].'">
                <img src="img/desativo.png" height="30px" width="30px">
                </a>';
              }
              echo'
              </td>
              </tr>
              ';
            }

            echo '</table>';
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
                header("Location: ../view/atualizar-clienteC.php?id='.$idUsuario.'");
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

        // CRUD CLIENTES

        public function buscarClientes($buscar){
          echo'
              <table class="table">
              
              <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">CPF</th>
                <th scope="col">Alterar</th>
                <th scope="col">Excluir</th>
                </tr>
              </thead>';
            
    
          $sql = "SELECT * FROM cliente INNER JOIN login_usuario on cliente.login_id = login_usuario.login_id WHERE nome_completo LIKE '%$buscar%'";
          $stmt = $this->pdo->prepare($sql);
          $stmt -> execute();
          $empresas = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
          foreach($empresas as $key){
            echo'
          <tbody>
            <tr>
              <td>'.$key['nome_completo'].'</td>
              <td>'.$key['email'].'</td>
              <td id="cpf">'.$key['cpf'].'</td>
            <td><a href="atualizar-cliente.php?id='.$key['cliente_id'].'"><img src="img/troca.png" height="30px" width="30px"></a></td>
            <td>';
            if(isset($key['situacao']) && $key['situacao'] == 0){
              echo '<a href="controle/ativarClienteDTO.php?id='.$key['cliente_id'].'">
              <img src="img/ativo.png" height="30px" width="30px">
              </a>';
            }elseif(isset($key['situacao']) && $key['situacao'] == 1){
              echo '<a href="controle/deletarClienteDTO.php?id='.$key['cliente_id'].'">
              <img src="img/desativo.png" height="30px" width="30px">
              </a>';
            }
            echo'
            </td>
            </tr>
            ';
          }

          echo'</table>';
        }

        public function deletarCliente($id) {
          try {
              $sql = "UPDATE cliente SET situacao = '0' WHERE cliente_id = ?";
              $stmt = $this->pdo->prepare($sql);
              $stmt->bindValue(1, $id);
              $stmt->execute();

              if(isset($stmt)){
                  echo"<script>window.location.href='../view/administrar-cliente.php'</script>";
              }else{
                echo"<script>alert('Erro ao deletar cliente');window.location.href='../view/administrar-cliente.php'</script>";
              }

          } catch (PDOException $exc) {
              echo $exc->getMessage();
          }
        }

        public function ativarCliente($id) {
          try {
              $sql = "UPDATE cliente SET situacao = '1' WHERE cliente_id = ?";
              $stmt = $this->pdo->prepare($sql);
              $stmt->bindValue(1, $id);
              $stmt->execute();

              if(isset($stmt)){
                  echo"<script>window.location.href='../view/administrar-cliente.php'</script>";
              }else{
                echo"<script>alert('Erro ao deletar cliente');window.location.href='../view/administrar-cliente.php'</script>";
              }

          } catch (PDOException $exc) {
              echo $exc->getMessage();
          }
        }

      function atualizarInformacoesCliente($id, $array){
        try{

          $sql = "UPDATE cliente SET nome_completo=?, cpf=? WHERE cliente_id=?";
          $stmt = $this->pdo->prepare($sql);
          $stmt->bindValue(1, $array->getNome());
          $stmt->bindValue(2, $array->getCpf());
          $stmt->bindValue(3, $id);
          $stmt->execute();
  
          if(isset($stmt)){
            session_start();
            $idUsuario = $_SESSION['logado'];

            $_SESSION['cliente_atu'] = "<div class='alert alert-success' role='alert'>Atualizado com sucesso!</div>";
            header("Location: ../view/atualizar-clienteC.php?id='.$idUsuario.'");
          }
  
        }catch(PDOException $e){
          echo $e->getMessage();
        }
      }

      public function listarInformacoesCliente($id){

        $sql = "SELECT * FROM cliente INNER JOIN login_usuario on cliente.login_id = login_usuario.login_id WHERE cliente_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt -> bindValue(1, $id);
        $stmt -> execute();
        $clientes = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $clientes;
      }

      public function listarCupons(){
        $sql = "SELECT * FROM cupom";
        $stmt = $this->pdo->prepare($sql);
        $stmt -> execute();
        $empresas = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $empresas;
      }

      public function criarCupom($cupom){
        $sql = "INSERT INTO cupom(cupom) values (?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $cupom);
        $stmt->execute();

        if(isset($stmt)){
          echo"<script>alert('Cupom criado com sucesso');window.location.href='../view/area-administrativa.php'</script>";
        }else{
          echo"<script>alert('Erro ao criar cupom');window.location.href='javascript:history.go(-1)</script>";
        }
      }

      public function deletarCupom(){
        $sql = "TRUNCATE TABLE cupom";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        if(isset($stmt)){
          echo"<script>alert('Cupom deletado');window.location.href='../view/area-administrativa.php'</script>";
        }
      }
  }
?>