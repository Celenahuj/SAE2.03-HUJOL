-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 18 avr. 2025 à 09:16
-- Version du serveur : 10.11.11-MariaDB-0+deb12u1
-- Version de PHP : 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hujol3`
--

-- --------------------------------------------------------

--
-- Structure de la table `Category`
--

CREATE TABLE `Category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `Category`
--

INSERT INTO `Category` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Comédie'),
(3, 'Drame'),
(4, 'Science-fiction'),
(5, 'Animation'),
(6, 'Thriller'),
(7, 'Horreur'),
(8, 'Aventure'),
(9, 'Fantaisie'),
(10, 'Documentaire'),
(11, 'Romance');

-- --------------------------------------------------------

--
-- Structure de la table `Favori`
--

CREATE TABLE `Favori` (
  `id_favori` int(11) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Movie`
--

CREATE TABLE `Movie` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `director` varchar(255) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  `min_age` int(11) DEFAULT NULL,
  `featured` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `Movie`
--

INSERT INTO `Movie` (`id`, `name`, `year`, `length`, `description`, `director`, `id_category`, `image`, `trailer`, `min_age`, `featured`) VALUES
(7, 'Interstellar', 2014, 169, 'Un groupe d\'explorateurs voyage à travers un trou de ver pour sauver l\'humanité.', 'Christopher Nolan', 4, 'interstellar.jpg', 'https://www.youtube.com/embed/VaOijhK3CRU?si=76Ke4uw4LYjuLuQ6', 12, 1),
(12, 'La Liste de Schindler', 1993, 195, 'Un industriel allemand sauve des milliers de Juifs pendant l\'Holocauste.', 'Steven Spielberg', 3, 'schindler.webp', 'https://www.youtube.com/embed/ONWtyxzl-GE?si=xC3ASGGPy5Ib-aPn', 16, 0),
(17, 'Your Name', 2016, 107, 'Deux adolescents échangent leurs corps de manière mystérieuse.', 'Makoto Shinkai', 5, 'your_name.jpg', 'https://www.youtube.com/embed/AROOK45LXXg?si=aUQyGk2VMCb_ToUL', 10, 1),
(27, 'Le Bon, la Brute et le Truand', 1966, 161, 'Trois hommes se lancent à la recherche d\'un trésor caché.', 'Sergio Leone', 8, 'bon_brute_truand.jpg', 'https://www.youtube.com/embed/WA1hCZFOPqs?si=TwNZAoM4oj4KpGja', 12, 0),
(34, 'The Avengers', 2012, 143, 'Nick Fury, chef du S.H.I.E.L.D., est contraint de lancer le programme Avengers lorsque Loki représente une menace pour la planète Terre. Mais les super-héros doivent apprendre à collaborer s\'ils veulent l\'arrêter à temps.', 'Anthony Russo', 1, 'avengers.jpg', 'https://www.youtube.com/embed/b-kTeJhHOhc?si=g-fvks_kGUkBCRjC', 11, 0),
(35, 'L\'idée d\'être avec toi', 2024, 115, 'Lorsque Solène, une mère célibataire de 40 ans, doit chaperonner le voyage de sa fille adolescente au festival de musique de Coachella, elle rencontre Hayes Campbell, 24 ans, le chanteur d\'un célèbre boys band.', 'Michael Showalter', 2, 'idea.jpg', 'https://www.youtube.com/embed/_b_X2fUkm44?si=rM2_LpizsfL91LG7', 12, 1),
(37, 'Nos cœurs meurtris', 2022, 122, 'En dépit de leurs nombreuses différences et contre toute attente, une auteure, compositrice et interprète en herbe, Cassie Salazar, et un soldat américain, Luke, tombent éperdument amoureux.', ' Elizabeth Allen', 11, 'coeur.webp', 'https://www.youtube.com/embed/WTLgg8oRSBE?si=5_RlD1q5zxLGxQ0_', 10, 1),
(38, 'Fast & Furious X', 2023, 141, 'Au cours de nombreuses missions et contre toute attente, Dom Toretto et sa famille ont déjoué et dépassé tous les ennemis sur leur chemin. Maintenant, ils doivent affronter l\'adversaire le plus mortel qu\'ils aient jamais affronté. Alimentée par la vengeance, une menace terrifiante émerge des ombres ', 'Vin Diesel, Louis Leterrier, James Wan', 1, 'fast.webp', 'https://www.youtube.com/embed/fAfs4JkeN78?si=KBrjhHn2RORlyi6N', 12, 0),
(39, 'Inception', 2010, 148, 'Un voleur utilise le rêve partagé pour voler des secrets...', 'Christopher Nolan', 4, 'inception.jpg', 'https://www.youtube.com/embed/8hP9D6kZseM', 12, 1),
(40, 'Coco', 2017, 105, 'Un jeune garçon passionné de musique explore le monde des morts...', 'Lee Unkrich', 5, 'coco.jpg', 'https://www.youtube.com/embed/xlnPHQ3TLX8', 6, 0),
(41, 'Parasite', 2019, 132, 'Une famille pauvre infiltre peu à peu une riche maison...', 'Bong Joon-ho', 3, 'parasite.jpg', 'https://www.youtube.com/embed/SEUXfv87Wpk', 16, 1),
(42, 'Gladiator', 2000, 155, 'Un général romain trahi devient gladiateur pour se venger...', 'Ridley Scott', 8, 'gladiator.jpg', 'https://www.youtube.com/embed/owK1qxDselE', 16, 0),
(43, 'Encanto', 2021, 102, 'Une jeune fille sans pouvoirs tente de sauver sa famille magique...', 'Jared Bush', 5, 'encanto.jpg', 'https://www.youtube.com/embed/CaimKeDcudo', 6, 0),
(44, 'Dune', 2021, 155, 'Un jeune homme doit lutter pour sa survie sur la planète désertique Arrakis...', 'Denis Villeneuve', 4, 'dune.jpg', 'https://www.youtube.com/embed/8g18jPWeJ2U', 12, 1),
(45, 'Spider-Man: No Way Home', 2021, 148, 'Spider-Man se retrouve à faire face à des ennemis venus d\'autres univers...', 'Jon Watts', 1, 'spiderman_no_way_home.jpg', 'https://www.youtube.com/embed/JfVOs4V8pC8', 12, 1),
(46, 'The Suicide Squad', 2021, 132, 'Un groupe de criminels est envoyé en mission suicidaire pour sauver le monde...', 'James Gunn', 1, 'suicide_squad.jpg', 'https://www.youtube.com/embed/XfboDbU3xnA?si=iecy9rGL-Z3z-Qnt', 16, 0),
(47, 'Shang-Chi and the Legend of the Ten Rings', 2021, 132, 'Un maître des arts martiaux doit affronter son passé et un mystérieux pouvoir...', 'Destin Daniel Cretton', 1, 'shang_chi.jpg', 'https://www.youtube.com/embed/PD3rUCBFDlI?si=lIYzW2zztTwpmpNI', 12, 1),
(48, 'Everything Everywhere All at Once', 2022, 140, 'Une femme découvre qu\'elle est au centre d\'une lutte multiverselle...', 'Daniel Kwan, Daniel Scheinert', 4, 'everything_everywhere_all_at_once.jpg', 'https://www.youtube.com/embed/57nuioyQjcI?si=ybDpHf32FoJH1GJQ', 13, 1),
(49, 'The Night House', 2020, 108, 'Une veuve découvre des secrets mystérieux sur la vie de son défunt mari...', 'David Bruckner', 7, 'the_night_house.jpg', 'https://www.youtube.com/embed/W8WQGXkif_s?si=EMkxo9GP91LYtRFP', 16, 1),
(50, 'Free Guy', 2021, 115, 'Un personnage de jeu vidéo prend conscience de sa condition et devient un héros...', 'Shawn Levy', 9, 'free_guy.jpg', 'https://www.youtube.com/embed/4P6-TMgrDXg?si=TCiwyvIHOvuB1qsf', 10, 1),
(51, 'A Quiet Place Part II', 2020, 97, 'Une famille doit survivre dans un monde envahi par des créatures sensibles au bruit...', 'John Krasinski', 6, 'a_quiet_place_part_ii.jpg', 'https://www.youtube.com/embed/rs0mxn1ghlg?si=iDEw_vACSxc8ClS4', 14, 1),
(52, 'Cruella', 2021, 134, 'L\'histoire de la jeunesse de Cruella De Vil, célèbre méchante de *Les 101 Dalmatiens*...', 'Craig Gillespie', 8, 'cruella.jpg', 'https://www.youtube.com/embed/VKbJsznd7pg?si=jDaZIJcD92guShAQ', 10, 1),
(54, 'The Social Dilemma', 2020, 94, 'Un documentaire qui explore les dangers des réseaux sociaux sur la société moderne...', 'Jeff Orlowski', 10, 'the_social_dilemma.jpg', 'https://www.youtube.com/embed/uaaC57tcci0?si=ZSnW9iU4iFGnkqiM', 12, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Note`
--

CREATE TABLE `Note` (
  `id_film` int(11) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Note`
--

INSERT INTO `Note` (`id_film`, `id_profil`, `note`) VALUES
(7, 1, 5),
(7, 3, 8),
(17, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `Profil`
--

CREATE TABLE `Profil` (
  `id_profil` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `year` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Profil`
--

INSERT INTO `Profil` (`id_profil`, `name`, `image`, `year`) VALUES
(1, 'user 1\r\n', 'photo1.webp', '2000-12-15'),
(3, 'user3', '0.png', '2011-10-07'),
(7, 'user2', 'user4.png', '2020-10-07');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Favori`
--
ALTER TABLE `Favori`
  ADD PRIMARY KEY (`id_favori`);

--
-- Index pour la table `Movie`
--
ALTER TABLE `Movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Index pour la table `Note`
--
ALTER TABLE `Note`
  ADD PRIMARY KEY (`id_film`,`id_profil`),
  ADD KEY `id_profil` (`id_profil`);

--
-- Index pour la table `Profil`
--
ALTER TABLE `Profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `Favori`
--
ALTER TABLE `Favori`
  MODIFY `id_favori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT pour la table `Movie`
--
ALTER TABLE `Movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `Profil`
--
ALTER TABLE `Profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Movie`
--
ALTER TABLE `Movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `Category` (`id`);

--
-- Contraintes pour la table `Note`
--
ALTER TABLE `Note`
  ADD CONSTRAINT `Note_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `Movie` (`id`),
  ADD CONSTRAINT `Note_ibfk_2` FOREIGN KEY (`id_profil`) REFERENCES `Profil` (`id_profil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
