-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 07 déc. 2022 à 21:17
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agencevoyage_dt`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `categorie` varchar(14) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(117) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `categorie`, `description`) VALUES
(1, 'Aventure', 'Les visites « Aventure » regroupent les activités de ski, de plongée, de grimpe et de randonnée.'),
(2, 'Bénévolat', 'Les voyages de bénévolat envoient des volontaires travailler dans des zones touchées par des catastrophes naturelles.'),
(3, 'Culture', 'Les visites « Culture » mettent l\'accent sur les festivals historiques et les échanges culturels.'),
(4, 'Famille', 'Les visites « Famille » concernent des activités de rencontre, mariage et réunion.'),
(5, 'Formation', 'Les visites de formation complètent les acquis scolaires.'),
(6, 'Sport', 'Les visites « Sport » proposent de découvrir les coulisses des grands événements sportifs.'),
(7, 'Visite de site', 'Les visites de sites concentrent les activités sur des attractions touristiques.');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `prenom` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `nom` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `adresse` varchar(28) COLLATE utf8_bin DEFAULT NULL,
  `ville` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `CP` varchar(7) COLLATE utf8_bin DEFAULT NULL,
  `telephone` varchar(14) COLLATE utf8_bin DEFAULT NULL,
  `courriel` varchar(35) COLLATE utf8_bin DEFAULT NULL,
  `genre` varchar(1) COLLATE utf8_bin DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `premierContact_id` int(11) DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `prenom`, `nom`, `adresse`, `ville`, `CP`, `telephone`, `courriel`, `genre`, `province_id`, `premierContact_id`, `admin`) VALUES
(1, 'Bernard', 'Moulineau', '368, rue du Campanile', 'Québec', 'G1X 4G6', '(418) 228/1234', 'bmoulineau@videotron.ca', 'M', 10, 1, 0),
(2, 'Martine', 'Allard', '996, St-Michel', 'Montréal-Nord', 'H1H 5G7', '(514) 111/6931', 'mmallard@irbc.net', 'F', 10, 1, 0),
(3, 'Camille', 'Boucher', '540, Bd des Galeries', 'Québec', 'G2K 1N4', '(418) 111/3081', 'cboucher@golfedoman.net', 'M', 10, 2, 0),
(4, 'Alicia', 'Beaulieu', '220, Bd Le Corbusier', 'Laval', 'H7S 2C9', '(450) 222/9101', 'abeaulieu@cowanind.net', 'F', 10, 2, 0),
(5, 'Bertrande', 'Bédard', '573, Ferncroft', 'Hampstead', 'H3X 1C4', '(514) 222/7002', 'bbedard@marines.com', 'F', 10, 1, 0),
(6, 'Christine', 'Renard', '120, Av. de Germain-des-Prés', 'Québec', 'G1V 3M7', '(418) 222/3602', 'crenard@plumearabe.com', 'F', 10, 4, 0),
(7, 'Denise', 'Chavant', '444, Bd R. Lévesque Ouest', 'Montréal', 'H2Z 1Z6', '(514) 222/8402', 'camel2@jugeorges.com', 'F', 10, 3, 0),
(8, 'Eugène', 'Clovis', '694, Hochelaga', 'Montréal', 'H1N 1Y9', '(514) 222/5102', 'eclovis@shipwreck.org', 'M', 10, 1, 0),
(9, 'Jeanne', 'Côté', '338, Bd de la Concorde Est', 'Laval', 'H7E 2C2', '(450) 333/9871', 'jcote@foxnews.com', 'F', 10, 3, 0),
(10, 'Andrée', 'Ernest', 'Place Ste-Foy', 'Québec', 'G2T 1C4', '(418) 333/0401', 'aernest@chinaoil.com', 'F', 10, 2, 0),
(11, 'Ginette', 'Déchêne', '659, 3E Avenue', 'Québec', 'G1L 2W5', '(418) 333/0401', 'gdechene@cavutobusiness.com', 'F', 10, 1, 0),
(12, 'Carole', 'Denault', '117, Sherbrooke Ouest', 'Montréal', 'H3A 1H6', '(514) 444/4404', 'cdenault@colonelsmoutarde.com', 'F', 10, 3, 0),
(13, 'Marie', 'Durant', '333, rue du Carrefour', 'Québec', 'G1C 5R9', '(418) 444/8844', 'marie@fontanelle.gouv', 'F', 10, 2, 0),
(14, 'Claude', 'Éloi', 'Place Laurier', 'Québec', 'G1V 2L8', '(418) 444/7414', 'celoy@tremblementdeterre.com', 'M', 10, 4, 0),
(15, 'Jean', 'Gagnon', '215, avenue Pierre-Péladeau', 'Laval', 'H7T 3C2', '(450) 566/4344', 'gagnon@dalailama.net', 'M', 10, 4, 0),
(16, 'Louise', 'Garneau', '542 Métropolitain Est', 'Saint-Léonard', 'H1P 1X2', '(514) 666/1324', 'louise.garneau@dowind.com', 'F', 10, 2, 0),
(17, 'Michel', 'Hébert', '20, Bd d\'Anjou', 'Châteauguay', 'J6K 1C5', '(450) 666/0365', 'mhebert@militarytrends.com', 'M', 10, 2, 0),
(18, 'Joseph', 'Hervieux', '11, St-Jean-Baptiste', 'Le Bic', 'G5L 3S4', '(418) 777/8774', 'jhervieux@refroidissementglobal.org', 'M', 10, 3, 0),
(19, 'Claude', 'Huberty', '162, rue Laurier', 'Québec', 'G1V 4T3', '(418) 888/6004', 'chuberty@rechauffementglobal.net', 'F', 10, 1, 0),
(20, 'Christelle', 'Juneau', '30, Prince-Arthur Ouest', 'Montréal', 'H2X 1S3', '(514) 999/7154', 'chjuneau@nyquilmed.com', 'F', 10, 3, 0),
(21, 'François', 'Levesque', '447, Métropolitain Est', 'Chomedey', 'H7T 1C8', '(514) 999/8777', 'levesque55@perle.com', 'M', 10, 1, 0),
(22, 'Nathalie', 'Lussier', '447 Métropolitain Est', 'Saint-Léonard', 'H1R 1Z4', '(514) 222/8908', 'lussier60@visionnaire.com', 'F', 10, 3, 0),
(23, 'Albane', 'Martin', '15, Laurier Est', 'Quebec', 'H2T 2N8', '(450) 333/8578', 'amartin@coteouest.net', 'M', 3, 4, 0),
(24, 'Catherine', 'Morency', '130, Ste-Catherine Ouest', 'Montréal', 'H3G 1P7', '(514) 444/8505', 'cmorency@bretzelbrot.ca', 'F', 10, 1, 0),
(25, 'Élise', 'Moulineau', '55, Bd Wilfrid-Hamel', 'Québec', 'G1M 2S6', '(418) 777/9414', 'emoulineau@filigrane.com', 'A', 2, 2, 0),
(26, 'Robert', 'Maxit', '145, Peel', 'Montréal', 'H3A 1S8', '(514) 888/4514', 'maxit@maximum.com', 'M', 10, 3, 0),
(27, 'Gaëlle', 'Maillard', '217, Montagne', 'Montréal', 'H3G 1ZB', '(514) 777/6434', 'gmaillard@vastetat.org', 'F', 10, 2, 0),
(28, 'Grégoire', 'Normand', '820, 19e Avenue', 'Montréal', 'H1Z 4J8', '(514) 666/5084', 'gnormand@seimensindustry.com', 'M', 10, 1, 0),
(29, 'Marguerite', 'Olive', '119, St-Jean', 'Québec', 'G1R 1S7', '(418) 222/1388', 'molive@kflbanquet.net', 'F', 10, 3, 0),
(30, 'Gabrielle', 'Ouelet', '447, Métropolitain Est', 'Chomedey', 'H7T 1C8', '(514) 333/2434', 'gouelet@switchcity.org', 'F', 10, 1, 0),
(31, 'Ange', 'Patel', '31, Bd Labelle Rosemere', 'Sainte-Thérèse', 'H7U 3J8', '(450) 666/4404', 'apatel@quebecassurances.net', 'F', 10, 2, 0),
(32, 'Jean-Marc', 'Vachon', '780, Bd Thibeau', 'Cap-de-la-Madeleine', 'G8T 6X5', '(819) 777/8504', 'vachonfrere@urgences.net', 'M', 10, 2, 0),
(33, 'Mérisa', 'Villeneuve', '91, rue Champlain', 'Dieppe', 'E1A 1N4', '(506) 111/0403', 'mvilleneuve@century12.com', 'F', 4, 4, 0),
(34, 'Camille', 'Turcotte', '30, Barkoff', 'Cap-de-la-Madeleine', 'G8T 2A3', '(819) 222/8503', 'cturcottepresident@trainvoiture.com', 'M', 10, 4, 0),
(35, 'Alexandra', 'Pelletier', '27, Av. des Pionniers', 'Balmoral', 'E4S 3J5', '(506) 222/8773', 'apelletier@bransonmo.net', 'F', 4, 4, 0),
(38, 'admine', 'Tremblay', '13 Rue des Tremblay', 'Montmagny', 'G5R 333', '418-888-9999', 'admin@admin.com', 'F', 5, 3, 1),
(40, 'Laurie', 'Caron', '34 A rue frontenac', 'riviere du loup', 'G5R 1S5', '4187098252', 'lauriecaron16@gmail.com', 'F', 10, 1, 0),
(45, 'David', 'Tremblay', '70, Chemin du Lac Sud', 'Saint-Mathieu de Rioux', 'G0L 3T0', '4182346666', 'davtremb@hotmail.com', 'F', 3, 1, 0),
(48, 'Tony', 'Fredo', '475, Rue Beauniens', 'Rimouski', 'G0K 1H0', '4187090745', 'tonyfredomail@gmail.com', 'M', 10, 1, 0),
(49, 'Tony', 'Fredo', '475, Rue Beauniens', 'Rimouski', 'G0K 1H0', '4187090745', 'tonyfredoemail@gmail.com', 'M', 1, 1, 0),
(50, 'Tony', 'Fredo', '475, Rue Beauniens', 'Rimouski', 'G0K 1H0', '4187090745', 'tonyfrede2eomail@gmail.com', 'M', 1, 1, 0),
(52, 'Lil', 'Rapper', '234, Rue de Gauche', 'St-Guy', 'G0L 4R5', '4188696969', 'oui@mail.com', 'M', 8, 3, 0),
(54, 'Atony', 'Fredo', '475, Rue Beauniens', 'Rimouski', 'G0K 1H0', '4188510274', 'salutoui@gmail.com', 'M', 10, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `codeDepartement` varchar(3) COLLATE utf8_bin NOT NULL,
  `nomDepartement` varchar(23) COLLATE utf8_bin DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id`, `codeDepartement`, `nomDepartement`, `region_id`) VALUES
