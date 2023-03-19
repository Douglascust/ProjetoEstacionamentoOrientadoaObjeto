<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap">
        <title>Alterar Vaga</title>
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

        <form action="../controller/controlVaga.php" method="post">
            <h2>ALTERAR VAGA</h2>
            <div class="input">
                <input type="text" name="cod_vaga" size="20" />
                <label>ID da Vaga: </label>
            </div>
            <div class="input">
                <input type="text" name="numerovaga" size="20" />
                <label>Nº da Vaga: </label>
            </div>
            <div class="input">
                <input type="text" name="patio" size="40" />
                <label>Letra do Pátio: </label>
            </div>
            <div class="input">
                <input type="text" name="datareserva" size="40" placeholder="Ex.: 210520041875"/>
                <label>Data e hora da reserva: </label>
            </div>
            <div class="input">
                <input type="text" name="valor" size="20" />
                <label>Valor: </label>
            </div>
            <button>
                <input type="hidden" name="acao" value="Alterar">
                <input type="submit" value="Alterar" />
            </button>
        </form>
    </body>
</html>