<?php

class sql extends PDO{
    private $conn;
    public function __construct(){
        $this->conn = new PDO('mysql:host=localhost;dbname=php7','carloslima','admcarlos'); 
    }
    public function insert ($nome, $dados){
        $stmt = $this->conn->prepare("INSERT into cliente VALUES(:n,:d)");
        $stmt->bindValue(':n',$nome);
        $stmt->bindValue(':d',$dados);
        $stmt->execute();

    }
    public function listar(){
        $stmt = $this->conn->prepare('SELECT nome,email FROM cliente');
        if(!$stmt->execute()){
            echo "<pre>";
            print_r($stmt->errorInfo());
        }
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $key => $value) {
            var_dump($key."".$value);
        }
        var_dump($dados[0]["email"]);
    }
}
?>