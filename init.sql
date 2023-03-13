CREATE TABLE IF NOT EXISTS users
(
    id       int auto_increment,
    email    VARCHAR(100),
    password VARCHAR(255),
    primary key (id)
);

CREATE TABLE IF NOT EXISTS categories
(
    categoryId   int auto_increment,
    categoryName VARCHAR(100) UNIQUE,
    primary key (categoryId)
);

CREATE TABLE IF NOT EXISTS movies
(
    id         int auto_increment,
    name       VARCHAR(100),
    author     VARCHAR(100),
    price      int,
    main_actor VARCHAR(255),
    image_url  VARCHAR(500),
    category   VARCHAR(100),
    synopsis   VARCHAR(1000),
    primary key (id),
    CONSTRAINT FK_CategoryName FOREIGN KEY (category) REFERENCES categories (categoryName)
);

CREATE TABLE IF NOT EXISTS cart_films
(
    id       int NOT NULL,
    movie_id int NOT NULL,
    CONSTRAINT FK_MovieID FOREIGN KEY (movie_id) REFERENCES movies (id)
);

CREATE TABLE IF NOT EXISTS cart
(
    id        int NOT NULL,
    cart_film int auto_increment,
    CONSTRAINT FK_UserID FOREIGN KEY (id) REFERENCES users (id),
    CONSTRAINT FK_MovieID FOREIGN KEY (cart_film) REFERENCES cart_films (id)
);



INSERT INTO categories(categoryName)
VALUES ('Action'),
       ('Guerre'),
       ('Science fiction'),
       ('Drame'),
       ('Aventure'),
       ('Fantastique');

