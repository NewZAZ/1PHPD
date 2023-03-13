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
        <input type="submit" class="btn" name="submit">
    </form>
</div>
</body>
</html>


<?php
include("config.php");
if (!isset($db)) return;

if(isset($_POST["submit"])){

    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = $db->prepare("SELECT * FROM users WHERE email='$email'");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();

    $result = $query->fetchAll();


    if(count($result) == 0){
        echo "<p>Le compte n''existe pas</p";
        return;
    }

    if(password_verify($password, $result[0]['password'])){
        $_SESSION['logged_in'] = true;
        $_SESSION['userId'] = $result[0]['id'];

        $query = $db->prepare("SELECT * FROM cart WHERE id=$_SESSION[userId]");

        $query->execute();

        $cartProducts = $query->fetchAll();

        $_SESSION['cartId'] = $cartProducts[0][1];



        header("Location: index.php");
    }
}
?>