(1, '1', 'Ain', 27),
(2, '10', 'Aube', 7),
(3, '11', 'Aude', 17),
(4, '12', 'Aveyron', 19),
(5, '13', 'Bouches-du-Rhône', 22),
(6, '14', 'Calvados', 4),
(7, '15', 'Cantal', 3),
(8, '16', 'Charente', 23),
(9, '17', 'Charente-Maritime', 23),
(10, '18', 'Cher', 8),
(11, '19', 'Corrèze', 15),
(12, '2', 'Aisne', 25),
(13, '21', 'Côte-d\'Or', 5),
(14, '22', 'Côtes-d\'Armor', 6),
(15, '23', 'Creuse', 15),
(16, '24', 'Dordogne', 2),
(17, '25', 'Doubs', 10),
(18, '26', 'Drôme', 27),
(19, '27', 'Eure', 13),
(20, '28', 'Eure-et-Loir', 8),
(21, '29', 'Finistère', 6),
(22, '2A', 'Corse-du-Sud', 9),
(23, '2B', 'Haute-Corse', 9),
(24, '3', 'Allier', 3),
(25, '30', 'Gard', 17),
(26, '31', 'Haute-Garonne', 19),
(27, '32', 'Gers', 19),
(28, '33', 'Gironde', 2),
(29, '34', 'Hérault', 17),
(30, '35', 'Ille-et-Vilaine', 6),
(31, '36', 'Indre', 8),
(32, '37', 'Indre-et-Loire', 8),
(33, '38', 'Isère', 27),
(34, '39', 'Jura', 10),
(35, '4', 'Alpes-de-Haute-Provence', 22),
(36, '40', 'Landes', 2),
(37, '41', 'Loir-et-Cher', 8),
(38, '42', 'Loire', 27),
(39, '43', 'Haute-Loire', 3),
(40, '44', 'Loire-Atlantique', 26),
(41, '45', 'Loiret', 8),
(42, '46', 'Lot', 19),
(43, '47', 'Lot-et-Garonne', 2),
(44, '48', 'Lozère', 17),
(45, '49', 'Maine-et-Loire', 26),
(46, '5', 'Hautes-Alpes', 22),
(47, '50', 'Manche', 4),
(48, '51', 'Marne', 7),
(49, '52', 'Haute-Marne', 7),
(50, '53', 'Mayenne', 26),
(51, '54', 'Meurthe-et-Moselle', 16),
(52, '55', 'Meuse', 16),
(53, '56', 'Morbihan', 6),
(54, '57', 'Moselle', 16),
(55, '58', 'Nièvre', 5),
(56, '59', 'Nord', 21),
(57, '6', 'Alpes-Maritimes', 22),
(58, '60', 'Oise', 25),
(59, '61', 'Orne', 4),
(60, '62', 'Pas-de-Calais', 21),
(61, '63', 'Puy-de-Dôme', 3),
(62, '64', 'Pyrénées-Atlantiques', 2),
(63, '65', 'Hautes-Pyrénées', 19),
(64, '66', 'Pyrénées-Orientales', 17),
(65, '67', 'Bas-Rhin', 1),
(66, '68', 'Haut-Rhin', 1),
(67, '69', 'Rhône', 27),
(68, '7', 'Ardèche', 27),
(69, '70', 'Haute-Saône', 10),
(70, '71', 'Saône-et-Loire', 5),
(71, '72', 'Sarthe', 26),
(72, '73', 'Savoie', 27),
(73, '74', 'Haute-Savoie', 27),
(74, '75', 'Paris', 14),
(75, '76', 'Seine-Maritime', 13),
(76, '77', 'Seine-et-Marne', 14),
(77, '78', 'Yvelines', 14),
(78, '79', 'Deux-Sèvres', 23),
(79, '8', 'Ardennes', 7),
(80, '80', 'Somme', 25),
(81, '81', 'Tarn', 19),
(82, '82', 'Tarn-et-Garonne', 19),
(83, '83', 'Var', 22),
(84, '84', 'Vaucluse', 22),
(85, '85', 'Vendée', 26),
(86, '86', 'Vienne', 23),
(87, '87', 'Haute-Vienne', 15),
(88, '88', 'Vosges', 16),
(89, '89', 'Yonne', 5),
(90, '9', 'Ariège', 19),
(91, '90', 'Territoire de Belfort', 10),
(92, '91', 'Essonne', 14),
(93, '92', 'Hauts-de-Seine', 14),
(94, '93', 'Seine-Saint-Denis', 14),
(95, '94', 'Val-de-Marne', 14),
(96, '95', 'Val-d\'Oise', 14),
(97, '971', 'Guadeloupe', 11),
(98, '972', 'Martinique', 18),
(99, '973', 'Guyanne', 12),
(100, '974', 'Réunion', 28),
(101, '987', 'Polynésie française', 24);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_11_11_193208_create_categorie_table', 0),
(2, '2021_11_11_193208_create_client_table', 0),
(3, '2021_11_11_193208_create_departement_table', 0),
(4, '2021_11_11_193208_create_paiement_table', 0),
(5, '2021_11_11_193208_create_premiercontact_table', 0),
(6, '2021_11_11_193208_create_province_table', 0),
(7, '2021_11_11_193208_create_region_table', 0),
(8, '2021_11_11_193208_create_vente_table', 0),
(9, '2021_11_11_193208_create_voyage_table', 0),
(10, '2021_11_11_193209_add_foreign_keys_to_client_table', 0),
(11, '2021_11_11_193209_add_foreign_keys_to_departement_table', 0),
(12, '2021_11_11_193209_add_foreign_keys_to_paiement_table', 0),
(13, '2021_11_11_193209_add_foreign_keys_to_vente_table', 0),
(14, '2021_11_11_193209_add_foreign_keys_to_voyage_table', 0),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(16, '2021_11_17_144440_create_categorie_table', 0),
(17, '2021_11_17_144440_create_client_table', 0),
(18, '2021_11_17_144440_create_departement_table', 0),
(19, '2021_11_17_144440_create_item_table', 0),
(20, '2021_11_17_144440_create_paiement_table', 0),
(21, '2021_11_17_144440_create_panieritem_table', 0),
(22, '2021_11_17_144440_create_personal_access_tokens_table', 0),
(23, '2021_11_17_144440_create_premiercontact_table', 0),
(24, '2021_11_17_144440_create_province_table', 0),
(25, '2021_11_17_144440_create_region_table', 0),
(26, '2021_11_17_144440_create_vente_table', 0),
(27, '2021_11_17_144440_create_voyage_table', 0),
(28, '2021_11_17_144441_add_foreign_keys_to_client_table', 0),
(29, '2021_11_17_144441_add_foreign_keys_to_departement_table', 0),
(30, '2021_11_17_144441_add_foreign_keys_to_paiement_table', 0),
(31, '2021_11_17_144441_add_foreign_keys_to_vente_table', 0),
(32, '2021_11_17_144441_add_foreign_keys_to_voyage_table', 0),
(33, '2021_11_17_150715_create_categorie_table', 0),
(34, '2021_11_17_150715_create_client_table', 0),
(35, '2021_11_17_150715_create_departement_table', 0),
(36, '2021_11_17_150715_create_paiement_table', 0),
(37, '2021_11_17_150715_create_panier_table', 0),
(38, '2021_11_17_150715_create_personal_access_tokens_table', 0),
(39, '2021_11_17_150715_create_premiercontact_table', 0),
(40, '2021_11_17_150715_create_province_table', 0),
(41, '2021_11_17_150715_create_region_table', 0),
(42, '2021_11_17_150715_create_vente_table', 0),
(43, '2021_11_17_150715_create_voyage_table', 0),
(44, '2021_11_17_150716_add_foreign_keys_to_client_table', 0),
(45, '2021_11_17_150716_add_foreign_keys_to_departement_table', 0),
(46, '2021_11_17_150716_add_foreign_keys_to_paiement_table', 0),
(47, '2021_11_17_150716_add_foreign_keys_to_vente_table', 0),
(48, '2021_11_17_150716_add_foreign_keys_to_voyage_table', 0),
(49, '2021_11_17_150854_create_categorie_table', 0),
(50, '2021_11_17_150854_create_client_table', 0),
(51, '2021_11_17_150854_create_departement_table', 0),
(52, '2021_11_17_150854_create_paiement_table', 0),
(53, '2021_11_17_150854_create_panier_table', 0),
(54, '2021_11_17_150854_create_personal_access_tokens_table', 0),
(55, '2021_11_17_150854_create_premiercontact_table', 0),
(56, '2021_11_17_150854_create_province_table', 0),
(57, '2021_11_17_150854_create_region_table', 0),
(58, '2021_11_17_150854_create_vente_table', 0),
(59, '2021_11_17_150854_create_voyage_table', 0),
(60, '2021_11_17_150855_add_foreign_keys_to_client_table', 0),
(61, '2021_11_17_150855_add_foreign_keys_to_departement_table', 0),
(62, '2021_11_17_150855_add_foreign_keys_to_paiement_table', 0),
(63, '2021_11_17_150855_add_foreign_keys_to_vente_table', 0),
(64, '2021_11_17_150855_add_foreign_keys_to_voyage_table', 0),
(65, '2021_11_17_152321_create_categorie_table', 0),
(66, '2021_11_17_152321_create_client_table', 0),
(67, '2021_11_17_152321_create_departement_table', 0),
(68, '2021_11_17_152321_create_paiement_table', 0),
(69, '2021_11_17_152321_create_panier_table', 0),
(70, '2021_11_17_152321_create_paniervoyage_table', 0),
(71, '2021_11_17_152321_create_personal_access_tokens_table', 0),
(72, '2021_11_17_152321_create_premiercontact_table', 0),
(73, '2021_11_17_152321_create_province_table', 0),
(74, '2021_11_17_152321_create_region_table', 0),
(75, '2021_11_17_152321_create_vente_table', 0),
(76, '2021_11_17_152321_create_voyage_table', 0),
(77, '2021_11_17_152322_add_foreign_keys_to_client_table', 0),
(78, '2021_11_17_152322_add_foreign_keys_to_departement_table', 0),
(79, '2021_11_17_152322_add_foreign_keys_to_paiement_table', 0),
(80, '2021_11_17_152322_add_foreign_keys_to_vente_table', 0),
(81, '2021_11_17_152322_add_foreign_keys_to_voyage_table', 0),
(82, '2021_11_18_191041_create_categorie_table', 0),
(83, '2021_11_18_191041_create_client_table', 0),
(84, '2021_11_18_191041_create_departement_table', 0),
(85, '2021_11_18_191041_create_paiement_table', 0),
(86, '2021_11_18_191041_create_panier_table', 0),
(87, '2021_11_18_191041_create_personal_access_tokens_table', 0),
(88, '2021_11_18_191041_create_premiercontact_table', 0),
(89, '2021_11_18_191041_create_province_table', 0),
(90, '2021_11_18_191041_create_region_table', 0),
(91, '2021_11_18_191041_create_vente_table', 0),
(92, '2021_11_18_191041_create_voyage_table', 0),
(93, '2021_11_18_191042_add_foreign_keys_to_client_table', 0),
(94, '2021_11_18_191042_add_foreign_keys_to_departement_table', 0),
(95, '2021_11_18_191042_add_foreign_keys_to_paiement_table', 0),
(96, '2021_11_18_191042_add_foreign_keys_to_panier_table', 0),
(97, '2021_11_18_191042_add_foreign_keys_to_vente_table', 0),
(98, '2021_11_18_191042_add_foreign_keys_to_voyage_table', 0),
(99, '2021_12_01_131239_create_categorie_table', 0),
(100, '2021_12_01_131239_create_client_table', 0),
(101, '2021_12_01_131239_create_commande_table', 0),
(102, '2021_12_01_131239_create_departement_table', 0),
(103, '2021_12_01_131239_create_paiement_table', 0),
(104, '2021_12_01_131239_create_panier_table', 0),
(105, '2021_12_01_131239_create_personal_access_tokens_table', 0),
(106, '2021_12_01_131239_create_premiercontact_table', 0),
(107, '2021_12_01_131239_create_province_table', 0),
(108, '2021_12_01_131239_create_region_table', 0),
(109, '2021_12_01_131239_create_vente_table', 0),
(110, '2021_12_01_131239_create_voyage_table', 0),
(111, '2021_12_01_131240_add_foreign_keys_to_client_table', 0),
(112, '2021_12_01_131240_add_foreign_keys_to_departement_table', 0),
(113, '2021_12_01_131240_add_foreign_keys_to_paiement_table', 0),
(114, '2021_12_01_131240_add_foreign_keys_to_panier_table', 0),
(115, '2021_12_01_131240_add_foreign_keys_to_vente_table', 0),
(116, '2021_12_01_131240_add_foreign_keys_to_voyage_table', 0),
(117, '2021_12_01_145807_create_categorie_table', 0),
(118, '2021_12_01_145807_create_client_table', 0),
(119, '2021_12_01_145807_create_commande_table', 0),
(120, '2021_12_01_145807_create_departement_table', 0),
(121, '2021_12_01_145807_create_paiement_table', 0),
(122, '2021_12_01_145807_create_panier_table', 0),
(123, '2021_12_01_145807_create_personal_access_tokens_table', 0),
(124, '2021_12_01_145807_create_premiercontact_table', 0),
(125, '2021_12_01_145807_create_province_table', 0),
(126, '2021_12_01_145807_create_region_table', 0),
(127, '2021_12_01_145807_create_vente_table', 0),
(128, '2021_12_01_145807_create_voyage_table', 0),
(129, '2021_12_01_145808_add_foreign_keys_to_client_table', 0),
(130, '2021_12_01_145808_add_foreign_keys_to_departement_table', 0),
(131, '2021_12_01_145808_add_foreign_keys_to_paiement_table', 0),
(132, '2021_12_01_145808_add_foreign_keys_to_panier_table', 0),
(133, '2021_12_01_145808_add_foreign_keys_to_vente_table', 0),
(134, '2021_12_01_145808_add_foreign_keys_to_voyage_table', 0),
(135, '2021_12_01_153121_create_categorie_table', 0),
(136, '2021_12_01_153121_create_client_table', 0),
(137, '2021_12_01_153121_create_commande_table', 0),
(138, '2021_12_01_153121_create_departement_table', 0),
(139, '2021_12_01_153121_create_paiement_table', 0),
(140, '2021_12_01_153121_create_panier_table', 0),
(141, '2021_12_01_153121_create_personal_access_tokens_table', 0),
(142, '2021_12_01_153121_create_premiercontact_table', 0),
(143, '2021_12_01_153121_create_province_table', 0),
(144, '2021_12_01_153121_create_region_table', 0),
(145, '2021_12_01_153121_create_vente_table', 0),
(146, '2021_12_01_153121_create_voyage_table', 0),
(147, '2021_12_01_153122_add_foreign_keys_to_client_table', 0),
(148, '2021_12_01_153122_add_foreign_keys_to_departement_table', 0),
(149, '2021_12_01_153122_add_foreign_keys_to_paiement_table', 0),
(150, '2021_12_01_153122_add_foreign_keys_to_panier_table', 0),
(151, '2021_12_01_153122_add_foreign_keys_to_vente_table', 0),
(152, '2021_12_01_153122_add_foreign_keys_to_voyage_table', 0),
(153, '2021_12_01_155347_create_categorie_table', 0),
(154, '2021_12_01_155347_create_client_table', 0),
(155, '2021_12_01_155347_create_departement_table', 0),
(156, '2021_12_01_155347_create_paiement_table', 0),
(157, '2021_12_01_155347_create_panier_table', 0),
(158, '2021_12_01_155347_create_personal_access_tokens_table', 0),
(159, '2021_12_01_155347_create_premiercontact_table', 0),
(160, '2021_12_01_155347_create_province_table', 0),
(161, '2021_12_01_155347_create_region_table', 0),
(162, '2021_12_01_155347_create_vente_table', 0),
(163, '2021_12_01_155347_create_voyage_table', 0),
(164, '2021_12_01_155348_add_foreign_keys_to_client_table', 0),
(165, '2021_12_01_155348_add_foreign_keys_to_departement_table', 0),
(166, '2021_12_01_155348_add_foreign_keys_to_paiement_table', 0),
(167, '2021_12_01_155348_add_foreign_keys_to_panier_table', 0),
(168, '2021_12_01_155348_add_foreign_keys_to_vente_table', 0),
(169, '2021_12_01_155348_add_foreign_keys_to_voyage_table', 0),
(170, '2021_12_06_173656_create_categorie_table', 0),
(171, '2021_12_06_173656_create_client_table', 0),
(172, '2021_12_06_173656_create_departement_table', 0),
(173, '2021_12_06_173656_create_paiement_table', 0),
(174, '2021_12_06_173656_create_panier_table', 0),
(175, '2021_12_06_173656_create_personal_access_tokens_table', 0),
(176, '2021_12_06_173656_create_premiercontact_table', 0),
(177, '2021_12_06_173656_create_province_table', 0),
(178, '2021_12_06_173656_create_region_table', 0),
(179, '2021_12_06_173656_create_vente_table', 0),
(180, '2021_12_06_173656_create_voyage_table', 0),
(181, '2021_12_06_173657_add_foreign_keys_to_client_table', 0),
(182, '2021_12_06_173657_add_foreign_keys_to_departement_table', 0),
(183, '2021_12_06_173657_add_foreign_keys_to_paiement_table', 0),
(184, '2021_12_06_173657_add_foreign_keys_to_panier_table', 0),
(185, '2021_12_06_173657_add_foreign_keys_to_vente_table', 0),
(186, '2021_12_06_173657_add_foreign_keys_to_voyage_table', 0),
(187, '2021_12_06_193901_create_categorie_table', 0),
(188, '2021_12_06_193901_create_client_table', 0),
(189, '2021_12_06_193901_create_departement_table', 0),
(190, '2021_12_06_193901_create_paiement_table', 0),
(191, '2021_12_06_193901_create_panier_table', 0),
(192, '2021_12_06_193901_create_personal_access_tokens_table', 0),
(193, '2021_12_06_193901_create_premiercontact_table', 0),
(194, '2021_12_06_193901_create_province_table', 0),
(195, '2021_12_06_193901_create_region_table', 0),
(196, '2021_12_06_193901_create_vente_table', 0),
(197, '2021_12_06_193901_create_voyage_table', 0),
(198, '2021_12_06_193902_add_foreign_keys_to_client_table', 0),
(199, '2021_12_06_193902_add_foreign_keys_to_departement_table', 0),
(200, '2021_12_06_193902_add_foreign_keys_to_paiement_table', 0),
(201, '2021_12_06_193902_add_foreign_keys_to_panier_table', 0),
(202, '2021_12_06_193902_add_foreign_keys_to_vente_table', 0),
(203, '2021_12_06_193902_add_foreign_keys_to_voyage_table', 0),
(204, '2021_12_06_205107_create_categorie_table', 0),
(205, '2021_12_06_205107_create_client_table', 0),
(206, '2021_12_06_205107_create_departement_table', 0),
(207, '2021_12_06_205107_create_paiement_table', 0),
(208, '2021_12_06_205107_create_panier_table', 0),
(209, '2021_12_06_205107_create_personal_access_tokens_table', 0),
(210, '2021_12_06_205107_create_premiercontact_table', 0),
(211, '2021_12_06_205107_create_province_table', 0),
(212, '2021_12_06_205107_create_region_table', 0),
(213, '2021_12_06_205107_create_vente_table', 0),
(214, '2021_12_06_205107_create_voyage_table', 0),
(215, '2021_12_06_205108_add_foreign_keys_to_client_table', 0),
(216, '2021_12_06_205108_add_foreign_keys_to_departement_table', 0),
(217, '2021_12_06_205108_add_foreign_keys_to_paiement_table', 0),
(218, '2021_12_06_205108_add_foreign_keys_to_panier_table', 0),
(219, '2021_12_06_205108_add_foreign_keys_to_vente_table', 0),
(220, '2021_12_06_205108_add_foreign_keys_to_voyage_table', 0),
(221, '2021_12_06_215227_create_categorie_table', 0),
(222, '2021_12_06_215227_create_client_table', 0),
(223, '2021_12_06_215227_create_departement_table', 0),
(224, '2021_12_06_215227_create_paiement_table', 0),
(225, '2021_12_06_215227_create_panier_table', 0),
(226, '2021_12_06_215227_create_personal_access_tokens_table', 0),
(227, '2021_12_06_215227_create_premiercontact_table', 0),
(228, '2021_12_06_215227_create_province_table', 0),
(229, '2021_12_06_215227_create_region_table', 0),
(230, '2021_12_06_215227_create_vente_table', 0),
(231, '2021_12_06_215227_create_voyage_table', 0),
(232, '2021_12_06_215228_add_foreign_keys_to_client_table', 0),
(233, '2021_12_06_215228_add_foreign_keys_to_departement_table', 0),
(234, '2021_12_06_215228_add_foreign_keys_to_paiement_table', 0),
(235, '2021_12_06_215228_add_foreign_keys_to_panier_table', 0),
(236, '2021_12_06_215228_add_foreign_keys_to_vente_table', 0),
(237, '2021_12_06_215228_add_foreign_keys_to_voyage_table', 0),
(238, '2021_12_06_231253_create_categorie_table', 0),
(239, '2021_12_06_231253_create_client_table', 0),
(240, '2021_12_06_231253_create_departement_table', 0),
(241, '2021_12_06_231253_create_paiement_table', 0),
(242, '2021_12_06_231253_create_panier_table', 0),
(243, '2021_12_06_231253_create_personal_access_tokens_table', 0),
(244, '2021_12_06_231253_create_premiercontact_table', 0),
(245, '2021_12_06_231253_create_province_table', 0),
(246, '2021_12_06_231253_create_region_table', 0),
(247, '2021_12_06_231253_create_vente_table', 0),
(248, '2021_12_06_231253_create_voyage_table', 0),
(249, '2021_12_06_231254_add_foreign_keys_to_client_table', 0),
(250, '2021_12_06_231254_add_foreign_keys_to_departement_table', 0),
(251, '2021_12_06_231254_add_foreign_keys_to_paiement_table', 0),
(252, '2021_12_06_231254_add_foreign_keys_to_panier_table', 0),
(253, '2021_12_06_231254_add_foreign_keys_to_vente_table', 0),
(254, '2021_12_06_231254_add_foreign_keys_to_voyage_table', 0),
(255, '2021_12_06_231445_create_categorie_table', 0),
(256, '2021_12_06_231445_create_client_table', 0),
(257, '2021_12_06_231445_create_departement_table', 0),
(258, '2021_12_06_231445_create_paiement_table', 0),
(259, '2021_12_06_231445_create_panier_table', 0),
(260, '2021_12_06_231445_create_personal_access_tokens_table', 0),
(261, '2021_12_06_231445_create_premiercontact_table', 0),
(262, '2021_12_06_231445_create_province_table', 0),
(263, '2021_12_06_231445_create_region_table', 0),
(264, '2021_12_06_231445_create_vente_table', 0),
(265, '2021_12_06_231445_create_voyage_table', 0),
(266, '2021_12_06_231446_add_foreign_keys_to_client_table', 0),
(267, '2021_12_06_231446_add_foreign_keys_to_departement_table', 0),
(268, '2021_12_06_231446_add_foreign_keys_to_paiement_table', 0),
(269, '2021_12_06_231446_add_foreign_keys_to_panier_table', 0),
(270, '2021_12_06_231446_add_foreign_keys_to_vente_table', 0),
(271, '2021_12_06_231446_add_foreign_keys_to_voyage_table', 0),
(272, '2021_12_07_182621_create_categorie_table', 0),
(273, '2021_12_07_182621_create_client_table', 0),
(274, '2021_12_07_182621_create_departement_table', 0),
(275, '2021_12_07_182621_create_paiement_table', 0),
(276, '2021_12_07_182621_create_panier_table', 0),
(277, '2021_12_07_182621_create_personal_access_tokens_table', 0),
(278, '2021_12_07_182621_create_premiercontact_table', 0),
(279, '2021_12_07_182621_create_province_table', 0),
(280, '2021_12_07_182621_create_region_table', 0),
(281, '2021_12_07_182621_create_vente_table', 0),
(282, '2021_12_07_182621_create_voyage_table', 0),
(283, '2021_12_07_182622_add_foreign_keys_to_client_table', 0),
(284, '2021_12_07_182622_add_foreign_keys_to_departement_table', 0),
(285, '2021_12_07_182622_add_foreign_keys_to_paiement_table', 0),
(286, '2021_12_07_182622_add_foreign_keys_to_panier_table', 0),
(287, '2021_12_07_182622_add_foreign_keys_to_vente_table', 0),
(288, '2021_12_07_182622_add_foreign_keys_to_voyage_table', 0),
(289, '2022_11_16_144257_create_categorie_table', 0),
(290, '2022_11_16_144257_create_client_table', 0),
(291, '2022_11_16_144257_create_departement_table', 0),
(292, '2022_11_16_144257_create_paiement_table', 0),
(293, '2022_11_16_144257_create_panier_table', 0),
(294, '2022_11_16_144257_create_personal_access_tokens_table', 0),
(295, '2022_11_16_144257_create_premiercontact_table', 0),
(296, '2022_11_16_144257_create_province_table', 0),
(297, '2022_11_16_144257_create_region_table', 0),
(298, '2022_11_16_144257_create_vente_table', 0),
(299, '2022_11_16_144257_create_voyage_table', 0),
(300, '2022_11_16_144258_add_foreign_keys_to_client_table', 0),
(301, '2022_11_16_144258_add_foreign_keys_to_departement_table', 0),
(302, '2022_11_16_144258_add_foreign_keys_to_paiement_table', 0),
(303, '2022_11_16_144258_add_foreign_keys_to_panier_table', 0),
(304, '2022_11_16_144258_add_foreign_keys_to_vente_table', 0),
(305, '2022_11_16_144258_add_foreign_keys_to_voyage_table', 0);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id` int(11) NOT NULL,
  `datePaiement` date DEFAULT NULL,
  `montantPaiement` decimal(7,2) DEFAULT NULL,
  `vente_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`id`, `datePaiement`, `montantPaiement`, `vente_id`) VALUES
