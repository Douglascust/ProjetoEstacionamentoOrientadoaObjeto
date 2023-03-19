<?php
    include_once ('../model/classes/Cliente.php');
    class ClienteDao{
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

        public function incluirCliente($cliente){
            $sql = "INSERT INTO cliente (cod_cliente,cod_veiculo,nome,rg,cpf,email,endereco,telefone) VALUES ('".
            $cliente->getCod_cliente()."','".
            $cliente->getCod_veiculo()."','".
            $cliente->getNome()."','".
            $cliente->getRg()."','".
            $cliente->getCpf()."','".
            $cliente->getEmail()."','".
            $cliente->getEndereco()."','".
            $cliente->getTelefone()."')";
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


        public function alterarCliente($cliente){
            $sql="UPDATE cliente SET ".
            "cod_cliente = '".$cliente->getCod_cliente()."',".
            "cod_veiculo = '".$cliente->getCod_veiculo()."',".
            "nome = '".$cliente->getNome()."',".
            "rg = '".$cliente->getRg()."',".
            "cpf = '".$cliente->getCpf()."',".
            "email = '".$cliente->getEmail()."',".
            "endereco = '".$cliente->getEndereco()."',".
            "telefone = '".$cliente->getTelefone()."'".
            " WHERE " . " cod_cliente = '".$cliente->getCod_Cliente()."';";
    
            $return = mysqli_query($this->c,$sql);
            if (mysqli_affected_rows($this->c) == 0) {
                return false;
            }else {
                return true;
            }
        }

        function consultarCliente($cliente){
            $sql = "SELECT cod_cliente, cod_veiculo, nome, rg, cpf, email, endereco, telefone " . "from cliente WHERE " . " cod_cliente = '".$cliente->getCod_cliente()."';";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }

        function consultarListaCliente(){
            $sql = "SELECT cod_cliente, cod_veiculo, nome, rg, cpf, email, endereco, telefone ". "from cliente";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
    }
?>