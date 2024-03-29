-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Temps de generació: 12-05-2023 a les 14:04:39
-- Versió del servidor: 10.4.24-MariaDB
-- Versió de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `test`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `classificacio`
--

CREATE TABLE `classificacio` (
  `Nom` varchar(255) DEFAULT NULL,
  `cognoms` varchar(255) DEFAULT NULL,
  `temps_total` varchar(255) DEFAULT NULL,
  `ritme_km` varchar(255) DEFAULT NULL,
  `nom_club` varchar(255) DEFAULT NULL,
  `edat` int(11) DEFAULT NULL,
  `id_recorregut` varchar(11) DEFAULT NULL,
  `dni` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `classificacio`
--

INSERT INTO `classificacio` (`Nom`, `cognoms`, `temps_total`, `ritme_km`, `nom_club`, `edat`, `id_recorregut`, `dni`) VALUES
('Santi', 'Crespo Gomez', '01:12:14', '2', 'Sesga Runners', 19, 'Llarg', '49651131L'),
('Eloi', 'Blasco Tortajada', '04:12:14', '21', 'Sesga Runners', 21, 'Curt', '70665507P');

-- --------------------------------------------------------

--
-- Estructura de la taula `club`
--

CREATE TABLE `club` (
  `id_club` int(6) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `participants` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `club`
--

INSERT INTO `club` (`id_club`, `Nom`, `participants`) VALUES
(1, 'Unicaja Atletismo', '0'),
(2, 'Cornella', '0'),
(3, 'Nastic', '0'),
(4, 'New Balance Team', '0'),
(5, 'FCB Atletisme', '0'),
(6, 'Athletic Track Tarragona', '0'),
(7, 'CA  ADIDAS', '0'),
(8, 'Nike Running', '0'),
(9, 'Sesga Runners', '2');

-- --------------------------------------------------------

--
-- Estructura de la taula `inscripcio`
--

CREATE TABLE `inscripcio` (
  `DNI` varchar(10) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `id_club` varchar(50) NOT NULL,
  `edat` int(3) NOT NULL,
  `id_recorregut` varchar(6) DEFAULT NULL,
  `cognoms` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `inscripcio`
--

INSERT INTO `inscripcio` (`DNI`, `Nom`, `id_club`, `edat`, `id_recorregut`, `cognoms`) VALUES
('49651131L', 'Santi', 'Sesga Runners', 19, 'Llarg', 'Crespo Gomez'),
('70665507P', 'Eloi', 'Sesga Runners', 21, 'Curt', 'Blasco Tortajada');

--
-- Disparadors `inscripcio`
--
DELIMITER $$
CREATE TRIGGER `actualitzar_participants` AFTER INSERT ON `inscripcio` FOR EACH ROW BEGIN
    UPDATE club SET participants = (SELECT COUNT(*) FROM inscripcio WHERE id_club = NEW.id_club) WHERE id_club = NEW.id_club;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `actualizar_participants` AFTER INSERT ON `inscripcio` FOR EACH ROW BEGIN
    UPDATE club SET participants = (SELECT COUNT(*) FROM inscripcio WHERE id_club = NEW.id_club) WHERE id_club = NEW.id_club;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `actualizar_participants_after_delete` AFTER DELETE ON `inscripcio` FOR EACH ROW BEGIN
    UPDATE club SET participants = (SELECT COUNT(*) FROM inscripcio WHERE id_club = OLD.id_club) WHERE id_club = OLD.id_club;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `actualizar_participants_after_update` AFTER UPDATE ON `inscripcio` FOR EACH ROW BEGIN
    UPDATE club SET participants = (SELECT COUNT(*) FROM inscripcio WHERE id_club = NEW.id_club) WHERE id_club = NEW.id_club;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `inscripcio_insert_trigger` AFTER INSERT ON `inscripcio` FOR EACH ROW INSERT INTO classificacio (dni, Nom, cognoms, nom_club, edat, id_recorregut)
VALUES (NEW.dni, NEW.Nom, NEW.cognoms, NEW.id_club, NEW.edat, NEW.id_recorregut)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de la taula `recorregut`
--

CREATE TABLE `recorregut` (
  `id_recorregut` int(6) NOT NULL,
  `distancia` varchar(20) NOT NULL,
  `desnivell` varchar(20) NOT NULL,
  `dificultat` varchar(20) NOT NULL,
  `tipus` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `recorregut`
--

INSERT INTO `recorregut` (`id_recorregut`, `distancia`, `desnivell`, `dificultat`, `tipus`) VALUES
(467987, '42km', '150', 'alta', 'Llarg'),
(651234, '10km', '235', 'mitjana', 'Curt'),
(657896, '30km', '134', 'mitjana', 'Mig');

-- --------------------------------------------------------

--
-- Estructura de la taula `usuaris`
--

CREATE TABLE `usuaris` (
  `DNI` varchar(10) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `cognoms` varchar(20) NOT NULL,
  `edat` int(3) NOT NULL,
  `id_club` int(6) NOT NULL,
  `user` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `usuaris`
--

INSERT INTO `usuaris` (`DNI`, `Nom`, `cognoms`, `edat`, `id_club`, `user`, `password`) VALUES
('00000000A', 'Admin', 'Admin', 0, 156124, 'admin', 'admin'),
('36076897V', 'Javier', 'Guerra Polo', 39, 784125, 'User1', 'pass'),
('65410499V', 'Ayad', 'Lamdassem', 41, 736702, 'User2', 'pass'),
('70665507P', 'Jon', 'Echevarria Jimenez', 25, 156124, 'User3', 'pass'),
('X1182169S', 'Birhanu', 'Legese', 28, 567213, 'User4', 'pass'),
('X2081402V', 'Kenenisa', 'Bekele', 40, 784125, 'User5', 'pass'),
('X3270918L', 'Suguru', 'Osako', 31, 654234, 'User6', 'pass'),
('Y9868244Q', 'Kelvin', 'Kiptum', 23, 937125, 'User7', 'pass');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `classificacio`
--
ALTER TABLE `classificacio`
  ADD PRIMARY KEY (`dni`);

--
-- Índexs per a la taula `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id_club`);

--
-- Índexs per a la taula `inscripcio`
--
ALTER TABLE `inscripcio`
  ADD PRIMARY KEY (`DNI`),
  ADD KEY `DNI` (`DNI`),
  ADD KEY `id_recorregut` (`id_recorregut`);

--
-- Índexs per a la taula `recorregut`
--
ALTER TABLE `recorregut`
  ADD PRIMARY KEY (`id_recorregut`);

--
-- Índexs per a la taula `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`DNI`),
  ADD KEY `id_club` (`id_club`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
