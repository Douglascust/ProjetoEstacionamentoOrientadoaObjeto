<?php
        include_once ("../model/classes/Pessoa.php");
        include_once ("../model/dao/ClienteDao.php");
        final class Cliente extends Pessoa{

                protected $cod_cliente;
                protected $cod_veiculo;

                public function __construct($cod_cliente, $cod_veiculo, $nome, $rg, $cpf, $email, $endereco, $telefone){
                        parent::__construct($nome, $rg, $cpf, $email, $endereco, $telefone);
                        $this->setCod_cliente($cod_cliente);
                        $this->setCod_veiculo($cod_veiculo);

                }

                public function getCod_cliente()
                {
                        return $this->cod_cliente;
                }

                public function setCod_cliente($cod_cliente)
                {
                        $this->cod_cliente = $cod_cliente;

                        return $this;
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

                public function incluirCliente()
                {
                        $clienteDao = new ClienteDao();
                        if ($clienteDao->incluirCliente($this)) {
                                return true;
                        }else {
                                return false;
                        }
                }

                final public function alterar()
                {
                        $clienteDao = new ClienteDao();
                        if ($clienteDao->alterarCliente($this)) {
                                return true;
                        }else {
                                return false;
                        }
                }

                final public function consultar(){
                        $clienteDao = new ClienteDao();
                        $testaConsulta= $clienteDao->consultarCliente($this);
                        $qtdLinhas = mysqli_num_rows($testaConsulta);
                        if ($qtdLinhas == 0){
                            $_SESSION['msg'] = "\n" . "Não existem registros na Tabela Cliente";
                        } else {
                            $linha = mysqli_fetch_assoc($testaConsulta);
                            $this->setCod_cliente($linha['cod_cliente']);
                            $this->setCod_veiculo($linha['cod_veiculo']);
                            $this->setNome($linha['nome']);
                            $this->setRg($linha['rg']);
                            $this->setCpf($linha['cpf']);
                            $this->setEmail($linha['email']);
                            $this->setEndereco($linha['endereco']);
                            $this->setTelefone($linha['telefone']);
                        }
                }

                final public function consultarLista(){
                        $clienteDao = new ClienteDao();
                        $testaConsulta= $clienteDao->consultarListaCliente();
                        $qtdLinhas = mysqli_num_rows($testaConsulta);
                        if ($qtdLinhas == 0) {
                                $_SESSION['msg'] = "\n" . "Não existem registros na Tabela Cliente";
                        } else {
                                $listaCliente = array();
                                for ($i=0; $i<$qtdLinhas; $i++) { 
                                        $linha = mysqli_fetch_assoc($testaConsulta);
                                        $tempCliente = null;
                                        $tempCliente = new Cliente($linha['cod_cliente'], $linha['cod_veiculo'],
                                        $linha['nome'], $linha['rg'], $linha['cpf'],  $linha['email'],
                                        $linha['endereco'], $linha['telefone']);
                                        $listaCliente[$i]=$tempCliente;
                                }
                                return $listaCliente;
                        }
                }

                public function toArray(){
                        return(
                                array(
                                        "cod_cliente" => $this->getCod_cliente(),
                                        "cod_veiculo" => $this->getCod_veiculo(),
                                        "nome" => $this->getNome(),
                                        "rg" => $this->getRg(),
                                        "cpf" => $this->getCpf(),
                                        "email" => $this->getEmail(),
                                        "endereco" => $this->getEndereco(),
                                        "telefone" => $this->getTelefone()
                                )
                        );
                }
        }

?>