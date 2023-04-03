-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 10, 2023 at 05:27 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestiongarage`
--

-- --------------------------------------------------------

--
-- Table structure for table `demandeintervention`
--

DROP TABLE IF EXISTS `demandeintervention`;
CREATE TABLE IF NOT EXISTS `demandeintervention` (
  `IdDemandeIntervention` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `kilometrage` int(11) DEFAULT NULL,
  `demandeur` int(11) NOT NULL,
  `vehicule` int(11) NOT NULL,
  `commentaire` text,
  PRIMARY KEY (`IdDemandeIntervention`),
  KEY `FK_ASSOCIER` (`vehicule`),
  KEY `demandeur` (`demandeur`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `demandeintervention`
--

INSERT INTO `demandeintervention` (`IdDemandeIntervention`, `date`, `kilometrage`, `demandeur`, `vehicule`, `commentaire`) VALUES
(1, '2023-02-05', 1500, 10, 2, NULL),
(2, '2023-02-10', 8000, 28, 2, 'RAS');

-- --------------------------------------------------------

--
-- Table structure for table `intervenir`
--

DROP TABLE IF EXISTS `intervenir`;
CREATE TABLE IF NOT EXISTS `intervenir` (
  `IDUS` int(11) NOT NULL,
  `IDINTERVENTION` int(11) NOT NULL,
  PRIMARY KEY (`IDUS`,`IDINTERVENTION`),
  KEY `FK_INTERVENIR2` (`IDINTERVENTION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `IDINTERVENTION` int(11) NOT NULL,
  `IDDEMINT` int(11) DEFAULT NULL,
  `DATEHEUREDEBUT` datetime DEFAULT NULL,
  `DATEHEUREFIN` datetime DEFAULT NULL,
  `TYPE` varchar(50) DEFAULT NULL,
  `OBSERVATION` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`IDINTERVENTION`),
  KEY `FK_CONCERNE` (`IDDEMINT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `piece`
--

DROP TABLE IF EXISTS `piece`;
CREATE TABLE IF NOT EXISTS `piece` (
  `nomPiece` varchar(25) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `idPiece` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idPiece`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `piece`
--

INSERT INTO `piece` (`nomPiece`, `reference`, `quantite`, `idPiece`) VALUES
('Pare-brises', 'Pare-brise Toyota', 2, 2),
('Joint', 'Joint', 2, 3),
('Porte', 'Porte avant avant droit d\'un MITSUBISHI L200', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(20) NOT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `pwd` varchar(20) DEFAULT NULL,
  `profil` varchar(25) DEFAULT NULL,
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`prenom`, `nom`, `mail`, `pwd`, `profil`, `iduser`) VALUES
('Fatou', 'SECK', 'seck.fatou@sagam.sn', 'passer', 'Intervenant', 12),
('Cheikh', 'FALL', 'fall.cheikh@sagam.sn', 'passer', 'demandeur', 17),
('Moussa', 'FALL', 'fall.moussa@sagam.sn', 'Passer', 'demandeur', 10),
('El Hadj Malick', 'DIOP', 'diop.elhadjmalick@sagam.sn', 'passer', 'intervenant', 18),
('Ousmane', 'NDIAYE', 'ndiaye.ousmane@sagam.sn', 'passer', 'demandeur', 19),
('Fatoumata', 'SOW', 'sow.fatoumata@sagam.sn', 'passer', 'intervenant', 20),
('GUEYE', 'Babacar', 'babacar.gueye@sagam.sn', 'passer', 'demandeur', 21),
('FALL', 'Sokhana', 'sokhna.fall@sagam.sn', 'passer', 'intervenant', 22),
('test', 'test', 'test.test@sagam.sn', 'passer', 'demandeur', 28);

-- --------------------------------------------------------

--
-- Table structure for table `utiliser`
--

DROP TABLE IF EXISTS `utiliser`;
CREATE TABLE IF NOT EXISTS `utiliser` (
  `IDPIE` int(11) NOT NULL,
  `IDINTERVENTION` int(11) NOT NULL,
  PRIMARY KEY (`IDPIE`,`IDINTERVENTION`),
  KEY `FK_UTILISER2` (`IDINTERVENTION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `IdVehicule` int(11) NOT NULL AUTO_INCREMENT,
  `numeroImmatriculation` varchar(12) DEFAULT NULL,
  `anneeCirculation` date DEFAULT NULL,
  `marque` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `puissance` varchar(50) DEFAULT NULL,
  `serie` varchar(30) DEFAULT NULL,
  `etat` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`IdVehicule`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicule`
--

INSERT INTO `vehicule` (`IdVehicule`, `numeroImmatriculation`, `anneeCirculation`, `marque`, `type`, `puissance`, `serie`, `etat`) VALUES
(2, 'DK-1245-AA', '2023-01-23', 'Audi', 'Audi A1', '510', 'Sportback', 'Fonctionnelle'),
(3, 'DK-1245-AA', '2023-01-23', 'Audi', 'Audi A1', '510', 'Sportback', 'Panne');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;






