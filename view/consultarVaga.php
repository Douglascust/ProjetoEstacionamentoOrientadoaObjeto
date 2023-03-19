<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/css/consultstyle.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap">
        <title>Consultar Um Registro_Vaga</title>
    </head>
    <body>
        <?php session_start(); 
        error_reporting(0);
        ?>
        <center>
            <b>
                <?php if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    $_SESSION['msg'] = "";
                }?>
            </b>
        </center>
        <form action="../controller/controlVaga.php" method="post">
            <table border = "1">
                <tr>
                    <td><b>ID Vaga</b></td>
                    <td><b>Número da vaga</b></td>
                    <td><b>Patio</b></td>
                    <td><b>Data da reserva</b></td>
                    <td><b>Valor</b></td>
                </tr>
                <?php
                    if(isset($_SESSION)) {

                        foreach ($_SESSION as $linha => $value) {

                            echo '<tr>';

                            foreach ($_SESSION[$linha] as $campo){

                                echo '<td>'.$campo.'</td>';

                            }
                            echo '</tr>';

                        }
                    }
                ?>
            </table>
            <input required type= "text" name= "cod_vaga" size = "20" placeholder="Cod da Vaga"/>
            <button>
                <input type="hidden" name="acao" value="Consultar"/>
                <input type="submit" value="Consultar"/>
            </button>
        </form>
    </body>
</html>