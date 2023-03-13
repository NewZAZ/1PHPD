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
    <?php include "header.php"?>
    <form method='get' class="search-box">
        <input type="text" class="input-search" placeholder="Recherche" name="search">
        <select id="menu-deroulant">
            <option value="tout" class="cellule">Tout les films</option>
            <option value="drame" class="cellule">Drame</option>
            <option value="guerre" class="cellule">Guerre</option>
            <option value="aventure" class="cellule">Aventure</option>
            <option value="action" class="cellule">Action</option>
            <option value="fantastique" class="cellule">Fantastique</option>
            <option value="comedie" class="cellule">Comédie</option>
        </select>
        <input type="submit" name="submit" id="send">
    </form>
</body>
</html>