-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 26 oct. 2024 à 22:42
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `droneimmobilierdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `id_membreFK` int NOT NULL,
  `poste` enum('admin','adjoint') COLLATE utf8mb4_unicode_ci DEFAULT 'adjoint',
  PRIMARY KEY (`id_admin`),
  KEY `fk_admin` (`id_membreFK`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_membreFK`, `poste`) VALUES
(1, 1, 'admin'),
(2, 2, 'adjoint');

-- --------------------------------------------------------

--
-- Structure de la table `bien`
--

DROP TABLE IF EXISTS `bien`;
CREATE TABLE IF NOT EXISTS `bien` (
  `id_Bien` int NOT NULL AUTO_INCREMENT,
  `id_adminFK` int NOT NULL,
  `reference_bien` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre_bien` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_bien` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parking` int NOT NULL DEFAULT '0',
  `location_vente` enum('location','vente') COLLATE utf8mb4_unicode_ci DEFAULT 'location',
  `prix_bien` float NOT NULL,
  `pays_bien` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville_bien` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quartier_bien` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_proprietaire` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time_bien` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `lien_photo1` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_Bien`),
  KEY `fk_bien` (`id_adminFK`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bien`
--

INSERT INTO `bien` (`id_Bien`, `id_adminFK`, `reference_bien`, `titre_bien`, `description_bien`, `parking`, `location_vente`, `prix_bien`, `pays_bien`, `ville_bien`, `quartier_bien`, `telephone_proprietaire`, `date_time_bien`, `lien_photo1`) VALUES
(60, 1, 'Terrain010624122622', 'Terrain Ã  vendre ', 'J\'étais là où tu étais', 0, 'vente', 12000, 'Cameroun ', 'yaounde', 'Manassa (sur la route Awea-Mfou)', '678879197', '2024-05-31 22:26:22', '[\"imagesSauv\\/Terrain \\u00e0 vendre 010624122622_1\",\"imagesSauv\\/Terrain \\u00e0 vendre 010624122622_2\",\"imagesSauv\\/Terrain \\u00e0 vendre 010624122622_3\",\"imagesSauv\\/Terrain \\u00e0 vendre 010624122622_4\",\"imagesSauv\\/Terrain \\u00e0 vendre 010624122622_5\",\"imagesSauv\\/Terrain \\u00e0 vendre 010624122622_6\",\"imagesSauv\\/Terrain \\u00e0 vendre 010624122622_7\"]'),
(61, 1, 'Appartement010624010157', 'Appartement meublÃ© Ã  louer ', 'J\'étais là où tu étais', 1, 'location', 60000, 'Cameroun ', 'yaounde', 'Jouvence ', '678879197', '2024-05-31 23:01:57', '[\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_1\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_2\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_3\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_4\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_5\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_6\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_7\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_8\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_9\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_10\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_11\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_12\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_13\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_14\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_15\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_16\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_17\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_18\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_19\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_20\"]'),
(62, 1, 'Immeuble040624112104', 'Immeuble Ã  louer', 'J\'étais là où tu étais', 1, 'location', 4000000, 'Cameroun ', 'yaounde', 'Bastos', '697077302', '2024-06-04 09:21:04', '[\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_1\",\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_2\",\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_3\",\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_4\",\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_5\",\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_6\",\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_7\",\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_8\",\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_9\",\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_10\"]'),
(63, 1, '040624113159', 'Studio moderne', 'J\'étais là où tu étais', 1, 'location', 80000, 'Cameroun ', 'yaounde', 'TKC', '697077302', '2024-06-04 09:31:59', '[\"imagesSauv\\/Studio moderne040624113159_1\",\"imagesSauv\\/Studio moderne040624113159_2\",\"imagesSauv\\/Studio moderne040624113159_3\",\"imagesSauv\\/Studio moderne040624113159_4\",\"imagesSauv\\/Studio moderne040624113159_5\",\"imagesSauv\\/Studio moderne040624113159_6\",\"imagesSauv\\/Studio moderne040624113159_7\"]');

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `id_chambre` int NOT NULL AUTO_INCREMENT,
  `id_bienFK` int NOT NULL,
  `superficie_chambre` float DEFAULT NULL,
  `moderne_chambre` enum('OUI','NON') COLLATE utf8mb4_unicode_ci DEFAULT 'OUI',
  `cuisine_chambre` enum('OUI','NON') COLLATE utf8mb4_unicode_ci DEFAULT 'NON',
  PRIMARY KEY (`id_chambre`),
  KEY `fk_chambre` (`id_bienFK`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `id_favoris` int NOT NULL AUTO_INCREMENT,
  `id_bienFK` int NOT NULL,
  `id_membreFK` int NOT NULL,
  `date_time_favoris` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_favoris`),
  KEY `fk_favoris_bien` (`id_bienFK`),
  KEY `fk_favoris_membre` (`id_membreFK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `immeuble`
--

DROP TABLE IF EXISTS `immeuble`;
CREATE TABLE IF NOT EXISTS `immeuble` (
  `id_immeuble` int NOT NULL AUTO_INCREMENT,
  `id_bienFK` int NOT NULL,
  `superficie_terrain_immeuble` float NOT NULL DEFAULT '0',
  `nbre_etage` int NOT NULL,
  PRIMARY KEY (`id_immeuble`),
  KEY `fk_immeuble` (`id_bienFK`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `immeuble`
--

INSERT INTO `immeuble` (`id_immeuble`, `id_bienFK`, `superficie_terrain_immeuble`, `nbre_etage`) VALUES
(2, 62, 1200, 2);

-- --------------------------------------------------------

--
-- Structure de la table `magasin`
--

DROP TABLE IF EXISTS `magasin`;
CREATE TABLE IF NOT EXISTS `magasin` (
  `id_magasin` int NOT NULL AUTO_INCREMENT,
  `id_bienFK` int NOT NULL,
  `superficie_magasin` float NOT NULL,
  `nombre_piece_magasin` int NOT NULL,
  PRIMARY KEY (`id_magasin`),
  KEY `fk_magasin` (`id_bienFK`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

DROP TABLE IF EXISTS `maison`;
CREATE TABLE IF NOT EXISTS `maison` (
  `id_maison` int NOT NULL AUTO_INCREMENT,
  `id_bienFK` int NOT NULL,
  `nbre_piece` int NOT NULL DEFAULT '0',
  `nbre_chambre` int NOT NULL DEFAULT '0',
  `nbre_cuisine` int NOT NULL DEFAULT '0',
  `nbre_salon` int NOT NULL DEFAULT '0',
  `nbre_douche` int NOT NULL DEFAULT '0',
  `type_maison` enum('studio','appartement','maison','villa') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `superficie_terrain` float DEFAULT '0',
  PRIMARY KEY (`id_maison`),
  KEY `fk_maison` (`id_bienFK`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `maison`
--

INSERT INTO `maison` (`id_maison`, `id_bienFK`, `nbre_piece`, `nbre_chambre`, `nbre_cuisine`, `nbre_salon`, `nbre_douche`, `type_maison`, `superficie_terrain`) VALUES
(11, 61, 6, 2, 1, 1, 2, 'appartement', 0),
(12, 63, 0, 1, 1, 1, 1, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int NOT NULL AUTO_INCREMENT,
  `id_visiteur_FK` int NOT NULL,
  `nom_membre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_membre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_membre` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_membre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays_membre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville_membre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp_membre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_membre`),
  KEY `fk_membre` (`id_visiteur_FK`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `id_visiteur_FK`, `nom_membre`, `prenom_membre`, `phone_membre`, `email_membre`, `pays_membre`, `ville_membre`, `mdp_membre`) VALUES
