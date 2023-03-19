<?php
        include_once ("../model/classes/Pessoa.php");
        include_once ("../model/dao/FuncionarioDao.php");
        final class Funcionario extends Pessoa{

        protected $cod_funcionario;
        protected $salario;

        public function __construct($cod_funcionario, $salario,$nome, $rg, $cpf, $email, $endereco, $telefone){
                parent::__construct($nome, $rg, $cpf, $email, $endereco, $telefone);
                $this->setCod_funcionario($cod_funcionario); 
                $this->setSalario($salario); 
        }

        public function getCod_funcionario()
        {
                return $this->cod_funcionario;
        }

        public function setCod_funcionario($cod_funcionario)
        {
                $this->cod_funcionario = $cod_funcionario;

                return $this;
        }

        public function getSalario()
        {
                return $this->salario;
        }

        public function setSalario($salario)
        {
                $this->salario = $salario;

                return $this;
        }

        public function incluirFuncionario(){
                $funcionarioDao = new FuncionarioDao();
                if ($funcionarioDao->incluirFuncionario($this)) {
                        return true;
                }else {
                        return false;
                }
        }

        final public function alterar()
        {
                $funcionarioDao = new FuncionarioDao();
                if ($funcionarioDao->alterarFuncionario($this)) {
                        return true;
                }else {
                        return false;
                }
        }

}  

?>