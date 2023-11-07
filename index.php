<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/index.css">
    <title>GameStore</title>
</head>

<body>
    <header>
        <a href="admin/admin.php"><button class="btn admin">Modo Admin</button></a>
        <h1 clss="logo">GameStore</h1>
        <a href="pages/favorites.php">
            <img src="images/carrinho.png" alt="carrinho" class="carrinho" title="Carrinho de Compras">
        </a>
    </header>

    <main>
        <div class="filter">
            <form name="formFilter" action="" method="get">
                <input type="text" name="filtro" id="filtro" placeholder="Pesquise um jogo pelo título">
                <button class="btn-filter" onclick="">Buscar
                    <img src="images/pesquisa.png" alt="Filtro" id="imgFiltro">
                </button>
            </form>
        </div>
        <div class="container">
            <?php
            include("database/database.php");
            $query = "SELECT * FROM Games";

            if (isset($_GET['filtro'])) {
                $query .= " WHERE name LIKE '%".$_GET['filtro']."%';";
            }

            $result = mysqli_query($connection, $query) or die("Database Connection Error");

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class=\"card\">
                    
                    <div class=\"card__cover\">
                        <img src=\"images/games.png\" alt=\"Livro\">   
                    </div>
                    
                    <div class=\"card__content\">
                        <span class='name'>".$row['name']."</span><br>
                        <a href='pages/favorites.php?favorite=".$row['id']."'><img src=\"images/favorito.png\" alt=\"favorito\" class=\"favorito\"></a>
                        <span class='price'>R$ ".$row['price']."</span>
                    </div>
                    
                </div>";
                }
            } else {
                echo "<p>Não há produtos cadastrados</p>";
            }
            ?>
        </div>
    </main>
</body>

</html>