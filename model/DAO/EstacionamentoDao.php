<?php
    include_once ('../model/classes/Estacionamento.php');
    class EstacionamentoDao{
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
    
        public function incluirEstacionamento($estacionamento){
            $sql = "INSERT INTO estacionamento (cod_estacionamento,nome,bairro,endereco,email,telefone) VALUES ('".
            $estacionamento->getCod_estacionamento()."','".
            $estacionamento->getNome()."','".
            $estacionamento->getBairro()."','".
            $estacionamento->getEndereco()."','".
            $estacionamento->getEmail()."','".
            $estacionamento->getTelefone()."')";
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

        public function alterarEstacionamento($estacionamento){
            $sql = "UPDATE estacionamento SET ".
            "nome = '".$estacionamento->getNome()."',".
            "bairro = '".$estacionamento->getBairro()."',".
            "endereco = '".$estacionamento->getEndereco()."',".
            "email = '".$estacionamento->getEmail()."',".
            "telefone = '".$estacionamento->getTelefone()."'".
            " WHERE ". "cod_estacionamento = '".$estacionamento->getCod_estacionamento()."';";
            $result = mysqli_query($this->c,$sql);
            if (mysqli_affected_rows($this->c) == 0){

                return false;

            }
            else{

                return true;

            }   
        }

        function consultar($estacionamento){

            $sql = "SELECT * FROM estacionamento WHERE cod_estacionamento = '".$estacionamento->getCod_estacionamento()."';";

            $result = mysqli_query($this->c,$sql);

            return $result;

        }

    }
?>