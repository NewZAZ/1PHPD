<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/cart.css">
    <title>Flixify | Panier</title>
</head>
<body>
<?php include "header.php" ?>
<?php
include "config.php";
if (!isset($db)) return;
$cartId = $_SESSION['cartId'];
$query = $db->prepare("SELECT * FROM cart_films WHERE id=$cartId");
$query->execute();

$data = $query->fetchAll();

foreach ($data as $row){
    $query = $db->prepare("SELECT * FROM movies WHERE id=$row[movie_id]");
    $query->execute();

    $moviesData = $query->fetchAll();

    $movieData = $moviesData[0];



    $imageUrl = $movieData['image_url'];
    $author = $movieData['author'];
    $price = $movieData['price'];
    $synopsis = $movieData['synopsis'];

    echo "<section class='cart_element'>
        <img src='$imageUrl' class='cart_img'>
        <article class='cart_txt'>
            <p>Réalisé par : $author</p>
            <p>Prix: $price$</p>
            <p>Synopsis: $synopsis</p>
            <a href='cart.php?action=remove&movie=$row[movie_id]'>
                <img src='../images/trash.png' id='trash'>
            </a>
            
        </article>
    </section> ";
}

?>
</body>
</html>

<?php
    include "config.php";

if (!isset($_SESSION['logged_in']) || !isset($_SESSION['userId'])) {
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

    $cartId = $_SESSION['cartId'];

    $query = $db->prepare("SELECT * FROM cart_films WHERE id=$cartId AND movie_id=$movie");
    $query->execute();

    $movies = $query->fetchAll();
    
    if (count($movies) != 0) {
        if($action == "remove"){
            $query = $db->prepare("DELETE FROM cart_films WHERE id=$cartId AND movie_id=$movie");
            $query->execute();
            header("Refresh:0;", true);
        }
        return;
    }
    if($action == 'buy') {
        $query = $db->prepare("INSERT INTO cart_films VALUES($cartId, $movie)");
        $query->execute();
        header("Location: films.php");
    }
}
?>