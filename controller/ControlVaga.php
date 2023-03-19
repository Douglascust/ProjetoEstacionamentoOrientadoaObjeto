<?php
    include_once ('../model/classes/Vaga.php');

    session_start();
 
    extract($_REQUEST, EXTR_SKIP);

    if (isset($acao)) {
        if ($acao == "Incluir") {
            if (
                isset($cod_vaga) && isset($numerovaga) && isset($patio) && isset($datareserva)
                && isset($valor)
            ) {
                $cod_vaga = htmlspecialchars_decode(strip_tags($cod_vaga));
                $numerovaga = htmlspecialchars_decode(strip_tags($numerovaga));
                $patio = htmlspecialchars_decode(strip_tags($patio));
                $datareserva = htmlspecialchars_decode(strip_tags($datareserva));
                $valor = htmlspecialchars_decode(strip_tags($valor));
                
                if (
                    is_numeric($cod_vaga) && is_numeric($numerovaga) && is_string($patio) && is_string($datareserva)
                    && is_numeric($valor)
                    ) {
                        $vaga = new Vaga($cod_vaga, $numerovaga, $patio, $datareserva, $valor);
                        if ($vaga->incluirVaga()){
                            $_SESSION['msg'] = "\n" ."Vaga Incluido com sucesso !!";     
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
                isset($cod_vaga) && isset($numerovaga) 
                && isset($patio) && isset($datareserva) && isset($valor)
            ) {
                $cod_vaga = htmlspecialchars_decode(strip_tags($cod_vaga));
                $numerovaga = htmlspecialchars_decode(strip_tags($numerovaga));
                $patio = htmlspecialchars_decode(strip_tags($patio));
                $datareserva = htmlspecialchars_decode(strip_tags($datareserva));
                $valor = htmlspecialchars_decode(strip_tags($valor));
                if (
                    is_numeric($cod_vaga) && is_numeric($numerovaga) && is_string($patio)
                    && is_string($datareserva) && is_numeric($valor) 
                ) {
                    $vaga = new Vaga($cod_vaga, $numerovaga, $patio, $datareserva, $valor);
                    if ($vaga->alterar()) {
                        $_SESSION['msg'] = 'Vaga alterado';
                    }else {
                        $_SESSION['msg'] = 'Vaga não alterado';
                    }
                }else {
                    $_SESSION['msg'] = 'Parametros inválidos';
                }
            }
            $path = $_SERVER['HTTP_REFERER'];
            header("Location: $path");
        }

        if($acao == "Consultar"){

            if(isset($cod_vaga)){

                $cod_vaga = htmlspecialchars_decode(strip_tags($cod_vaga));

                if(is_numeric($cod_vaga)){

                    $vaga = new Vaga($cod_vaga, "", "", "", "");
                    $linha = $vaga->consultar();
                    $_SESSION['linha'] = array();
                    $_SESSION['linha']['cod_vaga'] = $vaga->getCod_vaga();
                    $_SESSION['linha']['numerovaga'] = $vaga->getNumerovaga();
                    $_SESSION['linha']['patio'] = $vaga->getPatio();
                    $_SESSION['linha']['datareserva'] = $vaga->getDatareserva();
                    $_SESSION['linha']['valor'] = $vaga->getValor();

                }
                else{

                    $_SESSION['msg'] = "Parametros informados são invalidos!!";

                }

            }

        }
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");

        if ($acao == "ConsultaFull") {
            $vaga = new Vaga("","","","","");
            $lista=array();
            $lista=$vaga->consultarLista();
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