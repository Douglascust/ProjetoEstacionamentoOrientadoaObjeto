<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/css/consultstyle.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap">
        <title>Consultar Registros Veículo</title>
    </head>
    <body>
    <?php session_start(); 
    error_reporting(0);
    ?>
    
        <form action="../controller/controlVeiculo.php" method="post">
            <table border=1>
                <tr>
                    <td><b>ID veículo</b></td>
                    <td><b>Placa</b></td>
                    <td><b>Modelo</b></td>
                    <td><b>Marca</b></td>
                    <td><b>Cor</b></td>
                </tr>
                <?php
                    include_once ('../model/classes/Veiculo.php');

                    if (!empty($_SESSION['lista'])) {
                        $listaArray=$_SESSION['lista'];
                        $qtdLinhas=count ($listaArray);

                        for ($i=0; $i<$qtdLinhas; $i++) { 
                            $lista[$i] = new Veiculo(
                                $listaArray[$i]['cod_veiculo'],
                                $listaArray[$i]['placa'],
                                $listaArray[$i]['modelo'],
                                $listaArray[$i]['marca'],
                                $listaArray[$i]['cor']
                            );
                        }

                        for ($i=0; $i<$qtdLinhas; $i++) { 
                            echo '<tr>';
                            echo '<td>' . $lista[$i]->getCod_veiculo(). '</td>';
                            echo '<td>' . $lista[$i]->getPlaca(). '</td>';
                            echo '<td>' . $lista[$i]->getModelo(). '</td>';
                            echo '<td>' . $lista[$i]->getMarca(). '</td>';
                            echo '<td>' . $lista[$i]->getCor(). '</td>';
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