-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2016 at 11:27 AM
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
('m160324_080522_update_word_table', 1458839607),
('m160324_175311_create_region_table', 1459153624),
('m160325_082304_create_citation_table', 1459153625);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=116 ;

--
-- Dumping data for table `etno_word`
--

INSERT INTO `etno_word` (`id`, `title`, `description`) VALUES
(91, 'Voluptatem a autem deserunt inventore.', NULL),
(92, 'Repudiandae velit sunt facere.', NULL),
(93, 'Error odio doloribus ipsam et error.', NULL),
(94, 'Dicta dicta occaecati dolor occaecati.', NULL),
(95, 'Enim ipsam alias qui enim fuga odit.', NULL),
(96, 'Nesciunt eos quo praesentium aliquam.', NULL),
(97, 'Est optio aut laboriosam.', NULL),
(98, 'Aut quia ut repellendus reprehenderit.', NULL),
(99, 'Nulla et nulla aut error.', NULL),
(100, 'Architecto repellat cum qui iusto.', NULL),
(101, 'Qui quis eum minima qui.', NULL),
(102, 'Non vitae ut quia.', NULL),
(103, 'Ipsam et ipsa dolores ut aut in.', NULL),
(104, 'Sunt voluptas dolorem velit itaque.', NULL),
(105, 'Alias dolorem sunt doloribus.', NULL),
(106, 'Sed perspiciatis voluptas et et.', NULL),
(107, 'Quis quia ipsa odio enim non quasi ea.', NULL),
(108, 'Eligendi adipisci aut ipsa quas.', NULL),
(109, 'Eveniet ducimus dolor quidem.', NULL),
(110, 'Ut saepe inventore id soluta quo iste.', NULL),
(111, 'Magni labore eos sit quis itaque.', NULL),
(112, 'Impedit quas corrupti debitis enim.', NULL),
(113, 'Sed eaque dolor maiores ut.', NULL),
(114, 'Voluptatem ea quaerat nesciunt iure ad.', NULL),
(115, 'Quod quis quis consequuntur quas.', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=229 ;

--
-- Dumping data for table `etno_word_accent`
--

INSERT INTO `etno_word_accent` (`id`, `id_word`, `accent_position`) VALUES
(180, 91, 4),
(179, 91, 35),
(182, 92, 15),
(181, 92, 21),
(183, 93, 22),
(184, 93, 23),
(186, 94, 10),
(185, 94, 22),
(187, 95, 9),
(188, 95, 14),
(189, 96, 3),
(190, 96, 17),
(191, 97, 4),
(192, 97, 22),
(194, 98, 1),
(193, 98, 27),
(196, 99, 7),
(195, 99, 13),
(197, 100, 11),
(198, 100, 18),
(199, 101, 5),
(200, 101, 8),
(202, 102, 0),
(201, 102, 10),
(204, 103, 8),
(203, 103, 16),
(206, 104, 22),
(205, 104, 25),
(207, 105, 2),
(208, 105, 3),
(209, 106, 5),
(210, 106, 7),
(211, 107, 1),
(212, 107, 7),
(214, 108, 19),
(213, 108, 27),
(216, 109, 4),
(215, 109, 21),
(218, 110, 14),
(217, 110, 22),
(219, 111, 5),
(220, 111, 14),
(222, 112, 8),
(221, 112, 34),
(223, 113, 8),
(224, 113, 15),
(225, 114, 7),
(226, 114, 26),
(228, 115, 10),
(227, 115, 19);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=224 ;

--
-- Dumping data for table `etno_word_variant`
--

INSERT INTO `etno_word_variant` (`id`, `id_word`, `id_variant`, `id_type`, `comment`) VALUES
(174, 91, 113, 3, 'Autem quae iusto est qui. Sit laborum aut laborum accusamus quibusdam.'),
(175, 91, 115, 4, 'Quia omnis voluptatibus voluptatem harum voluptas quae sint.'),
(176, 92, 98, 3, 'Accusantium laudantium ratione incidunt qui et atque.'),
(177, 92, 103, 3, 'Ratione corrupti molestias at consectetur rerum ipsum.'),
(178, 93, 95, 3, 'Numquam qui repudiandae tempora corporis illum dicta. Est ex qui magnam quae.'),
(179, 93, 105, 4, 'Dolorem adipisci libero doloremque accusamus.'),
(180, 94, 111, 3, 'Suscipit rerum sint non voluptatibus. Amet nesciunt libero sit quia id quo.'),
(181, 94, 113, 3, 'Eveniet illo explicabo exercitationem officia commodi beatae.'),
(182, 95, 95, 3, 'Repellendus omnis in est dicta reprehenderit quis.'),
(183, 95, 115, 5, 'Error consequatur cumque sunt est et vero incidunt.'),
(184, 96, 91, 2, 'Qui voluptatem ratione quod eum repellat et tenetur accusamus.'),
(185, 96, 113, 4, 'Et sed est earum velit.'),
(186, 97, 103, 3, 'Et excepturi sed adipisci quae voluptatem.'),
(187, 97, 114, 4, 'Vitae qui voluptatem et facilis ullam dicta rem voluptas.'),
(188, 98, 95, 3, 'Praesentium eum sit aut quibusdam ullam labore.'),
(189, 98, 112, 3, 'Et et voluptatem voluptatem voluptas sed.'),
(190, 99, 99, 1, 'Odit temporibus harum cumque unde. Corrupti tempora ut quos officia voluptas.'),
(191, 99, 111, 5, 'Neque necessitatibus reiciendis alias iusto nemo.'),
(192, 100, 97, 1, 'Et harum minus quos eum voluptatem officiis placeat.'),
(193, 100, 91, 3, 'Magnam necessitatibus autem magni.'),
(194, 101, 104, 3, 'Officiis aspernatur similique deleniti perspiciatis quibusdam laboriosam.'),
(195, 101, 111, 4, 'Aperiam dolor qui praesentium aliquam. Asperiores unde eligendi et aut.'),
(196, 102, 95, 4, 'Eligendi vero at sit modi. Quasi autem unde est culpa repellendus.'),
(197, 102, 93, 1, 'Nisi voluptatibus ea ut. Alias quibusdam hic atque quaerat.'),
(198, 103, 107, 3, 'Rem alias ut vitae voluptates id. Et harum vitae quidem.'),
(199, 103, 111, 2, 'Deserunt corrupti aperiam voluptatibus.'),
(200, 104, 97, 5, 'Assumenda hic quasi accusantium quas. Voluptatem et ducimus quo aut et vero.'),
(201, 104, 95, 5, 'Ullam quo qui dolores. Numquam quas sed dolorem voluptates porro voluptas vero.'),
(202, 105, 93, 4, 'Eum dolorem itaque aut nesciunt officiis et sed.'),
(203, 105, 101, 5, 'Dolor commodi tempora unde saepe quibusdam. Ut rerum nam autem incidunt.'),
(204, 106, 98, 3, 'Natus aspernatur quo et libero.'),
(205, 106, 105, 3, 'Aut rerum sint eligendi aut in. Impedit pariatur ut a aut eos.'),
(206, 107, 114, 5, 'Sint magnam sit dolor nemo consequuntur.'),
(207, 107, 110, 1, 'Ut fuga eum temporibus quo quasi assumenda corporis.'),
(208, 108, 98, 3, 'In officia delectus in neque voluptates cumque. Sed est fuga et est rem et et.'),
(209, 108, 97, 4, 'Dolor laboriosam porro illum accusamus nihil est omnis.'),
(210, 109, 111, 3, 'Tenetur illum quasi sapiente laboriosam repudiandae et.'),
(211, 109, 103, 1, 'Omnis culpa nemo sit sunt suscipit.'),
(212, 110, 115, 2, 'Et quia voluptatem est repudiandae quia qui ipsum enim.'),
(213, 110, 94, 4, 'Vitae ut deleniti quis necessitatibus rerum necessitatibus neque.'),
(214, 111, 91, 5, 'Dolorem repellat rerum veniam impedit assumenda vitae et sit.'),
(215, 111, 103, 2, 'Omnis ipsa quas aut libero provident nam. Ipsum dolores cum necessitatibus aut.'),
(216, 112, 105, 2, 'Velit placeat adipisci vel id culpa eaque aut.'),
(217, 112, 91, 1, 'Quaerat pariatur asperiores sed dolorem nihil labore et voluptas.'),
(218, 113, 111, 1, 'Voluptatibus ratione et officiis sit harum.'),
(219, 113, 106, 1, 'Qui consequatur eius sint consequatur laboriosam quia eaque.'),
(220, 114, 100, 2, 'Ut amet consequatur ipsa. Dolor ut et rerum facilis.'),
(221, 114, 95, 3, 'Quia est reprehenderit velit et ullam sint. Est magnam ut eveniet.'),
(222, 115, 111, 4, 'Corporis quibusdam at ea eligendi ut a. Sit quibusdam aut aut sequi fugiat.'),
(223, 115, 99, 1, 'Sequi recusandae exercitationem cupiditate ea laudantium.');

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
-- Constraints for table `etno_word_variant`
--
ALTER TABLE `etno_word_variant`
  ADD CONSTRAINT `main_word_variant` FOREIGN KEY (`id_word`) REFERENCES `etno_word` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `other_word_variant` FOREIGN KEY (`id_variant`) REFERENCES `etno_word` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `type_word_variant` FOREIGN KEY (`id_type`) REFERENCES `etno_variant_type` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
