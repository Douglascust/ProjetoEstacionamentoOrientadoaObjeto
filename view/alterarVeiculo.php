<html>
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
    Veículo
    <br /><br />
    ID do veículo: <input type="text" name="cod_veiculo" size="20" />
    <br /><br />
    Placa do veículo: <input type="text" name="placa" size="20" />
    <br /><br />
    Modelo: <input type="text" name="modelo" size="40" />
    <br /><br />
    Marca: <input type="text" name="marca" size="20" />
    <br /><br />
    Cor: <input type="text" name="cor" size="20" />
    <br /><br />
    <br /><br />
    <input type="hidden" name="acao" value="Alterar">
    <input type="submit" value="Alterar" />
</form>
</html>