-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 16 août 2021 à 19:27
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bonbarquette`
--
CREATE DATABASE IF NOT EXISTS `bonbarquette` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bonbarquette`;

-- --------------------------------------------------------

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `creat_stat`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `creat_stat` (IN `date` DATE)  NO SQL
BEGIN
DECLARE hist_ca_ttc decimal(10,4) ;
DECLARE hist_ca_ht decimal(10,4) ;
DECLARE hist_nb_com int ;
DECLARE hist_quant_tot int ;
DECLARE hist_quant_boiss int ;
DECLARE hist_quant_dessert int ;
DECLARE hist_quant_plat int ;
DECLARE hist_quant_entree int ;
DECLARE hist_ca_boiss decimal(10,4) ;
DECLARE hist_ca_dessert decimal(10,4) ;
DECLARE hist_ca_plat decimal(10,4) ;
DECLARE hist_ca_entree decimal(10,4) ;
DECLARE hist_percent_ca_boiss decimal(10,4) ;
DECLARE hist_percent_ca_dessert decimal(10,4) ;
DECLARE hist_percent_ca_plat decimal(10,4) ;
DECLARE hist_percent_ca_entree decimal(10,4) ;
/*DECLARE hist_date_stat date ;*/
DECLARE hist_date_add date ;

/*SELECT * FROM `passer_commande` WHERE Date_Achat like CONCAT(date,'%')!*/

SELECT SQL_CALC_FOUND_ROWS count(*) FROM `passer_commande` WHERE Date_Achat LIKE CONCAT(date,'%') GROUP BY Num_Commande;

SET hist_nb_com = (SELECT FOUND_ROWS( )) ;

SELECT hist_nb_com AS 'NombreCom';
SET hist_ca_ttc = (SELECT SUM(Prix) FROM `passer_commande` WHERE Date_Achat LIKE CONCAT(date,'%'));

SET hist_ca_ht = null;

SET hist_ca_boiss = (SELECT SUM(Prix) FROM `passer_commande` WHERE Date_Achat LIKE CONCAT(date,'%') AND Id_Boisson > 0) ;

SET hist_ca_dessert =(SELECT SUM(Prix) FROM `passer_commande` WHERE Date_Achat LIKE CONCAT(date,'%') AND Id_Dessert > 0)  ;

SET hist_ca_plat = (SELECT SUM(Prix) FROM `passer_commande` WHERE Date_Achat LIKE CONCAT(date,'%') AND Id_Plat > 0);

SET hist_ca_entree = (SELECT SUM(Prix) FROM `passer_commande` WHERE Date_Achat LIKE CONCAT(date,'%') AND Id_Entree > 0);

SET hist_quant_tot = (SELECT COUNT(*) FROM passer_commande WHERE Date_Achat LIKE CONCAT(date,'%') ) ;

 
SET hist_quant_boiss = (SELECT COUNT(*) FROM `passer_commande` WHERE Date_Achat LIKE CONCAT(date,'%') AND Id_Boisson > 0);

SET hist_quant_dessert = (SELECT COUNT(*) FROM `passer_commande` WHERE Date_Achat LIKE CONCAT(date,'%') AND Id_Entree > 0);

SET hist_quant_plat = (SELECT COUNT(*) FROM `passer_commande` WHERE Date_Achat LIKE CONCAT(date,'%') AND Id_Plat > 0);

SET hist_quant_entree = (SELECT COUNT(*) FROM `passer_commande` WHERE Date_Achat LIKE CONCAT(date,'%') AND Id_Entree > 0);

 SET hist_percent_ca_plat=(hist_ca_plat/hist_ca_ttc);
 SET hist_percent_ca_boiss=(hist_ca_boiss/hist_ca_ttc);
 SET hist_percent_ca_dessert=(hist_ca_dessert/hist_ca_ttc);
 SET hist_percent_ca_entree=(hist_ca_entree/hist_ca_ttc);
 
 INSERT INTO `stat_hist`(
     `ca_ttc`,
     `ca_ht`, `nb_com`,
      `quant_tot`, `quant_boiss`,
       `quant_dessert`, `quant_plat`,
        `quant_entree`, `ca_boiss`,
         `ca_dessert`, `ca_plat`,
          `ca_entree`, `percent_ca_boiss`,
           `percent_ca_dessert`, `percent_ca_plat`,
            `percent_ca_entree`, `date_stat`,
             `date_add`) 
             VALUES 
