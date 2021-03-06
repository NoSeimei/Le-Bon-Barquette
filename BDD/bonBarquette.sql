-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 29 nov. 2020 à 18:50
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`Id_Admin`, `userAdmin`, `pass`) VALUES
(1, 'admin', 'admin'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Structure de la table `boisson`
--

DROP TABLE IF EXISTS `boisson`;
CREATE TABLE IF NOT EXISTS `boisson` (
  `Id_Boisson` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prix_Boisson` decimal(15,2) DEFAULT NULL,
  `Deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id_Boisson`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `boisson`
--

INSERT INTO `boisson` (`Id_Boisson`, `Nom`, `Description`, `Prix_Boisson`, `Deleted`) VALUES
(1, 'eau plate', 'provenant de la source de champs fleury', '24.99', 0),
(2, 'coca-cola', 'bouteille 2L', '9.99', 0),
(3, 'coca-cola', 'bouteille 1L', '9.98', 0),
(4, 'coca-cola', 'bouteille 0.5L', '3.99', 0),
(5, 'shwepps agrum', 'bouteille 0.5L', '2.99', 0),
(6, 'shwepps coco', 'bouteille 0.5L', '2.99', 0),
(7, 'shwepps tonic', 'bouteille 0.5L', '2.99', 0),
(8, 'fanta passion', 'bouteille 0.5L', '2.99', 0),
(9, 'fanta original', 'bouteille 0.5L', '2.99', 0),
(10, 'desperado original', 'bouteille 0.5L', '5.99', 0),
(11, 'desperado red', 'bouteille 0.5L', '6.99', 0),
(12, '86', 'bouteille 0.33L', '3.99', 0);

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
  `Deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id_Client`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`Id_Client`, `Nom`, `Prenom`, `Telephone`, `Email`, `Identifiant`, `Password`, `Deleted`) VALUES
(3, 'test', 'test', '05651', 'ssfsf@dsfs.fr', 'test', '098f6bcd4621d373cade4e832627b4f6', 0);

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
  `Deleted` tinyint(1) NOT NULL,
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
  `Nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prix_Dessert` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id_Dessert`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `dessert`
--

INSERT INTO `dessert` (`Id_Dessert`, `Nom`, `Description`, `Prix_Dessert`, `Deleted`) VALUES
(1, 'Ramequins fondants au chocolat', 'fondant chocolat moelleux', '12.08', 0),
(2, 'tiramisu', 'Il existe de nombreuses recettes de tiramisu. Celle-ci est la recette originale', '14.12', 0),
(3, 'Tarte aux pommes à l\'Alsacienne', 'nos régions ont du talent', '4.12', 0),
(4, 'gateau patate', 'au bonnes patate du jardin', '7.12', 0),
(5, 'gateau manioc', 'au bon manioc de cilaos', '7.12', 0),
(6, 'bonbon bananes', '10 bonbons aux bananes de saint andré', '5.90', 0);

-- --------------------------------------------------------

--
-- Structure de la table `entree`
--

DROP TABLE IF EXISTS `entree`;
CREATE TABLE IF NOT EXISTS `entree` (
  `Id_Entree` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prix_Entree` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id_Entree`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `entree`
--

INSERT INTO `entree` (`Id_Entree`, `Nom`, `Description`, `Prix_Entree`, `Deleted`) VALUES
(1, 'salade museaux', 'pur porcs', '4.98', 0),
(2, 'salade russe', 'légume de la cours', '4.90', 0),
(3, 'salade poulet curry', 'poulet curry sur un lit de salade de choux et carotte vinaigrée', '8.90', 0);

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `Id_Menu` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prix` decimal(15,2) DEFAULT NULL,
  `Deleted` tinyint(1) NOT NULL,
  `Id_Entree` int(11) NOT NULL,
  `Id_Plat` int(11) NOT NULL,
  `Id_Dessert` int(11) NOT NULL,
  `Id_Boisson` int(11) NOT NULL,
  PRIMARY KEY (`Id_Menu`),
  KEY `Id_Entree` (`Id_Entree`),
  KEY `Id_Plat` (`Id_Plat`),
  KEY `Id_Dessert` (`Id_Dessert`),
  KEY `Id_Boisson` (`Id_Boisson`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `menus`
--

INSERT INTO `menus` (`Id_Menu`, `Nom`, `Description`, `Prix`, `Deleted`, `Id_Entree`, `Id_Plat`, `Id_Dessert`, `Id_Boisson`) VALUES
(12, 'menu20', 'non2', '56.60', 1, 4, 4, 1, 1),
(11, 'Menu d\'hiver', 'Chaud', '31.90', 0, 1, 1, 1, 1),
(10, 'Menu complet', 'Spécialité du chef', '50.00', 0, 1, 1, 1, 1);

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
-- Doublure de structure pour la vue `menu_complet`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `menu_complet`;
CREATE TABLE IF NOT EXISTS `menu_complet` (
`Id_Menu` int(11)
,`Nom` varchar(255)
,`description` varchar(255)
,`prix` decimal(15,2)
,`entree` varchar(255)
,`plat` varchar(255)
,`dessert` varchar(255)
,`boisson` varchar(255)
);

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
  `Nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prix_Plat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id_Plat`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`Id_Plat`, `Nom`, `Description`, `Prix_Plat`, `Deleted`) VALUES
(1, 'salade museaux', 'pur porc', '4.90', 0),
(2, 'civet zouritte', 'au bon vin de cilaos', '8.99', 0),
(3, 'civet canards', 'au vin royal', '8.90', 0),
(4, 'coq massalé', 'au massalé fait maison', '8.99', 0),
(5, 'cabris massalé', 'cabris de la cours au massalé fait maison', '8.99', 0),
(6, 'boeuf carotte', 'façon grand mère', '8.99', 0);

-- --------------------------------------------------------

--
-- Structure de la vue `menu_complet`
--
DROP TABLE IF EXISTS `menu_complet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `menu_complet`  AS  select `menus`.`Id_Menu` AS `Id_Menu`,`menus`.`Nom` AS `Nom`,`menus`.`Description` AS `description`,`menus`.`Prix` AS `prix`,`entree`.`Nom` AS `entree`,`plats`.`Nom` AS `plat`,`dessert`.`Nom` AS `dessert`,`boisson`.`Nom` AS `boisson` from ((((`menus` join `entree` on(`menus`.`Id_Entree` = `entree`.`Id_Entree`)) join `plats` on(`menus`.`Id_Plat` = `plats`.`Id_Plat`)) join `dessert` on(`menus`.`Id_Dessert` = `dessert`.`Id_Dessert`)) join `boisson` on(`menus`.`Id_Boisson` = `boisson`.`Id_Boisson`)) where `menus`.`Deleted` = 0 ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
