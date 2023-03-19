<?php
    include_once ('../model/classes/Funcionario.php');
    class FuncionarioDao{
        private $c; //conexão com o banco de dados
        public function __construct()
        {
            $this->c= mysqli_connect("localhost", "root", "", "estacionamento");
            if (mysqli_connect_errno() == 0) {
                echo "\n" . "Conexão ok!";
            }else {
                $msg = mysqli_connect_error();
                echo "\n" . "Erro na conexão SQL!";
                echo "\n" . "O MySQL retornou a seguinte mensagem" . $msg;
            }
        }

        public function incluirFuncionario($funcionario){
            $sql = "INSERT INTO funcionario (cod_funcionario,salario,nome,rg,cpf,email,endereco,telefone) VALUES ('".
            $funcionario->getCod_funcionario()."','".
            $funcionario->getSalario()."','".
            $funcionario->getNome()."','".
            $funcionario->getRg()."','".
            $funcionario->getCpf()."','".
            $funcionario->getEmail()."','".
            $funcionario->getEndereco()."','".
            $funcionario->getTelefone()."')";
            $result = mysqli_query($this->c,$sql);
            if ($result == true) {
                echo "\n" . "Execução bem sucedida do INSERT";
                return true;
            }else {
                $msg = mysqli_error($this->c);
                $_SESSION['msg'] = "\n" . "Falha no INSERT! Mensagem de erro: '$msg";
                return false;
            }  
        }

        public function alterarFuncionario($funcionario){
            $sql="UPDATE funcionario SET ".
            "salario = '".$funcionario->getSalario()."',".
            "nome = '".$funcionario->getNome()."',".
            "rg = '".$funcionario->getRg()."',".
            "cpf = '".$funcionario->getCpf()."',".
            "email = '".$funcionario->getEmail()."',".
            "endereco = '".$funcionario->getEndereco()."',".
            "telefone = '".$funcionario->getTelefone()."'".
            " WHERE " . " cod_funcionario = '".$funcionario->getCod_funcionario()."';";
    
            $return = mysqli_query($this->c,$sql);
            if (mysqli_affected_rows($this->c) == 0) {
                return false;
            }else {
                return true;
            }
        }

    }
?>