(1, '2018-04-30', '250.00', 1),
(2, '2018-04-30', '450.00', 2),
(3, '2018-04-30', '750.00', 3),
(4, '2018-04-30', '600.00', 4),
(5, '2018-06-01', '600.00', 5),
(6, '2018-06-01', '600.00', 6),
(7, '2018-06-01', '600.00', 7),
(8, '2018-07-07', '100.00', 8),
(9, '2018-07-08', '200.00', 9),
(10, '2018-07-09', '200.00', 10),
(11, '2018-07-09', '200.00', 11),
(12, '2018-07-09', '600.00', 12),
(13, '2018-04-01', '750.00', 13),
(14, '2018-07-11', '750.00', 14),
(15, '2018-07-23', '250.00', 15),
(16, '2018-07-11', '750.00', 16),
(17, '2018-07-11', '750.00', 17),
(18, '2018-07-11', '450.00', 18),
(19, '2018-07-12', '450.00', 19),
(20, '2018-07-12', '450.00', 20),
(21, '2018-07-13', '450.00', 21),
(22, '2018-07-13', '450.00', 22),
(23, '2018-07-14', '1000.00', 23),
(24, '2018-07-14', '600.00', 24),
(25, '2018-07-15', '600.00', 25),
(26, '2018-07-15', '600.00', 26),
(27, '2018-07-15', '600.00', 27),
(28, '2018-07-19', '350.00', 28),
(29, '2018-07-20', '400.00', 29),
(30, '2018-07-20', '400.00', 30),
(31, '2018-07-21', '400.00', 31),
(32, '2018-07-22', '300.00', 32),
(33, '2018-07-22', '300.00', 33),
(34, '2018-07-26', '300.00', 34),
(35, '2018-07-26', '250.00', 35),
(36, '2018-07-26', '300.00', 36),
(37, '2018-07-26', '250.00', 37),
(38, '2018-07-26', '150.00', 38),
(39, '2019-01-02', '150.00', 39),
(40, '2019-01-02', '200.00', 40),
(41, '2018-05-01', '750.00', 13),
(42, '2018-07-23', '750.00', 14),
(43, '2018-07-11', '750.00', 15),
(44, '2018-07-20', '750.00', 16),
(45, '2018-07-01', '100.00', 5),
(46, '2018-05-30', '250.00', 1),
(47, '2018-05-30', '100.00', 4),
(48, '2018-08-07', '100.00', 8),
(49, '2018-07-01', '300.00', 6),
(50, '2018-08-09', '100.00', 12),
(51, '2018-08-14', '100.00', 12),
(52, '2018-07-23', '750.00', 17),
(53, '2018-08-14', '100.00', 24),
(54, '2018-08-15', '100.00', 25),
(55, '2018-08-15', '100.00', 27),
(56, '2018-08-14', '200.00', 28),
(57, '2018-05-19', '100.00', 98),
(58, '2018-07-01', '200.00', 7),
(59, '2018-08-20', '100.00', 29),
(60, '2018-08-20', '100.00', 30),
(61, '2018-05-21', '100.00', 31),
(62, '2018-05-11', '100.00', 18),
(63, '2018-05-22', '100.00', 32),
(64, '2018-05-12', '150.00', 19),
(65, '2018-05-21', '100.00', 33),
(66, '2018-09-01', '100.00', 34),
(67, '2018-09-01', '50.00', 20),
(68, '2018-09-01', '50.00', 35),
(69, '2018-10-01', '100.00', 36),
(70, '2018-10-01', '100.00', 21),
(71, '2019-07-01', '100.00', 38),
(72, '2018-12-01', '200.00', 22),
(73, '2019-07-01', '100.00', 39),
(74, '2018-06-30', '250.00', 2),
(75, '2019-07-01', '50.00', 40),
(76, '2018-08-01', '200.00', 5),
(77, '2018-08-01', '200.00', 6),
(78, '2018-08-01', '200.00', 7),
(79, '2018-09-01', '200.00', 7),
(80, '2018-11-01', '100.00', 21),
(96, '2021-12-06', '1723.50', 172),
(97, '2021-12-06', '1723.50', 173),
(98, '2021-12-06', '2872.50', 174),
(99, '2021-12-06', '287.25', 175),
(100, '2021-12-06', '2257.79', 176),
(101, '2021-12-06', '919.20', 177),
(102, '2021-12-06', '287.25', 178),
(103, '2021-12-06', '861.75', 179),
(104, '2021-12-06', '861.75', 180),
(105, '2021-12-06', '3906.60', 181),
(111, '2021-12-07', '861.75', 185),
(116, '2022-11-30', '1954.58', 190),
(117, '2022-11-30', '3449.25', 191),
(118, '2022-12-02', '2414.48', 192),
(119, '2022-12-07', '4139.10', 193);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `ip_client` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voyage_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `ip_client`, `voyage_id`, `quantite`, `client_id`) VALUES
(104, '127.0.0.1', 1, 1, 24);

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `premiercontact`
--

