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
        <a class="rubik bold" href="films.php">Films</a>
        <a class="rubik bold" href="faq.php">Avis</a>
        <?php
        session_start();

        if (!isset($_SESSION['logged_in'])) {
            echo " <div class='flex-column'>
                        <a class='rubik bold' href='login.php'>Login</a>
                        <a id='sign_up' href='signup.php'>Sign up</a>
                    </div>";
        }else{
            echo "<div class='flex-column'>
                    <a class='rubik bold' href='logout.php'>Logout</a>
                    <a class='rubik bold' href='cart.php'>Mon Panier</a>
                </div>";

        }
        ?>

    </nav>
</header>

