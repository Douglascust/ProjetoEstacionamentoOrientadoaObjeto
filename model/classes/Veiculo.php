<?php

include_once ("../model/dao/VeiculoDao.php");

    class Veiculo{
        private $cod_veiculo;
        private $placa;
        private $modelo;
        private $marca;
        private $cor;

        public function __construct($cod_veiculo, $placa, $modelo, $marca, $cor){
                
                $this -> setCod_veiculo($cod_veiculo);
                $this -> setPlaca($placa);
                $this -> setModelo($modelo);
                $this -> setMarca($marca);
                $this -> setCor($cor);

        }

        public function getCod_veiculo()
        {
                return $this->cod_veiculo;
        }

        public function setCod_veiculo($cod_veiculo)
        {
                $this->cod_veiculo = $cod_veiculo;

                return $this;
        }

        public function getPlaca()
        {
                return $this->placa;
        }

        public function setPlaca($placa)
        {
                $this->placa = $placa;

                return $this;
        }

        public function getModelo()
        {
                return $this->modelo;
        }

        public function setModelo($modelo)
        {
                $this->modelo = $modelo;

                return $this;
        }

        public function getMarca()
        {
                return $this->marca;
        }

        public function setMarca($marca)
        {
                $this->marca = $marca;

                return $this;
        }

        public function getCor()
        {
                return $this->cor;
        }

        public function setCor($cor)
        {
                $this->cor = $cor;

                return $this;
        }

        public function incluirVeiculo()
        {
                $veiculoDao = new VeiculoDao();
                if ($veiculoDao->incluirVeiculo($this)) {
                        return true;
                }else {
                        return false;
                }
        }

        final public function alterar()
        {
                $veiculoDao = new VeiculoDao();
                if ($veiculoDao->alterarVeiculo($this)) {
                        return true;
                }else {
                        return false;
                }
        }

        final public function consultar(){

                $veiculoDao = new VeiculoDao();
                $testaConsulta = $veiculoDao->consultar($this);
                $qtdLinhas = mysqli_num_rows($testaConsulta);

                if ($qtdLinhas == 0){

                        $_SESSION['msg'] = "\n"."Não existem registros na Tabela Veículo";

                }
                else{
                        $linha = mysqli_fetch_assoc($testaConsulta);
                        $this->setCod_veiculo($linha['cod_veiculo']);
                        $this->setPlaca($linha['placa']);
                        $this->setModelo($linha['modelo']);
                        $this->setMarca($linha['marca']);
                        $this->setCor($linha['cor']);
                }
        }

        final public function consultarLista(){
                $veiculoDao = new VeiculoDao();
                $testaConsulta= $veiculoDao->consultarListaVeiculo();
                $qtdLinhas = mysqli_num_rows($testaConsulta);
                if ($qtdLinhas == 0) {
                        $_SESSION['msg'] = "\n" . "Não existem registros na Tabela Veículo";
                } else {
                        $listaVeiculo = array();
                        for ($i=0; $i<$qtdLinhas; $i++) { 
                                $linha = mysqli_fetch_assoc($testaConsulta);
                                $tempVeiculo = null;
                                $tempVeiculo = new Veiculo($linha['cod_veiculo'], $linha['placa'],
                                $linha['modelo'], $linha['marca'], $linha['cor']);
                                $listaVeiculo[$i]=$tempVeiculo;
                        }
                        return $listaVeiculo;
                }
        }

        public function toArray(){
                return(
                        array(
                                "cod_veiculo" => $this->getCod_veiculo(),
                                "placa" => $this->getPlaca(),
                                "modelo" => $this->getModelo(),
                                "marca" => $this->getMarca(),
                                "cor" => $this->getCor()
                        )
                );
        }

    }
?>