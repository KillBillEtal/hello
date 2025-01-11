<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require_once("check-redirect.php");

    if (!isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['logged_in_expiration']);
        http_response_code(403);
        header('Location: http://localhost/osint/index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ma page</title>
    </head>
    <body>
        <h1>Bravo tu à réussi !!!!</h1>

        <h3>Mon numéro de téléphone est : 06 44 64 90 21</h3>
    </body>
    <a href="index.php">Déconnection</a>
</html>