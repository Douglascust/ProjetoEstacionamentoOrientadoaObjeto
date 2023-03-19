<?php
    include_once ('../model/classes/Estacionamento.php');

    session_start();

    extract($_REQUEST, EXTR_SKIP);
    
    if (isset($acao)) {
        if ($acao == "Incluir") {
            if (
                isset($cod_estacionamento) && isset($nome) && isset($bairro) && isset($endereco)
                && isset($email) && isset($telefone)
            ) {
                $cod_estacionamento = htmlspecialchars_decode(strip_tags($cod_estacionamento));
                $nome = htmlspecialchars_decode(strip_tags($nome));
                $bairro = htmlspecialchars_decode(strip_tags($bairro));
                $endereco = htmlspecialchars_decode(strip_tags($endereco));
                $email = htmlspecialchars_decode(strip_tags($email));
                $telefone = htmlspecialchars_decode(strip_tags($telefone));
                
                if (
                    is_numeric($cod_estacionamento) && is_string($nome) && is_string($bairro) && is_string($endereco)
                    && is_string($email) && is_string($telefone)
                    ) {
                        $estacionamento = new Estacionamento($cod_estacionamento, $nome, $bairro, $endereco, $email, $telefone);
                        if ($estacionamento->incluirEstacionamento()){
                            $_SESSION['msg'] = "\n" ."Estacionamento Incluido com sucesso !!";     
                        } else {
                            $_SESSION['msg'] =  "\n" ."Falha no INSERT! Mensagem de erro: '$msg'";
                        }
                } else {
                    $_SESSION['msg'] = "Parametros informados são invalidos!!";
                    
                }
            }       
        }
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
    }

    if (isset($acao)) {
        if ($acao == "Alterar") {
            if (
                isset($cod_estacionamento) && isset($nome) && isset($bairro) && isset($endereco)
                && isset($email) && isset($telefone)
            ) {
                $cod_estacionamento = htmlspecialchars_decode(strip_tags($cod_estacionamento));
                $nome = htmlspecialchars_decode(strip_tags($nome));
                $bairro = htmlspecialchars_decode(strip_tags($bairro));
                $endereco = htmlspecialchars_decode(strip_tags($endereco));
                $email = htmlspecialchars_decode(strip_tags($email));
                $telefone = htmlspecialchars_decode(strip_tags($telefone));
                
                if (
                    is_numeric($cod_estacionamento) && is_string($nome) && is_string($bairro) && is_string($endereco)
                    && is_string($email) && is_string($telefone)
                    ) {
                        $estacionamento = new Estacionamento($cod_estacionamento, $nome, $bairro, $endereco, $email, $telefone);
                        if ($estacionamento->alterar()){
                            $_SESSION['msg'] = "\n" ."Estacionamento Alterado com sucesso !!";     
                        } else {
                            $_SESSION['msg'] =  "\n" ."Falha no UPDATE! Mensagem de erro: '$msg'";
                        }
                } else {
                    $_SESSION['msg'] = "Parametros informados são invalidos!!";
                    
                }
            }       
        }
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
    }

    if(isset($acao)){

        if($acao == "Consultar"){

            if(isset($cod_estacionamento)){

                $cod_estacionamento = htmlspecialchars_decode(strip_tags($cod_estacionamento));

                if(is_numeric($cod_estacionamento)){

                    $estacionamento = new Estacionamento($cod_estacionamento,"","","","","");
                    $linha = $estacionamento->consultar();
                    $_SESSION['linha'] = array();
                    $_SESSION['linha']['cod_estacionamento'] = $estacionamento->getCod_estacionamento();
                    $_SESSION['linha']['nome'] = $estacionamento->getNome();
                    $_SESSION['linha']['bairro'] = $estacionamento->getBairro();
                    $_SESSION['linha']['endereco'] = $estacionamento->getEndereco();
                    $_SESSION['linha']['email'] = $estacionamento->getEmail();
                    $_SESSION['linha']['telefone'] = $estacionamento->getTelefone();
                     
                }
                else{

                    $_SESSION['msg'] = "Parametros informados são invalidos!!";

                }

            }

        }
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");

    }


?>