INSERT INTO movies (name, author, price, main_actor, image_url, category, synopsis)
VALUES ('Spider man Far from home', 'Jon Watts', 10, 'Tom Holland',
        'https://fr.web.img3.acsta.net/c_310_420/pictures/19/06/13/15/28/4575985.jpg', 'Action',
        'L''araignée sympa du quartier décide de rejoindre ses meilleurs amis Ned, MJ, et le reste de la bande pour des vacances en Europe. Cependant, le projet de Peter de laisser son costume de super-héros derrière lui pendant quelques semaines est rapidement compromis quand il accepte à contrecoeur d''aider Nick Fury à découvrir le mystère de plusieurs attaques de créatures, qui ravagent le continent !'),
       ('American Sniper', 'Clint Eastwoord', 10, 'Bradley Cooper, Sienna Miller, Luke Grimes',
        'https://fr.web.img2.acsta.net/c_310_420/pictures/14/10/14/09/50/570218.jpg', 'Guerre',
        'Tireur d''élite des Navy SEAL, Chris Kyle est envoyé en Irak dans un seul but: protéger ses camarades. Sa précision chirurgicale sauve d''innombrables vies humaines sur le champ de bataille et, tandis que les récits de ses exploits se multiplient, il décroche le surnom de "La Légende." Toutefois, sa réputation grandissante attire également l''attention de ses ennemis. Il livre aussi bataille sur un autre front: il tente tant bien que mal d''assumer le rôle de bon époux et de bon père.'),
       ('Avatar la voie de l''eau', 'James Cameron', 10, 'Sam Worthington',
        'https://fr.web.img2.acsta.net/c_310_420/pictures/22/11/02/14/49/4565071.jpg', 'Science fiction',
        'Sur le monde extraterrestre luxuriant de Pandora vivent les Na''vi, des êtres qui semblent primitifs, mais qui sont très évolués. Jake Sully, un ancien Marine paralysé, redevient mobile grâce à un tel Avatar et tombe amoureux d''une femme Na''vi. Alors qu''un lien avec elle grandit, il est entraîné dans une bataille pour la survie de son monde.'),
       ('Teen wolf', 'Russell Mulcahy', 10, 'Tyler Posey, Crystal Reed, Holland Roden',
        'https://fr.web.img6.acsta.net/c_310_420/pictures/22/12/02/09/34/5377189.jpg', 'Action',
        'Une nuit, Scott McCall, un jeune lycéen, joueur de crosse au lycée de Beacon Hills en Californie, se promène dans les bois à la recherche de la moitié d''un cadavre avec son meilleur ami Stiles Stilinski et se fait attaquer par une énorme bête sauvage.'),
       ('Interstellar', 'Christopher Nolan', 10, 'Matthew McConaughey',
        'https://fr.web.img5.acsta.net/c_310_420/pictures/14/09/24/12/08/158828.jpg', 'Science fiction',
        'Dans un proche futur, la Terre est devenue hostile pour l''homme. Les tempêtes de sable sont fréquentes et il n''y a plus que le maïs qui peut être cultivé, en raison d''un sol trop aride. Cooper est un pilote, recyclé en agriculteur, qui vit avec son fils et sa fille dans la ferme familiale. Lorsqu''une force qu''il ne peut expliquer lui indique les coordonnées d''une division secrète de la NASA, il est alors embarqué dans une expédition pour sauver l''humanité.'),
       ('Forrest Gump', 'Robert Zemeckis', 10, 'Tom Hanks, Gary Sinise, Robin Wright',
        'https://fr.web.img2.acsta.net/c_310_420/pictures/15/10/13/15/12/514297.jpg', 'Drame',
        'Sur un banc, à Savannah, en Géorgie, Forrest Gump attend le bus. Comme celui-ci tarde à venir, le jeune homme raconte sa vie à ses compagnons d''ennui. A priori, ses capacités intellectuelles plutôt limitées ne le destinaient pas à de grandes choses. Qu''importe. Forrest Gump, sans jamais rien y comprendre, s''associa à tous les grands événements de l''Histoire de son pays.'),
       ('Le Seigneur des Anneaux - Le Retour du roi', 'Peter Jackson', 10, 'Sean Astin, Elijah Wood, Viggo Mortensen',
        'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/35/14/33/18366630.jpg', 'Aventure',
        'Les armées de Sauron ont attaqué Minas Tirith, la capitale du Gondor. Jamais ce royaume autrefois puissant n''a eu autant besoin de son roi. Cependant, Aragorn trouvera-t-il en lui la volonté d''accomplir sa destinée ? Tandis que Gandalf s''efforce de soutenir les forces brisées de Gondor, Théoden exhorte les guerriers de Rohan à se joindre au combat. Cependant, malgré leur courage et leur loyauté, les forces des Hommes ne sont pas de taille à lutter contre les innombrables légions d''ennemis.'),
       ('Inception', 'Christopher Nolan', 10, 'Leonardo DiCaprio, Marion Cotillard, Elliot Page',
        'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/72/34/14/19476654.jpg', 'Science fiction',
        'Dom Cobb est un voleur expérimenté dans l''art périlleux de l''extraction : sa spécialité consiste à s''approprier les secrets les plus précieux d''un individu, enfouis au plus profond de son subconscient, pendant qu''il rêve et que son esprit est particulièrement vulnérable. Très recherché pour ses talents dans l''univers trouble de l''espionnage industriel, Cobb est aussi devenu un fugitif traqué dans le monde entier. Cependant, une ultime mission pourrait lui permettre de retrouver sa vie d''avant.'),
       ('Retour vers le futur', 'Robert Zemeckis', 10, 'Michael J. Fox, Christopher Lloyd, Lea Thompson',
        'https://fr.web.img6.acsta.net/c_310_420/pictures/22/07/22/15/00/2862661.jpg', 'Science fiction',
        'Le jeune Marty McFly mène une existence anonyme, auprès de sa petite amie Jennifer, seulement troublée par sa famille en crise et un proviseur qui serait ravi de l''expulser du lycée. Ami de l''excentrique professeur Emmett Brown, il l''accompagne tester sa nouvelle expérience : le voyage dans le temps via une DeLorean modifiée. La démonstration tourne mal : des trafiquants d''armes débarquent et assassinent le scientifique.'),
       ('Titanic', 'James Cameron', 10, 'Leonardo DiCaprio, Kate Winslet, Billy Zane',
        'https://fr.web.img6.acsta.net/c_310_420/pictures/23/01/10/16/06/0622119.jpg', 'Action',
        'En 1997, l''épave du Titanic est l''objet d''une exploration fiévreuse, menée par des chercheurs de trésor en quête d''un diamant bleu qui se trouvait à bord. Frappée par un reportage télévisé, l''une des rescapées du naufrage, âgée de 102 ans, Rose DeWitt, se rend sur place et évoque ses souvenirs. 1912. Fiancée à un industriel arrogant, Rose croise sur le bateau un artiste sans le sou.'),
       ('Mad Max - Fury Road', 'George Miller', 10, 'Bertrand Cadart, David Bracks, Mel Gibson',
        'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/66/60/81/18943123.jpg', 'Action',
        'Au volant de son bolide, le "Cavalier de la nuit" sème la terreur sur une route des États-Unis. Une course-poursuite s''engage alors entre les représentants de la loi et le chauffard qui, après avoir provoqué des accidents dramatiques et spectaculaires, périt au volant de son véhicule. C''est le policier Max Rockatansky qui a pu, grâce à son savoir-faire, en venir à bout.'),
       ('Le Roi Lion', 'Jon Favreau', 10, 'Rayane Bensetti, Donald Glover, Anne Sila',
        'https://fr.web.img6.acsta.net/c_310_420/pictures/19/02/25/12/06/2908996.jpg', 'Aventure',
        'Un lionceau nommé Simba est exilé de son royaume après avoir été accusé d''être responsable de la mort de son père, Mufasa. Avec l''aide d''un étrange duo composé d''un suricate et d''un phacochère, il décide de reprendre ce qui lui revient de droit lorsqu''il apprend qu''il est destiné à être roi.'),
       ('Astérix et Obélix : L''Empire du milieu', 'Guillaume Canet', 10,
        'Guillaume Canet, Gilles Lellouche, Vincent Cassel',
        'https://fr.web.img2.acsta.net/c_310_420/pictures/23/01/03/15/53/0336388.jpg', 'Comédie',
        'L''impératrice de Chine est emprisonnée suite à un coup d''état fomenté par Deng Tsin Quin, un prince félon. La princesse Fu Yi, fille unique de l''impératrice, part en Gaule chercher l''aide d''Astérix et Obélix. Les deux inséparables Gaulois acceptent bien sûr d''aider la princesse à sauver sa mère et libérer son pays, et partent pour une grande aventure vers la Chine. Seulement, César et sa puissante armée, toujours en soif de conquêtes, ont eux aussi pris la direction de l''Empire du Milieu.'),
       ('Ant-Man et la Guêpe : Quantumania', 'Peyton Reed', 10, 'Paul Rudd, Evangeline Lilly, Michael Douglas',
        'https://fr.web.img5.acsta.net/c_310_420/pictures/23/01/10/11/56/4907182.jpg', 'Action',
        'Les super-héros et partenaires Scott Lang et Hope Van Dyne, alias Ant-Man et la Guêpe, vont vivre de nouvelles aventures. En compagnie de Hank Pym et Janet Van Dyne, les parents de Hope, le duo va explorer la dimension subatomique, interagir avec d''étranges nouvelles créatures et se lancer dans une odyssée qui les poussera au-delà des limites de ce qu''il pensait être possible'),
       ('Creed III', 'Michael B. Jordan', 10, 'Michael B. Jordan, Tessa Thompson, Jonathan Majors',
        'https://fr.web.img5.acsta.net/c_310_420/pictures/23/02/10/10/56/3228985.jpg', 'Drame',
        'Dominant toujours le monde de la boxe, Adonis Creed prospère dans sa carrière et sa vie de famille. Lorsque Damian, ami d''enfance et ancien prodige de la boxe, refait surface après avoir purgé une peine de prison, il a hâte de prouver qu''il mérite sa chance dans l''enceinte. La confrontation entre anciens amis est plus qu''un simple combat. Pour régler le compte, Adonis doit mettre son avenir en jeu pour combattre Damian, un combattant qui n''a rien à perdre.'),
       ('Star Wars - Épisode I : La Menace fantôme', 'George Lucas', 10, 'Liam Neeson, Ewan McGregor, Natalie Portman',
        'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/35/83/29/20017378.jpg', 'Science fiction',
        'Avant de devenir un célèbre chevalier Jedi, et bien avant de se révéler l''âme la plus noire de la galaxie, Anakin Skywalker est un jeune esclave sur la planète Tatooine. La Force est déjà puissante en lui et il est un remarquable pilote de Podracer. Le maître Jedi Qui-Gon Jinn le découvre et entrevoit alors son immense potentiel. Pendant ce temps, l''armée de droïdes de l''insatiable Fédération du Commerce a envahi Naboo dans le cadre d''un plan secret des Sith visant à accroître leur pouvoir.'),
       ('Star Wars - Épisode II : L''Attaque des clones', 'George Lucas', 10,
        'Ewan McGregor, Natalie Portman, Hayden Christensen',
        'https://fr.web.img3.acsta.net/c_310_420/medias/nmedia/00/02/34/81/affclones.jpg', 'Science fiction',
        'Depuis le blocus de la planète Naboo, la République, gouvernée par le Chancelier Palpatine, connaît une crise. Un groupe de dissidents, mené par le sombre Jedi comte Dooku, manifeste son mécontentement. Le Sénat et la population intergalactique se montrent pour leur part inquiets. Certains sénateurs demandent à ce que la République soit dotée d''une armée pour empêcher que la situation ne se détériore. Padmé Amidala, devenue sénatrice, est menacée par les séparatistes et échappe à un attentat.'),
       ('Star Wars - Épisode III : La Revanche des Sith', 'George Lucas', 10,
        'Hayden Christensen, Ewan McGregor, Natalie Portman',
        'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/35/53/23/18423997.jpg', 'Science fiction',
        'La Guerre des Clones fait rage. Une franche hostilité oppose désormais le Chancelier Palpatine au Conseil Jedi. Anakin Skywalker, jeune Chevalier Jedi pris entre deux feux, hésite sur la conduite à tenir. Séduit par la promesse d''un pouvoir sans précédent, tenté par le côté obscur de la Force, il prête allégeance au maléfique Darth Sidious et devient Dark Vador.Les Seigneurs Sith s''unissent alors pour préparer leur revanche, qui commence par l''extermination des Jedi.'),
       ('Star Wars - Le Réveil de la Force', 'J.J. Abrams', 10, 'Daisy Ridley, John Boyega, Adam Driver',
        'https://fr.web.img2.acsta.net/c_310_420/pictures/15/10/18/18/56/052074.jpg', 'Science fiction',
        'Plus de 30 ans après la bataille d''Endor, la galaxie n''en a pas fini avec la tyrannie et l''oppression. Les membres de l''Alliance rebelle, devenus la "Résistance," combattent les vestiges de l''Empire réunis sous la bannière du "Premier Ordre." Un mystérieux guerrier, Kylo Ren, semble vouer un culte à Dark Vador. Au même moment, une jeune femme nommée Rey, pilleuse d''épaves sur la planète désertique Jakku, va faire la rencontre de Finn, un Stormtrooper en fuite.'),
       ('Le Seigneur des anneaux : La communauté de l''anneau', 'Peter Jackson', 10,
        'Elijah Wood, Sean Astin, Ian McKellen',
        'https://fr.web.img5.acsta.net/c_310_420/medias/nmedia/00/02/16/27/69218096_af.jpg', 'Fantastique',
        'Un jeune et timide Hobbit, Frodon Sacquet, hérite d''un anneau magique. Bien loin d''être une simple babiole, il s''agit d''un instrument de pouvoir absolu qui permettrait à Sauron, le "Seigneur des ténèbres", de régner sur la Terre du Milieu et de réduire en esclavage ses peuples. Frodon doit parvenir, avec l''aide de la communauté de l''anneau, jusqu''à la "Crevasse du Destin" pour le détruire.'),
       ('Matrix', 'Lana Wachowski, Lilly Wachowski', 10, 'Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss',
        'https://fr.web.img4.acsta.net/c_310_420/medias/04/34/49/043449_af.jpg', 'Action',
        'Programmeur anonyme dans un service administratif le jour, Thomas Anderson devient Neo la nuit venue. Sous ce pseudonyme, il est l''un des pirates les plus recherchés du cyber-espace. À cheval entre deux mondes, Neo est assailli par d''étranges songes et des messages cryptés provenant d''un certain Morpheus. Celui-ci l''exhorte à aller au-delà des apparences et à trouver la réponse à la question qui hante constamment ses pensées : qu''est-ce que la Matrice ?');