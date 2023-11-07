<?php
include_once("../../functions/validateSession.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameStore | Cadastro de Jogos</title>
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../css/products.css">
</head>

<body>
    <center>
        <h1>Jogos Cadastrados</h1>
        <p>Bem-vindo a área administrativa da GameStore <?php echo $_SESSION["USER"] ?>!</p>
    </center>

    
        <a href="../../functions/logout.php"><button class="btn-logout">Logout</button></a>
    
    <div class="filter">
            <form name="formFilter" action="" method="get">
                <input type="text" name="filtro" id="filtro" placeholder="Pesquise um jogo pelo título">
                <button class="btn-filter" onclick="">Buscar
                    <img src="../../images/pesquisa.png" alt="Filtro" id="imgFiltro">
                </button>
            </form>
        </div>
    <a href="formInGame.php"><button class="btn">Novo Jogo</button></a>

    <div class="container">
        <?php
            include("../../database/database.php");

            $query = "SELECT * FROM games";

            if (isset($_GET['filtro'])) {
                $query .= " WHERE name LIKE '%".$_GET['filtro']."%';";
            }

            $result = mysqli_query($connection, $query) or die("Database Connection Error");

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<div class=\"card\">
                    
                    <div class=\"card__cover\">
                        <img src=\"../../images/Games.png\" alt=\"Game\">   
                    </div>
                    
                    <div class=\"card__content\">
                        Nome: ".$row['name']." <br>
                        Preço: R$ ".$row['price']."<br>
                        <a href='formUpGame.php?id=".$row['id']."'><button class=\"action edit\">Editar</button></a>
                        <a href='../functions/deleteBook.php?id=".$row['id']."'><button class=\"action delete\">Deletar</button></a>
                    </div>
                    
                </div>";
                }
            } else {
                echo "<p>Não há produtos cadastrados</p>";
            }
        ?>
    </div>

</body>

</html>