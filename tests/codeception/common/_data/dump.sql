-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2016 at 08:26 AM
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
-- Table structure for table `etno_folklore`
--

CREATE TABLE IF NOT EXISTS `etno_folklore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `etno_folklore`
--

INSERT INTO `etno_folklore` (`id`, `name`) VALUES
(1, 'Песня');

-- --------------------------------------------------------

--
-- Table structure for table `etno_literary_source`
--

CREATE TABLE IF NOT EXISTS `etno_literary_source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `short_link` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `long_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `short_link` (`short_link`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
('m160324_080522_update_word_table', 1458839607),
('m160324_175311_create_region_table', 1459153624),
('m160325_082304_create_citation_table', 1459153625),
('m160328_103925_create_folklore_table', 1459920355),
('m160329_112821_create_word_folklore_table', 1459920356),
('m160401_052326_create_literary_source_table', 1459920357),
('m160404_075733_create_etymology_table', 1459920357);

-- --------------------------------------------------------

--
-- Table structure for table `etno_region`
--

CREATE TABLE IF NOT EXISTS `etno_region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `etno_region`
--

INSERT INTO `etno_region` (`id`, `name`) VALUES
(1, 'Псковский');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=166 ;

--
-- Dumping data for table `etno_word`
--

INSERT INTO `etno_word` (`id`, `title`, `description`) VALUES
(141, 'Et fuga vel deleniti.', NULL),
(142, 'Beatae soluta sit est assumenda.', NULL),
(143, 'Doloribus ut quaerat qui fugiat.', NULL),
(144, 'Aut eum quo dolore.', NULL),
(145, 'Cum id corporis atque.', NULL),
(146, 'Id dolorem error molestias aut.', NULL),
(147, 'Earum eum esse quos enim enim ut.', NULL),
(148, 'Facilis et fugit reprehenderit rerum.', NULL),
(149, 'Ab non doloremque odit est ipsum.', NULL),
(150, 'Aspernatur modi qui repellendus est.', NULL),
(151, 'Aliquam id et saepe modi.', NULL),
(152, 'Non in quam in ullam neque.', NULL),
(153, 'Voluptatem totam aut rem.', NULL),
(154, 'Dolores aut officiis sit reprehenderit.', NULL),
(155, 'Facere et et fugit dignissimos.', NULL),
(156, 'Accusamus et est neque eligendi.', NULL),
(157, 'Natus qui id necessitatibus nobis.', NULL),
(158, 'Sequi eos et ut dicta repellendus ex.', NULL),
(159, 'Sit pariatur alias quam saepe minus et.', NULL),
(160, 'Minima ullam ut perferendis nemo.', NULL),
(161, 'Ab sit vitae eum est itaque qui.', NULL),
(162, 'Quidem eos labore autem dolor.', NULL),
(163, 'Et neque modi unde aut.', NULL),
(164, 'Omnis quia ratione et error rem.', NULL),
(165, 'Est quidem aliquam eveniet incidunt.', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=327 ;

--
-- Dumping data for table `etno_word_accent`
--

INSERT INTO `etno_word_accent` (`id`, `id_word`, `accent_position`) VALUES
(279, 141, 13),
(280, 141, 20),
(282, 142, 9),
(281, 142, 23),
(283, 143, 6),
(284, 143, 16),
(285, 144, 10),
(286, 144, 14),
(287, 145, 12),
(289, 146, 25),
(288, 146, 29),
(290, 147, 1),
(291, 147, 28),
(292, 148, 12),
(293, 148, 20),
(295, 149, 1),
(294, 149, 4),
(297, 150, 11),
(296, 150, 22),
(299, 151, 0),
(298, 151, 5),
(300, 152, 3),
(301, 152, 7),
(303, 153, 5),
(302, 153, 19),
(304, 154, 7),
(305, 154, 17),
(307, 155, 26),
(306, 155, 30),
(309, 156, 0),
(308, 156, 5),
(310, 157, 17),
(311, 157, 29),
(313, 158, 20),
(312, 158, 34),
(314, 159, 24),
(315, 160, 2),
(316, 160, 20),
(318, 161, 14),
(317, 161, 15),
(320, 162, 15),
(319, 162, 17),
(322, 163, 0),
(321, 163, 21),
(323, 164, 0),
(324, 164, 1),
(325, 165, 14),
(326, 165, 26);

-- --------------------------------------------------------

--
-- Table structure for table `etno_word_citation`
--

CREATE TABLE IF NOT EXISTS `etno_word_citation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_word` int(11) NOT NULL,
  `fragment` text COLLATE utf8_unicode_ci,
  `id_region` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_region` (`id_region`),
  KEY `id_word` (`id_word`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `etno_word_etymology`
--

CREATE TABLE IF NOT EXISTS `etno_word_etymology` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_word` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `id_source` int(11) DEFAULT NULL,
  `source_addition` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_source` (`id_source`),
  KEY `id_word` (`id_word`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `etno_word_folklore`
--

CREATE TABLE IF NOT EXISTS `etno_word_folklore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_word` int(11) NOT NULL,
  `fragment` text COLLATE utf8_unicode_ci,
  `id_region` int(11) DEFAULT NULL,
  `id_folklore` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_region` (`id_region`),
  KEY `id_word` (`id_word`),
  KEY `id_folklore` (`id_folklore`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=323 ;

--
-- Dumping data for table `etno_word_variant`
--

INSERT INTO `etno_word_variant` (`id`, `id_word`, `id_variant`, `id_type`, `comment`) VALUES
(274, 141, 150, 3, 'Placeat dolorem occaecati cumque doloribus qui explicabo dolores.'),
(275, 141, 142, 5, 'Voluptas pariatur quae autem doloremque dicta recusandae quo.'),
(276, 142, 152, 1, 'Aut ratione omnis iusto quo consequatur eum sit et.'),
(277, 142, 146, 3, 'In quasi id nam in nobis ducimus. Ut sed qui culpa laboriosam.'),
(278, 143, 142, 1, 'Odio nemo voluptas ut eos. Unde qui atque maiores sit aut id dolore.'),
(279, 143, 164, 5, 'Impedit voluptatum et quo officiis amet.'),
(280, 144, 155, 4, 'Harum molestiae odit est commodi eum accusantium.'),
(281, 144, 153, 5, 'Quas dolorum quam dolorem facere nemo.'),
(282, 145, 143, 4, 'Et et impedit sequi eligendi.'),
(283, 145, 149, 2, 'Magnam animi laborum quia nobis accusamus.'),
(284, 146, 161, 1, 'Dolores esse quis repellat accusantium recusandae quis.'),
(285, 146, 145, 1, 'Earum facilis veritatis voluptatem sapiente unde.'),
(286, 147, 165, 3, 'Aperiam ducimus voluptas optio cupiditate accusantium numquam.'),
(287, 147, 157, 1, 'Sunt dolorem et et corporis quos magnam qui.'),
(288, 148, 157, 5, 'Laboriosam et delectus minima ullam veniam qui impedit.'),
(289, 148, 152, 3, 'Omnis natus placeat eos voluptas ut animi. Mollitia sit cum soluta odit aut.'),
(290, 149, 165, 5, 'Id excepturi soluta tempore dolorem alias et non. Neque quas debitis qui.'),
(291, 149, 153, 5, 'Nihil vel ut quis magnam et et praesentium et.'),
(292, 150, 156, 1, 'Facere aut sed qui saepe delectus et debitis. Ad in ullam quae iste.'),
(293, 150, 161, 1, 'Numquam in optio voluptas vero qui ratione.'),
(294, 151, 149, 5, 'Vitae nihil eos quia aspernatur odio.'),
(295, 151, 146, 1, 'Quas et omnis quisquam ipsam. Omnis id est quod quia.'),
(296, 152, 153, 4, 'Quibusdam est debitis beatae.'),
(297, 152, 145, 3, 'Est perspiciatis perferendis laudantium similique debitis corrupti eum ducimus.'),
(298, 153, 163, 3, 'Dolor cupiditate consequatur dolorem omnis nostrum quae odit est.'),
(299, 153, 146, 2, 'Dicta dolor neque mollitia vitae.'),
(300, 154, 151, 5, 'Sit ut esse dolores sit laborum ab.'),
(301, 154, 159, 1, 'Impedit est at corporis voluptas laborum doloremque aut voluptatem.'),
(302, 155, 156, 2, 'Cum dolor est aut vel veritatis.'),
(303, 155, 154, 3, 'Eligendi praesentium et dignissimos debitis vitae dolorem.'),
(304, 156, 153, 1, 'Aut iste sint eveniet aut. Temporibus vel qui quae veritatis qui.'),
(305, 157, 152, 1, 'Odit fugit voluptas cupiditate laboriosam quae unde numquam delectus.'),
(306, 157, 156, 1, 'Sunt voluptatem ab commodi et. Alias nihil corrupti ut ipsum natus.'),
(307, 158, 143, 3, 'Consequatur quas quod autem.'),
(308, 158, 156, 2, 'Non consequuntur eum voluptatibus quo aperiam.'),
(309, 159, 149, 1, 'Expedita dolorum asperiores et. Ut deleniti fuga quod in.'),
(310, 159, 160, 3, 'Maxime aspernatur rerum et. Eum nulla placeat vel error impedit quia.'),
(311, 160, 154, 5, 'Dicta consequatur et vel. Vero et exercitationem eos in.'),
(312, 160, 142, 1, 'Nam ea animi amet commodi culpa nemo eum. Adipisci a in voluptatum minima.'),
(313, 161, 150, 2, 'Veniam illum saepe qui consequatur nisi.'),
(314, 161, 159, 4, 'Suscipit molestiae officia qui non laudantium.'),
(315, 162, 159, 1, 'Autem nemo sed fuga quae.'),
(316, 162, 153, 4, 'Enim sunt tempora quasi provident odit. Vel ut impedit eligendi excepturi aut.'),
(317, 163, 149, 4, 'Consequatur quos facere voluptatibus nesciunt qui. Quis dolores vitae ut et.'),
(318, 163, 143, 2, 'Deleniti error minus rerum. Impedit deserunt veritatis fuga molestiae et.'),
(319, 164, 158, 2, 'In illo commodi quo voluptas commodi sint. Assumenda quo dolores repudiandae.'),
(320, 164, 163, 3, 'Doloribus doloribus qui illo voluptates.'),
(321, 165, 159, 4, 'Sit maiores esse ut ut deserunt eius aspernatur.'),
(322, 165, 145, 3, 'Sed voluptatibus eaque magnam architecto ea.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `etno_word_accent`
--
ALTER TABLE `etno_word_accent`
  ADD CONSTRAINT `word_accent_word` FOREIGN KEY (`id_word`) REFERENCES `etno_word` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `etno_word_citation`
--
ALTER TABLE `etno_word_citation`
  ADD CONSTRAINT `citation_region` FOREIGN KEY (`id_region`) REFERENCES `etno_region` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `citation_word` FOREIGN KEY (`id_word`) REFERENCES `etno_word` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `etno_word_etymology`
--
ALTER TABLE `etno_word_etymology`
  ADD CONSTRAINT `etymology_source` FOREIGN KEY (`id_source`) REFERENCES `etno_literary_source` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `etymology_word` FOREIGN KEY (`id_word`) REFERENCES `etno_word` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `etno_word_folklore`
--
ALTER TABLE `etno_word_folklore`
  ADD CONSTRAINT `folklore_folklore` FOREIGN KEY (`id_folklore`) REFERENCES `etno_folklore` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `folklore_region` FOREIGN KEY (`id_region`) REFERENCES `etno_region` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `folklore_word` FOREIGN KEY (`id_word`) REFERENCES `etno_word` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `etno_word_variant`
--
ALTER TABLE `etno_word_variant`
  ADD CONSTRAINT `main_word_variant` FOREIGN KEY (`id_word`) REFERENCES `etno_word` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `other_word_variant` FOREIGN KEY (`id_variant`) REFERENCES `etno_word` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `type_word_variant` FOREIGN KEY (`id_type`) REFERENCES `etno_variant_type` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
