-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 11 mars 2022 à 12:31
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lamiseauvert`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addAnimal` (IN `paramNom` VARCHAR(255), IN `paramProprietaire` INT, IN `paramEspece` INT)  BEGIN
    INSERT INTO Animal
    (NomAnimal, ProprietaireId, EspeceId)
    VALUES (paramNom, paramProprietaire, paramEspece);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addEspece` (IN `paramAnimal` VARCHAR(255), IN `paramLibelle` VARCHAR(255))  BEGIN
    INSERT INTO Espece
    (Animal, Libelle)
    VALUES (paramAnimal, paramLibelle);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addPension` (IN `paramVille` VARCHAR(255), IN `paramDescription` TEXT, IN `paramAdresse` VARCHAR(255), IN `paramResponsable` VARCHAR(255), IN `paramTelephone` VARCHAR(255), IN `paramImage` VARCHAR(255))  BEGIN
    INSERT INTO Pension
    (Ville, Description, Adresse, Responsable, Telephone, Image)
    VALUES (paramVille,paramDescription,paramAdresse,paramResponsable,paramTelephone,paramImage);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addPrix` (IN `paramTarif` INT, IN `paramPension` INT, IN `paramGardiennage` INT)  BEGIN
    INSERT INTO Prix
    (Tarif, PensionId, TypeGardiennageId)
    VALUES (paramTarif,paramPension,paramGardiennage);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addProprietaire` (IN `paramNom` VARCHAR(255), IN `paramPrenom` VARCHAR(255), IN `paramAdresse` VARCHAR(255), IN `paramTelephone` VARCHAR(255), IN `paramEmail` VARCHAR(255))  BEGIN
    INSERT INTO Proprietaire
            (Nom, Prenom, Adresse, Telephone, Email)
            VALUES (paramNom,paramPrenom,paramAdresse,paramTelephone,paramEmail);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addUser` (IN `paramId` INT, IN `paramPass` VARCHAR(255), IN `paramRole` VARCHAR(255))  BEGIN
    INSERT INTO Utilisateur
    (ProprietaireId, Password, Role)
    VALUES (paramId, paramPass,paramRole);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `auth` (IN `paramEmail` VARCHAR(255))  BEGIN
    SELECT * FROM 
    Proprietaire WHERE Email=paramEmail;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllCatEspece` ()  BEGIN
    SELECT * FROM Espece
    WHERE Animal = 'Chat';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllDogEspece` ()  BEGIN
    SELECT * FROM Espece
    WHERE Animal = 'Chien';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllGardiennage` ()  BEGIN
    SELECT * FROM TypeGardiennage;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllPension` ()  BEGIN
    SELECT * FROM Pension;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getEspece` (IN `paramLibelle` VARCHAR(255))  BEGIN
    SELECT Id FROM Espece
   	WHERE Libelle=paramLibelle;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getGardiennage` (IN `paramLibelle` VARCHAR(255))  BEGIN
    SELECT * FROM TypeGardiennage
    WHERE Libelle = paramLibelle;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getMyAnimal` (IN `paramProprietaire` INT)  BEGIN
    SELECT Animal.NomAnimal, Libelle FROM Animal
    INNER JOIN Espece ON Animal.EspeceId = Espece.Id
    WHERE ProprietaireId = paramProprietaire;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getMyEspece` (IN `paramId` INT)  BEGIN
    SELECT * FROM Espece
    WHERE Id = paramId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPension` (IN `paramVille` VARCHAR(255))  BEGIN
    SELECT * FROM Pension
    WHERE Ville= paramVille;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getRole` (IN `paramId` INT)  BEGIN
    SELECT * FROM Utilisateur
    WHERE ProprietaireId=paramId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSearch` (IN `paramKey` VARCHAR(255))  BEGIN
    SELECT Proprietaire.Id, Nom, Prenom, Adresse, Telephone, Email, NomAnimal, ProprietaireId, Libelle FROM Proprietaire
    INNER JOIN Animal ON Proprietaire.Id = Animal.ProprietaireId
    INNER JOIN Espece  ON Animal.EspeceId = Espece.Id
	WHERE Nom LIKE paramKey OR Prenom LIKE paramKey;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUtilisateur` (IN `paramEmail` VARCHAR(255))  BEGIN
    SELECT * FROM Proprietaire
    WHERE Email=paramEmail;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateAnimal` (IN `paramNom` VARCHAR(255), IN `paramProprietaire` INT, IN `paramEspece` INT)  BEGIN
    UPDATE Animal
    SET NomAnimal = paramNom
    WHERE ProprietaireId = paramProprietaire AND EspeceId = paramEspece;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePension` (IN `paramDescription` TEXT, IN `paramAdresse` VARCHAR(255), IN `paramResponsable` VARCHAR(255), IN `paramTelephone` VARCHAR(255), IN `paramVille` VARCHAR(255))  BEGIN
    UPDATE Pension 
    SET Description = paramDescription, Adresse = paramAdresse, Responsable = paramResponsable, Telephone = paramTelephone
    WHERE Ville = paramVille;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePensionAndImage` (IN `paramDescription` TEXT, IN `paramAdresse` VARCHAR(255), IN `paramResponsable` VARCHAR(255), IN `paramTelephone` VARCHAR(255), IN `paramPP` VARCHAR(255), IN `paramVille` VARCHAR(255))  BEGIN
    UPDATE Pension SET
    Description = paramDescription, Adresse = paramAdresse, Responsable = paramResponsable, Telephone = paramTelephone, Image = paramPP
    WHERE Ville = paramVille;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePrix` (IN `paramTarif` VARCHAR(255), IN `paramPension` INT, IN `paramGardiennage` INT)  BEGIN
    UPDATE Prix
    SET Tarif = paramTarif
    WHERE PensionId = paramPension AND TypeGardiennageId = paramGardiennage;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verifMail` (IN `paramEmail` VARCHAR(255))  BEGIN
    SELECT Email FROM Proprietaire
   	WHERE Email=paramEmail;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `Affectation`
