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
<?php include("header.php"); ?>
<main>
    <article id="site-presentation">
        <h2>Présentation du site</h2>
        <p>Bienvenue sur notre site de location de films en ligne ! Nous sommes ravis de vous proposer une large sélection de films pour tous les goûts et toutes les envies.</p>

        <p>Notre plateforme vous permet de louer des films en quelques clics seulement, sans vous déplacer de chez vous. Vous pouvez ainsi profiter des dernières sorties cinématographiques ainsi que des grands classiques du cinéma, en qualité HD ou même en 4K pour une expérience de visionnage optimale.</p>

        <p>Nous mettons à votre disposition un catalogue complet de films, que ce soit des comédies, des drames, des thrillers, des films d'animation ou encore des films de science-fiction. Vous pouvez également y trouver des séries TV pour les fans de binge-watching.</p>

        <p>Nous vous offrons également la possibilité de louer des films à petit prix, avec des tarifs abordables pour tous les budgets. De plus, notre service de location est disponible 24 heures sur 24 et 7 jours sur 7, pour vous permettre de visionner vos films préférés à tout moment.</p>

        <p>Nous sommes fiers de vous offrir un service de qualité, avec une interface simple et intuitive, une navigation fluide et une expérience utilisateur agréable. Alors n'hésitez plus et rejoignez-nous dès maintenant pour découvrir notre vaste collection de films en ligne !</p>
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
if(isset($_GET['submit'])){
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
?>

