<?php

include_once ('../model/classes/Veiculo.php');

session_start();

extract($_REQUEST, EXTR_SKIP);

if (isset($acao)) {
    if ($acao == "Incluir") {
        if (
            isset($cod_veiculo) && isset($placa) && isset($modelo) && isset($marca)
            && isset($cor)
        ) {
            $cod_veiculo = htmlspecialchars_decode(strip_tags($cod_veiculo));
            $placa = htmlspecialchars_decode(strip_tags($placa));
            $modelo = htmlspecialchars_decode(strip_tags($modelo));
            $marca = htmlspecialchars_decode(strip_tags($marca));
            $cor = htmlspecialchars_decode(strip_tags($cor));
            
            if (
                is_numeric($cod_veiculo) && is_string($placa) && is_string($modelo) && is_string($marca)
                && is_string($cor)
                ) {
                    $veiculo = new Veiculo($cod_veiculo, $placa, $modelo, $marca, $cor);
                    if ($veiculo->incluirVeiculo()){
                        $_SESSION['msg'] = "\n" ."Veiculo Incluido com sucesso !!";     
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
            isset($cod_veiculo) && isset($placa) 
            && isset($modelo) && isset($marca) && isset($cor)
        ) {
            $cod_veiculo = htmlspecialchars_decode(strip_tags($cod_veiculo));
            $placa = htmlspecialchars_decode(strip_tags($placa));
            $modelo = htmlspecialchars_decode(strip_tags($modelo));
            $marca = htmlspecialchars_decode(strip_tags($marca));
            $cor = htmlspecialchars_decode(strip_tags($cor));
            if (
                is_numeric($cod_veiculo) && is_string($placa) && is_string($modelo)
                && is_string($marca) && is_string($cor)
            ) {
                $veiculo = new Veiculo($cod_veiculo, $placa, $modelo, $marca, $cor);
                if ($veiculo->alterar()) {
                    $_SESSION['msg'] = 'Veículo alterado';
                }else {
                    $_SESSION['msg'] = 'Veículo não alterado';
                }
            }else {
                $_SESSION['msg'] = 'Parametros inválidos';
            }
        }
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
    }

    if ($acao == "consultar") {

        if (isset($cod_veiculo)) {

            $cod_veiculo = htmlspecialchars_decode(strip_tags($cod_veiculo));
            
            if(is_numeric($cod_veiculo)) {

                $veiculo = new Veiculo($cod_veiculo,"","","","");

                $lista = $veiculo->consultar();
                $_SESSION['linha'] = array();
                $_SESSION['linha'] ['cod_veiculo'] = $veiculo->getCod_veiculo();
                $_SESSION['linha'] ['placa'] = $veiculo->getPlaca();
                $_SESSION['linha'] ['modelo'] = $veiculo->getModelo();
                $_SESSION['linha'] ['marca'] = $veiculo->getMarca();
                $_SESSION['linha'] ['cor'] = $veiculo->getCor();

            }
            else{

                $_SESSION['msg'] = "Parametros informados são invalidos!!";

            }
        }
    }
    $path = $_SERVER['HTTP_REFERER'];
    header("Location: $path");

    if ($acao == "ConsultaFull") {
        $veiculo = new Veiculo("","","","","");
        $lista=array();
        $lista=$veiculo->consultarLista();
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