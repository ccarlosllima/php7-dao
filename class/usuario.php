<?php
    require 'sql.php';
    class Usuario{
        private $idusuario;
        private $login;
        private $senha;
        private $dtcadastro;

        public function getIdusuario(){
            return $this->idusuario;
        }
        public function setIdusuario($id){
            $this->idusuario = $id;
        }
        public function getLogin(){
          return  $this->$login; 
        }
        public function setLogin($loginUsuario){
            $this->login = $loginUsuario;
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
        // função retorna os dados com base em um id
        public function loadById($id){
            $sql = new Sql();
            $result = $sql->select('SELECT * FROM tb_usuario WHERE idusuario :id', array(
                ":id" => $id
            ));
            if (count($result) > 0) {
                $row = $result[0];
                $this->setIdusuario($row['idusuario']);
                $this->setLogin($row['login']);
                $this->setSenha($row['senha']);
                $this->setDtcadastro(new DateTime(['dtcadastro'])); 
            }
           
        }
        public function __toString(){
            return json_encode(array(
                "idusuario" => $this->getIdusuario(),
                "login" => $this->getLogin(),
                "senha" => $this->getSenha(),
                "dtcadastro" =>$this->getDtcadastro()//->format("d/m/y: H:i:s")
            ));
        }
    }
    


?>