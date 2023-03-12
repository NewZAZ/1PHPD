<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>
<header>
    <div class="bg"></div>
    <nav>
        <a href="index.php">
            <h1 id="logo">Flixify</h1>
        </a>
        <a class="rubik bold">Films</a>
        <a class="rubik bold" href="faq.php">Avis</a>
        <?php
        session_start();
        if (!isset($_SESSION['logged_in'])) {
            echo " <div class='flex-column'>
                        <a class='rubik bold' href='login.php'>Login</a>
                        <a id='sign_up' href='signup.php'>Sign up</a>
                   </div>";
        }else{
            echo "<a class='rubik bold' href='logout.php'>Logout</a>";
        }
        ?>

    </nav>
    <div id="search">
        <form method='get' class="search-box">
            <input type="text" class="input-search" placeholder="Recherche" name="search">
            <input type="submit" name="submit" id="send">
        </form>
    </div>

</header>

