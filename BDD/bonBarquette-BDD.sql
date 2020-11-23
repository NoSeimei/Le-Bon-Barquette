-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 23 nov. 2020 à 05:02
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bonbarquette`
--
CREATE DATABASE IF NOT EXISTS `bonbarquette` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bonbarquette`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Id_Admin` int(11) NOT NULL AUTO_INCREMENT,
  `userAdmin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `boisson`
--

DROP TABLE IF EXISTS `boisson`;
CREATE TABLE IF NOT EXISTS `boisson` (
  `Id_Boisson` int(11) NOT NULL AUTO_INCREMENT,
  `Image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prix_Boisson` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`Id_Boisson`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `Id_Client` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Identifiant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `Id_Commande` int(11) NOT NULL AUTO_INCREMENT,
  `dateCommande` date DEFAULT NULL,
  `PrixCommande` decimal(15,2) DEFAULT NULL,
  `Id_Client` int(11) NOT NULL,
  PRIMARY KEY (`Id_Commande`),
  KEY `Id_Client` (`Id_Client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dessert`
--

DROP TABLE IF EXISTS `dessert`;
CREATE TABLE IF NOT EXISTS `dessert` (
  `Id_Dessert` int(11) NOT NULL AUTO_INCREMENT,
  `Image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prix_Dessert` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Dessert`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entree`
--

DROP TABLE IF EXISTS `entree`;
CREATE TABLE IF NOT EXISTS `entree` (
  `Id_Entree` int(11) NOT NULL AUTO_INCREMENT,
  `Image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prix_Entree` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Entree`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `Id_Menu` int(11) NOT NULL AUTO_INCREMENT,
  `Image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prix` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`Id_Menu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menu_boisson`
--

DROP TABLE IF EXISTS `menu_boisson`;
CREATE TABLE IF NOT EXISTS `menu_boisson` (
  `Id_Menu` int(11) NOT NULL,
  `Id_Boisson` int(11) NOT NULL,
  PRIMARY KEY (`Id_Menu`,`Id_Boisson`),
  KEY `Id_Boisson` (`Id_Boisson`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menu_dessert`
--

DROP TABLE IF EXISTS `menu_dessert`;
CREATE TABLE IF NOT EXISTS `menu_dessert` (
  `Id_Menu` int(11) NOT NULL,
  `Id_Dessert` int(11) NOT NULL,
  PRIMARY KEY (`Id_Menu`,`Id_Dessert`),
  KEY `Id_Dessert` (`Id_Dessert`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menu_entree`
--

DROP TABLE IF EXISTS `menu_entree`;
CREATE TABLE IF NOT EXISTS `menu_entree` (
  `Id_Entree` int(11) NOT NULL,
  `Id_Menu` int(11) NOT NULL,
  PRIMARY KEY (`Id_Entree`,`Id_Menu`),
  KEY `Id_Menu` (`Id_Menu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menu_plat`
--

DROP TABLE IF EXISTS `menu_plat`;
CREATE TABLE IF NOT EXISTS `menu_plat` (
  `Id_Menu` int(11) NOT NULL,
  `Id_Plat` int(11) NOT NULL,
  PRIMARY KEY (`Id_Menu`,`Id_Plat`),
  KEY `Id_Plat` (`Id_Plat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `passer_commande`
--

DROP TABLE IF EXISTS `passer_commande`;
CREATE TABLE IF NOT EXISTS `passer_commande` (
  `Id_Commande` int(11) NOT NULL,
  `Id_Menu` int(11) NOT NULL,
  `Quantitee` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Commande`,`Id_Menu`),
  KEY `Id_Menu` (`Id_Menu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `passe_boisson`
--

DROP TABLE IF EXISTS `passe_boisson`;
CREATE TABLE IF NOT EXISTS `passe_boisson` (
  `Id_Commande` int(11) NOT NULL,
  `Id_Boisson` int(11) NOT NULL,
  `Quantitee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Commande`,`Id_Boisson`),
  KEY `Id_Boisson` (`Id_Boisson`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `passe_dessert`
--

DROP TABLE IF EXISTS `passe_dessert`;
CREATE TABLE IF NOT EXISTS `passe_dessert` (
  `Id_Commande` int(11) NOT NULL,
  `Id_Dessert` int(11) NOT NULL,
  `Quantitee` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Commande`,`Id_Dessert`),
  KEY `Id_Dessert` (`Id_Dessert`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `passe_entree`
--

DROP TABLE IF EXISTS `passe_entree`;
CREATE TABLE IF NOT EXISTS `passe_entree` (
  `Id_Entree` int(11) NOT NULL,
  `Id_Commande` int(11) NOT NULL,
  `Quantitee` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Entree`,`Id_Commande`),
  KEY `Id_Commande` (`Id_Commande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `passe_plat`
--

DROP TABLE IF EXISTS `passe_plat`;
CREATE TABLE IF NOT EXISTS `passe_plat` (
  `Id_Commande` int(11) NOT NULL,
  `Id_Plat` int(11) NOT NULL,
  `Quantitee` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Commande`,`Id_Plat`),
  KEY `Id_Plat` (`Id_Plat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

DROP TABLE IF EXISTS `plats`;
CREATE TABLE IF NOT EXISTS `plats` (
  `Id_Plat` int(11) NOT NULL AUTO_INCREMENT,
  `Image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prix_Plat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Plat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;