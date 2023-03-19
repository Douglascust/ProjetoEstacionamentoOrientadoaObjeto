<?php
include_once ('../model/classes/Cliente.php');

session_start();

extract($_REQUEST, EXTR_SKIP);

if (isset($acao)) {
    if ($acao == "Incluir") {
        if (
            isset($cod_cliente) && isset($cod_veiculo) 
            && isset($nome) && isset($rg) && isset($cpf)
            && isset($email) && isset($endereco) && isset($telefone)
        ) {
            $cod_cliente = htmlspecialchars_decode(strip_tags($cod_cliente));
            $cod_veiculo = htmlspecialchars_decode(strip_tags($cod_veiculo));
            $nome = htmlspecialchars_decode(strip_tags($nome));
            $rg = htmlspecialchars_decode(strip_tags($rg));
            $cpf = htmlspecialchars_decode(strip_tags($cpf));
            $email = htmlspecialchars_decode(strip_tags($email));
            $endereco = htmlspecialchars_decode(strip_tags($endereco));
            $telefone = htmlspecialchars_decode(strip_tags($telefone));
            
            if (
                is_numeric($cod_cliente) && is_numeric($cod_veiculo) && is_string($nome)
                && is_string($rg) && is_numeric($cpf) && is_string($email) 
                && is_string($endereco) && is_numeric($telefone)
                ) {
                    $cliente = new Cliente($cod_cliente, $cod_veiculo, $nome, $rg, $cpf, $email, $endereco, $telefone);
                    if ($cliente->incluirCliente()){
                        $_SESSION['msg'] = "\n" ."Livro Incluido com sucesso !!";     
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
            isset($cod_cliente) && isset($cod_veiculo) 
            && isset($nome) && isset($rg) && isset($cpf)
            && isset($email) && isset($endereco) && isset($telefone)
        ) {
            $cod_cliente = htmlspecialchars_decode(strip_tags($cod_cliente));
            $cod_veiculo = htmlspecialchars_decode(strip_tags($cod_veiculo));
            $nome = htmlspecialchars_decode(strip_tags($nome));
            $rg = htmlspecialchars_decode(strip_tags($rg));
            $cpf = htmlspecialchars_decode(strip_tags($cpf));
            $email = htmlspecialchars_decode(strip_tags($email));
            $endereco = htmlspecialchars_decode(strip_tags($endereco));
            $telefone = htmlspecialchars_decode(strip_tags($telefone));
            if (
                is_numeric($cod_cliente) && is_numeric($cod_veiculo) && is_string($nome)
                && is_string($rg) && is_numeric($cpf) && is_string($email) 
                && is_string($endereco) && is_numeric($telefone)
            ) {
                $cliente = new Cliente($cod_cliente, $cod_veiculo, $nome, $rg, $cpf, $email, $endereco, $telefone);
                if ($cliente->alterar()) {
                    $_SESSION['msg'] = 'Cliente alterado';
                }else {
                    $_SESSION['msg'] = 'Cliente não alterado';
                }
            }else {
                $_SESSION['msg'] = 'Parametros inválidos';
            }
        }
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
    }

    if ($acao == "ConsultarCliente") {
        if (isset($cod_cliente)) {
            $cod_cliente = htmlspecialchars_decode(strip_tags($cod_cliente));
            if (is_numeric($cod_cliente)) {
                $cliente = new Cliente($cod_cliente,"","","","","","","");
                $linha=$cliente->consultar();
                $_SESSION['linha'] = array();
                $_SESSION ['linha'] ['cod_cliente'] = $cliente->getCod_cliente();
                $_SESSION ['linha'] ['cod_veiculo'] = $cliente->getCod_veiculo();
                $_SESSION ['linha'] ['nome'] = $cliente->getNome();
                $_SESSION ['linha'] ['rg'] = $cliente->getRg();
                $_SESSION ['linha'] ['cpf'] = $cliente->getCpf();
                $_SESSION ['linha'] ['email'] = $cliente->getEmail();
                $_SESSION ['linha'] ['endereco'] = $cliente->getEndereco();
                $_SESSION ['linha'] ['telefone'] = $cliente->getTelefone();
            } else {
                $_SESSION['msg'] = "Inválido!!";
            }
        }
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
    }

    if ($acao == "ConsultaFull") {
        $cliente = new Cliente("","","","","","","","");
        $lista=array();
        $lista=$cliente->consultarLista();
        $qtdLinhas=count($lista);
        echo "<hr>". $qtdLinhas;
        $listaArray = array();
        for ($i=0; $i<$qtdLinhas; $i++) { 
            $listaArray[$i] = $lista[$i]->toArray();
        }
        $_SESSION['lista'] = $listaArray;

        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
    }

}

?>