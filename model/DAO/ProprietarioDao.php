<?php
    include_once ('../model/classes/Cliente.php');
    class ProprietarioDao{
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

        public function incluirProprietario($proprietario){
            $sql = "INSERT INTO proprietario (cod_proprietario,cnpj,nome,rg,cpf,email,endereco,telefone) VALUES ('".
            $proprietario->getCod_proprietario()."','".
            $proprietario->getCnpj()."','".
            $proprietario->getNome()."','".
            $proprietario->getRg()."','".
            $proprietario->getCpf()."','".
            $proprietario->getEmail()."','".
            $proprietario->getEndereco()."','".
            $proprietario->getTelefone()."')";
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

        public function alterarProprietario($proprietario){
            $sql="UPDATE proprietario SET ".
            "cnpj = '".$proprietario->getCnpj()."',".
            "nome = '".$proprietario->getNome()."',".
            "rg = '".$proprietario->getRg()."',".
            "cpf = '".$proprietario->getCpf()."',".
            "email = '".$proprietario->getEmail()."',".
            "endereco = '".$proprietario->getEndereco()."',".
            "telefone = '".$proprietario->getTelefone()."'".
            " WHERE " . " cod_proprietario= '".$proprietario->getCod_proprietario()."';";
    
            $return = mysqli_query($this->c,$sql);
            if (mysqli_affected_rows($this->c) == 0) {
                return false;
            }else {
                return true;
            }
        }

    }

?>