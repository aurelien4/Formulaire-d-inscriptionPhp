-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 21 Octobre 2016 à 09:11
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `simplon`
--

-- --------------------------------------------------------

--
-- Structure de la table `formulaire`
--

CREATE TABLE `formulaire` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `condition_accepte` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formulaire`
--

INSERT INTO `formulaire` (`ID`, `email`, `password`, `condition_accepte`, `date_inscription`) VALUES
(9, 'akimitchi@hotmail.fr', '09f025a1316cfc6ca76f9dc313627f4d', '1', '2016-10-20 15:58:59'),
(8, 'TOTO@gmail.com', 'f71dbe52628a3f83a77ab494817525c6', '', '2016-10-19 17:35:55'),
(7, 'aurelmoreau@outlook.fr', '9ee75f4ece29c969def687a9c0e1caf7', '1', '2016-10-19 11:40:33');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `formulaire`
--
ALTER TABLE `formulaire`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `formulaire`
--
ALTER TABLE `formulaire`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
