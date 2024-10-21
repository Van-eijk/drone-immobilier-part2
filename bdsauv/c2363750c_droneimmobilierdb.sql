-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 13 juin 2024 à 04:41
-- Version du serveur : 10.6.17-MariaDB-cll-lve
-- Version de PHP : 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `c2363750c_droneimmobilierdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_membreFK` int(11) NOT NULL,
  `poste` enum('admin','adjoint') DEFAULT 'adjoint'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `bien` (
  `id_Bien` int(11) NOT NULL,
  `id_adminFK` int(11) NOT NULL,
  `reference_bien` varchar(150) NOT NULL,
  `titre_bien` varchar(250) NOT NULL,
  `description_bien` mediumtext NOT NULL,
  `parking` int(11) NOT NULL DEFAULT 0,
  `location_vente` enum('location','vente') DEFAULT 'location',
  `prix_bien` float NOT NULL,
  `pays_bien` varchar(250) NOT NULL,
  `ville_bien` varchar(250) NOT NULL,
  `quartier_bien` varchar(150) NOT NULL,
  `telephone_proprietaire` varchar(25) NOT NULL,
  `date_time_bien` timestamp NULL DEFAULT current_timestamp(),
  `lien_photo1` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bien`
--

INSERT INTO `bien` (`id_Bien`, `id_adminFK`, `reference_bien`, `titre_bien`, `description_bien`, `parking`, `location_vente`, `prix_bien`, `pays_bien`, `ville_bien`, `quartier_bien`, `telephone_proprietaire`, `date_time_bien`, `lien_photo1`) VALUES
(60, 1, 'Terrain010624122622', 'Terrain Ã  vendre ', '\r\n                                Drone Immobilier (synonyme de confiance et de satisfaction) met Ã  votre disposition des terrains lotis Ã  vendre , au lieu dit : Manassa (derriÃ¨re l\'universitÃ© catholique sur la route de Mfou) - YaoundÃ© - Cameroun \r\n\r\n* CaractÃ©ristiques :\r\n\r\n~ Superficie totale : 7 000 M2 (morcelable) \r\n~ terrains lotis et titrÃ©s  \r\n~ zone habitÃ©e et Ã©lectrifiÃ©e \r\n\r\nâ€¢ ModalitÃ©s d\'acquisition/de location :\r\n\r\nâœ“ Prix du mÃ¨tre carrÃ© : 12 000 F \r\n\r\n* Honoraires prestation de service Drone immobilier :\r\n\r\nâœ“  Frais de suivi dossier ou de visite : 15 000 F\r\nâœ“  Frais de commission : 5%\r\n\r\nInfoline : +237 697 077 302\r\nWhatsApp : + 237 6 78 87 91 97 \r\nE-mail : droneimmobilier03@gmail.com\r\nSite web : https://drone-immobilier.site\r\nBureau gÃ©nÃ©ral : TÃ©lÃ©travail Biteng- YaoundÃ© - Cameroun \r\n\r\nðŸš©AVIS AU PUBLICðŸš©\r\n\r\nLes professionnels de l\'immobilier au Cameroun, tels que Ets Drone immobilier (synonyme de confiance et de satisfaction) et d\'autres, mettent en garde contre les arnaqueurs se faisant passer pour des agents immobiliers.\r\n\r\n90% de ces arnaqueurs ne sont pas du mÃ©tier (ne vivent pas exclusivement de la profession d\'agent immobilier).\r\n\r\nâ­) Nos recommandations :\r\n\r\na) Aucun agent immobilier n\'est habilitÃ© Ã  recevoir l\'argent de vos mois de loyer en dehors de sa commission, mÃªme s\'il a les clÃ©s du logement. S\'il insiste pour recevoir les fonds, dites-lui d\'aller dÃ©charger au commissariat ou Ã  la gendarmerie afin qu\'il soit identifiÃ© et analysÃ©.\r\n\r\nb) Avant de verser l\'argent au prÃ©tendu bailleur :\r\n\r\nâ€¢ Prenez le temps de vous renseigner aprÃ¨s (des locataires, voisins, passants, autoritÃ©s compÃ©tentes, chez le boutiquier Ã  cÃ´tÃ©, le commerÃ§ant...)\r\n\r\nâ€¢ Si possible, demandez Ã  observer les documents d\'appartenance (les factures d\'eau et d\'Ã©lectricitÃ©, reÃ§u d\'achat de matÃ©riaux de construction, titre foncier ou acte de vente....)\r\n\r\nâ€¢ Ne baissez pas la garde mÃªme si l\'agent immobilier est une femme.\r\n\r\nc) Sollicitez les professionnels de l\'immobilier et respectez le mÃ©tier de l\'autre :\r\n\r\nâ€¢ Surtout pour des demandes exigeantes et non Ã©quilibrÃ©es (rapport offre-prix), faites-vous accompagner par un agent immobilier et donnez-lui les moyens de prospecter votre logement sur la durÃ©e.\r\n\r\nâ­Payez les frais de visite convenus.\r\n\r\nâ­Payez la commission convenue aprÃ¨s satisfaction.\r\n\r\nðŸš©Faites des approches verbales respectueuses, soyez poli, respectez votre parole.\r\n\r\nðŸš© Ouvrez votre dossier comme il se doit chez un professionnel de l\'immobilier afin d\'Ã©conomiser les frais de visite.\r\n\r\nðŸš© Signez le protocole d\'accord qui engage l\'agent immobilier et le rassure pour le paiement de sa commission (8 personnes sur 10 refusent de signer le protocole d\'accord parce qu\'ils savent que aprÃ¨s service rendu il est libre de dire que nous n\'avons rien signÃ© au dÃ©part).\r\n\r\nðŸš© MÃªme si l\'accord est verbal : respectez-le. Ã‰vitez de vous jouer de l\'agent immobilier en allant par derriÃ¨re rÃ©cupÃ©rer son offre pour ne pas payer la commission (cela donne d\'emblÃ©e une mauvaise image de vous auprÃ¨s du bailleur).\r\n\r\nðŸš©ðŸ‘‰ðŸ‘‰ðŸ‘‰ðŸš©NB : S\'il existe un accord pÃ©cuniaire entre le bailleur et l\'agent immobilier, cela ne vous regarde pas et n\'influence en rien la commission de l\'agent immobilier auprÃ¨s de vous. Si cela ne vous convient pas, cherchez vous-mÃªme votre logement.â­â­â­\r\n\r\nâœ¨ Trouvez votre logement ou opportunitÃ© immobiliÃ¨re fiable dans toute la capitale en 24 heures avec Drone Immobilier, \"synonyme de confiance et de satisfaction\"âœ¨\r\n\r\nâ­POURQUOI UN CLIENT DEVRAIT CHOISIR ETS DRONE IMMOBILIER POUR L\'ACQUISITION D\'UN BIEN IMMOBILIER ? :\r\n\r\nChez Drone immobilier :\r\n\r\nâž¡ï¸ Nous respectons nos engagements envers nos clients.\r\nâž¡ï¸ Nous offrons un service de qualitÃ©, respectant des dÃ©lais inÃ©galÃ©s.\r\nâž¡ï¸ Nous vous accompagnons jusqu\'Ã  votre entiÃ¨re satisfaction.\r\nâž¡ï¸ Vous Ãªtes Ã  l\'abri de tout abus de confiance et de perte de temps.\r\nâž¡ï¸ Drone immobilier intervient 7J/7 pour dÃ©fendre vos droits en cas de non-respect des droits du locataire ou des engagements du bailleur. \r\nâž¡ï¸ Vos dossiers sont traitÃ©s avec confidentialitÃ©.\r\nâž¡ï¸ Vous serez informÃ© des meilleures opportunitÃ©s immobiliÃ¨res.\r\nâž¡ï¸ BÃ©nÃ©ficiez des meilleurs conseils et orientations.\r\nâž¡ï¸ Nous nÃ©gocions le meilleur prix Ã  votre demande.\r\nâž¡ï¸ Avant toute acquisition dÃ©finitive, chez Drone immobilier, une enquÃªte immobiliÃ¨re et une vÃ©rification de moralitÃ© de classe mondiale sont effectuÃ©es.\r\n\r\nâ­POURQUOI UN PROPRIÃ‰TAIRE/VENDEUR DEVRAIT FAIRE APPEL Ã€ ETS DRONE IMMOBILIER POUR LA GESTION/VENTE DE SON BIEN IMMOBILIER ? :\r\n\r\nChez Drone immobilier :\r\n\r\nâž¡ï¸ Nous respectons nos engagements envers tous les propriÃ©taires/vendeurs.\r\nâž¡ï¸Nous mobilisons nos meilleurs canaux de communication afin de trouver preneur dans les dÃ©lais inÃ©galÃ©s.\r\nâž¡ï¸Nous vous accompagnons jusqu\'Ã  votre entiÃ¨re satisfaction.\r\nâž¡ï¸Vous Ãªtes Ã  l\'abri de tout abus de confiance et de perte de temps.\r\nâž¡ï¸Drone immobilier intervient 7J/7 pour dÃ©fendre vos droits en cas de non-respect des droits du propriÃ©taire ou des engagements du locataire.\r\nâž¡ï¸Vos dossiers sont traitÃ©s avec confidentialitÃ©.\r\nâž¡ï¸BÃ©nÃ©ficiez des meilleurs conseils et orientations.\r\nâž¡ï¸Nous nÃ©gocions le meilleur prix Ã  votre demande.\r\n\r\nDRONE IMMOBILIER \"AU COEUR DES OPPORTUNITÃ‰S IMMOBILIÃˆRES FIABLE AU CAMEROUN\"\r\n\r\nDRONE IMMOBILIER\"SYNONYME DE CONFIANCE ET DE SATISFACTION\"âœ¨âœ¨âœ¨', 0, 'vente', 12000, 'Cameroun ', 'YaoundÃ© ', 'Manassa (sur la route Awea-Mfou)', '678879197', '2024-05-31 22:26:22', '[\"imagesSauv\\/Terrain \\u00e0 vendre 010624122622_1\",\"imagesSauv\\/Terrain \\u00e0 vendre 010624122622_2\",\"imagesSauv\\/Terrain \\u00e0 vendre 010624122622_3\",\"imagesSauv\\/Terrain \\u00e0 vendre 010624122622_4\",\"imagesSauv\\/Terrain \\u00e0 vendre 010624122622_5\",\"imagesSauv\\/Terrain \\u00e0 vendre 010624122622_6\",\"imagesSauv\\/Terrain \\u00e0 vendre 010624122622_7\"]'),
(61, 1, 'Appartement010624010157', 'Appartement meublÃ© Ã  louer ', '\r\n                Appartement meublÃ© haut standing   Ã  louer    ', 1, 'location', 60000, 'Cameroun ', 'YaoundÃ© ', 'Jouvence ', '678879197', '2024-05-31 23:01:57', '[\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_1\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_2\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_3\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_4\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_5\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_6\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_7\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_8\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_9\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_10\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_11\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_12\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_13\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_14\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_15\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_16\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_17\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_18\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_19\",\"imagesSauv\\/Appartement meubl\\u00e9 \\u00e0 louer 010624010157_20\"]'),
(62, 1, 'Immeuble040624112104', 'Immeuble Ã  louer', '\r\n                                Drone Immobilier (synonyme de confiance et de satisfaction) met Ã  votre disposition un immeuble Ã  louer pour bureau, au lieu dit :  - Ambassade d\'Allemagne - YaoundÃ© - Cameroun \r\n\r\n* CaractÃ©ristiques :\r\n\r\n~  4 appartements de 3 chambres 2 douches\r\n~ 2 appartements de 2 chambres 1 douche \r\n ~  parking 10 voitures, jardin...\r\n\r\nâ€¢ ModalitÃ©s d\'acquisition/de location :\r\n\r\nâœ“ Loyer mensuel : 4 000 000F / mois (nÃ©gociable)\r\nâœ“ Nombre de mois + caution : 12 mois \r\n\r\n* Honoraires prestation de service Drone immobilier :\r\n\r\nâœ“  Frais de suivi dossier ou de visite : 35 000 F\r\nâœ“  Frais de commission : Ã  nÃ©gocier \r\n\r\nInfoline : +237 697 077 302\r\nWhatsApp : + 237 6 78 87 91 97 \r\nE-mail : droneimmobilier03@gmail.com\r\nSite web : https://drone-immobilier.site\r\nBureau gÃ©nÃ©ral : TÃ©lÃ©travail Biteng- YaoundÃ© - Cameroun \r\n\r\nðŸš©AVIS AU PUBLICðŸš©\r\n\r\nLes professionnels de l\'immobilier au Cameroun, tels que Ets Drone immobilier (synonyme de confiance et de satisfaction) et d\'autres, mettent en garde contre les arnaqueurs se faisant passer pour des agents immobiliers.\r\n\r\n90% de ces arnaqueurs ne sont pas du mÃ©tier (ne vivent pas exclusivement de la profession d\'agent immobilier).\r\n\r\nâ­) Nos recommandations :\r\n\r\na) Aucun agent immobilier n\'est habilitÃ© Ã  recevoir l\'argent de vos mois de loyer en dehors de sa commission, mÃªme s\'il a les clÃ©s du logement. S\'il insiste pour recevoir les fonds, dites-lui d\'aller dÃ©charger au commissariat ou Ã  la gendarmerie afin qu\'il soit identifiÃ© et analysÃ©.\r\n\r\nb) Avant de verser l\'argent au prÃ©tendu bailleur :\r\n\r\nâ€¢ Prenez le temps de vous renseigner aprÃ¨s (des locataires, voisins, passants, autoritÃ©s compÃ©tentes, chez le boutiquier Ã  cÃ´tÃ©, le commerÃ§ant...)\r\n\r\nâ€¢ Si possible, demandez Ã  observer les documents d\'appartenance (les factures d\'eau et d\'Ã©lectricitÃ©, reÃ§u d\'achat de matÃ©riaux de construction, titre foncier ou acte de vente....)\r\n\r\nâ€¢ Ne baissez pas la garde mÃªme si l\'agent immobilier est une femme.\r\n\r\nc) Sollicitez les professionnels de l\'immobilier et respectez le mÃ©tier de l\'autre :\r\n\r\nâ€¢ Surtout pour des demandes exigeantes et non Ã©quilibrÃ©es (rapport offre-prix), faites-vous accompagner par un agent immobilier et donnez-lui les moyens de prospecter votre logement sur la durÃ©e.\r\n\r\nâ­Payez les frais de visite convenus.\r\n\r\nâ­Payez la commission convenue aprÃ¨s satisfaction.\r\n\r\nðŸš©Faites des approches verbales respectueuses, soyez poli, respectez votre parole.\r\n\r\nðŸš© Ouvrez votre dossier comme il se doit chez un professionnel de l\'immobilier afin d\'Ã©conomiser les frais de visite.\r\n\r\nðŸš© Signez le protocole d\'accord qui engage l\'agent immobilier et le rassure pour le paiement de sa commission (8 personnes sur 10 refusent de signer le protocole d\'accord parce qu\'ils savent que aprÃ¨s service rendu il est libre de dire que nous n\'avons rien signÃ© au dÃ©part).\r\n\r\nðŸš© MÃªme si l\'accord est verbal : respectez-le. Ã‰vitez de vous jouer de l\'agent immobilier en allant par derriÃ¨re rÃ©cupÃ©rer son offre pour ne pas payer la commission (cela donne d\'emblÃ©e une mauvaise image de vous auprÃ¨s du bailleur).\r\n\r\nðŸš©ðŸ‘‰ðŸ‘‰ðŸ‘‰ðŸš©NB : S\'il existe un accord pÃ©cuniaire entre le bailleur et l\'agent immobilier, cela ne vous regarde pas et n\'influence en rien la commission de l\'agent immobilier auprÃ¨s de vous. Si cela ne vous convient pas, cherchez vous-mÃªme votre logement.â­â­â­\r\n\r\nâœ¨ Trouvez votre logement ou opportunitÃ© immobiliÃ¨re fiable dans toute la capitale en 24 heures avec Drone Immobilier, \"synonyme de confiance et de satisfaction\"âœ¨\r\n\r\nâ­POURQUOI UN CLIENT DEVRAIT CHOISIR ETS DRONE IMMOBILIER POUR L\'ACQUISITION D\'UN BIEN IMMOBILIER ? :\r\n\r\nChez Drone immobilier :\r\n\r\nâž¡ï¸ Nous respectons nos engagements envers nos clients.\r\nâž¡ï¸ Nous offrons un service de qualitÃ©, respectant des dÃ©lais inÃ©galÃ©s.\r\nâž¡ï¸ Nous vous accompagnons jusqu\'Ã  votre entiÃ¨re satisfaction.\r\nâž¡ï¸ Vous Ãªtes Ã  l\'abri de tout abus de confiance et de perte de temps.\r\nâž¡ï¸ Drone immobilier intervient 7J/7 pour dÃ©fendre vos droits en cas de non-respect des droits du locataire ou des engagements du bailleur. \r\nâž¡ï¸ Vos dossiers sont traitÃ©s avec confidentialitÃ©.\r\nâž¡ï¸ Vous serez informÃ© des meilleures opportunitÃ©s immobiliÃ¨res.\r\nâž¡ï¸ BÃ©nÃ©ficiez des meilleurs conseils et orientations.\r\nâž¡ï¸ Nous nÃ©gocions le meilleur prix Ã  votre demande.\r\nâž¡ï¸ Avant toute acquisition dÃ©finitive, chez Drone immobilier, une enquÃªte immobiliÃ¨re et une vÃ©rification de moralitÃ© de classe mondiale sont effectuÃ©es.\r\n\r\nâ­POURQUOI UN PROPRIÃ‰TAIRE/VENDEUR DEVRAIT FAIRE APPEL Ã€ ETS DRONE IMMOBILIER POUR LA GESTION/VENTE DE SON BIEN IMMOBILIER ? :\r\n\r\nChez Drone immobilier :\r\n\r\nâž¡ï¸ Nous respectons nos engagements envers tous les propriÃ©taires/vendeurs.\r\nâž¡ï¸Nous mobilisons nos meilleurs canaux de communication afin de trouver preneur dans les dÃ©lais inÃ©galÃ©s.\r\nâž¡ï¸Nous vous accompagnons jusqu\'Ã  votre entiÃ¨re satisfaction.\r\nâž¡ï¸Vous Ãªtes Ã  l\'abri de tout abus de confiance et de perte de temps.\r\nâž¡ï¸Drone immobilier intervient 7J/7 pour dÃ©fendre vos droits en cas de non-respect des droits du propriÃ©taire ou des engagements du locataire.\r\nâž¡ï¸Vos dossiers sont traitÃ©s avec confidentialitÃ©.\r\nâž¡ï¸BÃ©nÃ©ficiez des meilleurs conseils et orientations.\r\nâž¡ï¸Nous nÃ©gocions le meilleur prix Ã  votre demande.\r\n\r\nDRONE IMMOBILIER \"AU COEUR DES OPPORTUNITÃ‰S IMMOBILIÃˆRES FIABLE AU CAMEROUN\"\r\n\r\nDRONE IMMOBILIER\"SYNONYME DE CONFIANCE ET DE SATISFACTION\"âœ¨âœ¨âœ¨', 1, 'location', 4000000, 'Cameroun ', 'YaoundÃ© ', 'Bastos', '697077302', '2024-06-04 09:21:04', '[\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_1\",\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_2\",\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_3\",\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_4\",\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_5\",\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_6\",\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_7\",\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_8\",\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_9\",\"imagesSauv\\/Immeuble \\u00e0 louer040624112104_10\"]'),
(63, 1, '040624113159', 'Studio moderne', '\r\n                                Drone Immobilier (synonyme de confiance et de satisfaction) met Ã  votre disposition plusieurs Studios haut standing , au lieu dit : TKC - YaoundÃ© - Cameroun \r\n\r\n* CaractÃ©ristiques :\r\n\r\n~  chambre,  douche, cuisine, salon\r\n ~ forage ~ placards, parking...\r\n\r\nâ€¢ ModalitÃ©s d\'acquisition/de location :\r\n\r\nâœ“ Loyer mensuel : 80 000F / mois\r\nâœ“ Nombre de mois + caution : 7 \r\n\r\n* Honoraires prestation de service Drone immobilier :\r\n\r\nâœ“  Frais de suivi dossier ou de visite : 10 000 F\r\nâœ“  Frais de commission : 75 000 F\r\n\r\nInfoline : +237 697 077 302\r\nWhatsApp : + 237 6 78 87 91 97 \r\nE-mail : droneimmobilier03@gmail.com\r\nSite web : https://drone-immobilier.site\r\nBureau gÃ©nÃ©ral : TÃ©lÃ©travail Biteng- YaoundÃ© - Cameroun \r\n\r\nðŸš©AVIS AU PUBLICðŸš©\r\n\r\nLes professionnels de l\'immobilier au Cameroun, tels que Ets Drone immobilier (synonyme de confiance et de satisfaction) et d\'autres, mettent en garde contre les arnaqueurs se faisant passer pour des agents immobiliers.\r\n\r\n90% de ces arnaqueurs ne sont pas du mÃ©tier (ne vivent pas exclusivement de la profession d\'agent immobilier).\r\n\r\nâ­) Nos recommandations :\r\n\r\na) Aucun agent immobilier n\'est habilitÃ© Ã  recevoir l\'argent de vos mois de loyer en dehors de sa commission, mÃªme s\'il a les clÃ©s du logement. S\'il insiste pour recevoir les fonds, dites-lui d\'aller dÃ©charger au commissariat ou Ã  la gendarmerie afin qu\'il soit identifiÃ© et analysÃ©.\r\n\r\nb) Avant de verser l\'argent au prÃ©tendu bailleur :\r\n\r\nâ€¢ Prenez le temps de vous renseigner aprÃ¨s (des locataires, voisins, passants, autoritÃ©s compÃ©tentes, chez le boutiquier Ã  cÃ´tÃ©, le commerÃ§ant...)\r\n\r\nâ€¢ Si possible, demandez Ã  observer les documents d\'appartenance (les factures d\'eau et d\'Ã©lectricitÃ©, reÃ§u d\'achat de matÃ©riaux de construction, titre foncier ou acte de vente....)\r\n\r\nâ€¢ Ne baissez pas la garde mÃªme si l\'agent immobilier est une femme.\r\n\r\nc) Sollicitez les professionnels de l\'immobilier et respectez le mÃ©tier de l\'autre :\r\n\r\nâ€¢ Surtout pour des demandes exigeantes et non Ã©quilibrÃ©es (rapport offre-prix), faites-vous accompagner par un agent immobilier et donnez-lui les moyens de prospecter votre logement sur la durÃ©e.\r\n\r\nâ­Payez les frais de visite convenus.\r\n\r\nâ­Payez la commission convenue aprÃ¨s satisfaction.\r\n\r\nðŸš©Faites des approches verbales respectueuses, soyez poli, respectez votre parole.\r\n\r\nðŸš© Ouvrez votre dossier comme il se doit chez un professionnel de l\'immobilier afin d\'Ã©conomiser les frais de visite.\r\n\r\nðŸš© Signez le protocole d\'accord qui engage l\'agent immobilier et le rassure pour le paiement de sa commission (8 personnes sur 10 refusent de signer le protocole d\'accord parce qu\'ils savent que aprÃ¨s service rendu il est libre de dire que nous n\'avons rien signÃ© au dÃ©part).\r\n\r\nðŸš© MÃªme si l\'accord est verbal : respectez-le. Ã‰vitez de vous jouer de l\'agent immobilier en allant par derriÃ¨re rÃ©cupÃ©rer son offre pour ne pas payer la commission (cela donne d\'emblÃ©e une mauvaise image de vous auprÃ¨s du bailleur).\r\n\r\nðŸš©ðŸ‘‰ðŸ‘‰ðŸ‘‰ðŸš©NB : S\'il existe un accord pÃ©cuniaire entre le bailleur et l\'agent immobilier, cela ne vous regarde pas et n\'influence en rien la commission de l\'agent immobilier auprÃ¨s de vous. Si cela ne vous convient pas, cherchez vous-mÃªme votre logement.â­â­â­\r\n\r\nâœ¨ Trouvez votre logement ou opportunitÃ© immobiliÃ¨re fiable dans toute la capitale en 24 heures avec Drone Immobilier, \"synonyme de confiance et de satisfaction\"âœ¨\r\n\r\nâ­POURQUOI UN CLIENT DEVRAIT CHOISIR ETS DRONE IMMOBILIER POUR L\'ACQUISITION D\'UN BIEN IMMOBILIER ? :\r\n\r\nChez Drone immobilier :\r\n\r\nâž¡ï¸ Nous respectons nos engagements envers nos clients.\r\nâž¡ï¸ Nous offrons un service de qualitÃ©, respectant des dÃ©lais inÃ©galÃ©s.\r\nâž¡ï¸ Nous vous accompagnons jusqu\'Ã  votre entiÃ¨re satisfaction.\r\nâž¡ï¸ Vous Ãªtes Ã  l\'abri de tout abus de confiance et de perte de temps.\r\nâž¡ï¸ Drone immobilier intervient 7J/7 pour dÃ©fendre vos droits en cas de non-respect des droits du locataire ou des engagements du bailleur. \r\nâž¡ï¸ Vos dossiers sont traitÃ©s avec confidentialitÃ©.\r\nâž¡ï¸ Vous serez informÃ© des meilleures opportunitÃ©s immobiliÃ¨res.\r\nâž¡ï¸ BÃ©nÃ©ficiez des meilleurs conseils et orientations.\r\nâž¡ï¸ Nous nÃ©gocions le meilleur prix Ã  votre demande.\r\nâž¡ï¸ Avant toute acquisition dÃ©finitive, chez Drone immobilier, une enquÃªte immobiliÃ¨re et une vÃ©rification de moralitÃ© de classe mondiale sont effectuÃ©es.\r\n\r\nâ­POURQUOI UN PROPRIÃ‰TAIRE/VENDEUR DEVRAIT FAIRE APPEL Ã€ ETS DRONE IMMOBILIER POUR LA GESTION/VENTE DE SON BIEN IMMOBILIER ? :\r\n\r\nChez Drone immobilier :\r\n\r\nâž¡ï¸ Nous respectons nos engagements envers tous les propriÃ©taires/vendeurs.\r\nâž¡ï¸Nous mobilisons nos meilleurs canaux de communication afin de trouver preneur dans les dÃ©lais inÃ©galÃ©s.\r\nâž¡ï¸Nous vous accompagnons jusqu\'Ã  votre entiÃ¨re satisfaction.\r\nâž¡ï¸Vous Ãªtes Ã  l\'abri de tout abus de confiance et de perte de temps.\r\nâž¡ï¸Drone immobilier intervient 7J/7 pour dÃ©fendre vos droits en cas de non-respect des droits du propriÃ©taire ou des engagements du locataire.\r\nâž¡ï¸Vos dossiers sont traitÃ©s avec confidentialitÃ©.\r\nâž¡ï¸BÃ©nÃ©ficiez des meilleurs conseils et orientations.\r\nâž¡ï¸Nous nÃ©gocions le meilleur prix Ã  votre demande.\r\n\r\nDRONE IMMOBILIER \"AU COEUR DES OPPORTUNITÃ‰S IMMOBILIÃˆRES FIABLE AU CAMEROUN\"\r\n\r\nDRONE IMMOBILIER\"SYNONYME DE CONFIANCE ET DE SATISFACTION\"âœ¨âœ¨âœ¨', 1, 'location', 80000, 'Cameroun ', 'YaoundÃ© ', 'TKC', '697077302', '2024-06-04 09:31:59', '[\"imagesSauv\\/Studio moderne040624113159_1\",\"imagesSauv\\/Studio moderne040624113159_2\",\"imagesSauv\\/Studio moderne040624113159_3\",\"imagesSauv\\/Studio moderne040624113159_4\",\"imagesSauv\\/Studio moderne040624113159_5\",\"imagesSauv\\/Studio moderne040624113159_6\",\"imagesSauv\\/Studio moderne040624113159_7\"]');

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id_chambre` int(11) NOT NULL,
  `id_bienFK` int(11) NOT NULL,
  `superficie_chambre` float DEFAULT NULL,
  `moderne_chambre` enum('OUI','NON') DEFAULT 'OUI',
  `cuisine_chambre` enum('OUI','NON') DEFAULT 'NON'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id_favoris` int(11) NOT NULL,
  `id_bienFK` int(11) NOT NULL,
  `id_membreFK` int(11) NOT NULL,
  `date_time_favoris` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `immeuble`
--

CREATE TABLE `immeuble` (
  `id_immeuble` int(11) NOT NULL,
  `id_bienFK` int(11) NOT NULL,
  `superficie_terrain_immeuble` float NOT NULL DEFAULT 0,
  `nbre_etage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `immeuble`
--

INSERT INTO `immeuble` (`id_immeuble`, `id_bienFK`, `superficie_terrain_immeuble`, `nbre_etage`) VALUES
(2, 62, 1200, 2);

-- --------------------------------------------------------

--
-- Structure de la table `magasin`
--

CREATE TABLE `magasin` (
  `id_magasin` int(11) NOT NULL,
  `id_bienFK` int(11) NOT NULL,
  `superficie_magasin` float NOT NULL,
  `nombre_piece_magasin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE `maison` (
  `id_maison` int(11) NOT NULL,
  `id_bienFK` int(11) NOT NULL,
  `nbre_piece` int(11) NOT NULL DEFAULT 0,
  `nbre_chambre` int(11) NOT NULL DEFAULT 0,
  `nbre_cuisine` int(11) NOT NULL DEFAULT 0,
  `nbre_salon` int(11) NOT NULL DEFAULT 0,
  `nbre_douche` int(11) NOT NULL DEFAULT 0,
  `type_maison` enum('studio','appartement','maison','villa') DEFAULT NULL,
  `superficie_terrain` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `membre` (
  `id_membre` int(11) NOT NULL,
  `id_visiteur_FK` int(11) NOT NULL,
  `nom_membre` varchar(50) NOT NULL,
  `prenom_membre` varchar(50) DEFAULT NULL,
  `phone_membre` varchar(25) NOT NULL,
  `email_membre` varchar(100) NOT NULL,
  `pays_membre` varchar(100) NOT NULL,
  `ville_membre` varchar(100) NOT NULL,
  `mdp_membre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `id_adminFK` int(11) NOT NULL,
  `reference_service` varchar(200) NOT NULL,
  `titre_service` varchar(250) DEFAULT NULL,
  `description_service` mediumtext DEFAULT NULL,
  `lien_photo_service` varchar(255) DEFAULT NULL,
  `categorie_service` varchar(200) NOT NULL,
  `date_time_service` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `terrain` (
  `id_terrain` int(11) NOT NULL,
  `id_bienFK` int(11) NOT NULL,
  `superficie_terrain` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `terrain`
--

INSERT INTO `terrain` (`id_terrain`, `id_bienFK`, `superficie_terrain`) VALUES
(6, 60, 7000);

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE `visiteur` (
  `id_visiteur` int(11) NOT NULL,
  `adresse_ip` varchar(250) DEFAULT NULL,
  `datevisiteur` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `fk_admin` (`id_membreFK`);

--
-- Index pour la table `bien`
--
ALTER TABLE `bien`
  ADD PRIMARY KEY (`id_Bien`),
  ADD KEY `fk_bien` (`id_adminFK`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id_chambre`),
  ADD KEY `fk_chambre` (`id_bienFK`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id_favoris`),
  ADD KEY `fk_favoris_bien` (`id_bienFK`),
  ADD KEY `fk_favoris_membre` (`id_membreFK`);

--
-- Index pour la table `immeuble`
--
ALTER TABLE `immeuble`
  ADD PRIMARY KEY (`id_immeuble`),
  ADD KEY `fk_immeuble` (`id_bienFK`);

--
-- Index pour la table `magasin`
--
ALTER TABLE `magasin`
  ADD PRIMARY KEY (`id_magasin`),
  ADD KEY `fk_magasin` (`id_bienFK`);

--
-- Index pour la table `maison`
--
ALTER TABLE `maison`
  ADD PRIMARY KEY (`id_maison`),
  ADD KEY `fk_maison` (`id_bienFK`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`),
  ADD KEY `fk_membre` (`id_visiteur_FK`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`),
  ADD KEY `fk_service` (`id_adminFK`);

--
-- Index pour la table `terrain`
--
ALTER TABLE `terrain`
  ADD PRIMARY KEY (`id_terrain`),
  ADD KEY `fk_terrain` (`id_bienFK`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`id_visiteur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `bien`
--
ALTER TABLE `bien`
  MODIFY `id_Bien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id_favoris` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `immeuble`
--
ALTER TABLE `immeuble`
  MODIFY `id_immeuble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `magasin`
--
ALTER TABLE `magasin`
  MODIFY `id_magasin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `maison`
--
ALTER TABLE `maison`
  MODIFY `id_maison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `terrain`
--
ALTER TABLE `terrain`
  MODIFY `id_terrain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `visiteur`
--
ALTER TABLE `visiteur`
  MODIFY `id_visiteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
