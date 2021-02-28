-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 25, 2021 at 09:06 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gatci`
--

DELIMITER $$
--
-- Functions
--
DROP FUNCTION IF EXISTS `Inscription_activitee`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `Inscription_activitee` (`cdAn` CHAR(8)) RETURNS INT(3) READS SQL DATA
BEGIN
DECLARE placeRest INT;
DECLARE placeDispo INT;
DECLARE placePrise INT;

SELECT NBREPLACEANIM INTO placeDispo FROM animation WHERE CODEANIM = cdAn;

SELECT COUNT(I.NOACT)INTO placePrise FROM inscription I, animation AN, activite A WHERE AN.CODEANIM = A.CODEANIM AND A.NOACT = I.NOACT AND AN.CODEANIM = cdAn AND I.DATEANNULE IS NULL;

IF(placeprise > placedispo)
        THEN SET placeRest = 0;
    ELSE SET placeRest = placeDispo - placePrise;
END IF;

RETURN placeRest;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `NOACT` int(4) NOT NULL,
  `CODEANIM` char(8) NOT NULL,
  `CODEETATACT` char(2) NOT NULL,
  `DATEACT` date NOT NULL,
  `HRRDVACT` time DEFAULT NULL,
  `PRIXACT` decimal(7,2) DEFAULT NULL,
  `HRDEBUTACT` time DEFAULT NULL,
  `HRFINACT` time DEFAULT NULL,
  `DATEANNULEACT` date DEFAULT NULL,
  `NOMRESP` char(40) DEFAULT NULL,
  `PRENOMRESP` char(30) DEFAULT NULL,
  PRIMARY KEY (`NOACT`),
  KEY `I_FK_ACTIVITE_ANIMATION` (`CODEANIM`),
  KEY `I_FK_ACTIVITE_ETAT_ACT` (`CODEETATACT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activite`
--

INSERT INTO `activite` (`NOACT`, `CODEANIM`, `CODEETATACT`, `DATEACT`, `HRRDVACT`, `PRIXACT`, `HRDEBUTACT`, `HRFINACT`, `DATEANNULEACT`, `NOMRESP`, `PRENOMRESP`) VALUES
(2, 'GB', 'O', '2021-02-03', '10:30:00', '20.00', '11:00:00', '09:00:00', NULL, 'ALLIOT', 'Mathias'),
(3, 'RF', 'O', '2021-03-01', '10:00:00', '10.00', '10:30:00', '12:30:00', NULL, 'ALLIOT', 'Mathias'),
(5, 'RF', 'O', '2021-03-27', '15:00:00', '50.00', '16:00:00', '18:00:00', NULL, 'ALLIOT', 'Mathias');

--
-- Triggers `activite`
--
DROP TRIGGER IF EXISTS `annuleActiInscript`;
DELIMITER $$
CREATE TRIGGER `annuleActiInscript` AFTER UPDATE ON `activite` FOR EACH ROW BEGIN 
    IF new.CODEETATACT = 'N' 
        THEN
            UPDATE inscription 
            SET DATEANNULE = DATE(NOW())
            WHERE NOACT = old.NOACT;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `animation`
--

DROP TABLE IF EXISTS `animation`;
CREATE TABLE IF NOT EXISTS `animation` (
  `CODEANIM` char(8) NOT NULL,
  `CODETYPEANIM` char(5) NOT NULL,
  `NOMANIM` char(40) DEFAULT NULL,
  `DATECREATIONANIM` date DEFAULT NULL,
  `DATEVALIDITEANIM` date DEFAULT NULL,
  `DUREEANIM` double(5,0) DEFAULT NULL,
  `LIMITEAGE` int(2) DEFAULT NULL,
  `TARIFANIM` decimal(7,2) DEFAULT NULL,
  `NBREPLACEANIM` int(2) DEFAULT NULL,
  `DESCRIPTANIM` char(250) DEFAULT NULL,
  `COMMENTANIM` char(250) DEFAULT NULL,
  `DIFFICULTEANIM` char(40) DEFAULT NULL,
  PRIMARY KEY (`CODEANIM`),
  KEY `I_FK_ANIMATION_TYPE_ANIM` (`CODETYPEANIM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `animation`
--

