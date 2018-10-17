-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2018 at 07:58 PM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ewsf`
--

-- --------------------------------------------------------

--
-- Table structure for table `arduinos`
--

DROP TABLE IF EXISTS `arduinos`;
CREATE TABLE IF NOT EXISTS `arduinos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `arduino_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `arduino_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mean` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `arduinos`
--

INSERT INTO `arduinos` (`id`, `arduino_1`, `arduino_2`, `mean`, `created_at`, `updated_at`) VALUES
(1, '1000', '500', '55', '2018-07-24 21:00:00', NULL),
(2, '1050', '20', '60', '2018-07-24 21:00:00', NULL),
(3, '100', '30', '65', '2018-07-24 21:00:00', NULL),
(4, '100', '40', '70', '2018-07-24 21:00:00', NULL),
(5, '100', '50', '75', '2018-07-24 21:00:00', NULL),
(6, '100', '60', '80', '2018-07-24 21:00:00', NULL),
(7, '100', '70', '85', '2018-07-28 21:00:00', NULL),
(41, '1000', '300', '650', '2018-07-28 21:00:00', NULL),
(40, '1000', '50', '525', '2018-07-29 02:17:21', NULL),
(39, '100', '200', '150', '2018-07-29 07:14:42', NULL),
(38, '100', '50', '75', '2018-07-29 13:15:44', NULL),
(37, '100', '100', '100', '2018-07-29 05:21:00', NULL),
(36, '100', '50', '75', '2018-07-29 19:00:25', NULL),
(35, '100', '1000', '550', '2018-07-29 13:23:38', NULL),
(34, '100', '50', '75', '2018-07-29 18:00:00', NULL),
(33, '100', '50', '75', '2018-07-28 21:52:00', NULL),
(32, '100', '50', '75', '2018-07-29 01:27:00', NULL),
(31, '100', '50', '75', '2018-07-29 02:27:51', NULL),
(30, '100', '50', '75', '2018-07-29 15:27:10', NULL),
(29, '100', '50', '75', '2018-07-29 06:37:10', NULL),
(28, '1000', '500', '750', '2018-07-29 08:41:00', NULL),
(27, '1000', '100', '550', '2018-07-29 07:46:47', NULL),
(26, '1500', '90', '545', '2018-07-29 14:24:13', NULL),
(25, '1000', '80', '540', '2018-07-29 04:00:00', NULL),
(42, '100', '500', '300', '2018-07-29 01:29:47', NULL),
(43, '100', '50', '75', '2018-07-29 01:24:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auditings`
--

DROP TABLE IF EXISTS `auditings`;
CREATE TABLE IF NOT EXISTS `auditings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auditings`
--

