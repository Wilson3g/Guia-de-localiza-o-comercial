<?php

  // INCLUSÃO DOS ARQUIVOS
  require_once 'empresaDao.php';


    $senha = sha1($_POST['senha']);
    $email = $_POST['email'];
    $cnpj = $_POST['cnpj'];

    // INSTANCIA DA CLASSE CLIENTE NO ARQUIVO 'CLIENTE.PHP'
    $empresaDAO = new EmpresaDAO();
    $empresaDAO -> setEmail($email);
    $empresaDAO -> setSenha($senha);
    $empresaDAO -> setCNPJ($cnpj);

    $salvar = $empresaDAO;

    $empresaDAO -> salvar($salvar);
    
?>