INSERT INTO `animation` (`CODEANIM`, `CODETYPEANIM`, `NOMANIM`, `DATECREATIONANIM`, `DATEVALIDITEANIM`, `DUREEANIM`, `LIMITEAGE`, `TARIFANIM`, `NBREPLACEANIM`, `DESCRIPTANIM`, `COMMENTANIM`, `DIFFICULTEANIM`) VALUES
('GB', 'MON', 'Randonnée en montagne', '2020-09-24', '2021-02-04', 10, 10, '100.00', 20, 'Randonnée à la journée au refuge du Glacier Blanc', 'Sortie pédestre', 'Moyen'),
('NAT', 'PLA', 'Natation en mer', '2020-09-24', '2020-09-30', 2, 6, '15.00', 40, 'Natation en mer au bord de la Seine', 'Venez équiper d\'un maillot de bain et d\'une serviette', 'Facile'),
('RF', 'FO', 'Randonnée en Forêt', '2021-03-01', '2021-05-31', 2, 20, '10.00', 60, 'Randonnée dans la forêt de Fontainebleau', 'Préparez vos chaussures de marche, une veste de pluie et un sac de randonnée avec un kit de secours', 'Facile');

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `USER` char(8) NOT NULL,
  `MDP` char(10) DEFAULT NULL,
  `NOMCOMPTE` char(40) DEFAULT NULL,
  `PRENOMCOMPTE` char(30) DEFAULT NULL,
  `DATEINSCRIP` date DEFAULT NULL,
  `DATEFERME` date DEFAULT NULL,
  `TYPEPROFIL` char(2) DEFAULT NULL,
  `DATEDEBSEJOUR` date DEFAULT NULL,
  `DATEFINSEJOUR` date DEFAULT NULL,
  `DATENAISCOMPTE` date DEFAULT NULL,
  `ADRMAILCOMPTE` char(70) DEFAULT NULL,
  `NOTELCOMPTE` char(15) DEFAULT NULL,
  PRIMARY KEY (`USER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compte`
--

INSERT INTO `compte` (`USER`, `MDP`, `NOMCOMPTE`, `PRENOMCOMPTE`, `DATEINSCRIP`, `DATEFERME`, `TYPEPROFIL`, `DATEDEBSEJOUR`, `DATEFINSEJOUR`, `DATENAISCOMPTE`, `ADRMAILCOMPTE`, `NOTELCOMPTE`) VALUES
('ALMA', 'admin', 'ALLIOT', 'Mathias', '2020-09-01', NULL, 'EN', '2020-02-03', '2021-02-03', '1999-07-05', 'mathias.alliot@vva.fr', '0102030405'),
('THLB', 'test', 'LEBRET', 'Thomas', '2020-09-17', NULL, 'VA', '2020-12-20', '2021-04-10', '2000-03-02', 'th.lebret@outlook.fr', '0659819473');

-- --------------------------------------------------------

--
-- Table structure for table `etat_act`
--

DROP TABLE IF EXISTS `etat_act`;
CREATE TABLE IF NOT EXISTS `etat_act` (
  `CODEETATACT` char(2) NOT NULL,
  `NOMETATACT` char(25) DEFAULT NULL,
  PRIMARY KEY (`CODEETATACT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etat_act`
--

INSERT INTO `etat_act` (`CODEETATACT`, `NOMETATACT`) VALUES
('N', 'Inactive'),
('O', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `NOINSCRIP` bigint(6) NOT NULL AUTO_INCREMENT,
  `USER` char(8) NOT NULL,
  `NOACT` int(4) NOT NULL,
  `DATEINSCRIP` date DEFAULT NULL,
  `DATEANNULE` date DEFAULT NULL,
  PRIMARY KEY (`NOINSCRIP`),
  KEY `I_FK_INSCRIPTION_COMPTE` (`USER`),
  KEY `I_FK_INSCRIPTION_ACTIVITE` (`NOACT`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inscription`
--

INSERT INTO `inscription` (`NOINSCRIP`, `USER`, `NOACT`, `DATEINSCRIP`, `DATEANNULE`) VALUES
(86, 'THLB', 3, '2020-11-20', NULL),
(91, 'ALMA', 5, '2020-12-27', NULL),
(93, 'ALMA', 3, '2020-11-20', NULL),
(94, 'THLB', 2, '2021-01-25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_anim`
--

DROP TABLE IF EXISTS `type_anim`;
CREATE TABLE IF NOT EXISTS `type_anim` (
  `CODETYPEANIM` char(5) NOT NULL,
  `NOMTYPEANIM` char(50) DEFAULT NULL,
  PRIMARY KEY (`CODETYPEANIM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_anim`
--

INSERT INTO `type_anim` (`CODETYPEANIM`, `NOMTYPEANIM`) VALUES
('FO', 'Forêt'),
('MON', 'Montagne'),
('PLA', 'Plage');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `activite_ibfk_1` FOREIGN KEY (`CODEANIM`) REFERENCES `animation` (`CODEANIM`),
  ADD CONSTRAINT `activite_ibfk_2` FOREIGN KEY (`CODEETATACT`) REFERENCES `etat_act` (`CODEETATACT`);

--
-- Constraints for table `animation`
--
ALTER TABLE `animation`
  ADD CONSTRAINT `animation_ibfk_1` FOREIGN KEY (`CODETYPEANIM`) REFERENCES `type_anim` (`CODETYPEANIM`);

--
-- Constraints for table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`USER`) REFERENCES `compte` (`USER`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`NOACT`) REFERENCES `activite` (`NOACT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
