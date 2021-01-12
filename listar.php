<?php
    require 'sql.php';
    $dados = new sql();
    $dados->listar();
    // var_dump($dados);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>
<body>
    <div>
        <table>
            <tr>
                <td><?php //echo $dados->nome; ?></td>
                <td><?php //print_r($dados->email); ?></td>
            </tr>
        </table>
    </div>
    
</body>
</html>
