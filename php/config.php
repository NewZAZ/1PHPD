<?php
$db = new PDO("mysql:host=localhost;dbname=php","root","");

$query = $db->prepare("CREATE TABLE IF NOT EXISTS users (
    id int auto_increment,
    email VARCHAR(255),
    password VARCHAR(255),
    primary key (id)
)");
$query->execute();

$query = $db->prepare("CREATE TABLE IF NOT EXISTS categories (
    categoryId int auto_increment,
    categoryName VARCHAR(100) UNIQUE,
    primary key (categoryId)
)");
$query->execute();

$query = $db->prepare("CREATE TABLE IF NOT EXISTS movies (
    id int auto_increment,
    name VARCHAR(255),
    author VARCHAR(255),
    price int,
    main_actor VARCHAR(255),
    image_url VARCHAR(500),
    category VARCHAR(255),
    primary key (id),
    CONSTRAINT FK_CategoryName FOREIGN KEY (category) REFERENCES categories(categoryName)
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

/*$query = $db->prepare("INSERT INTO categories(categoryName) VALUES
                                         ('Action'),
                                         ('Guerre'),
                                         ('Science fiction'),
                                         ('Drame'),
                                         ('Aventure'),
                                         ('Fantastique')
                                         ");
$query->execute();*/

/*$query = $db->prepare("INSERT INTO movies (name, author, price, main_actor, image_url, category) VALUES
                                                                    ('Spider man Far from home', 'Jon Watts', 10, 'Tom Holland', 'https://fr.web.img3.acsta.net/c_310_420/pictures/19/06/13/15/28/4575985.jpg', 'Action'),
                                                                    ('American Sniper', 'Clint Eastwoord', 10, 'Bradley Cooper, Sienna Miller, Luke Grimes', 'https://fr.web.img2.acsta.net/c_310_420/pictures/14/10/14/09/50/570218.jpg', 'Guerre'),
                                                                    ('Avatar la voie de l''eau', 'James Cameron', 10, 'Sam Worthington', 'https://fr.web.img2.acsta.net/c_310_420/pictures/22/11/02/14/49/4565071.jpg', 'Science fiction'),
                                                                    ('Teen wolf', 'Russell Mulcahy', 10, 'Tyler Posey, Crystal Reed, Holland Roden', 'https://fr.web.img6.acsta.net/c_310_420/pictures/22/12/02/09/34/5377189.jpg', 'Action'),
                                                                    ('Interstellar', 'Christopher Nolan', 10, 'Matthew McConaughey', 'https://fr.web.img5.acsta.net/c_310_420/pictures/14/09/24/12/08/158828.jpg', 'Science fiction'),
                                                                    ('Forrest Gump', 'Robert Zemeckis', 10, 'Tom Hanks, Gary Sinise, Robin Wright', 'https://fr.web.img2.acsta.net/c_310_420/pictures/15/10/13/15/12/514297.jpg', 'Drame'),
                                                                    ('Le Seigneur des Anneaux - Le Retour du roi', 'Peter Jackson', 10, 'Sean Astin, Elijah Wood, Viggo Mortensen', 'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/35/14/33/18366630.jpg', 'Aventure'),
                                                                    ('Inception', 'Christopher Nolan', 10, 'Leonardo DiCaprio, Marion Cotillard, Elliot Page', 'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/72/34/14/19476654.jpg', 'Science fiction'),
                                                                    ('Retour vers le futur', 'Robert Zemeckis', 10, 'Michael J. Fox, Christopher Lloyd, Lea Thompson', 'https://fr.web.img6.acsta.net/c_310_420/pictures/22/07/22/15/00/2862661.jpg', 'Science fiction'),
                                                                    ('Titanic', 'James Cameron', 10, 'Leonardo DiCaprio, Kate Winslet, Billy Zane', 'https://fr.web.img6.acsta.net/c_310_420/pictures/23/01/10/16/06/0622119.jpg', 'Action'),
                                                                    ('Mad Max - Fury Road', 'George Miller', 10, 'Bertrand Cadart, David Bracks, Mel Gibson', 'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/66/60/81/18943123.jpg', 'Action'),
                                                                    ('Le Roi Lion', 'Jon Favreau', 10, 'Rayane Bensetti, Donald Glover, Anne Sila', 'https://fr.web.img6.acsta.net/c_310_420/pictures/19/02/25/12/06/2908996.jpg', 'Aventure'),
                                                                    ('Astérix et Obélix : L''Empire du milieu', 'Guillaume Canet', 10, 'Guillaume Canet, Gilles Lellouche, Vincent Cassel', 'https://fr.web.img2.acsta.net/c_310_420/pictures/23/01/03/15/53/0336388.jpg', 'Comédie'),
                                                                    ('Ant-Man et la Guêpe : Quantumania', 'Peyton Reed', 10, 'Paul Rudd, Evangeline Lilly, Michael Douglas', 'https://fr.web.img5.acsta.net/c_310_420/pictures/23/01/10/11/56/4907182.jpg', 'Action,'),
                                                                    ('Creed III', 'Michael B. Jordan', 10, 'Michael B. Jordan, Tessa Thompson, Jonathan Majors', 'https://fr.web.img5.acsta.net/c_310_420/pictures/23/02/10/10/56/3228985.jpg', 'Drame'),
                                                                    ('Star Wars - Épisode I : La Menace fantôme', 'George Lucas', 10, 'Liam Neeson, Ewan McGregor, Natalie Portman', 'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/35/83/29/20017378.jpg', 'Science fiction'),
                                                                    ('Star Wars - Épisode II : L''Attaque des clones', 'George Lucas', 10, 'Ewan McGregor, Natalie Portman, Hayden Christensen', 'https://fr.web.img3.acsta.net/c_310_420/medias/nmedia/00/02/34/81/affclones.jpg', 'Science fiction'),
                                                                    ('Star Wars - Épisode III : La Revanche des Sith', 'George Lucas', 10, 'Hayden Christensen, Ewan McGregor, Natalie Portman', 'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/35/53/23/18423997.jpg', 'Science fiction'),
                                                                    ('Star Wars - Le Réveil de la Force', 'J.J. Abrams', 10, 'Daisy Ridley, John Boyega, Adam Driver', 'https://fr.web.img2.acsta.net/c_310_420/pictures/15/10/18/18/56/052074.jpg', 'Science fiction'),
                                                                    ('Le Seigneur des anneaux : La communauté de l''anneau', 'Peter Jackson', 10, 'Elijah Wood, Sean Astin, Ian McKellen', 'https://fr.web.img5.acsta.net/c_310_420/medias/nmedia/00/02/16/27/69218096_af.jpg', 'Fantastique'),
                                                                    ('Matrix', 'Lana Wachowski, Lilly Wachowski', 10, 'Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss', 'https://fr.web.img4.acsta.net/c_310_420/medias/04/34/49/043449_af.jpg', 'Action');");
$query->execute();*/
