<?php
include_once ("../model/dao/EstacionamentoDao.php");
    class Estacionamento{
        private $cod_estacionamento;
        private $nome;
        private $bairro;
        private $endereco;
        private $email;
        private $telefone;

        public function __construct($cod_estacionamento, $nome, $bairro, $endereco, $email, $telefone){

                $this -> setCod_estacionamento($cod_estacionamento);
                $this -> setNome($nome);
                $this -> setBairro($bairro);
                $this -> setEndereco($endereco);
                $this -> setEmail($email);
                $this -> setTelefone($telefone);
        }

        public function getCod_estacionamento()
        {
                return $this->cod_estacionamento;
        }

        public function setCod_estacionamento($cod_estacionamento)
        {
                $this->cod_estacionamento = $cod_estacionamento;

                return $this;
        }

        public function getNome()
        {
                return $this->nome;
        }

        public function setNome($nome)
        {
                $this->nome = $nome;

                return $this;
        }

        public function getBairro()
        {
                return $this->bairro;
        }

        public function setBairro($bairro)
        {
                $this->bairro = $bairro;

                return $this;
        }

        public function getEndereco()
        {
                return $this->endereco;
        }

        public function setEndereco($endereco)
        {
                $this->endereco = $endereco;

                return $this;
        }

        public function getEmail()
        {
                return $this->email;
        }

        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        public function getTelefone()
        {
                return $this->telefone;
        }

        public function setTelefone($telefone)
        {
                $this->telefone = $telefone;

                return $this;
        }

        public function incluirEstacionamento()
        {
                $estacionamentoDao = new EstacionamentoDao();
                if ($estacionamentoDao->incluirEstacionamento($this)) {
                        return true;
                }else {
                        return false;
                }
        }

        final public function alterar()
        {
                $estacionamentoDao = new EstacionamentoDao();
                if ($estacionamentoDao->alterarEstacionamento($this)) {
                        return true;
                }else {
                        return false;
                }
        }
        
        final public function consultar(){

                $estacionamentoDao = new EstacionamentoDao();
                $testaConsulta = $estacionamentoDao->consultar($this);
                $qtdlinhas = mysqli_num_rows($testaConsulta);

                if($qtdlinhas == 0) {

                        $_SESSION['msg'] = "\n Não existem registros na Tabela Estacionamento";

                }
                else{

                        $linha = mysqli_fetch_assoc($testaConsulta);
                        $this->setCod_estacionamento($linha['cod_estacionamento']);
                        $this->setNome($linha['nome']);
                        $this->setBairro($linha['bairro']);
                        $this->setEndereco($linha['endereco']);
                        $this->setEmail($linha['email']);
                        $this->setTelefone($linha['telefone']);
                }
        }
        public function toArray(){
                return(
                        array(
                                "cod_estacionamento" => $this->getCod_estacionamento(),
                                "nome" => $this->getNome(),
                                "bairro" => $this->getBairro(),
                                "endereco" => $this->getEndereco(),
                                "email" => $this->getEmail(),
                                "telefone" => $this->getTelefone()
                        )
                );
        }
}

?>