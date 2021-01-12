<?php

    require_once("config.php");
    
    $sql = new sql();
    $users = $sql->select("SELECT * FROM cliente");

    echo json_encode($users);


?>