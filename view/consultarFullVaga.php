<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/css/consultstyle.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap">
        <title>Consultar Registros Vaga</title>
    </head>
    <body>
    <?php session_start(); 
    error_reporting(0);
    ?>
    
        <form action="../controller/controlVaga.php" method="post">
            <table border=1>
                <tr>
                    <td><b>ID vaga</b></td>
                    <td><b>Número vaga</b></td>
                    <td><b>Pátio</b></td>
                    <td><b>Data reserva</b></td>
                    <td><b>Valor</b></td>
                </tr>
                <?php
                    include_once ('../model/classes/Vaga.php');

                    if (!empty($_SESSION['lista'])) {
                        $listaArray=$_SESSION['lista'];
                        $qtdLinhas=count ($listaArray);

                        for ($i=0; $i<$qtdLinhas; $i++) { 
                            $lista[$i] = new Vaga(
                                $listaArray[$i]['cod_vaga'],
                                $listaArray[$i]['numerovaga'],
                                $listaArray[$i]['patio'],
                                $listaArray[$i]['datareserva'],
                                $listaArray[$i]['valor']
                            );
                        }

                        for ($i=0; $i<$qtdLinhas; $i++) { 
                            echo '<tr>';
                            echo '<td>' . $lista[$i]->getCod_vaga(). '</td>';
                            echo '<td>' . $lista[$i]->getNumerovaga(). '</td>';
                            echo '<td>' . $lista[$i]->getPatio(). '</td>';
                            echo '<td>' . $lista[$i]->getDatareserva(). '</td>';
                            echo '<td>' . $lista[$i]->getValor(). '</td>';
                            echo '</tr>';
                        }
                    }
                ?>
            </table>
            <button>
                <input type="hidden" name="acao" value="ConsultaFull">
                <input type="submit" value="ConsultaFull" />
            </button>
        </form>
    </body>
</html>