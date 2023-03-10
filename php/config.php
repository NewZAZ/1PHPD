<?php
$db = new PDO("mysql:host=localhost;dbname=php","root","");

$query = $db->prepare("CREATE TABLE IF NOT EXISTS users (
    id int auto_increment,
    email VARCHAR(255),
    password VARCHAR(255),
    primary key (id)
)");
$query->execute();

$query = $db->prepare("CREATE TABLE IF NOT EXISTS movies (
    id int auto_increment,
    name VARCHAR(255),
    author VARCHAR(255),
    price int,
    main_actor VARCHAR(255),
    primary key (id)
)");
$query->execute();

$query = $db->prepare("CREATE TABLE IF NOT EXISTS cart (
    id int auto_increment,
    cart_film int,
    CONSTRAINT FK_UserID FOREIGN KEY (id) REFERENCES users(id),
    CONSTRAINT FK_MovieID FOREIGN KEY (cart_film) REFERENCES movies(id)
)");
$query->execute();

$query = $db->prepare("CREATE TABLE IF NOT EXISTS cart_films (
    id int auto_increment,
    movie_id int,
    CONSTRAINT FK_CartID FOREIGN KEY (id) REFERENCES cart(id),
    CONSTRAINT FK_MovieID FOREIGN KEY (movie_id) REFERENCES movies(id)
)");

$query->execute();

$query = $db->prepare("INSERT INTO movies(name, author, price, main_actor) VALUES('Pirate', 'test', 100, 'quelqun');");
$query->execute();

