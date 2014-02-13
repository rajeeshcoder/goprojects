-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 13, 2014 at 01:38 PM
-- Server version: 5.5.35
-- PHP Version: 5.5.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `carservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_status`
--

CREATE TABLE IF NOT EXISTS `booking_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_booking_id` int(11) NOT NULL,
  `customer_booking_status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `owner` enum('d','c','s') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=72 ;

--
-- Dumping data for table `booking_status`
--

INSERT INTO `booking_status` (`id`, `customer_booking_id`, `customer_booking_status_id`, `user_id`, `owner`, `created_at`, `updated_at`) VALUES
(59, 30, 1, 2, 's', '2014-02-01 23:35:04', '2014-02-01 23:35:04'),
(60, 30, 4, 7, 'd', '2014-02-01 23:35:34', '2014-02-01 23:35:34'),
(61, 30, 5, 2, 'c', '2014-02-01 23:36:06', '2014-02-01 23:36:06'),
(62, 31, 1, 2, 's', '2014-02-01 23:37:24', '2014-02-01 23:37:24'),
(63, 31, 4, 7, 'd', '2014-02-01 23:38:02', '2014-02-01 23:38:02'),
(64, 31, 5, 2, 'c', '2014-02-01 23:38:30', '2014-02-01 23:38:30'),
(65, 32, 1, 12, 's', '2014-02-03 03:58:04', '2014-02-03 03:58:04'),
(66, 32, 2, 12, 'c', '2014-02-03 03:58:27', '2014-02-03 03:58:27'),
(67, 32, 4, 7, 'd', '2014-02-03 03:59:14', '2014-02-03 03:59:14'),
(68, 32, 5, 12, 'c', '2014-02-03 03:59:46', '2014-02-03 03:59:46'),
(69, 33, 1, 2, 's', '2014-02-05 02:08:26', '2014-02-05 02:08:26'),
(70, 33, 4, 7, 'd', '2014-02-05 02:08:47', '2014-02-05 02:08:47'),
(71, 33, 5, 2, 'c', '2014-02-05 02:09:10', '2014-02-05 02:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `customer_bookings`
--

CREATE TABLE IF NOT EXISTS `customer_bookings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `customer_profile_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `service_center_id` int(11) NOT NULL,
  `total_km` int(11) NOT NULL,
  `service_type` enum('free','paid','accident','repair') COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_dispatch` enum('pick-up','walk-in') COLLATE utf8_unicode_ci DEFAULT NULL,
  `servicedate` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `customer_bookings`
--

