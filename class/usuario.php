<?php
    require "sql.php";
    class Usuario{
        private $idusuario;
        private $login;
        private $senha;
        private $dtcadastro;

        public function getIdUsuario(){
            return $this->idusuario;
        }
        public function setIdUsuario($value){
            $this->idusuario = $value;
        }
        public function getLogin(){
            return $this->login;
        }
        public function setLogin($value){
            $this->login = $value;
        }
        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($senha){
            $this->senha = $senha;
        }
        public function getDtcadastro(){
            return $this->dtcadastro;
        }
        public function setDtcadastro($data){
            $this->dtcadastro = $data;
        }

      //  função que passado um ID como parametro, ele retorna todos os dados refernete a esse ID!
        
      public function loadById($id){
            $stmt = new Sql();
            $res = $stmt->select('SELECT * FROM tb_usuario WHERE idusuario = :id',array(
                ":id" =>$id
            ));
            // Percorre a tabela e atribui os valores encontrados nos atributos da classe. 
            foreach ($res as $value) {   
                if (count($value) > 0) { 

                    $this->setIdUsuario($value['idusuario']);
                    $this->setLogin($value['login']);
                    $this->setSenha($value['senha']);
                    $this->setDtcadastro($value['dtcadastro']);
                }            
            }      
        } 
        //  Retorna uma lista de usuario
        public static function getList(){
            $list = new Sql();
            return $list->select('SELECT * FROM tb_usuario');
            
        }
        // recebe com parametro um id e uma senha e retorna os registros referente a esse usuario
        public function serch($id,$senha){
            $sql = new Sql();
            $res = $sql->select('SELECT * FROM tb_usuario WHERE  idusuario = :idusuario AND senha = :senha',array(
                ':idusuario' => $id,
                ':senha' => $senha
            ));
            if ($res > 0) {
                echo json_encode($res);
            }
            else {
                throw new Exception("erro ao fazer login");            
            }
        }
        
        //tranforma os dados em string e apresenta np formato JSON.   
       
       public function __toString(){
            return json_encode(array(
                "idusuario" =>$this->getIdusuario(),
                "login" =>$this->getLogin(),
                "senha" =>$this->getSenha(),
                "dtcadastro" => $this->getDtcadastro()
            ));
        }
        
              
    }
    


?>