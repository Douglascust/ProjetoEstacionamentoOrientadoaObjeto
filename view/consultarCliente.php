<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/css/consultstyle.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap">
        <title>Consultar Um Registro_Cliente</title>
    </head>
    <body>
        <?php session_start(); 
        error_reporting(0);
        ?>
        <!-- Caixa para a mensagem de erro que pode ser sido armazenada na sessão -->
            <center>
                <b>
                    <?php if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        $_SESSION['msg'] = "";
                    }?>
                </b>
            </center>

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
                <td><b>telefone</b></td>
            </tr>
            <?php
            if (isset($_SESSION)) {
                foreach ($_SESSION as $linha => $value) {
                    echo '<tr>';
                    foreach ($_SESSION[$linha] as $campo) {
                        echo '<td>' . $campo . '</td>';
                    }
                    echo '</tr>';
                }
            }
            ?>
        </table>
            <input required type="text" name="cod_cliente" placeholder="Digitar seu ID"/>
        <button>
            <input type="hidden" name="acao" value="ConsultarCliente">
            <input type="submit" value="ConsultarCliente" />
        </button>
        </form>

    </body>
</html>