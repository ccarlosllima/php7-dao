<?php
    require 'sql.php';
    $nome = $_POST['nome'];
    $email = $_POST['email'];
   

    $sql = new sql();
    $sql->insert($nome,$email);
    header('Location:index.php');
?>