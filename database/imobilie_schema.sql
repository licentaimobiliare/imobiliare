-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Gazda: 127.0.0.1
-- Timp de generare: 08 Iun 2014 la 12:34
-- Versiune server: 5.6.11
-- Versiune PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Bază de date: `imobilie_schema`
--
CREATE DATABASE IF NOT EXISTS `imobilie_schema` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `imobilie_schema`;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `camere`
--

CREATE TABLE IF NOT EXISTS `camere` (
  `idi` int(10) DEFAULT NULL,
  `nr_camere` int(11) DEFAULT NULL,
  `tip_camera` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `camere`
--

INSERT INTO `camere` (`idi`, `nr_camere`, `tip_camera`) VALUES
(1, 2, 'camera'),
(1, 1, 'bucatarie'),
(1, 1, 'baie'),
(2, 1, 'baie'),
(2, 1, 'camera'),
(1, 2, 'camere'),
(1, 1, 'bucatarie'),
(1, 1, 'baie'),
(2, 3, 'camere'),
(2, 2, 'bai'),
(2, 1, 'bucatarie'),
(3, 3, 'camere'),
(3, 2, 'bai'),
(3, 1, 'bucatarie'),
(4, 4, 'camere'),
(4, 2, 'bai'),
(4, 1, 'bucatarie'),
(5, 1, 'camera'),
(5, 1, 'baie'),
(5, 1, 'bucatarie'),
(6, 4, 'camere'),
(6, 2, 'bai'),
(6, 2, 'bucatarii'),
(7, 2, 'camere'),
(7, 1, 'bucatarie'),
(7, 1, 'baie'),
(8, 3, 'camere'),
(8, 1, 'bucatarie'),
(8, 1, 'baie'),
(9, 1, 'camera'),
(9, 1, 'bucatarie'),
(9, 1, 'baie'),
(10, 2, 'camere'),
(11, 1, 'camera'),
(12, 1, 'camera'),
(15, 2, 'camere'),
(16, 3, 'camere'),
(16, 2, 'bai'),
(16, 1, 'baie'),
(17, 1, 'camera'),
(17, 1, 'baie'),
(17, 1, 'bucatarie'),
(18, 3, 'camere'),
(18, 2, 'bai'),
(18, 1, 'bucatarie'),
(19, 4, 'camere'),
(19, 2, 'bai'),
(19, 1, 'bucatarie'),
(20, 2, 'camere'),
(20, 1, 'baie'),
(20, 1, 'bucatarie'),
(21, 3, 'camere'),
(21, 1, 'baie'),
(21, 1, 'bucatarie'),
(22, 4, 'camere'),
(22, 2, 'bucatarii'),
(22, 2, 'bai'),
(23, 2, 'camere'),
(24, 3, 'camere'),
(25, 1, 'camera'),
(28, 3, 'camere'),
(29, 3, 'camere'),
(29, 2, 'bucatarii'),
(29, 1, 'baie'),
(30, 2, 'camere'),
(30, 1, 'baie'),
(30, 1, 'bucatarie'),
(35, 120, 'dormitor');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `clienti`
--

CREATE TABLE IF NOT EXISTS `clienti` (
  `cnp` varchar(14) NOT NULL,
  `nume` varchar(50) DEFAULT NULL,
  `prenume` varchar(50) DEFAULT NULL,
  `telefon` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`cnp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `clienti`
--

INSERT INTO `clienti` (`cnp`, `nume`, `prenume`, `telefon`) VALUES
('1800505125663', 'Pop', 'Catalin', '0723654789'),
('1870312124512', 'Oprea', 'Matei', '0741123456'),
('1890512547885', 'Petean', 'Florin', '0745567234'),
('1920921124578', 'Popescu', 'Andrei', '0756636452'),
('1931212097885', 'Dan', 'Sorin', '0756987456'),
('2900101127889', 'Mihalache', 'Claudia', '0742256698'),
('2901010121314', 'Pop', 'Andreea', '0741125123'),
('2910212124010', 'Suciu', 'Maria', '0741125452'),
('2920912124556', 'Calin', 'Andreea', '0742123452'),
('2921210141525', 'Crainic', 'Tania', '0756632125');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `coduri_postale`
--

CREATE TABLE IF NOT EXISTS `coduri_postale` (
  `idcp` int(10) NOT NULL AUTO_INCREMENT,
  `cod_postal` int(10) DEFAULT NULL,
  PRIMARY KEY (`idcp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Salvarea datelor din tabel `coduri_postale`
--

INSERT INTO `coduri_postale` (`idcp`, `cod_postal`) VALUES
(1, 400451),
(2, 400445),
(3, 400405),
(4, 400408),
(5, 400341),
(6, 400129),
(7, 400641),
(8, 400420),
(9, 400457),
(10, 400469),
(11, 400237),
(12, 400196),
(13, 400400),
(14, 400505),
(15, 400506),
(16, 400198),
(17, 400875),
(18, 400895),
(19, 400896),
(20, 400897),
(21, 400898),
(22, 400890),
(23, 400891),
(24, 400892),
(25, 400893),
(26, 400894),
(27, 400895),
(28, 400896),
(29, 400897),
(30, 400898),
(31, 400899),
(32, 400900),
(33, 400100);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `date_imobile`
--

CREATE TABLE IF NOT EXISTS `date_imobile` (
  `idi` int(10) DEFAULT NULL,
  `nr` varchar(10) DEFAULT NULL,
  `apartament` int(11) DEFAULT NULL,
  `scara` varchar(20) DEFAULT NULL,
  `etaj` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `date_imobile`
--

INSERT INTO `date_imobile` (`idi`, `nr`, `apartament`, `scara`, `etaj`) VALUES
(1, '13', NULL, NULL, NULL),
(2, '15', NULL, NULL, NULL),
(3, '34', NULL, NULL, NULL),
(4, '45', NULL, NULL, NULL),
(5, '56', NULL, NULL, NULL),
(6, '3', 2, 'A', 5),
(7, '3', 34, 'B', 2),
(8, '4', 17, 'A', 3),
(9, '2', 23, 'B', 1),
(10, '2', 43, 'A', 6),
(11, '4', 2, 'A', 1),
(12, '12', 23, 'B', 0),
(13, '48', NULL, NULL, NULL),
(14, '34', NULL, NULL, NULL),
(15, '102', NULL, NULL, NULL),
(16, '59', NULL, NULL, NULL),
(17, '12', NULL, NULL, NULL),
(18, '2', NULL, NULL, NULL),
(19, '23', 9, 'A', 2),
(20, '4', 45, 'C', 3),
(21, '2', 23, 'A', 0),
(22, '34', 5, 'A', 1),
(23, '3', 45, 'C', 6),
(24, '10', 4, 'A', 1),
(25, '2', 34, 'B', 0),
(26, '45', NULL, NULL, NULL),
(27, '56', NULL, NULL, NULL),
(28, '105', NULL, NULL, NULL),
(29, '107', NULL, NULL, NULL),
(30, '120', NULL, NULL, NULL),
(35, '12345', 12345, '1215522', 12);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `finisaje`
--

CREATE TABLE IF NOT EXISTS `finisaje` (
  `idf` int(10) NOT NULL AUTO_INCREMENT,
  `finisaj` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idf`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Salvarea datelor din tabel `finisaje`
--

INSERT INTO `finisaje` (`idf`, `finisaj`) VALUES
(3, 'semifinisat'),
(7, 'extrafinisat'),
(8, 'finisat');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `imobil`
--

CREATE TABLE IF NOT EXISTS `imobil` (
  `idi` int(10) NOT NULL AUTO_INCREMENT,
  `pret` float DEFAULT NULL,
  `cartier` varchar(100) DEFAULT NULL,
  `data_inregistrare` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mp` float DEFAULT NULL,
  `descriere` text,
  `idf` int(10) DEFAULT NULL,
  `idt_constructie` int(10) DEFAULT NULL,
  `idtl` int(10) DEFAULT NULL,
  `idti` int(10) DEFAULT NULL,
  `data_constructie` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idp` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`idi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Salvarea datelor din tabel `imobil`
--

INSERT INTO `imobil` (`idi`, `pret`, `cartier`, `data_inregistrare`, `mp`, `descriere`, `idf`, `idt_constructie`, `idtl`, `idti`, `data_constructie`, `idp`) VALUES
(1, 50000, 'Grigorescu', '2014-04-20 07:54:35', 80, 'Casa are suprafata de 80 mp si teren cu suprafata de 1624mp. Casa de vanzare este compusa din o camera, baie si bucatarie. Aceasta este situata in Cluj-Napoca cartier Grigorescu in zona Casa Radio. Casa este din caramida, are fundatia din piatra, acoperis din tigla clasica si a fost construita inainte de 1990. Casa este dotata cu soba teracota  si dusumea. Casa necesita renovare si este nemobilata. Casa dispune de acces auto in curte, gradina si pivnita. Casa este intr-o zona linistita, aproape de mijloacele de transport in comun si in zona cu spatiu verde.', 2, 3, 1, 6, '1980-05-14 21:00:00', '2920921124578'),
(2, 100000, 'Zorilor', '2014-04-21 08:37:21', 95, 'Casa este din beton, are curte mare si un foisor. De asemenea este dotata cu ferestre din sticla si lemn.', 3, 3, 1, 6, '1975-10-09 21:00:00', '2900202124563'),
(3, 110000, 'Marasti', '2014-04-30 09:30:24', 70, 'Casa este din caramida, are fundatia din piatra, acoperis din tigla metalica si a fost construita inainte de 1990. Casa este dotata cu centrala proprie termopane. Casa este in stare buna si este nemobilata. Casa este intr-o zona linistita, aproape de mijloacele de transport in comun si in zona cu spatiu verde. ', 3, 3, 2, 6, '1975-03-02 22:00:00', '2651010124523'),
(4, 120000, 'Manastur', '2014-04-30 09:30:24', 66, 'Casa este dotata cu centrala proprie termopane. Casa este in stare buna si este nemobilata. Casa este intr-o zona linistita, aproape de mijloacele de transport in comun si in zona cu spatiu verde. ', 2, 2, 3, 6, '1992-09-20 21:00:00', '2651010124523'),
(5, 65000, 'Gheorgheni', '2014-04-30 09:30:24', 75, 'Casa este din caramida, are fundatia din beton si a fost construita intre anii 2000-2008. Casa este dotata cu termopane. Casa dispune de un loc de parcare.', 1, 2, 3, 6, '2000-03-11 22:00:00', '1920921124123'),
(6, 165000, 'Zorilor', '2014-04-30 09:30:24', 65, 'Apartamentul este confort lux, acesta este dotat cu centrala proprie, gresie moderna, parchet laminat si termopane. Imobilul este de lux, se vinde mobilat si utilat modern. Apartamentul este situat la etajul 5 din 10.', 2, 1, 1, 4, '2005-05-04 21:00:00', '1920921145612'),
(7, 68000, 'Grigorescu', '2014-04-30 09:30:24', 100, 'Apartamentul este confort 1, acesta este dotat cu centrala proprie, faianta moderna, gresie moderna, parchet laminat si termopane. Imobilul este renovat si se vinde mobilat si utilat modern. Apartamentul dispune de debara si este situat la etajul 2 din 4.', 1, 2, 2, 4, '2007-05-14 21:00:00', '1920921127895'),
(8, 98000, 'Grigorescu', '2014-04-30 09:30:24', 88, 'Acesta este situat la etajul 3 intr-un imobil cu 10 etaje in Cluj-Napoca cartier Grigorescu in zona Hotel Premier. Apartamentul este confort 1, acesta este dotat cu termoficare, faianta clasica, gresie clasica, parchet masiv si termopane. Apartamentul dispune de debara.', 3, 2, 3, 4, '2004-03-26 22:00:00', '1920921127895'),
(9, 55000, 'Zorilor', '2014-04-30 09:30:24', 98, 'apartamentul este situat la etajul 1 intr-un imobil cu 4 etaje in Cluj-Napoca cartier Zorilor. Apartamentul este confort 2, acesta este dotat cu termoficare, faianta clasica, gresie clasica, parchet masiv si termopane. Apartamentul dispune de debara.', 2, 3, 1, 5, '1987-03-11 22:00:00', '1920921123456'),
(10, 215000, 'Marasti', '2014-04-30 09:30:24', 160, 'Biroul dispune de doua incaperi, complet mobilate, intr-o cladire de 10 etaje, situat la etajul 6.', 1, 3, 2, 1, '1988-03-05 22:00:00', '1920921123456'),
(11, 195000, 'Manastur', '2014-04-30 09:30:24', 50, 'Biroul dispune de o singura incapere, complet mobilat, intr-o cladire de 4 etaje, situat la etajul 1.', 2, 2, 1, 1, '1999-09-20 21:00:00', '2920921479673'),
(12, 110000, 'Someseni', '2014-04-30 09:30:24', 110, 'Biroul este situat la parter, intr-un bloc de 4 etaje. Biroul dispune de loc de parcare si balcon.', 1, 1, 3, 1, '2012-04-04 21:00:00', '2920921124578'),
(13, 300000, 'Someseni', '2014-04-30 09:30:24', 350, 'Hala se poate utiliza in orice scop comercial, fiind foarte incapatoare.', 3, 1, 5, 2, '2011-05-04 21:00:00', '2920921124578'),
(14, 350000, 'Grigorescu', '2014-04-30 09:30:24', 400, 'Hala se poate utiliza in orice scop comercial, fiind foarte incapatoare.', 3, 2, 4, 2, '1992-09-20 21:00:00', '2900202124563'),
(15, 300000, 'Manastur', '2014-04-30 09:30:24', 200, 'Spatiu comercial dispune de 2 incaperi si este situat la soseaua principala.', 1, 2, 3, 3, '2004-12-31 22:00:00', '2651010124523'),
(16, 100000, 'Manastur', '2014-04-30 09:32:24', 70, 'Casa este dotata cu centrala proprie termopane. Casa este in stare buna si este nemobilata. Casa este intr-o zona linistita, aproape de mijloacele de transport in comun si in zona cu spatiu verde. ', 3, 3, 2, 6, '1989-02-01 22:00:00', '2900202124563'),
(17, 110000, 'Zorilor', '2014-04-30 09:32:24', 66, 'Casa este dotata cu centrala proprie termopane. Casa este in stare buna si este nemobilata.', 2, 2, 3, 6, '1992-09-20 21:00:00', '2920921124578'),
(18, 85000, 'Manastur', '2014-04-30 09:32:24', 75, 'Casa este din caramida, are fundatia din beton si a fost construita intre anii 2000-2008. Casa este dotata cu termopane. Casa dispune de un loc de parcare.', 1, 2, 3, 6, '2000-03-11 22:00:00', '2651010124523'),
(19, 65000, 'Gheorgheni', '2014-04-30 09:32:24', 65, 'Apartamentul este dotat cu centrala proprie, gresie moderna, parchet laminat si termopane. ', 2, 1, 1, 4, '2005-05-04 21:00:00', '1920921127895'),
(20, 80000, 'Grigorescu', '2014-04-30 09:32:24', 100, 'Imobilul este renovat si se vinde mobilat si utilat modern. Apartamentul dispune de debara si este situat la etajul 3 din 10.', 1, 2, 2, 4, '2007-05-14 21:00:00', '2920921479673'),
(21, 68000, 'Zorilor', '2014-04-30 09:32:24', 78, 'Apartamentul este confort 1, acesta este dotat cu termoficare, faianta clasica, gresie clasica, parchet masiv si termopane. ', 3, 2, 3, 4, '2004-03-26 22:00:00', '1920921123456'),
(22, 55000, 'Manastur', '2014-04-30 09:32:24', 102, 'Apartamentul este confort 2, acesta este dotat cu termoficare, faianta clasica, gresie clasica, parchet masiv si termopane. Apartamentul dispune de debara.', 2, 3, 1, 5, '1987-03-11 22:00:00', '1920921124123'),
(23, 200000, 'Zorilor', '2014-04-30 09:32:24', 160, 'Biroul dispune de doua incaperi, complet mobilate, intr-o cladire de 10 etaje, situat la etajul 6.', 1, 3, 2, 1, '1989-03-04 22:00:00', '1920921124123'),
(24, 195000, 'Manastur', '2014-04-30 09:32:24', 50, 'Biroul dispune de o singura incapere, complet mobilat, intr-o cladire de 4 etaje, situat la etajul 1.', 2, 2, 1, 1, '1999-09-20 21:00:00', '1920921123456'),
(25, 125000, 'Someseni', '2014-04-30 09:32:24', 110, 'Biroul este situat la parter, intr-un bloc de 4 etaje. Biroul dispune de loc de parcare si balcon.', 1, 1, 3, 1, '2012-04-04 21:00:00', '1920921127895'),
(26, 320000, 'Manastur', '2014-04-30 09:32:24', 350, 'Hala se poate utiliza in orice scop comercial, fiind foarte incapatoare.', 3, 1, 5, 2, '2011-05-04 21:00:00', '1920921124123'),
(27, 323000, 'Someseni', '2014-04-30 09:32:24', 389, 'Hala se poate utiliza in orice scop comercial, fiind foarte incapatoare.', 3, 2, 4, 2, '1992-09-20 21:00:00', '2900202124563'),
(28, 300000, 'Manastur', '2014-04-30 09:32:24', 187, 'Spatiu comercial dispune de 2 incaperi si este situat la soseaua principala.', 1, 2, 3, 3, '2004-12-31 22:00:00', '2920921479673'),
(29, 115000, 'Gheorgheni', '2014-04-30 09:41:46', 112, 'Casa este dotata cu centrala proprie termopane. Casa este in stare buna si este nemobilata. Casa este intr-o zona linistita, aproape de mijloacele de transport in comun si in zona cu spatiu verde. ', 3, 3, 2, 6, '1978-06-07 21:00:00', '1920921124123'),
(30, 117500, 'Marasti', '2014-04-30 09:41:46', 109, 'Casa este intr-o zona linistita, aproape de mijloacele de transport in comun si in zona cu spatiu verde. ', 2, 2, 3, 6, '1992-09-20 21:00:00', '1920921127895');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Salvarea datelor din tabel `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(3, 'Pan Africa Market', '1521 1st Ave, Seattle, WA', 47.608940, -122.340141, 'restaurant'),
(4, 'Buddha Thai & Bar', '2222 2nd Ave, Seattle, WA', 47.613590, -122.344391, 'bar'),
(5, 'The Melting Pot', '14 Mercer St, Seattle, WA', 47.624561, -122.356445, 'restaurant'),
(6, 'Ipanema Grill', '1225 1st Ave, Seattle, WA', 47.606365, -122.337654, 'restaurant'),
(7, 'Sake House', '2230 1st Ave, Seattle, WA', 47.612823, -122.345673, 'bar'),
(8, 'Crab Pot', '1301 Alaskan Way, Seattle, WA', 47.605961, -122.340363, 'restaurant'),
(9, 'Mama''s Mexican Kitchen', '2234 2nd Ave, Seattle, WA', 47.613976, -122.345467, 'bar'),
(10, 'Wingdome', '1416 E Olive Way, Seattle, WA', 47.617214, -122.326584, 'bar'),
(11, 'Piroshky Piroshky', '1908 Pike pl, Seattle, WA', 47.610126, -122.342834, 'restaurant');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `numar`
--

CREATE TABLE IF NOT EXISTS `numar` (
  `idn` int(10) NOT NULL AUTO_INCREMENT,
  `numar` int(11) NOT NULL,
  PRIMARY KEY (`idn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=711 ;

--
-- Salvarea datelor din tabel `numar`
--

INSERT INTO `numar` (`idn`, `numar`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35),
(36, 36),
(37, 37),
(38, 38),
(39, 39),
(40, 40),
(41, 41),
(42, 42),
(43, 43),
(44, 44),
(45, 45),
(46, 46),
(47, 47),
(48, 48),
(49, 49),
(50, 50),
(51, 51),
(52, 52),
(53, 53),
(54, 54),
(55, 55),
(56, 56),
(57, 57),
(58, 58),
(59, 59),
(60, 60),
(61, 61),
(62, 62),
(63, 63),
(64, 64),
(65, 65),
(66, 66),
(67, 67),
(68, 68),
(69, 69),
(70, 70),
(71, 71),
(72, 72),
(73, 73),
(74, 74),
(75, 75),
(76, 76),
(77, 77),
(78, 78),
(79, 79),
(80, 80),
(81, 81),
(82, 82),
(83, 83),
(84, 84),
(85, 85),
(86, 86),
(87, 87),
(88, 88),
(89, 89),
(90, 90),
(91, 91),
(92, 92),
(93, 93),
(94, 94),
(95, 95),
(96, 96),
(97, 97),
(98, 98),
(99, 99),
(100, 100),
(101, 101),
(102, 102),
(103, 103),
(104, 104),
(105, 105),
(106, 106),
(107, 107),
(108, 108),
(109, 109),
(110, 110),
(111, 111),
(112, 112),
(113, 113),
(114, 114),
(115, 115),
(116, 116),
(117, 117),
(118, 118),
(119, 119),
(120, 120),
(121, 121),
(122, 122),
(123, 123),
(124, 124),
(125, 125),
(126, 126),
(127, 127),
(128, 128),
(129, 129),
(130, 130),
(131, 131),
(132, 132),
(133, 133),
(134, 134),
(135, 135),
(136, 136),
(137, 137),
(138, 138),
(139, 139),
(140, 140),
(141, 141),
(142, 142),
(143, 143),
(144, 144),
(145, 145),
(146, 146),
(147, 147),
(148, 148),
(149, 149),
(150, 150),
(151, 151),
(152, 152),
(153, 153),
(154, 154),
(155, 155),
(156, 156),
(157, 157),
(158, 158),
(159, 159),
(160, 160),
(161, 161),
(162, 162),
(163, 163),
(164, 164),
(165, 165),
(166, 166),
(167, 167),
(168, 168),
(169, 169),
(170, 170),
(171, 171),
(172, 172),
(173, 173),
(174, 174),
(175, 175),
(176, 176),
(177, 177),
(178, 178),
(179, 179),
(180, 180),
(181, 181),
(182, 182),
(183, 183),
(184, 184),
(185, 185),
(186, 186),
(187, 187),
(188, 188),
(189, 189),
(190, 190),
(191, 191),
(192, 192),
(193, 193),
(194, 194),
(195, 195),
(196, 196),
(197, 197),
(198, 198),
(199, 199),
(200, 200),
(201, 201),
(202, 202),
(203, 203),
(204, 204),
(205, 205),
(206, 206),
(207, 207),
(208, 208),
(209, 209),
(210, 210),
(211, 211),
(212, 212),
(213, 213),
(214, 214),
(215, 215),
(216, 216),
(217, 217),
(218, 218),
(219, 219),
(220, 220),
(221, 221),
(222, 222),
(223, 223),
(224, 224),
(225, 225),
(226, 226),
(227, 227),
(228, 228),
(229, 229),
(230, 230),
(231, 231),
(232, 232),
(233, 233),
(234, 234),
(235, 235),
(236, 236),
(237, 237),
(238, 238),
(239, 239),
(240, 240),
(241, 241),
(242, 242),
(243, 243),
(244, 244),
(245, 245),
(246, 246),
(247, 247),
(248, 248),
(249, 249),
(250, 250),
(251, 251),
(252, 252),
(253, 253),
(254, 254),
(255, 255),
(256, 256),
(257, 257),
(258, 258),
(259, 259),
(260, 260),
(261, 261),
(262, 262),
(263, 263),
(264, 264),
(265, 265),
(266, 266),
(267, 267),
(268, 268),
(269, 269),
(270, 270),
(271, 271),
(272, 272),
(273, 273),
(274, 274),
(275, 275),
(276, 276),
(277, 277),
(278, 278),
(279, 279),
(280, 280),
(281, 281),
(282, 282),
(283, 283),
(284, 284),
(285, 285),
(286, 286),
(287, 287),
(288, 288),
(289, 289),
(290, 290),
(291, 291),
(292, 292),
(293, 293),
(294, 294),
(295, 295),
(296, 296),
(297, 297),
(298, 298),
(299, 299),
(300, 300),
(301, 301),
(302, 302),
(303, 303),
(304, 304),
(305, 305),
(306, 306),
(307, 307),
(308, 308),
(309, 309),
(310, 310),
(311, 311),
(312, 312),
(313, 313),
(314, 314),
(315, 315),
(316, 316),
(317, 317),
(318, 318),
(319, 319),
(320, 320),
(321, 321),
(322, 322),
(323, 323),
(324, 324),
(325, 325),
(326, 326),
(327, 327),
(328, 328),
(329, 329),
(330, 330),
(331, 331),
(332, 332),
(333, 333),
(334, 334),
(335, 335),
(336, 336),
(337, 337),
(338, 338),
(339, 339),
(340, 340),
(341, 341),
(342, 342),
(343, 343),
(344, 344),
(345, 345),
(346, 346),
(347, 347),
(348, 348),
(349, 349),
(350, 350),
(351, 351),
(352, 352),
(353, 353),
(354, 354),
(355, 355),
(356, 356),
(357, 357),
(358, 358),
(359, 359),
(360, 360),
(361, 361),
(362, 362),
(363, 363),
(364, 364),
(365, 365),
(366, 366),
(367, 367),
(368, 368),
(369, 369),
(370, 370),
(371, 371),
(372, 372),
(373, 373),
(374, 374),
(375, 375),
(376, 376),
(377, 377),
(378, 378),
(379, 379),
(380, 380),
(381, 381),
(382, 382),
(383, 383),
(384, 384),
(385, 385),
(386, 386),
(387, 387),
(388, 388),
(389, 389),
(390, 390),
(391, 391),
(392, 392),
(393, 393),
(394, 394),
(395, 395),
(396, 396),
(397, 397),
(398, 398),
(399, 399),
(400, 400),
(401, 401),
(402, 402),
(403, 403),
(404, 404),
(405, 405),
(406, 406),
(407, 407),
(408, 408),
(409, 409),
(410, 410),
(411, 411),
(412, 412),
(413, 413),
(414, 414),
(415, 415),
(416, 416),
(417, 417),
(418, 418),
(419, 419),
(420, 420),
(421, 421),
(422, 422),
(423, 423),
(424, 424),
(425, 425),
(426, 426),
(427, 427),
(428, 428),
(429, 429),
(430, 430),
(431, 431),
(432, 432),
(433, 433),
(434, 434),
(435, 435),
(436, 436),
(437, 437),
(438, 438),
(439, 439),
(440, 440),
(441, 441),
(442, 442),
(443, 443),
(444, 444),
(445, 445),
(446, 446),
(447, 447),
(448, 448),
(449, 449),
(450, 450),
(451, 451),
(452, 452),
(453, 453),
(454, 454),
(455, 455),
(456, 456),
(457, 457),
(458, 458),
(459, 459),
(460, 460),
(461, 461),
(462, 462),
(463, 463),
(464, 464),
(465, 465),
(466, 466),
(467, 467),
(468, 468),
(469, 469),
(470, 470),
(471, 471),
(472, 472),
(473, 473),
(474, 474),
(475, 475),
(476, 476),
(477, 477),
(478, 478),
(479, 479),
(480, 480),
(481, 481),
(482, 482),
(483, 483),
(484, 484),
(485, 485),
(486, 486),
(487, 487),
(488, 488),
(489, 489),
(490, 490),
(491, 491),
(492, 492),
(493, 493),
(494, 494),
(495, 495),
(496, 496),
(497, 497),
(498, 498),
(499, 499),
(500, 500),
(501, 501),
(502, 502),
(503, 503),
(504, 504),
(505, 505),
(506, 506),
(507, 507),
(508, 508),
(509, 509),
(510, 510),
(511, 511),
(512, 512),
(513, 513),
(514, 514),
(515, 515),
(516, 516),
(517, 517),
(518, 518),
(519, 519),
(520, 520),
(521, 521),
(522, 522),
(523, 523),
(524, 524),
(525, 525),
(526, 526),
(527, 527),
(528, 528),
(529, 529),
(530, 530),
(531, 531),
(532, 532),
(533, 533),
(534, 534),
(535, 535),
(536, 536),
(537, 537),
(538, 538),
(539, 539),
(540, 540),
(541, 541),
(542, 542),
(543, 543),
(544, 544),
(545, 545),
(546, 546),
(547, 547),
(548, 548),
(549, 549),
(550, 550),
(551, 551),
(552, 552),
(553, 553),
(554, 554),
(555, 555),
(556, 556),
(557, 557),
(558, 558),
(559, 559),
(560, 560),
(561, 561),
(562, 562),
(563, 563),
(564, 564),
(565, 565),
(566, 566),
(567, 567),
(568, 568),
(569, 569),
(570, 570),
(571, 571),
(572, 572),
(573, 573),
(574, 574),
(575, 575),
(576, 576),
(577, 577),
(578, 578),
(579, 579),
(580, 580),
(581, 581),
(582, 582),
(583, 583),
(584, 584),
(585, 585),
(586, 586),
(587, 587),
(588, 588),
(589, 589),
(590, 590),
(591, 591),
(592, 592),
(593, 593),
(594, 594),
(595, 595),
(596, 596),
(597, 597),
(598, 598),
(599, 599),
(600, 600),
(601, 601),
(602, 602),
(603, 603),
(604, 604),
(605, 605),
(606, 606),
(607, 607),
(608, 608),
(609, 609),
(610, 610),
(611, 611),
(612, 612),
(613, 613),
(614, 614),
(615, 615),
(616, 616),
(617, 617),
(618, 618),
(619, 619),
(620, 620),
(621, 621),
(622, 622),
(623, 623),
(624, 624),
(625, 625),
(626, 626),
(627, 627),
(628, 628),
(629, 629),
(630, 630),
(631, 631),
(632, 632),
(633, 633),
(634, 634),
(635, 635),
(636, 636),
(637, 637),
(638, 638),
(639, 639),
(640, 640),
(641, 641),
(642, 642),
(643, 643),
(644, 644),
(645, 645),
(646, 646),
(647, 647),
(648, 648),
(649, 649),
(650, 650),
(651, 651),
(652, 652),
(653, 653),
(654, 654),
(655, 655),
(656, 656),
(657, 657),
(658, 658),
(659, 659),
(660, 660),
(661, 661),
(662, 662),
(663, 663),
(664, 664),
(665, 665),
(666, 666),
(667, 667),
(668, 668),
(669, 669),
(670, 670),
(671, 671),
(672, 672),
(673, 673),
(674, 674),
(675, 675),
(676, 676),
(677, 677),
(678, 678),
(679, 679),
(680, 680),
(681, 681),
(682, 682),
(683, 683),
(684, 684),
(685, 685),
(686, 686),
(687, 687),
(688, 688),
(689, 689),
(690, 690),
(691, 691),
(692, 692),
(693, 693),
(694, 694),
(695, 695),
(696, 696),
(697, 697),
(698, 698),
(699, 699),
(700, 700),
(701, 701),
(702, 702),
(703, 703),
(704, 704),
(705, 705),
(706, 706),
(707, 707),
(708, 708),
(709, 709),
(710, 710);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `poze_imobil`
--

CREATE TABLE IF NOT EXISTS `poze_imobil` (
  `idi` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  KEY `idi` (`idi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `proprietari`
--

CREATE TABLE IF NOT EXISTS `proprietari` (
  `cnp` varchar(14) NOT NULL,
  `nume` varchar(100) DEFAULT NULL,
  `strada` varchar(100) DEFAULT NULL,
  `nr` int(11) DEFAULT NULL,
  `bl` varchar(10) DEFAULT NULL,
  `ap` int(11) DEFAULT NULL,
  `sc` varchar(10) DEFAULT NULL,
  `et` int(11) DEFAULT NULL,
  `oras` varchar(25) DEFAULT NULL,
  `judet` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cnp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `proprietari`
--

INSERT INTO `proprietari` (`cnp`, `nume`, `strada`, `nr`, `bl`, `ap`, `sc`, `et`, `oras`, `judet`) VALUES
('1920921124123', 'Rusu Florin', 'Avram Iancu', 20, 'E124', 24, 'C', 5, 'Turda', 'Cluj'),
('1920921124578', 'Popescu Eugen', 'Meteor', 9, '2', 26, 'B', 4, 'Deva', 'Hunedaora'),
('1920921127895', 'Puscas Marin', 'Zambilelor', 2, 'K4', 26, 'B', 1, 'Turda', 'Cluj'),
('1920921145612', 'Sas Valentin', 'Aviatorilor', 6, '23', 2, 'D', 4, 'Alba-Iulia', 'Alba'),
('2651010124523', 'Pop Valentina', 'Panselutelor', 4, 'C3', 23, 'A', 2, 'Cluj-Napoca', 'Cluj'),
('2900202124563', 'Matei Maria', 'Macilor', 2, '3', 5, 'A', 1, 'Turda', 'Cluj'),
('2920921123456', 'Sofroni Teodora', 'Republicii', 4, 'A2', 26, 'A', 1, 'Cluj-Napoca', 'Cluj'),
('2920921124578', 'Miclasan Anca', 'Parang', 10, '3', 33, 'B', 2, 'Cluj-Napoca', 'Cluj'),
('2920921479673', 'Crainic Tania', 'Aurel Vlaicu', 12, 'A6', 23, 'B', 1, 'Turda', 'Cluj-Napoca');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `rel_cod_strada_numar`
--

CREATE TABLE IF NOT EXISTS `rel_cod_strada_numar` (
  `idcp` int(10) DEFAULT NULL,
  `ids` int(10) DEFAULT NULL,
  `idn` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `rel_cod_strada_numar_imobil`
--

CREATE TABLE IF NOT EXISTS `rel_cod_strada_numar_imobil` (
  `idcp` int(10) DEFAULT NULL,
  `ids` int(10) DEFAULT NULL,
  `idn` int(10) DEFAULT NULL,
  `idi` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `rel_cod_strada_numar_imobil`
--

INSERT INTO `rel_cod_strada_numar_imobil` (`idcp`, `ids`, `idn`, `idi`) VALUES
(1, 1, 13, 1),
(2, 1, 15, 2),
(3, 3, 34, 3),
(4, 4, 45, 4),
(4, 4, 56, 5),
(5, 5, 4, 6),
(6, 6, 4, 7),
(6, 6, 4, 8),
(7, 7, 8, 9),
(7, 7, 8, 10),
(8, 8, 10, 11),
(9, 9, 25, 12),
(10, 10, 48, 13),
(11, 11, 34, 14),
(12, 12, 102, 15),
(13, 13, 59, 16),
(13, 13, 12, 17),
(13, 13, 2, 18),
(14, 14, 9, 19),
(14, 14, 9, 20),
(14, 14, 9, 21),
(14, 14, 9, 22),
(15, 15, 2, 23),
(16, 16, 7, 24),
(16, 16, 7, 25),
(17, 17, 45, 26),
(17, 17, 56, 27),
(17, 17, 105, 28),
(15, 15, 107, 29),
(15, 15, 120, 30),
(120, 12, 125, 35);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `servicii`
--

CREATE TABLE IF NOT EXISTS `servicii` (
  `ids` int(10) NOT NULL AUTO_INCREMENT,
  `serviciu` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ids`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Salvarea datelor din tabel `servicii`
--

INSERT INTO `servicii` (`ids`, `serviciu`) VALUES
(1, 'vanzare'),
(2, 'cumparare'),
(3, 'inchiriere');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `strazi`
--

CREATE TABLE IF NOT EXISTS `strazi` (
  `idts` int(10) DEFAULT NULL,
  `nume` varchar(200) DEFAULT NULL,
  `ids` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ids`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Salvarea datelor din tabel `strazi`
--

INSERT INTO `strazi` (`idts`, `nume`, `ids`) VALUES
(1, 'Azuga', 1),
(2, 'Stefan cel Mare', 2),
(1, 'Baisoara ', 3),
(1, 'Borsec ', 4),
(2, 'Eroilor ', 5),
(2, 'Muncii ', 6),
(3, 'Albini Septimiu ', 7),
(3, 'Alverna ', 8),
(4, 'Principala', 9),
(5, 'Manastur', 10),
(5, 'Floresti', 11),
(3, 'Atelierului ', 12),
(3, 'Aurorei ', 13),
(1, 'Snagov ', 14),
(1, 'Castanilor ', 15),
(3, 'Aviatorilor ', 16),
(3, 'Bradului ', 17);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `tip_constructii`
--

CREATE TABLE IF NOT EXISTS `tip_constructii` (
  `idtc` int(10) NOT NULL AUTO_INCREMENT,
  `tip_constructie` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idtc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Salvarea datelor din tabel `tip_constructii`
--

INSERT INTO `tip_constructii` (`idtc`, `tip_constructie`) VALUES
(1, 'constructie noua'),
(2, '1990-2010'),
(3, '<1990');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `tip_imobil`
--

CREATE TABLE IF NOT EXISTS `tip_imobil` (
  `idti` int(10) NOT NULL AUTO_INCREMENT,
  `tip_imobil` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idti`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Salvarea datelor din tabel `tip_imobil`
--

INSERT INTO `tip_imobil` (`idti`, `tip_imobil`) VALUES
(1, 'birou'),
(2, 'hala'),
(3, 'spatiu comercial'),
(4, 'ap decomandat'),
(5, 'ap semidecomandat'),
(6, 'casa');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `tip_locuinte`
--

CREATE TABLE IF NOT EXISTS `tip_locuinte` (
  `idtl` int(10) NOT NULL AUTO_INCREMENT,
  `tip_locuinta` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idtl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Salvarea datelor din tabel `tip_locuinte`
--

INSERT INTO `tip_locuinte` (`idtl`, `tip_locuinta`) VALUES
(1, 'central'),
(2, 'ultracentral'),
(3, 'periferie'),
(4, 'intravilan'),
(5, 'extravilan');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `tip_strazi`
--

CREATE TABLE IF NOT EXISTS `tip_strazi` (
  `idts` int(10) NOT NULL AUTO_INCREMENT,
  `tip_strada` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idts`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Salvarea datelor din tabel `tip_strazi`
--

INSERT INTO `tip_strazi` (`idts`, `tip_strada`) VALUES
(1, 'alee'),
(2, 'bulevard'),
(3, 'strada'),
(4, 'sosea'),
(5, 'cale'),
(6, 'drum');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `tranzactii`
--

CREATE TABLE IF NOT EXISTS `tranzactii` (
  `idi` int(10) DEFAULT NULL,
  `cnp` varchar(14) DEFAULT NULL,
  `ids` int(10) DEFAULT NULL,
  `data_vanzare` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_final_vanzare` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `tranzactii`
--

INSERT INTO `tranzactii` (`idi`, `cnp`, `ids`, `data_vanzare`, `data_final_vanzare`) VALUES
(1, '2920921124578', 1, '2014-04-07 21:00:00', '2014-04-22 21:00:00'),
(1, '1800505125663', 2, '2014-04-12 21:00:00', '2014-04-22 21:00:00'),
(2, '1870312124512', 3, '2014-03-31 21:00:00', '2014-07-30 21:00:00'),
(3, '2651010124523', 1, '2014-04-09 21:00:00', '2014-05-30 21:00:00'),
(3, '2901010121314', 2, '2014-05-27 21:00:00', '2014-05-30 21:00:00'),
(4, '2921210141525', 3, '2014-04-30 21:00:00', '2014-11-29 22:00:00'),
(5, '2920912124556', 3, '2014-04-30 21:00:00', '2014-08-30 21:00:00'),
(10, '2920912124556', 3, '2014-03-31 21:00:00', '2014-07-16 21:00:00'),
(11, '1870312124512', 2, '2014-04-29 21:00:00', '2014-05-22 21:00:00'),
(13, '2920912124556', 2, '2014-04-10 21:00:00', '2014-04-29 21:00:00'),
(15, '1890512547885', 3, '2014-04-15 21:00:00', '2014-04-22 21:00:00'),
(16, '1931212097885', 3, '2014-04-08 21:00:00', '2014-04-25 21:00:00'),
(18, '2900101127889', 3, '2014-05-15 21:00:00', '2014-04-22 21:00:00'),
(19, '2920912124556', 3, '2014-03-31 21:00:00', '2014-07-30 21:00:00'),
(20, '2921210141525', 3, '2014-04-30 21:00:00', '2014-06-29 21:00:00'),
(5, 'florilor', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '123456', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '56', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1, '1', 1, '2014-05-07 20:07:58', '2014-05-12 21:00:00');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `nume_user` varchar(45) NOT NULL,
  `parola` varchar(45) NOT NULL,
  `mentiuni` varchar(100) NOT NULL,
  `telefon` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `tip` varchar(50) DEFAULT 'user',
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`iduser`, `nume_user`, `parola`, `mentiuni`, `telefon`, `email`, `tip`) VALUES
(1, 'bianca', 'parola', '', '', 'bianca_ioaniciu@yahoo.com', 'administrator'),
(2, 'bianca2', '1234', 'meteor', '075235623', 'bianca2@yahoo.com', 'user'),
(7, 'bianca3', '12345', 'bla bla bla', '0123456', 'bianca_ioaniciu@yahoo.com', 'user'),
(8, 'dan andrei', '1', '1', '1223', 'asdd@yahoo.com', 'user'),
(9, 'matei', '11', '11111', '111', 'aaaa@yahoo.com', 'user'),
(10, 'andrei popescu', '1', '1', '134', 'ap@yahoo.com', 'user'),
(12, 'Calin Andrei', '1234', 'Angajat al agentiei', '0756698785', 'calin.andrei@yahoo.com', 'user'),
(13, 'Matei Calin', '12345', 'Angajat al agentiei', '0756636458', 'matei.calin@yahoo.com', 'angajat'),
(14, 'Marius ', '12345', 'Angajat al agentiei', '0741125478', 'marius.pop@yahoo.com', 'angajat');

--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `poze_imobil`
--
ALTER TABLE `poze_imobil`
  ADD CONSTRAINT `poze_imobil_ibfk_1` FOREIGN KEY (`idi`) REFERENCES `imobil` (`idi`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
