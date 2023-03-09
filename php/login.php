<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>LOGIN | FLIXIFY</title>
</head>
<body>
<?php include("header.php"); ?>
<div class="box">
    <form method="POST">
        <span class="text-center">Welcome Back !</span>
        <span class="text-center">Connectez vous ici</span>
        <div class="input-container">
            <input type="email" required name="email">
            <label>Email</label>
        </div>
        <div class="input-container">
            <input type="password" required name="password">
            <label>Mot de passe</label>
        </div>
        <input type="submit" class="btn" name="submit" value="Se connecter">
    </form>
</div>
</body>
</html>


<?php
include("config.php");
if (!isset($db)) return;
session_start();

if(isset($_POST["submit"])){

    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $email = $_POST["email"];
    $password = $_POST["password"];

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    print_r($password_hash);

    $query = $db->prepare("SELECT * FROM users WHERE mail='$email'");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();

    $result = $query->fetchAll();

    if(count($result) == 0){
        echo "<p>Le compte n'éxiste pas</p";
        return;
    }

    //TODO VERIFY PASSWORD

    $_SESSION['login_user'] = $email;

    header("Location: index.php");
}


?>

