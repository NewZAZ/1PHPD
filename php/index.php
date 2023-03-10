<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Flixify</title>
</head>
<body>
<?php

include("header.php"); ?>
<div id="search">
    <form method="get">
        <label>Recherchez votre film ici !</label><br>
        <input type="search" id="input-search" name="search" placeholder="Recherchez votre film">
        <input type="submit" id="input-submit" name="submit_search">
    </form>

</div>
<main>
    <article id="site-presentation">
        <h2>Présentation du site</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
    </article>
    <section id="top-films">
        <article>
            <img src="images/avatar.jpg" alt="avatar">
            <footer class="align-center">
                <p class="film-title">kjqhzdouicqgoiuycg</p>
                <p>Réalisé par </p>
            </footer>
        </article>
        <article>
            <img src="images/spiderman.jpg" alt="spiderman">
            <footer class="align-center">
                <p class="film-title">kjqhzdouicqgoiuycg</p>
                <p>Réalisé par </p>
            </footer>
        </article>
        <article>
            <img src="images/mylittle.jpg" alt="my little poney">
            <footer class="align-center">
                <p class="film-title">kjqhzdouicqgoiuycg</p>
                <p>Réalisé par </p>
            </footer>
        </article>
    </section>
</main>
</body>
</html>

<?php
include "config.php";

if (!isset($db)) return;
if(isset($_GET['submit_search'])){
    $search = $_GET['search'];

    $query = $db->prepare("SELECT * FROM movies WHERE name LIKE '%$search%'");
    $query->execute();

    $all = $query->fetchAll();

    foreach ($all as $row){
        echo "<div>
                    $row[name]
                </div>";
    }
}

