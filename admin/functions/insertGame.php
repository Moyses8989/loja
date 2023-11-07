<?php

    include_once("../../functions/validateSession.php");
    include_once("../../database/database.php");

    if (isset($_POST['name']) && isset($_POST['price']) && !empty($_POST['name']) ) {
        $id = (int)$_POST['id'];
        $name = $_POST['name'];
        $price = (float)$_POST['price'];

        $query = "INSERT INTO games (name, price) VALUES ('$name', $price);";
        $result = mysqli_query($connection, $query) or die("Database Connection Error");

        if ($result) {
            header("Location: ../pages/products.php");
        } else {
            echo "<h2>Ocorreu um erro ao cadastrar o jogo!</h2>";
        }
    }

?>
