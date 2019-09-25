<?php

    require_once "class.conexao.php";

  // CRIACAO DA CLASSE USUARIO
  class Usuario{
    // ATRIBUTOS
    private $nome;
    private $sobrenome;
    private $senha;
    private $email;
    private $pdo;
    
    // INSTANCIA DA CONEXAO
    public function __construct()
    {
      $this->pdo = Conexao::getInstance();
    }

    // METEDOS SETTERS E GETTERS
    public function setNome($nome)
    {
      $this->nome = $nome;
    }

    public function setSobrenome($sobrenome)
    {
      $this->sobrenome = $sobrenome;
    }

    public function setSenha($senha)
    {
      $this->senha = $senha;
    }

    public function setEmail($email)
    {
      $this->email = $email;
    }

    public function getNome()
    {
      return $this->nome;
    }

    public function getSobrenome()
    {
      return $this->sobrenome;
    }

    public function getSenha()
    {
      return $this->senha;
    }

    public function getEmail()
    {
      return $this->email;
    }
      
    // FUNCAO LOGAR FUNCIONARIOS
    public function logar($dados)
    {
      $this->email = $dados['email'];
      $this->senha = sha1($dados['senha']);

      // SELECIONA A TABELA CLIENTE NO BANCO
			$cst = $this->pdo->prepare("SELECT * FROM login WHERE `email` = :email AND `senha` = :senha");
			$cst->bindParam(':email', $this->email, PDO::PARAM_STR);
			$cst->bindParam(':senha', $this->senha, PDO::PARAM_STR);
			$cst->execute();

      // CONFERE QUANTOS REGISTROS FORAM ENCONTRADOS
			if($cst->rowCount() == 0){
        header('location: ../view/logar.php');

      // CASO SEJA ENCONTRADO ALGUM REGISTRO, EFETUAR LOGIN
			}else{
				session_start();
        $rst = $cst->fetch();
        
				$_SESSION['logado'] = $rst['login_id'];
        $_SESSION['status'] = $rst['status'];

        if($_SESSION['status'] == 1 ){
          echo "<script>window.location.href='../area-administrativa.php'</script>";
        }else{
          echo"<script>window.location.href='../index.php'</script>";
        }
      }
    }
  }
