<?php
    include_once ('../model/classes/Proprietario.php');

    session_start();

    extract($_REQUEST, EXTR_SKIP);

    if (isset($acao)) {
        if ($acao == "Incluir") {
            if (
                isset($cod_proprietario) && isset($cnpj) 
                && isset($nome) && isset($rg) && isset($cpf)
                && isset($email) && isset($endereco) && isset($telefone)
            ) {
                $cod_proprietario = htmlspecialchars_decode(strip_tags($cod_proprietario));
                $cnpj = htmlspecialchars_decode(strip_tags($cnpj));
                $nome = htmlspecialchars_decode(strip_tags($nome));
                $rg = htmlspecialchars_decode(strip_tags($rg));
                $cpf = htmlspecialchars_decode(strip_tags($cpf));
                $email = htmlspecialchars_decode(strip_tags($email));
                $endereco = htmlspecialchars_decode(strip_tags($endereco));
                $telefone = htmlspecialchars_decode(strip_tags($telefone));
                
                if (
                    is_numeric($cod_proprietario) && is_numeric($cnpj) && is_string($nome)
                    && is_string($rg) && is_numeric($cpf) && is_string($email) 
                    && is_string($endereco) && is_numeric($telefone)
                    ) {
                        $proprietario = new Proprietario($cod_proprietario, $cnpj, $nome, $rg, $cpf, $email, $endereco, $telefone);
                        if ($proprietario->incluirProprietario()){
                            $_SESSION['msg'] = "\n" ."Proprietario Incluido com sucesso !!";     
                        } else {

                        //    $_SESSION['msg'] =  "\n" ."Falha no INSERT! Mensagem de erro: '$msg'";
                        }
                } else {
                    $_SESSION['msg'] = "Parametros informados são invalidos!!";
                    
                }
            }
        }
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");

        if ($acao == "Alterar") {
            if (
                isset($cod_proprietario) && isset($cnpj) 
                && isset($nome) && isset($rg) && isset($cpf)
                && isset($email) && isset($endereco) && isset($telefone)
            ) {
                $cod_proprietario = htmlspecialchars_decode(strip_tags($cod_proprietario));
                $cnpj = htmlspecialchars_decode(strip_tags($cnpj));
                $nome = htmlspecialchars_decode(strip_tags($nome));
                $rg = htmlspecialchars_decode(strip_tags($rg));
                $cpf = htmlspecialchars_decode(strip_tags($cpf));
                $email = htmlspecialchars_decode(strip_tags($email));
                $endereco = htmlspecialchars_decode(strip_tags($endereco));
                $telefone = htmlspecialchars_decode(strip_tags($telefone));
                if (
                    is_numeric($cod_proprietario) && is_numeric($cnpj) && is_string($nome)
                    && is_numeric($rg) && is_numeric($cpf) && is_string($email) 
                    && is_string($endereco) && is_numeric($telefone)
                ) {
                    $proprietario = new Proprietario($cod_proprietario, $cnpj, $nome, $rg, $cpf, $email, $endereco, $telefone);
                    if ($proprietario->alterar()) {
                        $_SESSION['msg'] = 'Proprietario alterado';
                    }else {
                        $_SESSION['msg'] = 'Proprietário não alterado';
                    }
                }else {
                    $_SESSION['msg'] = 'Parametros inválidos';
                }
            }
            $path = $_SERVER['HTTP_REFERER'];
            header("Location: $path");
        }
    }
?>