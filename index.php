<?php
    require 'class/usuario.php';
    require_once("config.php");
    
    
    // $sql = new Sql();
    // $users = $sql->select("SELECT * FROM tb_usuario");
    // echo json_encode($users);


   $row = new Usuario();
     $row->loadById(1);
    echo $row;

?>