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
    include_once("../../database/database.php");
    include("../functions/updateGame.php");

    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];

        $query = "SELECT * FROM games WHERE id = $id;";
        $result = mysqli_query($connection, $query) or die("Database Connection Error");

        if (mysqli_num_rows($result) == 1) {
            $game = mysqli_fetch_assoc($result);

            echo '<center>
            <h2>Atualizando Informações do jogo</h2>
                    </center>
        
        <div class="form">
            <form name="book" action="" method="post">
                <div class="card__cover">
                        <img src="../../images/book.png" alt="Livro">   
                    </div>
                <p>
                    <label for="id">Código:</label>
                    <input type="number" name="id" id="id" value="'.$game['id'].'" readonly>
                </p>
                <p>
                    <label for="name">Nome:</label>
                    <input type="text" name="name" id="name" value="'.$game['name'].'">
                </p>
                <p>
                    <label for="price">Preço:</label>
                    <input type="number" name="price" id="price" step="0.01" min="0.05" max="1000" value="'.$game['price'].'">
                </p>
                <p>
                    <button class="btn back"><a href="products.php">Voltar</a></button>
                    <button class="btn up" onclick="validateFormBook()">Atualizar</button>
                </p>
            </form>
        </div>';
            
        } else {
            echo "<h2>Erro ao encontrar jogo</h2>";
        }
    } else {
        echo "<h2>Erro ao tentar atualizar jogo</h2>";
    }
    ?>
</body>

</html>