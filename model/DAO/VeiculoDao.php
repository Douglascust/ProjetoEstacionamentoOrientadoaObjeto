<?php

include_once ('../model/classes/Veiculo.php');

class VeiculoDao{
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

    public function incluirVeiculo($veiculo){
        $sql = "INSERT INTO veiculo (cod_veiculo,placa,modelo,marca,cor) VALUES ('".
        $veiculo->getCod_veiculo()."','".
        $veiculo->getPlaca()."','".
        $veiculo->getModelo()."','".
        $veiculo->getMarca()."','".
        $veiculo->getCor()."')";
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

    public function alterarVeiculo($veiculo){
        $sql="UPDATE veiculo SET ".
        "placa = '".$veiculo->getPlaca()."',".
        "modelo = '".$veiculo->getModelo()."',".
        "marca = '".$veiculo->getMarca()."',".
        "cor = '".$veiculo->getCor()."'".
        " WHERE " . " cod_veiculo = '".$veiculo->getCod_veiculo()."';";

        $return = mysqli_query($this->c,$sql);
        if (mysqli_affected_rows($this->c) == 0) {
            return false;
        }else {
            return true;
        }
    }

    function consultar($veiculo){

        $sql = "SELECT cod_veiculo, placa, modelo, marca, cor "."from veiculo WHERE" . " cod_veiculo = '".$veiculo->getCod_veiculo()."';";

        $result = mysqli_query($this->c,$sql);

        return $result;

    }

    function consultarListaVeiculo(){
        $sql = "SELECT cod_veiculo, placa, modelo, marca, cor ". "from veiculo";
        $result = mysqli_query($this->c,$sql);
        return $result;
    }

}

?>