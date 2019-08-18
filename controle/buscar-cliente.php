<?php
    include_once 'administradorDAO.php';

    $buscar = $_POST['buscar'];

    $administrador = new Administrador;
    $administrador -> buscarClientes($buscar);
?>