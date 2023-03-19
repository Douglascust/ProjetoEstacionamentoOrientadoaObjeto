<?php
    include_once ("../model/classes/Pessoa.php");
    include_once ("../model/dao/ProprietarioDao.php");
    final class Proprietario extends Pessoa{
        
        protected $cod_proprietario;
        protected $cnpj;

        public function __construct($cod_proprietario, $cnpj, $nome, $rg, $cpf, $email, $endereco, $telefone){
            parent::__construct($nome, $rg, $cpf, $email, $endereco, $telefone);
            $this -> setCod_proprietario($cod_proprietario);
            $this -> setCnpj($cnpj);

    }

        public function getCod_proprietario()
        {
                return $this->cod_proprietario;
        }

        public function setCod_proprietario($cod_proprietario)
        {
                $this->cod_proprietario = $cod_proprietario;

                return $this;
        }

        public function getCnpj()
        {
                return $this->cnpj;
        }

        public function setCnpj($cnpj)
        {
                $this->cnpj = $cnpj;

                return $this;
        }

        public function incluirProprietario()
        {
                $proprietarioDao = new ProprietarioDao();
                if ($proprietarioDao->incluirProprietario($this)) {
                        return true;
                }else {
                        return false;
                }
        }

        final public function alterar()
        {
                $proprietarioDao = new ProprietarioDao();
                if ($proprietarioDao->alterarProprietario($this)) {
                        return true;
                }else {
                        return false;
                }
        }

}

?>