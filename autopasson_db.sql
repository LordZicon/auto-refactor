-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 30 okt 2014 om 14:20
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `autopasson_db`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `naam` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `gebruikersnaam` varchar(32) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `last_online` timestamp NULL DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden geëxporteerd voor tabel `admins`
--

INSERT INTO `admins` (`admin_id`, `naam`, `email`, `gebruikersnaam`, `wachtwoord`, `role`, `last_online`, `isActive`) VALUES
(1, 'Admin', 'drhboers@gmail.com', 'admin', '$1$Mv..Jw3.$lOAOYvDpMA2.Ykhy30Qrg.', 1, '2014-10-25 10:11:09', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `brandstof_types`
--

CREATE TABLE IF NOT EXISTS `brandstof_types` (
  `brandstof_type_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `brandstof_type` varchar(12) NOT NULL,
  PRIMARY KEY (`brandstof_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden geëxporteerd voor tabel `brandstof_types`
--

INSERT INTO `brandstof_types` (`brandstof_type_id`, `brandstof_type`) VALUES
(1, 'Benzine'),
(2, 'Diesel'),
(3, 'LPG');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kleuren`
--

CREATE TABLE IF NOT EXISTS `kleuren` (
  `kleur_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `kleur` varchar(32) NOT NULL,
  PRIMARY KEY (`kleur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Gegevens worden geëxporteerd voor tabel `kleuren`
--

INSERT INTO `kleuren` (`kleur_id`, `kleur`) VALUES
(1, 'Beige'),
(2, 'Blauw'),
(3, 'Geel'),
(4, 'Grijs'),
(5, 'Groen'),
(6, 'Rood'),
(7, 'Wit'),
(8, 'Zwart');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `maanden`
--

CREATE TABLE IF NOT EXISTS `maanden` (
  `maand_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `waarde` char(2) NOT NULL,
  `maand` char(2) NOT NULL,
  PRIMARY KEY (`maand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Gegevens worden geëxporteerd voor tabel `maanden`
--

INSERT INTO `maanden` (`maand_id`, `waarde`, `maand`) VALUES
(1, '01', '01'),
(2, '02', '02'),
(3, '03', '03'),
(4, '04', '04'),
(5, '05', '05'),
(6, '06', '06'),
(7, '07', '07'),
(8, '08', '08'),
(9, '09', '09'),
(10, '10', '10'),
(11, '11', '11'),
(12, '12', '12');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `merken`
--

CREATE TABLE IF NOT EXISTS `merken` (
  `merk_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `merk` varchar(32) NOT NULL,
  PRIMARY KEY (`merk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Gegevens worden geëxporteerd voor tabel `merken`
--

INSERT INTO `merken` (`merk_id`, `merk`) VALUES
(1, 'BMW'),
(2, 'Citroen'),
(3, 'Daewoo'),
(4, 'Fiat'),
(5, 'Kia'),
(6, 'Mitsubishi'),
(7, 'Nissan'),
(8, 'Opel'),
(9, 'Peugeot'),
(10, 'Renault'),
(11, 'Skoda'),
(12, 'Volkswagen'),
(13, 'Volvo'),
(14, 'Daihatsu'),
(15, 'Alpha Romeo'),
(16, 'Audi'),
(17, 'Cadilac'),
(18, 'Chevrolet'),
(19, 'Ford'),
(20, 'Honda'),
(21, 'Hyundai'),
(22, 'Lada'),
(23, 'Lancia'),
(24, 'Land Rover'),
(25, 'Lexus'),
(26, 'Mazda'),
(27, 'Alpha Romeo'),
(28, 'Mercedes-Benz'),
(30, 'Porsche'),
(31, 'Rover'),
(32, 'Saab'),
(33, 'Seat'),
(34, 'Suzuki');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `modellen`
--

CREATE TABLE IF NOT EXISTS `modellen` (
  `model_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `model` varchar(24) NOT NULL,
  PRIMARY KEY (`model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Gegevens worden geëxporteerd voor tabel `modellen`
--

INSERT INTO `modellen` (`model_id`, `model`) VALUES
(1, 'Bedrijfswagen'),
(2, 'Cabrio'),
(3, 'Coupé'),
(4, 'Hatchback'),
(5, 'Sedan'),
(6, 'Stationwagon');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `occasions`
--

CREATE TABLE IF NOT EXISTS `occasions` (
  `occasion_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `merk_id` tinyint(4) DEFAULT NULL,
  `model_id` tinyint(4) DEFAULT NULL,
  `brandstof_type_id` tinyint(4) DEFAULT NULL,
  `transmissie_id` tinyint(4) DEFAULT NULL,
  `kleur_id` tinyint(4) DEFAULT NULL,
  `uitvoering` varchar(64) DEFAULT NULL,
  `bouwjaar` date DEFAULT NULL,
  `kilometerstand` int(11) DEFAULT NULL,
  `vermogen` varchar(32) DEFAULT NULL,
  `verbruik` char(5) DEFAULT NULL,
  `gewicht` int(11) DEFAULT NULL,
  `prijs` int(11) DEFAULT NULL,
  `vervaldatum` date DEFAULT NULL,
  `cilinderinhoud` smallint(6) DEFAULT NULL,
  `cilinders` tinyint(4) DEFAULT NULL,
  `deuren` char(1) DEFAULT NULL,
  `details` text,
  `omschrijving` text,
  `ingevoerd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isGezien` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`occasion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Gegevens worden geëxporteerd voor tabel `occasions`
--

INSERT INTO `occasions` (`occasion_id`, `merk_id`, `model_id`, `brandstof_type_id`, `transmissie_id`, `kleur_id`, `uitvoering`, `bouwjaar`, `kilometerstand`, `vermogen`, `verbruik`, `gewicht`, `prijs`, `vervaldatum`, `cilinderinhoud`, `cilinders`, `deuren`, `details`, `omschrijving`, `ingevoerd`, `isGezien`) VALUES
(2, 2, 5, 1, 2, 2, 'Xsara Picasso 1.8i-16V Image', '2004-11-00', 208487, '85 KW / 116 PK', '12,99', 1220, 2450, '2015-07-07', 1749, 4, '5', 'Nieuwe A.P.K.', NULL, '2014-10-21 21:27:31', 6),
(3, 3, 3, 1, 2, 4, 'Leganza 2.0-16V 	', '2001-09-00', 176416, '98 KW / 133 PK', '10,87', 1300, 999, '2015-02-18', 1998, 4, '4', 'Europe FULL OPTIONS!   ', NULL, '2014-10-21 21:27:31', 8),
(4, 3, 5, 1, 2, 4, 'Tacuma 1.8 SE ', '2000-10-00', 137056, '72 KW / 98 PK', '11,11', 1247, 1350, '2015-08-08', 1761, 4, '5', ' ', NULL, '2014-10-21 21:27:31', 3),
(5, 14, 4, 1, 2, 2, 'Move 1.0-12V', '2000-03-00', 153635, '41 KW / 56 PK', '17,54', 790, 1350, '2015-02-28', 989, 3, '5', 'Nieuwe distributie riem', NULL, '2014-10-21 21:27:31', 2),
(8, 5, 6, 1, 2, 2, 'Carens 1.8 LS ', '2001-01-00', 124955, '81 KW / 110 PK', '11,15', 1164, 1450, '2015-04-13', 1793, 4, '5', 'Airco', NULL, '2014-10-21 21:27:31', 2),
(9, 5, 6, 3, 2, 2, 'Carens 1.8-16V LX ', '2003-10-00', 124955, '93 KW / 126 PK', '12,35', 1411, 2250, '2015-04-12', 1793, 4, '5', 'Nieuwe A.P.K.', NULL, '2014-10-21 21:27:31', 2),
(10, 5, 6, 1, 2, 4, 'Rio 1.3 RS Visto ', '2003-10-00', 112116, '60 KW / 82 PK', '14,93', 1011, 1950, '2015-10-21', 1343, 4, '4', 'Nieuwe A.P.K.', NULL, '2014-10-21 21:27:31', 2),
(11, 18, 4, 1, 2, 1, 'Matiz 0.8 Pure', '2006-05-01', 157146, '38 KW / 52 PK', '19,23', 750, 1950, '2015-10-03', 796, 3, '5', 'Getint glas, achterwisser+sproeier, ABS, side airbag(s) voor, in delen neerkl. achterb., hoofdst. voor en achter, dubbele airbag, startblokkering, etc.', 'Test', '2014-10-28 11:31:18', 6),
(12, 2, 4, 1, 2, 1, 'C2 1.1i Ligne Prestige', '2003-08-00', 153546, '44 KW / 60 PK', '16,95', 907, 2750, '2015-02-14', 1124, 4, '3', 'Elektrische ramen voor, centrale deurvergr., boordcomputer, stuurbekrachtiging, afst.bed.voor c.deurv., dubbele airbag, startblokkering, etc.', '', '2014-10-29 09:34:26', 0),
(13, 6, 4, 1, 2, 1, 'Carisma 1.6 Classic', '2001-01-01', 167427, '73 KW / 99 PK', '13,7', 1150, 1350, '2015-10-09', 1597, 4, '5', 'Getint glas, achterspoiler, centrale deurvergr., hoofdsteunen voor, hoofdsteunen achter, stuurbekrachtiging, airco, airbag bestuurder, etc.', '', '2014-10-29 11:13:28', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `occasion_photos`
--

CREATE TABLE IF NOT EXISTS `occasion_photos` (
  `photo_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `occasion_id` smallint(6) NOT NULL,
  `photo` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`photo_id`),
  KEY `occasion_id` (`occasion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Gegevens worden geëxporteerd voor tabel `occasion_photos`
--

INSERT INTO `occasion_photos` (`photo_id`, `occasion_id`, `photo`) VALUES
(7, 2, 'citroen1.jpg'),
(8, 2, 'citroen2.jpg'),
(9, 2, 'citroen3.jpg'),
(10, 2, 'citroen4.jpg'),
(11, 2, 'citroen5.jpg'),
(12, 2, 'citroen6.jpg'),
(13, 3, 'daewoo1_1.jpg'),
(14, 3, 'daewoo1_2.jpg'),
(15, 3, 'daewoo1_3.jpg'),
(16, 3, 'daewoo1_4.jpg'),
(17, 3, 'daewoo1_5.jpg'),
(18, 3, 'daewoo1_6.jpg'),
(19, 4, 'daewoo2_1.jpg'),
(20, 4, 'daewoo2_2.jpg'),
(21, 4, 'daewoo2_3.jpg'),
(22, 4, 'daewoo2_4.jpg'),
(23, 4, 'daewoo2_5.jpg'),
(24, 4, 'daewoo2_6.jpg'),
(25, 5, 'daihatsu1.jpg'),
(26, 5, 'daihatsu2.jpg'),
(27, 5, 'daihatsu3.jpg'),
(28, 5, 'daihatsu4.jpg'),
(29, 5, 'daihatsu5.jpg'),
(30, 5, 'daihatsu6.jpg'),
(43, 8, 'kia1_1.jpg'),
(44, 8, 'kia1_2.jpg'),
(45, 8, 'kia1_3.jpg'),
(46, 8, 'kia1_4.jpg'),
(47, 8, 'kia1_5.jpg'),
(48, 8, 'kia1_6.jpg'),
(49, 9, 'kia2_1.jpg'),
(50, 9, 'kia2_2.jpg'),
(51, 9, 'kia2_3.jpg'),
(52, 9, 'kia2_4.jpg'),
(53, 9, 'kia2_5.jpg'),
(54, 9, 'kia2_6.jpg'),
(55, 10, 'kia3_1.jpg'),
(56, 10, 'kia3_2.jpg'),
(57, 10, 'kia3_3.jpg'),
(58, 10, 'kia3_4.jpg'),
(59, 10, 'kia3_5.jpg'),
(60, 10, 'kia3_6.jpg'),
(71, 11, '34df3a9963434c70171b47caf48988eb.jpg'),
(72, 11, 'fa9e856bab20ca96188950a40e32629e.jpg'),
(73, 11, 'f6e3e7061d6e32c4f149e445d3b9ac37.jpg'),
(74, 11, '923ab1277643095e4fc4e55909cb90a1.jpg'),
(75, 11, '82efb22eaff4f89bea7d29e5d050f9e4.jpg'),
(76, 12, '2194f65ee818151b9af296fb7909884d.jpg'),
(77, 12, 'c1d0ef0505c685e1f11e5ad3f98c30ef.jpg'),
(78, 12, '31ce965709a862193fabb1e415077aff.jpg'),
(79, 12, 'e4ce7e8319610a016da1f5b9b7a936d8.jpg'),
(80, 12, '77934fb13d549e0fe7039cceb2589e1b.jpg'),
(81, 12, '7ccf0f1831c8a2a91f5135d334cd3da7.jpg'),
(82, 12, 'f97a6c28d3442d4ba0d33cd5c46a7f30.jpg'),
(83, 12, 'e4d4e9d3c3cc03cd737eccdc616f6b61.jpg'),
(84, 12, '6ba50121045801e9793c1b7aac0df386.jpg'),
(85, 13, '43a751fbf83b28fde2a9bef04bbf7f1f.jpg'),
(86, 13, 'e786f89cd2e97bce85bebee4147cc209.jpg'),
(87, 13, '656655cfec24c4215ec315617ea5541a.jpg'),
(88, 13, 'f41342c3e31141669afb97857f819e55.jpg'),
(89, 13, '3e5ac7ffe06ff25a185ee2788bc2d168.jpg'),
(90, 13, 'e12b5b61a59f2737d8429d83ca05d7b3.jpg'),
(91, 13, '5bfefe91bd5415c1b8a96f9338945015.jpg'),
(92, 13, '208c50c86f1d957702cb0b88eea6a1c6.jpg'),
(93, 13, '548f62433ea5ab1f7454bdd0b5d1093f.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `paginas`
--

CREATE TABLE IF NOT EXISTS `paginas` (
  `pagina_id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `pagina_naam` varchar(32) DEFAULT NULL,
  `pagina_sequence` tinyint(4) NOT NULL DEFAULT '0',
  `pagina_class` varchar(40) DEFAULT NULL,
  `pagina_url` varchar(32) DEFAULT NULL,
  `pagina_titel` varchar(128) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pagina_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Gegevens worden geëxporteerd voor tabel `paginas`
--

INSERT INTO `paginas` (`pagina_id`, `pagina_naam`, `pagina_sequence`, `pagina_class`, `pagina_url`, `pagina_titel`, `isActive`) VALUES
(1, 'Home', 1, 'home', 'index.php', 'Welkom bij Auto Passon', 1),
(2, 'Zoeken', 2, 'zoeken', 'zoeken.php', 'Zoeken', 1),
(3, 'Over Ons', 3, 'over', 'over-ons.php', 'Over Auto passon', 1),
(4, 'Service', 4, 'service', 'service.php', 'Auto Passon Service', 1),
(5, 'Contact', 6, 'contact', 'contact.php', 'Auto Passon Contact', 1),
(6, 'Disclaimer', 7, 'disclaimer', 'disclaimer.php', 'Auto Passon Disclaimer', 1),
(7, 'Privacy', 8, 'privacy', 'privacy.php', 'Auto Passon Privacy', 1),
(8, 'Links', 5, 'links', 'links.php', 'Passon Auto, nuttige links', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pagina_backgrounds`
--

CREATE TABLE IF NOT EXISTS `pagina_backgrounds` (
  `background_id` smallint(2) NOT NULL AUTO_INCREMENT,
  `pagina_id` tinyint(2) DEFAULT NULL,
  `background` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`background_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pagina_content`
--

CREATE TABLE IF NOT EXISTS `pagina_content` (
  `content_id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `pagina_id` tinyint(2) NOT NULL,
  `meta_title` varchar(64) DEFAULT NULL,
  `meta_description` varchar(128) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `content` text,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `pagina_content`
--

INSERT INTO `pagina_content` (`content_id`, `pagina_id`, `meta_title`, `meta_description`, `meta_keywords`, `title`, `content`, `isActive`) VALUES
(1, 1, 'Auto Passon | Voordelige tweede hands autos.', 'Voordelige occasions in de regio Amersfoort, Den Dolder, Soest, Soesterberg, Utrecht, Zeist en omstreken.', 'occasion,occasions,auto,auto''s,gebruikte auto''s,tweede hands auto''s,tweede hands auto kopen', NULL, NULL, 0),
(2, 2, 'Auto Passon | Zoek voordelige occasions', 'Zoek voordelige occasions in de regio Amersfoort, Den Dolder, Soest Soesterberg, Utrecht, Zeist en omstreken.', 'zoeken,occasion,occasions,auto,autos,vind gebruikte auto''s,tweede hands auto''s, auto''s zoeken,occasion zoeken,zoek gebruikte auto''s', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `prijzen`
--

CREATE TABLE IF NOT EXISTS `prijzen` (
  `prijs_value` smallint(6) NOT NULL,
  `prijs` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `prijzen`
--

INSERT INTO `prijzen` (`prijs_value`, `prijs`) VALUES
(500, '500'),
(1000, '1.000'),
(1500, '1.500'),
(2000, '2.000'),
(2500, '2.500'),
(3000, '3.000'),
(3500, '3.500'),
(4000, '4.000'),
(5000, '5.000'),
(7500, '7.500'),
(10000, '10.000'),
(12500, '12.500'),
(15000, '15.000'),
(17500, '17.500'),
(20000, '20.000'),
(22500, '22.500'),
(25000, '25.000'),
(30000, '30.000'),
(32767, '35.000'),
(32767, '40.000'),
(32767, '45.000');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` tinyint(4) NOT NULL,
  `role` varchar(24) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `roles`
--

INSERT INTO `roles` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'Super admin'),
(3, 'Owner');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `slideshow_photos`
--

CREATE TABLE IF NOT EXISTS `slideshow_photos` (
  `photo_id` smallint(2) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Gegevens worden geëxporteerd voor tabel `slideshow_photos`
--

INSERT INTO `slideshow_photos` (`photo_id`, `photo`) VALUES
(1, '1.jpg'),
(2, '2.jpg'),
(3, '3.jpg'),
(4, '4.jpg'),
(5, '5.jpg'),
(6, '6.jpg'),
(7, '7.jpg'),
(8, '8.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `transmissie`
--

CREATE TABLE IF NOT EXISTS `transmissie` (
  `transmissie_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `transmissie` varchar(24) NOT NULL,
  PRIMARY KEY (`transmissie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `transmissie`
--

INSERT INTO `transmissie` (`transmissie_id`, `transmissie`) VALUES
(1, 'Automaat'),
(2, 'Handgeschakeld');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `occasion_photos`
--
ALTER TABLE `occasion_photos`
  ADD CONSTRAINT `occasion_photos_ibfk_1` FOREIGN KEY (`occasion_id`) REFERENCES `occasions` (`occasion_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
