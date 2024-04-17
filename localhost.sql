-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 03 avr. 2024 à 13:25
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `garage`
--
DROP DATABASE `garage`;
CREATE DATABASE IF NOT EXISTS `garage` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `garage`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'PIECES DE RECHANGE', '2024-03-12 10:24:26', '2024-03-12 10:24:26'),
(5, 'LUBRIFIANTS', '2024-03-16 08:38:30', '2024-03-16 08:38:30'),
(6, 'OILS ( Engin oil , Gear oil, Axle oil........)', '2024-03-16 08:41:55', '2024-03-16 08:41:55');

-- --------------------------------------------------------

--
-- Structure de la table `emplacements`
--

CREATE TABLE `emplacements` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `emplacements`
--

INSERT INTO `emplacements` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'MODELE 1618', '2024-03-12 10:19:32', '2024-03-12 10:19:32'),
(2, 'MODELE 613 LPT', '2024-03-12 10:19:58', '2024-03-12 11:41:06'),
(3, 'MODELE 407 LPT & SFC', '2024-03-12 10:20:24', '2024-03-14 07:57:58'),
(7, 'LUBRIFIANTS', '2024-03-16 08:35:25', '2024-03-16 08:35:25');

-- --------------------------------------------------------

--
-- Structure de la table `entrees`
--

