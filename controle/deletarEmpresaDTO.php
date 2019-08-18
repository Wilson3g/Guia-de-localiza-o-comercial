<?php
    include_once 'administradorDAO.php';

    $id = $_GET['id'];

    $administrador = new Administrador;
    $administrador -> deletarEmpresa($id);
?>