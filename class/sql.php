<?php

class sql extends PDO{
    private $conn;
    public function __construct(){
        $this->conn = new PDO('mysql:host=localhost;dbname=php7','carloslima','admcarlos'); 
    }
    private function setParams($statment, $parameteres = array()){
        foreach ($parameteres as $key => $value) {
            $this->setParam($key,$value);
        }
    }
    private function setParam($statment,$key,$value){
        $statment->bindParam( $key,$value);
    }
    public function query($rowQuery,$params = array()){
        $stmt = $this->conn->prepare($rowQuery);
        $this->setParams($stmt,$params);
        $stmt->execute();  
        return $stmt; 
    }
    public function select($rowQuery,$params = array()){
       $stmt =  $this->query($rowQuery,$params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>