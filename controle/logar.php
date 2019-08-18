<?php
  //CHAMADA DO ARQUIVO
  require_once 'usuario.php';

  if($_POST){
    //ESTANCIANDO A CLASSES
    $usuario = new Usuario();
    //FAZENDO O LOGIN
    $usuario->logar($_POST);
  }

?>