(
    hist_ca_ttc,
    null,hist_nb_com,
    hist_quant_tot,hist_quant_boiss,
    hist_quant_dessert,hist_quant_plat,
    hist_quant_entree,hist_ca_boiss,
    hist_ca_dessert,hist_ca_plat,
    hist_ca_entree,hist_percent_ca_boiss,
    hist_percent_ca_dessert,hist_percent_ca_plat,
    hist_percent_ca_entree,date,
    NOW());

 END$$

DELIMITER ;

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
-- Structure de la table `all_aliments_historique`
--

DROP TABLE IF EXISTS `all_aliments_historique`;
CREATE TABLE IF NOT EXISTS `all_aliments_historique` (
  `Id_Aliment` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prix` decimal(15,2) DEFAULT NULL,
  `Id_Entree` int(11) DEFAULT NULL,
  `Id_Plat` int(11) DEFAULT NULL,
  `Id_Dessert` int(11) DEFAULT NULL,
  `Id_Boisson` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Aliment`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `all_aliments_historique`
--

INSERT INTO `all_aliments_historique` (`Id_Aliment`, `Nom`, `Description`, `Prix`, `Id_Entree`, `Id_Plat`, `Id_Dessert`, `Id_Boisson`) VALUES
(16, 'boeuf carotte', 'façon grand mère', '8.99', 0, 6, 0, 0);

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
  PRIMARY KEY (`Id_Boisson`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `boisson`
--

INSERT INTO `boisson` (`Id_Boisson`, `Nom`, `Description`, `Prix_Boisson`) VALUES
(1, 'eau plate', 'provenant de la source de champs fleury', '24.99'),
(2, 'coca-cola', 'bouteille 2L', '9.99'),
(3, 'coca-cola', 'bouteille 1L', '9.98'),
(4, 'coca-cola', 'bouteille 0.5L', '3.99'),
(5, 'shwepps agrum', 'bouteille 0.5L', '2.99'),
(6, 'shwepps coco', 'bouteille 0.5L', '2.99'),
(7, 'shwepps tonic', 'bouteille 0.5L', '2.99'),
(8, 'fanta passion', 'bouteille 0.5L', '2.99'),
(9, 'fanta original', 'bouteille 0.5L', '2.99'),
(10, 'desperado original', 'bouteille 0.5L', '5.99'),
(11, 'desperado red', 'bouteille 0.5L', '6.99'),
(12, '86', 'bouteille 0.33L', '3.99');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`Id_Client`, `Nom`, `Prenom`, `Telephone`, `Email`, `Identifiant`, `Password`) VALUES
(3, 'test', 'test', '05651', 'ssfsf@dsfs.fr', 'test', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `Id_Commande` int(11) NOT NULL AUTO_INCREMENT,
  `Num_Commande` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Id_Menu` int(11) DEFAULT NULL,
  `Id_Client` int(11) NOT NULL,
  `Id_Entree` int(11) DEFAULT NULL,
  `Id_Plat` int(11) DEFAULT NULL,
  `Id_Dessert` int(11) DEFAULT NULL,
  `Id_Boisson` int(11) DEFAULT NULL,
  `Date_Achat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Prix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Date_Update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Etat` int(1) NOT NULL,
  `Quantitee` int(11) NOT NULL,
  PRIMARY KEY (`Id_Commande`) USING BTREE,
  KEY `Id_Menu` (`Id_Menu`),
  KEY `Id_Client` (`Id_Client`),
  KEY `Id_Entree` (`Id_Entree`),
  KEY `Id_Plat` (`Id_Plat`),
  KEY `Id_Dessert` (`Id_Dessert`),
  KEY `Id_Boisson` (`Id_Boisson`)
) ENGINE=MyISAM AUTO_INCREMENT=148 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`Id_Commande`, `Num_Commande`, `Id_Menu`, `Id_Client`, `Id_Entree`, `Id_Plat`, `Id_Dessert`, `Id_Boisson`, `Date_Achat`, `Prix`, `Date_Update`, `Etat`, `Quantitee`) VALUES
(147, '564fg5dfg', 11, 3, NULL, NULL, NULL, NULL, '2021-07-12 00:00:00', '12', '2021-07-12 00:00:00', 1, 17);

--
-- Déclencheurs `commande`
--
DROP TRIGGER IF EXISTS `Triggerz_Notification`;
DELIMITER $$
CREATE TRIGGER `Triggerz_Notification` AFTER INSERT ON `commande` FOR EACH ROW INSERT INTO notification (`Type_Notification`, `Id_Client`, `Id_Commande`, `Id_Entree`, `Id_Plat`, `Id_Dessert`, `Id_Boisson`) VALUES ( 1, NEW.Id_Client, NEW.Id_Commande, NEW.Id_Entree, NEW.Id_Plat, NEW.Id_Dessert, NEW.Id_Boisson)
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `save_hist_Commande2`;
DELIMITER $$
CREATE TRIGGER `save_hist_Commande2` AFTER UPDATE ON `commande` FOR EACH ROW begin
if (new.Etat = 1) || (new.Etat = 4)
Then
insert into historique_commande( `Hist_Num_Commande`, `Hist_Id_Menu`, `Hist_Id_Client`, `Hist_Id_Entree`, `Hist_Id_Plat`, `Hist_Id_Dessert`, `Hist_Id_Boisson`, `Hist_Date`, `Hist_Prix`, `Hist_Etat`, `Hist_Quantitee`) values (new.Num_Commande, new.Id_Menu, new.Id_Client, new.Id_Entree, new.Id_Plat, new.Id_Dessert, new.Id_Boisson, new.Date_Update, new.Prix, new.Etat, new.Quantitee);
end if; 	
end
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `save_hist_commande`;
DELIMITER $$
CREATE TRIGGER `save_hist_commande` AFTER INSERT ON `commande` FOR EACH ROW begin
insert into historique_commande( `Hist_Num_Commande`, `Hist_Id_Menu`, `Hist_Id_Client`, `Hist_Id_Entree`, `Hist_Id_Plat`, `Hist_Id_Dessert`, `Hist_Id_Boisson`, `Hist_Date`, `Hist_Prix`, `Hist_Etat`, `Hist_Quantitee`) values (new.Num_Commande, new.Id_Menu, new.Id_Client, new.Id_Entree, new.Id_Plat, new.Id_Dessert, new.Id_Boisson, new.Date_Achat, new.Prix, new.Etat, new.Quantitee);
end
$$
DELIMITER ;

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
  PRIMARY KEY (`Id_Dessert`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `dessert`
--

INSERT INTO `dessert` (`Id_Dessert`, `Nom`, `Description`, `Prix_Dessert`) VALUES
(1, 'Ramequins fondants au chocolat', 'fondant chocolat moelleux', '12.08'),
(2, 'tiramisu', 'Il existe de nombreuses recettes de tiramisu. Celle-ci est la recette originale', '14.12'),
(3, 'Tarte aux pommes à l\'Alsacienne', 'nos régions ont du talent', '4.12'),
(4, 'gateau patate', 'au bonnes patate du jardin', '7.12'),
(5, 'gateau manioc', 'au bon manioc de cilaos', '7.12'),
(6, 'bonbon bananes', '10 bonbons aux bananes de saint andré', '5.90');

--
-- Déclencheurs `dessert`
--
DROP TRIGGER IF EXISTS `Triggerz_dessert_historique`;
DELIMITER $$
CREATE TRIGGER `Triggerz_dessert_historique` BEFORE DELETE ON `dessert` FOR EACH ROW INSERT INTO all_aliments_historique (`Nom`, `Description`, `Prix`, `Id_Entree`, `Id_Plat`, `Id_Dessert`, `Id_Boisson`) 
Values(Old.Nom, Old.Description, Old.Prix_Dessert, 0, 0, Old.Id_Dessert, 0)
$$
DELIMITER ;

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
  PRIMARY KEY (`Id_Entree`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `entree`
--

INSERT INTO `entree` (`Id_Entree`, `Nom`, `Description`, `Prix_Entree`) VALUES
(1, 'salade museaux', 'pur porcs', '4.98'),
(2, 'salade russe', 'légume de la cours', '4.90'),
(3, 'salade poulet curry', 'poulet curry sur un lit de salade de choux et carotte vinaigrée', '8.90');

--
-- Déclencheurs `entree`
--
DROP TRIGGER IF EXISTS `Triggerz_entree_historique`;
DELIMITER $$
CREATE TRIGGER `Triggerz_entree_historique` BEFORE DELETE ON `entree` FOR EACH ROW INSERT INTO all_aliments_historique (`Nom`, `Description`, `Prix`, `Id_Entree`, `Id_Plat`, `Id_Dessert`, `Id_Boisson`) 
Values(Old.Nom, Old.Description, Old.Prix_Entree, Old.Id_Entree, 0, 0, 0)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `historique_commande`
--

DROP TABLE IF EXISTS `historique_commande`;
CREATE TABLE IF NOT EXISTS `historique_commande` (
  `Hist_Id_Commande` int(11) NOT NULL AUTO_INCREMENT,
  `Hist_Num_Commande` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Hist_Id_Menu` int(11) DEFAULT NULL,
  `Hist_Id_Client` int(11) NOT NULL,
  `Hist_Id_Entree` int(11) DEFAULT NULL,
  `Hist_Id_Plat` int(11) DEFAULT NULL,
  `Hist_Id_Dessert` int(11) DEFAULT NULL,
  `Hist_Id_Boisson` int(11) DEFAULT NULL,
  `Hist_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Hist_Prix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Hist_Etat` int(1) NOT NULL,
  `Hist_Quantitee` int(11) NOT NULL,
  PRIMARY KEY (`Hist_Id_Commande`) USING BTREE,
  KEY `Id_Menu` (`Hist_Id_Menu`),
  KEY `Id_Client` (`Hist_Id_Client`),
  KEY `Id_Entree` (`Hist_Id_Entree`),
  KEY `Id_Plat` (`Hist_Id_Plat`),
  KEY `Id_Dessert` (`Hist_Id_Dessert`),
  KEY `Id_Boisson` (`Hist_Id_Boisson`)
) ENGINE=MyISAM AUTO_INCREMENT=150 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `historique_commande`
--

INSERT INTO `historique_commande` (`Hist_Id_Commande`, `Hist_Num_Commande`, `Hist_Id_Menu`, `Hist_Id_Client`, `Hist_Id_Entree`, `Hist_Id_Plat`, `Hist_Id_Dessert`, `Hist_Id_Boisson`, `Hist_Date`, `Hist_Prix`, `Hist_Etat`, `Hist_Quantitee`) VALUES
(149, '564fg5dfg', 11, 3, NULL, NULL, NULL, NULL, '2021-07-12 00:00:00', '12', 1, 17);

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

INSERT INTO `menus` (`Id_Menu`, `Nom`, `Description`, `Prix`, `Id_Entree`, `Id_Plat`, `Id_Dessert`, `Id_Boisson`) VALUES
(11, 'Menu d\'hiver', 'Chaud', '31.90', 1, 1, 1, 1),
(12, 'menu20', 'non2', '56.60', 4, 4, 1, 1);

--
-- Déclencheurs `menus`
--
DROP TRIGGER IF EXISTS `Triggerz_menu_historique`;
DELIMITER $$
CREATE TRIGGER `Triggerz_menu_historique` BEFORE DELETE ON `menus` FOR EACH ROW INSERT INTO menus_historique (`Nom`, `Description`, `Prix`, `Id_Entree`, `Id_Plat`, `Id_Dessert`, `Id_Boisson`) 
Values(Old.Nom, Old.Description, Old.Prix, Old.Id_Entree, Old.Id_Plat, Old.Id_Dessert, Old.Id_Boisson)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `menus_historique`
--

DROP TABLE IF EXISTS `menus_historique`;
CREATE TABLE IF NOT EXISTS `menus_historique` (
  `Id_Menu_Historique` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prix` decimal(15,2) DEFAULT NULL,
  `Id_Entree` int(11) NOT NULL,
  `Id_Plat` int(11) NOT NULL,
  `Id_Dessert` int(11) NOT NULL,
  `Id_Boisson` int(11) NOT NULL,
  PRIMARY KEY (`Id_Menu_Historique`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `menus_historique`
--

INSERT INTO `menus_historique` (`Id_Menu_Historique`, `Nom`, `Description`, `Prix`, `Id_Entree`, `Id_Plat`, `Id_Dessert`, `Id_Boisson`) VALUES
(19, 'Menu complet', 'Spécialité du chef', '50.00', 1, 1, 1, 1);

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
-- Structure de la table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `Id_Notification` int(11) NOT NULL AUTO_INCREMENT,
  `Type_Notification` int(11) NOT NULL,
  `Id_Client` int(11) DEFAULT NULL,
  `Id_Commande` int(11) DEFAULT NULL,
  `Id_Entree` int(11) DEFAULT NULL,
  `Id_Plat` int(11) DEFAULT NULL,
  `Id_Dessert` int(11) DEFAULT NULL,
  `Id_Boisson` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Notification`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`Id_Notification`, `Type_Notification`, `Id_Client`, `Id_Commande`, `Id_Entree`, `Id_Plat`, `Id_Dessert`, `Id_Boisson`) VALUES
(16, 1, 3, 147, NULL, NULL, NULL, NULL);

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
-- Structure de la table `plats`
--

DROP TABLE IF EXISTS `plats`;
CREATE TABLE IF NOT EXISTS `plats` (
  `Id_Plat` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prix_Plat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Plat`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`Id_Plat`, `Nom`, `Description`, `Prix_Plat`) VALUES
(1, 'salade museaux', 'pur porc', '4.90'),
(2, 'civet zouritte', 'au bon vin de cilaos', '8.99'),
(3, 'civet canards', 'au vin royal', '8.90'),
(4, 'coq massalé', 'au massalé fait maison', '8.99'),
(5, 'cabris massalé', 'cabris de la cours au massalé fait maison', '8.99');

--
-- Déclencheurs `plats`
--
DROP TRIGGER IF EXISTS `Triggerz_plat_historique`;
DELIMITER $$
CREATE TRIGGER `Triggerz_plat_historique` BEFORE DELETE ON `plats` FOR EACH ROW INSERT INTO all_aliments_historique (`Nom`, `Description`, `Prix`, `Id_Entree`, `Id_Plat`, `Id_Dessert`, `Id_Boisson`) 
Values(Old.Nom, Old.Description, Old.Prix_Plat, 0, Old.Id_Plat, 0, 0)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `stat`
--

DROP TABLE IF EXISTS `stat`;
CREATE TABLE IF NOT EXISTS `stat` (
  `id_stat` int(11) NOT NULL AUTO_INCREMENT,
  `ca_ttc` decimal(18,4) DEFAULT NULL,
  `ca_ht` decimal(18,4) DEFAULT NULL,
  `nb_com` int(11) DEFAULT NULL,
  `quant_tot` int(11) DEFAULT NULL,
  `quant_boiss` int(11) DEFAULT NULL,
  `quant_dessert` int(11) DEFAULT NULL,
  `quant_plat` int(11) DEFAULT NULL,
  `quant_entree` int(11) DEFAULT NULL,
  `ca_boiss` decimal(18,4) DEFAULT NULL,
  `ca_dessert` decimal(18,4) DEFAULT NULL,
  `ca_plat` decimal(18,4) DEFAULT NULL,
  `ca_entree` decimal(18,4) DEFAULT NULL,
  `percent_ca_boiss` decimal(18,4) DEFAULT NULL,
  `percent_ca_dessert` decimal(18,4) DEFAULT NULL,
  `percent_ca_plat` decimal(18,4) DEFAULT NULL,
  `percent_ca_entree` decimal(18,4) DEFAULT NULL,
  `date_stat` date NOT NULL,
  `activ_Stat` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id_stat`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stat`
--

INSERT INTO `stat` (`id_stat`, `ca_ttc`, `ca_ht`, `nb_com`, `quant_tot`, `quant_boiss`, `quant_dessert`, `quant_plat`, `quant_entree`, `ca_boiss`, `ca_dessert`, `ca_plat`, `ca_entree`, `percent_ca_boiss`, `percent_ca_dessert`, `percent_ca_plat`, `percent_ca_entree`, `date_stat`, `activ_Stat`) VALUES
(75, '12.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-27', b'1'),
(68, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-25', b'1'),
(67, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-25', b'1'),
(66, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-25', b'1'),
(65, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-25', b'1'),
(64, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-24', b'1'),
(63, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-24', b'1'),
(62, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-23', b'1'),
(61, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-23', b'1'),
(60, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-22', b'1'),
(59, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-22', b'1'),
(58, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-21', b'1'),
(57, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-21', b'1'),
(56, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-21', b'1'),
(55, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-18', b'1'),
(54, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-17', b'1'),
(53, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-16', b'1'),
(78, '100.0000', NULL, 3, 5, 0, 0, 1, 0, NULL, NULL, '15.0000', NULL, NULL, NULL, '0.1500', NULL, '2021-08-15', b'1');

--
-- Déclencheurs `stat`
--
DROP TRIGGER IF EXISTS `Mod_Stat`;
DELIMITER $$
CREATE TRIGGER `Mod_Stat` BEFORE UPDATE ON `stat` FOR EACH ROW BEGIN

DECLARE id_stat_stat int ;
DECLARE ca_ttc_stat decimal(10,4);
DECLARE ca_ht_stat decimal(10,4);
DECLARE nb_com_stat integer;
DECLARE quant_tot_stat integer;
DECLARE quant_boiss_stat integer;
DECLARE quant_dessert_stat integer;
DECLARE quant_plat_stat integer;
DECLARE quant_entree_stat integer;
DECLARE ca_boiss_stat decimal(10,4);
DECLARE ca_dessert_stat decimal(10,4);
DECLARE ca_plat_stat decimal(10,4);
DECLARE ca_entree_stat decimal(10,4);
DECLARE percent_ca_boiss_stat decimal(10,4);
DECLARE percent_ca_dessert_stat decimal(10,4);
DECLARE percent_ca_plat_stat decimal(10,4);
DECLARE percent_ca_entree_stat decimal(10,4);
DECLARE date_stat_stat date;
DECLARE last_date date;
DECLARE last_id int;

SET id_stat_stat = NEW.id_stat;
SET ca_ttc_stat = NEW.ca_ttc;
SET ca_ht_stat = NEW.ca_ht;
SET nb_com_stat = NEW.nb_com;
SET quant_tot_stat = NEW.quant_tot;
SET quant_boiss_stat = NEW.quant_boiss;
SET quant_dessert_stat = NEW.quant_dessert;
SET quant_plat_stat = NEW.quant_plat;
SET quant_entree_stat =  NEW.quant_entree;
SET ca_boiss_stat = NEW.ca_boiss;
SET ca_dessert_stat =  NEW.ca_dessert;
SET ca_plat_stat = NEW.ca_plat;
SET ca_entree_stat = NEW.ca_entree;
SET percent_ca_boiss_stat = NEW.percent_ca_boiss;
SET percent_ca_dessert_stat = NEW.percent_ca_dessert;
SET percent_ca_plat_stat = NEW.percent_ca_plat;
SET percent_ca_entree_stat = NEW.percent_ca_entree;
SET date_stat_stat = NEW.date_stat;

INSERT INTO `stat_hist`( `ca_ttc`, `ca_ht`, `nb_com`, `quant_tot`, `quant_boiss`, `quant_dessert`, `quant_plat`, `quant_entree`, `ca_boiss`, `ca_dessert`, `ca_plat`, `ca_entree`, `percent_ca_boiss`, `percent_ca_dessert`, `percent_ca_plat`, `percent_ca_entree`, `date_stat`, `date_add`)  VALUES (ca_ttc_stat,ca_ht_stat,
 nb_com_stat,quant_tot_stat,quant_boiss_stat,
 quant_dessert_stat,quant_plat_stat,quant_entree_stat,
 ca_boiss_stat,ca_dessert_stat,ca_plat_stat,
 ca_entree_stat,percent_ca_boiss_stat,percent_ca_dessert_stat,
 percent_ca_plat_stat,percent_ca_entree_stat,date_stat_stat,
 NOW());
 signal sqlstate '45000' set message_text = 'Vous ne pouvez pas modifier un historique';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `stat_hist`
--

DROP TABLE IF EXISTS `stat_hist`;
CREATE TABLE IF NOT EXISTS `stat_hist` (
  `id_stat_hist` int(11) NOT NULL AUTO_INCREMENT,
  `ca_ttc` decimal(18,4) DEFAULT NULL,
  `ca_ht` decimal(18,4) DEFAULT NULL,
  `nb_com` int(11) DEFAULT NULL,
  `quant_tot` int(11) DEFAULT NULL,
  `quant_boiss` int(11) DEFAULT NULL,
  `quant_dessert` int(11) DEFAULT NULL,
  `quant_plat` int(11) DEFAULT NULL,
  `quant_entree` int(11) DEFAULT NULL,
  `ca_boiss` decimal(18,4) DEFAULT NULL,
  `ca_dessert` decimal(18,4) DEFAULT NULL,
  `ca_plat` decimal(18,4) DEFAULT NULL,
  `ca_entree` decimal(18,4) DEFAULT NULL,
  `percent_ca_boiss` decimal(18,4) DEFAULT NULL,
  `percent_ca_dessert` decimal(18,4) DEFAULT NULL,
  `percent_ca_plat` decimal(18,4) DEFAULT NULL,
  `percent_ca_entree` decimal(18,4) DEFAULT NULL,
  `date_stat` date NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id_stat_hist`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stat_hist`
--

INSERT INTO `stat_hist` (`id_stat_hist`, `ca_ttc`, `ca_ht`, `nb_com`, `quant_tot`, `quant_boiss`, `quant_dessert`, `quant_plat`, `quant_entree`, `ca_boiss`, `ca_dessert`, `ca_plat`, `ca_entree`, `percent_ca_boiss`, `percent_ca_dessert`, `percent_ca_plat`, `percent_ca_entree`, `date_stat`, `date_add`) VALUES
(43, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-25', '2021-08-15 14:11:56'),
(42, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-24', '2021-08-15 14:10:01'),
(41, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-23', '2021-08-15 14:09:32'),
(40, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-21', '2021-08-15 14:03:03'),
(44, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-27', '2021-08-15 15:11:19'),
(45, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-27', '2021-08-15 15:11:28'),
(46, '4222.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-27', '2021-08-15 15:12:02'),
(47, '4222.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-27', '2021-08-15 15:12:50'),
(48, '10.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-27', '2021-08-15 15:14:26'),
(49, '72.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-27', '2021-08-15 15:16:58'),
(50, '41264.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-27', '2021-08-15 15:17:48'),
(51, '12.0000', '11.0000', 4, 42, 2, 10, 10, 10, '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '10.0000', '2021-08-27', '2021-08-15 15:20:28'),
(52, '100.0000', NULL, 3, 5, 0, 0, 1, 0, NULL, NULL, '15.0000', NULL, NULL, NULL, '0.0000', NULL, '2021-08-15', '2021-08-16 22:06:22'),
(53, '100.0000', NULL, 3, 5, 0, 0, 1, 0, NULL, NULL, '15.0000', NULL, NULL, NULL, '0.0000', NULL, '2021-08-15', '2021-08-16 22:08:20'),
(54, '100.0000', NULL, 3, 5, 0, 0, 1, 0, NULL, NULL, '15.0000', NULL, NULL, NULL, '0.0000', NULL, '2021-08-15', '2021-08-16 22:10:08'),
(55, '100.0000', NULL, 3, 5, 0, 0, 1, 0, NULL, NULL, '15.0000', NULL, NULL, NULL, '0.1500', NULL, '2021-08-15', '2021-08-16 22:14:00');

--
-- Déclencheurs `stat_hist`
--
--
-- Déclencheurs `stat_hist`
--
DROP TRIGGER IF EXISTS `Mod_hist`;
DELIMITER $$
CREATE TRIGGER `Mod_hist` BEFORE UPDATE ON `stat_hist` FOR EACH ROW BEGIN

signal sqlstate '45000' set message_text = 'Vous ne pouvez pas modifier un historique';
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `Supp_hist`;
DELIMITER $$
CREATE TRIGGER `Supp_hist` BEFORE DELETE ON `stat_hist` FOR EACH ROW BEGIN

signal sqlstate '45000' set message_text = 'Vous ne pouvez pas supprimer un historique';
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `old_stat`;
DELIMITER $$
CREATE TRIGGER `old_stat` AFTER INSERT ON `stat_hist` FOR EACH ROW BEGIN
	
DECLARE req int ;
DECLARE id_stat_stat int ;
DECLARE ca_ttc_stat decimal(10,4);
DECLARE ca_ht_stat decimal(10,4);
DECLARE nb_com_stat integer;
DECLARE quant_tot_stat integer;
DECLARE quant_boiss_stat integer;
DECLARE quant_dessert_stat integer;
DECLARE quant_plat_stat integer;
DECLARE quant_entree_stat integer;
DECLARE ca_boiss_stat decimal(10,4);
DECLARE ca_dessert_stat decimal(10,4);
DECLARE ca_plat_stat decimal(10,4);
DECLARE ca_entree_stat decimal(10,4);
DECLARE percent_ca_boiss_stat decimal(10,4);
DECLARE percent_ca_dessert_stat decimal(10,4);
DECLARE percent_ca_plat_stat decimal(10,4);
DECLARE percent_ca_entree_stat decimal(10,4);
DECLARE date_stat_stat date;
DECLARE last_date date;
DECLARE last_id int;



SET last_id = (SELECT id_stat_hist FROM stat_hist ORDER BY id_stat_hist DESC LIMIT 1);

SET ca_ttc_stat = (SELECT `ca_ttc` FROM `stat_hist` WHERE  id_stat_hist = last_id);

SET ca_ht_stat = (SELECT `ca_ht` FROM `stat_hist` WHERE  id_stat_hist = last_id);

SET nb_com_stat = (SELECT `nb_com` FROM `stat_hist` WHERE  id_stat_hist = last_id);

SET quant_tot_stat = (SELECT `quant_tot` FROM `stat_hist` WHERE  id_stat_hist = last_id);

SET quant_boiss_stat = (SELECT `quant_boiss` FROM `stat_hist` WHERE  id_stat_hist = last_id);

SET quant_dessert_stat = (SELECT `quant_dessert` FROM `stat_hist` WHERE  id_stat_hist = last_id);

SET quant_plat_stat = (SELECT `quant_plat` FROM `stat_hist` WHERE  id_stat_hist = last_id);

SET quant_entree_stat = (SELECT `quant_entree` FROM `stat_hist` WHERE  id_stat_hist = last_id);

SET ca_boiss_stat = (SELECT `ca_boiss` FROM `stat_hist` WHERE  id_stat_hist = last_id);

SET ca_dessert_stat = (SELECT `ca_dessert` FROM `stat_hist` WHERE  id_stat_hist = last_id);

SET ca_plat_stat = (SELECT `ca_plat` FROM `stat_hist` WHERE  id_stat_hist = last_id);

SET ca_entree_stat = (SELECT `ca_entree` FROM `stat_hist` WHERE  id_stat_hist = last_id);

SET percent_ca_boiss_stat = (SELECT `percent_ca_boiss` FROM `stat_hist` WHERE  id_stat_hist = last_id);

SET percent_ca_dessert_stat = (SELECT `percent_ca_dessert` FROM `stat_hist` WHERE  id_stat_hist = last_id);

SET percent_ca_plat_stat = (SELECT `percent_ca_plat` FROM `stat_hist` WHERE  id_stat_hist = last_id);

SET percent_ca_entree_stat = (SELECT `percent_ca_entree` FROM `stat_hist` WHERE  id_stat_hist = last_id);

SET date_stat_stat = (SELECT `date_stat` FROM `stat_hist` WHERE  id_stat_hist = last_id);

SET req = (select count(*) from stat where date_stat LIKE date_stat_stat );

IF (req >0)	
THEN
 
    DELETE FROM stat WHERE date_stat LIKE NEW.date_stat;

END IF;

INSERT INTO `stat`
( `ca_ttc`, `ca_ht`, `nb_com`,
 `quant_tot`, `quant_boiss`, `quant_dessert`,
 `quant_plat`, `quant_entree`, `ca_boiss`, `ca_dessert`,
 `ca_plat`, `ca_entree`, `percent_ca_boiss`, `percent_ca_dessert`,
 `percent_ca_plat`, `percent_ca_entree`, `date_stat`, `activ_Stat`)
 VALUES (ca_ttc_stat,ca_ht_stat,
 nb_com_stat,quant_tot_stat,quant_boiss_stat,
 quant_dessert_stat,quant_plat_stat,quant_entree_stat,
 ca_boiss_stat,ca_dessert_stat,ca_plat_stat,
 ca_entree_stat,percent_ca_boiss_stat,percent_ca_dessert_stat,
 percent_ca_plat_stat,percent_ca_entree_stat,date_stat_stat,
 1);
 
 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la vue `menu_complet`
--
DROP TABLE IF EXISTS `menu_complet`;

DROP VIEW IF EXISTS `menu_complet`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `menu_complet`  AS  select `menus`.`Id_Menu` AS `Id_Menu`,`menus`.`Nom` AS `Nom`,`menus`.`Description` AS `description`,`menus`.`Prix` AS `prix`,`entree`.`Nom` AS `entree`,`plats`.`Nom` AS `plat`,`dessert`.`Nom` AS `dessert`,`boisson`.`Nom` AS `boisson` from ((((`menus` join `entree` on((`menus`.`Id_Entree` = `entree`.`Id_Entree`))) join `plats` on((`menus`.`Id_Plat` = `plats`.`Id_Plat`))) join `dessert` on((`menus`.`Id_Dessert` = `dessert`.`Id_Dessert`))) join `boisson` on((`menus`.`Id_Boisson` = `boisson`.`Id_Boisson`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
