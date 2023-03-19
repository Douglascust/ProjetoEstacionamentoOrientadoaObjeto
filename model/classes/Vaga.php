<?php
include_once ("../model/dao/VagaDao.php");

class Vaga{

        private $cod_vaga;
        private $numerovaga;
        private $patio;
        private $datareserva;
        private $valor;

        public function __construct($cod_vaga, $numerovaga, $patio, $datareserva, $valor){

                $this -> setCod_vaga($cod_vaga);
                $this -> setNumerovaga($numerovaga);
                $this -> setPatio($patio);
                $this -> setDatareserva($datareserva);
                $this -> setValor($valor);

        }

        public function getCod_vaga()
        {
                return $this->cod_vaga;
        }

        public function setCod_vaga($cod_vaga)
        {
                $this->cod_vaga = $cod_vaga;

                return $this;
        }

        public function getNumerovaga()
        {
                return $this->numerovaga;
        }

        public function setNumerovaga($numerovaga)
        {
                $this->numerovaga = $numerovaga;

                return $this;
        } 

        public function getPatio()
        {
                return $this->patio;
        }

        public function setPatio($patio)
        {
                $this->patio = $patio;

                return $this;
        }

        public function getDatareserva()
        {
                return $this->datareserva;
        }

        public function setDatareserva($datareserva)
        {
                $this->datareserva = $datareserva;

                return $this;
        }

        public function getValor()
        {
                return $this->valor;
        }

        public function setValor($valor)
        {
                $this->valor = $valor;

                return $this;
        }

        public function incluirVaga()
        {
                $vagaDao = new VagaDao();
                if ($vagaDao->incluirVaga($this)) {
                        return true;
                }else {
                        return false;
                }
        }

        final public function alterar()
        {
                $vagaDao = new VagaDao();
                if ($vagaDao->alterarVaga($this)) {
                        return true;
                }else {
                        return false;
                }
        }

        final public function consultar(){

                $vagaDao = new VagaDao();
                $testaConsulta = $vagaDao->consultar($this);
                $qtdlinhas = mysqli_num_rows($testaConsulta);

                if($qtdlinhas == 0){

                        $_SESSION['msg'] = "\n Não existem registros na Tabela Vaga";

                }
                else{

                        $linha = mysqli_fetch_assoc($testaConsulta);
                        $this->setCod_vaga($linha['cod_vaga']);
                        $this->setNumerovaga($linha['numerovaga']);
                        $this->setPatio($linha['patio']);
                        $this->setDatareserva($linha['datareserva']);
                        $this->setValor($linha['valor']);
                }
        }

        final public function consultarLista(){
                $vagaDao = new VagaDao();
                $testaConsulta= $vagaDao->consultarListaVaga();
                $qtdLinhas = mysqli_num_rows($testaConsulta);
                if ($qtdLinhas == 0) {
                        $_SESSION['msg'] = "\n" . "Não existem registros na Tabela Vaga";
                } else {
                        $listaVaga = array();
                        for ($i=0; $i<$qtdLinhas; $i++) { 
                                $linha = mysqli_fetch_assoc($testaConsulta);
                                $tempVaga = null;
                                $tempVaga = new Vaga($linha['cod_vaga'], $linha['numerovaga'],
                                $linha['patio'], $linha['datareserva'], $linha['valor']);
                                $listaVaga[$i]=$tempVaga;
                        }
                        return $listaVaga;
                }
        }
        
        public function toArray(){
                return(
                        array(
                                "cod_vaga" => $this->getCod_vaga(),
                                "numerovaga" => $this->getNumerovaga(),
                                "patio" => $this->getPatio(),
                                "datareserva" => $this->getDatareserva(),
                                "valor" => $this->getValor()
                        )
                );
        }
}

?>