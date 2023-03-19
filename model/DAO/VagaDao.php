<?php 
    include_once ('../model/classes/Vaga.php');
    class VagaDao{
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
    
        public function incluirVaga($vaga){
            $sql = "INSERT INTO vaga (cod_vaga,numerovaga,patio,datareserva,valor) VALUES ('".
            $vaga->getCod_vaga()."','".
            $vaga->getNumerovaga()."','".
            $vaga->getPatio()."','".
            $vaga->getDatareserva()."','".
            $vaga->getValor()."')";
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

        public function alterarVaga($vaga){
            $sql="UPDATE vaga SET ".
            "numerovaga = '".$vaga->getNumerovaga()."',".
            "patio = '".$vaga->getPatio()."',".
            "datareserva = '".$vaga->getDatareserva()."',".
            "valor = '".$vaga->getValor()."'".
            " WHERE " . " cod_vaga = '".$vaga->getCod_vaga()."';";
    
            $return = mysqli_query($this->c,$sql);
            if (mysqli_affected_rows($this->c) == 0) {
                return false;
            }else {
                return true;
            }
        }

        function consultar($vaga){

            $sql = "SELECT * FROM vaga WHERE cod_vaga = '".$vaga->getCod_vaga()."';";

            $result = mysqli_query($this->c, $sql);

            return $result;

        }

        function consultarListaVaga(){
            $sql = "SELECT cod_vaga, numerovaga, patio, datareserva, valor ". "from vaga";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
    }


?>