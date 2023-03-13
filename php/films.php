<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/films.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Flixify | Films</title>
</head>
<body>

<?php include "header.php" ?>
<?php

echo "<form method='get' class='search-box''>";
echo "<input type='text' class='input-search' placeholder='Recherche' name='search'>";

echo "<select id='menu-deroulant' name='select'>";


include "config.php";

if (!isset($db)) return;


$query = $db->prepare("SELECT * FROM categories");

$query->execute();


$data = $query->fetchAll();

echo "<option value='tout' class='cellule' selected>Tout les films</option>";

foreach ($data as $row) {
    echo "<option value='$row[categoryName]' class='cellule'> $row[categoryName] </option>";
}


echo "</select>";
echo "<input type='submit' name='submit' id='send''>";
echo "</form>"
?>

<?php
include "config.php";

if (!isset($db)) return;
$search = '';
$select = 'tout';
if (!empty($_GET['search'])) {
    $search = $_GET['search'];
}

if (!empty($_GET['select'])) {
    $select = $_GET['select'];
}
if (!isset($select)) {
    return;
}
$query;
if ($select == 'tout') {
    $query = $db->prepare("SELECT * FROM movies WHERE name LIKE '%$search%'");

} else {
    $query = $db->prepare("SELECT * FROM movies WHERE name LIKE '%$search%' AND category = '$select'");
}


$query->execute();

$all = $query->fetchAll();

echo "<section class='wrapper'>";

foreach ($all as $row) {
    echo "<article class='flex-column size-article align-center rubik'>

                <img class='size-img' src=$row[image_url]>
                
                <p>Réaliser par : $row[author]</p>
                <p>Avec : $row[main_actor]</p>
                <p>Prix : $row[price]</p>
                
                <footer>
                    <a href='films.php?action=buy&movie=$row[id]'>Acheter</a>
                </footer>
               </article>";
}

echo "</section>";
?>
</body>
</html>

<?php


if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userId'])) {
    print_r("ldkljflksjdlfk");
    return;
}

$userId = $_SESSION['userId'];

if (isset($_GET['action']) && isset($_GET['movie'])) {
    $action = htmlspecialchars($_GET['action']);
    $movie = htmlspecialchars($_GET['movie']);

    $query = $db->prepare("SELECT id FROM movies WHERE id=$movie");
    $query->execute();

    $moviesIds = $query->fetchAll();

    if (count($moviesIds) == 0) {
        return;
    }

    $query = $db->prepare("SELECT * FROM cart WHERE id=$userId");

    $query->execute();

    $cartProducts = $query->fetchAll();

    if (count($cartProducts) == 0) {
        echo "<div>
                <p>Vous n'avez rien dans votre panier !</p>
              </div>";
        return;
    }


}
?>

