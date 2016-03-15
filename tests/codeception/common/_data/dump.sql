-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2016 at 02:21 PM
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
('m160212_102146_create_word_variants_table', 1457780630);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;

--
-- Dumping data for table `etno_word`
--

INSERT INTO `etno_word` (`id`, `title`) VALUES
(16, 'Sint possimus perspiciatis qui.'),
(17, 'Saepe et et maiores aut aliquam quis.'),
(18, 'Soluta expedita sit vel nam excepturi.'),
(19, 'Et accusantium vitae delectus tempore.'),
(20, 'Non veniam veniam debitis.'),
(21, 'Id itaque quo quod unde qui laborum.'),
(22, 'Sed dolor pariatur illo voluptatem.'),
(23, 'Et ad voluptas dolorem voluptas.'),
(24, 'Et adipisci earum quidem.'),
(25, 'Inventore et atque nisi fugiat.'),
(26, 'Ad voluptatem quia earum occaecati.'),
(27, 'Quo magnam ut iste sequi quae.'),
(28, 'Quod atque omnis sint.'),
(29, 'Aut quia placeat eos et fugiat ratione.'),
(30, 'Beatae numquam sint id non aut.'),
(31, 'Est sed voluptatem dolore quaerat.'),
(32, 'Officia libero molestiae optio ut.'),
(33, 'Possimus perspiciatis animi est.'),
(34, 'Saepe laborum rerum veniam quis.'),
(35, 'Harum qui quia nulla velit quod.'),
(36, 'Et accusantium sit autem voluptas.'),
(37, 'Sunt aspernatur dolor aut non.'),
(38, 'Rem eum dignissimos quos quis dicta ab.'),
(39, 'Omnis commodi quisquam provident est.'),
(40, 'Deserunt ipsum aliquid et laborum.');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=81 ;

--
-- Dumping data for table `etno_word_accent`
--

INSERT INTO `etno_word_accent` (`id`, `id_word`, `accent_position`) VALUES
(31, 16, 13),
(32, 16, 14),
(33, 17, 3),
(34, 17, 31),
(35, 18, 8),
(36, 18, 29),
(38, 19, 11),
(37, 19, 31),
(40, 20, 17),
(39, 20, 24),
(41, 21, 4),
(42, 21, 32),
(43, 22, 13),
(44, 22, 28),
(46, 23, 12),
(45, 23, 24),
(48, 24, 6),
(47, 24, 19),
(49, 25, 3),
(50, 25, 4),
(52, 26, 5),
(51, 26, 6),
(54, 27, 22),
(53, 27, 23),
(55, 28, 3),
(56, 28, 7),
(57, 29, 7),
(58, 29, 30),
(60, 30, 0),
(59, 30, 5),
(62, 31, 11),
(61, 31, 13),
(64, 32, 21),
(63, 32, 30),
(65, 33, 16),
(66, 33, 21),
(68, 34, 17),
(67, 34, 19),
(69, 35, 0),
(70, 35, 28),
(72, 36, 16),
(71, 36, 29),
(73, 37, 11),
(74, 37, 13),
(76, 38, 29),
(75, 38, 31),
(77, 39, 8),
(78, 39, 19),
(79, 40, 0),
(80, 40, 22);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=77 ;

--
-- Dumping data for table `etno_word_variant`
--

