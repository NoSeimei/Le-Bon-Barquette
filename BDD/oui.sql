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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




INSERT INTO menus_historique
SELECT new.* FROM new.menus


CREATE TABLE IF NOT EXISTS `all_aliments_historique` (
  `Id_Aliment` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prix` decimal(15,2) DEFAULT NULL,
  `Id_Entree` int(11) NULL,
  `Id_Plat` int(11) NULL,
  `Id_Dessert` int(11) NULL,
  `Id_Boisson` int(11) NULL,
  PRIMARY KEY (`Id_Aliment`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO all_aliments_historique (`Nom`, `Description`, `Prix`, `Id_Entree`, `Id_Plat`, `Id_Dessert`, `Id_Boisson`) 
Values(Old.Nom, Old.Description, Old.Prix_Dessert, 0, 0, Old.Id_Dessert, 0)

CREATE TABLE IF NOT EXISTS `notification` (
  `Id_Notification` int(11) NOT NULL AUTO_INCREMENT,
  `Type_Notification` int(11) NOT NULL,
  `Id_Client` int(11) NULL,
  `Id_Commande` int(11) NULL,
  `Id_Entree` int(11) NULL,
  `Id_Plat` int(11) NULL,
  `Id_Dessert` int(11) NULL,
  `Id_Boisson` int(11) NULL,
  PRIMARY KEY (`Id_Notification`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;