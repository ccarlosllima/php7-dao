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
            
            if (count($res) > 0) {
                $row = $res[0];
                $this->setData($row);
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
            if (count($res) > 0) {
                $row = $res[0];
                $this->setData($row);
            }
            else {
                throw new Exception("Erro ao fazer login");            
            }
        }
        // insere novo usuario disparando uma rotina no banco de dados
        public function insert(){
            $sql = new Sql();
            $res = $sql->select("CALL sp_usuario_insert(:login, :senha)",array(
                ":login" => $this->getLogin(),
                ":senha" => $this->getSenha()
            ));
            if (count($res) > 0) {
                $this->setData($res);
            }

        }

        public function setData($data){
            $this->setIdUsuario($data['idusuario']);
            $this->setLogin($data['login']);
            $this->setSenha($data['senha']);
            $this->setDtcadastro($data['dtcadastro']);
        }

        // Atualiza o registro nos campos data e senha
       
        public function update($senha , $date){
            $this->setSenha($senha);
            $this->setDtcadastro($date);
            $sql = new Sql();
            $sql->query("UPDATE tb_usuario SET dtcadastro = :dt, senha = :senha WHERE idusuario = :id",array(
                ':dt' => $this->getDtcadastro(),
                ':senha' => $this->getSenha(),
                ':id' => $this->getIdUsuario()
            ));


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