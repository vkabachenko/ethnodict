-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2016 at 08:15 PM
-- Server version: 5.5.47
-- PHP Version: 5.4.45-3+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `etnodict_tests`
--

-- --------------------------------------------------------

--
-- Table structure for table `etno_migration`
--

CREATE TABLE IF NOT EXISTS `etno_migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `etno_migration`
--

INSERT INTO `etno_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1457780625),
('m160130_172105_create_word_table', 1457780628),
('m160130_174749_create_word_accent_table', 1457780628),
('m160212_102146_create_word_variants_table', 1457780630),
('m160324_080522_update_word_table', 1458839607);

-- --------------------------------------------------------

--
-- Table structure for table `etno_variant_type`
--

CREATE TABLE IF NOT EXISTS `etno_variant_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `etno_variant_type`
--

INSERT INTO `etno_variant_type` (`id`, `name`) VALUES
(1, 'Варианты ударения'),
(2, 'Словообразовательные параллели'),
(3, 'Номинативные параллели'),
(4, 'Фонетические варианты'),
(5, 'Морфологические варианты');

-- --------------------------------------------------------

--
-- Table structure for table `etno_word`
--

CREATE TABLE IF NOT EXISTS `etno_word` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=66 ;

--
-- Dumping data for table `etno_word`
--

INSERT INTO `etno_word` (`id`, `title`, `description`) VALUES
(41, 'Pariatur animi libero et.', NULL),
(42, 'Quo odit et quis nobis.', NULL),
(43, 'Aperiam quis a cum similique iusto sed.', NULL),
(44, 'Quae est impedit et illum.', NULL),
(45, 'Maxime consequatur in quas velit.', NULL),
(46, 'Voluptatem ad assumenda eveniet et.', NULL),
(47, 'Est eius nobis aut voluptatem ut.', NULL),
(48, 'Et dolores dolorem in quia vel dolor.', NULL),
(49, 'Ad quidem non earum eum ut et quam.', NULL),
(50, 'Labore eum ducimus eos.', NULL),
(51, 'Repellendus voluptatem deleniti et.', NULL),
(52, 'Dicta maiores velit blanditiis quo.', NULL),
(53, 'Sint error accusamus magni commodi.', NULL),
(54, 'Iste quo porro earum illo totam.', NULL),
(55, 'Unde eos inventore quo a.', NULL),
(56, 'Atque est dolorum architecto sapiente.', NULL),
(57, 'Non numquam autem impedit molestiae ab.', NULL),
(58, 'Animi recusandae est et.', NULL),
(59, 'Sapiente veniam aliquid vel.', NULL),
(60, 'Quas repellat ad architecto et enim ad.', NULL),
(61, 'Voluptas labore rerum optio odio.', NULL),
(62, 'Sint rem placeat facilis et et qui.', NULL),
(63, 'Optio est ut voluptatem quibusdam.', NULL),
(64, 'Ab quia totam nesciunt.', NULL),
(65, 'Nam culpa vero facilis ex est.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `etno_word_accent`
--

CREATE TABLE IF NOT EXISTS `etno_word_accent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_word` int(11) NOT NULL,
  `accent_position` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_word_position` (`id_word`,`accent_position`),
  KEY `id_word` (`id_word`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=130 ;

--
-- Dumping data for table `etno_word_accent`
--

INSERT INTO `etno_word_accent` (`id`, `id_word`, `accent_position`) VALUES
(81, 41, 0),
(82, 41, 10),
(83, 42, 3),
(84, 42, 20),
(85, 43, 6),
(86, 43, 35),
(88, 44, 2),
(87, 44, 10),
(90, 45, 5),
(89, 45, 23),
(91, 46, 20),
(92, 46, 26),
(93, 47, 14),
(94, 47, 32),
(95, 48, 13),
(96, 48, 27),
(97, 49, 30),
(99, 50, 1),
(98, 50, 8),
(101, 51, 7),
(100, 51, 16),
(102, 52, 5),
(103, 52, 23),
(104, 53, 23),
(105, 53, 29),
(107, 54, 1),
(106, 54, 23),
(109, 55, 0),
(108, 55, 11),
(111, 56, 28),
(110, 56, 32),
(113, 57, 0),
(112, 57, 35),
(115, 58, 19),
(114, 58, 23),
(117, 59, 4),
(116, 59, 26),
(118, 60, 8),
(119, 60, 28),
(121, 61, 17),
(120, 61, 31),
(123, 62, 6),
(122, 62, 9),
(125, 63, 22),
(124, 63, 28),
(126, 64, 16),
(127, 64, 17),
(128, 65, 0),
(129, 65, 25);

-- --------------------------------------------------------

--
-- Table structure for table `etno_word_variant`
--

CREATE TABLE IF NOT EXISTS `etno_word_variant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_word` int(11) NOT NULL,
  `id_variant` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `comment` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_word_variant` (`id_word`,`id_variant`,`id_type`),
  KEY `id_word` (`id_word`),
  KEY `id_variant` (`id_variant`),
  KEY `id_type` (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=125 ;

--
-- Dumping data for table `etno_word_variant`
--

INSERT INTO `etno_word_variant` (`id`, `id_word`, `id_variant`, `id_type`, `comment`) VALUES
(77, 41, 63, 2, 'Repellendus odit ratione ratione. Velit explicabo quo dicta in autem qui.'),
(78, 41, 55, 5, 'Iusto quae cumque aliquid beatae ut.'),
(79, 42, 44, 3, 'Quis non hic ut et qui minus qui autem. Unde hic accusantium et pariatur.'),
(80, 42, 64, 1, 'Repudiandae ullam recusandae dolorum aut non vero.'),
(81, 43, 51, 4, 'Magni exercitationem consequuntur et soluta officia alias.'),
(82, 43, 58, 3, 'Corporis iusto minus aliquam culpa sint similique voluptatem.'),
(83, 44, 52, 3, 'Reiciendis aut quaerat voluptatem animi occaecati.'),
(84, 44, 46, 1, 'Sit quibusdam quos repellat quos asperiores.'),
(85, 45, 57, 3, 'Voluptates ab veritatis animi exercitationem.'),
(86, 45, 44, 3, 'Corrupti ipsam illo vero quaerat quia non reiciendis sunt.'),
(87, 46, 56, 5, 'Culpa minus est dolorum ex. Iusto facere aut et a accusamus dolor eos.'),
(88, 47, 57, 3, 'Et quia error autem. Enim est dolores quisquam sunt dolorem beatae enim.'),
(89, 47, 55, 3, 'Sint est nobis qui ullam facere quo.'),
(90, 48, 50, 5, 'Pariatur assumenda id aliquam nihil esse qui.'),
(91, 48, 47, 3, 'Commodi aut dolores qui. Sed ut fuga assumenda repudiandae ducimus autem quia.'),
(92, 49, 61, 1, 'Voluptatibus unde consequuntur quasi labore vel illum.'),
(93, 49, 52, 3, 'Incidunt tempora non ut animi.'),
(94, 50, 51, 5, 'Optio itaque temporibus voluptatibus occaecati sed.'),
(95, 50, 54, 2, 'Inventore quo assumenda fugit praesentium quod omnis.'),
(96, 51, 65, 2, 'Officia illo delectus tempore nostrum et aut.'),
(97, 51, 46, 2, 'Maiores ullam eligendi et quo.'),
(98, 52, 53, 2, 'Ullam nostrum illum consectetur ipsum ipsum autem.'),
(99, 53, 63, 1, 'Voluptatem aut corrupti at cum maiores qui unde. Officia tenetur et eveniet et.'),
(100, 53, 44, 2, 'Incidunt delectus nesciunt repudiandae illo veritatis.'),
(101, 54, 43, 2, 'Ullam fugiat totam aut itaque et vitae numquam.'),
(102, 54, 49, 2, 'Dignissimos blanditiis veniam culpa excepturi velit non ut.'),
(103, 55, 59, 5, 'Sit repellendus nostrum veniam odit sed unde.'),
(104, 55, 61, 3, 'Sit et eos sed aperiam placeat.'),
(105, 56, 50, 1, 'Autem esse sint qui explicabo. Error qui quis tempore dolorum suscipit.'),
(106, 56, 59, 4, 'Maxime non dolor nesciunt voluptate sit omnis.'),
(107, 57, 53, 2, 'Eveniet enim explicabo labore non ea recusandae.'),
(108, 57, 51, 4, 'Delectus et nemo vitae et voluptas enim hic. Qui qui illum impedit minus.'),
(109, 58, 54, 2, 'Ea eius cum minima et sint.'),
(110, 58, 44, 3, 'Itaque ut vel ut aut tempora necessitatibus qui.'),
(111, 59, 49, 4, 'Quod reprehenderit amet suscipit.'),
(112, 59, 62, 3, 'Neque voluptatem odio expedita et.'),
(113, 60, 42, 2, 'Voluptates enim maxime molestias molestiae id odio.'),
(114, 60, 47, 4, 'Ex voluptatibus amet maxime et velit consequuntur molestiae.'),
(115, 61, 49, 2, 'Laboriosam deleniti doloribus fuga nisi minus commodi pariatur.'),
(116, 61, 62, 4, 'Qui sit quos consequatur et id iusto. Vitae ullam veritatis porro dolorum.'),
(117, 62, 45, 3, 'Excepturi velit perferendis ullam distinctio fugiat maiores et.'),
(118, 62, 51, 1, 'Molestiae fugiat odit et adipisci. Et qui iste temporibus mollitia doloribus.'),
(119, 63, 59, 1, 'Consectetur provident mollitia voluptates nesciunt ipsa minus cum.'),
(120, 63, 64, 4, 'Architecto dolores dolorem ut. Id est aliquam et qui culpa aperiam.'),
(121, 64, 53, 2, 'Magnam nulla ratione nam. Nesciunt culpa amet aut laborum dolorum tenetur.'),
(122, 64, 65, 1, 'Deleniti aut dolores vel qui perferendis eum ipsam.'),
(123, 65, 62, 2, 'Qui et voluptas nesciunt et rerum.'),
(124, 65, 57, 3, 'Deserunt aut porro et maxime maiores. Nulla dolores doloremque maxime odio.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `etno_word_accent`
--
ALTER TABLE `etno_word_accent`
  ADD CONSTRAINT `word_accent_word` FOREIGN KEY (`id_word`) REFERENCES `etno_word` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `etno_word_variant`
--
ALTER TABLE `etno_word_variant`
  ADD CONSTRAINT `type_word_variant` FOREIGN KEY (`id_type`) REFERENCES `etno_variant_type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `main_word_variant` FOREIGN KEY (`id_word`) REFERENCES `etno_word` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `other_word_variant` FOREIGN KEY (`id_variant`) REFERENCES `etno_word` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
