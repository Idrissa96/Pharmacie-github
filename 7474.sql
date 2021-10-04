-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 04 oct. 2021 à 08:21
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `7474`
--

-- --------------------------------------------------------

--
-- Structure de la table `app`
--

DROP TABLE IF EXISTS `app`;
CREATE TABLE IF NOT EXISTS `app` (
  `Code_App` int NOT NULL AUTO_INCREMENT,
  `Id_user` int DEFAULT NULL,
  `Code_Four` int NOT NULL,
  `Ref_fac` varchar(255) DEFAULT NULL,
  `Date_App` date NOT NULL,
  `Lib_App` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Code_App`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `app`
--

INSERT INTO `app` (`Code_App`, `Id_user`, `Code_Four`, `Ref_fac`, `Date_App`, `Lib_App`) VALUES
(1, 2, 1, '452', '2021-08-29', ''),
(4, 2, 1, '451', '2021-08-29', ''),
(7, 2, 1, '454', '2021-08-29', ''),
(8, 2, 1, '4545', '2021-08-29', ''),
(9, 2, 1, '452', '2021-08-29', ''),
(10, 2, 1, '454', '2021-08-29', ''),
(11, 2, 1, '4528', '2021-08-29', ''),
(12, 2, 1, '1001', '2021-08-30', ''),
(13, 2, 1, '12445', '2021-08-30', ''),
(14, 2, 1, '12855', '2021-08-30', ''),
(15, 2, 1, '12855', '2021-08-30', ''),
(16, 2, 1, '12855', '2021-08-30', ''),
(17, 2, 1, '12855', '2021-08-30', ''),
(18, 2, 1, '12855', '2021-08-30', ''),
(19, 2, 1, '12855', '2021-08-30', ''),
(27, 2, 1, '12855', '2021-08-30', ''),
(35, 2, 1, '12487', '2021-08-30', ''),
(36, 2, 1, '452', '2021-08-30', ''),
(37, 2, 1, '252525', '2021-08-30', ''),
(39, 2, 1, '525', '2021-08-30', ''),
(40, 2, 1, 'RF2021', '2021-09-01', ''),
(41, 2, 1, 'RF20021', '2021-09-01', ''),
(42, 2, 1, 'RF200211', '2021-09-01', ''),
(43, 2, 1, 'RF202152', '2021-09-01', ''),
(44, 2, 1, 'RF45754', '2021-09-03', ''),
(45, 2, 1, 'RF010101', '2021-09-03', ''),
(46, 2, 1, 'RF201058AA', '2021-09-09', 'AAAA'),
(47, 2, 2, 'RF20105', '2021-09-08', 'RAS'),
(48, 2, 1, '45', '2021-10-01', '');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `Code_Art` int NOT NULL AUTO_INCREMENT,
  `Code_Cat` int NOT NULL,
  `Code_Dos` int NOT NULL,
  `Code_Fam` int DEFAULT NULL,
  `Lib_Art` varchar(255) NOT NULL,
  `Seuil_Min` int DEFAULT '2',
  `CodeBar` varchar(255) DEFAULT NULL,
  `etat` int DEFAULT '1',
  `Code_For` int NOT NULL,
  PRIMARY KEY (`Code_Art`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`Code_Art`, `Code_Cat`, `Code_Dos`, `Code_Fam`, `Lib_Art`, `Seuil_Min`, `CodeBar`, `etat`, `Code_For`) VALUES
(1, 47, 10, 7, 'dd', 45, NULL, 1, 4),
(2, 47, 6, 3, 'BILMALARIA', 45, NULL, 1, 2),
(3, 2, 6, 3, 'pp', 45, NULL, 1, 3),
(4, 21, 96, 37, 'Paracetamol', 80, NULL, 1, 2),
(5, 47, 2, 2, 'Anti-PAL', 45, NULL, 1, 2),
(6, 6, 3, 5, 'PARACETAMOL', 25, NULL, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `benificiaire`
--

DROP TABLE IF EXISTS `benificiaire`;
CREATE TABLE IF NOT EXISTS `benificiaire` (
  `Code_Beni` varchar(12) NOT NULL,
  `Nom_Beni` varchar(255) NOT NULL,
  `Prenom_Beni` varchar(255) NOT NULL,
  `Sexe_Beni` varchar(10) NOT NULL,
  `Date_Nai_Beni` date DEFAULT '0000-00-00',
  `Taille_Beni` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '0',
  `Poids_Beni` varchar(5) DEFAULT '0',
  `Adresse` varchar(255) NOT NULL,
  `Tel` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Code_Beni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `benificiaire`
--

INSERT INTO `benificiaire` (`Code_Beni`, `Nom_Beni`, `Prenom_Beni`, `Sexe_Beni`, `Date_Nai_Beni`, `Taille_Beni`, `Poids_Beni`, `Adresse`, `Tel`, `Email`) VALUES
('ARV2021', 'SOUMMEILA ALI', 'TANOUR', 'M', '1961-01-01', '1,4', '80', 'diffa', '90000000', ''),
('ARV2523', 'sabiou', 'fati', 'G', '1987-10-08', '1.5', '45', 'tahoua', '98989898', ''),
('ARV2525', 'ALI', 'MOUSSA', 'M', '1988-01-01', '1,5', '25', 'tillabery', '98000000', ''),
('ARV2526', 'ALI MOUSSA  ', 'IBRAHIM', 'M', '1970-01-01', '20', '21', 'tahoua', '97000000', '');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `Code_Cat` int NOT NULL AUTO_INCREMENT,
  `Lib_Cat` varchar(255) NOT NULL,
  PRIMARY KEY (`Code_Cat`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`Code_Cat`, `Lib_Cat`) VALUES
(1, 'Agraffeuses, fils de suture et de ligature'),
(2, 'Aiguilles, cathéters, perfuseurs, seringues, transfuseurs'),
(3, 'Analgésiques, antipyrétiques, AINS'),
(4, 'Anesthésiques'),
(5, 'Antiallergiques et antianaphylactiques'),
(6, 'Anticanc?reux et apparent?s\r'),
(7, 'Antidotes'),
(8, 'Anti?piletiques et anticonvulsivants'),
(9, 'Antigoutteux'),
(10, 'Anti-infectieux'),
(11, 'Antimigraineux'),
(12, 'Antiparkinsoniens'),
(13, 'Appareil cardio-vasculaire'),
(14, 'Appareil respiratoire'),
(15, 'Ballons, poches, collecteurs, vessie'),
(16, 'Bandes, compresse, coton, orthop?die'),
(17, 'Cannules, sondes, valves, drains'),
(18, 'chirurgie orthop?dique'),
(19, 'Consommables de laboratoire'),
(20, 'D?riv?s du sang et substitut du plasma'),
(21, 'Dermatologie'),
(22, 'D?sinfectants et antiseptiques'),
(23, 'éléments de protection'),
(24, 'Equiement m?dical'),
(25, 'Equipement biom?dical'),
(26, 'Gastro-ent?rologie'),
(27, 'H?matologie'),
(28, 'Hormones, contraceptifs et endocrinologie'),
(29, 'Imagerie m?dicale'),
(30, 'Immunologie'),
(31, 'Mat?riel m?dico-technique'),
(32, 'Medecine nucl?aire'),
(33, 'Mesure et dignostic'),
(34, 'MTA'),
(35, 'Myorelaxants et inhibiteurs de la cholinest?rase'),
(36, 'Ocytociques'),
(37, 'Odonto-stomatologie'),
(38, 'Ophtalmologie'),
(39, 'outils de chirurgie et de soins'),
(40, 'Produits diagnostic'),
(41, 'Psychiatrie'),
(42, 'Réactifs de laboratoire'),
(43, 'Recup?ration nutritionnelle'),
(44, 'Solution électrolytes et medts troubles acido-basiques'),
(45, 'Vitamines et sels min?raux'),
(46, 'Antiretroviraux'),
(47, 'arv');

-- --------------------------------------------------------

--
-- Structure de la table `dosage`
--

DROP TABLE IF EXISTS `dosage`;
CREATE TABLE IF NOT EXISTS `dosage` (
  `Code_Dos` int NOT NULL AUTO_INCREMENT,
  `Lib_Dos` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Code_Dos`)
) ENGINE=InnoDB AUTO_INCREMENT=334 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dosage`
--

INSERT INTO `dosage` (`Code_Dos`, `Lib_Dos`) VALUES
(1, 'RAS'),
(2, '(100 mg + 12.5 mg)/5ml'),
(3, '(250 mg + 31,25 mg)/5ml'),
(4, '(40+8+32) mcg /0,5 ml'),
(5, '(50+50) mcg / 0,5 ml'),
(6, '(50+50+50) mcg / 0,5 ml'),
(7, '(50+50+50+50) mcg / 0,5 ml'),
(8, '[(30+4+40)UI+(10+10)mcg]/0,5 ml'),
(9, '0,0275 mg'),
(10, '0,075 mg '),
(11, '0,1 mg/goutte'),
(12, '0,1 mg/ml'),
(13, '0,10% + 0,5%'),
(14, '0,15 mg'),
(15, '0,2 mg'),
(16, '0,25 mg/ml'),
(17, '0,25%; 20 ml'),
(18, '0,2mg/ml ; 1ml'),
(19, '0,4 - 0,5%'),
(20, '0,5 g '),
(21, '0,5 mg'),
(22, '0,5 mg/5 ml'),
(23, '0,5 mg/ml?'),
(24, '0,5 mg/ml?; 1 ml'),
(25, '0,5%?'),
(26, '0,5%; 20 ml'),
(27, '0,75 mg'),
(28, '0,9%?'),
(29, '0.02%'),
(30, '0.03%'),
(31, '0.0375 mg'),
(32, '0.10%'),
(33, '0.15 mg + 30 mcg'),
(34, '0.25%'),
(35, '0.3 mg + 0.03 mg'),
(36, '0.3%'),
(37, '1 mg?'),
(38, '1 mg/3 mll'),
(39, '1 mg/ml ; 5ml'),
(40, '1 MUI'),
(41, '1 x 105 - 33 x 105 C.F.U./0,1 ml'),
(42, '1%'),
(43, '1,2  MUI'),
(44, '1,25 mg '),
(45, '1,5 g/5 ml ou 30%'),
(46, '1,5 Kg'),
(47, '1,5 mg'),
(48, '1,7 g (eq: 1,5 g/l = 0,1%)'),
(49, '1.4%'),
(50, '1.5%'),
(51, '1/10 000'),
(52, '10 ?g/2 ml?'),
(53, '10 mcg/ 0,5 ml'),
(54, '10 mcg/ 0,5 ml; 20 mcg/ 0,5 ml; 20 mcg/ ml'),
(55, '10 mcg/2ml'),
(56, '10 mg'),
(57, '10 mg / unit? de conditionnement'),
(58, '10 mg/ ml; 1 ml'),
(59, '10 mg/1ml ; 100ml'),
(60, '10 mg/5 ml'),
(61, '10 mg/ml'),
(62, '10 mg/ml?; 10 ml'),
(63, '10 mg/ml?; 2 ml'),
(64, '10 mg/ml?; 5 ml'),
(65, '10 mg/ml; 50ml'),
(66, '10 ml'),
(67, '10%'),
(68, '10%; 10 ml'),
(69, '10%; 1ml'),
(70, '100 ?g/dose'),
(71, '100 mcg'),
(72, '100 mg'),
(73, '100 mg + 10 mg?'),
(74, '100 mg + 25 mg'),
(75, '100 mg + 270 mg  '),
(76, '100 mg/ 5 ml'),
(77, '100 mg/10ml'),
(78, '100 mg/ml'),
(79, '100 mg/ml?; 2 ml (dichlorhydrate)'),
(80, '100 mg/ml?; 4 ml'),
(81, '100 UI/ml; 10ml'),
(82, '100?000 UI'),
(83, '100?000 UI/g'),
(84, '100?000 UI/ml'),
(85, '100+25 mg '),
(86, '1000 mcg'),
(87, '1000 mg'),
(88, '1000 UI/ml'),
(89, '1000 unit? DL50/ 0,5 ml'),
(90, '10000 UI'),
(91, '102,5 g'),
(92, '104 mg/0,65ml'),
(93, '114 g'),
(94, '12 mg + 60 mg'),
(95, '12 mg + 60 mg + 100mg'),
(96, '120 mg'),
(97, '125 mg '),
(98, '125 mg/5ml'),
(99, '125 mg/ml'),
(100, '133,33 mg + 33,33 mg'),
(101, '15 mg'),
(102, '15 mg/ml'),
(103, '15% + 1,5%'),
(104, '15% + 1.5%'),
(105, '150 mg / 5 ml'),
(106, '150 mg/ 15 ml '),
(107, '150 mg/3ml'),
(108, '150 mg/ml'),
(109, '150 mg/ml ; 4 ml'),
(110, '150 UI/ml'),
(111, '150 UI/ml; 2 ml et 10 ml'),
(112, '150/75/400/275 mg'),
(113, '150+75 mg'),
(114, '150+75+275 mg'),
(115, '150mg  '),
(116, '167 mg'),
(117, '1g'),
(118, '1g/4 ml?'),
(119, '1g/ml, 20ml'),
(120, '1mg/ml'),
(121, '1mg/ml?; 1ml'),
(122, '2 g'),
(123, '2 mcg /0,5 ml'),
(124, '2 mg'),
(125, '2 mg ; 4 mg'),
(126, '2 mg/5 ml'),
(127, '2 mg/ml'),
(128, '2 mg/ml ; 10ml'),
(129, '2 mg/ml ; 2.5ml'),
(130, '2 mg/ml?; 100 ml?'),
(131, '2 mg/ml?; 2 ml'),
(132, '2 mg/ml?; 5 ml'),
(133, '2 ml?'),
(134, '2%'),
(135, '2% + 1/80 000; 1,8 ml'),
(136, '2%; 20 ml'),
(137, '2%+ 1/200 000; 20 ml'),
(138, '2,4 MUI'),
(139, '2,5 mg'),
(140, '2,5 mg/ml'),
(141, '2,5 UI/ 0,5 ml'),
(142, '2,5g/250 ml'),
(143, '20 mg'),
(144, '20 mg + 120 mg'),
(145, '20 mg LP'),
(146, '20 mg/2ml '),
(147, '20 mg/5 ml'),
(148, '20 mg/ml'),
(149, '20 mg/ml  ; 1 ml '),
(150, '20 mg/ml, 5ml '),
(151, '200 ?g'),
(152, '200 mg'),
(153, '200 mg + 50 mg'),
(154, '200 mg/ 5 ml'),
(155, '200 mg/100 ml'),
(156, '200 mg/ml'),
(157, '200 mg/ml?; 10 ml'),
(158, '200?000 UI'),
(159, '200?g/ml?; 1 ml'),
(160, '200mg/ml?; 5 ml '),
(161, '240 mg'),
(162, '240 mg/5ml'),
(163, '25 g'),
(164, '25 Kg'),
(165, '25 mcg'),
(166, '25 mcg / s?rotype/ 0,5 ml'),
(167, '25 mg'),
(168, '25 mg'),
(169, '25 mg + 50mg/5ml'),
(170, '25 mg/15ml?'),
(171, '25 mg/ml'),
(172, '25 mg/ml fer ?l?ment'),
(173, '25 mg/ml?; 1 ml'),
(174, '25 mg/ml?; 10 ml'),
(175, '25 mg/ml?; 2 ml'),
(176, '25 mg/ml?; 5 ml'),
(177, '25%'),
(178, '250 ?g/5ml'),
(179, '250 ?g/Flacon'),
(180, '250 mcg'),
(181, '250 mcg/ml ; 2 ml'),
(182, '250 mg + 25 mg'),
(183, '250 mg + 250 mg'),
(184, '250 mg?'),
(185, '250 mg/ 5ml'),
(186, '250 mg/ml'),
(187, '250 mg/ml ; 20 ml'),
(188, '250 ml'),
(189, '250 UI/ml; 1 ml et 2 ml'),
(190, '250mg/20ml '),
(191, '25mg + 67,5 mg'),
(192, '25mg/5ml'),
(193, '3 mg'),
(194, '3 mg/ml'),
(195, '3 mg/ml; 10 ml'),
(196, '3%'),
(197, '3%; 1,8 ml'),
(198, '3,60% 5ml'),
(199, '3+1 MUI'),
(200, '30 ?g + 150 ?g '),
(201, '30 ?g + 30 ?g'),
(202, '30 ?g +75 ?g'),
(203, '30 mg'),
(204, '30 mg + 150 mg '),
(205, '30 mg + 150 mg + 200 mg\n'),
(206, '30 mg/ml; 1 ml'),
(207, '30%'),
(208, '300 mg'),
(209, '300 mg (sulfate ou bisulfate)'),
(210, '300 mg + 150 mg'),
(211, '300 mg + 150 mg + 200 mg'),
(212, '300 mg + 200 mg'),
(213, '300 mg + 200 mg + 200mg'),
(214, '300 mg + 200 mg + 600 mg'),
(215, '300 mg/ml'),
(216, '300-647 mg/ml; 100 ml'),
(217, '300-647 mg/ml; 200 ml'),
(218, '320 mg/ml'),
(219, '350 mg/ml; 200 ml'),
(220, '36 mg '),
(221, '3g'),
(222, '4 g'),
(223, '4 mg'),
(224, '4 mg/ml'),
(225, '4 mg/ml?; 1 ml'),
(226, '4.2%'),
(227, '40 mg?'),
(228, '40 mg/ 4 ml'),
(229, '40 mg/ml'),
(230, '40 mg/ml?; 2 ml'),
(231, '40 mg/ml?; 5ml'),
(232, '40 UI/ 0,5 ml ; 1500 UI/ 0,5 ml'),
(233, '400 mcg/ml'),
(234, '400 mcg/ml?; 1 ml'),
(235, '400 mg + 100 mg/5 ml'),
(236, '400 mg?'),
(237, '400 mg/10 ml'),
(238, '400 mg/5 ml'),
(239, '400 UI/ml'),
(240, '4000 UI/0,4 ml'),
(241, '42 g'),
(242, '420 mg'),
(243, '450 mg/ 45 ml'),
(244, '480 mg'),
(245, '5 mg'),
(246, '5 mg / 25 mg / 1 mg pour 30 g'),
(247, '5 mg + 500 UI/g'),
(248, '5 mg/ 5 ml'),
(249, '5 mg/10ml'),
(250, '5 mg/ml'),
(251, '5 mg/ml ; 2 ml'),
(252, '5 mg/ml 100ml'),
(253, '5 mg/ml, 4ml'),
(254, '5 mg/ml; 0.5 ml'),
(255, '5 mg/ml; 20 ml'),
(256, '5 ml'),
(257, '5 MUI'),
(258, '5 UI/ml'),
(259, '5%'),
(260, '5, 10, 20, 40 mg'),
(261, '50 ?g'),
(262, '50 ?g/10ml'),
(263, '50 ?g/dose'),
(264, '50 ?g/ml?; 1 ml'),
(265, '50 mcg'),
(266, '50 mcg/ml'),
(267, '50 mg'),
(268, '50 mg + 135 mg'),
(269, '50 mg/ 5 ml'),
(270, '50 mg/15ml'),
(271, '50 mg/ml'),
(272, '50 mg/ml?; 2 ml'),
(273, '50 mg/ml, 10 ml'),
(274, '50 mg/ml; 5 ml'),
(275, '500 + 25 mg'),
(276, '500 mg'),
(277, '500 mg + 125 mg'),
(278, '500 mg/100 ml'),
(279, '500 mg/2ml'),
(280, '500 mg/ml'),
(281, '500 mg/ml?; 10 ml'),
(282, '500 mg/ml?; 2 ml'),
(283, '500 ml'),
(284, '500 UI/Flacon'),
(285, '500??g'),
(286, '500?000 UI'),
(287, '50g'),
(288, '5-8g /100 ml'),
(289, '5-8g/200 ml'),
(290, '6 mg + 30 mg'),
(291, '6 mg/ml'),
(292, '6% + 3%'),
(293, '60 mg'),
(294, '60 mg (acide art?sunique anhydre) ; + ampoule s?par?e de bicarbonate de sodium 5%'),
(295, '60 mg + 30 mg'),
(296, '60 mg + 400??g'),
(297, '60 mg +30 mg +50mg'),
(298, '60+30+150 mg'),
(299, '60+60 mg'),
(300, '600 mcg/ml'),
(301, '600 mg'),
(302, '600 mg/ 60 ml '),
(303, '62,5 mcg'),
(304, '65-70% de chlore actif'),
(305, '7,5 mg'),
(306, '7,5 mg/5 ml'),
(307, '75 mg'),
(308, '75 mg/5ml'),
(309, '750 mg '),
(310, '76%'),
(311, '8 mg'),
(312, '80 + 16 mg; 10 ml'),
(313, '80 mg'),
(314, '80 mg + 16 mg/ml?; 5ml'),
(315, '80 mg/2ml'),
(316, '80 mg/ml ; 1 ml '),
(317, '800 UI ; 0,5 mg ; 0,5 mg ; 7,5 mg ; 200 UI'),
(318, '850 mcg'),
(319, '90mg/ml'),
(320, '92 g'),
(321, '96,057 g/100 g'),
(322, '960 mg'),
(323, '99% v/v'),
(324, 'Equiv 500mg base'),
(325, 'G?lules'),
(326, 'Glucose 13,5 g / NaCl 2,6 g / KCl 1,5 g /Citrate trisodique dihydrat? 2,9 g'),
(327, 'MIN 1000 DICT50/ 0,5 ml'),
(328, 'MIN 106 CCID50/ ml'),
(329, 'Sirop'),
(330, 'TCU 380'),
(331, 'Tisane'),
(332, '10ml'),
(333, '5ml');

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

DROP TABLE IF EXISTS `famille`;
CREATE TABLE IF NOT EXISTS `famille` (
  `Code_Fam` int NOT NULL AUTO_INCREMENT,
  `Lib_Fam` varchar(255) NOT NULL,
  PRIMARY KEY (`Code_Fam`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`Code_Fam`, `Lib_Fam`) VALUES
(1, 'famille'),
(2, 'Anesthésiques locaux'),
(3, 'Anti-diarrhéiques'),
(4, 'Antiprotozoaires'),
(5, 'Hormones surrénaliennes et corticoïdes de synthase '),
(6, 'M?dicaments de l?insuffisance cardiaque'),
(7, 'Antispasmodiques'),
(8, 'Anti- angoreux'),
(9, 'Anti- hypertenseurs'),
(10, 'Anti-asthmatiques'),
(11, 'Antiseptiques - d?sinfectants - Antiallergique'),
(12, 'Cortico?des'),
(13, 'D?sinfectants'),
(14, 'Laxatifs'),
(15, 'S?rums et Immunoglobulines'),
(16, 'Voie orale'),
(17, 'Analgésiques non opioïdes et AINS'),
(18, 'Analgésiques non opioïdes, antipyrétiques et AINS'),
(19, 'Analgésiques opioïdes'),
(20, 'Anesthésiques généraux et Oxygène'),
(21, 'Anti- arythmiques'),
(22, 'Antiacides/Antiulc?reux'),
(23, 'Anti-an?miques'),
(24, 'Antibact?riens'),
(25, 'Antidotes non sp?cifiques'),
(26, 'Antidotes sp?cifiques'),
(27, 'Antidr?panocytaires'),
(28, 'Anti?m?tiques'),
(29, 'Anti?piletiques et anticonvulsivants'),
(30, 'Antifongiques'),
(31, 'Antigoutteux'),
(32, 'Antihelminthiques'),
(33, 'Anti-h?morro?daires'),
(34, 'Anti-infectieux'),
(35, 'Anti-inflammatoire/Antiprurigineux'),
(36, 'Anti-inflammatoires'),
(37, 'Antiseptiques'),
(38, 'Antithyro?diens et thyro?diens '),
(39, 'Antiviraux'),
(40, 'Astringents'),
(41, 'Contraceptifs '),
(42, 'Cytotoxiques'),
(43, 'Dianostic Ophtalmologie'),
(44, 'Expectorants'),
(45, 'Hormones et anti-hormones'),
(46, 'Hypocholest?rol?miants '),
(47, 'Inducteurs de l?ovulation'),
(48, 'Insuline et antidiab?tiques oraux '),
(49, 'Insuline et autres antidiab?tiques '),
(50, 'K?ratoplastiques/K?ratolytiques'),
(51, 'M?dicaments contre les chocs vasculaires'),
(52, 'M?dicaments de l\'h?mostase'),
(53, 'M?dicaments des soins palliatifs'),
(54, 'M?dicaments des troubles de l?humeur'),
(55, 'M?dicaments utilis?s dans les addictions'),
(56, 'MTA Anti-asth?nique?'),
(57, 'MTA Anti-dr?panocytaire'),
(58, 'MTA Antipaludiques'),
(59, 'MTA Antitussifs/expectorants'),
(60, 'MTA?Antiprotozoaires ?'),
(61, 'Mydriatiques'),
(62, 'Myotiques et anti-glaucomateux '),
(63, 'étrognes'),
(64, 'Prémédication anesthésique et sudation pour interventions chirurgicales de courte dur?e '),
(65, 'Produits de contraste radiologique'),
(66, 'Produits de contraste utilis?s en radiologie'),
(67, 'Prophylaxie  '),
(68, 'Scabicides/P?diculicides'),
(69, 'Traitement non sp?cifique'),
(70, 'Traitement sp?cifique'),
(71, 'Vaccins'),
(72, 'Voie parent?rale'),
(73, 'Anti-herp?tiques'),
(74, 'Electrolytes'),
(75, 'Vitamines'),
(76, 'Sels min?raux'),
(77, 'Anti-hystaminique'),
(78, 'Antipsychotiques'),
(79, 'Ocytociques'),
(80, ' - '),
(81, 'Anticonvulsivant');

-- --------------------------------------------------------

--
-- Structure de la table `forme`
--

DROP TABLE IF EXISTS `forme`;
CREATE TABLE IF NOT EXISTS `forme` (
  `Code_For` int NOT NULL AUTO_INCREMENT,
  `Lib_For` varchar(255) NOT NULL,
  PRIMARY KEY (`Code_For`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `forme`
--

INSERT INTO `forme` (`Code_For`, `Lib_For`) VALUES
(2, 'ComprimE'),
(3, 'ComprimE dispersible'),
(4, 'Sirop'),
(5, 'Injectable IM '),
(6, 'Injectable SC'),
(7, 'Injectable IV'),
(8, 'Poudre pour prEparation injectable'),
(9, 'CrEme'),
(10, 'Pommade'),
(11, 'Suspension orale'),
(12, 'GranulE'),
(13, 'Solution buvable'),
(14, 'Poudre pour prEparation orale'),
(15, 'Feuilles pour infusion'),
(16, 'GElule'),
(17, 'Injectable (Complexe liposomal)'),
(18, 'Suppositoire'),
(19, 'PrEparation pour inhalation'),
(20, 'Collyre'),
(21, 'Pommade ophtalmique'),
(22, 'Lotion'),
(23, 'ComprimE sublingual'),
(24, 'Solution externe'),
(25, 'Suspension huileuse pour injection'),
(26, 'Gouttes auriculaires'),
(27, 'Ovule gynEcologique'),
(28, 'Gel rectal'),
(29, 'Solution rectale'),
(30, 'GElule gastro-rEsistante'),
(31, 'Implant'),
(32, 'Solution pour perfusion'),
(33, 'ComprimE pelliculE'),
(34, 'GElule A LibEration prolongEe '),
(35, 'ComprimE A lib?ration prolong?e\r'),
(36, 'ComprimE A croquer'),
(37, 'ComprimE A sucer'),
(38, 'ComprimE effervescent'),
(39, 'ComprimE gynEcologique'),
(40, 'Poudre pour solution de perfusion'),
(41, 'Capsule'),
(42, 'Solution'),
(43, 'Poudre pour suspension buvable'),
(44, 'Suspension buvable'),
(45, 'Poudre '),
(46, 'Tisane'),
(47, 'Kit composE'),
(48, 'Pillule');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `Code_Four` int NOT NULL AUTO_INCREMENT,
  `Lib_Four` varchar(255) NOT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `Tel` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Code_Four`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`Code_Four`, `Lib_Four`, `Adresse`, `Tel`, `Email`) VALUES
