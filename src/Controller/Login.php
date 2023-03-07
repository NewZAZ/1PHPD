<?php

if(isset($_POST["submit"])){

    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $userName = $_POST["username"];
    $password = $_POST["password"];

    $password_hash = password_hash($password, PASSWORD_BCRYPT);
}