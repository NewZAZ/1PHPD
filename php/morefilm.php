<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/film1.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Flixify | Film</title>
</head>
<body>
<?php include "header.php" ?>
<?php
include "config.php";

if (!isset($db)) return;
if (!isset($_GET['movie_id'])) {
    header("Location: films.php");
    return;
}
$movieID = $_GET['movie_id'];

$query = $db->prepare("SELECT * FROM movies WHERE id=$movieID");

$query->execute();

$data = $query->fetch();

$imageUrl = $data['image_url'];
$title = $data['name'];
$synopsis = $data['synopsis'];
$price = $data['price'];

echo "<section class='flex-row'>
<article>
<img src=$imageUrl alt=$title>
</article>
    <aside class='flex-column txt_film'>
    <h1 class='flex-column txt_film'>$title</h1>
    <p class='rubik'>Synopsis : $synopsis</p>
    <p class='rubik'>Prix : $price$</p>
            <a class='add_cart button-1' href='cart.php?action=buy&movie=$movieID'>Ajouter au panier</a>
</aside>
</section>"
?>
</body>
</html>
