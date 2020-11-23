-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 23 nov. 2020 à 07:34
-- Version du serveur :  5.7.26
-- Version de PHP :  7.1.29

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
  `Image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prix_Boisson` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`Id_Boisson`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `boisson`
--

INSERT INTO `boisson` (`Id_Boisson`, `Image`, `Nom`, `Description`, `Prix_Boisson`) VALUES
(1, '', 'eau plate', 'provenant de la source de champs fleury', '24.99'),
(2, '', 'coca-cola', 'bouteille 2L', '9.99'),
(3, '', 'coca-cola', 'bouteille 1L', '9.98'),
(4, '', 'coca-cola', 'bouteille 0.5L', '3.99'),
(5, '', 'shwepps agrum', 'bouteille 0.5L', '2.99'),
(6, '', 'shwepps coco', 'bouteille 0.5L', '2.99'),
(7, '', 'shwepps tonic', 'bouteille 0.5L', '2.99'),
(8, '', 'fanta passion', 'bouteille 0.5L', '2.99'),
(9, '', 'fanta original', 'bouteille 0.5L', '2.99'),
(10, '', 'desperado original', 'bouteille 0.5L', '5.99'),
(11, '', 'desperado red', 'bouteille 0.5L', '6.99'),
(12, '', 'dodo', 'bouteille 0.33L', '3.99');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`Id_Client`, `Nom`, `Prenom`, `Telephone`, `Email`, `Identifiant`, `Password`) VALUES
(1, 'payet', 'monsieur', '0692345678', 'monsieur.payet@barquette.re', 'mPayet', 'df91f42cda8b1946a1dfaafdd2207c8b');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `dessert`
--

INSERT INTO `dessert` (`Id_Dessert`, `Image`, `Nom`, `Description`, `Prix_Dessert`) VALUES
(1, '', 'Ramequins fondants au chocolat', 'fondant chocolat moelleux', '12.08'),
(2, '', 'tiramisu', 'Il existe de nombreuses recettes de tiramisu. Celle-ci est la recette originale', '14.12'),
(3, '', 'Tarte aux pommes à l\'Alsacienne', 'nos régions ont du talent', '4.12'),
(4, '', 'gateau patate', 'au bonnes patate du jardin', '7.12'),
(5, '', 'gateau manioc', 'au bon manioc de cilaos', '7.12'),
(6, '', 'bonbon bananes', '10 bonbons aux bananes de saint andré', '5.90');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `entree`
--

INSERT INTO `entree` (`Id_Entree`, `Image`, `Nom`, `Description`, `Prix_Entree`) VALUES
(1, '', 'salade museau', 'pur porc', '4.90'),
(2, '', 'salade russe', 'légume de la cours', '4.90'),
(3, '', 'salade poulet curry', 'poulet curry sur un lit de salade de choux et carotte vinaigrée', '8.90');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`Id_Plat`, `Image`, `Nom`, `Description`, `Prix_Plat`) VALUES
(1, '', 'carry poulet', 'façon grand-mère', '8.99'),
(2, '', 'civet zouritte', 'au bon vin de cilaos', '8.99'),
(3, '', 'civet canard', 'au vin royal', '8.99'),
(4, '', 'coq massalé', 'au massalé fait maison', '8.99'),
(5, '', 'cabris massalé', 'cabris de la cours au massalé fait maison', '8.99'),
(6, '', 'boeuf carotte', 'façon grand mère', '8.99');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
