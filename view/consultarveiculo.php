<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/css/consultstyle.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap">
        <title>Consultar Um Registro_Veículo</title>
    </head>
    <body>
        <?php session_start(); 
        error_reporting(0);
        ?>
        <form action="../controller/ControlVeiculo.php" method="post">
            <table border = "1">
                <tr>
                    <td><b>Código do veículo</b></td>
                    <td><b>Placa</b></td>
                    <td><b>Modelo</b></td>
                    <td><b>Marca</b></td>
                    <td><b>Cor</b></td>
                </tr>
                <?php
                if (isset($_SESSION)) {

                    foreach ($_SESSION as $linha => $value) {

                        echo '<tr>';

                        foreach ($_SESSION[$linha] as $campo) {

                            echo '<td>'.$campo.'</td>';
                        }
                        echo '</tr>';
                    }
                }

                ?>
            </table>
            <input required type="text" name="cod_veiculo" size="20"/>
            <button>
                <input type = "hidden" name = "acao" value = "consultar">
                <input type = "submit" value = "consultar">
            </button>
        </form>
    </body>
</html>