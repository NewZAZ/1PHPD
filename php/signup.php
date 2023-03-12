<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>SIGN UP | FLIXIFY </title>
</head>
<body>
<?php include("header.php"); ?>
<div class="box">
    <form method="POST">
        <span class="text-center">Welcome !</span>
        <span class="text-center">Créer votre compte ici ! </span>
        <div class="input-container">
            <input type="email" required name="email">
            <label>Email</label>
        </div>
        <div class="input-container">
            <input type="password" required name="password1">
            <label>Mot de passe</label>
        </div>
        <div class="input-container">
            <input type="password" required name="password2">
            <label>Confirmez le mot de passe</label>
        </div>
        <input type="submit" class="btn" name="signup" value="S'authentifier">
    </form>
</div>
</body>
</html>
<?php
include("config.php");
if (!isset($db)) return;

if(isset($_POST["signup"])){
    $email = $_POST["email"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    if($password1 != $password2){
        echo "Mot de passe incorrect";
    }
    $query = $db->prepare("SELECT * FROM users WHERE email='$email'");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();

    $result = $query->fetchAll();

    if(count($result) != 0){
        echo "<p>Le compte existe déjà</p>";
        return;
    }
    else{
        $password_hash = password_hash($password1, PASSWORD_BCRYPT);
        $query = $db->prepare("INSERT INTO users(email, password) VALUES('$email','$password_hash')");
        $query->execute();
        echo "<script>alert('Le message a bien été envoyé !');</script>";
    }
}

?>
