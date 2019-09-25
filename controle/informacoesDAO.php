<?php
    include_once 'class.conexao.php';
    include_once 'usuario.php';

    class informacoes extends Usuario{
        private $nome;
        private $descricao;
        private $inicioExpediente;
        private $fimExpediente;
        private $tipoEstabelecimento;
        private $name;
        private $tmp;
        private $size;
        private $cnpj;
        private $telefone;
        private $endereco;
        private $cidade;
        private $estado;
        private $numero;
        private $pdo;

        public function __construct()
        {
            $this->pdo = Conexao::getInstance();
        }

        public function setNome($nome)
        {
            $this->nome = $nome;
        }
        public function setDescricao($descricao)
        {
            $this->descricao = $descricao;
        }
        public function setInicioExpediente($inicioExpediente)
        {
            $this->inicioExpediente = $inicioExpediente;
        }
        public function setFimExpediente($fimExpediente)
        {
            $this->fimExpediente = $fimExpediente;
        }
        public function setTipoEstabelecimento($tipoEstabelecimento)
        {
            $this->tipoEstabelecimento = $tipoEstabelecimento;
        }
        public function setFoto($foto)
        {
            $this->foto = $foto;
        }
        public function setCNPJ($cnpj)
        {
            $this->cnpj = $cnpj;
        }
        public function setTelefone($telefone)
        {
            $this->telefone = $telefone;
        }
        public function setEndereco($endereco)
        {
            $this->endereco = $endereco;
        }
        public function setCidade($cidade)
        {
            $this->cidade = $cidade;
        }
        public function setEstado($estado)
        {
            $this->estado = $estado;
        }
        public function setNumero($numero)
        {
            $this->numero = $numero;
        }
  

        public function getNome()
        {
            return $this->nome;
        }
        public function getDescricao()
        {
            return $this->descricao;
        }
        public function getInicioExpediente()
        {
            return $this->inicioExpediente;
        }
        public function getFimExpediente()
        {
            return $this->fimExpediente;
        }
        public function getTipoEstabelecimento()
        {
            return $this->tipoEstabelecimento;
        }
        public function getFoto()
        {
            return $this->foto;
        }
        public function getCNPJ()
        {
            return $this->cnpj;
        }
        public function getTelefone()
        {
            return $this->telefone;
        }
        public function getEndereco()
        {
            return $this->endereco;
        }
        public function getCidade()
        {
            return $this->cidade;
        }
        public function getEstado()
        {
            return $this->estado;
        }
        public function getNumero()
        {
            return $this->numero;
        }

        public function salvar($empresa)
        {
        
            // //SELECIONA OS DADOS DO BANCO
            // $query_select = "SELECT email FROM empresa WHERE email = ':email'";
            // $sql = $this->pdo->prepare($query_select);
            // $sql -> bindValue(":email", 1);
            // $sql -> execute();
              
            // //FAZ UM ARRAY ASSOCIATIVO COM OS DADOS OBTIDOS NO BANCO
            // $array = $sql -> fetch(PDO::FETCH_ASSOC);
            // $logarray = $array['email'];
      
            // var_dump($logarray);
      
            // exit();
              
            // //VERIFICA SE O DADO DIGITADO CONFERE COM O BANCO DE DADOS
            // if($logarray == $empresa->setEmail($email)){
            //     echo"<script>alert('Esse email já está cadastrado');window.location.href='../logar.html'</script>";
            // }else{
              //CASO NÃO EXISTA EMAIL IGUAL GUARDA AS INFORMAÇÕES NO BANCO DE DADOS
                try{
                  $sql = "INSERT INTO login (email, senha) VALUES (?,?)";
                  $stmt = $this->pdo->prepare($sql);
                  $stmt->bindValue(1, $empresa->getEmail());
                  $stmt->bindValue(2, $empresa->getSenha());
                  $stmt->execute();
				  $idusuario = $this->pdo->lastInsertId();
    
                  if(isset($stmt)){
                    echo "<script>
					window.location.href='../informacoes.php?idusuario={$idusuario}';
					</script>";
                  }
                }catch(PDOException $e){
                  echo $e->getMessage();
                }
        }

        public function inserirInformacoes($dados, $img, $idusuario)
        {

            $id =  $idusuario;
                        
            $name = $img['name'];
            $tmp = $img['tmp_name'];
            $size = $img['size'];

             // Pega a extensão
             $ext = pathinfo ( $name, PATHINFO_EXTENSION );
        

            $pasta = '../imagens-perfil';
            $maxSize = '1024 * 1024 *2';
            $permitir = array('jpg', 'jpeg', 'png');

            $novoNome = uniqid ( time () ) . '.' . $ext;

            $sql = "INSERT INTO empresa(nome, descricao, inicio_expediente, fim_expediente, foto_perfil, cnpj, telefone, login_login_id, tipo_estabelecimento) VALUES (?,?,?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt -> bindValue(1, $dados->getNome());
            $stmt -> bindValue(2, $dados->getDescricao());
            $stmt -> bindValue(3, $dados->getInicioExpediente());
            $stmt -> bindValue(4, $dados->getFimExpediente());
            $stmt -> bindValue(5,  $novoNome);
            $stmt -> bindValue(6, $dados->getCNPJ());
            $stmt -> bindValue(7, $dados->getTelefone());
            $stmt-> bindValue(8, $id);
            $stmt->bindValue(9, $dados->getTipoEstabelecimento());
            $stmt -> execute();
            $idusuario = $this->pdo->lastInsertId();
                
            if(isset($stmt)){
                $upload = move_uploaded_file($tmp, $pasta.'/'.$novoNome);
                if($upload){
                     echo "<script>window.location.href='../endereco.php?idusuario={$idusuario}'</script>";
                }
            }
        }

        public function inserirEndereco($dados, $idusuario)
        {
            
            $id =  $idusuario;

            $sql = "INSERT INTO endereco(endereco, cidade, estado, numero, empresa_empresa_id) VALUES (?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt -> bindValue(1, $dados->getEndereco());
            $stmt -> bindValue(2, $dados->getCidade());
            $stmt -> bindValue(3, $dados->getEstado());
            $stmt -> bindValue(4, $dados->getNumero());
            $stmt -> bindValue(5, $id);
            $stmt->execute();
                
            if(isset($stmt)){
                echo "<script>window.location.href='../index.php'</script>";
            }
        }
    }
?>