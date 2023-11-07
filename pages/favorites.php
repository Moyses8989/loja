<?php
    if (isset($_GET["favorite"])) {
        if ($_COOKIE["favorites"]) {
            if (strpos($_COOKIE["favorites"], "" . $_GET["favorite"] . "") === false) {
                setcookie("favorites", $_COOKIE["favorites"] . "," . $_GET["favorite"] . "", time() + 60 * 60);
            }
        } else {
            setcookie("favorites", "" . $_GET["favorite"] . "", time() + 60 * 60);
        }

        header("Location: favorites.php");
        exit;
    } elseif (isset($_GET["removefavorite"])) {
        if ($_COOKIE["favorites"]) {
            if (strpos($_COOKIE["favorites"], "" . $_GET["removefavorite"] . "") !== false) {
                $favorites = $_COOKIE["favorites"];
                $favorites = str_replace("," . $_GET["removefavorite"] . ",", ",", $favorites);
                $favorites = str_replace("" . $_GET["removefavorite"] . ",", "", $favorites);
                $favorites = str_replace("," . $_GET["removefavorite"] . "", "", $favorites);
                $favorites = str_replace("" . $_GET["removefavorite"] . "", "", $favorites);

                setcookie("favorites", $favorites, time() + 60 * 60);
            }
        }

        header("Location: favorites.php");
        exit;
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/favorites.css">
    <script src="../js/gamestore.js"></script>
    <title>GameStore | Carrinho</title>
</head>

<body>
    <a href="../index.php"><button class="btn-logout">Página Inicial</button></a>
<center>
    <h1>Carrinho de Compras</h1>
</center>
<br>
<h3>Itens no Carrinho:</h3>
    <div class="listaCompras">             
    
   <?php
    if(isset($_COOKIE["favorites"])) {
        include_once("../database/database.php");
        $query = "SELECT * FROM games WHERE id IN (".$_COOKIE["favorites"].") ORDER BY name;";
        $result = mysqli_query($connection, $query) or die("Database Connection Error");

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
               echo "<div class=\"item\">
               <img src=\"../images/games.png\" alt=".$row['name'].">
               <span> Nome do jogo:  ".$row['name']."</span>
               <span>Preço: R$ ".$row['price']."</span>
               <a href='favorites.php?removefavorite=".$row['id']."' class=\"rmv\" title=\"Remover Item\">X</a>
           </div>";
            }
        } else {
            echo "<p>Não há produtos cadastrados</p>";
        }
    } else {
        echo "<center>
                <h2>Não há itens no carrinho!</h2>
            </center>";
    }
   ?>
   </div>

   <div class="finalizarCompra">
       <form name="finaliza" action="" method="post">
           <input type="hidden" name="finalizar" id="finalizar">
           <button onclick="finalizarCompra()">Finalizar Compra</button>
        </form>
   </div>

   <?php
    if(isset($_POST['finalizar'])) {
        unset($_COOKIE['favorites']);
        setcookie('favorites', null, '/');
        header("Location: favorites.php");
    }
   ?>
</body>

</html>