CREATE TABLE `premiercontact` (
  `id` int(11) NOT NULL,
  `premierContact` varchar(8) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `premiercontact`
--

INSERT INTO `premiercontact` (`id`, `premierContact`) VALUES
(1, 'Ami'),
(2, 'Autre'),
(3, 'Internet'),
(4, 'Radio');

-- --------------------------------------------------------

--
-- Structure de la table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `province` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `codeProvince` varchar(2) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `province`
--

INSERT INTO `province` (`id`, `province`, `codeProvince`) VALUES
(1, 'Alberta', 'AB'),
(2, 'Colombie-Britannique', 'BC'),
(3, 'Manitoba', 'MB'),
(4, 'Nouveau-Brunswick', 'NB'),
(5, 'Terre-Neuve-et-Labrador', 'NL'),
(6, 'Nouvelle-Écosse', 'NS'),
(7, 'Territoires du Nord-Ouest', 'NT'),
(8, 'Ontario', 'ON'),
(9, 'Île-du-Prince-Édouard', 'PE'),
(10, 'Québec', 'QC'),
(11, 'Saskatchewan', 'SK'),
(12, 'Territoires du Yukon', 'YT');

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `codeRegion` varchar(4) COLLATE utf8_bin NOT NULL,
  `nomRegion` varchar(35) COLLATE utf8_bin DEFAULT NULL,
  `typeRegion` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `ancienNom` varchar(26) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`id`, `codeRegion`, `nomRegion`, `typeRegion`, `ancienNom`) VALUES
