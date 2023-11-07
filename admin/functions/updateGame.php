<?php

include_once("../../functions/validateSession.php");
include_once("../../database/database.php");

if (isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $name = $_POST['name'];
    $price = (float)$_POST['price'];

    $query = "UPDATE games SET name = '$name', price = $price WHERE id = $id";
    $result = mysqli_query($connection, $query) or die("Database Connection Error");

    if ($result) {
        header("Location: ../pages/products.php");
    } else {
        echo "<h2>Ocorreu um erro ao atualizar o jogo!</h2>";
    }
}

?>
