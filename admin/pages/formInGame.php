<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizando Jogo</title>
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../../css/global.css">
    <script type="text/javascript" src="../js/admin.js"></script>
</head>

<body>
    <?php
    include_once("../../functions/validateSession.php");
    include("../functions/insertGame.php");
    ?>

    <center>
        <h2>Atualizando Informações do Jogo</h2>
    </center>

    <div class="form">

        <form name="game" action="" method="post">
            <div class="card__cover">
                <img src="../../images/games.png" alt="Jogo">
            </div>
            <p>
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name">
            </p>
            <p>
                <label for="price">Preço:</label>
                <input type="number" name="price" id="price" step="0.01" min="0.05" max="1000" required>
            </p>
            <p>
                <button class="btn back"><a href="products.php">Voltar</a></button>
                <button class="btn up" onClick="validateFormGame()">Cadastrar</button>
            </p>
        </form>
    </div>


</body>

</html>