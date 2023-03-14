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
echo "<input type='submit' name='submit' id='send' value='Rechercher'>";
echo "</form>"
?>

<?php
include "config.php";

if (!isset($db)) return;
$search = '';
$select = 'tout';
$sql = 'SELECT * FROM movies';
$hasWhere = false;
if (!empty($_GET['search'])) {
    $search = $_GET['search'];
    $query = $db->prepare("SELECT * FROM movies WHERE name LIKE '%$search%'");
    $hasWhere = true;
    $query->execute();
    $data = $query->fetchAll();
    if (count($data) > 0) {
        $sql = "SELECT * FROM movies WHERE name LIKE '%$search%'";
    } else {
        $sql = "SELECT * FROM movies WHERE author LIKE '%$search%'";
    }
}
if (!empty($_GET['select'])) {
    $select = $_GET['select'];
}
if (!isset($select)) {
    return;
}
$query = $db->prepare($sql);
if ($select != 'tout') {
    if($hasWhere){
        $query = $db->prepare("$sql AND category = '$select'");
    }else{
        $query = $db->prepare("$sql WHERE category = '$select'");
    }

}

$query->execute();

$all = $query->fetchAll();

echo "<section class='wrapper'>";

foreach ($all as $row) {
    echo "<article class='flex-column size-article align-center rubik'>
                <a href='morefilm.php?movie_id=$row[id]'>
                    <img class='size-img' src=$row[image_url]>
                </a>
                <a href='http://localhost/eval_phpd/php/films.php?search=$row[author]&select=tout&submit=Rechercher' name='$row[author]'>
                    <p>Réaliser par : $row[author]</p>
                </a>
                <p>Avec : $row[main_actor]</p>
                <p>Prix : $row[price]$</p>
                
                <footer>
                    <a href='cart.php?action=buy&movie=$row[id]'>Acheter</a>
                </footer>
            </article>";
}

echo "</section>";
?>
</body>
</html>



