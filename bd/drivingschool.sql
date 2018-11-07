-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 03 oct. 2017 à 07:06
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-05:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `drivingschool`
--

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone`, `created`, `modified`, `user_id`) VALUES
(23, 'Salim', 'Feghali', 'salim@hotmail.com', '343-333-3333', '2017-09-29 00:42:26', '2017-09-29 00:42:26', 3),
(22, 'Remi', 'Graton', 'remig@hotmail.com', '450-968-9875', '2017-09-29 00:41:14', '2017-09-29 00:41:14', 2),
(21, 'Pravith', 'Vongphachanh', 'pravithv@hotmail.com', '514-893-8934', '2017-09-29 00:40:11', '2017-09-29 00:40:11', 2),
(24, 'Etienne', 'Audet Cobello', 'etienne@gmail.com', '514-555-6666', '2017-09-29 00:42:52', '2017-09-29 00:42:52', 3);

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive',
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`, `user_id`) VALUES
(1, 'derapage.jpg', 'Files/', '2017-10-02 22:36:05', '2017-10-02 22:36:05', 1, 5),
(2, 'driving.jpg', 'Files/', '2017-10-02 22:36:42', '2017-10-02 22:36:42', 1, 3),
(3, 'roadsigns.jpg', 'Files/', '2017-10-02 22:37:59', '2017-10-02 22:37:59', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) NOT NULL,
  `model` varchar(100) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(100) NOT NULL,
  `content` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(1, 'fr_CA', 'Lessons', 13, 'title', 'Cours de conduite pratique'),
(2, 'fr_CA', 'Lessons', 13, 'description', 'Ce cours vous permet d\'apprendre a conduire un vehicule de classe 5 promenade'),
(3, 'fr_CA', 'Lessons', 13, 'price', '50$/cours'),
(4, 'fr_CA', 'Lessons', 15, 'title', 'Panneau de circulation'),
(5, 'fr_CA', 'Lessons', 15, 'description', 'Ce cours vous apprend sur les panneaux de circulation et leur signification'),
(6, 'fr_CA', 'Lessons', 15, 'price', ''),
(7, 'fr_CA', 'Lessons', 16, 'title', 'Dérapage hiver'),
(8, 'fr_CA', 'Lessons', 16, 'description', 'Ce cours permet de pratiquer et savoir comment contrôler un véhicule lors dérapage sur glace'),
(9, 'fr_CA', 'Lessons', 16, 'price', '75$');

-- --------------------------------------------------------

--
-- Structure de la table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `price` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lessons`
--

INSERT INTO `lessons` (`id`, `user_id`, `title`, `description`, `price`, `created`, `modified`) VALUES
(15, 3, 'Road sign', 'This lesson will teach you about road sign and theur meaning', '20$', '2017-10-03 00:50:08', '2017-10-03 01:03:02'),
(13, 5, 'Driving practice', 'This lesson will teach you how to drice and practice a class 5 car', '50$/lesson', '2017-10-03 00:20:11', '2017-10-03 00:20:57'),
(16, 4, 'Slip road', 'This lesson will teach you how to control your car when slipping on ice during winter', '75$', '2017-10-03 03:01:20', '2017-10-03 03:03:37');

-- --------------------------------------------------------

--
-- Structure de la table `lessons_files`
--

CREATE TABLE `lessons_files` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `lessons_files`
--

INSERT INTO `lessons_files` (`id`, `lesson_id`, `file_id`) VALUES
(1, 7, 1),
(2, 8, 2),
(5, 10, 2),
(6, 13, 2),
(8, 15, 3),
(9, 16, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lessons_vehicules`
--

CREATE TABLE `lessons_vehicules` (
  `lesson_id` int(11) NOT NULL,
  `vehicule_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lessons_vehicules`
--

INSERT INTO `lessons_vehicules` (`lesson_id`, `vehicule_id`) VALUES
(7, 7),
(10, 7),
(13, 7),
(16, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `created`, `modified`) VALUES
(1, 'Benoit', 'Hart', 'benoit.hart@admin.com', '$2y$10$F5gi0c.KSj.lu6S0leEAc.Yw/gC.pzt/Fw2shCjHyHchsNX2Q8kzm', NULL, '2017-10-01 04:32:25', '2017-10-01 04:32:25'),
(5, 'Benoit', 'Hart', 'admin@admin.com', '$2y$10$5xgqSzSz.4OIDMAVbqMsp.L66/r6rZkq1.8UrVKe.3eOCYvMoWnEK', 'admin', '2017-10-02 21:31:19', '2017-10-02 21:31:19'),
(3, 'Martin', 'Desgroseillers', 'staff1@staff.com', '$2y$10$k2H6zRhkCK.lLOTy8SdNw.VMhHvLvAJIISGVZBDas.YQGAlQMydMC', 'employee', '2017-10-02 21:08:51', '2017-10-02 21:08:51'),
(4, 'Manokith', 'Savejvong', 'staff2@staff.com', '$2y$10$EJvnsE4DUwrXMOXDq7DHR.ZkM58GPAWQUsdbPV7hRThxXIQhdUlCy', 'employee', '2017-10-02 21:09:28', '2017-10-02 21:09:28');

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` int(11) NOT NULL,
  `make` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `plate` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id`, `make`, `model`, `plate`, `created`, `modified`, `user_id`) VALUES
(7, 'Mazda', '3 Hatchback', 'E77 897', '2017-10-02 19:24:09', '2017-10-02 19:24:09', NULL),
(2, 'Toyota', 'yaris', 'R78 H87', '2017-10-01 04:34:22', '2017-10-01 04:34:22', NULL),
(3, 'Nissan', 'Versa', 'T69 HG6', '2017-10-01 04:35:56', '2017-10-01 04:35:56', NULL),
(4, 'Honda', 'Fit', 'HF7 HUO', '2017-10-01 04:36:24', '2017-10-01 04:36:24', NULL),
(5, 'Hyundai', 'Accent', 'HG6 D45', '2017-10-01 04:37:43', '2017-10-01 04:37:43', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Index pour la table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `lessons_files`
--
ALTER TABLE `lessons_files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lessons_vehicules`
--
ALTER TABLE `lessons_vehicules`
  ADD PRIMARY KEY (`lesson_id`,`vehicule_id`),
  ADD KEY `vehicule_key` (`vehicule_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `make` (`make`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `lessons_files`
--
ALTER TABLE `lessons_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
