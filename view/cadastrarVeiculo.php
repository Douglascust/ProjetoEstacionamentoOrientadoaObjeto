<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap">
        <title>Cadastrar Veículo</title>
    </head>
    <body>
        <?php session_start(); ?>

            <!-- Caixa para a mensagem de erro que pode ser sido armazenada na sessão -->
            <center>
                <b>
                    <?php if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        $_SESSION['msg'] = "";
                    }?>
                </b>
            </center>

        <form action="../controller/controlVeiculo.php" method="post">
            <h2> CADASTRAR VEÍCULO </h2>
            <div class="input">
                <input type="text" name="cod_veiculo" size="20" />
                <label>ID do veículo: </label>
            </div>
            <div class="input">
                <input type="text" name="placa" size="20" />
                <label>Placa do veículo: </label>
            </div>
            <div class="input">
                <input type="text" name="modelo" size="40" />
                <label>Modelo: </label>
            </div>
            <div class="input">
                <input type="text" name="marca" size="20" />
                <label>Marca: </label>
            </div>
            <div class="input">
                <input type="text" name="cor" size="20" />
                <label>Cor: </label>
            </div>
            <button>
                <input type="hidden" name="acao" value="Incluir">
                <input type="submit" value="Incluir" />
            </button>
        </form>
    </body>
</html>