<?php
include("config.php");

if (!isset($db)) return;
session_start();

if(isset($_POST["submit"])){

    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $userName = $_POST["username"];
    $password = $_POST["password"];

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $query = "SELECT * FROM users WHERE username='$userName' and password='$password_hash'";


    $PDOStatement = $db->query($query);

    if(!$PDOStatement){
        $error = "Password incorrect";
        return;
    }

    $_SESSION['login_user'] = $userName;

    header("Location: index.php");
}
