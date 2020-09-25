-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 16 sep. 2020 à 15:01
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mnosis`
--

--
-- Déchargement des données de la table `dp2020mns_ehpad`
--

INSERT INTO `dp2020mns_ehpad` (`id`, `email`, `password`, `name`, `city`) VALUES
(1, 'ehpad@ehpad.com', '$2y$10$sFTb4BXkXr2W3cTQAw8IcOT/KxzVbkHGS5DiGZTVjBSzAKZbtLwZ6', 'Mon Ehpad 2', 'Paris'),
(2, 'ehpad@ehpad2.com', '$2y$10$xEx1YUDSxDxVZBj7pHApOOjfvMkh0vbYEtYykPQQGX3phgShsIUdq', 'Mon ehpad', 'Compiègne'),
(3, 'benjamin@credable.se', '$2y$10$difeR9y1OOtdg2utwm6ShekhUky279a2mVVGricEqxj8V4RHGXO5i', 'Test', 'Paris');

--
-- Déchargement des données de la table `dp2020mns_ehpad_resident`
--

INSERT INTO `dp2020mns_ehpad_resident` (`id`, `first_name`, `last_name`, `year_of_birth`, `description`, `id_ehpad`) VALUES
(1, 'John', 'Jung', 1926, 'Il est top et sympa', 1),
(3, 'John', 'Doe', 1910, 'Il est top', 1),
(13, 'John', 'Doe', 1916, 'Il est top', 1),
(14, 'Toto', 'Toto', 1929, 'Il est beau !', 1);

--
-- Déchargement des données de la table `dp2020mns_message`
--

INSERT INTO `dp2020mns_message` (`id`, `id_resident`, `message`, `author`, `city`, `date`) VALUES
(1, 1, 'Yeahhhhh', 'Georges', NULL, '2020-09-08'),
(2, 1, 'Un super message de la mort', 'Patrick', NULL, '2020-09-08'),
(3, 1, 'Alors ca marche', 'Benjamin', NULL, '2020-09-08'),
(4, 1, 'Salut les fous', 'Roger', NULL, '2020-09-08'),
(5, 1, 'Alors oui', 'Michel', NULL, '2020-09-08'),
(6, 1, 'hello world', 'Benjamin', NULL, '2020-09-08'),
(7, 13, 'Hello les amis', 'Benjamin', NULL, '2020-09-09');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
