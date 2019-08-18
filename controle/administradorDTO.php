<?php
  require_once 'administradorDAO.php';

  if(isset($_POST['registrar_cupom'])){
    $cupom = $_POST['cupom'];

  $administrador = new Administrador;

  $administrador -> criarCupom($cupom);
  }else{
    $administrador = new Administrador();
    $administrador->deletarCupom();
  }

  
?>