CREATE TABLE `entrees` (
  `id` bigint UNSIGNED NOT NULL,
  `quantite` decimal(8,2) NOT NULL,
  `prix` decimal(8,2) NOT NULL,
  `provenance` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `observation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `piece_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entrees`
--

INSERT INTO `entrees` (`id`, `quantite`, `prix`, `provenance`, `observation`, `piece_id`, `created_at`, `updated_at`) VALUES
(1, 2.00, 0.00, 'Inde', 'premier lot arrivage', 1, '2024-03-12 10:35:06', '2024-03-12 10:35:06'),
(2, 3.00, 0.00, 'inde', NULL, 21, '2024-03-12 11:24:15', '2024-03-12 11:24:15'),
(3, 29.00, 0.00, 'Inde', 'le stock s\'ajoute aux nombres deja compilé', 20, '2024-03-12 11:44:33', '2024-03-12 11:44:33'),
(4, 2.00, 0.00, 'Inde', 'RAS', 43, '2024-03-12 12:45:45', '2024-03-12 12:45:45'),
(5, 2.00, 0.00, 'Inde', 'RAS', 30, '2024-03-12 12:46:52', '2024-03-12 12:46:52'),
(6, 2.00, 0.00, 'inde', NULL, 45, '2024-03-12 13:03:34', '2024-03-12 13:03:34'),
(7, 2.00, 0.00, 'inde', NULL, 45, '2024-03-12 13:03:34', '2024-03-12 13:03:34'),
(8, 4.00, 0.00, 'inde', 'RAS', 54, '2024-03-12 13:07:24', '2024-03-12 13:07:24'),
(9, 2.00, 0.00, 'inde', 'RAS', 57, '2024-03-13 09:50:40', '2024-03-13 09:50:40'),
(10, 5.00, 0.00, 'inde', 'ras', 37, '2024-03-13 09:54:16', '2024-03-13 09:54:16'),
(11, 2.00, 0.00, 'inde', 'RAS', 60, '2024-03-13 09:57:12', '2024-03-13 09:57:12'),
(12, 2.00, 0.00, 'inde', 'RAS', 42, '2024-03-13 09:58:17', '2024-03-13 09:58:17'),
(13, 5.00, 0.00, 'inde', 'Ras', 2, '2024-03-13 10:02:26', '2024-03-13 10:02:26'),
(14, 5.00, 0.00, 'inde', NULL, 3, '2024-03-13 10:02:51', '2024-03-13 10:02:51'),
(15, 1.00, 0.00, 'inde', NULL, 15, '2024-03-13 10:04:23', '2024-03-13 10:04:23'),
(16, 2.00, 0.00, 'Inde', NULL, 9, '2024-03-13 10:06:47', '2024-03-13 10:06:47'),
(17, 1.00, 0.00, 'inde', NULL, 14, '2024-03-13 10:13:47', '2024-03-13 10:13:47'),
(18, 2.00, 0.00, 'inde', NULL, 5, '2024-03-13 10:17:55', '2024-03-13 10:17:55'),
(19, 2.00, 0.00, 'inde', NULL, 5, '2024-03-13 10:21:10', '2024-03-13 10:21:10'),
(20, 4.00, 0.00, 'inde', NULL, 1, '2024-03-13 10:22:25', '2024-03-13 10:22:25'),
(21, 2.00, 0.00, 'inde', NULL, 6, '2024-03-13 10:23:19', '2024-03-13 10:23:19'),
(22, 2.00, 0.00, 'inde', NULL, 4, '2024-03-13 10:23:56', '2024-03-13 10:23:56'),
(23, 4.00, 0.00, 'Inde', NULL, 8, '2024-03-13 10:25:14', '2024-03-13 10:25:14'),
(24, 3.00, 0.00, 'Inde', NULL, 15, '2024-03-13 10:27:14', '2024-03-13 10:27:14'),
(25, 3.00, 0.00, 'Inde', NULL, 9, '2024-03-13 10:28:11', '2024-03-13 10:28:11'),
(26, 1.00, 0.00, 'inde', NULL, 10, '2024-03-13 10:29:37', '2024-03-13 10:29:37'),
(27, 2.00, 0.00, 'Inde', NULL, 12, '2024-03-13 11:48:57', '2024-03-13 11:48:57'),
(28, 4.00, 0.00, 'Inde', NULL, 17, '2024-03-13 11:50:56', '2024-03-13 11:50:56'),
(29, 4.00, 0.00, 'Inde', 'ras', 13, '2024-03-14 05:45:02', '2024-03-14 05:45:02'),
(30, 9.00, 0.00, 'inde', 'ras', 14, '2024-03-14 05:46:00', '2024-03-14 05:46:00'),
(31, 22.00, 0.00, 'Inde', 'ras', 62, '2024-03-14 05:47:19', '2024-03-14 05:47:19'),
(32, 12.00, 0.00, 'Inde', NULL, 16, '2024-03-14 05:54:32', '2024-03-14 05:54:32'),
(33, 12.00, 0.00, 'Inde', NULL, 16, '2024-03-14 05:54:32', '2024-03-14 05:54:32'),
(34, 12.00, 0.00, 'Inde', 'ras', 16, '2024-03-14 05:54:34', '2024-03-14 05:54:34'),
(35, 2.00, 0.00, 'INDE', 'RAS', 63, '2024-03-14 06:00:37', '2024-03-14 06:00:37'),
(36, 2.00, 0.00, 'inde', 'ras', 18, '2024-03-14 06:04:31', '2024-03-14 06:04:31'),
(37, 4.00, 0.00, 'inde', 'RAS', 19, '2024-03-14 06:05:44', '2024-03-14 06:05:44'),
(38, 2.00, 0.00, 'inde', 'Second lot', 48, '2024-03-14 08:09:15', '2024-03-14 08:09:15'),
(39, 2.00, 0.00, 'Inde', 'Second lot', 73, '2024-03-14 08:12:10', '2024-03-14 08:12:10'),
(40, 2.00, 0.00, 'INDE', NULL, 73, '2024-03-14 08:19:31', '2024-03-14 08:19:31'),
(41, 2.00, 0.00, 'INDE', 'Second lot ,meme que 407 sfc or 407 lpt', 73, '2024-03-14 08:21:30', '2024-03-14 08:21:30'),
(42, 2.00, 0.00, 'Inde', 'Second lot same with 613', 75, '2024-03-14 08:37:20', '2024-03-14 08:37:20'),
(43, 6.00, 0.00, 'Inde', 'RAS', 20, '2024-03-14 08:47:11', '2024-03-14 08:47:11'),
(44, 11.00, 0.00, 'inde', 'RAS', 21, '2024-03-14 08:51:35', '2024-03-14 08:51:35'),
(45, 1.00, 0.00, 'Inde', 'RAS', 23, '2024-03-14 08:53:12', '2024-03-14 08:53:12'),
(46, 4.00, 0.00, 'inde', 'RAS', 43, '2024-03-14 08:57:31', '2024-03-14 08:57:31'),
(47, 3.00, 0.00, 'Inde', '2 GAUCHE ET 1 DROIT', 75, '2024-03-14 09:03:54', '2024-03-14 09:03:54'),
(48, 2.00, 0.00, 'Inde', 'RAS', 61, '2024-03-14 09:05:08', '2024-03-14 09:05:08'),
(49, 3.00, 0.00, 'inde', 'ras', 55, '2024-03-14 09:10:16', '2024-03-14 09:10:16'),
(50, 4.00, 0.00, 'inde', NULL, 54, '2024-03-14 10:07:57', '2024-03-14 10:07:57'),
(51, 4.00, 0.00, 'inde', NULL, 54, '2024-03-14 10:07:58', '2024-03-14 10:07:58'),
(52, 2.00, 0.00, 'Inde', 'ras', 57, '2024-03-14 10:17:02', '2024-03-14 10:17:02'),
(53, 2.00, 0.00, 'inde', 'RAS', 71, '2024-03-14 10:18:00', '2024-03-14 10:18:00'),
(54, 2.00, 0.00, 'inde', 'Ras', 43, '2024-03-14 10:18:54', '2024-03-14 10:18:54'),
(55, 1.00, 0.00, 'inde', 'RAS', 55, '2024-03-14 10:23:41', '2024-03-14 10:23:41'),
(56, 25.00, 0.00, 'Inde', 'Second lot', 11, '2024-03-14 10:26:24', '2024-03-14 10:26:24'),
(57, 40.00, 0.00, 'inde', 'RAS', 7, '2024-03-14 10:37:01', '2024-03-14 10:37:01'),
(58, 8.00, 0.00, 'inde', 'RAS', 62, '2024-03-14 10:39:10', '2024-03-14 10:39:10'),
(59, 1.00, 0.00, 'inde', 'RAS', 63, '2024-03-14 11:13:28', '2024-03-14 11:13:28'),
(60, 4.00, 0.00, 'Inde', 'Ras', 83, '2024-03-14 11:17:02', '2024-03-14 11:17:02'),
(61, 4.00, 0.00, 'inde', 'second lot', 11, '2024-03-14 11:17:49', '2024-03-14 11:17:49'),
(62, 4.00, 0.00, 'inde', 'second lot', 84, '2024-03-14 11:18:49', '2024-03-14 11:18:49'),
(63, 3.00, 0.00, 'Inde', 'RAS', 89, '2024-03-14 11:19:35', '2024-03-14 11:19:35'),
(64, 1.00, 0.00, 'Inde', 'Second lot', 13, '2024-03-14 11:20:55', '2024-03-14 11:20:55'),
(65, 1.00, 0.00, 'Inde', 'RAS', 87, '2024-03-14 11:21:51', '2024-03-14 11:21:51'),
(66, 8.00, 0.00, 'Inde', 'Second lot', 11, '2024-03-14 11:23:03', '2024-03-14 11:23:03'),
(67, 1.00, 0.00, 'Inde', 'RAS', 88, '2024-03-14 11:23:56', '2024-03-14 11:23:56'),
(68, 20.00, 0.00, 'Inde', 'Second lot', 7, '2024-03-14 11:24:56', '2024-03-14 11:24:56'),
(69, 4.00, 0.00, 'Inde', 'RAS', 91, '2024-03-14 11:26:39', '2024-03-14 11:26:39'),
(70, 1.00, 0.00, 'inde', 'ras', 55, '2024-03-15 13:02:57', '2024-03-15 13:02:57'),
(71, 1.00, 0.00, 'inde', NULL, 20, '2024-03-15 13:04:41', '2024-03-15 13:04:41'),
(72, 416.00, 3.85, 'Africa commodity traders ( ACT)', 'Les futs ont etaient commandé par Anil Kumar pour le compte du garage en date du 15/03/2024', 92, '2024-03-18 08:16:20', '2024-03-18 08:16:20');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_22_221522_create_vehicules_table', 1),
(6, '2023_10_10_093401_create_emplacements_table', 1),
(7, '2023_10_10_104254_create_categories_table', 1),
(8, '2023_10_10_114519_create_pieces_table', 1),
(9, '2023_10_11_195048_create_entrees_table', 1),
(10, '2023_10_12_101115_create_sorties_table', 1),
(11, '2024_03_12_020330_add_role_to_users_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pieces`
--

CREATE TABLE `pieces` (
  `id` bigint UNSIGNED NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `solde` int NOT NULL DEFAULT '0',
  `emplacement_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pieces`
--

INSERT INTO `pieces` (`id`, `designation`, `numero`, `solde`, `emplacement_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Assy rear view mirror', '257681100152', 4, 1, 1, '2024-03-12 10:25:55', '2024-03-29 11:03:10'),
(2, 'Air filter element', '257609139908', 10, 1, 1, '2024-03-12 10:27:11', '2024-03-13 10:02:26'),
(3, 'Air filter element safety', '278609139909', 10, 1, 1, '2024-03-12 10:28:29', '2024-03-13 10:02:51'),
(4, 'Assy starter motor', '278615990118', 4, 1, 1, '2024-03-12 10:30:18', '2024-03-13 10:23:56'),
(5, 'Clutch release Bearing', '886325000001', 8, 1, 1, '2024-03-12 10:31:47', '2024-03-13 10:21:10'),
(6, 'Assy Alternator', '278615990113', 4, 1, 1, '2024-03-12 10:36:25', '2024-03-13 10:23:19'),
(7, 'Set of 3 filter', '885418032516', 78, 1, 1, '2024-03-12 10:37:26', '2024-03-29 11:14:32'),
(8, 'Assy Clutch Disc', '275225200106', 8, 1, 1, '2024-03-12 10:38:36', '2024-03-13 10:25:14'),
(9, 'Kit Center Bearing', '280941100111', 9, 1, 1, '2024-03-12 10:39:28', '2024-03-13 10:28:11'),
(10, 'Assy Turbocharger', '278614999958', 2, 1, 1, '2024-03-12 10:40:30', '2024-03-13 10:29:37'),
(11, 'Kit Brake lining', '885442011618', 41, 1, 1, '2024-03-12 10:41:40', '2024-03-14 11:23:03'),
(12, 'Assy water pump', '278620999959', 4, 1, 1, '2024-03-12 10:42:49', '2024-03-13 11:48:57'),
(13, 'Assy UJ Cross', '217141000107', 8, 1, 1, '2024-03-12 10:43:50', '2024-03-14 11:20:55'),
(14, 'Assy Ball joint', '264126800225', 20, 1, 1, '2024-03-12 10:45:33', '2024-03-14 05:46:00'),
(15, 'T.R. BRG', '257633403103', 8, 1, 1, '2024-03-12 10:46:20', '2024-03-13 10:27:14'),
(16, 'Gasket / Echappement', '278614999915', 36, 1, 1, '2024-03-12 10:47:34', '2024-03-14 05:54:34'),
(17, 'Assy accelerator cable', '280930100113', 8, 1, 1, '2024-03-12 10:50:48', '2024-03-13 11:50:56'),
(18, 'Flywheel', '278603990196', 4, 1, 1, '2024-03-12 10:52:57', '2024-03-14 06:04:31'),
(19, 'Assy Clutch cover', '27522540105', 8, 1, 1, '2024-03-12 10:55:12', '2024-03-14 06:05:44'),
(20, 'Fuel filter', '9451037406', 38, 2, 1, '2024-03-12 10:57:06', '2024-03-29 11:00:17'),
(21, 'Oil filter element', '252518130139', 17, 2, 1, '2024-03-12 10:58:14', '2024-03-29 10:57:54'),
(22, 'Assy push road', '264129300104', 2, 2, 1, '2024-03-12 10:59:23', '2024-03-12 10:59:23'),
(23, 'Assy tie road', '264133200121', 2, 2, 1, '2024-03-12 11:00:17', '2024-03-14 08:53:12'),
(24, 'Bolt', '257641113201', 50, 2, 1, '2024-03-12 11:08:37', '2024-03-12 11:08:37'),
(25, 'Assy Auxillary Tank', '252550110271', 3, 2, 1, '2024-03-12 11:09:33', '2024-03-12 11:09:33'),
(26, 'Assy clutch pressure plate', '257425400104', 1, 2, 1, '2024-03-12 11:11:00', '2024-03-29 11:37:28'),
(28, 'Assy clutch disc.', '257425200165', 1, 2, 1, '2024-03-12 11:16:31', '2024-03-29 11:29:46'),
(29, 'Assy  strg pump', '252723110103', 1, 2, 1, '2024-03-12 11:19:18', '2024-03-29 09:49:53'),
(30, 'Assy clutch M/Cylinder', '264129100117', 5, 2, 1, '2024-03-12 11:20:56', '2024-03-12 12:46:52'),
(31, 'Assy clutch realese.', '272425600160', 2, 2, 1, '2024-03-12 11:26:07', '2024-03-12 11:26:07'),
(32, 'Assy Ball joint.', '264126800224', 6, 2, 1, '2024-03-12 11:29:16', '2024-03-12 11:29:16'),
(33, 'V Belt', '252723406304', 6, 2, 1, '2024-03-12 11:30:27', '2024-03-12 11:30:27'),
(34, 'King pin kit', '885433190709', 1, 2, 1, '2024-03-12 11:31:29', '2024-03-29 09:41:10'),
(36, 'Assy water pump.', '252720100104', 2, 2, 1, '2024-03-12 11:46:44', '2024-03-12 11:46:44'),
(37, 'Gasket', '253420105301', 6, 3, 1, '2024-03-12 12:01:26', '2024-03-13 09:54:16'),
(40, 'Assy. clutch disc.', '264125200134', 2, 3, 1, '2024-03-12 12:05:03', '2024-03-12 12:05:03'),
(41, 'Assy clutch rel. brg', '581225601602', 2, 3, 1, '2024-03-12 12:07:01', '2024-03-12 12:07:01'),
(42, 'Assy Alternator', '264015400107', 3, 3, 1, '2024-03-12 12:13:13', '2024-03-29 09:31:25'),
(43, 'Kit centre bearing', '264141300105', 9, 3, 1, '2024-03-12 12:16:34', '2024-03-14 10:18:54'),
(44, 'Assy vaccum booster', '270542010105', 1, 3, 1, '2024-03-12 12:18:02', '2024-03-12 12:18:02'),
(45, 'Assy starter motor', '265115100130', 6, 3, 1, '2024-03-12 12:19:14', '2024-03-12 13:03:34'),
(46, 'Kit Brake lining', '2752242990101', 8, 3, 1, '2024-03-12 12:20:28', '2024-03-12 12:20:28'),
(47, 'Oil filter', '253418130174', 2, 3, 1, '2024-03-12 12:21:41', '2024-03-12 12:21:41'),
(48, 'Assy Strg pump', '264146800144', 4, 3, 1, '2024-03-12 12:37:30', '2024-03-14 08:09:15'),
(49, 'Assy Tail lamp LH', '264154409904', 2, 3, 1, '2024-03-12 12:40:22', '2024-03-12 12:40:22'),
(50, 'Assy clutch M/Cylinder', '2641289100117', 2, 3, 1, '2024-03-12 12:50:02', '2024-03-12 12:50:02'),
(51, 'Assy Filter', 'F002H20306', 2, 3, 1, '2024-03-12 12:52:04', '2024-03-12 12:52:04'),
(52, 'V Belt', '253423401602', 2, 3, 1, '2024-03-12 12:53:00', '2024-03-12 12:53:00'),
(53, 'Assy accelerator cable', '264330100131', 1, 3, 1, '2024-03-12 12:53:37', '2024-03-12 12:53:37'),
(54, 'Assy primary filter', '253409140132', 12, 3, 1, '2024-03-12 13:05:29', '2024-03-14 10:12:11'),
(55, 'Assy filter element', '253409140133', 8, 3, 1, '2024-03-12 13:10:11', '2024-03-15 13:02:57'),
(56, 'Assy clutch M/Cylinder', '265129100118', 2, 3, 1, '2024-03-12 13:11:33', '2024-03-12 13:11:33'),
(57, 'Assy clutch M/', '265129100167', 6, 3, 1, '2024-03-13 09:47:41', '2024-03-14 10:17:02'),
(58, 'V Belt', '253420156327', 21, 3, 1, '2024-03-13 09:51:46', '2024-03-13 09:51:46'),
(59, 'Assy vaccum booster', '265143500120', 1, 3, 1, '2024-03-13 09:55:20', '2024-03-13 09:55:20'),
(60, 'Assy clutch cover sfc', '265125400113', 4, 3, 1, '2024-03-13 09:56:19', '2024-03-13 09:57:12'),
(61, 'Assy water pump. sfc', '253420100150', 0, 3, 1, '2024-03-13 09:59:40', '2024-03-29 11:10:12'),
(62, 'Assy strainer', '278609999920', 39, 1, 1, '2024-03-13 10:09:42', '2024-03-29 10:34:46'),
(63, 'Speed sensor', '278054209938', 5, 1, 1, '2024-03-13 10:11:21', '2024-03-14 11:13:28'),
(64, 'Assy cl. M/Cylinder', '206729100121', 6, 1, 1, '2024-03-13 10:33:46', '2024-03-13 10:33:46'),
(65, 'V Belt', '278620999962', 6, 1, 1, '2024-03-14 05:56:27', '2024-03-14 05:56:27'),
(66, 'Fip soleniod', 'F002D11413', 5, 1, 1, '2024-03-14 05:57:47', '2024-03-14 05:57:47'),
(67, 'Valve cover gasket', '278605999928', 5, 1, 1, '2024-03-14 06:01:58', '2024-03-14 06:01:58'),
(68, 'Hose', '278614999934', 9, 1, 1, '2024-03-14 06:03:11', '2024-03-14 06:03:11'),
(69, 'Assy Tail lamp LH', '2641654409904', 1, 3, 1, '2024-03-14 08:03:31', '2024-03-29 09:45:22'),
(70, 'Assy. clutch disc.', '265125200136', 2, 3, 1, '2024-03-14 08:04:47', '2024-03-14 08:04:47'),
(71, 'Assy combi switch', '265454510120', 3, 3, 1, '2024-03-14 08:05:59', '2024-03-29 10:21:56'),
(72, 'Assy pull cable', '265130100147', 5, 3, 1, '2024-03-14 08:06:56', '2024-03-14 08:06:56'),
(73, 'Assy Duel Br. valve', '264143700147', 3, 3, 1, '2024-03-14 08:11:13', '2024-03-14 08:27:47'),
(74, 'Kit centre bearing', '265141100146', 4, 3, 1, '2024-03-14 08:14:16', '2024-03-14 08:14:16'),
(75, 'Assy Head light RH', '264154400181', 7, 2, 1, '2024-03-14 08:34:52', '2024-03-14 09:03:54'),
(76, 'Hand brake valve', '263243700188', 2, 2, 1, '2024-03-14 08:38:51', '2024-03-14 08:42:55'),
(77, 'Assy clynder head', '252513100126', 3, 2, 1, '2024-03-14 08:44:04', '2024-03-14 08:44:04'),
(78, 'Assy starter motor', '257415100117', 2, 2, 1, '2024-03-14 08:50:06', '2024-03-14 08:50:06'),
(79, 'Assy Drag link', '264146600159', 2, 2, 1, '2024-03-14 08:55:31', '2024-03-14 08:55:31'),
(80, 'Hex Nut', '12051901001', 50, 2, 1, '2024-03-14 08:58:44', '2024-03-14 08:58:44'),
(81, 'Assy pressure plate', '264025400102', 2, 3, 1, '2024-03-14 09:07:39', '2024-03-14 09:07:39'),
(82, 'Assy vaccum booster', '270542010101', 1, 3, 1, '2024-03-14 10:21:10', '2024-03-14 10:21:10'),
(83, 'Drying & Dist. Unit', '264343700124', 8, 1, 1, '2024-03-14 10:27:50', '2024-03-14 11:17:02'),
(84, 'Assy combi switch', '288454500101', 8, 1, 1, '2024-03-14 10:29:00', '2024-03-14 11:18:48'),
(85, 'Kit DDU Rep. MJR', '885446202516', 5, 1, 1, '2024-03-14 10:30:13', '2024-03-14 10:30:13'),
(86, 'Fip solenoid switch', 'F002D113894', 5, 1, 1, '2024-03-14 10:31:39', '2024-03-14 10:31:39'),
(87, 'Assy Drag link', '280946600102', 4, 1, 1, '2024-03-14 10:32:22', '2024-03-14 11:21:50'),
(88, 'Kit brake spring', '257342100149', 7, 1, 1, '2024-03-14 10:33:47', '2024-03-14 11:23:56'),
(89, 'Tie rod end RH', '280933800103', 6, 1, 1, '2024-03-14 10:34:28', '2024-03-14 11:19:35'),
(90, 'Tie rod end LH', '280933800104', 4, 1, 1, '2024-03-14 10:35:09', '2024-03-14 10:35:09'),
(91, 'Assy Tail lamp RH', '280954440102', 8, 1, 1, '2024-03-14 11:14:57', '2024-03-14 11:26:39'),
(92, 'ENGIN OIL', '15 W 40 CI4', 400, 7, 6, '2024-03-16 08:44:03', '2024-03-18 08:20:51'),
(93, 'ENGIN OIL', '20 W 50', 0, 7, 6, '2024-03-16 08:44:35', '2024-03-16 08:44:35'),
(94, 'GEAR OIL', '80 W 90', 0, 7, 6, '2024-03-16 08:46:04', '2024-03-16 08:46:04'),
(95, 'AXLE OIL', '85 W 140', 0, 7, 6, '2024-03-16 08:46:40', '2024-03-16 08:46:40'),
(96, 'Brake oil', 'DOT 4', 0, 7, 6, '2024-03-16 08:48:12', '2024-03-16 08:48:12'),
(97, 'Hydraulic oil', '68', 0, 7, 6, '2024-03-16 08:49:37', '2024-03-16 08:49:37'),
(98, 'Hydraulics red', 'Hydraulics red', 0, 7, 5, '2024-03-16 08:50:37', '2024-03-16 08:50:37');

-- --------------------------------------------------------

--
-- Structure de la table `sorties`
--

CREATE TABLE `sorties` (
  `id` bigint UNSIGNED NOT NULL,
  `motif` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantite` decimal(8,2) NOT NULL,
  `personne` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `piece_id` bigint UNSIGNED NOT NULL,
  `vehicule_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sorties`
--

INSERT INTO `sorties` (`id`, `motif`, `quantite`, `personne`, `observation`, `piece_id`, `vehicule_id`, `created_at`, `updated_at`) VALUES
(1, 'Entretien moteur', 16.00, 'Brayant Kazadi et Gaby', 'Entretien a été fait le 16/03/2024', 92, 13, '2024-03-18 08:20:51', '2024-03-18 08:20:51'),
(2, 'Old alternator damaged ( Send to likasi By Anil Kumar)', 1.00, 'Anil Kumar', 'Pieces sortie en date du 30/12/2024 du stock venus de l\'inde.', 42, 28, '2024-03-29 09:31:25', '2024-03-29 09:31:25'),
(3, 'Old one distroy', 1.00, 'Hermes', 'Pieces destocker dans le lot venu de l\'inde en date du 24/01/2024', 1, 42, '2024-03-29 09:37:16', '2024-03-29 09:37:16'),
(5, 'Changement de la pieces', 1.00, 'Anil Kumar', 'Sortie dans le lot venu de l\'inde en date du 11/01/2024', 34, 33, '2024-03-29 09:39:47', '2024-03-29 09:39:47'),
(6, 'Changement de la piece', 1.00, 'Anil Kumar/ John Pinoti', 'Lot venu de l\'inde en date du 10/01/2024', 69, 29, '2024-03-29 09:45:22', '2024-03-29 09:45:22'),
(7, 'Changement de l\'ancien qui est defecteueux', 1.00, 'Anil kumar/ Bangabanga', 'Lot venu de l\'inde, piece sortie en date du 12/01/2024', 29, 33, '2024-03-29 09:49:54', '2024-03-29 09:49:54'),
(8, 'Old damaged', 2.00, 'Julva/ Kazadi Brayan', 'Sortie en date du 18/01/2024 ( Lot venu de l\'inde) RH - LH', 1, 37, '2024-03-29 09:55:43', '2024-03-29 09:55:43'),
(9, 'Entretien moteur', 1.00, 'John / Robert', 'Sortie en date du 25/01/2024 ( lot de l\'inde)', 21, 37, '2024-03-29 10:15:41', '2024-03-29 10:15:41'),
(10, 'Damaged', 1.00, 'Autoriser par Anil est executer par John et Robert', 'En date du 25/01/2024 ( Stock venu de l\'inde )', 71, 37, '2024-03-29 10:21:56', '2024-03-29 10:23:35'),
(11, 'Entretien moteur du vehicule', 1.00, 'Autoriser par Julva est executer par  Robert', 'Sortie en date 29/01/2024 stock de l\'inde', 7, 11, '2024-03-29 10:32:15', '2024-03-29 10:32:15'),
(12, 'Entretien moteur', 1.00, 'Autorisé par M julva et executer par Robert', 'Sortie en date du 29/01/2024 au stock de l\'inde', 62, 11, '2024-03-29 10:34:58', '2024-03-29 10:36:48'),
(13, 'Entretien moteur', 1.00, 'Autorisé par M julva et executer par Robert/ Papy', 'En date du 07/02/2024', 21, 24, '2024-03-29 10:42:13', '2024-03-29 10:42:13'),
(14, 'Changement de la piece defectueuse', 1.00, 'Autorisé par M julva et executer par Kazadi Zadio', 'Sortie en date du 09/02/2024 stock de l\'inde', 61, 40, '2024-03-29 10:55:21', '2024-03-29 10:55:21'),
(15, 'Entretien moteur', 1.00, 'Autorisé par M julva et executer par Kazadi Zadio', 'Sortie en date du 12/02/2024 stock de l\'inde', 21, 31, '2024-03-29 10:57:54', '2024-03-29 10:57:54'),
(16, 'Entretien moteur', 2.00, 'Autorisé par M julva et executer par Kazadi Zadio', 'Sortie en date du 12/02/2024 stock de l\'inde', 20, 31, '2024-03-29 10:58:30', '2024-03-29 11:00:17'),
(17, 'Damaged', 1.00, 'Autorisé par M julva et executer par Robert', 'Sortie en date du 19/02/2024 stock de l\'inde', 1, 27, '2024-03-29 11:03:10', '2024-03-29 11:03:43'),
(18, 'Dammaged', 1.00, 'Autorisé par M julva et executer par Robert', 'Sortie en date du 23/02/2024', 61, 39, '2024-03-29 11:07:52', '2024-03-29 11:07:52'),
(19, 'Dammaged', 1.00, 'Autorisé par M julva et executer par Robert', 'Sortie en date du 23/02/2024', 61, 39, '2024-03-29 11:07:52', '2024-03-29 11:07:52'),
(20, 'Damaged', 1.00, 'Autorisé par M julva et executer par Robert', 'Sortie en date du 27/02/2024 stock inde', 61, 38, '2024-03-29 11:10:13', '2024-03-29 11:10:13'),
(21, 'Entretien moteur', 1.00, 'Autorisé par M julva et executer par Gustave', 'Sortie en date du 07/03/2024 stock inde.', 7, 12, '2024-03-29 11:14:32', '2024-03-29 11:14:32'),
(22, 'Damaged', 1.00, 'Autorisé par M Anil Kumar et executer par Kazadi Zadio/Gustave', 'Sortie en date du 12/03/2024 stock de l\'inde', 28, 33, '2024-03-29 11:29:46', '2024-03-29 11:29:46'),
(23, 'Damaged', 1.00, 'Autorisé par M Anil et executer par Kazadi Zadio/Gustave.', 'Sortie en date 12/03/2024 stock de l\'inde', 26, 33, '2024-03-29 11:37:28', '2024-03-29 11:37:28');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'JULVA', 'admin@gmail.com', NULL, '$2y$10$FFkoho0YgKstX7f7guiww.EEqnImskcsqUxauNR.tC.1KTKxe9ZY2', NULL, '2024-03-12 06:57:41', '2024-03-12 06:57:41', 'admin'),
(2, 'ANIL', 'anil@gmail.com', NULL, '$2y$10$7imSuLXpHvjAPMV5GHt0Ce.q/3kdER2CG4THtETKr687OqHhWrvXq', NULL, '2024-03-12 07:06:22', '2024-03-12 07:06:59', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` bigint UNSIGNED NOT NULL,
  `plaque` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `marque` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personne` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id`, `plaque`, `marque`, `personne`, `created_at`, `updated_at`) VALUES
(1, '9999 AC 22', 'MERCEDES BENZ', 'Jack Muka', '2024-03-12 13:31:59', '2024-03-12 13:31:59'),
(2, '2268 AP 05', 'Pajero', 'Jack Muka', '2024-03-14 06:21:43', '2024-03-14 06:21:43'),
(3, '0589 AT 05', 'TOYOTA RAV4', 'ALAIN MULAJ', '2024-03-14 06:22:30', '2024-03-14 06:22:30'),
(4, '4245 AQ 05', 'MAHINDRA', 'JOHN LOMBA', '2024-03-14 06:23:03', '2024-03-14 06:23:03'),
(5, '0665 AS 05', 'TOYOTA VANGUARD', 'YANNICK BOKANGO', '2024-03-14 06:23:53', '2024-03-14 06:23:53'),
(6, '7525 AT 05', 'TOYOTA HILUX', 'GLOIRE MALELA', '2024-03-14 06:24:26', '2024-03-14 06:24:26'),
(7, '5421 AA 04', 'TOYOTA HILUX', 'SURESH', '2024-03-14 06:24:58', '2024-03-14 06:24:58'),
(8, '6203 AS 05', 'TOYOTA HILUX', 'LEBON BADIBANGA', '2024-03-14 06:25:33', '2024-03-14 06:25:33'),
(9, '0166 AN 05', 'TATA 1618', 'FRANCOIS TSHIM', '2024-03-14 06:26:11', '2024-03-14 06:26:11'),
(10, '1181 AR 05', 'TATA 1618', 'FRANCK MUSALA', '2024-03-14 06:27:00', '2024-03-14 06:27:00'),
(11, '2800 AA 24', 'TATA 1618', 'NIXON KALUNGA', '2024-03-14 06:28:33', '2024-03-14 06:28:33'),
(12, '5885 AA 24', 'TATA 1618', 'JOHN SULU', '2024-03-14 06:29:02', '2024-03-14 06:29:02'),
(13, '1476 AB 04', 'TATA 2523', 'DELVAUX MULONGO', '2024-03-14 06:29:28', '2024-03-14 06:29:28'),
(14, '7382 AA 14', 'TATA 2523', 'JAPHET BAMPALA', '2024-03-14 06:30:04', '2024-03-14 06:30:04'),
(15, '8443 AP 05', 'TATA PRIMA 4038', 'BESA KAUNDA', '2024-03-14 06:30:39', '2024-03-14 06:30:39'),
(16, '7559 AA 04', 'TATA PRIMA', 'ANDOUNI', '2024-03-14 06:31:13', '2024-03-14 06:31:13'),
(17, '7560 AA 04', 'TATA PRIMA', 'MUHINDO KATIMIKA', '2024-03-14 06:32:49', '2024-03-14 06:32:49'),
(18, '2964 AB 04', 'TATA PRIMA', 'ANDRE KYUNGU', '2024-03-14 06:33:49', '2024-03-14 06:33:49'),
(19, '2965 AB 04', 'TRAILLER', 'ANDRE KYUNGU', '2024-03-14 06:36:16', '2024-03-14 06:36:16'),
(20, '5888 AA 24', 'TATA 1116', 'SABE MWILA', '2024-03-14 06:36:54', '2024-03-14 06:36:54'),
(21, '5887 AA 24', 'TATA 1116', 'LUCIEN KATOTA', '2024-03-14 06:37:45', '2024-03-14 06:37:45'),
(22, '5886 AA 24 - LIKASI', 'TATA 1116', 'OLAF TSHILUK', '2024-03-14 06:38:26', '2024-03-14 06:38:26'),
(23, '5905 AA - KOLWEZI', 'TATA 1116', 'SALOMON', '2024-03-14 06:39:10', '2024-03-14 06:39:10'),
(24, '5544 AA 24', 'TATA 1116', 'PATRICK MUKADI', '2024-03-14 06:39:43', '2024-03-14 06:39:43'),
(25, '5543 AA 24 - KOLWEZI', 'TATA 1116', 'HADDY', '2024-03-14 06:40:17', '2024-03-14 06:40:17'),
(26, '3230 AT 05', 'TATA 1116', 'MEMY KIMENYA', '2024-03-14 06:41:36', '2024-03-14 06:41:36'),
(27, '3149 AT 05', 'TATA 1116', 'EPHRAIM MUTONJI', '2024-03-14 06:42:07', '2024-03-14 06:42:07'),
(28, '7449 AP 05', 'TATA 613', 'TSHETSHE MBALA', '2024-03-14 06:43:03', '2024-03-14 06:43:03'),
(29, '7450 AP 05', 'TATA 613', 'PATIENT MONGA', '2024-03-14 06:43:28', '2024-03-14 06:43:28'),
(30, '0888 AT 05 - LIKASI', 'TATA 613', 'GUY', '2024-03-14 06:45:20', '2024-03-14 06:45:20'),
(31, '1331 AV 05', 'TATA 613', 'ISSAC DIEMO', '2024-03-14 06:46:53', '2024-03-14 06:46:53'),
(32, '1332 AV 05-LIKASI', 'TATA 613', 'JUNIOR SIMWERAGI', '2024-03-14 06:49:16', '2024-03-14 06:49:16'),
(33, '7492 AA 14', 'TATA 613', 'DJO MUTEJ', '2024-03-14 06:50:51', '2024-03-14 06:50:51'),
(34, '4785 AN 05- KOLWEZI', 'TATA 613', 'SALOMON', '2024-03-14 06:51:46', '2024-03-14 06:51:46'),
(35, '1184 AR 05 - LIKASI', 'TATA 613', 'PATRICK BARWANI', '2024-03-14 06:52:37', '2024-03-14 06:52:37'),
(36, '1182 AR 05', 'TATA 407 LPT', 'PATRICK MUJIK', '2024-03-14 06:53:05', '2024-03-14 06:53:05'),
(37, '1183 AR 05 - KOLWEZI', 'TATA 407 LPT', 'KLZ', '2024-03-14 06:53:45', '2024-03-14 06:53:45'),
(38, '5879 AA 04', 'TATA 407 SFC', 'PRINCE MULAMBA', '2024-03-14 06:54:31', '2024-03-14 06:54:31'),
(39, '5842 AA 04', 'TATA 407 SFC', 'ARNOLD KANGANI', '2024-03-14 06:54:55', '2024-03-14 06:54:55'),
(40, '8350 AT 05', 'TATA 407 SFC', 'CHRISTOPHE KASONGO', '2024-03-14 06:56:00', '2024-03-14 06:56:00'),
(41, '8353 AT 05', 'TATA 407 SFC', 'FREDDY KABAMBA', '2024-03-14 06:56:26', '2024-03-14 06:56:26'),
(42, '8359 AT 05', 'TATA 407 SFC', 'KEN MANDE', '2024-03-14 06:58:00', '2024-03-14 06:58:00'),
(43, '9400 AP 05', 'TATA 207', 'JOB KABAMBA', '2024-03-14 07:00:21', '2024-03-14 07:00:21'),
(44, '9396 AP 05', 'TATA 207', 'JEAN-CLAUDE KAYUMBA', '2024-03-14 07:01:13', '2024-03-14 07:01:13'),
(45, '1116 AB 05 - KOLWEZI', 'TATA 207', 'KLZ', '2024-03-14 07:02:32', '2024-03-14 07:02:32'),
(46, '1043 AB 04', 'TOYOTA HIACE', 'JUNIOR KATEMBWE', '2024-03-14 07:03:51', '2024-03-14 07:03:51'),
(47, '5022 AT 05', 'TOYOTA HIACE', 'ETIENNE KALUMBWA', '2024-03-14 07:04:35', '2024-03-14 07:04:35'),
(48, '2475 AR 05- KASUMBALESA', 'TOYOTA HIACE', 'JEAN DE DIEU', '2024-03-14 07:05:19', '2024-03-14 07:05:19'),
(49, '2476 AR 05- MOKAMBO', 'TOYOTA', 'GAGA NGALAMULUME', '2024-03-14 07:06:03', '2024-03-14 07:06:03'),
(50, '4749 AB 04', 'TOYOTA HIACE', 'FLORY ILUNGA', '2024-03-14 07:06:46', '2024-03-14 08:01:32'),
(51, '4746 AB 04-KOLWEZI', 'TOYOTA HIACE', 'ALVIN', '2024-03-14 07:07:29', '2024-03-14 07:07:29'),
(53, '6224 AV 05 - COS', 'TOYOTA HIACE', 'ISMAEL MWALUKA', '2024-03-14 07:08:44', '2024-03-14 07:08:44'),
(54, '6114 AV 05', 'TOYOTA HIACE', 'L\"shi', '2024-03-14 07:10:58', '2024-03-14 07:10:58'),
(55, '6063 AT 05 - LIKASI', 'TOYOTA HIACE', 'SAFARI', '2024-03-14 07:12:31', '2024-03-14 07:12:31'),
(56, '8487 AR 05', 'TOYOTA NOAH', 'PAUL NAWEJ', '2024-03-14 07:13:24', '2024-03-14 07:13:24'),
(57, '4209 AT 05- LIKASI', 'TOYOTA NOAH', 'Ref Manoah', '2024-03-14 07:18:16', '2024-03-14 07:18:16'),
(58, '6059 AT 05 - LIKASI', 'TOYOTA RUSH', 'GRACE', '2024-03-14 07:21:14', '2024-03-14 07:21:14'),
(59, '6628 AS 05', 'TATA 916', 'ROMEO NGOYI', '2024-03-14 07:22:21', '2024-03-14 07:22:21'),
(60, '2100 AT 05', 'TATA 1318', 'GRACIA MUYUMBA', '2024-03-14 07:23:57', '2024-03-14 07:23:57'),
(61, '5860 AG 19', 'HOWO 336', 'JUNIOR LUKUSA', '2024-03-14 07:24:29', '2024-03-14 07:24:29'),
(62, '4549 AG 19', 'HOWO 336', 'JOCOB KAYEMBE', '2024-03-14 07:25:18', '2024-03-14 07:25:18'),
(63, '3521 AB 04- KOLWEZI', 'DAEWOO', 'KALALA', '2024-03-14 07:26:20', '2024-03-14 07:26:20'),
(64, '9565 AE 19 - KOLWEZI', 'MAN', 'HARDY', '2024-03-14 07:27:12', '2024-03-14 07:27:12'),
(65, '9398 AP 05-LIKASI', 'TATA 207', 'FABRICE', '2024-03-14 07:27:41', '2024-03-14 07:27:41'),
(66, '3055 AB 04', 'TOYOTA RAV4 NEW', 'VISHAL', '2024-03-14 07:28:36', '2024-03-14 07:28:36'),
(67, '1259 AR 05', 'TOYOTA NOAH', 'STEVEN', '2024-03-14 07:29:27', '2024-03-14 07:29:27');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_nom_unique` (`nom`);

--
-- Index pour la table `emplacements`
--
ALTER TABLE `emplacements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emplacements_nom_unique` (`nom`);

--
-- Index pour la table `entrees`
--
ALTER TABLE `entrees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entrees_piece_id_foreign` (`piece_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `pieces`
--
ALTER TABLE `pieces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pieces_emplacement_id_foreign` (`emplacement_id`),
  ADD KEY `pieces_category_id_foreign` (`category_id`);

--
-- Index pour la table `sorties`
--
ALTER TABLE `sorties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sorties_piece_id_foreign` (`piece_id`),
  ADD KEY `sorties_vehicule_id_foreign` (`vehicule_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `emplacements`
--
ALTER TABLE `emplacements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `entrees`
--
ALTER TABLE `entrees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pieces`
--
ALTER TABLE `pieces`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT pour la table `sorties`
--
ALTER TABLE `sorties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `entrees`
--
ALTER TABLE `entrees`
  ADD CONSTRAINT `entrees_piece_id_foreign` FOREIGN KEY (`piece_id`) REFERENCES `pieces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pieces`
--
ALTER TABLE `pieces`
  ADD CONSTRAINT `pieces_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pieces_emplacement_id_foreign` FOREIGN KEY (`emplacement_id`) REFERENCES `emplacements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sorties`
--
ALTER TABLE `sorties`
  ADD CONSTRAINT `sorties_piece_id_foreign` FOREIGN KEY (`piece_id`) REFERENCES `pieces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sorties_vehicule_id_foreign` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
