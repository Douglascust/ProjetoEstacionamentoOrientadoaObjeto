<?php
    include_once ('../model/classes/Funcionario.php');

    session_start();

    extract($_REQUEST, EXTR_SKIP);

    if (isset($acao)) {
        if ($acao == "Incluir") {
            if (
                isset($cod_funcionario) && isset($salario)
                && isset($nome) && isset($rg) && isset($cpf)
                && isset($email) && isset($endereco) && isset($telefone)
            ) {
                $cod_funcionario = htmlspecialchars_decode(strip_tags($cod_funcionario));
                $salario = htmlspecialchars_decode(strip_tags($salario));
                $nome = htmlspecialchars_decode(strip_tags($nome));
                $rg = htmlspecialchars_decode(strip_tags($rg));
                $cpf = htmlspecialchars_decode(strip_tags($cpf));
                $email = htmlspecialchars_decode(strip_tags($email));
                $endereco = htmlspecialchars_decode(strip_tags($endereco));
                $telefone = htmlspecialchars_decode(strip_tags($telefone));
                
                if (
                    is_numeric($cod_funcionario)&& is_numeric($salario)
                    && is_string($nome) && is_string($rg) && is_numeric($cpf)
                    && is_string($email) && is_string($telefone) && is_numeric($telefone)
                    ) {
                        $funcionario = new Funcionario($cod_funcionario, $salario, $nome, $rg, $cpf, $email, $endereco, $telefone);
                        if ($funcionario->incluirFuncionario()){
                            $_SESSION['msg'] = "\n" ."Funcionario Incluido com sucesso !!";     
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

        if ($acao == "Alterar") {
            if (
                isset($cod_funcionario) && isset($salario) 
                && isset($nome) && isset($rg) && isset($cpf)
                && isset($email) && isset($endereco) && isset($telefone)
            ) {
                $cod_funcionario = htmlspecialchars_decode(strip_tags($cod_funcionario));
                $salario = htmlspecialchars_decode(strip_tags($salario));
                $nome = htmlspecialchars_decode(strip_tags($nome));
                $rg = htmlspecialchars_decode(strip_tags($rg));
                $cpf = htmlspecialchars_decode(strip_tags($cpf));
                $email = htmlspecialchars_decode(strip_tags($email));
                $endereco = htmlspecialchars_decode(strip_tags($endereco));
                $telefone = htmlspecialchars_decode(strip_tags($telefone));
                if (
                    is_numeric($cod_funcionario) && is_numeric($salario) && is_string($nome)
                    && is_string($rg) && is_numeric($cpf) && is_string($email) 
                    && is_string($endereco) && is_numeric($telefone)
                ) {
                    $funcionario = new Funcionario($cod_funcionario, $salario, $nome, $rg, $cpf, $email, $endereco, $telefone);
                    if ($funcionario->alterar()) {
                        $_SESSION['msg'] = 'Funcionário alterado';
                    }else {
                        $_SESSION['msg'] = 'Funcionário não alterado';
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