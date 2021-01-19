<?php
    require 'class/usuario.php';
    require 'class/cliente.php';
   require_once("config.php");
  

    $carlos = new Usuario();

    $carlos->loadById(1);
    echo $carlos;

    // ---------------------------------------------------------

?>