INSERT INTO `customer_bookings` (`id`, `user_id`, `customer_profile_id`, `vehicle_id`, `service_center_id`, `total_km`, `service_type`, `service_dispatch`, `servicedate`, `created_at`, `updated_at`) VALUES
(30, 2, 1, 6, 1, 67, 'free', 'pick-up', '2014-02-03 09:00:00', '2014-02-01 23:35:04', '2014-02-01 23:35:04'),
(31, 2, 1, 6, 1, 32, 'free', 'pick-up', '2014-02-20 09:00:00', '2014-02-01 23:37:24', '2014-02-01 23:37:24'),
(32, 12, 5, 10, 1, 20000, 'paid', 'pick-up', '2014-02-04 09:00:00', '2014-02-03 03:58:04', '2014-02-03 03:58:27'),
(33, 2, 1, 6, 1, 1000, 'paid', 'pick-up', '2014-02-21 09:00:00', '2014-02-05 02:08:26', '2014-02-05 02:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `customer_bookings_status`
--

CREATE TABLE IF NOT EXISTS `customer_bookings_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `owner` enum('dealer','customer','dealer_customer') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customer_bookings_status`
--

INSERT INTO `customer_bookings_status` (`id`, `title`, `owner`, `created_at`, `updated_at`) VALUES
(1, 'pending', 'dealer_customer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'modify', 'dealer_customer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'cancel', 'dealer_customer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'approve', 'dealer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'confirm', 'customer', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_profiles`
--

CREATE TABLE IF NOT EXISTS `customer_profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primary_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `secondary_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customer_profiles`
--

INSERT INTO `customer_profiles` (`id`, `user_id`, `title`, `primary_phone`, `secondary_phone`, `address`, `city`, `state`, `created_at`, `updated_at`) VALUES
(1, 2, 'Home', '+919740058930', '', '#110, Manjunatha Layout,\r\nMunekolala, Marathahalli,', 'Bangalore', 'Karantakas', '2014-01-17 22:00:12', '2014-01-21 06:36:40'),
(2, 2, 'Office', '9731280598', '', 'Maxim Integrated', 'Bangalore', 'Karantaka', '2014-01-17 22:44:03', '2014-01-21 06:16:27'),
(3, 5, 'Primary', '9731280598', '', 'Koonthallur', 'Attingal', 'Kerala', '2014-01-29 18:21:53', '2014-01-29 18:21:53'),
(4, 9, 'Bangalore_Home', '999999', '2222', '110, 7th Cross', 'Bangalore', 'Karantaka', '2014-02-01 09:53:00', '2014-02-01 09:53:00'),
(5, 12, 'home', '12345', '1234', '#110,ABC', 'Bangalore', 'Karantaka', '2014-02-03 03:27:18', '2014-02-03 03:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `customer_vehicles`
--

CREATE TABLE IF NOT EXISTS `customer_vehicles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `reg_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `chasis_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `engine_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `regdate` date DEFAULT NULL,
  `color` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `customer_vehicles`
--

INSERT INTO `customer_vehicles` (`id`, `user_id`, `model_id`, `reg_no`, `chasis_no`, `engine_no`, `regdate`, `color`, `created_at`, `updated_at`) VALUES
(6, 2, 1, 'ka 03 mk 4783', '2222', '455555555555555555', '2008-11-21', 'grey', '2014-01-21 11:05:14', '2014-01-21 11:05:47'),
(7, 2, 11, 'ka 02 1234', 'dddd', '1111', '2014-01-14', 'white', '2014-01-21 11:05:33', '2014-01-21 11:06:11'),
(8, 5, 2, 'ka04 aa 9999', '222', '123', '2013-06-01', 'Red', '2014-01-29 18:21:14', '2014-01-29 18:21:14'),
(9, 9, 5, 'xx2233', '122', '123', '2013-09-01', 'black', '2014-02-01 09:53:35', '2014-02-01 09:53:35'),
(10, 12, 1, 'ka 03 mk 4783', '678', '123', '2014-02-02', 'grey', '2014-02-03 03:57:22', '2014-02-03 03:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE IF NOT EXISTS `dealers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`id`, `user_id`, `manufacturer_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'Tekno', '0000-00-00 00:00:00', '2014-01-16 11:56:55'),
(2, 0, 1, 'Bimal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 0, 1, 'Pratham', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 0, 3, 'KHT', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(2, 'Customer', '{"customer":1}', '2014-01-15 04:15:28', '2014-01-15 04:15:28'),
(3, 'Admin', '{"admin":1}', '2014-01-15 04:17:17', '2014-01-15 04:17:17'),
(4, 'Dealer_Admin', '{Create:1, Edit:1:, Delete:1, View:1}', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Dealer_Service', '{"create":0, "edit":0, "delete":0, "view":1}', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE IF NOT EXISTS `manufacturers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `user_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 3, 'Maruti', '0000-00-00 00:00:00', '2014-01-16 06:53:03'),
(2, 1, 'Hyundai', '0000-00-00 00:00:00', '2014-01-13 05:59:17'),
(3, 0, 'Fiat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 0, 'Chevorlet', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 0, 'Tata', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 0, 'Renault', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 3, 'Honda', '2014-01-16 11:57:23', '2014-01-16 11:57:23'),
(9, 3, 'Trident', '2014-01-21 06:24:56', '2014-01-21 06:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_01_12_074129_create-manufacturers-table', 1),
('2014_01_12_074853_create-models-table', 1),
('2014_01_12_080359_create-dealers-table', 1),
('2014_01_12_082144_create-dealers_locations-table', 1),
('2014_01_12_083034_create-service_centers-table', 1),
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 2),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 2),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 2),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 2),
('2014_01_13_103703_add_user_id_to_manufacturers_table', 3),
('2014_01_16_071119_add_userid_to_models', 4),
('2014_01_16_091342_add_userid_to_dealers', 5),
('2014_01_17_044810_add_location_to_dealers', 6),
('2014_01_17_090351_create_customer_profile', 7),
('2014_01_17_090409_create_customer_vehicle', 7),
('2014_01_17_090414_create_customer_booking', 7),
('2014_01_18_032345_add_title_to_customer_profile', 8),
('2014_01_23_071417_add_profile_id_to_booking', 9),
('2014_01_25_052230_create_booking_status', 10),
('2014_01_25_055659_seed_create_booking_status', 11),
('2014_01_25_075708_create_booking_status_pivot', 12),
('2014_01_25_092257_add_author_booking_status_pivot', 13),
('2014_01_28_180644_dealer_user_pivot', 14),
('2014_01_29_064441_create_service_master', 15),
('2014_01_29_120243_create_master_service_status', 16),
('2014_01_29_120959_service_status', 17),
('2014_01_29_123237_create_service_stat', 18),
('2014_02_05_110318_add_parts_master', 19),
('2014_02_10_123026_create_quote', 20),
('2014_02_10_181303_create_quotes_parts', 21);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE IF NOT EXISTS `models` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `cylinders` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `user_id`, `manufacturer_id`, `title`, `cost`, `cylinders`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'Palio', 0, 0, '0000-00-00 00:00:00', '2014-01-16 06:50:15'),
(2, 3, 3, 'Punto', 0, 0, '0000-00-00 00:00:00', '2014-01-16 06:50:22'),
(3, 3, 3, 'Linea', 0, 0, '0000-00-00 00:00:00', '2014-01-16 06:50:27'),
(4, 0, 1, 'Swift', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 0, 1, 'Alto', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 0, 1, 'SX4', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 3, 1, 'WagonR', 0, 0, '2014-01-16 06:31:19', '2014-01-16 06:31:19'),
(12, 3, 7, 'City', 0, 0, '2014-01-16 11:57:36', '2014-01-16 11:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `parts_master`
--

CREATE TABLE IF NOT EXISTS `parts_master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_id` int(11) NOT NULL,
  `part_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `unit` enum('num','ltr','kg') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `parts_master`
--

INSERT INTO `parts_master` (`id`, `model_id`, `part_number`, `description`, `price`, `unit`, `created_at`, `updated_at`) VALUES
(1, 1, '59064034', ' Elastic Pad', 2455.05, 'num', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, '570309110108', ' Fuel Filter W/O Water Level Sensor', 1692.34, 'num', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, '570309130108', ' Air Filter Element SDE 75 PS', 252.16, 'num', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, '59063972', ' Oil Filter DSl', 354.27, 'num', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, '59116510', ' Wiremesh Filter', 47.06, 'num', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, '9948095', ' Brake Pad Set', 3239.96, 'num', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, '10000', ' Fiat Oil', 1846.85, 'ltr', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, '55226971', ' Clutch Plate DSL', 991.79, 'num', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, '55209807', ' Clutch Plate Pressure', 1082.35, 'num', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, '100166817', ' Lock', 1175.58, 'num', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, '59064264', ' Brake Disc', 1935.63, 'num', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `quotedate` datetime NOT NULL,
  `status` enum('pending','approved','re-open') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quotes_parts`
--

CREATE TABLE IF NOT EXISTS `quotes_parts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `entrydate` datetime NOT NULL,
  `parttype` enum('free','warranty','paid') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `service_centers`
--

CREATE TABLE IF NOT EXISTS `service_centers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `dealer_id` int(11) NOT NULL,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `service_centers`
--

INSERT INTO `service_centers` (`id`, `user_id`, `dealer_id`, `title`, `created_at`, `updated_at`, `location`, `city`, `state`) VALUES
(1, 3, 1, 'Hosur Road', '0000-00-00 00:00:00', '2014-01-17 01:52:14', 'Kudlu gate', 'Bangalore', 'Karantaka'),
(2, 3, 2, 'Mahadevapura', '0000-00-00 00:00:00', '2014-01-17 01:52:18', 'Whitefield', 'Bangalore', 'Karantaka'),
(3, 3, 4, 'Whitefield', '0000-00-00 00:00:00', '2014-01-17 01:52:21', 'PSN', 'Bangalore', 'Karantaka'),
(4, 3, 3, 'Kadubisanhalli', '0000-00-00 00:00:00', '2014-01-17 01:52:24', 'Marathahalli', 'Bangalore', 'Karantaka'),
(5, 3, 2, 'Forum', '2014-01-17 01:49:03', '2014-01-17 01:52:11', 'Whitefield', 'Bangalore', 'Karantaka');

-- --------------------------------------------------------

--
-- Table structure for table `service_master`
--

CREATE TABLE IF NOT EXISTS `service_master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `report` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_amt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `service_master`
--

INSERT INTO `service_master` (`id`, `user_id`, `booking_id`, `start_date`, `end_date`, `report`, `total_amt`, `created_at`, `updated_at`) VALUES
(23, 2, 30, '2014-02-03 09:00:00', '0000-00-00 00:00:00', '', '', '2014-02-01 23:36:06', '2014-02-01 23:36:06'),
(24, 2, 31, '2014-02-20 09:00:00', '0000-00-00 00:00:00', '', '', '2014-02-01 23:38:30', '2014-02-01 23:38:30'),
(25, 12, 32, '2014-02-04 09:00:00', '0000-00-00 00:00:00', '', '', '2014-02-03 03:59:46', '2014-02-03 03:59:46'),
(26, 2, 33, '2014-02-21 09:00:00', '0000-00-00 00:00:00', '', '', '2014-02-05 02:09:10', '2014-02-05 02:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `service_master_status`
--

CREATE TABLE IF NOT EXISTS `service_master_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `owner` enum('dealer') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `service_master_status`
--

INSERT INTO `service_master_status` (`id`, `title`, `owner`, `created_at`, `updated_at`) VALUES
(1, 'pickup-source', 'dealer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'started', 'dealer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'finished', 'dealer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'payment-due', 'dealer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'payment-complete', 'dealer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'pickup-delivery', 'dealer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'feedback', 'dealer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'completed', 'dealer', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `service_status`
--

CREATE TABLE IF NOT EXISTS `service_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_master_id` int(11) NOT NULL,
  `service_master_status_id` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=127 ;

--
-- Dumping data for table `service_status`
--

INSERT INTO `service_status` (`id`, `service_master_id`, `service_master_status_id`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(81, 23, 1, '', 2, '2014-02-01 23:36:07', '2014-02-01 23:36:07'),
(82, 24, 1, '', 2, '2014-02-01 23:38:30', '2014-02-01 23:38:30'),
(103, 23, 2, 'f', 7, '2014-02-02 00:22:40', '2014-02-02 00:22:40'),
(104, 24, 2, 's', 7, '2014-02-02 00:22:44', '2014-02-02 00:22:44'),
(105, 23, 3, 'a', 7, '2014-02-02 00:22:47', '2014-02-02 00:22:47'),
(106, 24, 3, 'fg', 7, '2014-02-02 00:22:50', '2014-02-02 00:22:50'),
(107, 23, 4, 'd', 7, '2014-02-02 00:22:53', '2014-02-02 00:22:53'),
(108, 23, 5, 'a', 7, '2014-02-02 00:22:56', '2014-02-02 00:22:56'),
(109, 23, 6, 'q', 7, '2014-02-02 00:22:58', '2014-02-02 00:22:58'),
(110, 23, 7, 'y', 7, '2014-02-02 00:23:01', '2014-02-02 00:23:01'),
(111, 23, 8, 'c', 7, '2014-02-02 00:23:04', '2014-02-02 00:23:04'),
(112, 24, 4, 'we', 7, '2014-02-02 00:23:27', '2014-02-02 00:23:27'),
(113, 24, 5, 'ui', 7, '2014-02-02 00:23:32', '2014-02-02 00:23:32'),
(114, 24, 6, 'rv', 7, '2014-02-02 00:23:37', '2014-02-02 00:23:37'),
(115, 24, 7, 'uj', 7, '2014-02-02 00:23:41', '2014-02-02 00:23:41'),
(116, 24, 8, 'c', 7, '2014-02-02 00:23:45', '2014-02-02 00:23:45'),
(117, 25, 1, '', 12, '2014-02-03 03:59:46', '2014-02-03 03:59:46'),
(118, 25, 2, 'Started', 7, '2014-02-03 04:00:33', '2014-02-03 04:00:33'),
(119, 25, 3, 'finished', 7, '2014-02-03 04:00:39', '2014-02-03 04:00:39'),
(120, 25, 4, 'payment', 7, '2014-02-03 04:00:46', '2014-02-03 04:00:46'),
(121, 25, 5, 'com', 7, '2014-02-03 04:00:50', '2014-02-03 04:00:50'),
(122, 25, 6, 'del', 7, '2014-02-03 04:00:54', '2014-02-03 04:00:54'),
(123, 25, 7, 'feed', 7, '2014-02-03 04:00:58', '2014-02-03 04:00:58'),
(124, 25, 8, 'completed', 7, '2014-02-03 04:01:19', '2014-02-03 04:01:19'),
(125, 26, 1, '', 2, '2014-02-05 02:09:10', '2014-02-05 02:09:10'),
(126, 26, 2, 's', 7, '2014-02-05 03:37:26', '2014-02-05 03:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 1, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(2, 3, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(3, 2, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(4, 5, NULL, 0, 0, 0, NULL, NULL, NULL),
(5, 6, NULL, 0, 0, 0, NULL, NULL, NULL),
(6, 7, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(7, 8, NULL, 0, 0, 0, NULL, NULL, NULL),
(8, 9, NULL, 0, 0, 0, NULL, NULL, NULL),
(9, 10, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(10, 11, NULL, 0, 0, 0, NULL, NULL, NULL),
(11, 12, NULL, 0, 0, 0, NULL, NULL, NULL),
(12, 13, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(13, 14, NULL, 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(2, 'rajeesh@rajeesh.com', '$2y$10$TvyGp1nQuJfKXsmdMPX.3OnoepRtQpqvKOvHGDJfGFBFahdocZGiW', NULL, 1, NULL, NULL, '2014-02-11 08:23:13', '$2y$10$GoCHBdwSHC4q0tJmNBSZAOB5HUrybUCSK556LYgGCSRpwTTiXdg4i', NULL, 'Rajeesh', 'Koroth', '2014-01-15 04:15:28', '2014-02-11 08:23:13'),
(3, 'admin@admin.com', '$2y$10$Y0xcn.l.L4ztLpAGAnx.JeUoWMWm6PK3wways3p453SyyerqbeIJ2', NULL, 1, NULL, NULL, '2014-02-04 11:40:19', '$2y$10$vHps85WADXyTQVzn4m92gub4m.e4E2iorYImFsVY9b1sE/OhxxcKu', NULL, 'John', 'McClane', '2014-01-15 04:17:17', '2014-02-04 11:40:19'),
(5, 'thushara@thushara.com', '$2y$10$RMyW9AyjJE/KAi8Lp/xEwexxq2Kgi1ZsyOMLz6QrcGiVQQE9OVzXK', NULL, 1, NULL, NULL, '2014-02-03 04:44:22', '$2y$10$bkkb6w6HO7/dhaw7f0FcTO0afzJBgmGRVhTr9TjQP4bifhOGv64hO', NULL, 'Thushara', 'Dh', '2014-01-15 10:51:35', '2014-02-03 04:44:22'),
(6, 'vamika@customer.com', '$2y$10$rh.llyTxVs9yAy.7LZD1meA1M/Q2eSZ1wMfEUK8C6yTs.3OjzklL6', NULL, 1, NULL, NULL, '2014-01-28 02:38:55', '$2y$10$pMnqcN2VohoqtH7J48fkTuLCm5hKUkwSlPP/eqfnMIterV83GUNQK', NULL, 'Vamika', 'Rajeesh', '2014-01-28 02:36:29', '2014-01-28 02:38:55'),
(7, 'surendra@dealer.com', '$2y$10$TvyGp1nQuJfKXsmdMPX.3OnoepRtQpqvKOvHGDJfGFBFahdocZGiW', NULL, 1, NULL, NULL, '2014-02-11 03:39:58', '$2y$10$0Iw23lmlFuOOfnCJaXSTqu.97Y75sbBOvfiYbj42qZKUaHSDYusTG', NULL, 'Surendra', 'Jain', '2014-01-15 04:15:28', '2014-02-11 03:39:58'),
(8, 'arpita@cusotmer.com', '$2y$10$LE5iG22axAsQ89rTC4D32.1gJYxhbbl2Wahv5sRNmNLzzgUNjPk.y', NULL, 1, NULL, NULL, '2014-02-01 09:50:33', '$2y$10$yJxMUvbBEEJX.95N4K6b..jBqUMvXKj6hTNEBL0NIAG0.AYtznzRi', NULL, 'Arpitha', 'Mughe', '2014-02-01 09:50:33', '2014-02-01 09:50:33'),
(9, 'prabhu@customer.com', '$2y$10$QLc9rjwmol1Fiios0X97NOD/hOWZkg4VwvtMRA8qjbIZ8VQ8/1Bj6', NULL, 1, NULL, NULL, '2014-02-01 13:15:24', '$2y$10$BLXHBSCsMfQr.EG9gkswK.04MicGZFUUdIaog6U8FBImdHquhfSJS', NULL, 'Prabhootty', 'No', '2014-02-01 09:52:14', '2014-02-01 13:15:24'),
(10, 'ganesh@bimal.com', '$2y$10$TvyGp1nQuJfKXsmdMPX.3OnoepRtQpqvKOvHGDJfGFBFahdocZGiW', NULL, 1, NULL, NULL, '2014-02-02 00:23:54', '$2y$10$cDaxspUMD3gQFHFwTGwv3ODN6Q4Q9cb3DUDylieoDNe6Tte7MFaSK', NULL, 'Ganesh', 'KN', '2014-01-15 04:15:28', '2014-02-02 00:23:54'),
(11, 'sathi@customer.com', '$2y$10$STaA5O43KRGtDj.nJ8jRu.bcDhyePiVyBKVx6zTkX279fMRQaj9sC', NULL, 1, NULL, NULL, '2014-02-03 01:27:03', '$2y$10$UDU9CmVPf.9MdqyASK7YvOen2/kz9JRIUMWg3rbtiHsVEWyLm4OXe', NULL, 'Sathi', 'k', '2014-02-03 01:27:02', '2014-02-03 01:27:03'),
(12, 'thushu@gmail.com', '$2y$10$M7vs5fNBcCOCyIqMqucICuRGb60D1GCOYkccxPqtltjCfiDNGQF.q', NULL, 1, NULL, NULL, '2014-02-03 05:43:18', '$2y$10$VE.dx7bYjDEnS0b7S.6iIedvYuSfl3NGHgScQFe4Tx8lq1U88rIeK', NULL, 'Thushu', 'Raj', '2014-02-03 03:26:32', '2014-02-03 05:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(2, 2),
(3, 3),
(5, 2),
(6, 2),
(7, 5),
(8, 2),
(9, 2),
(10, 5),
(11, 2),
(12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_service`
--

CREATE TABLE IF NOT EXISTS `user_service` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `service_center_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_service`
--

INSERT INTO `user_service` (`id`, `user_id`, `service_center_id`, `created_at`, `updated_at`) VALUES
(1, 7, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 10, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
