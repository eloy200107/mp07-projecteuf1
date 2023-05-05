-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Temps de generació: 04-05-2023 a les 13:28:31
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
('Eloi', 'Blasco', '212', '2', 'Nastic', 12, 'llarg', '12345678A'),
('Santi', 'Crespo Gomez', '12', '12', 'LA CANONJA', 18, 'mig', '12345678B');

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
(156124, 'Unicaja Atletismo', '0'),
(356478, 'Cornella', '1'),
(543787, 'Nastic', '1'),
(567213, 'New Balance Team', '0'),
(654234, 'FCB Atletisme', '0'),
(736702, 'Athletic Track Tarragona', '0'),
(784125, 'CA  ADIDAS', '0'),
(937125, 'Nike Running', '0');

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
('12345678A', 'Eloi', 'Nastic', 12, 'llarg', 'Blasco'),
('12345678B', 'Santi', 'LA CANONJA', 18, 'mig', 'Crespo Gomez');

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
  `dificultat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `recorregut`
--

INSERT INTO `recorregut` (`id_recorregut`, `distancia`, `desnivell`, `dificultat`) VALUES
(467987, '42km', '150', 'alta'),
(651234, '10km', '235', 'mitjana'),
(657896, '30km', '134', 'mitjana');

-- --------------------------------------------------------

--
-- Estructura de la taula `usuaris`
--

CREATE TABLE `usuaris` (
  `DNI` varchar(10) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `cognoms` varchar(20) NOT NULL,
  `edat` int(3) NOT NULL,
  `id_club` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `usuaris`
--

INSERT INTO `usuaris` (`DNI`, `Nom`, `cognoms`, `edat`, `id_club`) VALUES
('36076897V', 'Javier', 'Guerra Polo', 39, 784125),
('65410499V', 'Ayad', 'Lamdassem', 41, 736702),
('70665507P', 'Jon', 'Echevarria Jimenez', 25, 156124),
('X1182169S', 'Birhanu', 'Legese', 28, 567213),
('X2081402V', 'Kenenisa', 'Bekele', 40, 784125),
('X3270918L', 'Suguru', 'Osako', 31, 654234),
('Y9868244Q', 'Kelvin', 'Kiptum', 23, 937125);

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
