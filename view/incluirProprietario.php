<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap">
        <title>Funcionário</title>
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

        <form action="../controller/controlProprietario.php" method="post">
            <h2>PROPRIETÁRIO</h2>
            <div class="input">
                <input type="text" name="cod_proprietario" size="20" />
                <label>ID Proprietario: </label>
            </div>
            <div class="input">
                <input type="text" name="cnpj" size="20" />
                <label>CNPJ: </label>
            </div>
            <div class="input">
                <input type="text" name="nome" size="40" />
                <label>Nome: </label>
            </div>
            <div class="input">
                <input type="text" name="rg" size="20" />
                <label>RG: </label>
            </div>
            <div class="input">
                <input type="text" name="cpf" size="20" />
                <label>CPF: </label>
            </div>
            <div class="input">
                <input type="text" name="email" size="20" />
                <label>E-mail: </label>
            </div>
            <div class="input">
                <input type="text" name="endereco" size="20" />
                <label>Endereço: </label>
            </div>
            <div class="input">
                <input type="text" name="telefone" size="20" />
                <label>Telefone: </label>
            </div>
            <button>
                <input type="hidden" name="acao" value="Incluir">
                <input type="submit" value="Incluir" />
            </button>
        </form>
    </body>
</html>