<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signup.css">
    <title>SIGN UP | FLIXIFY </title>
</head>
<body>
<?php include("header.php"); ?>
<div class="box">
    <form>
        <span class="text-center">Welcome !</span>
        <span class="text-center">Créer votre compte ici ! </span>
        <div class="input-container">
            <input type="email" required name="email">
            <label>Email</label>
        </div>
        <div class="input-container">
            <input type="password" required name="password">
            <label>Mot de passe</label>
        </div>
        <div class="input-container">
            <input type="password" required name="password">
            <label>Confirmez le mot de passe</label>
        </div>
        <button type="button" class="btn">Se connecter</button>
    </form>
</div>
</body>
</html>
