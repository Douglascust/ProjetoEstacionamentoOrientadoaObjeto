<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/css/consultstyle.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap">
        <title>Consultar Registros Cliente</title>
    </head>
    <body>
    <?php session_start(); 
    error_reporting(0);
    ?>
    
        <form action="../controller/controlCliente.php" method="post">
            <table border=1>
                <tr>
                    <td><b>Cod_cliente</b></td>
                    <td><b>Cod_veiculo</b></td>
                    <td><b>Nome</b></td>
                    <td><b>Rg</b></td>
                    <td><b>Cpf</b></td>
                    <td><b>Email</b></td>
                    <td><b>Endereço</b></td>
                    <td><b>Telefone</b></td>
                </tr>
                    <?php
                    include_once ('../model/classes/Cliente.php');
                    include_once ('../model/classes/Pessoa.php');

                    if (!empty($_SESSION['lista'])) {
                        $listaArray=$_SESSION['lista'];
                        $qtdLinhas=count ($listaArray);

                        for ($i=0; $i<$qtdLinhas; $i++) { 
                            $lista[$i] = new Cliente(
                                $listaArray[$i]['cod_cliente'],
                                $listaArray[$i]['cod_veiculo'],
                                $listaArray[$i]['nome'],
                                $listaArray[$i]['rg'],
                                $listaArray[$i]['cpf'],
                                $listaArray[$i]['email'],
                                $listaArray[$i]['endereco'],
                                $listaArray[$i]['telefone']
                            );
                        }

                        for ($i=0; $i<$qtdLinhas; $i++) { 
                            echo '<tr>';
                            echo '<td>' . $lista[$i]->getCod_cliente(). '</td>';
                            echo '<td>' . $lista[$i]->getCod_veiculo(). '</td>';
                            echo '<td>' . $lista[$i]->getNome(). '</td>';
                            echo '<td>' . $lista[$i]->getRg(). '</td>';
                            echo '<td>' . $lista[$i]->getCpf(). '</td>';
                            echo '<td>' . $lista[$i]->getEmail(). '</td>';
                            echo '<td>' . $lista[$i]->getEndereco(). '</td>';
                            echo '<td>' . $lista[$i]->getTelefone(). '</td>';
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