INSERT INTO `auditings` (`id`, `user_email`, `user_name`, `type`, `action`, `created_at`, `updated_at`) VALUES
(1, 'aymenalhattam15@gmail.com', 'aymen_mohammed', 'Generate Report', 'devices data reports', NULL, NULL),
(2, 'aymenalhattam15@gmail.com', 'aymen_mohammed', 'Generate Report', 'devices data reports', '2018-08-04 08:48:32', '2018-08-04 08:48:32'),
(3, 'aymenalhattam15@gmail.com', 'aymen_mohammed', 'Generate Report', 'devices data reports', '2018-08-04 08:48:36', '2018-08-04 08:48:36'),
(4, 'aymenalhattam15@gmail.com', 'aymen_mohammed', 'Generate Report', 'devices data reports', '2018-08-04 08:48:44', '2018-08-04 08:48:44'),
(5, 'aymenalhattam15@gmail.com', 'aymen_mohammed', 'Generate Report', 'weather data reports', '2018-08-04 08:51:40', '2018-08-04 08:51:40'),
(6, 'aymenalhattam15@gmail.com', 'aymen_mohammed', 'Edit User', '25 has been updated', '2018-08-04 08:56:43', '2018-08-04 08:56:43'),
(7, 'mouth@gmail.com', 'mouth', 'Delete User', '18 has been Deleted', '2018-08-04 09:01:34', '2018-08-04 10:34:16'),
(8, 'aymenalhattam15@gmail.com', 'aymen_mohammed', 'Generate Report', 'devices data reports', '2018-08-04 09:57:55', '2018-08-04 09:57:55'),
(9, 'aymenalhattam15@gmail.com', 'aymen_mohammed', 'Generate Report', 'auditing data reports', '2018-08-04 13:06:11', '2018-08-04 13:06:11'),
(10, 'aymenalhattam15@gmail.com', 'aymen_mohammed', 'Generate Report', 'auditing data reports', '2018-08-04 19:35:31', '2018-08-04 19:35:31'),
(11, 'aymenalhattam15@gmail.com', 'aymen_mohammed', 'Generate Report', 'devices data reports', '2018-08-05 07:04:21', '2018-08-05 07:04:21'),
(12, 'aymenalhattam15@gmail.com', 'aymen_mohammed', 'Generate Report', 'devices data reports', '2018-08-05 07:32:17', '2018-08-05 07:32:17'),
(13, 'aymenalhattam15@gmail.com', 'aymen_mohammed', 'Generate Report', 'devices data reports', '2018-08-05 07:33:10', '2018-08-05 07:33:10'),
(14, 'aymenalhattam15@gmail.com', 'aymen_mohammed', 'Generate Report', 'devices data reports', '2018-08-05 08:41:27', '2018-08-05 08:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `device_status`
--

DROP TABLE IF EXISTS `device_status`;
CREATE TABLE IF NOT EXISTS `device_status` (
  `device_id` int(11) NOT NULL,
  `device_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `device_status`
--

INSERT INTO `device_status` (`device_id`, `device_name`, `status`) VALUES
(1, 'sending device (ultrasonic)', 'on'),
(2, 'sending node (mcu)', 'on'),
(3, 'water level sensor', 'on'),
(4, 'receiving node (mcu)', 'on'),
(5, 'alarm', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

DROP TABLE IF EXISTS `map`;
CREATE TABLE IF NOT EXISTS `map` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lat` double(8,7) NOT NULL,
  `lng` double(8,7) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`id`, `name`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(1, 'Sensor 01', 15.3500000, 44.2100000, '2018-08-01 03:40:00', '2018-08-01 03:40:00'),
(2, 'Sensor 02', 15.3500000, 44.2100000, '2018-08-01 03:40:00', '2018-08-01 03:40:00'),
(3, 'Alarm 01', 15.3500000, 44.2100000, '2018-08-01 03:40:00', '2018-08-01 03:40:00'),
(4, 'Alarm 02', 15.3500000, 44.2100000, '2018-08-01 03:40:00', '2018-08-01 03:40:00'),
(5, 'Alarm 03', 15.3900000, 44.2100000, '2018-08-01 03:40:00', '2018-08-01 03:40:00'),
(6, 'Alarm 04', 15.3900000, 44.2100000, '2018-08-01 03:40:00', '2018-08-01 03:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2018_04_30_180913_arduino_table', 2),
(10, '2018_05_01_084252_rename_columns_in_arduino_table', 3),
(11, '2018_05_04_174058_rename_arduion_to_arduino', 4),
(12, '2018_05_06_105600_create_weather_table', 5),
(13, '2018_05_08_151642_rename_weather_to_weahters', 6),
(14, '2018_07_21_144417_add_columns_to_weather_table', 7),
(15, '2018_07_24_134406_add_column_mean_to_arduino_table', 8),
(16, '2018_07_28_165826_add_devices_status_table', 9),
(17, '2018_07_29_045706_add_role_column_to_users_table', 10),
(18, '2018_07_29_075223_add_admin_column_to_users', 11),
(19, '2018_08_01_151529_cteate_map_table', 12),
(20, '2018_08_02_071054_create_table_past_arduinos', 13),
(21, '2018_08_02_071515_rename_table_from_post_arduions_to_past_arduinos', 14),
(22, '2018_08_04_081517_crate_table_audting', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('aymenalhattam15@gmail.com', '$2y$10$bm1MXId.wI13xmUeaYpmNemNRz9sn.rhHX7lvHrhqJT2SOCbNcXjK', '2018-08-05 01:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `past_arduinos`
--

DROP TABLE IF EXISTS `past_arduinos`;
CREATE TABLE IF NOT EXISTS `past_arduinos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `arduino_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `arduino_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mean` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `past_arduinos`
--

INSERT INTO `past_arduinos` (`id`, `arduino_1`, `arduino_2`, `mean`, `created_at`, `updated_at`) VALUES
(1, '1000', '500', '55', '2018-07-24 21:00:00', NULL),
(2, '1050', '20', '60', '2018-07-24 21:00:00', NULL),
(3, '100', '30', '65', '2018-07-24 21:00:00', NULL),
(4, '100', '40', '70', '2018-07-24 21:00:00', NULL),
(5, '100', '50', '75', '2018-07-24 21:00:00', NULL),
(6, '100', '60', '80', '2018-07-24 21:00:00', NULL),
(7, '100', '70', '85', '2018-07-28 21:00:00', NULL),
(41, '1000', '300', '650', '2018-07-28 21:00:00', NULL),
(40, '1000', '50', '525', '2018-07-29 02:17:21', NULL),
(39, '100', '200', '150', '2018-07-29 07:14:42', NULL),
(38, '100', '50', '75', '2018-07-29 13:15:44', NULL),
(37, '100', '100', '100', '2018-07-29 05:21:00', NULL),
(36, '100', '50', '75', '2018-07-29 19:00:25', NULL),
(35, '100', '1000', '550', '2018-07-29 13:23:38', NULL),
(34, '100', '50', '75', '2018-07-29 18:00:00', NULL),
(33, '100', '50', '75', '2018-07-28 21:52:00', NULL),
(32, '100', '50', '75', '2018-07-29 01:27:00', NULL),
(31, '100', '50', '75', '2018-07-29 02:27:51', NULL),
(30, '100', '50', '75', '2018-07-29 15:27:10', NULL),
(29, '100', '50', '75', '2018-07-29 06:37:10', NULL),
(28, '1000', '500', '750', '2018-07-29 08:41:00', NULL),
(27, '1000', '100', '550', '2018-07-29 07:46:47', NULL),
(26, '1500', '90', '545', '2018-07-29 14:24:13', NULL),
(25, '1000', '80', '540', '2018-07-29 04:00:00', NULL),
(42, '100', '500', '300', '2018-07-29 01:29:47', NULL),
(43, '1000', '500', '750', '2018-07-29 01:24:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aymen', 'aymen@gmail.com', '$2y$10$wZegt5/kMKCgSQzIrVEw4OPQvJ.zFCdv0SPPxB342iXx/zVyNZNRC', 1, 'CrIURQvHp0WD6V2zVv6B2OfA7I0811yBzviosAW2cbBWd6NoXpvH2PiRdVae', '2018-04-11 15:18:27', '2018-07-30 01:48:14'),
(2, 'aymen_mohammed', 'aymenalhattam15@gmail.com', '$2y$10$506OqxmQZEMJ9L8kPq2gJetXO9Y9oT0SSD//EV2RQ.6kYJtAEeVzG', 1, 'DsaZ1m2H02K3DvhM1nhKKBVkiRHaqx6vUQymYS8EqAD7ITBSv2XeRqzMlDRJ', '2018-07-17 11:30:23', '2018-08-03 10:22:52'),
(5, 'aymen_1', 'aymen_1@gmail.com', '$2y$10$s2bqS/daOyXjRDaYazBnR.xYTuIIq3pjKzrl5SWRCSy6ziGMc58Im', 0, 'ccsTx9MtWMRrXpDwQnkM4ci8JCOgfVjHAjAoH4IUcfuEARuR2HDBuz47zDEI', '2018-07-29 13:34:46', '2018-07-30 01:46:42'),
(24, 'ammar', 'ammar@gmail.com', '$2y$10$ngBWJ9JAMZjEuoe//nELB.sLO/kPqvpOD4BaHF8xF3Cj5Ny5HvyIW', 0, NULL, '2018-08-03 08:17:56', '2018-08-03 08:17:56'),
(25, 'najeeb', 'najab@gmail.com', '$2y$10$qPNfDeX6SNgqUO5/hoNihOk6Uq98pscb4MFHHHPEKvU3qfsEa/Wsy', 0, NULL, '2018-08-03 08:20:54', '2018-08-04 05:56:43'),
(7, 'muath', 'aymen_3@gmail.com', '$2y$10$Gub3dhxKOMN1d578gNlvveV1Gu8g9dlXJLeXwFpjNUEBTychSxVMe', 1, 'UkVg13gs71e2bDlk0b47Sbk2ximIqFdVJbyPdFEqa41jBJw43Yl17vEiI90F', '2018-07-30 04:42:31', '2018-07-30 05:02:03'),
(9, 'aymen_5', 'aymen_5@gmail.com', '$2y$10$wzB8fmGgzwWapGtOQgT.9uw8XJOKix0FCUFDlVJiVWWtkUbGoDPei', 0, '7RfsSbbk3cZUUPr3bvKL1krnPoUCIXrc1ZSHdItRpyDOhXVq6SMPN0SZEihT', '2018-07-30 10:14:46', '2018-07-30 10:14:46'),
(10, 'aymen_6', 'aymen_6@gmail.com', '$2y$10$wtHmwncbDAloHqo9H.voRuoITmUm./PtJHh6ygegvuxSyw/tKouRu', 1, NULL, '2018-07-30 10:25:29', '2018-07-30 10:26:02'),
(11, 'aymen_8', 'aymen_7@gmail.com', '$2y$10$Vf/M6XVRXXu1lySXJLbJfec6XE9lPkuxOSySFygsnB3rtom9X7Lla', 0, 'tNDTJd4aZPVweJiVabm8cqv3RaaIcIFuPOpoTgUDEmB6Is6oq17gxPfWoQfF', '2018-07-30 10:26:47', '2018-07-30 13:34:23'),
(13, 'aymen_aymen', 'aymen.alyemen@gmail.com', '$2y$10$IG6ydxrBu3ERsoYYOont7Oxcr4ka9ahsHHGozw.EFQ2AQx2o6Vyja', 0, 'eaEhhyTPWQl7zxnpCz93gK8BjWs53fSpbjxqT8J3fgR1XpzyD26NqsNGAe3w', '2018-08-02 02:09:46', '2018-08-02 11:26:46'),
(14, 'aymen_10', 'aymen_10@gmail.com', '$2y$10$4/0djPAkUSrqcrQFSgsM1e/w3rUxSvkVlF01drB8Sx3f6YVW.vk2e', 0, 'gqftkVM2FcZC1E6eku5Bjp4jNxqIjk9sYmHixQGHgvauBRa0Bqd9LqO1HISs', '2018-08-02 02:59:15', '2018-08-02 02:59:15'),
(15, 'aymen_11', 'aymen_11@gmail.com', '$2y$10$kdutWFl92TyOf.UlV7PS1Ov2ilvm.V3e7B9T7k5UP263JO3s4hCx6', 0, NULL, '2018-08-02 03:01:11', '2018-08-02 03:01:11'),
(16, 'aymen_12', 'aymen_12@gmail.com', '$2y$10$ZuJ5OYz5E64zOg5dI2Nqz.EQOZknyYcIVZtMZqu0AE5yf5XDFK4Tu', 0, NULL, '2018-08-02 03:02:15', '2018-08-02 03:02:15'),
(17, 'aymen_13', 'aymen_13@gmail.com', '$2y$10$MAvsIlmOY3NqRV.mBASA/uBq.rl5vV1eE87mE6/JHKqyf1Nb9gh.a', 0, NULL, '2018-08-02 03:03:29', '2018-08-02 03:03:29'),
(26, 'aymen_20', 'aymen_20@gmail.com', '$2y$10$04AHyW2ssB9xZUH4FeQ5nec9R3VYu6fm1n5uXhn6CkGzbo0QVmEMC', 0, NULL, '2018-08-04 16:41:34', '2018-08-04 16:41:34'),
(27, 'ewsf', 'ewsf@gmail.com', '$2y$10$r38IHXqAFp/JrPBl1xrk0.aJ.xafiUbXrH2AtPBNksV4MONPpDcM2', 0, NULL, '2018-08-05 01:01:58', '2018-08-05 01:01:58'),
(21, 'mouth', 'mouth@gmail.com', '$2y$10$Q3U0PzAThOtVWXJCpSswqe4j88yttVNyBzhMPpZccoKxxqCqK8Nwa', 0, NULL, '2018-08-03 08:15:20', '2018-08-03 08:15:20'),
(22, 'ahmed', 'ahmed@gmail.com', '$2y$10$fSBdbiCDU1tsaPEwbzHUTu/Ggjw5tLaeAoMoHzYro8rhyn3VEaINy', 0, NULL, '2018-08-03 08:15:38', '2018-08-03 08:15:38'),
(23, 'as3ad', 'as3ad@gmail.com', '$2y$10$sUDlt/jVUk4/Kws/WU9R2OKbctb8H0BrZ6GHYjEGBEW0oERvqKh1y', 0, 'AhRsw3KemrzCIaneiJFTnZRMg1xXNBJMZam6ncC7khNz1orgDB7VgfiQatcE', '2018-08-03 08:16:30', '2018-08-03 08:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `weathers`
--

DROP TABLE IF EXISTS `weathers`;
CREATE TABLE IF NOT EXISTS `weathers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `outlook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `temp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pressure` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `humidity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `temp_min` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `temp_max` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sea_level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grnd_level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wind_speed` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wind_degree` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `weathers`
--

INSERT INTO `weathers` (`id`, `day`, `outlook`, `temp`, `pressure`, `humidity`, `temp_min`, `temp_max`, `sea_level`, `grnd_level`, `wind_speed`, `wind_degree`, `created_at`, `updated_at`) VALUES
(8, 'Sat', 'overcast clouds', '303.387', '1016.63', '76', '303.387', '303.387', '1017.05', '1016.63', '9.36', '213.506', '2018-07-21 12:43:53', '2018-07-21 12:43:53'),
(7, 'Sat', 'overcast clouds', '303.387', '1016.63', '76', '303.387', '303.387', '1017.05', '1016.63', '9.36', '213.506', '2018-07-21 12:43:57', '2018-07-21 12:43:57'),
(6, 'Sat', 'overcast clouds', '303.387', '1016.63', '76', '303.387', '303.387', '1017.05', '1016.63', '9.36', '213.506', '2018-07-21 12:43:53', '2018-07-21 12:43:53'),
(4, 'Sat', 'overcast clouds', '303.387', '1016.63', '76', '303.387', '303.387', '1017.05', '1016.63', '9.36', '213.506', '2018-07-21 12:43:53', '2018-07-21 12:43:53'),
(5, 'Sat', 'overcast clouds', '303.387', '1016.63', '76', '303.387', '303.387', '1017.05', '1016.63', '9.36', '213.506', '2018-07-21 12:43:57', '2018-07-21 12:43:57'),
(9, 'Sat', 'overcast clouds', '303.387', '1016.63', '76', '303.387', '303.387', '1017.05', '1016.63', '9.36', '213.506', '2018-07-21 12:43:53', '2018-07-21 12:43:53'),
(10, 'Sat', 'overcast clouds', '303.387', '1016.63', '76', '303.387', '303.387', '1017.05', '1016.63', '9.36', '213.506', '2018-07-21 12:43:57', '2018-07-21 12:43:57'),
(11, 'Sat', 'overcast clouds', '303.387', '1016.63', '76', '303.387', '303.387', '1017.05', '1016.63', '9.36', '213.506', '2018-07-21 12:43:57', '2018-07-21 12:43:57'),
(12, 'Sat', 'overcast clouds', '303.387', '1016.63', '76', '303.387', '303.387', '1017.05', '1016.63', '9.36', '213.506', '2018-07-21 12:43:53', '2018-07-21 12:43:53'),
(13, 'Sat', 'overcast clouds', '303.387', '1016.63', '76', '303.387', '303.387', '1017.05', '1016.63', '9.36', '213.506', '2018-07-21 12:43:53', '2018-07-21 12:43:53'),
(14, 'Sat', 'overcast clouds', '303.387', '1016.63', '76', '303.387', '303.387', '1017.05', '1016.63', '9.36', '213.506', '2018-07-21 12:43:53', '2018-07-21 12:43:53'),
(15, 'Sat', 'overcast clouds', '303.387', '1016.63', '76', '303.387', '303.387', '1017.05', '1016.63', '9.36', '213.506', '2018-07-21 12:43:53', '2018-07-21 12:43:53'),
(16, 'Sat', 'overcast clouds', '303.387', '1016.63', '76', '303.387', '303.387', '1017.05', '1016.63', '9.36', '213.506', '2018-07-21 12:43:57', '2018-07-21 12:43:57'),
(17, 'Sat', 'overcast clouds', '303.387', '1016.63', '76', '303.387', '303.387', '1017.05', '1016.63', '9.36', '213.506', '2018-07-21 12:43:57', '2018-07-21 12:43:57'),
(18, 'Sat', 'overcast clouds', '303.387', '1016.63', '76', '303.387', '303.387', '1017.05', '1016.63', '9.36', '213.506', '2018-07-21 12:43:57', '2018-07-21 12:43:57'),
(19, 'Sat', 'overcast clouds', '303.387', '1016.63', '76', '303.387', '303.387', '1017.05', '1016.63', '9.36', '213.506', '2018-07-21 12:43:57', '2018-07-21 12:43:57'),
(20, 'Thu', 'clear sky', '302.099', '1015.02', '76', '302.099', '302.099', '1015.44', '1015.02', '9.76', '216.004', '2018-08-02 09:09:44', '2018-08-02 09:09:44'),
(21, 'Thu', 'clear sky', '302.099', '1015.02', '76', '302.099', '302.099', '1015.44', '1015.02', '9.76', '216.004', '2018-08-02 09:09:53', '2018-08-02 09:09:53'),
(22, 'Thu', 'clear sky', '302.099', '1015.02', '76', '302.099', '302.099', '1015.44', '1015.02', '9.76', '216.004', '2018-08-02 09:10:04', '2018-08-02 09:10:04'),
(23, 'Thu', 'clear sky', '302.099', '1015.02', '76', '302.099', '302.099', '1015.44', '1015.02', '9.76', '216.004', '2018-08-02 09:10:14', '2018-08-02 09:10:14'),
(24, 'Thu', 'clear sky', '302.099', '1015.02', '76', '302.099', '302.099', '1015.44', '1015.02', '9.76', '216.004', '2018-08-02 09:10:24', '2018-08-02 09:10:24'),
(25, 'Thu', 'clear sky', '302.099', '1015.02', '76', '302.099', '302.099', '1015.44', '1015.02', '9.76', '216.004', '2018-08-02 09:10:41', '2018-08-02 09:10:41'),
(26, 'Fri', 'broken clouds', '304.161', '854.78', '29', '304.161', '304.161', '1016.74', '854.78', '1.15', '210.502', '2018-08-03 10:27:52', '2018-08-03 10:27:52'),
(27, 'Fri', 'broken clouds', '304.161', '854.78', '29', '304.161', '304.161', '1016.74', '854.78', '1.15', '210.502', '2018-08-03 10:28:01', '2018-08-03 10:28:01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