--

CREATE TABLE `Affectation` (
  `Id` int(11) NOT NULL,
  `DateFin` date NOT NULL,
  `Regle` tinyint(4) NOT NULL,
  `CarnetVaccination` tinyint(4) NOT NULL,
  `Poids` double NOT NULL,
  `Age` int(11) NOT NULL,
  `VaccinAJour` tinyint(4) NOT NULL,
  `VermifugeAJour` tinyint(4) NOT NULL,
  `AnimalId` int(11) NOT NULL,
  `BoxId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Animal`
--

CREATE TABLE `Animal` (
  `Id` int(11) NOT NULL,
  `NomAnimal` varchar(255) NOT NULL,
  `ProprietaireId` int(11) NOT NULL,
  `EspeceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Animal`
--

INSERT INTO `Animal` (`Id`, `NomAnimal`, `ProprietaireId`, `EspeceId`) VALUES
(1, 'Jackie', 9, 1),
(2, 'Copain !', 10, 2),
(3, 'Michel', 9, 3),
(4, 'Toto', 11, 7);

-- --------------------------------------------------------

--
-- Structure de la table `Box`
--

CREATE TABLE `Box` (
  `Id` int(11) NOT NULL,
  `Superficie` double NOT NULL,
  `TypeGardiennageId` int(11) NOT NULL,
  `PensionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Date`
--

CREATE TABLE `Date` (
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Espece`
--

CREATE TABLE `Espece` (
  `Id` int(11) NOT NULL,
  `Animal` varchar(50) NOT NULL,
  `Libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Espece`
--

INSERT INTO `Espece` (`Id`, `Animal`, `Libelle`) VALUES
(1, 'Chien', 'Affenpinscher'),
(2, 'Chien', 'Airedale Terrier'),
(3, 'Chien', 'Akita américain'),
(4, 'Chien', 'Akita Inu'),
(5, 'Chien', 'American Staffordshire Terrier'),
(6, 'Chien', 'Ancien chien d\'arrêt danois'),
(7, 'Chien', 'Anglo-Français de petite vénerie'),
(8, 'Chien', 'Ariégeois'),
(9, 'Chien', 'Azawakh');

-- --------------------------------------------------------

--
-- Structure de la table `Parametres`
--

CREATE TABLE `Parametres` (
  `Nom` varchar(255) NOT NULL,
  `AdresseSiegeSocial` varchar(255) NOT NULL,
  `NomDirigeant` varchar(255) NOT NULL,
  `AdresseLogo` varchar(255) NOT NULL,
  `PrixVaccin` double NOT NULL,
  `PrixVermifuge` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Pension`
--

CREATE TABLE `Pension` (
  `Id` int(11) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Telephone` varchar(255) NOT NULL,
  `Responsable` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Pension`
--

INSERT INTO `Pension` (`Id`, `Ville`, `Adresse`, `Telephone`, `Responsable`, `Description`, `Image`) VALUES
(1, 'Lambertsart', '65 rue jean Jaures, 59130 Lambertsart', '03.20.00.11.22', 'Mme Lali Masse', 'Une super Pension', 'assets/uploads/pension/Lambertsart_pension.png'),
(2, 'Vincennes', '03 rue Faie Felix, 94300 Vincennes', '01.05.01.21.22', ' Mme Cary Bou', 'Une Super Pension', 'assets/uploads/pension/pension-default.jpg'),
(3, 'Les Echets', '1707 rue Faie Felix, 93300 Les Echets', '04.54.12.25.78', 'Mme Cathy Greu', 'Une Super Pension', 'assets/uploads/pension/pension-default.jpg'),
(4, 'Saran', 'ZA Des Sable De Sary 53 all Georges Charpak, 45770 Saran', '04.56.62.84.55', 'Mme Claudia Bleu de Tasmasnie', 'Une Super Pension', 'assets/uploads/pension/pension-default.jpg'),
(5, 'Coulmiers', 'Les Basses Fontaines, 45130 Coulmiers', '05.77.44.51.84', 'M. Filippo Potame', 'Une Super Pension', 'assets/uploads/pension/pension-default.jpg'),
(6, 'Norges la ville', '7 r Sources, 21490 Norges la ville', '07.63.22.25.74', 'M. Salah Mandre', 'Une Super Pension', 'assets/uploads/pension/pension-default.jpg'),
(7, 'Landujan', 'Le Plessix Coudray, 35360 Landujan', '02.95.72.85.86', 'M. Odin Don', 'Une Super Pension', 'assets/uploads/pension/pension-default.jpg'),
(8, 'Ormes', 'rte de Dormans RD 980, 51370 Ormes', '09.47.21.25.66', 'Mme Lucie Ole', 'Une Super Pension', 'assets/uploads/pension/pension-default.jpg'),
(9, 'Lezoux', 'rte de Ravel, 63190 Lezoux', '05.54.63.77.15', 'M. Camel Eon', 'Une Super Pension', 'assets/uploads/pension/pension-default.jpg'),
(10, 'Vabres l’Abbaye', '11 r Montcamp, 12400 Vabres l’Abbaye', '04.56.28.36.58', 'M. Bernard Val', 'Une Super Pension', 'assets/uploads/pension/pension-default.jpg'),
(11, 'Saint Sauveur', '590 chem Saint Vaast, 80470 Saint Sauveur', '03.10.12.57.38', 'Mme Lou Treux De Mer', 'Une Super Pension', 'assets/uploads/pension/pension-default.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Prix`
--

CREATE TABLE `Prix` (
  `Id` int(11) NOT NULL,
  `Tarif` int(11) NOT NULL,
  `PensionId` int(11) NOT NULL,
  `TypeGardiennageId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Prix`
--

INSERT INTO `Prix` (`Id`, `Tarif`, `PensionId`, `TypeGardiennageId`) VALUES
(1, 26, 1, 1),
(2, 12, 1, 2),
(3, 11, 1, 3),
(4, 26, 2, 1),
(5, 11, 2, 2),
(6, 12, 2, 3),
(7, 20, 3, 1),
(8, 10, 3, 2),
(9, 10, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Proprietaire`
--

CREATE TABLE `Proprietaire` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Telephone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Proprietaire`
--

INSERT INTO `Proprietaire` (`Id`, `Nom`, `Prenom`, `Adresse`, `Telephone`, `Email`) VALUES
(9, 'DENAVAUT', 'Valentin', '103 bis Av de la plage, 62155 Merlimont', '06.65.20.67.07', 'valentin.denavaut@hotmail.fr'),
(10, 'DENAVAUT', 'Valentin', '103 bis Av de la plage, 62155 Merlimont', '06.65.20.67.07', 'valentin.denavaut@gmail.com'),
(11, 'DENAVAUT', 'Valentin', '103 bis Av de la plage, 62155 Merlimont', '06.65.20.67.07', 'valentin.denavaut@free.fr');

-- --------------------------------------------------------

--
-- Structure de la table `TypeGardiennage`
--

CREATE TABLE `TypeGardiennage` (
  `Id` int(11) NOT NULL,
  `Libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `TypeGardiennage`
--

INSERT INTO `TypeGardiennage` (`Id`, `Libelle`) VALUES
(1, 'Hôtel Canin'),
(2, 'Camping Canin'),
(3, 'Pension Féline');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `Id` int(11) NOT NULL,
  `ProprietaireId` int(11) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`Id`, `ProprietaireId`, `Password`, `Role`) VALUES
(1, 9, '$2y$10$G6dvbiryZeCLgSR10WHd/.AeHFI/jcUrB7IYc83GRPRY/B7.WkIK6', 'ADMIN'),
(2, 10, '$2y$10$Iy/G5TJF7s3QNa0ReCq/Yew50RTvP1wRtbCvo0VGf2q4jDWRk96P6', 'Lambertsart'),
(3, 11, '$2y$10$maMgylQGX3WKuJu4qDdjj.gdRAipUR/jwU4bpuNbDrL3n23Zg4YpG', 'USER');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Affectation`
--
ALTER TABLE `Affectation`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `DateFin` (`DateFin`),
  ADD KEY `AnimalId` (`AnimalId`),
  ADD KEY `BoxId` (`BoxId`);

--
-- Index pour la table `Animal`
--
ALTER TABLE `Animal`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ProprietaireId` (`ProprietaireId`),
  ADD KEY `EspeceId` (`EspeceId`);

--
-- Index pour la table `Box`
--
ALTER TABLE `Box`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `TypeGardiennageId` (`TypeGardiennageId`),
  ADD KEY `PensionId` (`PensionId`);

--
-- Index pour la table `Date`
--
ALTER TABLE `Date`
  ADD PRIMARY KEY (`Date`);

--
-- Index pour la table `Espece`
--
ALTER TABLE `Espece`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Pension`
--
ALTER TABLE `Pension`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Prix`
--
ALTER TABLE `Prix`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `PensionId` (`PensionId`),
  ADD KEY `TypeGardiennageId` (`TypeGardiennageId`);

--
-- Index pour la table `Proprietaire`
--
ALTER TABLE `Proprietaire`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `TypeGardiennage`
--
ALTER TABLE `TypeGardiennage`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ProprietaireId` (`ProprietaireId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Affectation`
--
ALTER TABLE `Affectation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Animal`
--
ALTER TABLE `Animal`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Box`
--
ALTER TABLE `Box`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Espece`
--
ALTER TABLE `Espece`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `Pension`
--
ALTER TABLE `Pension`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `Prix`
--
ALTER TABLE `Prix`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `Proprietaire`
--
ALTER TABLE `Proprietaire`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `TypeGardiennage`
--
ALTER TABLE `TypeGardiennage`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Affectation`
--
ALTER TABLE `Affectation`
  ADD CONSTRAINT `affectation_ibfk_1` FOREIGN KEY (`DateFin`) REFERENCES `Date` (`Date`),
  ADD CONSTRAINT `affectation_ibfk_2` FOREIGN KEY (`AnimalId`) REFERENCES `Animal` (`Id`),
  ADD CONSTRAINT `affectation_ibfk_3` FOREIGN KEY (`BoxId`) REFERENCES `Box` (`Id`);

--
-- Contraintes pour la table `Animal`
--
ALTER TABLE `Animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`ProprietaireId`) REFERENCES `Proprietaire` (`Id`),
  ADD CONSTRAINT `animal_ibfk_2` FOREIGN KEY (`EspeceId`) REFERENCES `Espece` (`Id`);

--
-- Contraintes pour la table `Box`
--
ALTER TABLE `Box`
  ADD CONSTRAINT `box_ibfk_1` FOREIGN KEY (`TypeGardiennageId`) REFERENCES `TypeGardiennage` (`Id`),
  ADD CONSTRAINT `box_ibfk_2` FOREIGN KEY (`PensionId`) REFERENCES `Pension` (`Id`);

--
-- Contraintes pour la table `Prix`
--
ALTER TABLE `Prix`
  ADD CONSTRAINT `prix_ibfk_1` FOREIGN KEY (`PensionId`) REFERENCES `Pension` (`Id`),
  ADD CONSTRAINT `prix_ibfk_2` FOREIGN KEY (`TypeGardiennageId`) REFERENCES `TypeGardiennage` (`Id`);

--
-- Contraintes pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`ProprietaireId`) REFERENCES `Proprietaire` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
