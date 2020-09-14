-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 08 sep. 2020 à 11:29
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

-- --------------------------------------------------------

--
-- Structure de la table `dp2020mns_ehpad`
--

DROP TABLE IF EXISTS `dp2020mns_ehpad`;
CREATE TABLE `dp2020mns_ehpad` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `dp2020mns_ehpad_resident`
--

DROP TABLE IF EXISTS `dp2020mns_ehpad_resident`;
CREATE TABLE `dp2020mns_ehpad_resident` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `year_of_birth` year(4) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `id_ehpad` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `dp2020mns_message`
--

DROP TABLE IF EXISTS `dp2020mns_message`;
CREATE TABLE `dp2020mns_message` (
  `id` int(11) NOT NULL,
  `id_resident` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `dp2020mns_ehpad`
--
ALTER TABLE `dp2020mns_ehpad`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dp2020mns_ehpad_resident`
--
ALTER TABLE `dp2020mns_ehpad_resident`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dp2020mns_message`
--
ALTER TABLE `dp2020mns_message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `dp2020mns_ehpad`
--
ALTER TABLE `dp2020mns_ehpad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `dp2020mns_ehpad_resident`
--
ALTER TABLE `dp2020mns_ehpad_resident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `dp2020mns_message`
--
ALTER TABLE `dp2020mns_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