(1, 1, 'van', 'vanprenom', '237653695347', 'van2021@outlook.fr', 'canada', 'montreal', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(2, 2, 'bobo', 'boboprenom', '237695740639', 'bobo2021@outloo.fr', 'usa', 'newyork', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(3, 3, 'junior', 'juniorprenom', '237651006953', 'junior2021@outloo.fr', 'mboa', 'yaounde', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(4, 4, 'alice', 'aliceprenom', '237656857450', 'alice2021@outloo.fr', 'belgique', 'bruxelle', '9cf95dacd226dcf43da376cdb6cbba7035218921');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int NOT NULL AUTO_INCREMENT,
  `id_adminFK` int NOT NULL,
  `reference_service` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre_service` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_service` mediumtext COLLATE utf8mb4_unicode_ci,
  `lien_photo_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorie_service` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time_service` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_service`),
  KEY `fk_service` (`id_adminFK`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id_service`, `id_adminFK`, `reference_service`, `titre_service`, `description_service`, `lien_photo_service`, `categorie_service`, `date_time_service`) VALUES
(1, 1, 'service05112023', 'Voyage pour le canada', 'Nous nous engageons à vous faire voyager pour le canada', 'lien photo flyer canada', 'recrutement etranger et tourisme', '2023-11-06 15:59:00'),
(2, 2, 'service051120231157', 'Conteneur à vendre', 'Votre conteneur de 40 pieds disponible', 'lien photo conteneur', 'commerce general', '2023-11-06 15:59:00'),
(3, 1, 'service051120231201', 'Agent d\' entretien disponible', 'Nous mettons à votre disposition des personnes pour prendre soin de vos bien', 'lien photo guide besoin', 'guide besoin', '2023-11-06 15:59:00'),
(4, 2, 'service051120231207', 'prestation de service', 'Confiez nous la construction de votre chantier et vous serrez satisfait', 'lien photo prestation service', 'construction & preservation', '2023-11-06 15:59:00');

-- --------------------------------------------------------

--
-- Structure de la table `terrain`
--

DROP TABLE IF EXISTS `terrain`;
CREATE TABLE IF NOT EXISTS `terrain` (
  `id_terrain` int NOT NULL AUTO_INCREMENT,
  `id_bienFK` int NOT NULL,
  `superficie_terrain` float NOT NULL,
  PRIMARY KEY (`id_terrain`),
  KEY `fk_terrain` (`id_bienFK`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `terrain`
--

INSERT INTO `terrain` (`id_terrain`, `id_bienFK`, `superficie_terrain`) VALUES
(6, 60, 7000);

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

DROP TABLE IF EXISTS `visiteur`;
CREATE TABLE IF NOT EXISTS `visiteur` (
  `id_visiteur` int NOT NULL AUTO_INCREMENT,
  `adresse_ip` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datevisiteur` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_visiteur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`id_visiteur`, `adresse_ip`, `datevisiteur`) VALUES
(1, '192.168.10.178', '2023-11-06 15:59:00'),
(2, '192.168.10.179', '2023-11-06 15:59:00'),
(3, '192.168.10.180', '2023-11-06 15:59:00'),
(4, '192.168.10.181', '2023-11-06 15:59:00'),
(5, '192.168.10.182', '2023-11-06 15:59:00');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`id_membreFK`) REFERENCES `membre` (`id_membre`);

--
-- Contraintes pour la table `bien`
--
ALTER TABLE `bien`
  ADD CONSTRAINT `fk_bien` FOREIGN KEY (`id_adminFK`) REFERENCES `admin` (`id_admin`);

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `fk_chambre` FOREIGN KEY (`id_bienFK`) REFERENCES `bien` (`id_Bien`);

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `fk_favoris_bien` FOREIGN KEY (`id_bienFK`) REFERENCES `bien` (`id_Bien`),
  ADD CONSTRAINT `fk_favoris_membre` FOREIGN KEY (`id_membreFK`) REFERENCES `membre` (`id_membre`);

--
-- Contraintes pour la table `immeuble`
--
ALTER TABLE `immeuble`
  ADD CONSTRAINT `fk_immeuble` FOREIGN KEY (`id_bienFK`) REFERENCES `bien` (`id_Bien`);

--
-- Contraintes pour la table `magasin`
--
ALTER TABLE `magasin`
  ADD CONSTRAINT `fk_magasin` FOREIGN KEY (`id_bienFK`) REFERENCES `bien` (`id_Bien`);

--
-- Contraintes pour la table `maison`
--
ALTER TABLE `maison`
  ADD CONSTRAINT `fk_maison` FOREIGN KEY (`id_bienFK`) REFERENCES `bien` (`id_Bien`);

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `fk_membre` FOREIGN KEY (`id_visiteur_FK`) REFERENCES `visiteur` (`id_visiteur`);

--
-- Contraintes pour la table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `fk_service` FOREIGN KEY (`id_adminFK`) REFERENCES `admin` (`id_admin`);

--
-- Contraintes pour la table `terrain`
--
ALTER TABLE `terrain`
  ADD CONSTRAINT `fk_terrain` FOREIGN KEY (`id_bienFK`) REFERENCES `bien` (`id_Bien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
