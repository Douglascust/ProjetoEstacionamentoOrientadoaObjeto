<?php


    abstract class Pessoa{
        protected $nome;
        protected $rg;
        protected $cpf;
        protected $email;
        protected $endereco;
        protected $telefone;

        public function __construct($nome, $rg, $cpf, $email, $endereco, $telefone){

                $this -> setNome($nome);
                $this -> setRg($rg);
                $this -> setCpf($cpf);
                $this -> setEmail($email);
                $this -> setEndereco($endereco);
                $this -> setTelefone($telefone);

        }

        public function getNome()
        {
                return $this->nome;
        }

        public function setNome($nome)
        {
                $this->nome = $nome;

                return $this;
        }

        public function getRg()
        {
                return $this->rg;
        }

        public function setRg($rg)
        {
                $this->rg = $rg;

                return $this;
        }

        public function getCpf()
        {
                return $this->cpf;
        }

        public function setCpf($cpf)
        {
                $this->cpf = $cpf;

                return $this;
        }

        public function getEmail()
        {
                return $this->email;
        }

        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        public function getEndereco()
        {
                return $this->endereco;
        }

        public function setEndereco($endereco)
        {
                $this->endereco = $endereco;

                return $this;
        }

        public function getTelefone()
        {
                return $this->telefone;
        }

        public function setTelefone($telefone)
        {
                $this->telefone = $telefone;

                return $this;
        }

        
        public function alterar(){

        }
    }

?>