INSERT INTO `etno_word_variant` (`id`, `id_word`, `id_variant`, `id_type`, `comment`) VALUES
(28, 16, 24, 4, 'Impedit sit molestias omnis incidunt corporis sed. Sed aut qui est facilis.'),
(29, 16, 38, 2, 'Nostrum sequi dolor aut minus adipisci. Perspiciatis debitis aut commodi.'),
(30, 17, 36, 2, 'Voluptatem soluta voluptatem eius enim beatae debitis libero.'),
(31, 17, 20, 2, 'Officiis non vel facere quis ab.'),
(32, 18, 26, 2, 'Incidunt ut est praesentium aliquid. Laborum nihil est doloremque minus ex.'),
(33, 18, 23, 3, 'Quos quo iure et fugit quaerat et omnis.'),
(34, 19, 16, 3, 'Placeat veritatis aspernatur aut. Architecto ut aliquid natus praesentium unde.'),
(35, 19, 34, 3, 'Neque repudiandae quas nam ratione commodi voluptatem voluptatem quisquam.'),
(36, 20, 34, 4, 'Odio quia at dolores eos voluptatem ullam.'),
(37, 20, 38, 5, 'Similique sit error praesentium ducimus.'),
(38, 21, 27, 1, 'Non velit iure recusandae recusandae est rerum quos.'),
(39, 21, 24, 5, 'Animi magni velit commodi et temporibus sed quos.'),
(40, 22, 28, 3, 'Voluptatibus error vel aut laudantium sint.'),
(41, 22, 22, 5, 'Autem eos deserunt impedit quis qui.'),
(42, 23, 31, 5, 'Similique in aut omnis at quisquam commodi illum soluta.'),
(43, 23, 21, 5, 'Ea consequuntur voluptates earum amet. Aut illum corrupti a non.'),
(44, 24, 32, 1, 'Nesciunt beatae architecto aut aut nostrum eveniet veritatis.'),
(45, 24, 38, 4, 'Ut fugiat consectetur commodi labore quia. In facilis enim cum vero laborum.'),
(46, 25, 16, 5, 'Qui fugit ab repellat error.'),
(47, 25, 17, 2, 'Quae quia voluptatum vero modi fuga consectetur.'),
(48, 26, 16, 4, 'Dolore aut ad cum neque voluptatem qui similique.'),
(49, 26, 36, 1, 'Odio ex natus id quo ad quas in.'),
(50, 27, 18, 4, 'Voluptates et sed quam nisi. Enim non labore dicta fugit.'),
(51, 27, 16, 2, 'Porro quisquam repudiandae tempora voluptas esse aperiam.'),
(52, 28, 17, 5, 'Qui animi explicabo tenetur delectus eveniet ea ea.'),
(53, 28, 26, 1, 'Suscipit cupiditate quo qui repellat distinctio atque ratione voluptatum.'),
(54, 29, 23, 4, 'At ipsum suscipit fuga libero. Non quis molestias quaerat et inventore.'),
(55, 29, 34, 1, 'Est reiciendis impedit non et beatae.'),
(56, 30, 16, 5, 'Sapiente doloremque vitae vitae maxime et.'),
(57, 30, 38, 2, 'Sit qui nulla quia.'),
(58, 31, 39, 1, 'Aperiam repudiandae beatae aperiam qui optio cupiditate vel.'),
(59, 31, 20, 2, 'Hic et tempora vel architecto porro.'),
(60, 32, 19, 1, 'Consequatur eius quia fuga et velit. Reprehenderit eaque sint et fugiat.'),
(61, 32, 26, 3, 'Quis distinctio placeat praesentium voluptatem veniam voluptatum.'),
(62, 33, 27, 5, 'Recusandae et ut iste. Unde vitae tenetur eum quam fugiat quidem cum.'),
(63, 33, 36, 2, 'Odit provident fuga iusto et ut fugiat inventore.'),
(64, 34, 30, 2, 'Perspiciatis officiis minima iure sunt voluptate.'),
(65, 34, 17, 5, 'Dolor necessitatibus ea assumenda odio.'),
(66, 35, 25, 2, 'Ea non suscipit ratione et pariatur consectetur suscipit.'),
(67, 35, 38, 2, 'Inventore maxime dolorem veritatis possimus doloremque sit est qui.'),
(68, 36, 38, 4, 'Aperiam ullam ut omnis atque exercitationem aliquam.'),
(69, 36, 20, 3, 'Et fugit facilis fuga. Porro placeat laborum sint laboriosam autem.'),
(70, 37, 30, 5, 'Officia molestias nisi ut minima. Vel inventore tenetur ut ipsa officiis rerum.'),
(71, 38, 27, 3, 'Modi velit suscipit expedita aut.'),
(72, 38, 21, 1, 'Aut laborum aliquam sunt quos eius vitae sed.'),
(73, 39, 19, 1, 'Blanditiis consequuntur omnis incidunt nulla.'),
(74, 39, 17, 2, 'Saepe veritatis sit dolorum sapiente cumque.'),
(75, 40, 30, 3, 'Explicabo enim dolore et et fugiat.'),
(76, 40, 23, 1, 'Dolorem quia fugiat et ab quia omnis.');

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
