<?php
    include_once 'administradorDAO.php';

    $id = $_GET['id'];

    $administrador = new Administrador;
    $administrador -> ativarCliente($id);
