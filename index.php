<?php
    require 'class/usuario.php';
    require 'class/cliente.php';
   require_once("config.php");
  
    // ---------------------------------------------------------
    // $us = new Usuario();
    // $us->loadById(1);
    // echo $us;

    #-----------------------------------------------------------

    // $list = Usuario::getList();
    // echo json_encode($list);

    
    #----------------------------------------------------------
    // $user = new Usuario();
    // $user->serch(2,8744);
    // echo $user;
    $insert = new Usuario();
    $insert->setLogin('luiz andrade');
    $insert->setSenha(1452);
    $insert->insert();
    echo $insert;
?>