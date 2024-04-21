-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2024 at 09:56 AM
-- Server version: 8.2.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekipa-academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `api__countries`
--

DROP TABLE IF EXISTS `api__countries`;
CREATE TABLE IF NOT EXISTS `api__countries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ba` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api__countries`
--

INSERT INTO `api__countries` (`id`, `name`, `name_ba`, `code`, `flag`, `phone_code`, `used`, `created_at`, `updated_at`) VALUES
(1, 'Albania', 'Albanija', 'AL', 'https://media-2.api-sports.io/flags/al.svg', '+355', 1, '2023-06-11 12:05:30', '2024-01-16 09:18:00'),
(2, 'Algeria', 'Alžir', 'DZ', 'https://media-1.api-sports.io/flags/dz.svg', '+213', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(3, 'Andorra', 'Andora', 'AD', 'https://media-3.api-sports.io/flags/ad.svg', '+376', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(4, 'Angola', 'Angola', 'AO', 'https://media-1.api-sports.io/flags/ao.svg', '+244', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(5, 'Argentina', 'Argentina', 'AR', 'https://media-2.api-sports.io/flags/ar.svg', '+54', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(6, 'Armenia', 'Armenia', 'AM', 'https://media-3.api-sports.io/flags/am.svg', '+374', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(7, 'Aruba', 'Aruba', 'AW', 'https://media-3.api-sports.io/flags/aw.svg', '+297', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(8, 'Australia', 'Australija', 'AU', 'https://media-3.api-sports.io/flags/au.svg', '+61', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(9, 'Austria', 'Austrija', 'AT', 'https://media-2.api-sports.io/flags/at.svg', '+43', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(10, 'Azerbaidjan', 'Azerbejdžan', 'AZ', 'https://media-2.api-sports.io/flags/az.svg', '+994', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(11, 'Bahrain', 'Bahrein', 'BH', 'https://media-3.api-sports.io/flags/bh.svg', '+973', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(12, 'Bangladesh', 'Bangladeš', 'BD', 'https://media-3.api-sports.io/flags/bd.svg', '+880', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(13, 'Barbados', 'Barbados', 'BB', 'https://media-3.api-sports.io/flags/bb.svg', '+1-246', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(14, 'Belarus', 'Bjelorusija', 'BY', 'https://media-3.api-sports.io/flags/by.svg', '+375', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(15, 'Belgium', 'Belgija', 'BE', 'https://media-2.api-sports.io/flags/be.svg', '+32', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(16, 'Belize', 'Belize', 'BZ', 'https://media-2.api-sports.io/flags/bz.svg', '+501', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(17, 'Benin', 'Benin', 'BJ', 'https://media-2.api-sports.io/flags/bj.svg', '+229', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(18, 'Bermuda', 'Bermuda', 'BM', 'https://media-1.api-sports.io/flags/bm.svg', '+1-441', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(19, 'Bhutan', 'Butan', 'BT', 'https://media-2.api-sports.io/flags/bt.svg', '+975', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(20, 'Bolivia', 'Bolivija', 'BO', 'https://media-3.api-sports.io/flags/bo.svg', '+591', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(21, 'Bosnia', 'Bosna i Hercegovina', 'BA', 'https://media-1.api-sports.io/flags/ba.svg', '387', 1, '2023-06-11 12:05:30', '2023-12-10 11:14:22'),
(22, 'Botswana', 'Bocvana', 'BW', 'https://media-2.api-sports.io/flags/bw.svg', '+267', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(23, 'Brazil', 'Brazil', 'BR', 'https://media-2.api-sports.io/flags/br.svg', '+55', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(24, 'Bulgaria', 'Bugarska', 'BG', 'https://media-2.api-sports.io/flags/bg.svg', '+359', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(25, 'Burkina-Faso', 'Burkina Faso', 'BF', 'https://media-3.api-sports.io/flags/bf.svg', '+226', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(26, 'Burundi', 'Burundi', 'BI', 'https://media-3.api-sports.io/flags/bi.svg', '+257', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(27, 'Cambodia', 'Kambodža', 'KH', 'https://media-2.api-sports.io/flags/kh.svg', '+855', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(28, 'Cameroon', 'Kamerun', 'CM', 'https://media-3.api-sports.io/flags/cm.svg', '+237', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(29, 'Canada', 'Kanada', 'CA', 'https://media-2.api-sports.io/flags/ca.svg', '+1', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(30, 'Chile', 'Čile', 'CL', 'https://media-3.api-sports.io/flags/cl.svg', '+56', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(31, 'China', 'Kina', 'CN', 'https://media-2.api-sports.io/flags/cn.svg', '+86', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(32, 'Chinese-Taipei', 'Tajvan', 'TW', 'https://media-1.api-sports.io/flags/tw.svg', '+886', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(33, 'Colombia', 'Kolumbija', 'CO', 'https://media-1.api-sports.io/flags/co.svg', '+57', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(34, 'Congo', 'Demokratska Republika Kongo', 'CD', 'https://media-3.api-sports.io/flags/cd.svg', '+243', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(35, 'Congo-DR', 'Demokratska Republika Kongo', 'CG', 'https://media-1.api-sports.io/flags/cg.svg', '+243', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(36, 'Costa-Rica', 'Kostarika', 'CR', 'https://media-2.api-sports.io/flags/cr.svg', '+506', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(37, 'Crimea', 'Krim', 'UA', 'https://media-3.api-sports.io/flags/ua.svg', '+380', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(38, 'Croatia', 'Hrvatska', 'HR', 'https://media-2.api-sports.io/flags/hr.svg', '+385', 1, '2023-06-11 12:05:30', '2023-12-17 12:39:07'),
(39, 'Cuba', 'Kuba', 'CU', 'https://media-2.api-sports.io/flags/cu.svg', '+53', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(40, 'Curacao', 'Kurasao', 'CW', 'https://media-3.api-sports.io/flags/cw.svg', '+599', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(41, 'Cyprus', 'Kipar', 'CY', 'https://media-3.api-sports.io/flags/cy.svg', '+357', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(42, 'Czech-Republic', 'Češka', 'CZ', 'https://media-3.api-sports.io/flags/cz.svg', '+420', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(43, 'Denmark', 'Danska', 'DK', 'https://media-1.api-sports.io/flags/dk.svg', '+45', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(44, 'Dominican-Republic', 'Dominikanska Republika', 'DO', 'https://media-1.api-sports.io/flags/do.svg', '+1-809', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(45, 'Ecuador', 'Ekvador', 'EC', 'https://media-3.api-sports.io/flags/ec.svg', '+593', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(46, 'Egypt', 'Egipat', 'EG', 'https://media-3.api-sports.io/flags/eg.svg', '+20', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(47, 'El-Salvador', 'Salvador', 'SV', 'https://media-1.api-sports.io/flags/sv.svg', '+503', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(48, 'England', 'Velika Britanija', 'GB', 'https://media-3.api-sports.io/flags/gb.svg', '+44', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(49, 'Estonia', 'Estonija', 'EE', 'https://media-1.api-sports.io/flags/ee.svg', '+372', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(50, 'Eswatini', 'Svazilend', 'SZ', 'https://media-1.api-sports.io/flags/sz.svg', '+268', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(51, 'Ethiopia', 'Etiopija', 'ET', 'https://media-3.api-sports.io/flags/et.svg', '+251', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(52, 'Faroe-Islands', 'Frska Ostrva', 'FO', 'https://media-3.api-sports.io/flags/fo.svg', '+298', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(53, 'Fiji', 'Fidži', 'FJ', 'https://media-2.api-sports.io/flags/fj.svg', '+679', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(54, 'Finland', 'Finska', 'FI', 'https://media-1.api-sports.io/flags/fi.svg', '+358', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(55, 'France', 'Francuska', 'FR', 'https://media-3.api-sports.io/flags/fr.svg', '+33', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(56, 'Gabon', 'Gabon', 'GA', 'https://media-3.api-sports.io/flags/ga.svg', '+241', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(57, 'Gambia', 'Gambija', 'GM', 'https://media-1.api-sports.io/flags/gm.svg', '+220', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(58, 'Georgia', 'Gruzija', 'GE', 'https://media-2.api-sports.io/flags/ge.svg', '+995', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(59, 'Germany', 'Njemačka', 'DE', 'https://media-3.api-sports.io/flags/de.svg', '+49', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(60, 'Ghana', 'Gana', 'GH', 'https://media-1.api-sports.io/flags/gh.svg', '+233', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(61, 'Gibraltar', 'Gibraltar', 'GI', 'https://media-1.api-sports.io/flags/gi.svg', '+350', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(62, 'Greece', 'Grčka', 'GR', 'https://media-1.api-sports.io/flags/gr.svg', '+30', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(63, 'Guadeloupe', 'Gvadalupe', 'GP', 'https://media-3.api-sports.io/flags/gp.svg', '+590', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(64, 'Guatemala', 'Gvatemala', 'GT', 'https://media-1.api-sports.io/flags/gt.svg', '+502', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(65, 'Guinea', 'Gvineja', 'GN', 'https://media-3.api-sports.io/flags/gn.svg', '+224', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(66, 'Haiti', 'Haiti', 'HT', 'https://media-1.api-sports.io/flags/ht.svg', '+509\n', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(67, 'Honduras', 'Honduras', 'HN', 'https://media-2.api-sports.io/flags/hn.svg', '+504', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(68, 'Hong-Kong', 'Hong Kong', 'HK', 'https://media-2.api-sports.io/flags/hk.svg', '+852', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(69, 'Hungary', 'Mađarska', 'HU', 'https://media-3.api-sports.io/flags/hu.svg', '+36', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(70, 'Iceland', 'Island', 'IS', 'https://media-1.api-sports.io/flags/is.svg', '+354', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(71, 'India', 'Indija', 'IN', 'https://media-3.api-sports.io/flags/in.svg', '+91', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(72, 'Indonesia', 'Indonezija', 'ID', 'https://media-1.api-sports.io/flags/id.svg', '+62', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(73, 'Iran', 'Iran', 'IR', 'https://media-2.api-sports.io/flags/ir.svg', '+98', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(74, 'Iraq', 'Irak', 'IQ', 'https://media-2.api-sports.io/flags/iq.svg', '+964', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(75, 'Ireland', 'Irska', 'IE', 'https://media-3.api-sports.io/flags/ie.svg', '+353', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(76, 'Israel', 'Izrael', 'IL', 'https://media-2.api-sports.io/flags/il.svg', '+972', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(77, 'Italy', 'Italija', 'IT', 'https://media-1.api-sports.io/flags/it.svg', '+39', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(78, 'Ivory-Coast', 'Obala Slonovače', 'CI', 'https://media-2.api-sports.io/flags/ci.svg', '+225', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(79, 'Jamaica', 'Jamajka', 'JM', 'https://media-2.api-sports.io/flags/jm.svg', '+1-876', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(80, 'Japan', 'Japan', 'JP', 'https://media-1.api-sports.io/flags/jp.svg', '+81', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(81, 'Jordan', 'Jordan', 'JO', 'https://media-2.api-sports.io/flags/jo.svg', '+962', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(82, 'Kazakhstan', 'Kazahstan', 'KZ', 'https://media-3.api-sports.io/flags/kz.svg', '+7', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(83, 'Kenya', 'Kenija', 'KE', 'https://media-1.api-sports.io/flags/ke.svg', '+254', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(84, 'Kosovo', 'Kosovo', 'XK', 'https://media-3.api-sports.io/flags/xk.svg', '+383', 1, '2023-06-11 12:05:30', '2023-12-17 12:41:21'),
(85, 'Kuwait', 'Kuvajt', 'KW', 'https://media-1.api-sports.io/flags/kw.svg', '+965', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(86, 'Kyrgyzstan', 'Kirgistan', 'KG', 'https://media-3.api-sports.io/flags/kg.svg', '+996', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(87, 'Laos', 'Laos', 'LA', 'https://media-2.api-sports.io/flags/la.svg', '+856', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(88, 'Latvia', 'Latvija', 'LV', 'https://media-2.api-sports.io/flags/lv.svg', '+371', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(89, 'Lebanon', 'Liban', 'LB', 'https://media-1.api-sports.io/flags/lb.svg', '+961', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(90, 'Lesotho', 'Lesoto', 'LS', 'https://media-3.api-sports.io/flags/ls.svg', '+266', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(91, 'Liberia', 'Liberija', 'LR', 'https://media-3.api-sports.io/flags/lr.svg', '+231', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(92, 'Libya', 'Libija', 'LY', 'https://media-2.api-sports.io/flags/ly.svg', '+218', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(93, 'Liechtenstein', 'Lihtenštajn', 'LI', 'https://media-1.api-sports.io/flags/li.svg', '+423', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(94, 'Lithuania', 'Litvanija', 'LT', 'https://media-3.api-sports.io/flags/lt.svg', '+370', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(95, 'Luxembourg', 'Luksemburg', 'LU', 'https://media-3.api-sports.io/flags/lu.svg', '+352', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(96, 'Macao', 'Makao', 'MO', 'https://media-3.api-sports.io/flags/mo.svg', '+853', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(97, 'Macedonia', 'Makedonija', 'MK', 'https://media-3.api-sports.io/flags/mk.svg', '+389', 1, '2023-06-11 12:05:30', '2023-12-17 12:41:02'),
(98, 'Malawi', 'Malavi', 'MW', 'https://media-1.api-sports.io/flags/mw.svg', '+265', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(99, 'Malaysia', 'Malezija', 'MY', 'https://media-1.api-sports.io/flags/my.svg', '+60', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(100, 'Maldives', 'Maldivi', 'MV', 'https://media-3.api-sports.io/flags/mv.svg', '+960', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(101, 'Mali', 'Mali', 'ML', 'https://media-2.api-sports.io/flags/ml.svg', '+223', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(102, 'Malta', 'Malta', 'MT', 'https://media-2.api-sports.io/flags/mt.svg', '+356', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(103, 'Mauritania', 'Mauritanija', 'MR', 'https://media-1.api-sports.io/flags/mr.svg', '+222', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(104, 'Mauritius', 'Mauricijus', 'MU', 'https://media-3.api-sports.io/flags/mu.svg', '+230', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(105, 'Mexico', 'Meksiko', 'MX', 'https://media-2.api-sports.io/flags/mx.svg', '+52', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(106, 'Moldova', 'Moldavija', 'MD', 'https://media-3.api-sports.io/flags/md.svg', '+373', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(107, 'Mongolia', 'Mongolija', 'MN', 'https://media-1.api-sports.io/flags/mn.svg', '+976', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(108, 'Montenegro', 'Crna Gora', 'ME', 'https://media-3.api-sports.io/flags/me.svg', '+382', 1, '2023-06-11 12:05:30', '2023-12-17 12:40:49'),
(109, 'Morocco', 'Maroko', 'MA', 'https://media-2.api-sports.io/flags/ma.svg', '+212', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(110, 'Myanmar', 'Mijanmar', 'MM', 'https://media-2.api-sports.io/flags/mm.svg', '+95', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(111, 'Namibia', 'Namibija', 'NA', 'https://media-2.api-sports.io/flags/na.svg', '+264', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(112, 'Nepal', 'Nepal', 'NP', 'https://media-2.api-sports.io/flags/np.svg', '+977', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(113, 'Netherlands', 'Holandija', 'NL', 'https://media-1.api-sports.io/flags/nl.svg', '+31', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(114, 'New-Zealand', 'Novi Zeland', 'NZ', 'https://media-3.api-sports.io/flags/nz.svg', '+64', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(115, 'Nicaragua', 'Nikaragva', 'NI', 'https://media-2.api-sports.io/flags/ni.svg', '+505', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(116, 'Nigeria', 'Nigerija', 'NG', 'https://media-1.api-sports.io/flags/ng.svg', '+234', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(117, 'Norway', 'Norveška', 'NO', 'https://media-1.api-sports.io/flags/no.svg', '+47', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(118, 'Oman', 'Oman', 'OM', 'https://media-1.api-sports.io/flags/om.svg', '+968', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(119, 'Pakistan', 'Pakistan', 'PK', 'https://media-1.api-sports.io/flags/pk.svg', '+92', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(120, 'Palestine', 'Palestina', 'PS', 'https://media-1.api-sports.io/flags/ps.svg', '+970', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(121, 'Panama', 'Panama', 'PA', 'https://media-2.api-sports.io/flags/pa.svg', '+507', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(122, 'Paraguay', 'Paragvaj', 'PY', 'https://media-2.api-sports.io/flags/py.svg', '+595', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(123, 'Peru', 'Peru', 'PE', 'https://media-3.api-sports.io/flags/pe.svg', '+51', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(124, 'Philippines', 'Filipini', 'PH', 'https://media-2.api-sports.io/flags/ph.svg', '+63', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(125, 'Poland', 'Poljska', 'PL', 'https://media-2.api-sports.io/flags/pl.svg', '+48', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(126, 'Portugal', 'Portugal', 'PT', 'https://media-3.api-sports.io/flags/pt.svg', '+351', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(127, 'Qatar', 'Katar', 'QA', 'https://media-3.api-sports.io/flags/qa.svg', '+974', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(128, 'Romania', 'Rumunija', 'RO', 'https://media-3.api-sports.io/flags/ro.svg', '+40', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(129, 'Russia', 'Rusija', 'RU', 'https://media-3.api-sports.io/flags/ru.svg', '+7', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(130, 'Rwanda', 'Ruanda', 'RW', 'https://media-2.api-sports.io/flags/rw.svg', '+250', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(131, 'San-Marino', 'San Marino', 'SM', 'https://media-1.api-sports.io/flags/sm.svg', '+378', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(132, 'Saudi-Arabia', 'Saudijska Arabija', 'SA', 'https://media-2.api-sports.io/flags/sa.svg', '+966', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(133, 'Senegal', 'Senegal', 'SN', 'https://media-2.api-sports.io/flags/sn.svg', '+221', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(134, 'Serbia', 'Srbija', 'RS', 'https://media-2.api-sports.io/flags/rs.svg', '+381', 1, '2023-06-11 12:05:30', '2023-12-17 12:40:40'),
(135, 'Singapore', 'Singapur', 'SG', 'https://media-2.api-sports.io/flags/sg.svg', '+65', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(136, 'Slovakia', 'Slovačka', 'SK', 'https://media-3.api-sports.io/flags/sk.svg', '+421', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(137, 'Slovenia', 'Slovenija', 'SI', 'https://media-2.api-sports.io/flags/si.svg', '+386', 1, '2023-06-11 12:05:30', '2023-12-17 12:41:13'),
(138, 'Somalia', 'Somalija', 'SO', 'https://media-1.api-sports.io/flags/so.svg', '+252', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(139, 'South-Africa', 'Južnoafrička Republika', 'ZA', 'https://media-3.api-sports.io/flags/za.svg', '+27', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(140, 'South-Korea', 'Južna Koreja', 'KR', 'https://media-1.api-sports.io/flags/kr.svg', '+82', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(141, 'Spain', 'Španija', 'ES', 'https://media-3.api-sports.io/flags/es.svg', '+34', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(142, 'Sudan', 'Sudan', 'SD', 'https://media-2.api-sports.io/flags/sd.svg', '+249', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(143, 'Surinam', 'Surinam', 'SR', 'https://media-1.api-sports.io/flags/sr.svg', '+597', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(144, 'Sweden', 'Švedska', 'SE', 'https://media-3.api-sports.io/flags/se.svg', '+46', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(145, 'Switzerland', 'Švicarska', 'CH', 'https://media-1.api-sports.io/flags/ch.svg', '+41', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(146, 'Syria', 'Sirija', 'SY', 'https://media-3.api-sports.io/flags/sy.svg', '+963', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(147, 'Tajikistan', 'Tadžikistan', 'TJ', 'https://media-2.api-sports.io/flags/tj.svg', '+992', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(148, 'Tanzania', 'Tanzanija', 'TZ', 'https://media-1.api-sports.io/flags/tz.svg', '+255', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(149, 'Thailand', 'Tajland', 'TH', 'https://media-2.api-sports.io/flags/th.svg', '+66', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(150, 'Trinidad-And-Tobago', 'Trinidad i Tobago', 'TT', 'https://media-2.api-sports.io/flags/tt.svg', '+1-868', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(151, 'Tunisia', 'Tunis', 'TN', 'https://media-1.api-sports.io/flags/tn.svg', '+216', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(152, 'Turkey', 'Turska', 'TR', 'https://media-3.api-sports.io/flags/tr.svg', '+90', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(153, 'Turkmenistan', 'Turkmenistan', 'TM', 'https://media-2.api-sports.io/flags/tm.svg', '+993', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(154, 'Uganda', 'Uganda', 'UG', 'https://media-2.api-sports.io/flags/ug.svg', '+256', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(155, 'United-Arab-Emirates', 'Ujedinjeni Arapski Emirati', 'AE', 'https://media-3.api-sports.io/flags/ae.svg', '+971', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(156, 'Uruguay', 'Urugvaj', 'UY', 'https://media-3.api-sports.io/flags/uy.svg', '+598', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(157, 'USA', 'Sjedinjene Američke Države', 'US', 'https://media-3.api-sports.io/flags/us.svg', '+1', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(158, 'Uzbekistan', 'Uzbekistan', 'UZ', 'https://media-2.api-sports.io/flags/uz.svg', '+998', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(159, 'Venezuela', 'Venecuela', 'VE', 'https://media-2.api-sports.io/flags/ve.svg', '+58', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(160, 'Vietnam', 'Vijetnam', 'VN', 'https://media-1.api-sports.io/flags/vn.svg', '+84', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(161, 'Zambia', 'Zambija', 'ZM', 'https://media-3.api-sports.io/flags/zm.svg', '+260', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(162, 'Zimbabwe', 'Zimbabve', 'ZW', 'https://media-2.api-sports.io/flags/zw.svg', '+263', 0, '2023-06-11 12:05:30', '2023-06-11 12:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `main_img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_three` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `short_desc`, `description`, `category`, `created_by`, `published`, `main_img`, `img_one`, `img_two`, `img_three`, `created_at`, `updated_at`) VALUES
(4, 'Edo Maajka - masterclass', 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'What is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\n\nWhere does it come from?\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32\n\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 0, 2, 1, '40', '25', '26', '27', '2024-04-20 19:47:11', '2024-04-21 07:26:23'),
(3, 'JUS project na hnta', 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'What is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\n\nWhere does it come from?\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32\n\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 0, 2, 1, '39', '25', '26', '27', '2024-04-20 19:47:11', '2024-04-21 07:25:57'),
(12, 'test7 sadsadsadsa', 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 0, 2, 0, '39', '25', '26', '27', '2024-04-20 19:47:11', '2024-04-21 06:16:19'),
(5, 'Ide ide ide mi sve', 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 3, 2, 0, '41', '25', '26', '27', '2024-04-20 19:47:11', '2024-04-21 07:26:35'),
(6, 'Kad bih bio ranjen', 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 2, 2, 0, '42', '25', '26', '27', '2024-04-20 19:47:11', '2024-04-21 07:26:43'),
(7, 'test 3', 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 5, 2, 0, '43', '25', '26', '27', '2024-04-20 19:47:11', '2024-04-21 07:26:54'),
(8, 'test 4', 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 4, 2, 0, '44', '25', '26', '27', '2024-04-20 19:47:11', '2024-04-21 07:27:03'),
(9, 'test 5', 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 3, 2, 0, '45', '25', '26', '27', '2024-04-20 19:47:11', '2024-04-21 07:27:11'),
(10, 'test 6', 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 2, 2, 0, '46', '25', '26', '27', '2024-04-20 19:47:11', '2024-04-21 07:27:19'),
(11, 'test7 ', 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 1, 2, 0, '47', '25', '26', '27', '2024-04-20 19:47:11', '2024-04-21 07:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `blog__galery`
--

DROP TABLE IF EXISTS `blog__galery`;
CREATE TABLE IF NOT EXISTS `blog__galery` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_id` bigint UNSIGNED NOT NULL,
  `file_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog__galery_blog_id_foreign` (`blog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog__galery`
--

INSERT INTO `blog__galery` (`id`, `blog_id`, `file_id`, `created_at`, `updated_at`) VALUES
(7, 3, 29, '2024-04-21 06:43:11', '2024-04-21 06:43:11'),
(6, 3, 28, '2024-04-21 06:43:07', '2024-04-21 06:43:07'),
(14, 3, 36, '2024-04-21 06:43:42', '2024-04-21 06:43:42'),
(13, 3, 35, '2024-04-21 06:43:34', '2024-04-21 06:43:34'),
(16, 3, 38, '2024-04-21 06:44:04', '2024-04-21 06:44:04'),
(11, 3, 33, '2024-04-21 06:43:23', '2024-04-21 06:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 3),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_10_205641_create_sessions_table', 2),
(7, '2024_04_17_190708___locations', 4),
(8, '2024_04_18_114511___files', 5),
(9, '2024_04_18_113607___programs', 6),
(10, '2024_04_18_113705___programs__sessions', 6),
(11, '2024_04_18_113721___programs__sessions_files', 6),
(14, '2024_04_18_113735___programs__sessions_attendees', 7),
(13, '2024_04_18_113744___programs__sessions_notes', 6),
(15, '2024_04_18_193915___single_pages', 8),
(16, '2024_04_20_071257___faqs', 9),
(17, '2024_04_20_120227___inbox', 10),
(18, '2024_04_20_120557___inbox__to', 10),
(19, '2024_04_20_205725_blog', 11),
(20, '2024_04_20_205923_blog__galery', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('john@doe.com', '28210a60e0b88a803f1154b827fc479b', '2024-04-08 17:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
CREATE TABLE IF NOT EXISTS `programs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `title`, `description`, `image_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pisanje za 21. Stoljeće', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. \n\nLorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 10, '2024-04-18 14:37:07', '2024-04-20 08:32:37', NULL),
(2, 'Novinarstvo i društvene mreže', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 11, '2024-04-18 16:02:05', '2024-04-20 07:57:13', NULL),
(3, 'Primijenjena muzička produkcija', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 12, '2024-04-18 16:02:12', '2024-04-20 07:57:21', NULL),
(4, 'Odgovorno kodiranje i Civic Tech', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 13, '2024-04-18 16:02:21', '2024-04-20 07:58:19', NULL),
(5, 'Grafički dizajn i animacija', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 14, '2024-04-18 16:02:33', '2024-04-20 07:58:28', NULL),
(6, 'Angažovani rad i kritičko razmišljanje', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, '2024-04-18 16:02:43', '2024-04-18 16:02:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programs__sessions`
--

DROP TABLE IF EXISTS `programs__sessions`;
CREATE TABLE IF NOT EXISTS `programs__sessions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `program_id` bigint UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'workshop',
  `time_from` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_to` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `location_id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `presenter_id` bigint UNSIGNED NOT NULL,
  `presenter_data` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `programs__sessions_program_id_foreign` (`program_id`),
  KEY `programs__sessions_location_id_foreign` (`location_id`),
  KEY `programs__sessions_presenter_id_foreign` (`presenter_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs__sessions`
--

INSERT INTO `programs__sessions` (`id`, `program_id`, `title`, `type`, `time_from`, `time_to`, `duration`, `date`, `location_id`, `description`, `presenter_id`, `presenter_data`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Kompozicija elektronske muzike', 'workshop', '12:00', '13:30', '90', '2024-08-02', 2, 'Test', 3, NULL, '2024-04-18 14:46:43', '2024-04-20 06:22:58', NULL),
(2, 1, 'Sinteza zvuka  savremena umjetnička muzika', 'workshop', '09:30', '12:00', '150', '2024-08-02', 2, 'Test', 3, 'Test !', '2024-04-18 15:43:41', '2024-04-20 07:04:05', NULL),
(3, 1, 'Kompozicija elektronske muzike', 'workshop', '12:00', '13:30', '90', '2024-08-02', 2, 'Test', 1, 'Heeey there !', '2024-04-18 15:44:57', '2024-04-20 13:05:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programs__sessions_attendees`
--

DROP TABLE IF EXISTS `programs__sessions_attendees`;
CREATE TABLE IF NOT EXISTS `programs__sessions_attendees` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `program_id` bigint UNSIGNED NOT NULL,
  `attendee_id` bigint UNSIGNED NOT NULL,
  `app_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in_queue',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `programs__sessions_attendees_program_id_foreign` (`program_id`),
  KEY `programs__sessions_attendees_attendee_id_foreign` (`attendee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs__sessions_files`
--

DROP TABLE IF EXISTS `programs__sessions_files`;
CREATE TABLE IF NOT EXISTS `programs__sessions_files` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `session_id` bigint UNSIGNED NOT NULL,
  `file_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `programs__sessions_files_session_id_foreign` (`session_id`),
  KEY `programs__sessions_files_file_id_foreign` (`file_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs__sessions_files`
--

INSERT INTO `programs__sessions_files` (`id`, `session_id`, `file_id`, `created_at`, `updated_at`) VALUES
(2, 1, 3, '2024-04-18 15:03:59', '2024-04-18 15:03:59'),
(4, 1, 5, '2024-04-18 15:12:33', '2024-04-18 15:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `programs__sessions_notes`
--

DROP TABLE IF EXISTS `programs__sessions_notes`;
CREATE TABLE IF NOT EXISTS `programs__sessions_notes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `attendee_id` bigint UNSIGNED NOT NULL,
  `session_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `programs__sessions_notes_attendee_id_foreign` (`attendee_id`),
  KEY `programs__sessions_notes_session_id_foreign` (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('v4OZkrhqeGP6vGUPrSMHKG6VWOaxF4LA7NxveCFa', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSTdTSGJ6OWoyV3lVZnBQQm9KUmVkNFBmOXUzRnFSVlI4ZzJWRUx5TyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0OToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3N5c3RlbS9hZG1pbi9ibG9nL3ByZXZpZXcvMyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYmxvZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1713693332),
('SyDjU9L23txnMPUA5Hx30HfEKw7zgF2ieMzZhBqU', NULL, '192.168.0.22', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.2 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUUhZZXR0Z0hTZnJ2YkVHbU1BdlJMNUYwdjhEQXdHZTVlUkszYkp4ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xOTIuMTY4LjAuMTE6ODAwMC9ibG9nL3ByZXZpZXcvMTAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1713693320);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` int NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `photo_uri` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presenter_role` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `api_token`, `remember_token`, `role`, `phone`, `birth_date`, `address`, `city`, `country`, `about`, `photo_uri`, `instagram`, `facebook`, `twitter`, `linkedin`, `web`, `title`, `institution`, `presenter_role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'John Doe', 'john-doe', 'john@doe.com', '2024-04-16 19:22:32', '$2y$12$jHBo2a5v9xW7dOUscZ836.j1LMLH3sj1kzUP5pDeB8L3S1p1E.Jl.', '6a3f778af7cdd7e3beee12884d6b8dabd33dad476dc8bb9e1f1fd9574dd895c0', NULL, 'presenter', '38761225883', '2020-01-20', 'Jonhs address', 'New York', 21, 'Eee easa', 'f0dfb2bce24c000f00b70554c7dffb4d.png', 'ii', 'aa', 'https://twitter.com/i/flow/login?redirect_after_login=%2Fvbetocv', 'https://ba.linkedin.com/', 'https://alkaris.com/', 'software engineer', NULL, NULL, '2024-04-16 17:22:25', '2024-04-20 13:00:55', NULL),
(2, 'Aladin Kapić', 'aladin-kapic', 'aladin.kapic@alkaris.com', NULL, '$2y$12$fcMO1NXQyrq.GuBHNzTw5.JbQ7OT36QE5Yx1b2L/icVV8waSJUeCO', '15c870a5723bdcb6c434c32cfe423de814608cdfbd1b5339da6c9ddc96170a96', NULL, 'admin', '38761683449', '2024-04-17', 'sadsa', 'dsad', 1, NULL, 'a7fda60f5b243942b9f0e782c442ed61.png', NULL, NULL, NULL, NULL, NULL, '', '', NULL, '2024-04-17 14:54:21', '2024-04-18 16:11:10', NULL),
(3, 'Admira Kerić', 'admira-keric', 'admira@keric.ba', '2024-04-16 19:22:32', '$2y$12$jHBo2a5v9xW7dOUscZ836.j1LMLH3sj1kzUP5pDeB8L3S1p1E.Jl.', '6a3f778af7cdd7e3beee12884d6b8dabd33dad476dc8bb9e1f1fd9574dd895c0', NULL, 'presenter', '38761225883', '2020-01-20', 'Jonhs address', 'New York', 21, 'Eee easa', '314cf5bb061941128ed8b56fb6a845ec.png', 'ii', 'aa', 'ee', NULL, 'cc', 'dipl. in', 'ADSFBiH', NULL, '2024-04-16 17:22:25', '2024-04-20 12:56:54', NULL),
(4, 'Murat Đulin', 'murat-dulin', 'murat@gmail.com', NULL, '$2y$12$wTzz416P8uKA0leAcZ4tNuQ5Gfzof2xSZcl7/pgdicd5ON5zpC21u', 'b96d53fa0c1cbb34670ac294d69a5bf42c468a39d686e1b3f9e1edd8e48081b4', NULL, 'user', '38762225885', '1953-08-24', 'Kapići br. 17', 'Cazin', 21, NULL, '272ee2a46def6fceca86f0c677408ecc.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-20 07:59:55', '2024-04-20 08:00:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `__faqs`
--

DROP TABLE IF EXISTS `__faqs`;
CREATE TABLE IF NOT EXISTS `__faqs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `what` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `__faqs`
--

INSERT INTO `__faqs` (`id`, `title`, `description`, `what`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test sad dsa', 'sadsasa dsa dsa dsa', 3, '2024-04-20 05:52:25', '2024-04-20 05:55:55', NULL),
(2, 'sadsa', 'sad sadsa', 0, '2024-04-20 05:58:28', '2024-04-20 05:58:28', NULL),
(3, '213ssad asd', 'sa dsa das das', 0, '2024-04-20 05:58:32', '2024-04-20 05:58:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `__files`
--

DROP TABLE IF EXISTS `__files`;
CREATE TABLE IF NOT EXISTS `__files` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img',
  `path` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `__files`
--

INSERT INTO `__files` (`id`, `file`, `name`, `ext`, `type`, `path`, `created_at`, `updated_at`) VALUES
(5, 'COLORS API.xlsx', '3f7417fd1ffacb01408c848667ca5434.xlsx', 'xlsx', 'session_file', 'files/programs/sessions', '2024-04-18 15:12:33', '2024-04-18 15:12:33'),
(3, 'aladeen.jpg', '87e30c03693c342be6afeca16740682f.jpg', 'jpg', 'session_file', 'files/programs/sessions', '2024-04-18 15:03:59', '2024-04-18 15:03:59'),
(4, 'COLORS API.xlsx', '87ca4ec0e94e92fb0067bc58a5959038.xlsx', 'xlsx', 'session_file', 'files/programs/sessions', '2024-04-18 15:04:12', '2024-04-18 15:04:12'),
(6, 'frame_.png', 'b1e693ec106347b7975bea1871855a58.png', 'png', 'program_file', 'files/programs', '2024-04-18 16:13:22', '2024-04-18 16:13:22'),
(7, 'frame_.png', '4ef3213116e141f3f9826063b6765cad.png', 'png', 'program_file', 'files/programs', '2024-04-18 16:13:58', '2024-04-18 16:13:58'),
(8, 'frame_.png', 'f07cafefb054c433e93ff6b126682def.png', 'png', 'program_file', 'files/images/single-pages/', '2024-04-18 17:55:45', '2024-04-18 17:55:45'),
(9, 'ae3e8fcc063c51dbedb1e82c0a5b9fa2.jpeg', 'e05c4457354245cd096d54101ae150d5.jpeg', 'jpeg', 'program_file', 'files/images/single-pages/', '2024-04-18 17:57:16', '2024-04-18 17:57:16'),
(10, 'pisanje.svg', 'be00397c09983a650e3bc7a7c6843205.svg', 'svg', 'program_file', 'files/programs', '2024-04-20 07:56:42', '2024-04-20 07:56:42'),
(11, 'novinarstvo.svg', '5ec33edf47e80ae9ec99497ac2b73e28.svg', 'svg', 'program_file', 'files/programs', '2024-04-20 07:57:13', '2024-04-20 07:57:13'),
(12, 'muzika.svg', '8316ec3d104ca056b59ce5489e90de1c.svg', 'svg', 'program_file', 'files/programs', '2024-04-20 07:57:21', '2024-04-20 07:57:21'),
(13, 'kodiranje.svg', '40cd50e3391a01f71fa96f672b666943.svg', 'svg', 'program_file', 'files/programs', '2024-04-20 07:58:19', '2024-04-20 07:58:19'),
(14, 'dizajn.svg', '86354f6095ecda14c73fcb29caa3c978.svg', 'svg', 'program_file', 'files/programs', '2024-04-20 07:58:28', '2024-04-20 07:58:28'),
(15, 'ana_krstajic.png', '5e728ed8f4026ba9151c2937c959a818.png', 'png', 'blog_gallery', 'files/blog', '2024-04-20 19:56:39', '2024-04-20 19:56:39'),
(16, 'ana_krstajic.png', 'f55ccd019e6d5cfc8583e0095128cb11.png', 'png', 'blog_gallery', 'files/blog', '2024-04-20 20:00:18', '2024-04-20 20:00:18'),
(17, 'blanka.png', 'bb749054fb680ec31b2a24770e4507ce.png', 'png', 'blog_gallery', 'files/blog', '2024-04-20 20:00:20', '2024-04-20 20:00:20'),
(18, 'blanka.png', 'cb08c84de5a006a60c60397ac4a2f3eb.png', 'png', 'blog_gallery', 'files/blog', '2024-04-20 20:03:45', '2024-04-20 20:03:45'),
(19, 'blanka.png', '08bb7ae480db7196bfdf8bd88bb1f602.png', 'png', 'blog_gallery', 'files/blog', '2024-04-20 20:04:52', '2024-04-20 20:04:52'),
(20, 'blanka.png', '21ace143f507553cb71b7b5b78e80b17.png', 'png', 'blog_img', 'files/blog', '2024-04-21 06:09:22', '2024-04-21 06:09:22'),
(21, 'blanka.png', '537ef21f986b5c5801d65a1722b49eed.png', 'png', 'blog_img', 'files/blog', '2024-04-21 06:09:26', '2024-04-21 06:09:26'),
(22, 'mirza.png', 'f164661c9a94000eb95ae50b70f8696b.png', 'png', 'blog_img', 'files/blog', '2024-04-21 06:10:00', '2024-04-21 06:10:00'),
(23, 'blanka.png', 'd6e28cac86c1b169cbf15a9e9157241c.png', 'png', 'blog_img', 'files/blog', '2024-04-21 06:10:05', '2024-04-21 06:10:05'),
(24, 'mirza.png', '4b1a02d1e3a1be170ff4381caf56dd60.png', 'png', 'blog_img', 'files/blog', '2024-04-21 06:10:16', '2024-04-21 06:10:16'),
(25, 'Frame 1.png', '35d79188500c5f0ae96623ec9d0d78b0.png', 'png', 'blog_img', 'files/blog', '2024-04-21 06:16:09', '2024-04-21 06:16:09'),
(26, 'Frame 2.png', '598959165a020290d80c6bf30ef1f746.png', 'png', 'blog_img', 'files/blog', '2024-04-21 06:16:13', '2024-04-21 06:16:13'),
(27, 'Frame 4.png', '9b4845de2c2f14252f4e45532151d12e.png', 'png', 'blog_img', 'files/blog', '2024-04-21 06:16:19', '2024-04-21 06:16:19'),
(28, 'Frame 281 (1).png', '6a6fe0c0d250491ec3175104be22a72b.png', 'png', 'blog_gallery', 'files/blog', '2024-04-21 06:43:07', '2024-04-21 06:43:07'),
(29, 'Frame 281.png', '7a6736d60b05f74c040c855b475b034a.png', 'png', 'blog_gallery', 'files/blog', '2024-04-21 06:43:11', '2024-04-21 06:43:11'),
(30, 'Frame 281.png', 'bd8906fdf32484d154d6a7e9d540979b.png', 'png', 'blog_gallery', 'files/blog', '2024-04-21 06:43:13', '2024-04-21 06:43:13'),
(31, 'Frame 281.png', '7f19c8bea2dc5a876012ff05d3db7d6b.png', 'png', 'blog_gallery', 'files/blog', '2024-04-21 06:43:16', '2024-04-21 06:43:16'),
(32, 'Frame 281.png', 'ad0ded20e53dc56eafdf37d87e548822.png', 'png', 'blog_gallery', 'files/blog', '2024-04-21 06:43:18', '2024-04-21 06:43:18'),
(33, 'Frame 282 (1).png', 'e0b591869407f8070fbdc2c0392a1880.png', 'png', 'blog_gallery', 'files/blog', '2024-04-21 06:43:23', '2024-04-21 06:43:23'),
(34, 'Frame 282.png', '88d1bbafa607a1af8c7e04774653a3bd.png', 'png', 'blog_gallery', 'files/blog', '2024-04-21 06:43:31', '2024-04-21 06:43:31'),
(35, 'Frame 282.png', '087b96c8481fc77324f4a109146449d3.png', 'png', 'blog_gallery', 'files/blog', '2024-04-21 06:43:34', '2024-04-21 06:43:34'),
(36, 'Frame 283.png', '34a22af0bbc42ef0a3a67fa639eae094.png', 'png', 'blog_gallery', 'files/blog', '2024-04-21 06:43:42', '2024-04-21 06:43:42'),
(37, 'Frame 283.png', '5628f987783fd4981b736d09aa06420c.png', 'png', 'blog_gallery', 'files/blog', '2024-04-21 06:43:53', '2024-04-21 06:43:53'),
(38, 'Frame 283 (1).png', '9f0ca56957dfc71d8a83dd8a0e5359fa.png', 'png', 'blog_gallery', 'files/blog', '2024-04-21 06:44:04', '2024-04-21 06:44:04'),
(39, 'main_1.png', '461eabb887bd6a82352d65df3cc4bf32.png', 'png', 'blog_img', 'files/blog', '2024-04-21 07:25:57', '2024-04-21 07:25:57'),
(40, 'main_2.png', '93e00407e65513b194575ee2e2657c19.png', 'png', 'blog_img', 'files/blog', '2024-04-21 07:26:23', '2024-04-21 07:26:23'),
(41, 'main_3.png', '626c9bb72af8fae7b8f956ade3747909.png', 'png', 'blog_img', 'files/blog', '2024-04-21 07:26:35', '2024-04-21 07:26:35'),
(42, 'main_4.png', '1fe68fe1f674db672e030bfd417d8aee.png', 'png', 'blog_img', 'files/blog', '2024-04-21 07:26:43', '2024-04-21 07:26:43'),
(43, 'main_5.png', '5e73cc275e22a0ba7d05f2e35d7e5e70.png', 'png', 'blog_img', 'files/blog', '2024-04-21 07:26:54', '2024-04-21 07:26:54'),
(44, 'main_6.png', 'ae456ba9ace0efedacdccd2659ef5254.png', 'png', 'blog_img', 'files/blog', '2024-04-21 07:27:03', '2024-04-21 07:27:03'),
(45, 'main_7.png', '4701e7ffcf2ca4b0ea05c4e82d27064f.png', 'png', 'blog_img', 'files/blog', '2024-04-21 07:27:11', '2024-04-21 07:27:11'),
(46, 'main_8.png', '4b421ac3769bf2509e245ea917533d9d.png', 'png', 'blog_img', 'files/blog', '2024-04-21 07:27:19', '2024-04-21 07:27:19'),
(47, 'main_9.png', 'bf8d756790abb7115d0c27d7f64a4d0f.png', 'png', 'blog_img', 'files/blog', '2024-04-21 07:27:26', '2024-04-21 07:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `__inbox`
--

DROP TABLE IF EXISTS `__inbox`;
CREATE TABLE IF NOT EXISTS `__inbox` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` bigint UNSIGNED NOT NULL,
  `what` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `__inbox_from_foreign` (`from`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `__inbox`
--

INSERT INTO `__inbox` (`id`, `title`, `content`, `from`, `what`, `created_at`, `updated_at`) VALUES
(4, 'Test poruke', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nWhy do we use it?\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 2, 2, '2024-04-20 10:33:43', '2024-04-20 10:33:43'),
(6, 'Obavijest za sve polaznike', 'Where does it come from?\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\n\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham', 2, 0, '2024-04-20 10:40:36', '2024-04-20 10:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `__inbox__to`
--

DROP TABLE IF EXISTS `__inbox__to`;
CREATE TABLE IF NOT EXISTS `__inbox__to` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `inbox_id` bigint UNSIGNED NOT NULL,
  `to` bigint UNSIGNED NOT NULL,
  `read` tinyint NOT NULL DEFAULT '0',
  `read_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `__inbox__to_inbox_id_foreign` (`inbox_id`),
  KEY `__inbox__to_to_foreign` (`to`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `__inbox__to`
--

INSERT INTO `__inbox__to` (`id`, `inbox_id`, `to`, `read`, `read_at`, `created_at`, `updated_at`) VALUES
(5, 6, 4, 0, NULL, '2024-04-20 10:40:36', '2024-04-20 10:40:36'),
(3, 4, 4, 0, NULL, '2024-04-20 10:33:43', '2024-04-20 10:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `__locations`
--

DROP TABLE IF EXISTS `__locations`;
CREATE TABLE IF NOT EXISTS `__locations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` int NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map_img` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_img` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_img` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `__locations`
--

INSERT INTO `__locations` (`id`, `title`, `address`, `city`, `country`, `location`, `map_img`, `main_img`, `cover_img`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Austrijska Kuća Sarajevo', 'Zelenih Beretki 2', 'Sarajevo', 21, 'eee', 'e8eaca085086d40d70728740867c0d76.png', '9181ed943eb469dba78ec0912b274250.jpeg', '8c8543bba4e01e4ce457fa0dfd600192.jpeg', 'What is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nWhy do we use it?\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n\nWell, why?\nCause we can!\n\n\nWhere does it come from?\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\n\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2024-04-17 17:28:29', '2024-04-20 13:04:48'),
(7, 'Helem Nejse Studio', 'Kobilja Glava 34', 'Sarajevo', 21, 'https://www.google.com/maps?ll=43.86351,18.414975&', 'b89c0cf6016b89f9f4a8109dd7e10046.png', 'bb13445a7981a66eb6538be77382e85d.png', 'ae3e8fcc063c51dbedb1e82c0a5b9fa2.jpeg', 'What is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nWhy do we use it?\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n\n\nWhere does it come from?\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\n\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2024-04-18 16:37:03', '2024-04-18 16:37:45'),
(8, 'Helem Nejse Studio', 'Kobilja Glava 34', 'Sarajevo', 21, 'https://www.google.com/maps?ll=43.86351,18.414975&', 'b89c0cf6016b89f9f4a8109dd7e10046.png', 'bb13445a7981a66eb6538be77382e85d.png', 'ae3e8fcc063c51dbedb1e82c0a5b9fa2.jpeg', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2024-04-18 16:37:03', '2024-04-18 16:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `__single_pages`
--

DROP TABLE IF EXISTS `__single_pages`;
CREATE TABLE IF NOT EXISTS `__single_pages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `__single_pages`
--

INSERT INTO `__single_pages` (`id`, `title`, `description`, `image_id`, `created_at`, `updated_at`) VALUES
(1, 'Kako dobiti stipendiju?', 'What is Lorem Ipsum?\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nWhy do we use it?\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n\n\nWhere does it come from?\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\n\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 9, '2024-04-18 19:46:40', '2024-04-18 17:57:16'),
(2, 'O nama', '-', NULL, '2024-04-18 19:46:40', '2024-04-18 19:46:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
