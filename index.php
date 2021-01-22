<?php
    require 'class/usuario.php';
    require 'class/cliente.php';
   require_once("config.php");
  
    // ---------------------------------------------------------
    // $us = new Usuario();
    // $us->loadById(1);
    // echo $us;

    #-----------------------------------------------------------

    $list = Usuario::getList();
    echo json_encode($list);
    // var_dump($list);
?>