(1, 'AL', 'Alsace-Champagne-Ardenne-Lorraine', 'MET', 'Alsace'),
(2, 'AQ', 'Aquitaine-Limousin-Poitou-Charentes', 'MET', 'Aquitaine'),
(3, 'AU', 'Auvergne-Rhône-Alpes', 'MET', 'Auvergne'),
(4, 'BN', 'Normandie', 'MET', 'Basse-Normandie'),
(5, 'BO', 'Bourgogne-Franche-Comté', 'MET', 'Bourgogne'),
(6, 'BR', 'Bretagne', 'MET', 'Bretagne'),
(7, 'CA', 'Alsace-Champagne-Ardenne-Lorraine', 'MET', 'Champagne-Ardenne'),
(8, 'CE', 'Centre-Val de Loire', 'MET', 'Centre'),
(9, 'CO', 'Corse', 'MET', 'Corse'),
(10, 'FC', 'Bourgogne-Franche-Comté', 'MET', 'Franche-Comté'),
(11, 'GD', 'Guadeloupe', 'ROM', 'Guadeloupe'),
(12, 'GN', 'Guyane', 'ROM', 'Guyane'),
(13, 'HN', 'Normandie', 'MET', 'Haute-Normandie'),
(14, 'IF', 'Île-de-France', 'MET', 'Île-de-France'),
(15, 'LI', 'Aquitaine-Limousin-Poitou-Charentes', 'MET', 'Limousin'),
(16, 'LO', 'Alsace-Champagne-Ardenne-Lorraine', 'MET', 'Lorraine'),
(17, 'LR', 'Languedoc-Roussillon-Midi-Pyrénées', 'MET', 'Languedoc-Roussillon'),
(18, 'MA', 'Martinique', 'ROM', 'Martinique'),
(19, 'MP', 'Languedoc-Roussillon-Midi-Pyrénées', 'MET', 'Midi-Pyrrénées'),
(20, 'MY', 'Mayotte', 'COM', 'Mayotte'),
(21, 'NPC', 'Nord-Pas-de-Calais-Picardie', 'MET', 'Nord-Pas de Calais'),
(22, 'PACA', 'Provence-Alpes-Côte d\'Azur', 'MET', 'Provence-Alpes-Côte d\'Azur'),
(23, 'PC', 'Aquitaine-Limousin-Poitou-Charentes', 'MET', 'Poitou-Charentes'),
(24, 'PF', 'Polynésie Française', 'COM', 'Polynésie Française'),
(25, 'PI', 'Nord-Pas-de-Calais-Picardie', 'MET', 'Picardie'),
(26, 'PL', 'Pays-de-la-Loire', 'MET', 'Pays-de-la-Loire'),
(27, 'RA', 'Auvergne-Rhône-Alpes', 'MET', 'Rhône-Alpes'),
(28, 'RE', 'La Réunion', 'ROM', 'La Réunion'),
(29, 'SB', 'Saint-Barthélemy', 'COM', 'Saint-Barthélemy'),
(30, 'SM', 'Saint-Martin', 'COM', 'Saint-Martin'),
(31, 'WF', 'Wallis et Futuna', 'COM', 'Wallis et Futuna');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `id` int(11) NOT NULL,
  `dateVente` date DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `voyage_id` int(11) DEFAULT NULL,
  `quantiteVoyageurs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`id`, `dateVente`, `client_id`, `voyage_id`, `quantiteVoyageurs`) VALUES
(1, '2018-11-01', 6, 3, 1),
(2, '2018-11-01', 32, 1, 1),
(3, '2018-11-01', 34, 1, 1),
(4, '2019-08-03', 6, 47, 1),
(5, '2019-08-03', 4, 36, 1),
(6, '2019-08-03', 8, 36, 1),
(7, '2019-08-03', 15, 36, 1),
(8, '2018-08-03', 6, 51, 1),
(9, '2021-08-03', 7, 51, 1),
(10, '2021-08-03', 8, 51, 1),
(11, '2021-08-03', 9, 51, 1),
(12, '2021-08-03', 9, 36, 1),
(13, '2021-08-03', 1, 2, 1),
(14, '2021-08-03', 2, 2, 1),
(15, '2021-06-06', 3, 2, 1),
(16, '2021-06-06', 5, 2, 1),
(17, '2021-06-06', 11, 2, 1),
(18, '2021-06-06', 19, 3, 1),
(19, '2021-06-06', 21, 3, 1),
(20, '2021-06-06', 24, 3, 1),
(21, '2021-06-06', 28, 3, 1),
(22, '2021-06-06', 30, 3, 1),
(23, '2021-06-06', 10, 4, 1),
(24, '2021-01-27', 11, 5, 1),
(25, '2021-01-27', 12, 5, 1),
(26, '2021-01-27', 13, 5, 1),
(27, '2021-01-27', 14, 5, 1),
(28, '2021-01-27', 15, 6, 1),
(29, '2021-01-27', 16, 6, 1),
(30, '2021-01-27', 17, 6, 1),
(31, '2021-01-27', 18, 6, 1),
(32, '2021-01-27', 20, 7, 1),
(33, '2021-01-27', 22, 7, 1),
(34, '2021-01-27', 23, 7, 1),
(35, '2021-01-27', 25, 8, 1),
(36, '2021-01-27', 26, 8, 1),
(37, '2021-01-27', 27, 9, 1),
(38, '2021-01-27', 29, 9, 1),
(39, '2021-01-27', 31, 9, 1),
(40, '2021-01-27', 33, 9, 1),
(81, '2021-01-27', 3, 12, 1),
(82, '2021-01-27', 4, 2, 1),
(83, '2021-01-27', 5, 2, 1),
(84, '2021-01-27', 6, 36, 1),
(85, '2021-01-27', 15, 2, 1),
(86, '2021-01-27', 16, 1, 1),
(87, '2021-01-27', 16, 36, 1),
(88, '2021-01-27', 16, 51, 1),
(89, '2021-01-27', 17, 51, 1),
(90, '2021-01-27', 18, 36, 1),
(91, '2021-01-27', 19, 51, 1),
(92, '2021-01-27', 11, 51, 1),
(93, '2021-01-27', 12, 36, 1),
(94, '2021-01-27', 13, 4, 1),
(95, '2021-01-27', 14, 2, 1),
(96, '2021-01-27', 15, 5, 1),
(97, '2021-01-27', 17, 5, 1),
(98, '2021-01-27', 35, 5, 1),
(99, '2021-01-27', 34, 5, 1),
(100, '2021-01-27', 30, 36, 1),
(101, '2021-11-15', 31, 6, 1),
(102, '2021-11-15', 32, 6, 1),
(103, '2021-11-15', 33, 6, 1),
(104, '2021-11-15', 25, 6, 1),
(105, '2021-11-15', 26, 3, 1),
(106, '2021-11-15', 27, 7, 1),
(107, '2021-11-15', 29, 2, 1),
(108, '2021-11-15', 28, 7, 1),
(109, '2021-11-15', 21, 7, 1),
(110, '2021-11-15', 22, 3, 1),
(111, '2021-11-15', 23, 8, 1),
(112, '2021-11-15', 24, 8, 1),
(113, '2021-11-15', 25, 1, 1),
(114, '2021-11-15', 29, 3, 1),
(115, '2021-11-15', 15, 9, 1),
(116, '2021-11-15', 16, 3, 1),
(117, '2021-11-15', 17, 10, 1),
(118, '2021-11-15', 6, 1, 1),
(119, '2021-11-15', 12, 10, 1),
(120, '2021-11-15', 19, 1, 1),
(121, '2021-11-15', 1, 53, 1),
(122, '2021-11-15', 2, 44, 1),
(172, '2021-12-06', 1, 1, 2),
(173, '2021-12-06', 1, 2, 1),
(174, '2021-12-06', 2, 8, 5),
(175, '2021-12-06', 2, 9, 1),
(176, '2021-12-06', 2, 16, 3),
(177, '2021-12-06', 2, 14, 2),
(178, '2021-12-06', 16, 9, 1),
(179, '2021-12-06', 16, 1, 1),
(180, '2021-12-06', 40, 1, 1),
(181, '2021-12-07', 40, 3, 4),
(185, '2021-12-08', 40, 1, 2),
(190, '2022-11-30', 45, 3, 2),
(191, '2022-11-30', 45, 2, 2),
(192, '2022-12-02', 45, 6, 3),
(193, '2022-12-07', 45, 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `voyage`
--

CREATE TABLE `voyage` (
  `id` int(11) NOT NULL,
  `nomVoyage` varchar(41) COLLATE utf8_bin DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `ville` varchar(24) COLLATE utf8_bin DEFAULT NULL,
  `prix` decimal(7,2) DEFAULT NULL,
  `imgLink` varchar(300) COLLATE utf8_bin NOT NULL DEFAULT 'https://themelbournecoast.com/wp-content/uploads/2019/10/sunset-on-beach-goa-9WNQR7M.jpg',
  `departement_id` int(11) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `voyage`
--

INSERT INTO `voyage` (`id`, `nomVoyage`, `dateDebut`, `duree`, `ville`, `prix`, `imgLink`, `departement_id`, `categorie_id`) VALUES
(1, 'Découverte marine', '2018-07-24', 7, 'Nice', '750.00', 'https://th.bing.com/th/id/OIP.JnQ9Rp4Hd8H6O0kGUE6XlwHaEK?pid=ImgDet&rs=1', 57, 1),
(2, 'Club de plongée Baie de St-Jean', '2018-07-24', 6, 'Saint-Jean-Cap-Ferrat', '1500.00', 'https://www.in-depthoutdoors.com/wp-content/uploads/2016/06/Sunset-6-11-16.jpg', 57, 1),
(3, 'Club de ski Cyclone', '2019-01-20', 7, 'Tarbes', '850.00', 'https://media.discordapp.net/attachments/833367188139802675/1042456353374994522/image.png', 63, 1),
(4, '6e Troupe de Scouts', '2019-01-31', 10, 'Lourdes', '1900.00', 'https://th.bing.com/th/id/OIP.Fsy6LQOZufxiuRLgYVhNAwHaD4?pid=ImgDet&rs=1', 63, 1),
(5, 'Jachères sauvages', '2019-03-05', 10, 'Arthès-de-Béarn', '1200.00', 'https://www.semencemag.fr/photos/faisan-src-pixabay.jpg', 62, 1),
(6, 'Réunion familiale Rizières', '2019-03-29', 7, 'Saintes-Maries de la Mer', '700.00', 'https://www.e-traveldesigner.com/wp-content/uploads/2016/12/rizi%C3%A8re-vietnam-1080x682.jpg', 5, 4),
(7, 'Club de ski Aéronautes', '2019-03-31', 7, 'Châtel', '600.00', 'https://media.discordapp.net/attachments/833367188139802675/1042456353374994522/image.png', 73, 1),
(8, 'Réunion de la famille Lavoie-Mercier', '2019-06-30', 7, 'Bonifacio', '500.00', 'https://th.bing.com/th/id/OIP.g3dbHlHPJtpk7P-OhwvoZQHaDt?pid=ImgDet&rs=1', 22, 4),
(9, 'Séjours séniors en forme', '2019-07-08', 4, 'Bastia', '250.00', 'https://th.bing.com/th/id/R.1b4207a511ee39a1270bd1414683e5dc?rik=8Zek8vcwYLKuXw&riu=http%3a%2f%2fil3.picdn.net%2fshutterstock%2fvideos%2f4656143%2fthumb%2f2.jpg%3fi10c%3dimg.resize(height%3a160)&ehk=a%2bka9og18MIdjstZD7Ms5%2bnv7VIfjPuQXwJ766UiK9A%3d&risl=&pid=ImgRaw&r=0', 23, 1),
(10, 'Troupe de dance Flamenco', '2018-06-10', 5, 'Arles', '550.00', 'https://mcetv.fr/wp-content/uploads/2016/05/Insolite-%C3%A0-55-ans-cet-homme-est-le-roi-du-pole-dance.jpg', 5, 7),
(11, 'Omaha Alpha Phi', '2018-06-17', 7, 'Dunkerke', '725.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 57, 7),
(12, 'Mariage Barilla-Cavuto', '2018-06-17', 7, 'Foix', '825.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 90, 4),
(13, 'Grands Aventuriers', '2018-06-23', 7, 'Privas', '575.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 68, 1),
(14, 'Grimpeurs-randonneurs', '2018-06-30', 4, 'Morez', '400.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 34, 7),
(15, 'Club de débat les Patriotes', '2018-06-30', 7, 'Paris', '605.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 74, 7),
(16, 'Exploration des calanques', '2018-07-07', 7, 'Cassis', '655.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 5, 1),
(17, 'Club de randonnée sauvage du Buech', '2018-07-07', 7, 'Aspres-sur-Buech', '695.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 46, 1),
(18, 'Paradis tropical', '2018-07-07', 7, 'Antibes', '595.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 57, 1),
(19, 'Découverte de Nous', '2018-07-14', 5, 'Moustier', '550.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 83, 1),
(20, 'Réserve naturelle de Scandolo', '2018-07-17', 7, 'Porto', '700.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 23, 1),
(21, 'Vagues idéales', '2018-07-17', 5, 'Capbreton', '500.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 36, 1),
(22, 'Jeunes forestiers bénévoles', '2018-07-15', 7, 'Orcines', '395.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 61, 2),
(23, 'Jeunes bénévoles de Saint-Denis', '2018-07-17', 7, 'Saint-Denis', '425.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 100, 2),
(24, 'Association des jeunes d\'Emmanuelle', '2018-07-19', 7, 'Paris', '500.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 74, 2),
(25, 'Mariage Metayer-Michel', '2018-07-20', 3, 'Papeete', '300.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 101, 4),
(26, 'Réunion de la famille Merlot', '2018-07-20', 3, 'Hyacinthe', '350.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 98, 4),
(27, 'Réunion de la famille Barchon', '2018-07-20', 4, 'Les Anses d\'Arlet', '395.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 98, 4),
(28, 'Pays de l\'or', '2018-07-31', 14, 'Saint-Girons', '1200.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 90, 5),
(29, 'Mystères du Rhône', '2018-08-01', 7, 'Lyon', '800.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 67, 5),
(30, 'Jazz à Juan-les-Pins', '2018-07-31', 7, 'Juan-les-Pins', '890.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 57, 5),
(31, 'Cinq jours au Paradis', '2019-08-08', 5, 'Hatiheu (Nuku Hiva)', '1600.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 101, 5),
(32, 'Magazinage sur les Champs-Élysées', '2018-09-11', 7, 'Paris', '1000.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 74, 5),
(33, 'Architecture coloniale en Guyane', '2018-09-06', 14, 'Saint-Laurent-du-Maroni', '3000.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 99, 5),
(34, 'Visites du patrimoine de la Liberté', '2018-09-11', 7, 'Paris', '1000.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 74, 5),
(35, 'Héritage de la noblesse européenne', '2018-09-11', 7, 'Versailles', '1200.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 77, 5),
(36, 'Musée de volcanologie', '2018-10-02', 7, 'Saint-Denis', '800.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 100, 5),
(37, 'Fondation pour la préservation de l\'eau', '2018-10-09', 14, 'Rueil-Malmaison', '1300.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 93, 5),
(38, 'La Nef des Sciences', '2018-08-07', 7, 'Mulhouse', '1000.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 66, 5),
(39, 'Laboratoire forestier de l\'Ébène vert', '2018-10-17', 14, 'Cambrouze', '1500.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 99, 5),
(40, 'Musée de préhistoire des gorges du Verdon', '2018-11-06', 10, 'Quinson', '900.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 35, 7),
(41, 'Échanges en langue française', '2018-09-06', 7, 'Brest', '800.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 21, 7),
(42, 'Échanges culturels Francophonie-Chine', '2018-09-06', 4, 'Limoges', '424.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 87, 3),
(43, 'Aventures à la Vallée des Ours', '2018-09-06', 7, 'Arbas', '725.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 26, 1),
(44, 'Club de randonnée du Mouton noir', '2018-09-13', 4, 'Ajaccio', '525.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 22, 1),
(45, 'Oueds et Rios radeau', '2018-07-31', 4, 'Guillestre', '455.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 46, 1),
(46, 'Amicale de dépollution du Mont-Blanc', '2018-08-07', 14, 'Chamonix Mont Blanc', '1100.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 73, 2),
(47, 'Les bâtisseurs de villages perdus', '2016-08-01', 10, 'Lamothe', '950.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 36, 2),
(48, 'Viaduc de Millau', '2018-07-31', 10, 'Milleau', '1400.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 4, 3),
(50, 'Les grands musées d\'art et d\'histoire', '2018-08-07', 9, 'Paris', '800.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 74, 5),
(51, 'Club de randonnée des canyons du Verdon', '2016-01-08', 7, 'Esparron de Verdon', '950.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 35, 1),
(52, 'Visite de Paris, vue de la Seine', '2018-12-19', 4, 'Paris', '700.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 74, 7),
(53, 'Séjour de pèche en rivière d\'altitude', '2018-08-31', 7, 'Cazères', '1400.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 26, 1),
(54, 'Traversée de la Baie du Mont St-Michel', '2019-10-25', 4, 'Le Mont St-Michel', '500.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 47, 7),
(55, 'Feux d\'artifice du 1er aout', '2019-07-31', 3, 'Châtel', '300.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 73, 7),
(56, 'Conservatoire du Saumon', '2019-05-05', 4, 'Chanteuges', '800.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 39, 1),
(57, 'La Venise des Alpes', '2019-07-04', 3, 'Annecy', '500.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 73, 7),
(58, 'Croisière épique en Méditerranée', '2019-08-01', 10, 'Marseille', '2000.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 5, 1),
(59, 'Rapaces du Puy-de-Dôme', '2019-01-09', 6, 'Orcines', '700.00', 'https://www.bouger-voyager.com/wp-content/uploads/2014/03/voyage-avec-enfants.jpg', 42, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie` (`categorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prenom` (`prenom`,`nom`),
  ADD KEY `province_id` (`province_id`),
  ADD KEY `premierContact_id` (`premierContact_id`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomDepartement` (`nomDepartement`),
  ADD KEY `region_id` (`region_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vente_id` (`vente_id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `panier_ibfk_1` (`voyage_id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `premiercontact`
--
ALTER TABLE `premiercontact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province` (`province`);

--
-- Index pour la table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomRegion` (`nomRegion`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `voyage_id` (`voyage_id`);

--
-- Index pour la table `voyage`
--
ALTER TABLE `voyage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomVoyage` (`nomVoyage`),
  ADD KEY `departement_id` (`departement_id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `premiercontact`
--
ALTER TABLE `premiercontact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT pour la table `voyage`
--
ALTER TABLE `voyage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`),
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`premierContact_id`) REFERENCES `premiercontact` (`id`);

--
-- Contraintes pour la table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `departement_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`);

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`vente_id`) REFERENCES `vente` (`id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`id`);

--
-- Contraintes pour la table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `vente_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `vente_ibfk_2` FOREIGN KEY (`voyage_id`) REFERENCES `voyage` (`id`);

--
-- Contraintes pour la table `voyage`
--
ALTER TABLE `voyage`
  ADD CONSTRAINT `voyage_ibfk_1` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`),
  ADD CONSTRAINT `voyage_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
