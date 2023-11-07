
<?php
    include_once("../../functions/validateSession.php");
    include_once("../../database/database.php");

    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];

        $query = "DELETE FROM books WHERE id = $id;";
        $result = mysqli_query($connection, $query) or die("Database Connection Error");

        if ($result) {
            header("Location: ../pages/products.php");
        } else {
            echo "<h2>Ocorreu um erro ao deletar o jogo!</h2>";
        }
    } else {
        echo "<h2>Erro ao deletar jogo</h2>";
    }
?>
