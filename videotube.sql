-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 26 nov. 2018 à 11:03
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `videotube`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'Programmation'),
(4, 'Droit'),
(5, 'Business'),
(6, 'Design/Graphisme'),
(7, 'Anglais'),
(8, 'Mathémathiques'),
(9, 'Audio & MAO'),
(10, 'Serveur & Réseaux'),
(12, 'Communication');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_23_103347_video_info', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'jean', 'jean@live.fr', '$2y$10$Tvt4jpTo7TtZY7jlP00fNexM6w9szdq/0.Nf/2ZQl.Nt3N9vMHIfu', 'u3Fuw8f1KFiF5cD8k6z3t34CLGNP0veAjOP7Dzg5TRFlUs8G9FSuRHgrssRc', '2018-11-23 19:52:26', '2018-11-23 19:52:26'),
(4, 'hocine', 'hocine@gmail.com', '$2y$10$daki5jWjYRFWHwgF2/7V8OrOuzzJ.ox2drGujYcF7fDlB4svOOp2e', 'RG3CeiqoLt1O2nhZTNcY0ATnNTRshNMgNVcI7NgvzRmDAxs2JmBCUM2P4Jqv', '2018-11-26 09:57:21', '2018-11-26 09:57:21');

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `duree` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `statut` enum('0','1') NOT NULL,
  `date_publication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `url_auteur` varchar(255) NOT NULL,
  `url_image` varchar(255) NOT NULL,
  `url_video` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `videos`
--

INSERT INTO `videos` (`id`, `titre`, `description`, `contenu`, `duree`, `auteur`, `statut`, `date_publication`, `url_auteur`, `url_image`, `url_video`, `category_id`, `user_id`) VALUES
(27, 'CRÉER UN BUSINESS JUTEUX DE FORMATION EN LIGNE', 'Point sur les YouTubeur-Formateurs', 'Vous avez tous déjà vu au moins une fois ce genre de spécimen... Ils se cachent dans l\'ombre... se développent lentement... dans le but de pomper votre argent... Je parle évidemment des YouTubeur-Formateurs ! \r\n\r\nAujourd\'hui, on va apprendre comment ils procèdent, afin de nous aussi, devenir riches grâce à notre savoir extraordinaire ! \r\n\r\nActivez la cloche et suivez-moi sur Twitter pour ne rater aucune vidéo :\r\n\r\nMon Twitter : https://twitter.com/un_creatif\r\nMon Facebook : https://facebook.com/1creatif\r\nMon Instagram : https://instagram.com/un_creatif\r\n', 15, 'Un Créatif', '0', '2018-11-23 23:43:38', 'https://www.youtube.com/channel/UCAiy7bY8nTQCWrkSRh6Wu9w', 'https://i.ytimg.com/vi/TCeLk-dTOWM/hqdefault.jpg', 'https://www.youtube.com/watch?v=TCeLk-dTOWM', 5, 2),
(28, 'Introduction générale au Droit - Laddoz, Droit #1', '\"Si vous avez la force, nous avons le Droit\"', 'Voici le cours d\'introduction générale au Droit, tel qu\'enseigné aux étudiants de première année de licence à l\'Université, en version courte. Cette vidéo n\'a pas la prétention de faire de vous un-e expert-e, mais de satisfaire votre curiosité et peut-être de susciter votre intérêt à l\'égard de cette matière. \r\n\r\nD\'autres cours seront bientôt à votre disposition, en Droit, en Economie, et dans d\'autres domaines. Pensez à vous abonner à cette chaîne pour être tenu au courant lors de la sortie de nouvelles vidéos !\r\n\r\nLa critique constructive est bienvenue et toute proposition de collaboration peut être adressée à contact.laddoz@gmail.com', 10, 'Laddoz', '0', '2018-11-24 00:41:14', 'https://www.youtube.com/channel/UCbP3FYDAKfWtL0vD_NxRr1w', 'https://i.ytimg.com/vi/uIxx94CuNM8/hqdefault.jpg', 'https://www.youtube.com/watch?v=uIxx94CuNM8', 4, 2),
(29, 'Droit : Les sources du droit', 'Cours netprof.fr ', 'Cours netprof.fr de Economie Droit / Bac professionnel\r\nProf : Lionel', 5, 'netprof', '0', '2018-11-24 00:42:09', 'https://www.youtube.com/user/netprof', 'https://i.ytimg.com/vi/RjfivE-pOXc/hqdefault.jpg', 'https://www.youtube.com/watch?v=RjfivE-pOXc', 4, 2),
(30, 'Les Nombres Complexes. Cours Maths Sup.', 'Cours Nombres Complexes Maths Sup Maths Spé prépa scientifique.', 'Cours accessible aussi aux prépas BCPST, prépa HEC, Terminale S de bon niveau. Avec Antoine LAMY, professeur de mathématiques à Optimal Sup Spé.\r\n', 30, 'Optimal Sup-Spé', '0', '2018-11-24 00:42:50', 'https://www.youtube.com/channel/UC5mRzz6QWQCAYa9wcfR2c-g', 'https://i.ytimg.com/vi/vOLZ8wLWIbY/hqdefault.jpg', 'https://www.youtube.com/watch?v=vOLZ8wLWIbY', 8, 2),
(31, 'Cours de mathématiques : les puissances', 'cours de troisième', 'Cette vidéo est un cours de troisème qui porte sur les puissances, il est présenté par Tifany, professeur à domicile. ', 10, 'digiSchool', '0', '2018-11-24 00:43:39', 'https://www.youtube.com/user/MediaEtudiant', 'https://i.ytimg.com/vi/lLdfosAMfKA/hqdefault.jpg', 'https://www.youtube.com/watch?v=lLdfosAMfKA', 8, 2),
(32, 'Espaces vectoriels. Cours math sup, math spé, BCPST.', 'Espaces vectoriels ', 'Suivez un cours d\'algèbre linéaire avec Antoine LAMY, professeur à Optimal Sup Spé.', 45, 'Optimal Sup-Spé', '0', '2018-11-24 00:45:32', 'https://www.youtube.com/channel/UC5mRzz6QWQCAYa9wcfR2c-g', 'https://i.ytimg.com/vi/hJnbt2Cu1Es/hqdefault.jpg', 'https://www.youtube.com/watch?v=hJnbt2Cu1Es', 8, 2),
(33, 'Cours: Limite d\'une fonction par le calcul - Partie 1', ' mathématiques -  terminale S - limite de fonction par le calcul', 'L\'objectif:\r\n- Comprendre les formes indéterminées et les reconnaitre\r\n- Savoir traiter les formes k/O', 17, 'jaicompris Maths', '0', '2018-11-24 00:46:12', 'https://www.youtube.com/channel/UCo-O74A4qVz6nq5cfCIee6w', 'https://i.ytimg.com/vi/gVEBic26dVk/hqdefault.jpg', 'https://www.youtube.com/watch?v=gVEBic26dVk', 8, 2),
(34, 'Cours Complet HTML CSS - Tutoriel pour Débutants et Confirmés [Partie 1/3]', 'Cours Complet HTML CSS', 'Cette partie contient les chapitres 1, 2 et 3 de mon cours complet sur le HTML et le CSS. ', 60, 'Pierre Giraud', '0', '2018-11-24 00:47:19', 'https://www.youtube.com/channel/UCsFoQ4A9CZbF3qag317uZZQ', 'https://i.ytimg.com/vi/8FqZZrbnwkM/hqdefault.jpg', 'https://www.youtube.com/watch?v=8FqZZrbnwkM', 3, 2),
(35, 'Les Bases de la Programmation | Comment créer un Programme informatique ?', 'les bases de la programmation', 'Apprendre la programmation peut paraître compliqué tellement il y a de langages (le C, le java, le javascript, le Php, le python, ...) et de possibilité (programmer des applications, des logiciels, faire du développement web). Pourtant ce ne sont que des différences de forme et sur le fond la programmation c\'est unique et concret.\r\n', 15, 'Théorisons', '0', '2018-11-24 00:48:07', 'https://www.youtube.com/channel/UC4LX7RTDT457T2-d7aN_spg', 'https://i.ytimg.com/vi/lMDk--FtC8I/hqdefault.jpg', 'https://www.youtube.com/watch?v=lMDk--FtC8I', 3, 2),
(36, 'APPRENDRE LE PYTHON #1 ? LES BASES & PREREQUIS', 'apprentissage du langage python', 'Aujourd\'hui , on se retrouve pour le 1er épisode de cette nouvelle série sur l’apprentissage du langage python ! ', 10, 'Graven - Développement', '0', '2018-11-24 00:49:10', 'https://www.youtube.com/user/Gravenilvectuto', 'https://i.ytimg.com/vi/psaDHhZ0cPs/hqdefault.jpg', 'https://www.youtube.com/watch?v=psaDHhZ0cPs', 3, 2),
(37, 'Cours réseaux - 1 (protocole, réseau, internet, adresse ip, ifconfig)', 'Je n\'ai pas de publicité :-)', 'Merci de soutenir mon travail sur : https://www.patreon.com/justumen', 15, 'Bjornulf Frode', '0', '2018-11-24 00:50:42', 'https://www.youtube.com/user/bjornulf2011', 'https://i.ytimg.com/vi/6et7DkVUrSU/hqdefault.jpg', 'https://www.youtube.com/watch?v=6et7DkVUrSU', 10, 2),
(38, 'Qu\'est-ce qu\'une stratégie de communication ? (cours 8)', 'Un tutoriel sur les notions de cibles de marque et de  stratégie de communication.', 'Un sujet très largement abordé avec de nombreuses applications sur http://www.cours-de-marketing.com', 3, 'cours-de-marketing.com', '0', '2018-11-24 00:53:38', 'https://www.youtube.com/channel/UCjWRDsM6mqGJsWKIpz6ibMQ', 'https://i.ytimg.com/vi/kFRjiAnRe5s/hqdefault.jpg', 'https://www.youtube.com/watch?v=kFRjiAnRe5s', 12, 2),
(39, '#3 Les techniques de communication', 'techniques de com', 'Ecoute active\r\nLe questionnement\r\nQuestions ouvertes\r\nQuestions fermées\r\nQuestions alternatives\r\nReformulation', 10, 'Quaranta Academy', '0', '2018-11-24 00:54:18', 'https://www.youtube.com/channel/UCsfZLCH2QYio_0Tw9nhbJgA', 'https://i.ytimg.com/vi/sCR3MfjD970/hqdefault.jpg', 'https://www.youtube.com/watch?v=sCR3MfjD970', 12, 2),
(40, 'Cours de MAO : Quelle carte son choisir?', 'Vous voulez vous lancer dans la MAO ? Pour ça il vous faut une carte son !', 'Dans ce cours nous vous aiderons à choisir la bonne carte son qui vous conviendra. On parlera des entrées et sorties que vous pourrez retrouver dessus, comment définir précisément vos besoins, les options intéressantes à surveiller etc... ', 20, 'Tabs4acoustic - Cours de guitare gratuits', '0', '2018-11-24 00:55:09', 'https://www.youtube.com/user/Tabs4Acousticcom', 'https://i.ytimg.com/vi/Dbr65LVGBE4/hqdefault.jpg', 'https://www.youtube.com/watch?v=Dbr65LVGBE4', 9, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