(1, 'LABOREX', 'Niamey', '90000000', 'ras'),
(2, 'Pharmaplus', 'Niamey Niger', '90704200', 'Idrissa.HS@outlook.fr');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `Code_Ser` int NOT NULL AUTO_INCREMENT,
  `Agent` varchar(255) DEFAULT 'Sans precision',
  `Lib_Ser` varchar(255) NOT NULL,
  PRIMARY KEY (`Code_Ser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`Code_Ser`, `Agent`, `Lib_Ser`) VALUES
(1, 'Dr Ali Moussa', 'DREPANO'),
(2, 'PR SEYDOU MAMADOU', 'BIOCHIMIE'),
(3, 'PR HABIBOU ABARCHI', 'CHIRURGIE PEDIATRIQUE');

-- --------------------------------------------------------

--
-- Structure de la table `site_per_arv`
--

DROP TABLE IF EXISTS `site_per_arv`;
CREATE TABLE IF NOT EXISTS `site_per_arv` (
  `Code_Sit` int NOT NULL AUTO_INCREMENT,
  `Reg_Sit` varchar(255) DEFAULT NULL,
  `Lib_Sit` varchar(255) NOT NULL,
  PRIMARY KEY (`Code_Sit`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `site_per_arv`
--

INSERT INTO `site_per_arv` (`Code_Sit`, `Reg_Sit`, `Lib_Sit`) VALUES
(1, 'niamey', 'CHU LAMORDE'),
(2, 'agadez', 'HOPITAL NATIONAL'),
(3, 'dosso', 'HOPITAL NATIONAL'),
(4, 'maradi', 'HOPITAL NATIONAL'),
(5, 'niamey', 'HOPITAL NATIONAL'),
(6, 'zinder', 'HOPITAL NATIONAL');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Code_App` int DEFAULT NULL,
  `Code_Art` int DEFAULT NULL,
  `Num_lot` int DEFAULT NULL,
  `Quant` int DEFAULT NULL,
  `Date_Exp` date NOT NULL,
  `Lib_App` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk1` (`Code_App`),
  KEY `fk2` (`Code_Art`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`ID`, `Code_App`, `Code_Art`, `Num_lot`, `Quant`, `Date_Exp`, `Lib_App`) VALUES
(1, 1, 5, NULL, 52, '2021-08-17', 'R.A.S'),
(5, 1, 5, NULL, 52, '2021-08-17', 'R.A.S'),
(7, 1, 5, NULL, 52, '2021-08-17', 'R.A.S'),
(9, 1, 5, NULL, 52, '2021-08-17', 'R.A.S'),
(10, 9, 5, NULL, 52, '2021-08-17', 'R.A.S'),
(11, 9, 5, NULL, 52, '2021-08-17', 'R.A.S'),
(13, 11, 5, NULL, 52, '2021-08-17', 'R.A.S'),
(15, 12, 2, NULL, 250, '2021-08-06', 'R.A.S'),
(16, 10, 1, NULL, 52, '2021-08-13', 'R.A.S'),
(17, 13, 2, NULL, 0, '2022-05-01', 'R.A.S'),
(20, 27, 2, NULL, 12, '2021-08-12', 'R.A.S'),
(21, 36, 2, NULL, 590, '2021-08-05', 'R.A.S'),
(22, 36, 2, NULL, 52, '2021-08-06', 'R.A.S'),
(23, 37, 2, NULL, 25, '2021-08-05', 'R.A.S'),
(24, 39, 1, NULL, 18, '2021-07-28', 'R.A.S'),
(25, 42, 1, NULL, 25, '2021-09-01', 'R.A.S'),
(26, 43, 1, NULL, 115, '2022-01-02', 'R.A.S'),
(27, 44, 1, NULL, 21, '2022-01-01', 'R.A.S'),
(28, 44, 5, NULL, 353, '2022-01-01', 'R.A.S'),
(29, 45, 1, NULL, 102, '2021-09-23', 'R.A.S'),
(30, 46, 5, NULL, 552, '2022-02-11', 'R.A.S'),
(31, 47, 4, NULL, 232, '2022-02-24', 'RAS'),
(32, 45, 6, NULL, 745, '2022-07-09', 'RAS'),
(33, 45, 5, NULL, 78, '2020-12-25', 'RAS'),
(34, 48, 2, NULL, 45, '2022-07-15', 'R.A.S'),
(35, 48, 5, NULL, 785, '2021-10-20', 'R.A.S');

-- --------------------------------------------------------

--
-- Structure de la table `stock_tfr`
--

DROP TABLE IF EXISTS `stock_tfr`;
CREATE TABLE IF NOT EXISTS `stock_tfr` (
  `ID` int NOT NULL,
  `Code_Tfr` int DEFAULT NULL,
  `Quant_Tfr` int DEFAULT NULL,
  `Lib` varchar(255) DEFAULT NULL,
  `QD` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stock_tfr`
--

INSERT INTO `stock_tfr` (`ID`, `Code_Tfr`, `Quant_Tfr`, `Lib`, `QD`) VALUES
(15, 1, 15, NULL, 15),
(15, 1, 45, NULL, 45),
(15, 1, 45, NULL, 45),
(17, 1, 45, NULL, 45),
(17, 1, 20, NULL, 20),
(17, 50, 10, NULL, 10),
(27, 51, 75, NULL, 0),
(26, 51, 25, NULL, 200),
(28, 52, 50, NULL, 52),
(17, 53, 32, NULL, 0),
(34, 53, 13, NULL, 45),
(31, 53, 20, NULL, 20);

-- --------------------------------------------------------

--
-- Structure de la table `stock_tfr_arv`
--

DROP TABLE IF EXISTS `stock_tfr_arv`;
CREATE TABLE IF NOT EXISTS `stock_tfr_arv` (
  `ID` int NOT NULL,
  `Code_Arv` int DEFAULT NULL,
  `Quant` int DEFAULT NULL,
  `Lib` varchar(255) DEFAULT NULL,
  `QD` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stock_tfr_arv`
--

INSERT INTO `stock_tfr_arv` (`ID`, `Code_Arv`, `Quant`, `Lib`, `QD`) VALUES
(17, 4, 52, NULL, 52),
(17, 6, 52, NULL, 52),
(17, 7, 2, NULL, 40);

-- --------------------------------------------------------

--
-- Structure de la table `transfert`
--

DROP TABLE IF EXISTS `transfert`;
CREATE TABLE IF NOT EXISTS `transfert` (
  `Code_Tfr` int NOT NULL AUTO_INCREMENT,
  `Code_Ser` int DEFAULT NULL,
  `Id_user` int DEFAULT NULL,
  `Date_Tfr` date DEFAULT NULL,
  `Lib_Tfr` varchar(255) NOT NULL,
  PRIMARY KEY (`Code_Tfr`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `transfert`
--

INSERT INTO `transfert` (`Code_Tfr`, `Code_Ser`, `Id_user`, `Date_Tfr`, `Lib_Tfr`) VALUES
(1, 1, 2, '2021-09-01', ''),
(50, 1, 2, '2021-09-02', ''),
(51, 1, 2, '2021-09-03', ''),
(52, 1, 2, '2021-09-08', ''),
(53, 2, 2, '2021-10-01', '');

-- --------------------------------------------------------

--
-- Structure de la table `transfert_arv`
--

DROP TABLE IF EXISTS `transfert_arv`;
CREATE TABLE IF NOT EXISTS `transfert_arv` (
  `Code_Arv` int NOT NULL AUTO_INCREMENT,
  `Code_Sit` int NOT NULL,
  `Code_Beni` varchar(12) DEFAULT NULL,
  `Id_user` int DEFAULT NULL,
  `Date_Arv` date DEFAULT NULL,
  `Date_Per` date DEFAULT NULL,
  `Date_Rdv` date DEFAULT NULL,
  `Nom_Pre_Per` varchar(255) NOT NULL,
  `Lib_Tfr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Code_Arv`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `transfert_arv`
--

INSERT INTO `transfert_arv` (`Code_Arv`, `Code_Sit`, `Code_Beni`, `Id_user`, `Date_Arv`, `Date_Per`, `Date_Rdv`, `Nom_Pre_Per`, `Lib_Tfr`) VALUES
(1, 1, 'ARV2021', 2, '2021-09-07', '2021-09-24', '2022-02-10', 'Dr Siddi', '                                       \r\n                                   '),
(2, 1, 'ARV2021', 2, '2021-09-07', '2021-09-24', '2022-02-10', 'Dr Siddi', '                                       \r\n                                   '),
(3, 1, 'ARV2021', 2, '2021-09-07', '2021-09-24', '2022-02-10', 'Dr Siddi', '                                       \r\n                                   '),
(4, 1, 'ARV2021', 2, '2021-09-07', '2021-09-24', '2022-02-10', 'Dr Siddi', '                                       \r\n                                   '),
(6, 1, 'ARV2021', 2, '2021-09-07', '2021-09-24', '2022-02-10', 'Dr Siddi', '                                       \r\n                                   '),
(7, 1, 'ARV2523', 2, '2021-09-08', '2021-09-08', '2021-12-08', 'Dr Siddi', '                                       \r\n                                   ');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Id_user` int NOT NULL AUTO_INCREMENT,
  `Nom_user` varchar(50) NOT NULL,
  `Prenom_user` varchar(50) NOT NULL,
  `Login_user` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Mpasse` varchar(250) NOT NULL DEFAULT '1234',
  `statut` int DEFAULT '1',
  `etat` int NOT NULL,
  PRIMARY KEY (`Id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id_user`, `Nom_user`, `Prenom_user`, `Login_user`, `Mpasse`, `statut`, `etat`) VALUES
(1, 'Harouna Sanda', 'Idrissa', 'didi@rectaurat', '12542', 1, 0),
(2, 'Al Garba', 'MOUSSA', 'didilog2', '12542', 1, 1),
(3, 'Idrissa', 'Harouna', 'log', '12542', 0, 1),
(4, 'sani', 'gourou', '4585', '719e427d3b21a35b8cdcd2d88db6ca11', 1, 1),
(5, 'Harouna Sanda', 'Idrissa', 'didilog', '719e427d3b21a35b8cdcd2d88db6ca11', 1, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`Code_App`) REFERENCES `app` (`Code_App`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`Code_Art`) REFERENCES `article` (`Code_Art`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
