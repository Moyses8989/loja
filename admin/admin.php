<?php
    include_once("./functions/validateForm.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameStore | Admin</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="./css/admin.css">
    <script type="text/javascript" src="./js/admin.js"></script>
</head>

<body>
    <center>
        <h2>GameStore</h2>
    </center>
    <div class="container">
        <form name="formLogin" action="" method="POST">
            <p>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
            </p>
            <p>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </p>
            <p>
                <a href="../index.php"><button id="btn-voltar" type="button">Voltar</button></a>
                <button id="btn-login" type="button" onclick="validateLogin();">Login</button>
            </p>
        </form>
        </form>
    </div>
</body>

</html>