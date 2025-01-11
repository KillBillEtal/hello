<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include "tools.php";

    if ($_SERVER["REQUEST_METHOD"] !== "POST"){
        handleMessage("Oups :( Un problème est survenue lors de la validation du formulaire !");
        header('Location: http://localhost/hello/public/index.php');
        exit();
    }

    function handleMessage($error_message){
        if (!isset($_SESSION['error_message'])) {
            $_SESSION['error_message'] = $error_message;
        }
    }

    $username = test_input($_POST['uname']);
    $password = test_input($_POST['psw']);

    if(isset($username, $password) && !empty($password) && !empty($username)){
        $config = include 'config-auth.php';
        $user = $config['USERNAME'];
        $pswd = $config['MDP'];

        if($username === $user && $password === $pswd){
            $_SESSION['logged_in'] = true;
            $_SESSION['logged_in_expiration'] = time() + 300;
            header('Location: http://localhost/hello/public/success.php');
            exit();
        }
        else{
            handleMessage("C'est pas bon");
            header('Location: http://localhost/hello/public/index.php');
            exit();
        }
    }
    else{
        handleMessage("Il faut tous remplir ;)");
        header('Location: http://localhost/hello/public/index.php');
        exit();
    }

?>