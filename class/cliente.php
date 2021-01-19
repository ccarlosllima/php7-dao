<?php

    class Cliente{
        private $nome;
        private $codigo;

        public function getNome(){
            return $this->nome;
        }
        public function setNome($value ){
            $this->nome = $value;
        }
        public function getCodigo(){
            return $this->codigo;
        }
        public function setCodigo($cd){
            $this->codigo = $cd;
        }
    }

?>