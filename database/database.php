<?php

$user = "root";
$pass = "";
$database = "gamestore";
$host = "localhost";

$connection = mysqli_connect($host, $user, $pass, $database);

if (mysqli_error($connection)) {
    die("Falha na conexão com o banco de dados");
}
