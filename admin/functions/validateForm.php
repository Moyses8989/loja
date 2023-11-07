<?php

include("../database/database.php");

if (isset($_POST["username"]) || isset($_POST["password"])) {
    if (strlen($_POST["username"]) == 0) {
        die("USERNAME EMPTY");
    } else if (strlen($_POST["password"]) == 0) {
        die("PASSWORD EMPTY");
    } else {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM account WHERE username = '$username' AND password = MD5('$password');";
        $result = mysqli_query($connection, $query) or die("Database Connection Error");

        $numRows = mysqli_num_rows($result);

        if ($numRows == 1) {
            $user = mysqli_fetch_assoc($result);

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION["ACCOUNT_ID"] = $user['id'];
            $_SESSION["USER"] = $user['username'];

            header("Location: pages/products.php");
        } else {
            echo "<center>Username or Password Incorrect!</center>";
        }
    }
}
