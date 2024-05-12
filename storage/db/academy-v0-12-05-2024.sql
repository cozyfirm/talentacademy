-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2024 at 12:59 PM
-- Server version: 8.0.36-0ubuntu0.20.04.1
-- PHP Version: 7.4.3-4ubuntu2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `api__countries`
--

CREATE TABLE `api__countries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ba` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `blog` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `main_img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_one` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_two` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_three` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `short_desc`, `description`, `category`, `created_by`, `published`, `main_img`, `img_one`, `img_two`, `img_three`, `created_at`, `updated_at`) VALUES
(15, 'Aleksandar Stanković predavač na Helem Nejse Talent Akademiji!', 'Šta radiš nedjeljom u 2 popodne? – desetine hiljada ljudi odgovoriće vam na ovo pitanje bez razmišljanja. Zna se, gledaju Stankovića na HRT-u.', '<p><font color=\"#f7f7f7\">Šta radiš nedjeljom u 2 popodne? – desetine hiljada ljudi odgovoriće vam na ovo pitanje bez razmišljanja. Zna se, gledaju Stankovića na HRT-u. Malo je emisija od kad postoji televizija na ovim prostorima koje su toliko gledane tako dugo i za koje jednostavno ne možete da ne znate.&nbsp;</font></p><p><font color=\"#f7f7f7\">Već gotovo 24 godine, Aleksandar Stanković nedjeljom u 14:00 izlazi pred gledatelje, dočekuje najaktuelnije i najpoznatije goste i tretira ih kao pravi novinar. Ne voditelj, ne prezenter, ne vršilac dužnosti novinara – nego novinar.&nbsp;</font></p><p><font color=\"#f7f7f7\">Pita ih ono što mu je posao, ono što javnost treba znati, ono čega se najviše plaše. A opet mu dolaze, svi. Predsjednici, premijeri, političari, kontroverzni biznismeni, aktivisti, glumci, muzičari, reditelji, kritičari... I oni koji bi dali ogromne svote novca da izbjegnu tu „vruću stolicu“, ali kod Stankovića se jednostavno morate pojaviti. I svi imaju isti tretman, bez izuzetka.</font></p><p><font color=\"#f7f7f7\">Njegov kultni politički talk-show „Nedjeljom u 2“ već nakon prve sezone dobio je nagradu Hrvatskog novinarskog društva za najbolju TV emisiju u svojoj kategoriji. I sam Stanković od istog Društva 2010. dobija nagradu za novinara godine, ali prava nagrada zapravo mu je vjerna publika među kojom je mnogo neistomišljenika i koja se, kroz godine, proširila na cijelu regiju.&nbsp;</font></p><p><font color=\"#f7f7f7\">Diplomirao je na Pravnom fakultetu u Zagrebu, planirao se baviti diplomatijom ali u struci nikad nije radio. Stanković je u medije dospio 1995. preko Hrvatskog radija, radeći u informativno-političkoj redakciji.</font></p><p><font color=\"#f7f7f7\">Na radiju je postao poznat po emisiji „Poligraf“ a onda ga je na televiziju odvukao poziv da vodi politički talk show koji je do danas zaradio epitet kultnog.</font></p><p><font color=\"#f7f7f7\">Pažnju gledatelja je privukao jedinstvenim, autoritativnim pristupom vođenju emisije od kojeg nije odustao – iako su ga mnogi proglašavali agresivnim i kontroverznim.&nbsp;</font></p><p><font color=\"#f7f7f7\">Autor je i dva dokumentarna filma te zapaženog putopisnog serijala „Vjetar u kosi“ u kojem putuje na motoru. Uz sve to, uspio je napisati i objaviti tri zbirke poezije te dvije knjige, od kojih je posljednja – „Depra“ izazvala pravu buru u Hrvatskoj i regiji. Stanković je, u svom stilu, pokrenuo priču o još jednoj tabu temi, a to je mentalno zdravlje, pišući o svojoj dugodišnjoj borbi s depresijom.&nbsp;</font></p><p><font color=\"#f7f7f7\">U njegovom studiju nema tajni a „male tajne“ velikog majstora novinarstva, iz prve ruke će slušati polaznici Helem Nejse Talent Akademije.&nbsp;</font></p>', 0, 2, 1, '64', '66', NULL, NULL, '2024-05-09 20:06:44', '2024-05-09 20:21:38'),
(18, 'Kako se upisati na Helem Nejse Talent Akademiju 2024?', 'Helem Nejse Talent Akademija je sedmodnevni program edukacije i usavršavanja u oblasti kreativnih industrija i pruža jedinstvenu priliku mladim talentima da istraže svoje potencijale...', '<p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Helem Nejse Talent Akademija je sedmodnevni program edukacije i usavršavanja u oblasti kreativnih industrija i pruža jedinstvenu priliku mladim talentima da istraže svoje potencijale i steknu vještine potrebne za uspjeh u dinamičnom svijetu kreativnosti.</span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Ko nože aplicirati?</span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Svi pojedinci od 18 do 27 godina iz Bosne i Hercegovine, Srbije, Crne Gore, Hrvatske i Slovenije imaju pravo aplicirati za upis na Helem Nejse Talent Akademiju. Aplikanti ne moraju biti studenti ili imati završene fakultete, ali se pri ocjenjivanju aplikacija uzima u obzir svako relevantno iskustvo iz oblasti kreativnih industrija koje aplikant/ica navede.</span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Datumi apliciranja:</span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Aplikacije su otvorene od 16. maja do 6. juna 2024. godine, pružajući dovoljno vremena zainteresiranim kandidatima da se prijave.</span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Proces selekcije:</span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Kandidati koji uđu u uži izbor biće pozvani na online intervjue koji će se održati od 25. juna do 10. jula. Konačna odluka o primljenim kandidatima biće objavljena 20. jula. Nakon obavijesti o uspješnom upisu na akademiju, polaznici će potpisati ugovor o stipendiranju.</span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Šta stipendija pokriva?</span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Svaki polaznik će kroz stipendiju dobiti sveobuhvatnu podršku, uključujući smještaj u hotelu za vrijeme trajanja programa, obroke i osvježenja, kao i putnički grant koji će pokriti sve troškove tokom boravka u Sarajevu.</span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Koliko polaznika će biti upisano na Talent Akademiju?</span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">U malim grupama od 8 do 12 polaznika po programu, svaki polaznik će imati priliku za personalizirano učenje i praktično iskustvo te na taj način stekne vještine i znanja potrebna za uspjeh u kreativnim industrijama.</span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span id=\"docs-internal-guid-33b4db1e-7fff-2bda-11af-35ab66eee428\"></span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Prijavi se! (hyperlink)</span></p>', 0, 2, 1, '70', '79', NULL, NULL, '2024-05-11 17:15:35', '2024-05-11 17:28:20'),
(17, 'Muzika koja oživljava svijet video igara', 'U svijetu video igara, muzika nije samo pozadinska pratnja, već ključni faktor koji doprinosi atmosferi, emociji i dinamici igre. Kompozitori poput Nobuo Uematsu, Jesper Kyd i Yoko Shimomura', '<p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">U svijetu video igara, muzika nije samo pozadinska pratnja, već ključni faktor koji doprinosi atmosferi, emociji i dinamici igre. Kompozitori poput Nobuo Uematsu, Jesper Kyd i Yoko Shimomura postali su virtuozi svog zanata, stvarajući melodije koje su neizostavan dio identiteta igara poput Final Fantasy, Assassin\'s Creed i Kingdom Hearts. Njihova muzika je toliko prepoznatljiva da mnogi igrači odmah mogu prepoznati o kojoj igri je riječ - čim čuju prvi ton.</span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Od epskih orkestarskih kompozicija do elektronskih ritmova, muzika za video igre ima sposobnost da naglasi napetost u borbenim scenama, da pruži mir u trenucima istraživanja ili da izazove uzbuđenje u ključnim trenucima. Svaka nota, svaki zvuk, pažljivo odabrani, doprinose stvaranju nezaboravnog iskustva za igrače. Muzika postaje nevidljivi jezik koji prenosi priču, dočarava emocije likova i stvara osjećaj pripadnosti virtuelnom svijetu.</span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Kao što se priča razvija kroz igru, tako i muzika prati taj razvoj, postajući nevidljivi, ali moćni vodič kroz svjetove mašte i avanture. Muzika ima moć da stvori osjećaj nostalgije za mjestima koja nikada nismo posjetili i da oživi sjećanja na avanture koje smo doživjeli u igri.</span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Muzika za video igre, sa svojom sposobnošću da prenese emocije, stvara atmosferu i oblikuje igračko iskustvo, postaje umjetnost koja transcendirajući granice ekrana, postaje neizostavan dio svake avanture koju igrači dožive.</span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Mnogi igrači pamte muziku iz svojih omiljenih igara decenijama nakon što su prestali igrati. Melodije poput \"One-Winged Angel\" iz Final Fantasy VII ili \"Dragonborn\" iz The Elder Scrolls V: Skyrim postaju toliko ukorijenjene u popularnoj kulturi da ih prepoznaju i oni koji nikada nisu igrali te igre. Muzika za video igre ima moć da stvori osjećaj zajedništva među igračima, povezujući ljude širom svijeta kroz zajedničko iskustvo.</span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Kao što se tehnologija video igara razvija, tako se razvija i muzika koja ih prati. Od 8-bitnih melodija ranih igara do složenih orkestarskih kompozicija današnjice, muzika za video igre nastavlja da napreduje i da otkriva nove načine da obogati igračko iskustvo. Kompozitori konstantno istražuju nove zvukove i tehnike kako bi stvorili još upečatljivije i emocionalno snažnije muzičke doživljaje.</span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Kao što se video igre nastavljaju evoluirati i pružati sve realističnija i interaktivnija iskustva, tako će i muzika koja ih prati nastaviti da se razvija, postajući sve više integralni dio cjelokupnog doživljaja.</span></p><p><span id=\"docs-internal-guid-c6d61d3d-7fff-b2de-0642-0f90cceca148\"></span></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size:11pt;font-family:Calibri,sans-serif;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Muzika za video igre jedna je od tema koju će zajedno sa eminentnim predavačima iz regije, obrađivati polaznici i polaznice programa Primijenjena muzička produkcija – ovogodišnje Helem Nejse Talent Akademije. </span></p>', 3, 2, 1, '69', '80', NULL, NULL, '2024-05-11 17:11:46', '2024-05-11 17:28:38'),
(16, 'Odgovorno kodiranje: Softveri za rješavanje društvenih problema', 'U današnjem digitalnom dobu, tehnologija i softver igraju ključnu ulogu u rješavanju društvenih problema i unapređenju zajednica širom svijeta. Koncept odgovornog kodiranja...', '<p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><font face=\"Calibri, sans-serif\"><span style=\"font-size: 14.6667px; white-space-collapse: preserve;\">U današnjem digitalnom dobu, tehnologija i softver igraju ključnu ulogu u rješavanju društvenih problema i unapređenju zajednica širom svijeta. Koncept odgovornog kodiranja, ili ethical coding, postaje sve važniji kako se tehnološki napredak koristi za stvaranje pozitivnih promjena u društvu.</span></font></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><font face=\"Calibri, sans-serif\"><span style=\"font-size: 14.6667px; white-space-collapse: preserve;\">Odgovorno kodiranje podrazumijeva pristup razvoju softvera koji uzima u obzir etičke, društvene i ekološke implikacije tehnoloških rješenja. Softver koji se razvija uzimajući u obzir ove faktore može imati značajan utjecaj na rješavanje društvenih problema i unapređenje kvaliteta života ljudi.</span></font></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><font face=\"Calibri, sans-serif\"><span style=\"font-size: 14.6667px; white-space-collapse: preserve;\">Jedan od ključnih aspekata odgovornog kodiranja jeste razvoj softvera koji se fokusira na rješavanje konkretnih društvenih izazova. Primjena tehnologije u oblastima poput zdravstva, obrazovanja, zaštite okoliša, socijalne pravde i održivosti može donijeti inovativna rješenja koja poboljšavaju živote ljudi i doprinose boljem funkcionisanju društva.</span></font></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><font face=\"Calibri, sans-serif\"><span style=\"font-size: 14.6667px; white-space-collapse: preserve;\">Softver za rješavanje društvenih problema može imati različite oblike i primjene. Na primjer, softverska rješenja za praćenje zdravstvenih podataka mogu poboljšati pristup zdravstvenoj zaštiti i omogućiti bolje upravljanje zdravstvenim resursima. Također, softver za edukaciju može unaprijediti pristup obrazovanju i omogućiti učenje na daljinu, posebno u situacijama kada je fizičko prisustvo ograničeno.</span></font></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><font face=\"Calibri, sans-serif\"><span style=\"font-size: 14.6667px; white-space-collapse: preserve;\">Važno je naglasiti da odgovorno kodiranje uključuje i pažljivo razmatranje pitanja privatnosti, sigurnosti podataka i transparentnosti u korištenju tehnoloških rješenja. Softver koji se razvija treba da bude u skladu sa najvišim standardima zaštite podataka i da poštuje prava korisnika, osiguravajući integritet i povjerenje u tehnološka rješenja.</span></font></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><font face=\"Calibri, sans-serif\"><span style=\"font-size: 14.6667px; white-space-collapse: preserve;\">Kroz odgovorno kodiranje, programeri imaju priliku da koriste svoje vještine i znanje kako bi doprinijeli stvaranju pozitivnih promjena u društvu. Razvoj softvera za rješavanje društvenih problema zahtijeva multidisciplinarni pristup, saradnju sa stručnjacima iz različitih oblasti i kontinuiranu evaluaciju uticaja tehnoloških rješenja na zajednicu.</span></font></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><font face=\"Calibri, sans-serif\"><span style=\"font-size: 14.6667px; white-space-collapse: preserve;\">Kroz primjenu odgovornog kodiranja i razvoj softvera za rješavanje društvenih problema, tehnološka zajednica može postati pokretač pozitivnih promjena i doprinijeti izgradnji održivijeg i inkluzivnijeg društva.</span></font></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><font face=\"Calibri, sans-serif\"><span style=\"font-size: 14.6667px; white-space-collapse: preserve;\">Polaznici programa Odgovorno kodiranje, ovodogišnje Helem Nejse Talent Akademije imat će priliku raditi na konkretnim softverskim rješenjima iz oblasti ekologije i borbe protiv korupcije, zajedno sa organizacijama Eko Akcija i Transparency International BiH. </span></font></p><div><br></div>', 4, 2, 1, '68', '81', NULL, NULL, '2024-05-10 20:06:53', '2024-05-11 17:28:54'),
(19, 'Helem Nejse Talent Akademija na više lokacija u Sarajevu', 'Helem Nejse Talent Akademija ove godine nudi svoj program na više različitih lokacija u Sarajevu. Lokacije su pažljivo odabrane kako bi pružile inspirativno okruženje i praktično iskustvo...', '<p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><font face=\"Calibri, sans-serif\"><span style=\"font-size: 14.6667px; white-space-collapse: preserve;\">Helem Nejse Talent Akademija ove godine nudi svoj program na više različitih lokacija u Sarajevu. Lokacije su pažljivo odabrane kako bi pružile inspirativno okruženje i praktično iskustvo za polaznike iz različitih oblasti kreativnosti.\n\nOvakva raznolikost lokacija omogućava polaznicima da istraže različite aspekte kreativnosti i da se povežu sa stručnjacima iz različitih oblasti.\n\n<b>1. Evropska kuća kulture i nacionalnih manjina</b>\n\nEvropska kuća kulture i nacionalnih manjina, smještena u samom centru Sarajeva, predstavlja centralnu lokaciju održavanja Helem Nejse Talent Akademije. Ova lokacija nudi višenamjenski prostor za program Critical Thinking, kao i zasebne kupee za rad u manjim grupama, pružajući polaznicima raznovrsne mogućnosti za učenje i druženje.\n\n<b>2. Vila Braun</b>\n\nVila Braun, locirana u neposrednoj blizini Evropske kuće kulture i nacionalnih manjina, predstavlja drugu primarnu lokaciju Helem Nejse Talent Akademije. Sa velikom centralnom salom i sobama za sastanke, ova vila pruža idealno okruženje za održavanje predavanja iz oblasti kreativnih industrija, uz dodatnu pogodnost velike bašte i terase za inspirativno učenje tokom ljetnih dana.\n\n<b>3. BIRN BiH</b>\n\nU sklopu posjeta redakcijama, polaznici odsjeka za novinarstvo će imati priliku posjetiti redakciju BIRNa, nevladine organizacije specijalizirane za izvještavanje i monitoring vijesti o suđenjima za ratne zločine i korupciju. Ova posjeta pruža uvid u rad savremene novinarske prakse i važnost odgovornog novinarstva u društvu.\n\n<b>4. Fabrika</b>\n\nAgencija Fabrika iz Sarajeva bavi se dizajnom, računarskim grafikama, TV animacijom, proizvodnjom TV spotova i marketinškim komunikacijama. Polaznici odsjeka za dizajn i animaciju ovdje će steći uvid u kreativno istraživanje prije rada na projektu, planiranju i implementaciji digitalnog sadržaja, te o odnosima s javnošću i event menagmentu. \n\n<b>5. Studio Modra rijeka</b>\n\nPolaznici odsjeka za primijenjenu muzičku produkciju će posjetiti Studio Modra rijeka, posvećen audio post-produkciji, gdje će steći teoretska i praktična znanja o snimanju foley zvukova i sound designu za filmsko platno pod mentorstvom iskusnih profesionalaca.\n\n<b>6. Studio Chelia</b>\n\nStudio Chelia, fokusiran na audio post-produkciju, pruža polaznicima najnoviju audio opremu i profesionalne uslove za rad. Ovdje će polaznici odsjeka za primijenjenu muzičku produkciju sticati znanja o sound designu za filmsko platno i snimanju foley zvukova pod mentorstvom stručnjaka.\n\n<b>7. Helem Nejse studio</b>\n\nUnutar novog Helem Nejse studija, polaznici će imati priliku raditi u studiju namijenjenom za produkciju više medija, uključujući muziku i dizajn zvuka za animirani serijal. Ova lokacija pruža inspirativno okruženje za stvaranje i eksperimentisanje u kreativnim procesima.\n\n<b>8. International Burch University</b>\n\nU moderno opremljenom prostoru International Burch Univerziteta u Sarajevu, polaznici programa Odgovorno kodiranje imat će priliku učestvovati u interaktivnim radionicama na kojima će upoznati temeljne koncepte umjetne inteligencije i zadubiti se u relevantne aplikacije poput upotrebe umjetne inteligencije za analizu EEG signala u interfejsima mozak-računalo i istražiti kako umjetna inteligencija može poboljšati sigurnost mreže. Također, upoznat će se sa uspješnim pričama Startup inkubatora IBU-a i njihov način primjene AI-a.</span></font>&nbsp;</p>', 0, 2, 1, '72', '71', NULL, NULL, '2024-05-11 17:22:35', '2024-05-11 17:23:39'),
(20, 'Fenomenologija retro dizajna: JUS Project na Talent Akademiji', 'U vremenu u kojem tehnologija napreduje nevjerovatnom brzinom a digitalni svijet postaje sve dominantniji, jedna pojava privlači posebnu pažnju dizajnerske zajednice i šire publike - fenomen.', '<p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><font face=\"Calibri, sans-serif\"><span style=\"font-size: 14.6667px; white-space-collapse: preserve;\">U vremenu u kojem tehnologija napreduje nevjerovatnom brzinom a digitalni svijet postaje sve dominantniji, jedna pojava privlači posebnu pažnju dizajnerske zajednice i šire publike - fenomen retro dizajna. Upečatljiv primjer ovog trenda je JUS Project iz Slovenije, inicijativa koja slavi estetiku i duh ranih digitalnih epoha.</span></font></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><font face=\"Calibri, sans-serif\"><span style=\"font-size: 14.6667px; white-space-collapse: preserve;\">JUS Project, akronim za \"Jugoslovenski Univerzalni Standard\", vraća nas u period kada su računari bili tek u povoju, a grafički dizajn bio ograničen na skromne mogućnosti tadašnje tehnologije. Međutim, ono što je na prvi pogled ograničenje, postaje inspiracija za kreativnost i inovaciju. Dizajneri JUS Projecta zaronili su u arhive i izvukli na vidjelo zaboravljene vizuelne elemente, od tipografije do ikoničnih simbola, stvarajući novu estetiku koja spaja prošlost i sadašnjost.</span></font></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><font face=\"Calibri, sans-serif\"><span style=\"font-size: 14.6667px; white-space-collapse: preserve;\">Ono što JUS Project čini posebnim jeste način na koji uspješno prevodi retro elemente u savremeni kontekst. Umjesto pukog kopiranja, oni reinterpretiraju i adaptiraju dizajn prošlosti, stvarajući svježe i relevantne vizuelne identitete. Njihov pristup je poput arheologije dizajna - iskopavaju i rekonstruišu zaboravljene vizuelne kodove, dajući im novi život i značenje.</span></font></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><font face=\"Calibri, sans-serif\"><span style=\"font-size: 14.6667px; white-space-collapse: preserve;\">Fenomenologija retro dizajna na primjeru JUS Projecta otkriva koliko je prošlost zapravo relevantna za sadašnjost. U vremenu kada se tehnologija mijenja brzinom svjetlosti, postoji nostalgija za stabilnošću i autentičnošću. JUS Project odgovara na tu potrebu, nudeći dizajn koji je istovremeno poznat i nov, koji pruža utočište u poznatom i inspiraciju za nepoznato.</span></font></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><font face=\"Calibri, sans-serif\"><span style=\"font-size: 14.6667px; white-space-collapse: preserve;\">JUS Project pokazuje da retro dizajn nije samo puka nostalgija, već moćno sredstvo za istraživanje identiteta, kulture i istorije. Njihov rad otvara pitanja o tome šta znači biti dizajner u digitalnom dobu, kako se nositi sa preobiljem informacija i kako pronaći smisao u moru vizuelnih podražaja. Retro dizajn postaje alat za preispitivanje i reafirmaciju onoga što je suštinski ljudsko u digitalnom svijetu.</span></font></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><font face=\"Calibri, sans-serif\"><span style=\"font-size: 14.6667px; white-space-collapse: preserve;\">JUS Project je samo jedan od mnogih primjera kako retro dizajn može biti moćno sredstvo za kreativnu ekspresiju i društveni angažman. Njihov rad inspirira druge dizajnere da istraže sopstvene arhive, da se vrate korijenima i da pronađu inspiraciju u prošlosti. Retro dizajn postaje način da se poveže prošlost i budućnost, da se stvori most između onoga što smo bili i onoga što želimo da postanemo.</span></font></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><font face=\"Calibri, sans-serif\"><span style=\"font-size: 14.6667px; white-space-collapse: preserve;\">Retro dizajn postaje način da se prošlost ne samo očuva, već i unaprijedi, da se stvori budućnost koja je istovremeno poznata i nova, stabilna i inovativna.&nbsp;</span></font></p><p dir=\"ltr\" style=\"line-height:1.295;margin-top:0pt;margin-bottom:8pt;\"><font face=\"Calibri, sans-serif\"><span style=\"font-size: 14.6667px; white-space-collapse: preserve;\">Dizajnerski duo koji stoji iza JUS Projecta održaće interaktivnu radionicu učesnicima programa Grafički dizajn i animacija – ovogodišnje Helem Nejse Talent Akademije.&nbsp;</span></font></p><div><br></div>', 5, 2, 1, '82', '83', NULL, NULL, '2024-05-11 17:31:32', '2024-05-11 17:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `blog__galery`
--

CREATE TABLE `blog__galery` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_id` bigint UNSIGNED NOT NULL,
  `file_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog__galery`
--

INSERT INTO `blog__galery` (`id`, `blog_id`, `file_id`, `created_at`, `updated_at`) VALUES
(21, 19, 76, '2024-05-11 17:25:47', '2024-05-11 17:25:47'),
(20, 19, 75, '2024-05-11 17:25:40', '2024-05-11 17:25:40'),
(19, 19, 74, '2024-05-11 17:25:30', '2024-05-11 17:25:30'),
(18, 19, 73, '2024-05-11 17:25:20', '2024-05-11 17:25:20'),
(22, 19, 77, '2024-05-11 17:25:55', '2024-05-11 17:25:55'),
(23, 19, 78, '2024-05-11 17:26:06', '2024-05-11 17:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(20, '2024_04_20_205923_blog__galery', 11),
(21, '2024_04_21_112035___programs__sessions_links', 12),
(23, '2024_04_22_193408___apply_for_scholarship', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `title`, `description`, `image_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kreativno pisanje: Komedija', 'Od antičke komedije do rada na animiranom youtube serijalu BBBB, program Pisanje za 21. stoljeće pokazuje značaj komedije u ljudskoj historiji, njenu ulogu u društvenoj kritici i njenu moć da načini promjene u svijetu.', 10, '2024-04-18 14:37:07', '2024-05-09 22:54:28', NULL),
(2, 'Novinarstvo: novinarstvo i novi mediji', 'Navigirajući kroz svijet dezinformacija, neetičnog izvještavanja i površnog istraživanja - ovaj program okuplja najveće regionalne eksperte u jedinstvenoj trening sedmici posvećenoj novinarstvu u novom milenijumu.', 11, '2024-04-18 16:02:05', '2024-05-09 22:54:46', NULL),
(3, 'Muzika: Primijenjena muzička produkcija', 'Više no ikada prije, čitav svijet ima muzičku podlogu! Od reklama za radio do sound-designa holivudskih filmova, program Primijenjena muzička produkcija nudi teoretska i praktična znanja za stvaranje u svim medijima.', 12, '2024-04-18 16:02:12', '2024-05-07 11:23:20', NULL),
(4, 'Informacijske tehnologije: odgovorno kodiranje', 'Spajajući tehnologiju koja prožima sve segmente modernog života i oblasti građanskog angažmana i etike, program Informacijske tehnologije: odgovorno kodiranje nudi odgovore na pitanja digitalnih prava, internet sigurnosti, vještačke inteligencije i općenito korištenju tehnologije kao sredstva društvene promjene.', 13, '2024-04-18 16:02:21', '2024-05-07 11:25:11', NULL),
(5, 'Grafički dizajn i animacija: Istraživanje vizualnih narativa', 'U svijetu slike, dizajneri i animatori kreiraju našu stvarnost. Od dizajniranja za muzičke festivale, naslovnice knjiga i teatarskih predstava, do odnosa prema kulturnom naslijeđu i teoriji vizualne kulture, program Grafički dizajn i animacija: Istraživanje vizualnih narativa nudi jedan kompletan i profesionalan pristup kreiranju stvarnosti oko nas.', 14, '2024-04-18 16:02:33', '2024-05-07 11:27:23', NULL),
(6, 'Angažovani rad i kritičko razmišljanje', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, '2024-04-18 16:02:43', '2024-04-18 16:02:43', NULL),
(7, 'Novinarstvo: novinarstvo i novi mediji!', NULL, NULL, '2024-05-09 22:55:12', '2024-05-09 22:55:12', '2024-05-12 23:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `programs__applications`
--

CREATE TABLE `programs__applications` (
  `id` bigint UNSIGNED NOT NULL,
  `program_id` bigint UNSIGNED NOT NULL,
  `attendee_id` bigint UNSIGNED NOT NULL,
  `app_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in_queue',
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'saved',
  `motivation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `interests` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `experience` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `expectations` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `skills` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cv` int DEFAULT NULL,
  `motivation_letter` int DEFAULT NULL,
  `other` int DEFAULT NULL,
  `checked` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs__applications`
--

INSERT INTO `programs__applications` (`id`, `program_id`, `attendee_id`, `app_status`, `status`, `motivation`, `interests`, `experience`, `expectations`, `skills`, `cv`, `motivation_letter`, `other`, `checked`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 1, 4, 'accepted', 'submitted', 'a', 'b', 'c', 'd', 'e', 60, 61, 62, 1, '2024-04-28 14:01:39', '2024-04-28 14:02:05', NULL),
(9, 5, 2, 'in_queue', 'saved', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-05-07 11:27:43', '2024-05-07 11:27:43', NULL),
(10, 4, 2, 'in_queue', 'saved', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-05-07 11:54:47', '2024-05-07 11:54:47', NULL),
(11, 1, 2, 'in_queue', 'saved', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-05-09 20:46:11', '2024-05-09 20:46:11', NULL),
(12, 3, 11, 'in_queue', 'saved', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-05-09 20:47:22', '2024-05-09 20:47:22', NULL),
(13, 4, 11, 'in_queue', 'submitted', 'ee', 'ee', 'ee', 'ee', 'ee', NULL, NULL, NULL, 0, '2024-05-09 20:47:35', '2024-05-09 20:48:44', NULL),
(14, 2, 11, 'in_queue', 'saved', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-05-09 20:49:01', '2024-05-09 20:49:01', NULL),
(15, 1, 11, 'in_queue', 'saved', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-05-09 20:49:29', '2024-05-09 20:49:29', NULL),
(16, 2, 2, 'in_queue', 'saved', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-05-09 22:07:35', '2024-05-09 22:07:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programs__sessions`
--

CREATE TABLE `programs__sessions` (
  `id` bigint UNSIGNED NOT NULL,
  `program_id` bigint UNSIGNED NOT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'workshop',
  `time_from` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_to` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `datetime_from` datetime DEFAULT NULL,
  `public` int NOT NULL DEFAULT '0',
  `location_id` bigint UNSIGNED NOT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `presenter_id` bigint UNSIGNED NOT NULL,
  `presenter_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs__sessions`
--

INSERT INTO `programs__sessions` (`id`, `program_id`, `title`, `type`, `time_from`, `time_to`, `duration`, `date`, `datetime_from`, `public`, `location_id`, `short_description`, `description`, `presenter_id`, `presenter_data`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 4, 'Open Source Crash Course', 'Radionica', '10:00', '12:30', '150', '2024-08-03', '2024-08-03 10:00:00', 1, 2, '\"How your phone might depend on the work of a carpenter who codes for fun.\" - Radionica \"Open Source Crash Course\" donosi fundamentalna znanja o tome kako Free Software i Open Source zajednice funkcionišu.', '<div><font face=\"Roboto, sans-serif\" color=\"#f7f7f7\"><span style=\"white-space-collapse: preserve;\">Radionica <b style=\"\">\"Open Source Crash Course\" </b>donosi fundamentalna znanja o tome kako Free Software i Open Source zajednice funkcionišu. </span></font></div><div><font face=\"Roboto, sans-serif\" color=\"#f7f7f7\"><span style=\"white-space-collapse: preserve;\"><br></span></font></div><div><font face=\"Roboto, sans-serif\" color=\"#f7f7f7\"><span style=\"white-space-collapse: preserve;\">Santiago Zarate (Mentor grupe i Predavač) će se u svom predavanju fokusirati na to kako SUSE, kao kompanija koja stoji iza jedne od najvažnijih svjetskih Linux distribucija, vodi svoje poslovanje isporučujući softver koji \"dolazi bez garancije ispravnosti\" (kao što je to slučaj sa većinom open source softvera). Slijedit će razgovori o sigurnosti softvera koji se razvija unutar ove open source kompanije, ali i otvoreni razgovor o tome kako izgleda put ličnog razvoja kao softverskog inženjera radeći isključivo unutar Open Source zajednice.</span></font></div><div><font face=\"Roboto, sans-serif\" color=\"#f7f7f7\"><span style=\"white-space-collapse: preserve;\"><br></span></font></div><div><font face=\"Roboto, sans-serif\" color=\"#f7f7f7\"><span style=\"white-space-collapse: preserve;\">Na kraju ovog predavanja, grupa za odgovorno kodiranje na Helem Nejse Talent Akademiji, bilo da su iskusni ili ne, će imati dublje razumijevanje kako Open Source zajednice funkcionišu, pravne nijanse koje su vezane uz ovaj vid razvoja softvera, i, što je još važnije, saznaće kako i sami mogu da se uključe i doprinesu svjetskoj Open Source i Free Software zajednici.</span></font></div><div><br></div>', 16, NULL, '2024-04-23 15:23:38', '2024-05-10 17:11:41', NULL),
(18, 1, 'Komični karakter', 'Predavanje', '11:00', '13:00', '120', '2024-08-04', '2024-08-04 11:00:00', 1, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas at cursus purus, id scelerisque urna. Proin cursus pretium elit, in condimentum justo egestas suscipit.', '<p>Phasellus viverra nisl nec varius laoreet. Nam at felis quis sapien viverra ornare. Nam scelerisque velit ex, ut feugiat metus consectetur sed. Duis sit amet gravida nulla. Vivamus quis mi feugiat, cursus velit ut, lacinia lorem. Aenean nisi lectus, fermentum sit amet venenatis ac, scelerisque nec ante. Curabitur lacus orci, commodo fermentum mi sed, molestie pharetra augue. Nullam eu ultricies mauris. Donec congue porta magna vitae tempus. Sed hendrerit pharetra leo, ac posuere nibh faucibus quis. Maecenas et diam et sem elementum aliquam. Nulla non tortor ligula.</p>', 12, NULL, '2024-05-09 23:10:00', '2024-05-09 23:10:00', NULL),
(19, 1, 'Staroantička komedija: Aristofan', 'Predavanje', '09:00', '11:00', '120', '2024-08-03', '2024-08-03 09:00:00', 0, 2, 'Ut massa orci, volutpat eget orci ac, interdum consequat diam. Phasellus fermentum gravida ipsum id sollicitudin.', '<p>Sed vestibulum elit sit amet lobortis rutrum. Etiam in egestas turpis. Proin et dictum elit, a dignissim mi. Sed vel efficitur leo, in volutpat felis. Aliquam vel sapien luctus turpis bibendum accumsan a ac urna. Duis laoreet aliquet tellus vel mollis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam sollicitudin, odio eget accumsan pulvinar, velit arcu accumsan mi, sed viverra nisi arcu a ante. Ut quis augue ipsum. Nam tempor semper purus vel ullamcorper. Morbi ante eros, egestas eget magna vel, tincidunt bibendum dolor. Morbi sed quam ante. Aenean tincidunt turpis et libero accumsan, sed placerat tellus condimentum. Pellentesque ac urna id magna auctor tempor. Aliquam consectetur nisi eu interdum vehicula. Aenean magna libero, rhoncus eget mi in, dignissim venenatis nibh.</p>', 13, NULL, '2024-05-09 23:23:01', '2024-05-09 23:24:35', NULL),
(20, 4, 'Digitalna prava i aktivno građanstvo', 'Predavanje', '09:00', '11:00', '120', '2024-08-04', '2024-08-04 09:00:00', 1, 2, 'Kako se ljudska prava reguliraju u online sferi  i koja je uloga pojedinca kao branitelja ljudskih prava u informacijskom društvu? Kakva je problematika net neutralnosti, zašto postoji sve veća potreba za medijskom pismenošću i kako osnažiti pojedinca da se brani od nadzora i cenzure?', '<div><font color=\"#f7f7f7\">Kako se ljudska prava reguliraju u online sferi  i koja je uloga pojedinca kao branitelja ljudskih prava u informacijskom društvu? Kakva je problematika net neutralnosti, zašto postoji sve veća potreba za medijskom pismenošću i kako osnažiti pojedinca da se brani od nadzora i cenzure?</font></div><div><font color=\"#f7f7f7\"><br></font></div><div><font color=\"#f7f7f7\">Ovo predavanje će istražiti ulogu pojedinca, ali i ulogu nezavisnih demokratskih institucija koje pomažu aktivnom građaninu u borbi za slobode i prava. Analizirat ćemo različite kampanje za digitalna prava (net neutralnost, autorsko pravo, biometrijski nadzor, finansiranje propagande) i istaknuti različite korisne pristupe koji promoviraju društvenu promjenu na dobrobit društva.</font></div><div><font color=\"#f7f7f7\"><br></font></div><div><font color=\"#f7f7f7\">Na kraju, istražit ćemo trenutne trendove u polju digitalnih prava i pokušati predvidjeti što će se dogoditi u budućnosti u području generativne umjetne inteligencije, nadzorne reklame i drugih tema koje utječu na ljudska prava online i offline.</font></div>', 14, NULL, '2024-05-10 00:08:09', '2024-05-10 00:27:13', NULL),
(21, 4, 'Prava na internetu vs  ljudska prava - postoji li razlika?', 'Radionica', '13:00', '15:00', '120', '2024-08-04', '2024-08-04 13:00:00', 0, 2, 'Radionica istražuje vezu između prava na internet i ljudskih prava. Pitanja u fokusu su: Kako su povezani? Koje izazove donosi tehnološki napredak? Da li zahtijevaju specifičan pristup? Pridružite se kako bismo produbili razumijevanje i promovirali zaštitu prava na internetu.', '<div><font color=\"#f7f7f7\">Radionca koju vodi Aida Mahmutović, stručnjakinja sa izuzetnim iskustvom u oblasti internet upravljanja i ljudskih prava. Ova radionica predstavlja priliku da dublje istražimo kompleksnu vezu između prava na internet i općih ljudskih prava, kao i da razmotrimo da li postoji razlika između njih.</font></div><div><font color=\"#f7f7f7\"><br></font></div><div><font color=\"#f7f7f7\">Aida će nas provesti kroz ključna pitanja koja se tiču ove teme. Kako se prava na internet međusobno povezuju sa univerzalnim ljudskim pravima? Koje specifične izazove susrećemo u zaštiti prava na internetu, posebno u kontekstu rapidnog tehnološkog razvoja? Da li su prava na internet samo produžetak općih ljudskih prava ili zahtijevaju specifičan pristup i zaštitu?</font></div><div><font color=\"#f7f7f7\"><br></font></div><div><font color=\"#f7f7f7\">Osim toga, Aida će podijeliti svoje bogato iskustvo i uvid u praktične primjene ovih principa. Kroz svoj rad na projektima koji se tiču internet prava, ženskih prava i borbe protiv nasilja online, ona će nam pružiti uvid u konkretne situacije i izazove s kojima se suočavamo u ovoj oblasti.</font></div><div><font color=\"#f7f7f7\"><br></font></div><div><font color=\"#f7f7f7\">Pridružite nam se kako bismo zajedno produbili naše razumijevanje ove važne teme i razmotrili načine na koje možemo doprinijeti zaštiti i promociji prava na internetu kao sastavnog dijela ljudskih prava.</font></div>', 15, NULL, '2024-05-10 00:27:57', '2024-05-10 17:00:27', NULL),
(22, 4, 'Umjetna inteligencija - Presjek stanja i budući trendovi', 'Predavanje', '11:00', '13:00', '120', '2024-08-06', '2024-08-06 11:00:00', 1, 11, 'Predavanje će pokriti temeljne koncepte umjetne inteligencije i zadubiti se u relevantne aplikacije poput upotrebe umjetne inteligencije za analizu EEG signala u interfejsima mozak-računalo i istražiti kako umjetna inteligencija može poboljšati sigurnost mreže.', '<p><font color=\"#f7f7f7\">Predavanje će pokriti temeljne koncepte umjetne inteligencije i zadubiti se u relevantne aplikacije poput upotrebe umjetne inteligencije za analizu EEG signala u interfejsima mozak-računalo i istražiti kako umjetna inteligencija može poboljšati sigurnost mreže.  Predavanje će završiti budućim trendovima u umjetnoj inteligenciji iz oblasti elektrotehnike ​​i po želji se može proširiti na radionicu na kojoj studenti eksperimentiraju sa AI platformama.</font></p>', 17, NULL, '2024-05-10 09:20:11', '2024-05-10 09:49:02', NULL),
(23, 4, 'Poduzetničke priče iz Burch Startup inkubatora', 'Predavanje', '14:30', '16:30', '120', '2024-08-06', '2024-08-06 14:30:00', 0, 11, 'Ovo predavanje se bavi uspješnim pričama u Startup inkubatoru Internacionalnog Burch univerziteta sa fokus na oblasti proizvodnje i razvoja. Vidjet ćete kako ovi startupi koriste umjetnu inteligenciju (AI) za konkurentsku prednost.', '<p><font color=\"#f7f7f7\">Ovo predavanje se bavi uspješnim pričama u Startup inkubatoru Internacionalnog Burch univerziteta sa fokus na oblasti proizvodnje i razvoja. Vidjet ćete kako ovi startupi koriste umjetnu inteligenciju (AI) za konkurentsku prednost. Istražujući primjere iz stvarnog svijeta i izazove integracije AI-a, steći ćete uvid u procjenu potencijalne uloge AI u vašim budućim poduzetničkim nastojanjima.</font></p>', 17, NULL, '2024-05-10 09:36:50', '2024-05-10 14:51:29', NULL),
(24, 4, 'Introduction to Civic tech', 'Radionica', '13:00', '15:30', '150', '2024-08-03', '2024-08-03 13:00:00', 1, 2, 'Na radionici \"Introduction to Civic Tech\" otkriti ćemo šta je to Civic Tech, kako se klasificiraju informacioni sistemi u ovoj oblasti i šta su preduslovi za uspješnost ovakvih sistema u svakodnevnoj primjeni.', '<p><font color=\"#f7f7f7\">Na radionici \"Introduction to Civic Tech\" na Helem Nejse Talent Akademiji, Boris će podijeliti svoje znanje o informacionim sistemima koji su ključni za praćenje rada parlamenata, političkih procesa i borbu protiv lažnih vijesti. Otkrit će nam i kako ovi sistemi mogu osnažiti i unaprijediti položaj građana i građanki. Pridružite nam se dok istražujemo perspektive Civic Tech-a za bolju budućnost!</font></p>', 11, NULL, '2024-05-10 15:22:00', '2024-05-10 17:43:33', NULL),
(25, 4, 'Posjeta kampusu Međunarodnog Burch Univerziteta', 'Posjeta', '10:00', '11:00', '60', '2024-08-06', '2024-08-06 10:00:00', 1, 11, 'Prije početka dana imat ćemo priliku posjetiti kampus Međunarodnog univerziteta Burch (IBU). Ovaj posjet omogućit će vam da se upoznate s okolinom i resursima univerziteta, kao i da se osjećate udobno i pripremljeno za predstojeće predavanje.', '<p><font color=\"#f7f7f7\">Prije početka dana imat ćemo priliku posjetiti kampus Međunarodnog univerziteta Burch (IBU). Ovaj posjet omogućit će vam da se upoznate s okolinom i resursima univerziteta, kao i da se osjećate udobno i pripremljeno za predstojeće predavanje. Očekujte informativnu turneju kroz različite fakultete i prostore univerziteta kako biste se bolje upoznali s okruženjem u kojem ćete učiti.</font></p>', 0, NULL, '2024-05-10 17:09:20', '2024-05-10 17:09:20', NULL),
(26, 4, 'Orientation session', 'Radionica', '09:00', '10:00', '60', '2024-08-03', '2024-08-03 09:00:00', 0, 2, 'Na orijentacijskoj sesiji Talent Akademije, pod vodstvom Mentor Grupe, polaznici će dobiti sve potrebne informacije o programu, rasporedu i logistici događaja. Kroz detaljan pregled agende, polaznici će biti upoznati s temama predavanja i aktivnostima.', '<p><font color=\"#f7f7f7\">Na orijentacijskoj sesiji Talent Akademije, pod vodstvom Mentor Grupe, polaznici će dobiti sve potrebne informacije o programu, rasporedu i logistici događaja. Kroz detaljan pregled agende, polaznici će biti upoznati s temama predavanja i aktivnostima. Također će dobiti sve servisne informacije koje će im olakšati praćenje i učestvovanje u Akademiji.</font></p>', 0, NULL, '2024-05-10 17:16:35', '2024-05-10 17:16:35', NULL),
(27, 4, 'Can Technology Save the Day - Ekologija', 'Hakaton', '17:00', '20:00', '180', '2024-08-03', '2024-08-03 17:00:00', 1, 12, 'Kako tehnologija može doprinijeti zaštiti okoliša razgovaramo na radionici \"Can Technology Save the Day?\" Razmatramo razvoj ICT alata za poboljšanje ekoloških uvjeta, poput alata za podizanje svijesti grđana,  mjerenje zagađenja i sl...', '<p><font color=\"#f7f7f7\">Tehnologija može biti ključna u rješavanju mnogih ekoloških problema s kojima se suočava naš svijet. Radimo na razvoju ICT alata koji ne samo da identificiraju probleme, već i potiču akciju i suradnju kako bismo zajednički radili na rješavanju tih izazova. Alati za podizanje svijesti mogu informirati građane o ekološkim pitanjima i potaknuti ih na djelovanje, dok recimo alati za mjerenje zagađenja pružaju važne informacije o kvaliteti zraka, vode i tla.</font></p><p><font color=\"#f7f7f7\">Crowdsourcing alati omogućuju građanima da prijave ekološke probleme poput ilegalnih deponija ili onečišćenja voda, što omogućava brže i efikasnije reagiranje nadležnih institucija. Razmatramo i druge ideje koje koriste tehnologiju kako bi se očuvala priroda i okoliš, uključujući inovativne pristupe recikliranju, praćenju bioraznolikosti i smanjenju ugljičnog otiska.</font></p><p><font color=\"#f7f7f7\">Naš zajednički hakaton pružit će priliku da se te ideje pretvore u stvarnost, uz podršku naših mentora koji su stručnjaci iz područja tehnologije i ekologije. Kroz timski rad i kreativnost, nadamo se stvaranju praktičnih rješenja koja mogu imati stvaran utjecaj na zaštitu okoliša i očuvanje prirode.</font></p><p><font color=\"#f7f7f7\">Pridružite nam se na radionici \"Can Technology Save the Day?\" kako bismo zajedno istražili kako tehnologija može biti saveznik u borbi za očuvanje našeg planeta za buduće generacije.</font></p>', 0, NULL, '2024-05-10 17:48:59', '2024-05-10 18:07:29', NULL),
(28, 4, 'Can Technology Save the Day - Fake News', 'Hakaton', '17:00', '20:00', '180', '2024-08-04', '2024-08-04 17:00:00', 0, 12, 'Nastavljamo praktični dio akademije sa sesijom o lažnim vijestima i borbi protiv njih. Razmatramo razvoj ICT alata za otkrivanje i suzbijanje lažnih vijesti, poput alata za podizanje svijesti javnosti i provjeru autentičnosti informacija.', '<p><font color=\"#f7f7f7\">Nastavljamo praktični dio akademije sa sesijom o lažnim vijestima i borbi protiv njih. Razmatramo razvoj ICT alata za otkrivanje i suzbijanje lažnih vijesti, poput alata za podizanje svijesti javnosti i provjeru autentičnosti informacija.</font></p><p><font color=\"#f7f7f7\">Lažne vijesti, poznate kao \"fake news\", su ozbiljan izazov u digitalnom dobu, ugrožavajući društvo, demokraciju i javno mnijenje. One često počinju kao neprovjerene ili netačne informacije koje brzo kruže internetom i društvenim medijima, izazivajući paniku i ugrožavaju povjerenje. Napredak tehnologije, poput dubokog učenja, omogućava stvaranje uvjerljivih lažnih sadržaja, dok automatizirani botovi na društvenim mrežama brzo šire dezinformacije.</font></p><p><font color=\"#f7f7f7\">Posljedice širenja lažnih vijesti su ozbiljne, uključujući utjecaj na političke procese, polarizaciju društva i stvaranje neprijateljstva među ljudima. Borba protiv njih zahtijeva zajednički napor vlada, tehnoloških kompanija, medijskih organizacija i samih korisnika interneta.</font></p><p><font color=\"#f7f7f7\">Na našoj akademiji imat ćemo sesiju posvećenu učenju o tehničkim alatima za zaštitu od lažnih vijesti. Ova sesija bit će fokusirana na predstavljanje različitih tehnoloških alata i metoda koji nam mogu pomoći u prepoznavanju, filtriranju i suzbijanju širenja dezinformacija na internetu.</font></p><p><font color=\"#f7f7f7\">Naš hakaton bit će prilika za praktičnu primjenu znanja o borbi protiv lažnih vijesti. Učesnici će imati mogućnost razvijati alate i tehnologije koji će pomoći u identificiranju i suzbijanju širenja dezinformacija na internetu.&nbsp;</font></p>', 0, NULL, '2024-05-10 18:16:46', '2024-05-10 18:16:46', NULL),
(29, 5, 'Slova u fokusu', 'Predavanje', '17:00', '18:15', '75', '2024-08-05', '2024-08-05 17:00:00', 1, 2, 'Predavanje koje prikazuje mogućnosti korišćenja slova u grafičkom dizajnu kao ključni vizuelni element. Fokusirajući se na određene projekte, biće prikazan proces razmišljanja i komunikacije sa klijentom..', 'Predavanje koje prikazuje mogućnosti korišćenja slova u grafičkom dizajnu kao ključni vizuelni element. Fokusirajući se na određene projekte, biće prikazan proces razmišljanja i komunikacije sa klijentom, te kako se od skice dolazi do finalnog rješenja koje istovremeno zadovoljava estetske i funkcionalne potrebe dizajna. Kroz razgovor o tome kako slova postaju moćan alat za komunikaciju i estetiku, otkrivamo da su ona beskonačan izvor inspiracije za svakog dizajnera.', 19, NULL, '2024-05-11 14:22:37', '2024-05-11 14:33:21', NULL),
(33, 5, 'Moć vizuelnog', 'Predavanje', '09:30', '11:00', '90', '2024-08-03', '2024-08-03 09:30:00', 0, 2, 'Da li možemo prepoznati propagandne elemente u vizulenim narativima kojima su naši neuroni svakodneno na udaru?', '<p><font color=\"#f7f7f7\">Poznata izreka „slika govori više od 1000 riječi“ metaforički prikazuje naše digitalno društvo. René Magritteova „ovo nije lula“ igrom riječi i slike otvara put Baudrillardovoj simulaciji naše stvarnosti. U okruženju vizuelnog zagađenja i pretrpanosti informacijama svoju privatnost smo žrtvovali, kako sjajno objašnjava Juval Noah Harari, „smiješnim videima o mačkama i besplatnoj usluzi e-maila“. </font></p><p><font color=\"#f7f7f7\">Da li možemo prepoznati propagandne elemente u vizulenim narativima kojima su naši neuroni svakodneno na udaru? U liberanom humanizmu „ljepota je u oku posmatrača“. Da li je današnji posmatrač / konzument vizuelnih narativa svjestan psihološko-semantičkih modaliteta manipulacije i u kojem smislu montaža vizuelnih informacija utiče na njega?<span style=\"font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); letter-spacing: 0px; text-align: var(--bs-body-text-align);\">Da li je lula u današnjem digitalnom simulakrumu postala stvarna? Jezikom statične i pokretne slike bavimo se svakodnevno, kao kreatori i primaoci vizuelnih podataka. Koji su sintaksički i interpuncijski elementi ovog jezika? Kako ga dešifrovati i upotrijebiti u kreaciji i dizajnu statičke i pokretne vizuelne naracije? O osnovnim elementima vizuelnog jezika statične slike i filmske naracije, kroz kompoziciju, psihološke efekte na posmatrača, semantiku pokretne slike, estetska obilježja i montažu priče, oslanjajući se na „gestaltnu“ prirodu našeg nesavršenog uma, ovdje istražujemo moć vizulenog.&nbsp;</span></font></p>', 23, NULL, '2024-05-11 15:12:46', '2024-05-11 15:12:46', NULL),
(30, 5, 'Od zvuka do slike: Dizajn i likovno oblikovanje u muzičkim žanrovima', 'Radionica', '11:00', '12:00', '60', '2024-08-03', '2024-08-03 11:00:00', 1, 2, 'Ovo predavanje istražuje duboko ukorijenjenu vezu između muzike, identiteta i dizajna, fokusirajući se na utjecaje subkultura koje su oblikovale omote ploča i vizualne identitete na prostoru EX YU.', '<div><font color=\"#f7f7f7\">Analizirat ćemo utjecaje različitih muzičkih pravaca na dizajn omota. Od rock i pop muzike do punka, novog vala, hip-hopa i elektronske muzike, svaki žanr je imao svoj prepoznatljiv i ponekad iznenađujući vizualni jezik. Kroz studije slučaja, istražujemo kako su ikonografski elementi i posebna estetika svakog žanra oblikovali prepoznatljive omote ploča koje su postale simbol vremena u kojem su nastali. Posebnu pažnju posvećujemo utjecaju različitih subkultura na dizajn - od buntovničkog duha punk scene do estetike klupskih kultura.</font></div><div><font color=\"#f7f7f7\"><br></font></div><div><font color=\"#f7f7f7\">Na kraju, razmatramo kako je digitalna era promijenila pristup dizajnu i oblikovanju u muzičkoj industriji. Dok su omoti ploča nekad bili glavni medij za vizualno izražavanje, danas se dizajn sve više prenosi na digitalne platforme. Istovremeno, naslijeđe i estetika prošlih vremena i dalje žive kroz revitalizaciju retro dizajna i nostalgične estetike.</font></div><div><font color=\"#f7f7f7\"><br></font></div><div><font color=\"#f7f7f7\">Na kraju predavanja ćemo analizirati neke od recentnijih dizajnerskih radova u kontekstu muzike, gledajući ih kao \"otvorene dokumente\", odnosno radove koji su još uvijek u nastanku. Otvorenom diskusijom i sugestijama na ovom primjeru proći ćemo kroz neke od principa dizajna za potrebe muzičke scene.</font></div>', 20, NULL, '2024-05-11 14:28:54', '2024-05-11 14:39:32', NULL),
(31, 5, 'Uvod u eksperimentalnu animaciju', 'Predavanje', '09:30', '10:15', '45', '2024-08-08', '2024-08-08 09:30:00', 1, 7, 'Prvi blok predavanja će biti posvećen eksperimentalnoj animaciji i animaciji izvan okvira filmskog formata. Učesnicima će biti pojašnjeni neki od osnovnih elemenata animacije kao što su dimenzija vremena, pokreta, korelacije sa zvukom i tajminga...', '<p><font color=\"#f7f7f7\">Prvi blok predavanja će biti posvećen eksperimentalnoj animaciji i animaciji izvan okvira filmskog formata. Učesnicima će biti pojašnjeni neki od osnovnih elemenata animacije kao što su dimenzija vremena, pokreta, korelacije sa zvukom i tajminga kroz kratki historijski osvrt i primjera eksperimentalne animacije iz nekoliko razdoblja.&nbsp;</font></p><div><br></div>', 21, NULL, '2024-05-11 14:58:23', '2024-05-11 14:59:19', NULL),
(32, 5, 'Sloboda i igra unutar projektnog zadatka', 'Predavanje', '17:00', '18:15', '75', '2024-08-06', '2024-08-06 17:00:00', 0, 2, 'Istraživanje ključnih pojmova unutar umjetničkog izražavanja. Pitamo se: \"Što znači sloboda u umjetničkom izražavanju?\" istovremeno istražujući ulogu igre u poticanju kreativnosti. Definirat ćemo ciljeve, metode i svrhu našeg istraživanja.', '<p><font color=\"#f7f7f7\">Istražit ćemo kako sloboda i igra mogu unaprijediti izvedbu i rezultate. Kroz demonstracije, pokazat ćemo primjere gdje su sloboda i igra djelovali kao ključni motivatori za izvanredne rezultate. Zajednički ćemo analizirati konačne rezultate i raspravljati o integraciji slobode i igre u naše radne procese. </font></p><p><font color=\"#f7f7f7\">U središtu rasprave bit će uslovi, izazovi, zahtjevi i opravdanost nekonvencionalnih pristupa. Razmotrit cemo argumentiranje sa teorijskih stanovišta kao  i praktičnih primjera onoga što zapravo zovemo pojmom slobode i igre ; zašto nam je taj pojam važan ; te kako naše vlastite slobode komuniciraju sa okolinom.</font></p><p><br></p>', 22, NULL, '2024-05-11 15:05:03', '2024-05-11 15:05:26', NULL),
(34, 5, 'Ghost Country', 'Predavanje', '09:30', '11:15', '105', '2024-08-04', '2024-08-04 09:30:00', 1, 2, 'Zasto je u glavama ljudi koji su rodjeni i poslije raspada Jugoslavije taj prostor jos uvijek jako prisutan i zivi?', '<p><font color=\"#f7f7f7\">Izvanredni uspjesi u oblasti dizajna i tehnologije dio su zaboravljene kulturne baštine bivše Jugoslavije. Radi se o modernističkoj arhitekturi, proizvodima zanimljivog kvaliteta i dizajna smještenim na osjetljiv način u vrijeme i prostor toga doba. Originalni, pristupačni i korisni proizvodi nastali su kao rezultat domaćeg znanja i bili su prvenstveno namijenjeni većinskom stanovništvu, radničkoj klasi.</font></p><p><font color=\"#f7f7f7\">Istražujemo zašto je retro dizajn danas toliko popularan I&nbsp; kako se prošlost reflektira u suvremenom dizajnu te&nbsp; kakav utjecaj ima na našu kulturu i identitet danas.</font></p>', 24, NULL, '2024-05-11 15:23:31', '2024-05-11 15:23:31', NULL),
(35, 5, 'Razumijevanje nostalgije- pogonsko gorivo za buducnost', 'Radionica', '12:00', '15:00', '180', '2024-08-04', '2024-08-04 12:00:00', 1, 2, 'Radionica ce se osvrnuti na kultne proizvode produkt dizajna Yugoslavije  propitivati estetske i sociološke kontekste jugoslavenskog dizajna kroz stvaranje modernih retro dizajnerskih koncepta', '<p><span style=\"background-color: rgb(255, 255, 0);\"><font color=\"#f7f7f7\">Radionica ce se osvrnuti na kultne proizvode produkt dizajna Yugoslavije&nbsp; propitivati estetske i sociološke kontekste jugoslavenskog dizajna kroz stvaranje modernih retro dizajnerskih koncepta</font></span></p>', 24, NULL, '2024-05-11 15:34:40', '2024-05-11 15:34:40', NULL),
(36, 5, 'Dizajn ambalaže: Od koncepta do kreativnosti', 'Radionica', '09:30', '10:15', '45', '2024-08-06', '2024-08-06 09:30:00', 1, 7, 'Predavanje o dizajnu ambalaže pruža sveobuhvatan uvid u ključne aspekte ovog područja, od osnovnih principa do trenutnih trendova i tehnologija', '<p><font color=\"#f7f7f7\">Otkrijte svijet dizajna ambalaže kroz interaktivno predavanje koje vas vodi kroz sve ključne aspekte ovog područja. Počevši od uvoda u dizajn ambalaže i razumijevanja procesa dizajna, do detaljne analize principa učinkovitog dizajna i primjene Gestalt principa. Dotaknut ćemo se i važnih tema o materijalima, održivosti, tehnici tiska i tehnologijama u razvoju. Kroz primjere i analize ambalaže iz različitih industrija, razvijat ćemo kritičko razmišljanje i estetsku osjetljivost. Na kraju, istražit ćemo trenutne trendove i tehnološke inovacije, te pružiti izvore i preporuke za daljnje istraživanje</font></p>', 25, NULL, '2024-05-11 15:44:04', '2024-05-11 15:49:08', NULL),
(37, 5, 'Behind the scenes: Case studies Studio Imeldy', 'Radionica', '10:30', '11:15', '45', '2024-08-06', '2024-08-06 10:30:00', 0, 7, 'Istrazujemo kreativnu viziju, inovativne pristupe i estetiku koja je oblikovala neke od najupečatljivijih ambalažnih rješenja Studia Imeldy', '<p><font color=\"#f7f7f7\">Istrazujemo kreativnu viziju, inovativne pristupe i estetiku koja je oblikovala neke od najupečatljivijih ambalažnih rješenja Studia Imeldy</font></p>', 25, NULL, '2024-05-11 15:45:13', '2024-05-11 15:45:13', NULL),
(38, 5, 'Jeste vidjeli onaj bilbord?', 'Predavanje', '09:30', '11:00', '90', '2024-08-05', '2024-08-05 09:30:00', 1, 2, 'Predavanje će vas provesti kroz umjetnost humorističnog slogana i stvaranja nezaboravnih poruka. Istražujemo kako spojiti tipografiju, marketinške poruke i balkanski humor...', '<p><font color=\"#f7f7f7\">Predavanje će vas provesti kroz umjetnost humorističnog slogana i stvaranja nezaboravnih poruka. Istražujemo kako spojiti tipografiju, marketinške poruke i balkanski humor na jedinstven nacin. Propitujemo nacine na koje tipografija može prenijeti poruku kad slika ne može, otkrivajući tajne iza genijalnih slogana. Zajedno ćemo istražiti moć tipografije u stvaranju nezaboravnih marketinških poruka koje odražavaju naš balkanski identitet.</font></p>', 26, NULL, '2024-05-11 15:54:11', '2024-05-11 15:54:11', NULL),
(39, 5, 'Stop nasilju nad grafičkim dizajnom', 'Radionica', '11:00', '15:00', '240', '2024-08-05', '2024-08-05 11:00:00', 0, 2, 'Ova interaktivna radionica vodi učesnike kroz svijet tipografije s fokusom na suzbijanje negativnih tendencija u dizajnu.', '<p><font color=\"#f7f7f7\">Ova interaktivna radionica vodi učesnike kroz svijet tipografije s fokusom na suzbijanje negativnih tendencija u dizajnu. Kroz kreativne aktivnosti i diskusije, otkrivamo kako tipografija može biti moćno sredstvo za prenošenje pozitivnih poruka i inspiriramo se da oblikujemo bolju budućnost grafickog dizajna.</font></p>', 26, NULL, '2024-05-11 15:55:22', '2024-05-11 15:55:22', NULL),
(40, 5, 'Plakat kao generator promjene', 'Radionica', '09:30', '12:00', '150', '2024-08-07', '2024-08-07 09:30:00', 1, 7, 'Predavanje koje istražuje moć plakata kao sredstva za pokretanje društvenih i kulturnih promjena. Kroz analizu ikoničnih primjera i kreativnih pristupa, ovo predavanje otkriva kako dizajn plakata može utjecati na percepciju, informisanost i mobilizaciju ljudi u različitim kontekstima.', '<p><font color=\"#f7f7f7\">Pregled povijesti plakata: Razmatranje evolucije plakata kao umjetničkog i komunikacijskog medija kroz različite historijske periode i društvene kontekste.</font></p><p><font color=\"#f7f7f7\">Analiza utjecaja plakata: Istraživanje kako su plakati kroz povijest uticali na promociju ideja, političkih pokreta, društvenih inicijativa i kulturnih događaja.</font></p><p><font color=\"#f7f7f7\">Tehnički aspekti dizajna plakata: Rasprava o metodama i tehnologijama koje se koriste u dizajniranju i proizvodnji plakata, kao i o estetskim i funkcionalnim principima dizajna.</font></p><p><font color=\"#f7f7f7\">Primjeri iz prakse: Pregled ikoničnih plakata i studija slučaja koji su imali značajan utjecaj na društvo i kulturu, uz analizu njihovog dizajna i poruka koje prenose.</font></p><div><br></div>', 27, NULL, '2024-05-11 16:03:28', '2024-05-11 16:03:28', NULL),
(41, 5, 'Animacija u 22. vijeku', 'Predavanje', '17:00', '18:15', '75', '2024-08-08', '2024-08-08 17:00:00', 1, 2, 'Animacija u 22. vijeku - Zašto uopšte učiti i koristiti animaciju u nadolazećem vremenu automatizacije, mašinskog učenja i kreativnih alata koji ubrzavaju, pa čak i mijenjaju animatore?', '<p><font color=\"#f7f7f7\">Animacija u 22. vijeku - Zašto uopšte učiti i koristiti animaciju u nadolazećem vremenu automatizacije, mašinskog učenja i kreativnih alata koji ubrzavaju, pa čak i mijenjaju animatore?</font></p>', 28, NULL, '2024-05-11 16:09:03', '2024-05-11 16:09:55', NULL),
(42, 5, 'Animacija u 22. vijeku', 'Predavanje', '17:00', '18:15', '75', '2024-08-08', '2024-08-08 17:00:00', 1, 2, 'Animacija u 22. vijeku - Zašto uopšte učiti i koristiti animaciju u nadolazećem vremenu automatizacije, mašinskog učenja i kreativnih alata koji ubrzavaju, pa čak i mijenjaju animatore?', '<p><font color=\"#f7f7f7\">Animacija u 22. vijeku - Zašto uopšte učiti i koristiti animaciju u nadolazećem vremenu automatizacije, mašinskog učenja i kreativnih alata koji ubrzavaju, pa čak i mijenjaju animatore?</font></p>', 0, NULL, '2024-05-11 16:09:13', '2024-05-11 16:09:43', '2024-05-11 16:09:43'),
(43, 5, 'Animacija u 22. vijeku', 'Predavanje', '17:00', '18:15', '75', '2024-08-08', '2024-08-08 17:00:00', 1, 2, 'Animacija u 22. vijeku - Zašto uopšte učiti i koristiti animaciju u nadolazećem vremenu automatizacije, mašinskog učenja i kreativnih alata koji ubrzavaju, pa čak i mijenjaju animatore?', '<p><font color=\"#f7f7f7\">Animacija u 22. vijeku - Zašto uopšte učiti i koristiti animaciju u nadolazećem vremenu automatizacije, mašinskog učenja i kreativnih alata koji ubrzavaju, pa čak i mijenjaju animatore?</font></p>', 28, NULL, '2024-05-11 16:09:14', '2024-05-11 16:09:30', '2024-05-11 16:09:30'),
(44, 3, 'Zvuk na filmu (od početka do kraja) -  Dan 1.', 'Radionica', '09:00', '15:00', '360', '2024-08-07', '2024-08-07 09:00:00', 1, 10, 'Dvodnevna radionica sa Mirzom Tahirovićem će vas upoznati sa svim aspektima zvuka na filmu. Od tehnika snimanja, preko osnovnih principa montaže zvuka, do samog miksa...', '<p><font color=\"#f7f7f7\">Dvodnevna radionica sa Mirzom Tahirovićem će vas upoznati sa svim aspektima zvuka na filmu. Od tehnika snimanja, preko osnovnih principa montaže zvuka, do samog miksa, polaznici će uz kvalitetno mentorstvo praktično proći sve dimenzije rada na zvuku filma i to na pažljivo izabranim primjerima scena iz popularnih filmova. Ova intenzivna radionica otkrit će šta je sve uloga zvuka na filmu i koliko je ona zapravo bitna, ali oktrit će i ono najbitnije, a to su načini do kojih se dolazi do neophodne kvalitete pri snimanju, montaži i obradi zvuka za film. </font></p>', 29, NULL, '2024-05-11 16:33:13', '2024-05-11 16:33:59', NULL),
(45, 3, 'Zvuk na filmu (od početka do kraja)  - Dan 2.', 'Radionica', '09:00', '15:00', '360', '2024-08-08', '2024-08-08 09:00:00', 1, 10, 'Dvodnevna radionica sa Mirzom Tahirovićem će vas upoznati sa svim aspektima zvuka na filmu. Od tehnika snimanja, preko osnovnih principa montaže zvuka, do samog miksa...', '<p>Dvodnevna radionica sa Mirzom Tahirovićem će vas upoznati sa svim aspektima zvuka na filmu. Od tehnika snimanja, preko osnovnih principa montaže zvuka, do samog miksa, polaznici će uz kvalitetno mentorstvo praktično proći sve dimenzije rada na zvuku filma i to na pažljivo izabranim primjerima scena iz popularnih filmova. Ova intenzivna radionica otkrit će šta je sve uloga zvuka na filmu i koliko je ona zapravo bitna, ali oktrit će i ono najbitnije, a to su načini do kojih se dolazi do neophodne kvalitete pri snimanju, montaži i obradi zvuka za film.&nbsp;</p>', 29, NULL, '2024-05-11 16:35:31', '2024-05-11 16:35:31', NULL),
(46, 3, 'Moć muzike u filmu, tv seriji ili pozorišnoj predstavi', 'Radionica', '09:00', '15:00', '360', '2024-08-05', '2024-08-05 09:00:00', 1, 9, 'Na ovoj radionici ćemo se upoznati sa mogućnošćima muzike da odrede emociju u filmu, tv seriji ili pozorišnoj predstavi.', '<p><font color=\"#f7f7f7\">Na ovoj radionici ćemo se upoznati sa mogućnošćima muzike da odrede emociju u filmu, tv seriji ili pozorišnoj predstavi. Kroz praktične primjere u kojima će grupe sastavljene od polaznika programa dobiti istu scenu, ali različitu emociju koju trebaju da ostvare kroz svoju muziku, Dino Šukalo će kroz svoje iznimno znanje i iskustvo mentorisati proces, te savjetovati polaznike u koracima i pristupu kreairanju muzike na osnovu određenih tehnika i različitih pristupa.&nbsp;</font></p>', 30, NULL, '2024-05-11 16:42:01', '2024-05-11 16:42:01', NULL),
(47, 3, 'Muzička produkcija “3u1”', 'Radionica', '09:00', '15:00', '360', '2024-08-06', '2024-08-06 09:00:00', 0, 8, 'Na ovoj izuzetno zanimljivoj radionici, sa Markom ćete proći proces stvaranje pjesme iz vizure pojedinca koji je ujedno  autor, producent i izvođač. Koristeći sve resurse koje pojedinac može da posjeduje, u ovoj radionici otkrivamo nove mogućnosti koje nam pružaju tehnologije....', '<p><font color=\"#f7f7f7\">Na ovoj izuzetno zanimljivoj radionici, sa Markom ćete proći proces stvaranje pjesme iz vizure pojedinca koji je ujedno&nbsp; autor, producent i izvođač. Koristeći sve resurse koje pojedinac može da posjeduje, u ovoj radionici otkrivamo nove mogućnosti koje nam pružaju tehnologije u kombinaciji sa tradicionalnim instrumentima i tehnikama, kako bi se kreirala pjesma od inicijalne ideje do završne realizacije. Hands-on pristup u kojem će polaznici raditi na svojim autorskim pjesmama je najbolji način da se otkriju nove mogućnosti stvaranja pjesama sa ograničenim ljudskim resursima.&nbsp;</font></p>', 31, NULL, '2024-05-11 16:46:46', '2024-05-11 16:46:46', NULL),
(48, 3, 'Popularna muzika i mehanizmi muzičke industrije', 'Predavanje', '09:00', '12:00', '180', '2024-08-07', '2024-08-07 09:00:00', 0, 2, 'Na predavanju “Popularna muzika i mehhanizmi muzičke industrije” uronit ćemo u sferu popularne muzike koja seže od teorije pa do same prakse. Od historije popularne muzike, načina analize i razumijevanja popularne muzike, pa sve do produkcije i mehanizama po kojima sama muzička industrija djeluje...', '<p><font color=\"#f7f7f7\">Na predavanju “Popularna muzika i mehhanizmi muzičke industrije” uronit ćemo u sferu popularne muzike koja seže od teorije pa do same prakse. Od historije popularne muzike, načina analize i razumijevanja popularne muzike, pa sve do produkcije i mehanizama po kojima sama muzička industrija djeluje, ovo predavanje nas uvodu u sveobuhvatni svijet popularne muzike sa znanstvenog, ali i praktičnog aspekta.&nbsp;</font></p>', 32, NULL, '2024-05-11 16:52:27', '2024-05-11 16:52:27', NULL),
(49, 3, 'Komponovanje muzike za Film, TV i Video Igre', 'Predavanje', '09:00', '12:00', '180', '2024-08-08', '2024-08-08 09:00:00', 0, 2, 'Kroz svoje dugogodišnje obrazovanje na prestižnim obrazovnim instutucijama, ali i kroz svoje veliko iskustvo, Ana Krstajić, koja danas važi za jednu od najboljih i najperspektivnijih kompozitorki, će nas voditi kroz proces komponovanja za Film, TV i Video Igre...', '<p><font color=\"#f7f7f7\">Kroz svoje dugogodišnje obrazovanje na prestižnim obrazovnim instutucijama, ali i kroz svoje veliko iskustvo, Ana Krstajić, koja danas važi za jednu od najboljih i najperspektivnijih kompozitorki, će nas voditi kroz proces komponovanja za Film, TV i Video Igre. Kako izgleda pristup radu kada je u pitanju kompozicija u navedenim segmentima, na koji način se formira proces rada, što je bitno što ne, koliko je kompozitoru danas bitno tehničko znanje produkcije i još mnogo toga ćete čuti na ovom predavanju.&nbsp;</font></p>', 33, NULL, '2024-05-11 17:01:33', '2024-05-11 17:01:33', NULL),
(50, 3, 'KomP(S)Ilacija – Komunikacija, psihologija i muzika', 'Radionica', '09:00', '12:00', '180', '2024-08-09', '2024-08-09 09:00:00', 1, 2, 'Kako da ostavim dobar utisak na sceni? Kako da bolje predstavim sebe (i svoje ideje)? Kako da postanem bolji timski igrač? Kako da se zauzmem za sebe (i svoje ideje), a da ne povredim druge? Ako ste ikada sebi postavili barem jedno od ovih pitanja, onda je “KomP(S)Ilacija” pravo predavanje za vas.', '<p><font color=\"#f7f7f7\">Kako da ostavim dobar utisak na sceni? Kako da bolje predstavim sebe (i svoje ideje)? Kako da postanem bolji timski igrač? Kako da se zauzmem za sebe (i svoje ideje), a da ne povredim druge? Ako ste ikada sebi postavili barem jedno od ovih pitanja, onda je “KomP(S)Ilacija” pravo predavanje za vas. Kroz primere i vežbe zajedno ćemo raditi na sticanju veština koje nam mogu pomoći da bolje komuniciramo sa članovima benda/ansambla, sa publikom, sa mogućim poslodavcima</font></p>', 34, NULL, '2024-05-11 17:06:05', '2024-05-11 17:06:05', NULL),
(51, 2, 'S druge strane kamere', 'Radionica', '10:00', '12:00', '120', '2024-08-04', '2024-08-04 10:00:00', 1, 2, 'Praktična vježba s onu strane kamere će polaznike odsjeka na novinarstvo staviti u poziciju suprotnu od one na koju su navikli, s druge strane objektiva.', '<p><font color=\"#f7f7f7\">Praktična vježba s onu strane kamere će polaznike odsjeka na novinarstvo staviti u poziciju suprotnu od one na koju su navikli, s druge strane objektiva. Budući da je za novinare u 21. stoljeću iskustvo ispred objektiva podjedanko važno kao i znanje vođenje intervjua, ova radionica će naučiti mlade reportere osnove govora tijela, vizualnog kontakta i samouvjerenosti, posebno pri snimanju uživo. Kroz ovo iskustvo polaznike će voditi Vladimir Čolaković, novinars s iskustvom u svim relevantnim državnim televizijama. </font></p>', 35, NULL, '2024-05-11 17:39:08', '2024-05-11 17:39:27', NULL),
(52, 2, 'Paket prve pomoći: alati i strategije za borbu protiv dezinformacija', 'Radionica', '12:00', '14:00', '120', '2024-08-05', '2024-08-05 12:00:00', 0, 2, 'Radionica pokriva pitanja provjerljivosti tvrdnji, analizu deepfake i drugih AI sadržaja, foto i video forenziku. Učesnici će kroz praktične zadatke moći da provjere svoje umijeće detektovanja dezinformacija i bit će upoznati s alatima koji im u tome mogu pomoći.', '<p><font color=\"#f7f7f7\">Radionica pokriva pitanja provjerljivosti tvrdnji, analizu deepfake i drugih AI sadržaja, foto i video forenziku. Učesnici će kroz praktične zadatke moći da provjere svoje umijeće detektovanja dezinformacija i bit će upoznati s alatima koji im u tome mogu pomoći.&nbsp;</font></p>', 36, NULL, '2024-05-11 17:43:51', '2024-05-11 17:43:51', NULL),
(53, 2, 'Elementi kompozicije u fotografiji', 'Radionica', '11:00', '13:00', '120', '2024-08-03', '2024-08-03 11:00:00', 1, 2, 'Predavanje je posvećeno kompoziciji u fotografiji. Kroz primjere iz vlastite karijere, Damir Šagolj, fotograf nagrađen Pulitzerovom nagradom studentima će približiti osnove kompozicije za vizuelne medije.', '<p><font color=\"#f7f7f7\">Predavanje će istražiti suštinske elemente kompozicije u fotografiji, nudeći uvid u kako vizualno organizovati elemente u jedinstvenu i efektnu cjelinu. Kroz bogat spektar primjera iz moje karijere, istražit ćemo ključne principe kompozicije, uključujući ravnotežu, proporciju, ritam i perspektivu. Osim što ćemo analizirati fotografije, istražit ćemo i kako ovi principi mogu biti primijenjeni na komponiranje drugih vizualnih medija poput slikarstva ili filmske režije. Ovo interaktivno predavanje će pružiti učesnicima alate i tehnike za stvaranje snažnih i emotivno poticajnih kompozicija u njihovim radovima, bez obzira na medij.</font></p>', 37, NULL, '2024-05-11 17:48:42', '2024-05-11 17:48:42', NULL),
(54, 2, 'Šta jeste, a šta nije istraživačko novinarstvo i kako se to radi?', 'Radionica', '10:00', '14:00', '240', '2024-08-08', '2024-08-08 10:00:00', 1, 2, 'Polaznici će se upoznati s razlikama između istraživačkog i izvještavačkog novinarstva, historijom i značajnim odlikama uspješnog istraživačkog novinarstva. Na praktičnim primjerima, kroz radionicu će se proći kroz strategije i značajne metode, tehnike i znanja potrebne istraživačkim novinarima.', '<p><font color=\"#f7f7f7\">U prvom segmentu radionice, polaznici će se upoznati s razlikama između istraživačkog novinarstva (IN) i izvještačkog, upoznati se sa kratkom istorijom IN, njegovim savremenim oblicima u komercijalnom i civilnom sektoru, kao i uticaju IN u svetu i regionu. Drugi segment će polaznicima pružiti priliku da na praktičnim primjerima razumiju važnost strategije istraživanja i najvažnijih metoda, tehnika i znanja koja koriste istraživački novinari: rada sa živim izvorima, rada s bazama podataka, timskog rada, bezbjednosti (izvora, novinara i podataka), provjere činjenica i etičkog i legalističkog pristupa istraživanju i produkciji istraživačkih priča i drugih medijskih proizvoda.</font></p><p><font color=\"#f7f7f7\">Na kraju radionice, polaznici će s trenerom razgovarati o svrsi i uticaju istraživačkog novinarstva na društvo, javni interes i građane. Radionica će sadržati simulacije realnih situacija u istraživačkom novinarstvu, praktične vežbe, diskusije, debate i druge metode transfera znanja.</font></p><div><br></div>', 38, NULL, '2024-05-11 17:53:18', '2024-05-11 17:53:18', NULL),
(55, 2, 'Cutting through the noise; listening beyond silences', 'Radionica', '00:00', '00:00', '0', '2024-08-09', '2024-08-09 00:00:00', 1, 7, 'Predavanje i vježbe istražuju fenomen nezainteresovanosti za tuđu patnju i ulogu novinara u uključivanju/isključivanju drugih u kontekstu društvene pravde u svijetu zasićenom informacijama. Potiče se razmišljanje o tome šta možemo učiniti kao potrošači medija, ali i kao ambiciozni mladi novinari.', '<p><font color=\"#f7f7f7\">Ignorisanje, odbacivanje ili čak ostajanje potpuno nesvjesnima priča onih koji su ostavljeni da se bore sami moža je postalo lako i može se činiti jednostavnijim u svijetu koji proizvodi toliko sadržaja i nudi beskrajne mogućnosti za čitanje, gledanje i slušanje. Usred te kakofonije, rizikujemo da neobraćanje pažnje postane naša norma. Ovdje naša uloga novinara postaje kritična. Kako u takvim kontekstima preispitati i osnažiti naše prakse, kako bismo uvijek ostali pažljivi? Koga uključujemo i važnije, koja isključujemo? Koga dalje marginalizujemo? Kako pravdu, empatiju I solidarnost učiniti središtem našeg novinarstva?</font></p>', 39, NULL, '2024-05-11 17:59:25', '2024-05-11 17:59:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programs__sessions_attendees`
--

CREATE TABLE `programs__sessions_attendees` (
  `id` bigint UNSIGNED NOT NULL,
  `program_id` bigint UNSIGNED NOT NULL,
  `attendee_id` bigint UNSIGNED NOT NULL,
  `app_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in_queue',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs__sessions_files`
--

CREATE TABLE `programs__sessions_files` (
  `id` bigint UNSIGNED NOT NULL,
  `session_id` bigint UNSIGNED NOT NULL,
  `file_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs__sessions_files`
--

INSERT INTO `programs__sessions_files` (`id`, `session_id`, `file_id`, `created_at`, `updated_at`) VALUES
(8, 2, 51, '2024-04-21 10:35:24', '2024-04-21 10:35:24'),
(7, 1, 50, '2024-04-21 10:30:23', '2024-04-21 10:30:23'),
(4, 1, 5, '2024-04-18 15:12:33', '2024-04-18 15:12:33'),
(9, 2, 52, '2024-04-21 10:35:31', '2024-04-21 10:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `programs__sessions_links`
--

CREATE TABLE `programs__sessions_links` (
  `id` bigint UNSIGNED NOT NULL,
  `session_id` bigint UNSIGNED NOT NULL,
  `value` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs__sessions_links`
--

INSERT INTO `programs__sessions_links` (`id`, `session_id`, `value`, `link`, `created_at`, `updated_at`) VALUES
(2, 1, 'Test 2', 'sadsa', '2024-04-21 09:39:47', '2024-04-21 09:39:47'),
(4, 1, 'Test 33', 'sadsad', '2024-04-21 09:41:14', '2024-04-21 09:41:14'),
(8, 2, 'Twiitter', 'www.twitter.com', '2024-04-21 10:35:41', '2024-04-21 10:35:41'),
(10, 1, 'www.google.ba', 'https://www.google.ba/', '2024-04-22 16:52:05', '2024-04-22 16:52:05'),
(11, 1, 'Github Repo', 'https://github.com/alkaris-d-o-o', '2024-04-22 16:52:32', '2024-04-22 16:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `programs__sessions_notes`
--

CREATE TABLE `programs__sessions_notes` (
  `id` bigint UNSIGNED NOT NULL,
  `attendee_id` bigint UNSIGNED NOT NULL,
  `session_id` bigint UNSIGNED NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs__sessions_notes`
--

INSERT INTO `programs__sessions_notes` (`id`, `attendee_id`, `session_id`, `note`, `created_at`, `updated_at`) VALUES
(30, 2, 4, 'sadsad', '2024-04-23 15:40:20', '2024-04-23 15:40:20'),
(29, 2, 4, 'sadsa', '2024-04-23 15:40:18', '2024-04-23 15:40:18'),
(27, 2, 8, 'sadsadsa', '2024-04-23 15:39:34', '2024-04-23 15:39:34'),
(28, 2, 4, 'sadsadsa', '2024-04-23 15:40:16', '2024-04-23 15:40:16'),
(20, 2, 1, 'hehehe', '2024-04-23 15:33:33', '2024-04-23 15:33:33'),
(16, 2, 1, 'Mislim da imamo problem, ali okay je :D', '2024-04-22 17:07:13', '2024-04-22 17:07:13'),
(19, 2, 1, 'test', '2024-04-23 15:33:27', '2024-04-23 15:33:27'),
(18, 4, 1, 'Yea babe!', '2024-04-22 17:07:25', '2024-04-22 17:07:25'),
(21, 2, 1, 'sadsad', '2024-04-23 15:33:35', '2024-04-23 15:33:35'),
(22, 2, 4, 'sadsa', '2024-04-23 15:34:23', '2024-04-23 15:34:23'),
(23, 2, 10, 'wee', '2024-04-23 15:37:21', '2024-04-23 15:37:21'),
(24, 2, 10, 'Helllo there !', '2024-04-23 15:37:50', '2024-04-23 15:37:50'),
(31, 2, 8, 'Weee', '2024-04-23 15:41:38', '2024-04-23 15:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ZB7fuVPdqiyoASElFvgojVBdAfSDB4d2ma165mvx', NULL, '192.168.0.61', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzV6TEhqcVltT0FsTTJZSVBXR3VWa1JZMzB5M3RGQkRUS3FTMm9OdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly8xOTIuMTY4LjAuMTE6ODAwMC9wcm9ncmFtcy9zbmVhay1hbmQtcGVlay8xLzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1714318930),
('RZgGUdTkH7Op7AhdEjtigFHWT0sTBewCG6g2pxdL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoidlZROHk5TW8xS0o0WGJpdG14a3F0VlpOZjNzQko0N2NwUUdKbVVVSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1714971265),
('BKQaBztEyRmgEkEzwwtnoixLkDrMX3YImgjoIU8W', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS0JNZEZBaDdnckl0ZlBJTlQ1dHUzT3VDQUxkWGREeGtKR1ZIUzFPbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1714316451),
('ElrWpwyUzkF7XeHrPQEkzuEpRVL2PW2ZSi0ianYk', NULL, '192.168.0.65', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_2_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.2 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHlhUjdCU2NWYlpRZE5udFUzVUFsOXRPVENvUHJNeE1HcmhiTlVSZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly8xOTIuMTY4LjAuMTE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1714318682),
('pOR7gVXT6RsTdfiZbROt3p0myKpUdBscIIkjjtJz', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidk05MkFtdXlWdnpMdHBUYWpDSDVKc1FwUkRMbkRnZTkzenROZGU1YiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NTM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zeXN0ZW0vYWRtaW4vcHJvZ3JhbXMvcHJldmlldy8xIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1714320396),
('114ynUi9U9jc6EQew7zOF1VUfnCLKqFsMzSrhFsN', NULL, '192.168.0.62', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0o3TkFFbjlLaTNSUkdCajVuVk9ncUdLdTY5YjIxZGNPbFh5ZFVyTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly8xOTIuMTY4LjAuMTE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1714312007);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` int NOT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `photo_uri` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presenter_role` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `interview` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `api_token`, `remember_token`, `role`, `phone`, `birth_date`, `address`, `city`, `country`, `about`, `photo_uri`, `instagram`, `facebook`, `twitter`, `linkedin`, `web`, `title`, `institution`, `presenter_role`, `short_description`, `description`, `interview`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'John Doe 2', 'john-doe', 'john@doe.com', '2024-04-16 19:22:32', '$2y$12$jHBo2a5v9xW7dOUscZ836.j1LMLH3sj1kzUP5pDeB8L3S1p1E.Jl.', '6a3f778af7cdd7e3beee12884d6b8dabd33dad476dc8bb9e1f1fd9574dd895c0', NULL, 'user', '38761225883', '2020-01-20', 'Jonhs address', 'New York', 21, 'Eee easa', '937be4fe5f51bed98a5ce70cfc28679e.png', 'ii', 'aa', 'https://twitter.com/i/flow/login?redirect_after_login=%2Fvbetocv', 'https://ba.linkedin.com/', 'https://alkaris.com/', '', '', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nWhere does it come from?\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Why do we use it?\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n\nWhere can I get some?\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2024-04-16 17:22:25', '2024-05-10 08:43:32', NULL),
(2, 'Aladin Kapić', 'aladin-kapic', 'aladin.kapic@alkaris.com', NULL, '$2y$12$fcMO1NXQyrq.GuBHNzTw5.JbQ7OT36QE5Yx1b2L/icVV8waSJUeCO', '15c870a5723bdcb6c434c32cfe423de814608cdfbd1b5339da6c9ddc96170a96', NULL, 'admin', '38761683449', '2024-04-17', 'sadsa', 'dsad', 1, 'tito i dino', 'a7fda60f5b243942b9f0e782c442ed61.png', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '2024-04-17 14:54:21', '2024-05-09 22:07:57', NULL),
(3, 'Santiago Zarate - demo', 'admira-keric', '#', '2024-04-16 19:22:32', '$2y$12$jHBo2a5v9xW7dOUscZ836.j1LMLH3sj1kzUP5pDeB8L3S1p1E.Jl.', '6a3f778af7cdd7e3beee12884d6b8dabd33dad476dc8bb9e1f1fd9574dd895c0', NULL, 'user', '#', '2020-01-20', '#', 'Munich', 59, 'Eee easa', '6ff6827c61ec5a20f641162e343053e9.jpg', 'sdsadsa', 'aa', 'ee', NULL, 'cc', '', '', '', 'Venezuelan living in Germany; Product Owner of the SUSE Quality Engineering Core team;', 'Santiago je Veneculeanac koji živi u Njemačkoj i koji je preko 30 godina aktivan član i zaljubljenik u Free i Open Source zajednicu.  Pored članstva u različitim Open Source zajednicama dio je openSUSE zajednice koja stoji iza jedne od najvažnijih Linux distribucija današnjice SUSE Linuxa unutar koje radi kao Product Owner of the SUSE Quality Engineering Core Team. \n\nSantiago obožava raditi kao edukator i dijeliti znanja stečena u govoto 30 godina profesionalnog angažmana.  Na Helem Nejse Talent Akademiji biće u svojstvu mentora grupe za odgovorno kodiranje, pa će polaznici ovog programa imati konstantnu podršku ovo izrazitog stručnjaka.', NULL, '2024-04-16 17:22:25', '2024-05-10 08:48:42', NULL),
(4, 'Murat Đulin', 'murat-dulin', 'murat@gmail.com', NULL, '$2y$12$wTzz416P8uKA0leAcZ4tNuQ5Gfzof2xSZcl7/pgdicd5ON5zpC21u', 'b96d53fa0c1cbb34670ac294d69a5bf42c468a39d686e1b3f9e1edd8e48081b4', NULL, 'user', '38762225885', '1953-08-24', 'Kapići br. 17', 'Cazin', 21, NULL, 'c6b3ce50871769e87a45de36a2eb62bb.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-20 07:59:55', '2024-05-09 21:03:39', NULL),
(5, 'Šemsa Suljaković', 'the-semsa', 'semsa@suljakovic.ba', '2024-04-16 19:22:32', '$2y$12$jHBo2a5v9xW7dOUscZ836.j1LMLH3sj1kzUP5pDeB8L3S1p1E.Jl.', '6a3f778af7cdd7e3beee12884d6b8dabd33dad476dc8bb9e1f1fd9574dd895c0', NULL, 'user', '38761225883', '2020-01-20', 'Jonhs address', 'New York', 21, 'Eee easa', '314cf5bb061941128ed8b56fb6a845ec.png', 'ii', 'aa', 'ee', 'https://ba.linkedin.com/', '', '', '', '', NULL, 'aa', NULL, '2024-04-16 17:22:25', '2024-05-10 08:41:50', NULL),
(6, 'Lepa Brena', 'brena', 'lepa@brena.ba', '2024-04-16 19:22:32', '$2y$12$jHBo2a5v9xW7dOUscZ836.j1LMLH3sj1kzUP5pDeB8L3S1p1E.Jl.', '6a3f778af7cdd7e3beee12884d6b8dabd33dad476dc8bb9e1f1fd9574dd895c0', NULL, 'user', '38761225883', '2020-01-20', 'Jonhs address', 'New York', 21, 'Eee easa', '314cf5bb061941128ed8b56fb6a845ec.png', 'ii', 'aa', 'https://twitter.com/i/flow/login?redirect_after_login=%2Fvbetocv', NULL, 'cc', '', '', '', 'Keynote speaker', 'ee', NULL, '2024-04-16 17:22:25', '2024-05-10 08:42:14', NULL),
(7, 'Joca Amsterdam', 'brenaa', 'lepa@brena.baa', '2024-04-16 19:22:32', '$2y$12$jHBo2a5v9xW7dOUscZ836.j1LMLH3sj1kzUP5pDeB8L3S1p1E.Jl.', '6a3f778af7cdd7e3beee12884d6b8dabd33dad476dc8bb9e1f1fd9574dd895c0', NULL, 'user', '38761225883', '2020-01-20', 'Jonhs address', 'New York', 21, 'Eee easa', '314cf5bb061941128ed8b56fb6a845ec.png', 'ii', 'aa', 'https://twitter.com/i/flow/login?redirect_after_login=%2Fvbetocv', NULL, 'cc', '', '', '', 'Keynote speaker', 'aa', NULL, '2024-04-16 17:22:25', '2024-05-10 08:42:37', NULL),
(8, 'Tetka Rasema', 'brenaaaa', 'lepa@brena.baaa', '2024-04-16 19:22:32', '$2y$12$jHBo2a5v9xW7dOUscZ836.j1LMLH3sj1kzUP5pDeB8L3S1p1E.Jl.', '6a3f778af7cdd7e3beee12884d6b8dabd33dad476dc8bb9e1f1fd9574dd895c0', NULL, 'user', '38761225883', '2020-01-20', 'Jonhs address', 'New York', 21, 'Eee easa', '314cf5bb061941128ed8b56fb6a845ec.png', 'ii', 'aa', 'https://twitter.com/i/flow/login?redirect_after_login=%2Fvbetocv', NULL, 'cc', '', '', '', 'Keynote speaker', 'ee', NULL, '2024-04-16 17:22:25', '2024-05-10 08:42:50', NULL),
(9, 'Boris Brkan', 'brenac', 'lepa@brena.baaaa', '2024-04-16 19:22:32', '$2y$12$jHBo2a5v9xW7dOUscZ836.j1LMLH3sj1kzUP5pDeB8L3S1p1E.Jl.', '6a3f778af7cdd7e3beee12884d6b8dabd33dad476dc8bb9e1f1fd9574dd895c0', NULL, 'user', '38761225883', '2020-01-20', 'Jonhs address', 'New York', 21, 'Eee easa', '314cf5bb061941128ed8b56fb6a845ec.png', 'ii', 'aa', 'https://twitter.com/i/flow/login?redirect_after_login=%2Fvbetocv', NULL, 'cc', '', '', '', 'Keynote speaker', NULL, NULL, '2024-04-16 17:22:25', '2024-05-10 08:43:02', NULL),
(10, 'user', 'boris-brkan', 'boris@gmail.com', NULL, '$2y$12$etgAmukF1yZ0eSTz5pqOFeUMnpoMdbnEYPyGwebyhsZnkwORaEQhC', '34a45fc04f67bb2c1eb4af68a0439bab7201e21ef2fd893a1468cad7f472d628', NULL, 'user', '38762456669', '1964-11-17', 'Elidža BB', 'Sarajevo', 21, NULL, '89ee638efdd3347a8a2689b8d5e8458f.png', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, '2024-04-21 13:47:05', '2024-05-10 15:52:38', NULL),
(11, 'Boris Brkan', 'boris-brkan1', 'brkanboris@gmail.com', NULL, '$2y$12$7ASsTzRDoZ0SaPIW1Yrc/ubipHr12mZsYu7BEkbseLHqiheAtlE6W', '258d239e2ada42519fe26924d0dfc7878905e91d46bc9f002153f7dc888a9ff3', NULL, 'presenter', '4', '1981-02-11', 'Džemala Bijedića 309', 'Sarajevo', 21, 'Ja sam kralj!', '1d594d10c348f08b6ce49c4f4a2d8953.jpg', 'https://www.instagram.com/kviz.znzkvi/', 'https://www.facebook.com/kviz.znzkvi', NULL, NULL, 'www.ekipa.ba', NULL, NULL, 'Lecturer', 'Jedan od osnivača Fondacije Ekipa iz Sarajeva. Diplomirao je računarstvo i informatiku na Elektrotehničkom fakultetu u Sarajevu, istovremeno postavši jedan od pionira područja informacionih tehnologija poznatih kao Civic Tech.', 'Jedan od osnivača Fondacije Ekipa iz Sarajeva koja promoviše nezavisnu kulturu i umjetnost te razvija i producira neke od najznačajnijih i najpopularnijih medijskih i igranih sadržaja u Bosni i Hercegovini i širem regionu. Diplomirao je računarstvo i informatiku na Elektrotehničkom fakultetu u Sarajevu, istovremeno postavši jedan od pionira područja informacionih tehnologija poznatih kao Civic Tech.\n\nBoris je razvio informacione sisteme koji se koriste za praćenje rada parlamenata, političkih procesa te za detekciju i opovrgavanje lažnih vijesti. Neki od ovih sistema su među najvažnijima u regionu i i dalje se aktivno koriste.Na Helem Nejse Talent Akademiji, Boris će predstaviti oblast unutar informacionih tehnologija poznatu kao civic tech, pružajući uvod u razloge i motive njenog razvoja. Također će istražiti mogućnosti informacionih sistema u pogledu osnaživanja i unapređenja pozicije građana i građanki.', NULL, '2024-05-09 16:48:07', '2024-05-10 15:53:10', NULL),
(12, 'Matija Bošnjak', 'matija-bosnjak', 'matija', NULL, '$2y$12$u23RNMRlA3QK3NBRQKAIKuwSO7XwsjjXFH44dWGhlcBFM3S88BCA2', '41dd48353a96156e75fda4c64a6d354400cbf7950475fb217cda1dce221fce16', NULL, 'presenter', '#', '1991-09-26', 'Džemala Bijedića 309', 'Sarajevo', 21, NULL, '44b53b71ca7b11c574dbef98efddda88.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavač', 'Filozofski fakultet Univerziteta u Sarajevu', 'Workshop leader', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas at cursus purus, id scelerisque urna. Proin cursus pretium elit, in condimentum justo egestas suscipit. Phasellus viverra nisl nec varius laoreet.', 'Nam at felis quis sapien viverra ornare. Nam scelerisque velit ex, ut feugiat metus consectetur sed. Duis sit amet gravida nulla. Vivamus quis mi feugiat, cursus velit ut, lacinia lorem. Aenean nisi lectus, fermentum sit amet venenatis ac, scelerisque nec ante. Curabitur lacus orci, commodo fermentum mi sed, molestie pharetra augue. Nullam eu ultricies mauris. Donec congue porta magna vitae tempus. Sed hendrerit pharetra leo, ac posuere nibh faucibus quis. Maecenas et diam et sem elementum aliquam. Nulla non tortor ligula.', NULL, '2024-05-09 23:03:33', '2024-05-10 09:04:55', NULL),
(13, 'Almir Bašović', 'almir-basovic', 'almir', NULL, '$2y$12$Cyf7RK25rgfhtVZAsLNbAeItPUQAdkzfFHGgbP1Iwql7s4d7qJaxO', 'b2418750db790d6d72f80c7977617d2634b99b9b1b273769c3a8d27b2dd76d94', NULL, 'presenter', '#', '1971-10-09', '#', '#', 21, NULL, '52b9bf599d0234b286a2b3845180fa9a.webp', NULL, NULL, NULL, NULL, NULL, 'Predavač', 'Filozofski fakultet Univerziteta u Sarajevu', 'Lecturer', 'Profesor na Filozofskom fakultetu Univerzieta u Sarajevu i nagrađivani dramaturg i pisac.', 'Diplomirao, magistrirao i doktorirao na Filozofskom fakultetu u Sarajevu, gdje predaje na Odsjeku za komparativnu književnost i informacijske znanosti. Kao profesor je angažiran i na Akademiji scenskih umjetnosti u Sarajevu. U Bosni i Hercegovini, Sloveniji, Hrvatskoj, Srbiji, Crnoj Gori, Austriji i Njemačkoj objavio je preko stotinu eseja, prikaza i stručnih članaka. Sudjelovao je u priređivanju zbornika Drama i vrijeme (Dobra knjiga, Sarajevo, 2010) i zbornika Život, narativ, sjećanje: prof. dr. Nirman Moranjak-Bamburać (Filozofski fakultet u Sarajevu, Sarajevo, 2017).', NULL, '2024-05-09 23:20:59', '2024-05-10 09:04:39', NULL),
(14, 'Domen Savič', 'domen-savic', 'domen', NULL, '$2y$12$iLuPHjwFTRjcjsnmMnrxteOealIxQY98ywdxMjbdpAdeID8YjCvpG', '00634b190cb9ba2d8927a6110e3938276b6dd6337ccc9c58fbb20eaf9090e1e4', NULL, 'presenter', '#', '1981-01-01', '#', '#', 21, NULL, '62ab3b0bce3f8fd7219f7033c6312ecc.jpg', NULL, NULL, NULL, NULL, NULL, 'Aktivista', 'Građanin D', 'Lecturer', 'Diplomant fakulteta novinarstva sa Fakulteta društvenih nauka u Ljubljani i vodi NVO za digitalna prava, Građanin D, u Sloveniji. Fokusirajući se na digitalnu privatnost i sigurnost, medijsku pismenost i aktivno građanstvo, Građanin D zagovara otvoreni web, ličnu privatnost i osnaženog građanina.', 'NVO Državljan D ima osnovni princip inkluzivne promocije ljudskih prava i digitalnih prava.\nVjerujemo u otvoreno digitalno okruženje dostupno svima i smatramo da je digitalno okruženje važan dio općeg političkog okruženja. S tim ciljem fokusiramo se na tri ključna područja: digitalna prava, medijsku pismenost i aktivno građanstvo.\nPromovišemo ljudska i digitalna prava organiziranjem javnih događaja (seminara, radionica, okruglih stolova), pozivima na akciju u pomenutim područjima, provođenjem analiza i izvještaja o trenutnim praksama u polju te povezivanjem s sličnim organizacijama širom regiona.', NULL, '2024-05-10 00:02:58', '2024-05-10 09:01:07', NULL),
(15, 'Aida Mahmutović', 'aida-mahmutovic', 'aida', NULL, '$2y$12$XKxP8dR1TbHqS41iz9I49.sehIPXo8.GiGVeIbr5/J9tL2FLIi476', '59bf3dbfa5e17ba82e44ec7d218642c7f3d8b6bdc129d86233bce9145bc5ddef', NULL, 'presenter', '#', '1981-02-11', '#', 'Sarajevo', 21, NULL, '87f153a6388ef860fe3982080afd468d.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavačica/Voditeljica radionice', 'BIRN / Detektor', 'Lecturer', '\"Internet Governance\" je u fokusu Aidinog profesionalnog djelovanja  od  2011. godine. Na Helem Nejse Talent Akademiji vodit će radinocu \"Prava na internetu vs ljudska prava - postoji li razlika?\"', 'Aida Mahmutivić započela je svoju karijeru u domenu Internet governance 2011. godine u Centru za razvoj e-uprave u Ljubljani, Slovenija, kao stažistkinja. Godine 2012. unaprijeđena je u koordinatora projekta. Njeno radno iskustvo već više od deset godina povezano je s upravljanjem internetom i ljudskim pravima. Bila je menadžer programa u organizaciji One World Platform (OWP) gdje je vodila projekte o pravima na internetu i pravima žena. \n\nRadila je kao vanjska konsultantkinja za DotSensei (Bugarska), surađivala na protestos.org. Godine 2017. organizirala je Balkansku školu o Internet governance-u, prvu IG školu u regiji. Od 2016. godine radi na Digital Watch Observatory platformi Ženevske internet platforme kao ko-kreator i kustos sadržaja, pokrivajući globalne razvoje privatnosti i zaštite podataka i kulturne raznolikosti, te online prava žena.\n\nGodine 2014. odabrana je od strane tadašnjeg glavnog tajnika UN-a da služi trogodišnji mandat u Multistakeholder Advisory Grupi (MAG)\n\nTrenutno u radi u Detektoru gdje upravlja projektima koji se odnose na dezinformacije i strano maligno djelovanje, tranzicijsku pravdu i digitalna prava, sve u vezi s ljudskim pravima i vladavinom prava.\n\nOsim bosanskog, svog maternjeg jezika, govori engleski, španski, francuski i slovenski.', NULL, '2024-05-10 00:22:24', '2024-05-10 08:57:49', NULL),
(16, 'Santiago Zarate', 'santiago-zarate', 'Santiago', NULL, '$2y$12$dwfcKWlTojbk8shIbZlpzuNLh7nZ7SDTTt5p77ud8DSjclrcMiyeK', '31b8fb49ef7e7426dc8651070ed885a0cabb1f5d2e563356ab49528119d2a252', NULL, 'presenter', '#', '1990-01-01', '#', 'Sarajevo', 59, NULL, 'c6061ec584dada2f970991c11aeea448.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavač Mentori', 'opensuse.org', 'Lecturer', 'Santiago je Veneculeanac koji živi u Njemačkoj i koji je preko 30 godina aktivan član i zaljubljenik u Free software i Open Source zajednicu.', 'Santiago je Veneculeanac koji živi u Njemačkoj i koji je preko 30 godina aktivan član i zaljubljenik u Free i Open Source zajednicu.  Pored članstva u različitim Open Source zajednicama dio je openSUSE zajednice koja stoji iza jedne od najvažnijih Linux distribucija današnjice SUSE Linuxa unutar koje radi kao Product Owner of the SUSE Quality Engineering Core Team. \n\nSantiago obožava raditi kao edukator i dijeliti znanja stečena u govoto 30 godina profesionalnog angažmana.  Na Helem Nejse Talent Akademiji biće u svojstvu mentora grupe za odgovorno kodiranje, pa će polaznici ovog programa imati konstantnu podršku ovo izrazitog stručnjaka.', NULL, '2024-05-10 08:47:16', '2024-05-10 08:48:09', NULL),
(17, 'Jasmin Kevrić', 'jasmin-kavric', 'jasmin', NULL, '$2y$12$DDg06pnOxiSDozDclE8oYeJ82BPULhL78LguixSu5fTAhCUDf5dCS', '1712c344e1fbc66c0abb0d16591e417e99a569979b8be0b718ab73e12788d858', NULL, 'presenter', '#', '2000-01-01', '#', 'Sarajevo', 21, NULL, '41a8d3ce6c9273637c92385b192a5d0f.jpg', NULL, NULL, NULL, NULL, NULL, 'prof. dr.', 'Internacionalni Burch Univerzitet', 'Lecturer', 'Dekan Fakulteta za inženjering, prirodne i medicinske nauke Internacionalnog Burch Univerziteta. Na Helem Nejse Talent akademiji vodit će radionice posvećene Umjetnoj inteligenciji na programu \"Informacione tehnologije: Odgovorno kodiranje\"', 'Jasmin Kevrić je dekan Fakulteta za inženjering, prirodne i medicinske nauke Internacionalnog Burch Univerziteta. Njegovi glavni istraživački interesi su umjetna inteligencija i obrada signala. Njegov rad obuhvata teorijske i eksperimentalne aspekte istraživanja umjetne inteligencije. Snažno vjeruje u interdisciplinarna istraživanja i velik dio njegovog rada uključuje suradnju sa stručnjacima iz različitih područja. Prof. Kevrić bio je uključen u pripremi nekoliko evropskih projekata i bio je zamjenik voditelja Erasmus+ projekta ELEMEND (585681-EEP-1-2017-EL-EPPKA2-CBHE-JP, sept 2017. – sept 2020.). Trenutno je voditelj INSTREAM projekta (EuropeAid/172094/DD/ACT/BA). Do danas je prof. Kevrić objavio 2 knjige kao autor, 3 knjige kao editor i više od 70 recenziranih naučnih članaka. Od 2017. godine je suosnivač domaće kompanije FREUND elektronika d.o.o. koja se bavi razvojem pametnih interfon sistema, sistema kontrole pristupa, audio razglasa i nudi usluge razvoja raznih IoT sistema.', NULL, '2024-05-10 09:11:10', '2024-05-10 09:17:45', NULL),
(18, 'Boris Brkan', 'boris-brkan1', 'Boris', NULL, '$2y$12$5gSLZGssQD8OzyDGF0hHqunZUc56gGQGNOMiLT7UfDc3jielHnxfC', '02c5d329dd2c8196409ea5805448134c6e480add44e33d050869b9c2054a0fe4', NULL, 'presenter', '+38761210926', '1981-02-11', 'Džemala Bijedića 309', 'Sarajevo', 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Predavač', 'Fondacija EKIPA', 'Lecturer', 'Jedan od osnivača Fondacije Ekipa iz Sarajeva. Diplomirao je računarstvo i informatiku na Elektrotehničkom fakultetu u Sarajevu, istovremeno postavši jedan od pionira područja informacionih tehnologija poznatih kao Civic Tech.', 'Jedan od osnivača Fondacije Ekipa iz Sarajeva koja promoviše nezavisnu kulturu i umjetnost te razvija i producira neke od najznačajnijih i najpopularnijih medijskih i igranih sadržaja u Bosni i Hercegovini i širem regionu. Diplomirao je računarstvo i informatiku na Elektrotehničkom fakultetu u Sarajevu, istovremeno postavši jedan od pionira područja informacionih tehnologija poznatih kao Civic Tech.\n\nBoris je razvio informacione sisteme koji se koriste za praćenje rada parlamenata, političkih procesa te za detekciju i opovrgavanje lažnih vijesti. Neki od ovih sistema su među najvažnijima u regionu i i dalje se aktivno koriste.Na Helem Nejse Talent Akademiji, Boris će predstaviti oblast unutar informacionih tehnologija poznatu kao civic tech, pružajući uvod u razloge i motive njenog razvoja. Također će istražiti mogućnosti informacionih sistema u pogledu osnaživanja i unapređenja pozicije građana i građanki.', NULL, '2024-05-10 15:23:15', '2024-05-10 15:23:15', NULL),
(19, 'Tamara Pešić', 'tamara-pesic', 'tamarapesic.ai@gmail.com', NULL, '$2y$12$UZBMIqieW9M.T82bchSvMOrUP5BJgmqTMrGxDRUqOj4v30WNqt7uO', 'd08266ad407a9386b034347feebb70b282191001b2016f2d16c7931a2923449f', NULL, 'presenter', '#', '2000-01-01', '#', 'Beograd', 134, NULL, '60fa45636b635274984dc0be9220c8aa.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavač', NULL, 'Lecturer', 'Docent na predmetu Pismo sa tipografijom na Fakultetu umetnosti Univerziteta u Prištini – Kosovska Mitrovica i lettering artist. Na Helem Nejse Talent Akademiji će voditi radionicu \"Slova u fokusu\".', 'Završila osnovne akademske i master studije 2012. godine na Fakultetu primenjenih umetnosti u Beogradu na smeru grafički dizajn. Bavi se leteringom, grafičkim dizajnom i ilustracijom.\nDobitnica nagrada Communication Arts of Excellence u kategoriji tipografije; Golden Bra na festivalu Magdalena u Ljubljani za tipografsku familiju Caretta, kao i prvo mesto na konkursu YOUNG.DESIGN.CHEVROLET.\nSarađivala sa mnogim domaćim i stranim klijentima poput B92, Tuborg, Telenor, Dechko Tzar, Metalac, Francuski Institut, Nordeus, Extreme Intimo, Drins i drugi.\nOd 2016. godine zaposlena je na Fakultetu umetnosti Univerziteta u Prištini – Kosovska Mitrovica, u zvanju docenta na predmetu Pismo sa tipografijom.', NULL, '2024-05-11 14:16:37', '2024-05-11 15:30:52', NULL),
(20, 'Sandro Drinovac', 'sandro-drinovac', 'drinovac.sandro@gmail.com', NULL, '$2y$12$nM3FFqFkduvOotyKzg9MyuBS5v35Qys.bzSHtzzERqAKMYvvaV4eK', '980c4113796ac8a9e5ed979b363aa10ec3b51f30f91f2b3f75092ec8c1efdf06', NULL, 'presenter', '#', '2000-01-01', '#', 'Sarajevo', 21, NULL, '362c3277a889a174e20003856329f3ab.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavač', 'ALU Sarajevo', 'Lecturer', 'Kao profesionalni grafički dizajner djeluje od 2005 godine. U početku radi kao suosnivač studija za dizajn Hot Shop gdje je stekao značajno iskustvo radom u oglašivačkoj industriji radeći na oblikovanju kreativnih rješenja za komercijalne klijente, ali i radom na različitim projektima od kulturne i društvene važnosti.', 'Sandro Drinovac je rođen u Mostaru 1981 god. Diplomski i magistarski rad je realizirao na Akademiji likovnih umjetnosti u Sarajevu - na odsjeku za grafički dizajn. Od 2007. je i zaposlen na ALU Sarajevo kao nastavnik / docent na predmetu Vizualne komunikacije. Radio je također i kao gostujući nastavnik na Tehnološkom fakultetu Univerziteta u Banjoj Luci. Kao gostujući predavač imao je priliku održati predavanje i prezentaciju na Faculdade de Belas Artes - Porto (Portugal) na New York University in Abu Dhabi (UAE) te na Akademiji Jan Matejko u Krakowu (Poljska)\n\nOd 2011 godine radi kao samostalni (freelance) dizajner. Projekti na kojima radi su vezani za komercijalne klijente različitih profila te za različite potrebe kulturne i umjetničke scene u Bosni i Hercegovini, ali i regionu. Među mnogobrojnim klijentima za koje je radio nalaze se: Narodno Pozorište Sarajevo, Pozorište Mladih Sarajevo, Univerzitet u Sarajevu, WWF Adria Croatia, Ambasada SAD u BiH, International Republican Institute BiH, Grad Sarajevo, Kanton Sarajevo, rock grupa Zoster, rap artist Sassja, Sarajevo Jazz Guerilla, Basheskia&EdwardEQ, Sarajevska Filharmonija itd.\n\nDo sada je izlagao na samostalnim i grupnim izložbama u Sarajevu, Mostaru, Dubrovniku, Zagrebu, Beogradu, Istanbulu, Mariboru, Frankfurtu, Bremenu, Siracusa, Sofiji, Grazu itd.', NULL, '2024-05-11 14:25:29', '2024-05-11 14:27:30', NULL),
(21, 'Ranko Andjelić', 'ranko-andelic', 'info@ranko.co.uk', NULL, '$2y$12$pk7Wnc5Q5qH0TQsh4/FLHOD1Z5WP4SzEuPGGDc3kOT65/q5d9Rpfu', 'aa0255ae2018a29a48a29089905473c75789579d7a367f97a994d8c79d348425', NULL, 'presenter', '#', '2000-01-01', '#', 'Sarajevo', 21, NULL, 'e8bf568aeb1fe25ba837d268d5e3d708.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavač', 'Freelance', 'Lecturer', 'Ranko Anđelić je režiser animacije i pokretne grafike kao i ilustrator sa preko dvadeset godina iskustva u kreativnoj industriji kao i u umjetničkoj i obrazovnoj sferi. Na HNTA Akademiji održat će predavanje na temu: \"Uvod u eksperimentalnu animaciju\".', 'Ranko Anđelić je režiser animacije i pokretne grafike kao i ilustrator sa preko dvadeset godina iskustva u kreativnoj industriji kao i u umjetničkoj i obrazovnoj sferi. Obrazovao se u Velikoj Britaniji gdje je nakon završenih studija dugi niz godina radio u animacijskoj industriji te na brojnim ličnim i umjetničkim projektima. \nNjegovi radovi su prikazivani na mnogobrojnim internacionalnim medijskim platformama, galerijama i festivalima. Duži niz godina je radio u obrazovanju na univerzitetskom nivou. Radovi su mu nagrađivani i bio je član žirija na British Animation Awards.', NULL, '2024-05-11 14:52:00', '2024-05-11 14:58:01', NULL),
(22, 'Maja Rubinić', 'maja-rubinic', 'rubinicmaja@gmail.com', NULL, '$2y$12$Ho4Xp25zRlEyBWYjNx79heLzutTu1Lou556e0cqpONy3X3jI9CuJe', '96e3d6b58fb6d2bfdcb090a7dd2448aa83ce41507b481101b93cd2be39b8f236', NULL, 'presenter', '#', '2000-01-01', '#', 'Mostar', 21, NULL, '3bdba44619ead354860371931145f775.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavač', 'Udruga Rezon', 'Lecturer', 'Maja Rubinić je akademska slikarica i magistar likovne kulture iz Mostara. Pripada generacijama ALU Sveučilišta u Mostaru i Univerziteta u Sarajevu stasalima iza 2000.', 'Maja Rubinić je akademska slikarica i magistar likovne kulture iz Mostara. Pripada generacijama ALU Sveučilišta u Mostaru i Univerziteta u Sarajevu stasalima iza 2000. Bavi se raznim poljima likovne i vizualne umjetnosti, kulture življenja, estetskim problemima, ilustracijom i dizajnom. Autor i koautor je nagrađivanih publikacija, plakata, slikovnica, znanstvenih knjiga i omota muzičkih albuma.  \n\nSudjelovala je na brojnim izlobama u zemlji I inozemstvu, a također je pored raznih kolaboracija, kao suosnivačica galerije Virus, priredila mnoštvo izložbi drugim mladim autorima.\n\nDio je organizacijskog tima Street Arts Festivala u Mostaru i Udruge Rezon, koji kreira jednu od najvećih galerija ulične umjetnosti u regiji.', NULL, '2024-05-11 15:01:28', '2024-05-11 15:06:26', NULL),
(23, 'Lejla Panjeta', 'lejla-panjeta', 'lejla.panjeta@ssst.edu.ba', NULL, '$2y$12$.GhKTFWSIKjXvj2spWd27.5MEadsbTEqQG3gFC5r3oCJrmTqN10Gq', '3d14c1958327c4750c62df5d533ceed186f0980ec402747f901772d2ba3ea240', NULL, 'presenter', '#', '2000-01-01', '#', 'Sarajevo', 21, NULL, 'cd9abe62f3314ce14969536489c7a2f6.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavač', 'Sarajevo School of Science and Technology Sarajevo', 'Lecturer', 'Profesor Dr. Lejla Panjeta je autor knjiga i članaka o filmu, umjetnosti i medijima. Njena stručna akademska oblast je Filmske studije i vizuelne komunikacije, a istraživački interesi su film imitologija.', 'Dr. Lejla Panjeta je redovni profesor iz oblasti filmskih studija i vizuelnih komunikacija. Predavala je na međunarodnim, stranim i domaćim univerzitetima i kreirala predmete: Teorija\nfilma, Osnovi režije, Uvod u filmske studije, Drama i film, Drama i film u BiH, Introduction to Visual Communication, Film Grammar, Disney Culture Basics, Vampire Cinema, History of Cinema I and II, a na magistarskom i doktorskom studiju vodila je predmete: Film Theory, Cinema Ideology and\nPsychoanalysis, Moving Picture, Visual Culture and Ideology, Camera Image Screen, Evolution of Performing Arts, Film and Propaganda, Critical Practice i Master Thesis. U svojstvu šefa odsjeka dizajnirala je curriculume za Kulturološke studije i Vizuelne umjetnosti. Obavljala je funkciju dekana\nSarajevo Film Academy. Radila u filmskim produkcijama, režirala i producirala u pozorištu, I autorica je dokumentarnih filmova. Autorica je mnogobrojnih naučnih indeksiranih članaka u domaćim i internacionalnim publikacijama, kritika i komentara, te učesnica brojnih međunarodnih konferencija. Organizirala i selekcionirala je veći broj izložbi, filmskih festivala, te edukativnih radionica i akademskih projekata. Dobitnica je nagrada za dokumentarne filmove i za najbolju\nknjigu iz oblasti umjetnosti Međunarodnog sajma knjiga u BiH. Autorica i urednica je knjiga o filmu,\numjetnosti i komunikacijama.Bavi se istraživanjima iz oblasti estetike, vizuelnih i izvodjačkih umjetnosti, propagande, mitologije I filmskih i kulturoloških studija.', NULL, '2024-05-11 15:10:54', '2024-05-11 15:11:02', NULL),
(24, 'JUS PROJEKT', 'marko-i-mladen-miladinovic-jus-projekt', 'marko@jusproject.com', NULL, '$2y$12$IwT3si5ZS5u7QWh8HwQMUOhDoSu4qNaXNrTwImisVS.a7PGo/JfX2', '31532dbf24bc8c840f1160076bea9352222f78757d7d5ba3b0711a21e3a76b62', NULL, 'presenter', '#', '2000-01-01', '#', 'Ljbuljana', 137, NULL, '1300bc400ba42086a3c9cfcdfa528446.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavači', 'JUS Projekat', 'Lecturer', 'Darko i Marko, sebe doživiljavaju kao tim Goshini i Uderzo, autore stripa “Asterix”. Jedan piše, drugi crta. U tom svojstvu Darko, kao art direktor, dizajner i illustrator i Marko kao kreativni direktor i pisac stvaraju zajedno preko 20 godina.', 'JUS je umetnički projekt, čije ime smo preuzeli od poznate skraćenice JUS, koja je obeležavala jugoslovenski univerzalni standard. Naša osnovna ideja sa projektom JUS je bila i ostaje, da mlade stvaraoce, dizajnere, inžinjere i širu javnost podsjetimo, da je tadašnji odnos prema stvaranju i dizajnu bio moderan, prepoznatljiv i skladan sa potrebama ljudi u kontekstu vremena i prostora.\n\nDarko i Marko, sebe doživiljavaju kao tim Goshini i Uderzo, autore stripa “Asterix”. Jedan piše, drugi crta. U tom svojstvu Darko, kao art direktor, dizajner i illustrator i Marko kao kreativni direktor i pisac stvaraju zajedno preko 20 godina. Pored brojnih konceptualnih, grafičkih i kreativnih rjesenja za proizvode i usluge, aktivni su i na polju vizuelnih komunikacija neprofitnih organizacija u kulturi i sportu. U zadnje vrijeme, stručna i šira javnost ih prepoznaje po cjelovitom rješenju i realizaciji robne marke za rakiju ŠAMAR koja je zapalila region, poznatoj društveno odgovornoj akciji ČLOVEK iz Ljubljane, duhovitim majicama KIKIRIKI shirts, te po projektu JUS, koji ljubitelje retro jugoslovenskog dizajna zabavlja sa uvijek novim grafikama ikoničnih proizvoda, koje smo nekad voljeli. Ko se ne seća Fiće, Yuga, legendarnog kioska K67, Tomosovih motora i Super Bosna svijecica iz Tešnja?', NULL, '2024-05-11 15:21:49', '2024-05-11 15:29:35', NULL),
(25, 'Imelda Ramović', 'imelda-ramovic', 'imelda@mireldy.design', NULL, '$2y$12$6.mrsiABDb4T6qxIELnNmOKjOgNkq28iQHVWuozPJL2wHQNRRMd26', 'c13fbacbdb8ab089d71ba1392d8ddf9353bf27be916b163e5e4fd25a0b92ed89', NULL, 'presenter', '#', '2000-01-01', '#', 'Zagreb', 38, NULL, '6300bca5b1a178d1a51c10d7c442b29e.jpg', NULL, NULL, NULL, NULL, NULL, 'Art direktorica, dizajnerica i ilustratorica', 'Studio Imeldy', 'Lecturer', 'Imelda Ramović je art direktorica, dizajnerica i ilustratorica specijalizirana za područja oglašavanja, umjetnosti i kulture. Na Talent Akademiji održat će predavanje \"Dizajn ambalaže: Od koncepta do kreativnosti\" i radionicu \"Behind the scenes: Case studies Studio Imeldy\".', 'Imelda Ramović je art direktorica, dizajnerica i ilustratorica specijalizirana za područja oglašavanja, umjetnosti i kulture. Kao art direktorica i dizajnerica svoje profesionalno iskustvo gradi više od 15 godina na različitim projektima u kategoriji vizualnih komunikacija i radom s velikim brojem nacionalnih i internacionalnih klijenata iz različitih industrija. Suosnivačica je multidisciplinarnog studija Mireldy, koji danas djeluje pod imenom Studio Imeldy. \n\n Kroz dugogodišnje iskustvo, Imelda je stekla reputaciju stručnjakinje za kreiranje vizualnih identiteta, ambalaže i ilustracija koji ostavljaju dubok dojam i povezuju se s publikom na emocionalnoj razini. \n\nNjezina strast prema dizajnu, kombinirana s preciznošću i kreativnošću, rezultirala je mnogobrojnim uspješnim suradnjama i značajnim nagradama koje je osvojila tijekom karijere.', NULL, '2024-05-11 15:39:35', '2024-05-11 15:42:03', NULL),
(26, 'Haris Jusović', 'haris-jusovic', 'harisjusovic@gmail.com', NULL, '$2y$12$4WI8Wo1SkeeQv4tNz6svpeop0JqJ/4h4eXYdE.Hmb2h06.d/wOZM6', '088647daff238294378bf05f05ef575c516c7ee9784ec9a61e00965db6d7371a', NULL, 'presenter', '#', '2000-01-01', '#', 'Sarajevo', 21, NULL, 'ff5b6b06ac5c8a5a927e4911b0323fe0.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavač', 'Jusa Originals', 'Lecturer', 'Haris Jusovic je grafički dizajner i vizuelni umjetnik, svakodnevno kroz svoje postere i poeziju propituje bh. društvenu situaciju, te na sarkastičan i simpatičan način tematiziraju svakodnevne životne situacije, kao i popularnu mainstream kulturu.', 'Haris Jusovic je grafički dizajner i vizuelni umjetnik, svakodnevno kroz svoje postere i poeziju propituje bh. društvenu situaciju, te na sarkastičan i simpatičan način tematiziraju svakodnevne životne situacije, kao i popularnu mainstream kulturu.\n\nSarađivao je sa globalnim, regionalnim i lokalnim brendovima i kompanijama, startupima i nevladinim organizacijama. Kreator je velikog broja uspješnih brand awareness i društveno odgovornih kampanja u BiH i osnivač brenda JUSA.', NULL, '2024-05-11 15:51:17', '2024-05-11 15:52:57', NULL),
(27, 'Bojan Hadzihalilović', 'bojan-hadzihalilovic', 'bojan@talentakademija.ba', NULL, '$2y$12$HcAYRWsOhIRH9yFPXW7pQ.X5Fh7z9r/e0LIHWbW4sBUmokzxjkEQW', 'bb7c94d9b630097b4ac36e19921fced9a8f102390b8d1c10d4ca3f06cd090a43', NULL, 'presenter', '#', '2000-01-01', '#', 'Sarajevo', 21, NULL, 'e597f15671546faa636f68ce10b42a96.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Lecturer', 'Bojan Hadžihalilović je profesor na Akademiji likovnih umjetnosti u Sarajevu, gdje predaje na Odsjeku za grafički dizajn. Istovremeno, također predaje vizualne komunikacije na Arhitektonskom fakultetu i Akademiji scenskih umjetnosti.', 'Bojan Hadžihalilović, rođen 6. juna 1964. godine, sarajevski je grafički dizajner i kreativni direktor dizajn kompanije iz Bosne i Hercegovine pod imenom Fabrika. Diplomirao je na Akademiji likovnih umjetnosti u Sarajevu 1989. godine i zajedno sa kolegicom Lejlom Mulabegović osnovao dizajnersku grupu nazvanu TRIO Sarajevo iste godine. Od osnivanja do aprila 1992. godine, dizajnirali su oko 50 važnih projekata, uključujući omote ploča nekih od najpopularnijih rock bendova iz Bosne i Hercegovine, brojne dizajnerske projekte na mnogim festivalima u bivšoj Jugoslaviji, dizajn knjiga, novina i filmskih plakata. Za svoj rad prije rata u Bosni i Hercegovini nagrađeni su od strane Saatchi & Saatchi. Također su sudjelovali na brojnim izložbama u zemlji i inozemstvu (Moskva, Berlin i Sarajevo).\nTokom opsade Sarajeva, Bojan je ostao u gradu. Sa TRIO-om, dizajnirao je seriju propagandnih plakata \"Agresija protiv Bosne\" i osmislio uniforme za sve bosanske sportiste koji su se takmičili na Olimpijskim igrama u Barceloni 1992. godine.\nTrenutno Bojan radi kao kreativni direktor marketing agencije Fabrika i često surađuje sa East West Theatre Company, za koju je dizajnirao veliki broj plakata.', NULL, '2024-05-11 16:00:53', '2024-05-11 16:02:24', NULL),
(28, 'Mladen Djukić', 'mladen-djukic', 'office@aeonproduction.com', NULL, '$2y$12$MWpSV9zVgwhHbr3nK3On.OegF1GP6fE1Lm1/s2vxuWSPscXvn6YDS', 'caccd3eaa5805e421ed89c3cba2ec8f8daafb97b53a7a791583af84ff11f75cc', NULL, 'presenter', '#', '2000-01-01', '#', 'Banja Luka', 21, NULL, 'bb06b5146bdc406693725948ef78fa87.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavač', 'AEON Production', 'Lecturer', 'Mladen Đukić je producent, animator i reditelj iz Banjaluke sa preko 20 godina iskustva u radu na filmu i televiziji. Vlasnik je Aeon produkcije i redovni profesor na Akademiji umjetnosti Univerziteta u Banjoj Luci', 'Mladen Đukić je producent, animator i reditelj iz Banjaluke sa preko 20 godina iskustva u radu na filmu i televiziji. Vlasnik je Aeon produkcije i redovni profesor na Akademiji umjetnosti Univerziteta u Banjoj Luci. Režirao je 11 kratkih filmova, mnoštvo epizoda TV serija i previše reklama. Otvoren ka novim tehnologijama, voli da jedri.\n\nAeon je već 16 godina fokusiran na pripovijedanje kroz animaciju, nove medije, video igre i izdavaštvo.Trudimo se da svaki naš projekat bude stepenica ka razvoju animacije u regionu, od podrške mladim autorima na prvim filmovima, do rada na projektima velikih klijenata, poput Netflix Animation', NULL, '2024-05-11 16:07:37', '2024-05-11 16:07:49', NULL),
(29, 'Mirza Tahirović', 'mirza-tahirovic', 'mirza.tahirovic@asu.unsa.ba', NULL, '$2y$12$OCdPh0dTKPJPxsovSaZ0sesfSTCpxnf38JOZgwJM4l1lNZWbsk1/q', '53c4c6120337cb99a798d8274fecc1a3c0a2edfd20a6d69a9d17de286b5e33d6', NULL, 'presenter', '#', '2000-01-01', '#', 'Sarajevo', 21, NULL, '7a9e0c573aa805731490db18ef5b4dfc.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Lecturer', 'Kompozitor filmske muzike, montažer zvuka i mikser za film, TV i druge medije. Aktivni istraživač i nastavnik u oblasti muzičke i audio postprodukcije.', 'Mirza Tahirović je rođen 1984. Godine u Sarajevu. One je kompozitor filmske muzike, montažer zvuka i mikser za film, TV i druge medije. Aktivni istraživač i nastavnik u oblasti muzičke i audio postprodukcije. Eksperimentišući sa hip-hop i elektronskom muzikom tokom srednje škole, rodilo se interesovanje za muzičku produkciju i filmsku muziku. Diplomirao je na Ekonomskom fakultetu Univerziteta u Sarajevu 2008. godine, a magistrirao na Griffith College Dublin/Nottingham Trent University 2011. godine. Nakon toga se specijalizirao za filmsku muziku i zvuk, stekavši  diplomu \"Produciranje muzike za film i televiziju \" sa Berklee College of Music (Boston/SAD) kao i Certifikat Filmton Production za filmski zvuk na HOFA College (Karlsdorf/Nemačka). 2018. postaje mentor u Berklee Online Mentor Collective. Osnivač je i suvlasnik Studio Chelia, profesionalnog audio postprodukcionog studija u Sarajevu. Njegove uspješne saradnje uključuju cijenjene i nagrađivane režisere Danisa Tanovića, Nurija Bilgea Ceylana i druge. Trenutno radi kao profesor na Akademiji scenskih umjetnosti u Sarajevu, često predaje na radionicama, pohađa majstorske tečajeve i učestvuje na filmskim festivalima.', NULL, '2024-05-11 16:29:29', '2024-05-11 16:31:22', NULL),
(30, 'Dino Šukalo', 'dino-sukalo', 'dsukalo@gmail.com', NULL, '$2y$12$NrY0cl5vZVp4rOX6vvR0aO3Fr8x2m4khJJDJtxmE6OwprxtfYtS7S', '923fc2758df96f5fc10cff59b569389dc85b06d593fd892f4f1f96e20470d096', NULL, 'presenter', '#', '2000-01-01', '#', 'Sarajevo', 21, NULL, 'feb11b08abadce4c092b272589bfb8a7.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Lecturer', 'Sredinom devedesetih godina prošlog vijeka, Šukalo počinje pokazivati interesovanje za jazz i improviziranu muziku te kroz razne nastupe, performanse, radionice i master časove počinje usavršavati svoje muzičke sposobnosti. Na Helem Nejse Talent Akademiji vodit će cjelodnevnu radionicu na temu \"Moć muzike u filmu, tv seriji ili pozorišnoj predstavi\".', 'Dino Šukalo je rođen 6. 10. 1977. u Sarajevu. Sredinom devedesetih godina prošlog vijeka, Šukalo počinje pokazivati interesovanje za jazz i improviziranu muziku te kroz razne nastupe, performanse, radionice i master časove počinje usavršavati svoje muzičke sposobnosti. Danas važi za jedog od vodećih jazz muzičara u BiH, ali i šire. Osim toga, Dino Šukalo se za kratko vrijeme profilirao kao jedan od najbitnijih muzičara i u domenu pop muzike, kao i pop-rock muzike i bosanske tradicionalne muzike. To nam dokazuje lista imena sa kojima je sarađivao kao aranžer, producent i multiinstrumentalista  od kojih se ističu Dino Merlin, Dubioza Kolektiv, Zoster, Amira Medunjanin, Nina Badrić, Hari Mata Hari, grupa Zoster i mnogi drugi. Pored svega nabrojanog, Dino je istuknuti kompozitor muzike za mnogobrojne filmove, tv serije i pozorišne predstave u pozamašnom broju. Sarađivao je sa gotovo svim priznatim režiserima iz BiH, a kreator je velikog broja već sada legendarnih soundtracka kao što je uvodna špica za seriju “Lud, Zbunjen, Normalan”, ali je i kreator muzike za dugometražne filmove “Koncentriši se baba”. “Žaba”, “Praznik rada” i mnogi drugi.', NULL, '2024-05-11 16:39:00', '2024-05-11 16:40:18', NULL),
(31, 'Marko Stojanović Louis', 'marko-stojanovic-louis', 'markolouis25@gmail.com', NULL, '$2y$12$T3bH7NqMbF6Rx63vaej9nu8mw/AQCU8PxeT3b4Nmpd/HNSryHNw9y', '37e77745146615b2a88c4edbce8646a819983f5a86ac4251f0472e4efdf0960a', NULL, 'presenter', '#', '2000-01-01', '#', 'Beograd', 134, NULL, '75bb53d16e4d52efad820f2e7a59db89.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavač', 'Nezavisni muzičar', 'Lecturer', 'Populani kantautor i muzičar, kojeg mediji u regionu opisuju kao jednog od najboljih i najautentičnijih izvođača/muzičara na prostorima bivše Jugoslavije.', 'Marko Stojanović Louis rođen u Minhenu , 25. januar 1985, je populani kantautor i muzičar, kojeg mediji u regionu opisuju kao jednog od najboljih i najautentičnijih izvođača/muzičara na prostorima bivše Jugoslavije. Muzikom se bavi od malih nogu, već je svirao udaraljke i bubnjeve sa pet godina. Išao je u muzičku školu na Minhenskom konzervatorijumu. Sa sestrom Majom Novaković bio je u bendu Marakuja, izdali su dva albuma.  Godine 2007. preselio se iz Njemačke u Beograd na studije dizajna zvuka na Fakultetu dramskih umetnosti koje je uspješno završio. Iza sebe ima mnogobrojna izdanja, saradnje i druga muzička ostvarenja od kojih je neophodno izdvojiti 5 solo studijskih albuma, 2 live albuma, album muzike za djecu, kao i saradnje sa Dinom Merlinom, Zdravkom Čolićem i dr.. Njegova muzika je mješavina soul muzike i hip hop ritmova, kao i uticaja afro kulture, kao i dekoracija sa Balkana , Bugarske , Indije i Irana, s obzirom da je i autor aranžmana, muzike, Marko zaokružuje sve to i sopstvenom produkcijom koja je u mnogo čemu drugačija od ustaljene i autentična.', NULL, '2024-05-11 16:44:02', '2024-05-11 16:45:37', NULL),
(32, 'Biljana Leković', 'biljana-lekovic', 'biljana@talentakademija.ba', NULL, '$2y$12$9Hth15iReyfRL2iNOlkmp.1QTe0OAXCX3kobDcxY9GL8gZ6fRUK9.', '6e39012e4b8ef0af9a5e30e2fcb258debfd92d80c363ca4b560c623206c808a4', NULL, 'presenter', '#', '2000-01-01', '#', 'Beograd', 134, NULL, '274b74c1099995a7f74fb8f4a9ecd0ee.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavač', 'Centar za istraživanje popularne muzike', 'Lecturer', 'Diplomirala je i doktorirala na Odsjeku za muzikologiju Fakulteta muzičke umetnosti Univerziteta umetnosti u Beogradu. Od 2010. godine zaposlena ja na istoj instituciji, trenutno u zvanju docenta. Na Helem Nejse Talent Akademiji održat će predavanje: \"Popularna muzika i mehanizmi muzičke industrije\".', 'Biljana Leković diplomirala je i doktorirala na Odsjeku za muzikologiju Fakulteta muzičke umetnosti Univerziteta umetnosti u Beogradu. Od 2010. godine zaposlena ja na istoj instituciji, trenutno u zvanju docenta. Kao predavačica aktivna je na svim nivoima studija, na kursevima posvećenim savremenoj umetničkoj i popularnoj muzici, odnosno raznovrsnim muzičkim praksama u kontekstu savremene medijske kulture (u okviru master programa Primijenjena istraživanja muzike). Angažovana je također na doktorskim studijama na odsjeku za Višemedijsku i Digitalnu umjetnost Univerziteta umetnosti u Beogradu. Rukovodilac je Centra za istraživanje popularne muzike, udruženja koje je usmereno ka ispitivanju lokalnih popularnih muzičkih scena, naučno-istraživačkom radu i edukaciji u ovoj oblasti. Autorka je dvije knjige: Modernistički projekat Pjera Šefera (2011) i Sound art/zvukovna umetnost: muzikološka perspektiva – teorije (2019), kao i članaka i studija koje je objavljivala u nacionalnim i internacionalnim izdanjima i prezentovala na međunarodnim i nacionalnim simpozijumima.', NULL, '2024-05-11 16:49:17', '2024-05-11 16:51:20', NULL),
(33, 'Ana Krstajić', 'ana-krstajic', 'krstajicanchy@gmail.com', NULL, '$2y$12$m3uIId7Ih5NZhhj2YcfWX.xE.K2Ufgyji8BsBL0aXzmn6yOhH70qu', '932e9ec6fecf9aca0495c4c5f9a4b17beaa888e95c8993b6c2b53badc2581e83', NULL, 'presenter', '#', '2000-01-01', '#', 'Beograd', 134, NULL, 'f0e7c4d67f7ef3e08fc57e2c8e5b341e.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavač', 'Berklee', 'Lecturer', 'Nagrađivana srbijanska kompozitorka sa diplomama Fakulteta muzičke umetnosti na odseku kompozicija i orkestracija i prestižnog Berklee-ja. na HNTA Akademiji održat će predavanje: \"Komponovanje muzike za Film, TV i Video Igre\".', 'Ana Krstajić je rođena u Beogradu. Diplomirala je na Fakultetu muzičke umetnosti na odseku kompozicija i orkestracija (M.M. Srbija) i na Berkli koledţu, odsjek za muziku u filmu, TV i u video igrama (M.M. Španija). 2014. godine osvojila je 1. nagradu na takmičenju mladih kompozitora „Ţenska dela“ (Itaka, Njujork). 2016. godine osvojila je 2. nagradu na Međunarodnom takmičenju kompozitora „De Bach au Jazz“ (Pariz, FR) u kategoriji Savremeni klavir, iste godine osvojila je 1. nagradu na Međunarodnom muzičkom takmičenju „The Best Musical Mind“, (Beograd, SR) koja joj je donela punu stipendiju za Berklee Summer Performance Program (Valensija, ESP). Osvojila je Počasno priznanje na festivalu Soundtrack Cologne u Kelnu 2018. godine, a 2021. osvojila je nagradu Hollywood Music in Media (Los Anđeles, Kalifornija) za svoj kompoziciju „Naša zemlja“. 2022. Godine pobedila je na takmičenju Score Live i osvojila masterklas filmske muzike u Madridu gde je snimala svoje delo sa orkestrom Radio Televizije Španije. Dodeljena joj je nagrada Muzika Klasika za najboljeg kompozitora primenjene muzike u 2023.godini. Od 2019. godine je ambasadorka kulture Srbije Stvara. Izabrana je za mentorsku sesiju Saveza ţenskih filmskih kompozitora i Društva kompozitora i tekstopisaca u Americi. Trenutno radi na nekoliko filmskih, TV i pozorišnih produkcija u Srbiji i komponuje muziku za kolekciju kratkih animiranih filmova Apple TV-a. Trenutno je rezidentna umetnica Kolarčeve Zadužbine u Beogradu.', NULL, '2024-05-11 16:58:58', '2024-05-11 17:00:25', NULL),
(34, 'Dejana Mutavdžin', 'dejana-mutavdzin', 'dejana.mutavdzin@outlook.com', NULL, '$2y$12$RSok8rOs9aCmLZMMsSjh1ObGWYxNuxhzScToEVujyIBKVx21a/FjK', '1954216ef95c3ce52fa46ba49ed6e5ec0573e2911a6266834f3ed967bcc573a9', NULL, 'presenter', '#', '2000-01-01', '#', 'Beograd', 134, NULL, '800da55a2d10963e4eed44bc16426453.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavač', 'Fakultet muzičke umetnosti Beograd', 'Lecturer', 'Dejana Mutavdžin je doktorand psihologije na Filozofskom fakultetu Univerziteta u Beogradu, gde je završila osnovne i master akademske studije. Radi kao asistent na psihološkim predmetima na Fakultetu muzičke umetnosti Univerziteta umetnosti u Beogradu.', 'Dejana Mutavdžin je doktorand psihologije na Filozofskom fakultetu Univerziteta u Beogradu, gde je završila osnovne i master akademske studije. Radi kao asistent na psihološkim predmetima na Fakultetu muzičke umetnosti Univerziteta umetnosti u Beogradu. U svojim istraživanjima bavi se odnosom različitih tipova sposobnosti, emocionalne inteligencije, darovitosti u neakademskim domenima i mogućnosti za njihovo priznanje u obrazovnom procesu. Član je Regionalne mreže psihologije i muzike (RNPaM), ESCOM-a, Društva psihologa Srbije.', NULL, '2024-05-11 17:03:33', '2024-05-11 17:04:52', NULL),
(35, 'Vladimir Čolaković', 'vladimir-colakovic', 'vlado@fondacijaekipa.ba', NULL, '$2y$12$wUWUTo/bO9Frqstfqf.lZuN5GtjnspAhhOghlHSzhqViAcdMI5Ytu', 'bbebc8062d4680de70d4255e505ffef104651c287bd1a59b925fa6102fa79040', NULL, 'presenter', '#', '2000-01-01', '#', 'Sarajevo', 21, NULL, 'bfaa7321c481964668815f4cbe5c2f1b.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavač', 'Fondacija EKIPA', 'Lecturer', 'Vladimir Čolaković član je Fondacije EKIPA i dugogodišnji novinar i TV voditelj s iskustvom rada u nekoliko TV kuća. Izvještavao  je o cijelom spektru društvenih tema, od politike do pop culture i autorskih putpopisnih TV serijala.', 'Vladimir Čolaković je dugogodišnji novinar i TV voditelj, sa iskustvom rada u nekoliko TV kuća sa nacionalnom frekvencijom u BiH, regionalnim (N1) i globalnim medijskim mrežama (TRT). Izvještavao je o cijelom spektru društvenih tema, od politike do pop kulture a značajan uspjeh postigli su njegovi autorski putopisni TV serijali „Tour de BiH“ i „Fenomeni“. Radeći kao urednik i prezenter na TRT Balkan, posebno se fokusirao na nove medijske forme namijenjene isključivo online distribuciji.\nTakođer, jedan je od autora satirične TV serije „Stručni štab“ koja se emitovala na javnom RTV servisu FTV, a na ovom projektu se ostvario i kao producent i glumac.  Čolaković je trenutno zaposlen u Fondaciji EKIPA kao producent, pisac i presenter.', NULL, '2024-05-11 17:35:59', '2024-05-11 17:37:45', NULL);
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `api_token`, `remember_token`, `role`, `phone`, `birth_date`, `address`, `city`, `country`, `about`, `photo_uri`, `instagram`, `facebook`, `twitter`, `linkedin`, `web`, `title`, `institution`, `presenter_role`, `short_description`, `description`, `interview`, `created_at`, `updated_at`, `deleted_at`) VALUES
(36, 'Stefan Janjić', 'stefan-janjic', 'stefan@novinarska-skola.org.rs', NULL, '$2y$12$ar.ye0A2BGgwVokR71Hi5uuQ7xg91d9xMuyc1TyJS6K/4/gJD2Ur.', '0d21573f46f64652fbcf6f269525598916cab61e483baf56e9abc586b22b2e56', NULL, 'presenter', '#', '2000-01-01', '#', 'Novi Sad', 134, NULL, '1cd980b775509a9d63143562f922c714.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavač', 'Fake News Tragač', 'Lecturer', 'Urednik portala Fake News Tragač i docent na Odseku za medijske studije Filozofskog fakulteta u Novom Sadu. Dobitnik je mnogih nagrada za istraživanje i naučni rad.', 'Urednik portala FakeNews Tragač i docent na Odseku za medijske studije Filozofskog fakulteta u Novom Sadu, gde je završio osnovne studije novinarstva, master studije komunikologije i interdisciplinarne doktorske studije u oblasti društvenih i humanističkih nauka. Dobitnik je Nagrade za najboljeg studenta Filozofskog fakulteta i Nagrade za najboljeg mladog istraživača u oblasti društvenih nauka. Dvostruki je dobitnik Izuzetne nagrade Univerziteta u Novom Sadu za naučni rad, nagrade „Biće i jezik“ Fondacije Radomir Konstantinović, Godišnje nagrade NDNV-a za medijski profesionalizam, kao i NIN-ove književne stipendije. Usavršavao se u oblasti analize i provere podataka na univerzitetima Berkli, Džordž Vašington i Radboud. Objavio je roman „Ništa se nije desilo“ (2017).', NULL, '2024-05-11 17:42:11', '2024-05-11 17:42:25', NULL),
(37, 'Damir Šagolj', 'damir-sagolj', 'damir.sagolj@gmail.com', NULL, '$2y$12$MN6PAo6ZK7CX4bPeCbV4me.QJ11f886HTzicqOlyn.OJsVBCDg4mW', '26638657a81ae04e4a369f22fcc7932a3b17a3065925694c7eea993a06cac164', NULL, 'presenter', '#', '2000-01-01', '#', 'Sarajevo', 21, NULL, '92bb44adb6b16e38ecdd6dcfa8b062e4.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavač', 'Warm Foundation, Akademija scenskih umjetnosti', 'Lecturer', 'Damir Šagolj rođen je 1971. godine u Sarajevu. Od 1996. godine radi za Reuters, a iz BiH nakon rata odlazi u Iran, Liban i Izrael i druge zemlje Bliskog Istoka. Fotografisao je u New Yorku nakon napada 11. septembra, kao i nakon poplava u Pakistanu i Tajlandu, cunamija u Japanu i dešavanja u Mijanmaru. Dobitnik Pulitzerove nagrade za fotografiju. Trenutno radi kao predavač na Akademiji scenskih umjetnosti Sarajevo.', 'Damir Šagolj, bosanski novinar, fotograf i akademski radnik, je rođen 1971-e godine u Sarajevu. Studirao je energetiku u Moskvi i Sarajevu gdje kao dvadesetogodišnjak apsolvira neposredno prije početka agresije. Nakon rata 1992-95, koji provodi u Sarajevu kao vojnik Armije RBiH, počinje raditi kao reporter novinske agencije Reuters.\n\nKao dopisnik i fotograf agencije Reuters izvještava iz preko 40 zemalja, uglavnom iz konfliktnih i područja zahvaćenih prirodnim katastrofama. Pored vijesti sa naslovnih strana, Damir se bavi temama specifičnim za društva u tranziciji i objavljuje multimedijalne sadržaje u svim vodećim svjetskim medijima. Živio je i radio u Rusiji, Tajlandu i Kini a izvještavao je preko decenije sa Bliskog Istoka.\n\nZa svoj rad Damir je narađivan najznačajnijim svjetskim strukovnim nagradama, između ostalih Pulicerovom i nagradom World Press Photo.\n\nMagistar je umjetnosti sa Univerziteta za umjetnost u Londonu a trenutno predaje fotografiju i savremeni dokumentaristički pristup na sarajevskoj Akademiji scenskih umjetnosti. Direktor je i umjetnički rukovodilac WARM Fondacije u sklopu kojih je osmislio i realizovao niz projekata koju su postavljeni na najznačajnijim i svjetski relevantnim adresama i festivalima, uključujući i WARM festival koji se, pod Šagoljevim rukovodstvom, dešava svakog jula u Sarajevu.', NULL, '2024-05-11 17:45:24', '2024-05-11 17:47:44', NULL),
(38, 'Branko Čečen', 'branko-cecen', 'brankocecen@gmail.com', NULL, '$2y$12$fbH0qWgBStyfiz9wskreTeZSHmiD/hn3jbulHLQko90pPHdeItMlu', '25dd95a6066b3a81f6200da929534669691860b709c5c246ff2171cbfcb7f7c4', NULL, 'presenter', '#', '2000-01-01', '#', 'Beograd', 134, NULL, '3972f6566b421ce6f58673a2e5729611.jpg', NULL, NULL, NULL, NULL, NULL, 'Predavač', 'Konsultant za medijsku pismenost', 'Lecturer', 'Iskusan urednik, konsultant za medije, medijsku edukaciju i medijsku pismenost, predavač i javni govornik sa značajnim prisustvom u medijima i više od decenije iskustva u upravljanje civilnim sektorom, promociji i umrežavanju, fundraisingu i promociji.', 'Radio je kao edukator sa svim starosnim grupama, od učenika osnovnih i srednjih škola do starijih građana, ali najčešće s profesionalnim novinarima i radnicima u civilnom sektoru. Od 1992. godine radio je kao urednik i reporter za veliki broj srpskih i drugih štampanih medija, a autor je ili koautor stotina priča za štampu, kao i edukativnih tekstova, vodiča i knjiga. Od 2004. godine počinje raditi kao profesionalni medijski trener i konsultant u Srbiji, regionu i šire. Predavao je novinarstvo na Fakultetu za medije i komunikacije Univerziteta „Singidunum” u Beogradu, sa fokusom na narativno novinarstvo i pripovedanje (uključujući digitalno). Cecen je duže od decenije obnašao ulogu direktora Centra za istraživačko novinarstvo Srbije (CINS). Bio je član Upravnog odbora OCCRP (Mreža za izveštavanje o organizovanom kriminalu i korupciji). CINS je dobitnik European Press Prize za istraživačko novinarstvo 2017. godine, Nagrade Anthony Lewisa za izuzetno novinarstvo vladavine prava (2017.), te mnogih drugih međunarodnih i domaćih nagrada za novinarstvo, slobodu govora i dr.', NULL, '2024-05-11 17:50:03', '2024-05-11 17:52:01', NULL),
(39, 'Aulonë Kadriu', 'aulon-kadriu', 'aulone.kadriu@ktwopointzero.com', NULL, '$2y$12$Kj3O.WvMgrjSg13kR9X3/uqh8MQ68JIGw9XxAP.4bdtVo/2thdI5G', '3372604f924f30e17bf973919553ea717ef850c53ffd5d5fefd11c0336c29e41', NULL, 'presenter', '#', '2000-01-01', '#', 'Priština', 1, NULL, 'c483e713f7c593646e1a907c21fd944b.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Lecturer', 'Viši urednik u online magazinu KOSOVO 2.0. Aulone je studirala političke nauke, studij žena, roda i seksualnosti s posebnim fokusom na odnose roda, rata, nacionalizma, kao I dinamiku rigidne i nasilne maskulinosti. U 2023. godini osvojila je nagradu Best Web Story i Journalism Award for Women’s Empowerment od Asocijacije novinara na Kosovu.', 'Prije zauzimanja uloge višeg urednika u magazinu KOSOVO 2.0, više od četiri godine bila je menadžer K2.0 programa – žurnalističkog formata namijenjenog promovisanju civilnog angažmana. Trenutno nadgleda Blogbox sekciju, segment K2.0 posvećen jačanju glasa mladih pojedinaca u novinarstvu. Također je jedna od producenata podcasta K2.0, Other Talking Points. Više od decenija uključena je u inicijative, razgovore, mentorstvo i istraživanje u oblastima roda, seksualnosti, LGBTQ+ prava, prava manjina, kreativnog pisanja, medija i društvene pravde.', NULL, '2024-05-11 17:55:39', '2024-05-11 17:58:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `__faqs`
--

CREATE TABLE `__faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `what` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `__faqs`
--

INSERT INTO `__faqs` (`id`, `title`, `description`, `what`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Da li moram biti student da bih se prijavio?', 'Helem Nejse Talent Akademija pruža jednake šanse za upis svim budućim profesionalcima iz srodnih domena kreativnih industrija. Ne zahtijevamo da aplikanti budu studenti ili imaju završene fakultete, ali pri ocjenjivanju aplikacija uzimamo u obzir svako relevantno iskustvo iz polja koje aplikant/ica navede.', 1, '2024-04-20 05:52:25', '2024-05-09 21:41:52', '2024-05-09 21:41:52'),
(2, 'sadsa', 'sad sadsa', 0, '2024-04-20 05:58:28', '2024-05-09 21:41:54', '2024-05-09 21:41:54'),
(3, '213ssad asd', 'sa dsa das das', 0, '2024-04-20 05:58:32', '2024-05-09 21:41:57', '2024-05-09 21:41:57'),
(4, 'Obuhvata li program kreativnog pisanja praktični rad?', 'Pratkični rad je sastavni dio programa kreativnog pisanja a polaznici će stečeno znanje imati priliku primijeniti u više različitih konteksta i formi.', 1, '2024-05-07 15:39:01', '2024-05-09 21:42:00', '2024-05-09 21:42:00'),
(5, 'Da li polaznici po završetku akademije dobijaju certifikate?', '<p><span lang=\"BS-LATN-BA\" style=\"font-size:11.0pt;\nline-height:107%;font-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:minor-latin;\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-hansi-theme-font:\nminor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;;mso-bidi-theme-font:minor-bidi;\nmso-ansi-language:BS-LATN-BA;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Po\nzavršetku Akademije, učesnici dobijaju certifikat o uspješno završenoj Helem\nNejse Talent Akademiji sa potpisima svih predavača sa odabranog programa.</span></p>', 0, '2024-05-09 21:42:20', '2024-05-09 21:43:45', '2024-05-09 21:43:45'),
(6, 'Da li se učešće na Akademiji plaća?', '<p><span lang=\"BS-LATN-BA\" style=\"font-size:11.0pt;\nline-height:107%;font-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:minor-latin;\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-hansi-theme-font:\nminor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;;mso-bidi-theme-font:minor-bidi;\nmso-ansi-language:BS-LATN-BA;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Ne\nbrinite se o troškovima - mi i naši partneri smo pokrili sve vaše troškove!\nNaše stipendije imaju za cilj da ovaj obogaćujući doživljaj učine dostupnim\nsvima koji su strastveni u vezi sa kreativnosti i inovacijama. Za prijavu za\nstipendiju, jednostavno se registrujte i odaberite program koji odgovara vašim\ninteresima.</span></p>', 0, '2024-05-09 21:42:40', '2024-05-09 21:43:42', '2024-05-09 21:43:42'),
(7, 'Kako se prijaviti na Helem Nejse Talent Akademiju?', '<p><span style=\"font-size: 14.6667px;\">U sekciji Programi odaberi jednu od oblasti koja te interesuje. Tu ćeš pronaći sve detalje o prijavi kao i aplikacionu formu.&nbsp;</span></p>', 0, '2024-05-09 21:45:24', '2024-05-10 19:08:07', NULL),
(9, 'Kad se održava Akademija i koliko traje?', '<p>Helem Nejse Talent Akademija se održava <b>od 2. do 10. avgusta 2024. godine u Sarajevu.</b></p>', 0, '2024-05-10 19:08:50', '2024-05-10 19:08:50', NULL),
(10, 'Ko su predavači na Akademiji?', '<p>Predavači na Akademiji su eminentni ekperti iz regiona, koji su dokazani u&nbsp; oblastima koje obrađujemo. Listu predavača, njihove biografije i teme predavanja možeš pročitati na ovoj stranici.&nbsp;</p>', 0, '2024-05-10 19:09:50', '2024-05-10 19:09:50', NULL),
(8, 'Do kada se mogu prijaviti?', '<p>Aplikacije su otvorene od <b>16. maja do 6. juna 2024.</b> godine.</p>', 0, '2024-05-09 21:45:52', '2024-05-10 19:07:09', NULL),
(11, 'Koliko polaznika će biti odabrano?', '<p>Za svaki od programa Akademije, bit će odabrano između <b>8 i 12 polaznika/ca.&nbsp;</b></p>', 0, '2024-05-10 19:10:36', '2024-05-10 19:10:36', NULL),
(12, 'Postoji li dobna granica za učesnike?', '<p>Aplicirati mogu pojedinci koji imaju između <b>18 i 27 godina </b>iz <b>Bosne i Hercegovine, Srbije, Crne Gore, Hrvatske, Slovenije i Makedonije</b>.</p>', 0, '2024-05-10 19:11:43', '2024-05-10 19:11:43', NULL),
(13, 'Koji su uslovi za učešće u programima?', '<p>Helem Nejse Talent Akademija pruža jednake šanse za upis svim budućim profesionalcima iz srodnih domena kreativnih industrija. Ne zahtijevamo da aplikanti budu studenti ili imaju završene fakultete, ali pri ocjenjivanju aplikacija uzimamo u obzir svako relevantno iskustvo iz polja koje aplikant/ica navede.</p>', 0, '2024-05-10 19:12:10', '2024-05-10 19:12:10', NULL),
(14, 'Da li se učešće na Akademiji plaća?', '<p>Ne brinite se o troškovima - mi i naši partneri smo pokrili sve vaše troškove! Naše stipendije imaju za cilj da ovaj obogaćujući doživljaj učine dostupnim svima koji su strastveni u vezi sa kreativnosti i inovacijama. Za prijavu za stipendiju, jednostavno se registrujte i odaberite program koji odgovara vašim interesima.</p>', 0, '2024-05-10 19:12:43', '2024-05-10 19:12:43', NULL),
(15, 'Da li polaznici po završetku akademije dobijaju certifikate?', '<p>Po završetku Akademije, učesnici dobijaju certifikat o uspješno završenoj Helem Nejse Talent Akademiji sa potpisima svih predavača sa odabranog programa.</p>', 0, '2024-05-10 19:13:23', '2024-05-10 19:13:23', NULL),
(16, 'Da li moram biti student dizajna da bih se prijavio?', '<p>Helem Nejse Talent Akademija pruža jednake šanse za upis svim budućim profesionalcima iz srodnih domena kreativnih industrija. Ne zahtijevamo da aplikanti budu studenti ili imaju završene fakultete, ali pri ocjenjivanju aplikacija uzimamo u obzir svako relevantno iskustvo iz polja koje aplikant/ica navede.</p>', 5, '2024-05-10 19:16:05', '2024-05-10 19:16:05', NULL),
(17, 'Koje će teme biti obrađene na ovom odsjeku?', '<p>Naglasak je stavljen na razvijanje dizajnerskog razmišljanja i rješavanje kreativnih problema, uz promicanje važnosti slobode i igre u kreativnom procesu. Kroz teme kao što su subkulture i vizualni jezik, brendiranje kulturnog nasljeđa, tipografija, dizajn pakovanja i plakatiranje, polaznici će istražiti široki spektar dizajnerskih disciplina. Osim toga, program će otvoriti vrata u novu dimenziju slike i vremena kroz osnove animacije, pružajući jedinstvenu priliku za eksperimentiranje i dekonstrukciju kreativnog procesa.</p>', 5, '2024-05-10 19:16:32', '2024-05-10 19:18:31', NULL),
(21, 'Trebam li biti sposoban raditi u određenom software-u da bih učestvovao?', '<p>Da bi pohađali program Grafičkog dizajna i animacije, polaznici trebaju biti sposobni raditi u programima Adobe Photoshop i Adobe Ilustrator.&nbsp;&nbsp;</p>', 5, '2024-05-10 19:19:51', '2024-05-10 19:19:51', NULL),
(18, 'Kako će se odvijati nastava i da li je planiran praktični rad?', '<p>Ovaj intenzivni program fokusira se na praktične zadatke i radionice iz različitih oblasti, pružajući polaznicima hands-on pristup koji je ključan za razvoj njihovih dizajnerskih vještina. Kroz četiri radionice koje ne zapostavljaju i manuelni rad na fizičkom mediju, cilj je osnažiti kreativni proces i potaknuti eksperimentisanje. Vrhunac programa je produkcija animiranog serijala Bruca Braca Bruda Brada, gdje će polaznici moći primijeniti stečeno znanje u stvaranju autentičnih vizualnih priča.</p>', 5, '2024-05-10 19:17:03', '2024-05-10 19:17:03', NULL),
(19, 'Koliko predavača ću imati na svom odsjeku?', '<p><span lang=\"BS-LATN-BA\" style=\"font-size:12.0pt;\nline-height:107%;font-family:\" times=\"\" new=\"\" roman\",serif;mso-fareast-font-family:=\"\" calibri;mso-fareast-theme-font:minor-latin;mso-ansi-language:bs-latn-ba;=\"\" mso-fareast-language:en-us;mso-bidi-language:ar-sa\"=\"\">Na ovom programu, sa polaznicima će raditi 11 predavača a radi se o emimentnim dizajnerima, univerzitetskim profesorima, regionalno dokazanim profesionalcima iz oblasti grafičkog dizajna i animacije.</span></p>', 5, '2024-05-10 19:17:28', '2024-05-10 19:19:04', NULL),
(20, 'Da li ću tokom Akademije moći sarađivati sa drugim odsjecima?', '<p>Da, upravo saradnja među učesnicima i predavačima sa različitih programa je jedan od najbitnijih segmenata Helem Nejse Talent Akademije. Segmenti saradnje između odsjeka su predviđeni agendom a i učesnici su slobodni da je iniciraju u toku Akademije i nakon nje. </p>', 5, '2024-05-10 19:17:54', '2024-05-10 19:26:20', NULL),
(22, 'Da li ću nakon završetka programa dobiti certifikat?', '<p>Po završetku Akademije, učesnici dobijaju certifikat o uspješno završenoj Helem Nejse Talent Akademiji sa potpisima svih predavača sa odabranog programa.</p>', 5, '2024-05-10 19:20:15', '2024-05-10 19:20:15', NULL),
(23, 'Kako mogu aplicirati?', '<p>Aplicirati možeš popunjavanjem online forme koje se nalazi na našoj web stranici. Svaki program ima zasebnu aplikacionu formu i možeš aplicirati samo za jedan od odsjeka akademije.</p>', 5, '2024-05-10 19:21:31', '2024-05-10 19:21:31', NULL),
(24, 'Da li moram biti student književnosti ili dramaturgije da bih se prijavio?', '<p>Helem Nejse Talent Akademija pruža jednake šanse za upis svim budućim profesionalcima iz srodnih domena kreativnih industrija. Ne zahtijevamo da aplikanti budu studenti ili imaju završene fakultete, ali pri ocjenjivanju aplikacija uzimamo u obzir svako relevantno iskustvo iz polja koje aplikant/ica navede.</p>', 1, '2024-05-10 19:22:33', '2024-05-10 19:22:33', NULL),
(25, 'Koje će teme biti obrađene na ovom odsjeku?', '<p>Tema obrazovnog programa u oblasti Pisanje za 21. stoljeće je komedija i njena društvena uloga između domena zabave i političke kritike. Od teorije antičkog teatra do našeg animiranog serijala BBBB, od teorije smijeha i komike do analiza savremenih filmova i logike sitkoma, od razvijanja vlastite komične scene do njenog igranja s profesionalnim glumcima, ovaj program će izoštriti vaše spisateljske, ali i kritičke sposobnosti.</p>', 1, '2024-05-10 19:23:03', '2024-05-10 19:23:03', NULL),
(26, 'Postoji li određena obavezna literatura koju moram pročitati?', '<p>Polaznicima koji budu izabrani biti će dostavljen spisak preporučene literature koju trebaju pročitati prije predavanja/radionice.</p>', 1, '2024-05-10 19:23:35', '2024-05-10 19:23:35', NULL),
(27, 'Kako će se odvijati nastava i da li je planiran praktični rad?', '<p>Kombinirajući teoretska predavanja i praktične zadatke pod mentorstvom pisaca, univerzitetskih profesora, profesionalaca iz kreativnih industrija pozorišta, filma, televizije, kao i izdavaštva - ovaj program će budućim autoricama i autorima omogućiti da već stečena znanja o književnosti, umjetnosti, pozorištu i filmu, prošire, a vlastiti talent stave pred izazov intenzivnog usavršavanja.&nbsp;</p>', 1, '2024-05-10 19:24:13', '2024-05-10 19:24:13', NULL),
(28, 'Koliko predavača ću imati na svom odsjeku?', '<p>Na programu Kreativnog pisanja, sa polaznicima će raditi devet predavača a radi se o emimentnim piscima, univerzitetskim profesorima, profesionalcima iz kreativnih industrija pozorišta, filma, televizije, kao i izdavaštva.</p>', 1, '2024-05-10 19:24:46', '2024-05-10 19:24:46', NULL),
(29, 'Da li ću tokom Akademije moći sarađivati sa drugim odsjecima?', '<p>Da, upravo saradnja među učesnicima i predavačima sa različitih programa je jedan od najbitnijih segmenata Helem Nejse Talent Akademije. Segmenti saradnje između odsjeka su predviđeni agendom a i učesnici su slobodni da je iniciraju u toku Akademije i nakon nje.&nbsp;</p>', 1, '2024-05-10 19:25:16', '2024-05-10 19:25:16', NULL),
(30, 'Da li ću nakon završetka programa dobiti certifikat?', '<p>Po završetku Akademije, učesnici dobijaju certifikat o uspješno završenoj Helem Nejse Talent Akademiji sa potpisima svih predavača sa odabranog programa.</p>', 1, '2024-05-10 19:25:41', '2024-05-10 19:25:41', NULL),
(31, 'Kako mogu aplicirati?', '<p>Aplicirati možeš popunjavanjem online forme koje se nalazi na našoj web stranici. Svaki program ima zasebnu aplikacionu formu i možeš aplicirati samo za jedan od odsjeka akademije.</p>', 1, '2024-05-10 19:26:41', '2024-05-10 19:26:41', NULL),
(32, 'Da li moram biti student novinarstva da bih se prijavio?', '<p>Helem Nejse Talent Akademija pruža jednake šanse za upis svim budućim profesionalcima iz srodnih domena kreativnih industrija. Ne zahtijevamo da aplikanti budu studenti ili imaju završene fakultete, ali pri ocjenjivanju aplikacija uzimamo u obzir svako relevantno iskustvo iz polja koje aplikant/ica navede.</p>', 2, '2024-05-10 19:27:32', '2024-05-10 19:27:32', NULL),
(33, 'Koje će teme biti obrađene na ovom odsjeku?', '<p>Program će se fokusirati na značajne i uvijek aktualne teme, poput etike medijskog izvještavanja, borbe protiv fake-newsa i dezinformiranja javnosti ili izazova uredništva relevantnih online žurnala. Akcenat ovih predavanja bit će na novim medijima, ali ukazat će se i na iznenađujući novi interes za dugu formu narativnog novinarstva, koje pronalazi sve više publike u našem užurbanom svijetu.</p>', 2, '2024-05-10 19:27:58', '2024-05-10 19:27:58', NULL),
(34, 'Kako će se odvijati nastava i da li je planiran praktični rad?', '<p>Kroz niz predavanja i praktičnih zadataka, uz pažljivo odabrane stručnjake i etablirane novinare s dugogodišnjim iskustvom, polaznici će tokom sedam dana akademije biti upoznati s teorijom i praksom ratne fotoreportaže, intervjua, istraživačkog novinarstva, putopisnog novinarstva, ali i s drugim aspektima novinarske djelatnosti. U okviru praktičnog segmenta bit će organiziran obilazak redakcija u Sarajevu, gdje će se polaznici upoznati sa savremenim metodama provjere informacija, iskušati svoje sposobnosti i samouvjerenost pred kamerom, te razumjeti kako funkcioniraju online magazini.</p>', 2, '2024-05-10 19:28:24', '2024-05-10 19:28:24', NULL),
(35, 'Koliko predavača ću imati na svom odsjeku?', '<p>Na programu Novinarstva, sa polaznicima će raditi devet predavača a radi se o emimentnim novinarima i medijskim radnicima iz regije, među kojima su poznata imena poput Aleksandra Stankovića i Damira Šagolja.&nbsp;</p>', 2, '2024-05-10 19:29:01', '2024-05-10 19:29:01', NULL),
(36, 'Da li ću tokom Akademije moći sarađivati sa drugim odsjecima?', '<p>Da, upravo saradnja među učesnicima i predavačima sa različitih programa je jedan od najbitnijih segmenata Helem Nejse Talent Akademije. Segmenti saradnje između odsjeka su predviđeni agendom a i učesnici su slobodni da je iniciraju u toku Akademije i nakon nje.&nbsp;</p>', 2, '2024-05-10 19:29:27', '2024-05-10 19:29:27', NULL),
(37, 'Kako mogu aplicirati?', '<p>Aplicirati možeš popunjavanjem online forme koje se nalazi na našoj web stranici. Svaki program ima zasebnu aplikacionu formu i možeš aplicirati samo za jedan od odsjeka akademije.</p>', 2, '2024-05-10 19:30:13', '2024-05-10 19:30:13', NULL),
(38, 'Da li ću nakon završetka programa dobiti certifikat?', '<p>Po završetku Akademije, učesnici dobijaju certifikat o uspješno završenoj Helem Nejse Talent Akademiji sa potpisima svih predavača sa odabranog programa.</p>', 2, '2024-05-10 19:30:48', '2024-05-10 19:30:48', NULL),
(39, 'Da li moram biti student informacijskih tehnologija da bih se prijavio?', '<p>Helem Nejse Talent Akademija pruža jednake šanse za upis svim budućim profesionalcima iz srodnih domena kreativnih industrija. Ne zahtijevamo da aplikanti budu studenti ili imaju završene fakultete, ali pri ocjenjivanju aplikacija uzimamo u obzir svako relevantno iskustvo iz polja koje aplikant/ica navede.</p>', 4, '2024-05-10 19:31:46', '2024-05-10 19:31:46', NULL),
(40, 'Koje su primarne teme koje će biti istražene unutar ovog odsjeka?', '<p>Program informacijskih tehnologija s ovogodišnjom temom “odgovorno kodiranje” namijenjen je kreativcima i budućim inženjerima koje pored tehnologije interesuju i teme internet sloboda i prava, borbe protiv online cenzure, internet nadzora, te ih zanima kako njihov rad i kreativna tehnička rješenja mogu pomoći društvu i zajednici u kojoj žive. Također, spajajući umjetnosti i tehnologiju, polaznici akademije će zaviriti u svijet apstraktne umjetnosti podržane tehnologijom i istražiti kako se ta magija može primijeniti u praksi.</p>', 4, '2024-05-10 19:32:29', '2024-05-10 19:32:29', NULL),
(41, 'Kako će se odvijati nastava i da li je planiran praktični rad?', '<p>U sedam dana akademije, polaznici će razgovarati s guruima otvorenog koda i slobodnog softvera koji su radili i rade na nekim od najvažnijih projekata današnjice; naučiti osnove cyber sigurnosti i vidjeti kako mreža honeypotova postavljenih na internetu u Bosni i Hercegovini radi u stvarnom vremenu, te se uključiti u diskusije o umjetnoj inteligenciji i njenim primjenama i saznati više o etici u AI-u. Zajednički ćemo raditi na razvoju \"softvera u stvarnom životu\" kako bismo podržali rad organizacija u Bosni i Hercegovini koje se bave problemima kao što su korupcija ili ekologija.</p>', 4, '2024-05-10 19:33:00', '2024-05-10 19:33:00', NULL),
(42, 'Koliko predavača ću imati na svom odsjeku?', '<p>Na ovom programu, sa polaznicima će raditi 15 predavača, među kojima su gurui otvorenog koda i slobodnog softvera koji su radili i rade na nekim od najvažnijih projekata današnjice.</p>', 4, '2024-05-10 19:33:28', '2024-05-10 19:33:28', NULL),
(43, 'Da li ću tokom Akademije moći sarađivati sa drugim odsjecima?', '<p>Da, upravo saradnja među učesnicima i predavačima sa različitih programa je jedan od najbitnijih segmenata Helem Nejse Talent Akademije. Segmenti saradnje između odsjeka su predviđeni agendom a i učesnici su slobodni da je iniciraju u toku Akademije i nakon nje.</p>', 4, '2024-05-10 19:33:56', '2024-05-10 19:33:56', NULL),
(44, 'Da li ću u okviru programa posjetiti druge firme i organizacije?', '<p>Da, ovaj program obuhvata posjete i saradnje sa drugim firmama i organizacijama, kao što su International Burch University, Cyber Security Excellence Center i druge.</p>', 4, '2024-05-10 19:34:59', '2024-05-10 19:34:59', NULL),
(45, 'Da li ću nakon završetka programa dobiti certifikat?', '<p>Po završetku Akademije, učesnici dobijaju certifikat o uspješno završenoj Helem Nejse Talent Akademiji sa potpisima svih predavača sa odabranog programa.</p>', 4, '2024-05-10 19:35:34', '2024-05-10 19:35:34', NULL),
(46, 'Kako mogu aplicirati?', '<p>Aplicirati možeš popunjavanjem online forme koje se nalazi na našoj web stranici. Svaki program ima zasebnu aplikacionu formu i možeš aplicirati samo za jedan od odsjeka akademije.</p>', 4, '2024-05-10 19:35:53', '2024-05-10 19:35:53', NULL),
(47, 'Da li moram biti student muzičke produkcije da bih se prijavio?', '<p>Helem Nejse Talent Akademija pruža jednake šanse za upis svim budućim profesionalcima iz srodnih domena kreativnih industrija. Ne zahtijevamo da aplikanti budu studenti ili imaju završene fakultete, ali pri ocjenjivanju aplikacija uzimamo u obzir svako relevantno iskustvo iz polja koje aplikant/ica navede.</p>', 3, '2024-05-10 19:36:53', '2024-05-10 19:36:53', NULL),
(48, 'Koje će teme biti obrađene na ovom odsjeku?', '<p>Komponovanje za film, video igre, radio i tv, montaža i obrada zvuka za sliku u pokretu, hip hop produkcija, snimanje, miks i mastering, te psihologija i teorija muzike samo su neke od tema kroz koje će aktivno proći polaznici ovog programa, a sve to uz predavače koji su svoje ogromno iskustvo stekli u raznim domenama kreativne i medijske industrije.</p>', 3, '2024-05-10 19:37:21', '2024-05-10 19:37:21', NULL),
(49, 'Kako će se odvijati nastava i da li je planiran praktični rad?', '<p>Program će biti koncipiran na hands-on principu, u kojem će polaznici kroz zanimljive zadatke, radionice i analize imati bolji uvid u procese bavljenja muzičkom i audio produkcijom. Ovaj program je većinski baziran na praktičnim zadacima a sve teorijske segmente polaznici će imati priliku probati i u praksi. Za to smo obezbijedili pristup vrhunskim studijima u Sarajevu.&nbsp;</p>', 3, '2024-05-10 19:37:48', '2024-05-10 19:37:48', NULL),
(50, 'Koliko predavača ću imati na svom odsjeku?', '<p>Na programu Primijenjene muzičke produkcije, sa polaznicima će raditi devet predavača a radi se o emimentnim stručnjacima iz ove oblasti, čiji rad ih rangira u sam vrh regionalne scene.&nbsp;</p>', 3, '2024-05-10 19:38:17', '2024-05-10 19:38:17', NULL),
(51, 'Da li ću tokom Akademije moći sarađivati sa drugim odsjecima?', '<p>Da, upravo saradnja među učesnicima i predavačima sa različitih programa je jedan od najbitnijih segmenata Helem Nejse Talent Akademije. Segmenti saradnje između odsjeka su predviđeni agendom a i učesnici su slobodni da je iniciraju u toku Akademije i nakon nje.&nbsp;</p>', 3, '2024-05-10 19:38:41', '2024-05-10 19:38:41', NULL),
(52, 'Trebam li biti sposoban raditi u određenom software-u da bih učestvovao?', '<p>Da bi pohađali ovaj program, polaznici trebaju biti sposobni raditi u nekom od DAW software-a, a preferirani su ProTools, Cubase i Ableton.</p>', 3, '2024-05-10 19:39:13', '2024-05-10 19:39:13', NULL),
(53, 'Da li ću nakon završetka programa dobiti certifikat?', '<p>Po završetku Akademije, učesnici dobijaju certifikat o uspješno završenoj Helem Nejse Talent Akademiji sa potpisima svih predavača sa odabranog programa.</p>', 3, '2024-05-10 19:39:45', '2024-05-10 19:39:45', NULL),
(54, 'Kako mogu aplicirati?', '<p>Aplicirati možeš popunjavanjem online forme koje se nalazi na našoj web stranici. Svaki program ima zasebnu aplikacionu formu i možeš aplicirati samo za jedan od odsjeka akademije.</p>', 3, '2024-05-10 19:40:23', '2024-05-10 19:40:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `__files`
--

CREATE TABLE `__files` (
  `id` bigint UNSIGNED NOT NULL,
  `file` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img',
  `path` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(47, 'main_9.png', 'bf8d756790abb7115d0c27d7f64a4d0f.png', 'png', 'blog_img', 'files/blog', '2024-04-21 07:27:26', '2024-04-21 07:27:26'),
(48, '1fe68fe1f674db672e030bfd417d8aee.png', 'f7e059b360b049665b51fd61996aa3c5.png', 'png', 'session_file', 'files/programs/sessions', '2024-04-21 09:41:07', '2024-04-21 09:41:07'),
(49, '4b1a02d1e3a1be170ff4381caf56dd60.png', '4687f5ab0b21cf59410ae8b6baa0421c.png', 'png', 'session_file', 'files/programs/sessions', '2024-04-21 10:30:11', '2024-04-21 10:30:11'),
(50, 'Frame 283 (1).png', '7ad28e6668940c4f77c9ae6f573e6833.png', 'png', 'session_file', 'files/programs/sessions', '2024-04-21 10:30:23', '2024-04-21 10:30:23'),
(51, 'main_3.png', 'c690d41bef31889dbfd8ff8b2e27d450.png', 'png', 'session_file', 'files/programs/sessions', '2024-04-21 10:35:24', '2024-04-21 10:35:24'),
(52, '598959165a020290d80c6bf30ef1f746.png', '4aa50495086b7d70a62e8285e220e8b7.png', 'png', 'session_file', 'files/programs/sessions', '2024-04-21 10:35:31', '2024-04-21 10:35:31'),
(53, '1fe68fe1f674db672e030bfd417d8aee.png', 'ebe5e3a5e13f11586d71cddebbcb2f22.png', 'png', 'app_cv', 'C:\\Users\\kaapi\\Documents\\webApps\\ekipa-academy\\storage\\files/programs/applications', '2024-04-23 15:00:59', '2024-04-23 15:00:59'),
(54, '4b421ac3769bf2509e245ea917533d9d.png', '923d26cacb99f535216b1b319e79b49b.png', 'png', 'app_mot_letter', 'C:\\Users\\kaapi\\Documents\\webApps\\ekipa-academy\\storage\\files/programs/applications', '2024-04-23 15:00:59', '2024-04-23 15:00:59'),
(55, '9b4845de2c2f14252f4e45532151d12e.png', '213a4e595ec466d6e092fc3aa60dfa2b.png', 'png', 'app_other', 'C:\\Users\\kaapi\\Documents\\webApps\\ekipa-academy\\storage\\files/programs/applications', '2024-04-23 15:00:59', '2024-04-23 15:00:59'),
(56, '9b4845de2c2f14252f4e45532151d12e.png', '1a83e457825c0cc1ba4700dc0ec70614.png', 'png', 'app_cv', 'C:\\Users\\kaapi\\Documents\\webApps\\ekipa-academy\\storage\\files/programs/applications', '2024-04-23 15:06:13', '2024-04-23 15:06:13'),
(57, '35d79188500c5f0ae96623ec9d0d78b0.png', 'c57bfe3a215806c23594751b0c5a03ac.png', 'png', 'app_mot_letter', 'C:\\Users\\kaapi\\Documents\\webApps\\ekipa-academy\\storage\\files/programs/applications', '2024-04-23 15:06:13', '2024-04-23 15:06:13'),
(58, 'Frame 281 (1).png', 'f0febca4b0bef0afb6c24b08c107895b.png', 'png', 'app_other', 'C:\\Users\\kaapi\\Documents\\webApps\\ekipa-academy\\storage\\files/programs/applications', '2024-04-23 15:06:13', '2024-04-23 15:06:13'),
(59, '8c8543bba4e01e4ce457fa0dfd600192.jpeg', '67ac552a8b089dd9aeb130e2faf6b13a.jpeg', 'jpeg', 'blog_img', 'files/blog', '2024-04-28 12:40:36', '2024-04-28 12:40:36'),
(60, '5b809c5247f31c25be419abe78e578c7.jpeg', '3edc7a58871b985493dd504f8d5f80e0.jpeg', 'jpeg', 'app_cv', 'C:\\Users\\kaapi\\Documents\\webApps\\ekipa-academy\\storage\\files/programs/applications', '2024-04-28 14:02:03', '2024-04-28 14:02:03'),
(61, '8d30098e8dc3af0f268198ca244e6f1f.jpg', 'd8251e0739f44aff1e4f5953a8b465ef.jpg', 'jpg', 'app_mot_letter', 'C:\\Users\\kaapi\\Documents\\webApps\\ekipa-academy\\storage\\files/programs/applications', '2024-04-28 14:02:03', '2024-04-28 14:02:03'),
(62, '9181ed943eb469dba78ec0912b274250.jpeg', 'cda3d4707b7ccc7110ef7e57f7d5ca6d.jpeg', 'jpeg', 'app_other', 'C:\\Users\\kaapi\\Documents\\webApps\\ekipa-academy\\storage\\files/programs/applications', '2024-04-28 14:02:03', '2024-04-28 14:02:03'),
(63, 'ana_krstajic.png', '3b721844f424a823b667c0117a3f8225.png', 'png', 'blog_gallery', 'files/blog', '2024-05-09 20:11:14', '2024-05-09 20:11:14'),
(64, 'Aleksandar Stanković.jpeg', '8642bd16467141520b28964cf241e44a.jpeg', 'jpeg', 'blog_img', 'files/blog', '2024-05-09 20:11:40', '2024-05-09 20:11:40'),
(65, '35d79188500c5f0ae96623ec9d0d78b0.png', '32c124baa57f5741c0170a501179e13a.png', 'png', 'blog_img', 'files/blog', '2024-05-09 20:19:07', '2024-05-09 20:19:07'),
(66, 'Aleksandar Stanković.jpeg', 'c854f016e4639df84022f51ee5da828c.jpeg', 'jpeg', 'blog_img', 'files/blog', '2024-05-09 20:21:38', '2024-05-09 20:21:38'),
(67, 'celia.jpg', 'bf0c4badfe97132443a613d9d77c6c57.jpg', 'jpg', 'program_file', 'files/images/single-pages/', '2024-05-09 22:09:18', '2024-05-09 22:09:18'),
(68, 'kodiranjeBlog.jpg', 'e5c4b04ed1b29d18d1cb09a61c59cdba.jpg', 'jpg', 'blog_img', 'files/blog', '2024-05-11 17:09:37', '2024-05-11 17:09:37'),
(69, 'BlogMuzika.jpg', 'fc824340196a8e2202e5ec676543dc67.jpg', 'jpg', 'blog_img', 'files/blog', '2024-05-11 17:13:03', '2024-05-11 17:13:03'),
(70, 'hntaCover.jpg', '461e5e577d4d645c66de5c3141ae191f.jpg', 'jpg', 'blog_img', 'files/blog', '2024-05-11 17:18:33', '2024-05-11 17:18:33'),
(71, 'hotel-holiday-sarajevo.jpg', '6d9f773e7189e478e35caab70e7addd5.jpg', 'jpg', 'blog_img', 'files/blog', '2024-05-11 17:23:27', '2024-05-11 17:23:27'),
(72, 'Kuća.jpg', '296c3e386c1be9dc23c433efc31835d2.jpg', 'jpg', 'blog_img', 'files/blog', '2024-05-11 17:23:39', '2024-05-11 17:23:39'),
(73, 'BurchCard.jpg', '411d6d49d244512b6068df11b5f149e8.jpg', 'jpg', 'blog_gallery', 'files/blog', '2024-05-11 17:25:20', '2024-05-11 17:25:20'),
(74, 'BIRNLogoIlustracija-1280x908.jpg', 'ceb58794f91a9914bc91a661a89701b5.jpg', 'jpg', 'blog_gallery', 'files/blog', '2024-05-11 17:25:30', '2024-05-11 17:25:30'),
(75, 'Cyber.jpg', '54af625a920dbb27840a386eb8fc552b.jpg', 'jpg', 'blog_gallery', 'files/blog', '2024-05-11 17:25:40', '2024-05-11 17:25:40'),
(76, 'hotel-holiday-sarajevo.jpg', '015a02a7a8feed9af68d79cdc439ed3d.jpg', 'jpg', 'blog_gallery', 'files/blog', '2024-05-11 17:25:47', '2024-05-11 17:25:47'),
(77, 'Kuća.jpg', 'f542b51d9554832c0ee66bf1a47a4f61.jpg', 'jpg', 'blog_gallery', 'files/blog', '2024-05-11 17:25:55', '2024-05-11 17:25:55'),
(78, 'Vila Braun.jpg', 'b2a16616dd8dcbab5d21934df48cf210.jpg', 'jpg', 'blog_gallery', 'files/blog', '2024-05-11 17:26:06', '2024-05-11 17:26:06'),
(79, 'hntaCover.jpg', '73bb00e5ff684a0da9f679edbd50418d.jpg', 'jpg', 'blog_img', 'files/blog', '2024-05-11 17:28:20', '2024-05-11 17:28:20'),
(80, 'BlogMuzika.jpg', 'db3c8093faa741f684ce86175eaa0ee6.jpg', 'jpg', 'blog_img', 'files/blog', '2024-05-11 17:28:38', '2024-05-11 17:28:38'),
(81, 'kodiranjeBlog.jpg', 'fae317576c422756504c8d4a67cc48b9.jpg', 'jpg', 'blog_img', 'files/blog', '2024-05-11 17:28:54', '2024-05-11 17:28:54'),
(82, 'Jus project.jpg', '2a2ffa05be9ddf8767c322a670a0960a.jpg', 'jpg', 'blog_img', 'files/blog', '2024-05-11 17:32:32', '2024-05-11 17:32:32'),
(83, 'Jus project.jpg', '747923f1ea1b2bc3acf23ff4a323e311.jpg', 'jpg', 'blog_img', 'files/blog', '2024-05-11 17:32:41', '2024-05-11 17:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `__inbox`
--

CREATE TABLE `__inbox` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` bigint UNSIGNED NOT NULL,
  `what` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `__inbox__to` (
  `id` bigint UNSIGNED NOT NULL,
  `inbox_id` bigint UNSIGNED NOT NULL,
  `to` bigint UNSIGNED NOT NULL,
  `read` tinyint NOT NULL DEFAULT '0',
  `read_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `__locations` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` int NOT NULL,
  `location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `map_img` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_img` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_img` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `__locations`
--

INSERT INTO `__locations` (`id`, `title`, `address`, `city`, `country`, `location`, `map_img`, `main_img`, `cover_img`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Evropska kuća kulture i nacionalnih manjina', 'Patriotske Lige', 'Sarajevo', 21, '#', 'a8c1d638f59bbcda783cdd3f0abc1e83.png', '6d08ce9cd737349672325e680edb035a.jpg', '918130f0f6cbc865957319e143169508.jpg', '<p><font color=\"#f7f7f7\"><b style=\"\">Evropska kuća kulture i nacionalnih manjina </b>smještena u samom centru Sarajeva i predstavlja centralnu lokaciju održavanja <b style=\"\">Helem Nejse Talent Akademije</b>. </font></p><p><font color=\"#f7f7f7\">Prvi sprat je koncipiran kao višenamjenski prostor površine od skoro 250m2 unutar kojeg će se održavati program Critical Thinking i koji će predstavljati centralni hub za druženje polaznika, a gornji sprat nudi pet zasebnih \"kupea\", za rad u manjim, odvojenim grupama.</font></p>', '2024-04-17 17:28:29', '2024-05-10 13:07:12'),
(7, 'Vila Braun', 'Alipašina 45', 'Sarajevo', 21, 'https://www.google.com/maps/place/Grafotisak+Sarajevo/@43.845233,18.2990679,15z/data=!4m6!3m5!1s0x4758ca4c3e7dc88d:0x8425e14c5d7b979f!8m2!3d43.8452335!4d18.3093678!16s%2Fg%2F11c4bdc41z?entry=ttu', '7aaa5bde1c06aca3b731e4651457a0de.png', 'dc014abf7908f8d34ffb1f6c5789bf7a.jpg', 'c903b724ae5f5d446dc7804c889cc985.jpg', '<p class=\"MsoNormal\" style=\"text-align:justify;text-justify:inter-ideograph;\nline-height:150%\">Vila Braun, u neposrednoj blizini <i>Evropske kuće kulture i\nnacionalnih manjina </i>predstavlja drugo primarno mjesto održavanja Helem\nNejse Talent Akademije. Ova istaknuta lokacija, s velikom centralnom salom i\nnekoliko soba za sastanke predstavlja idealno mjesto za održavanje predavanja\niz oblasti kreativnih industrija. Velika bašta i terasa ispred kuće će posebno\nobradovati polaznike tokom vrućih ljetnih dana.<o:p></o:p></p>', '2024-04-18 16:37:03', '2024-05-10 13:05:10'),
(11, 'Međunarodni univerzitet Burch (IBU)', 'Francuske revolucije bb, Ilidža', 'Sarajevo', 21, 'https://www.google.com/maps/dir//burch+univerzitet+google+maps/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x4758ca0f99d6bf3b:0x6f97362d8c61c461?sa=X&ved=1t:3061&ictx=111', '0e5a82b44008a388629d07674cfd88be.png', 'adc652381b1ddb9e1cf7a1b0372c8069.jpg', 'd09ee801cbb8db1af5908763ec1d5562.jpg', '<div><span style=\"font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); letter-spacing: 0px; text-align: var(--bs-body-text-align);\"><font color=\"#f7f7f7\">Međunarodni univerzitet Burch (IBU) je u vlasništvu Stirling Educationa, vodećeg pružatelja prvoklasnog obrazovanja širom svijeta, čiji je korporativni sjedište locirano u Londonu, Ujedinjeno Kraljevstvo.</font></span></div><div><font color=\"#f7f7f7\">Sa fakultetima inženjeringa, prirodnih i medicinskih nauka, ekonomije i društvenih nauka, te obrazovanja i humanističkih nauka, Međunarodni univerzitet Burch uživa visoki ugled i slijedi \'model preduzetničkog univerziteta\'; to jest, podstiče i podržava inovacije, prepoznaje i stvara prilike, te promoviše meke vještine i preduzetnički mindset.</font></div><div><font color=\"#f7f7f7\">Međunarodni univerzitet Burch naglašava akademski uspjeh te podstiče i inspiriše svoje studente da postanu najbolji što mogu biti. Istovremeno, Međunarodni univerzitet Burch gleda dalje od akademskog postignuća i prema razvoju karaktera, njegujući i razvijajući jake i otporne karaktere koji mogu misliti nezavisno, imati osjećaj za kreativnost i koji će prihvatiti i rješavati probleme.</font></div><div><font color=\"#f7f7f7\">Kao organizacija, mi smo orijentisani ka budućnosti i prepoznajemo potrebu za prilagođavanjem u svijetu koji se neprestano mijenja tehnološki. Naš kurikulum je prilagođen tako da sadrži snažan digitalni element, podržan izvrsnim nastavnim planom i programom ICT-a i najnovijom tehnologijom u učionicama. Naša ponuda online i digitalnog nastavnog materijala bila je podvrgnuta testiranju pod najtežim globalnim pandemijskim uvjetima.</font></div><div><font color=\"#f7f7f7\">Izuzetno smo ponosni na ono što smo postigli i što možemo postići u narednim godinama.</font></div>', '2024-05-10 09:30:28', '2024-05-10 09:46:53'),
(8, 'Helem Nejse Studio', 'Kobilja glava 35', 'Sarajevo', 21, 'https://maps.app.goo.gl/akaNw1Z6fZ12KHYm8', 'aff2a20676f14ec65975f4e178e8ae54.png', 'd86d426ab4ce6cc7f14448d9f34c18b1.jpg', 'afbf911f98f07d53bc3e2b6ecac49bdc.jpg', '<div style=\"text-align: justify;\"><font color=\"#f7f7f7\">Unutar novog Helem Nejse studija, polaznici odsjeka za muzičku produkciju bit će jedni od prvih koji će raditi na mjestu gdje bend snima muziku, ali i dizajnira zvuk i naraciju za regionalno popularni animirani serijal Bruca Braca Bruda Brada. Cilj je mladima prikazati multifunkcionalni studio namijenjen za produkciju više medija, što postaje standard rada u čitavom svijetu.</font></div>', '2024-04-18 16:37:03', '2024-05-10 13:28:22'),
(12, 'Hotel Holiday', 'Zmaja od Bosne 4', 'Sarajevo', 21, 'https://maps.app.goo.gl/GyVHycDBCZLK763R8', 'd8215981f78dce79a600c5bedb5e2c76.png', '4179bf362e9fa43f99929a712e4b4cfb.jpg', 'c3ce3037df1f5176dbbf8d73224d09d9.jpg', '<div><font color=\"#f7f7f7\">Hotel Holiday je projektirao proslavljeni bosanski arhitekt Ivan Štraus u periodu 1982-1983 te je isti otvoren za XIV Zimske olimpijske igre Sarajevo 1984. godine i od tada je, kao svjedok novije historije Bosne i Hercegovine, postao nezaobilazno mjesto za poslovne putnike i turiste.</font></div><div><font color=\"#f7f7f7\"><br></font></div><div><font color=\"#f7f7f7\">Sljednik svjetskog hotelskog lanca i hotela Holiday Inn te ujedno i dio poznate grupacije Europe Group, na čelu sa Hotelom Europe, čija tradicija datira od davne 1882.godine, hotel Holiday će oduševiti goste svojom tradicionalnom elegancijom, vrhunskom uslugom i sadržajima.</font></div>', '2024-05-10 13:39:00', '2024-05-10 13:41:36'),
(13, 'BIRN', 'Splitska 6', 'Sarajevo', 21, 'https://maps.app.goo.gl/R5k71GPCUKSxhhMe8', '50dac7b2859f2eccb6f762ec7e4c420e.png', '2fd4201b0605ee8da59d1311e5612eab.jpg', NULL, '<p><font color=\"#f7f7f7\">U sklopu dana posvećenom posjetama redakcijama, odsjek za novinarstvo će imati priliku posjetiti i redakciju BIRNa, nevladine organizacije koja se specijalizirala za izvještavanje i monitoring vijesti o suđenjima za ratne zločine i korupciju u državi. Redakcija BIRNa predstavlja jedne od najvažnijih edukatora za odnose prema prošlosti, ali i edakvatnoj reportaži o aktuelnim društvenim pitanjima.</font></p>', '2024-05-10 13:43:55', '2024-05-10 13:50:38'),
(14, 'CSEC Centar', 'Gradačačka 114', 'Sarajevo', 21, 'https://maps.app.goo.gl/wyH4egXuaFpTrNia7', '6357aed6d02c4d05069cd9964f4068f7.png', '245bac8258e94697501a40baa70dc4a0.jpg', '11aefda83c38d0f1228a334798c6a7b7.jpg', '<p><font color=\"#f7f7f7\">Misija CSEC-a je \"pozicionirati se kao neutralna, ključna tačka za sistematski odgovor na cyber incidente u Bosni i Hercegovini kako bi podržali razvoj i unapređenje cyber sigurnosti u Bosni i Hercegovini. CSEC ima misiju jačati komunikaciju između saktera u oblasti cyber sigurnosti te između CSIRT timova u regionu.</font></p><p><font color=\"#f7f7f7\">Centar za Izvrsnost u Cyber Sigurnosti (CSEC) je osnovan, kao dio Criminal Policy Research Centra, i uspostavljen je radi jačanja cyber sigurnosti u Bosni i Hercegovini. Cyber Security Excellence Centre funkcioniše uz podršku Vlade Ujedinjenog Kraljevstva.</font></p><p><font color=\"#f7f7f7\">Zajedno sa podrškom Vlade Ujedinjenog Kraljevstva, CSEC ima podršku DCAF-a i OEBS-a kako bi unaprijedio cyber sigurnost na Zapadnom Balkanu.</font></p><p><font color=\"#f7f7f7\">Trećeg dana naše akademije imat ćemo priliku posjetiti Centar za Izvrsnost u Cyber Sigurnosti (CSEC), gdje će cijeli dan biti posvećen temama cyber sigurnosti. Ovaj posjet će nam pružiti uvid u najnovije trendove, izazove i rješenja u oblasti cyber sigurnosti, te će nam omogućiti interakciju s stručnjacima iz ove oblasti kako bismo proširili svoje znanje i razumijevanje ova važnog područja.</font></p><p><font color=\"#9c9c94\"><br></font></p>', '2024-05-10 18:29:56', '2024-05-10 19:02:36'),
(9, 'Studio Modra rijeka', 'Grbavička bb', 'Sarajevo', 21, 'https://maps.app.goo.gl/SJrBeQUZ7pU4tGA4A', 'f20bcad9ca35687f230b61b8d3f2fb25.png', '6ce0b4b736627700568c4c1059e4e773.jpg', 'c463f43eb4c68b4fd6067759d01dfc60.jpg', '<div style=\"text-align: justify;\"><span style=\"text-align: var(--bs-body-text-align);\"><font color=\"#f7f7f7\">Polaznici odsjeka za primijenjenu muzičku produkciju će imati priliku posjetiti i raditi u studiju Modra rijeka s gitaristom i kompozitorom Dinom Šukalom. Šukalo je radio kao kompozitor na filmovima Pjera Žalice, novoj seriji Srđana Vuletića, te će svoja iskustva u sound designu i kompoziciji za film i televiziju podijeliti s mladim profesionalcima koji se tek okušavaju u ovoj oblasti.</font></span></div>', '2024-04-28 10:55:18', '2024-05-10 13:32:45'),
(10, 'Studio Chelia', 'Radićeva 2', 'Sarajevo', 21, '#', 'f81c4cb7bb0b808bd96af472efbd4c53.png', 'c6447bdc1eacf1f7c4baa74ab6cfca41.jpg', 'a2f54d4efe876f6f8f08080030c05f4e.jpg', '<p class=\"MsoNormal\" style=\"text-align:justify;text-justify:inter-ideograph;\nline-height:150%\"><span style=\"white-space: pre; white-space: normal;\">	</span></p><p class=\"MsoNormal\" style=\"text-align:justify;text-justify:inter-ideograph;\nline-height:150%\"><span style=\"font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); letter-spacing: 0px;\"><font color=\"#ffffff\">Studio Chelia, posvećen primarno audio post-produkciji, sadrži najsavremeniju audio opremu i najprofesionalnije uslove za rad. </font></span></p><p class=\"MsoNormal\" style=\"text-align:justify;text-justify:inter-ideograph;\nline-height:150%\"><span style=\"font-size: var(--bs-body-font-size); letter-spacing: 0px;\"><font color=\"#ffffff\"><span style=\"font-weight: var(--bs-body-font-weight);\">Polaznici odsjeka za primijenjenu muzičku produkciju će ovdje, pod mentorstvom </span><b style=\"\">Mirze Tahirovića</b><span style=\"font-weight: var(--bs-body-font-weight);\">, steći teoretska i praktična znanja o snimanju <i style=\"\">foley zvukova i sound designa za filmsko platno</i>.</span></font></span></p>', '2024-05-09 14:33:45', '2024-05-10 13:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `__single_pages`
--

CREATE TABLE `__single_pages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `__single_pages`
--

INSERT INTO `__single_pages` (`id`, `title`, `description`, `image_id`, `created_at`, `updated_at`) VALUES
(1, 'Osvoji stipendiju za Helem Nejse Talent Akademiju', '<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><font color=\"#f7f7f7\">Želite li istražiti svoj kreativni potencijal, usavršiti svoje vještine i povezati se s vrhunskim stručnjacima iz tvoje industrije? Sada je pravo vrijeme! Helem Nejse Talent Akademija nudi Vam jedinstvenu priliku da otkrijete svoj talenat i stvorite svoj put prema uspjehu. </font></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><font color=\"#f7f7f7\">Helem Nejse Talent Akademija sa zadovoljstvom objavljuje poziv za osvajanje stipendija i poziva Vas na naš ljetni program koji će se održati od 2. do 10. avgusta 2024. godine u Sarajevu.</font></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><font color=\"#f7f7f7\">Ako ste mladi pisac, novinar, entuzijasta za kodiranje i tehnologiju, grafički dizajner ili muzički producent, ova prilika je za vas.</font></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><b><font color=\"#f7f7f7\">Ko može aplicirati?</font></b></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><font color=\"#f7f7f7\">Svi studenti ili mladi profesionalci iz Bosne i Hercegovine, Srbije, Crne Gore, Hrvatske i Slovenije i koji dolaze iz povezanih industrija ili fakulteta su dobrodošli da se prijave! </font></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><font color=\"#f7f7f7\">Prijavljena lica moraju biti u dobi od 18 do 27 godina.</font></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><b><font color=\"#f7f7f7\">Do kada je otvoren poziv? </font></b></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><font color=\"#f7f7f7\">Poziv za vaše aplikacije je otvoren od 16.05.2024. Do 06.06.2024. godine. Prijava nakon ovog roka neće biti moguća.</font></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><b><font color=\"#f7f7f7\">Šta stipendija pokriva? </font></b></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><font color=\"#f7f7f7\">Svaki dobitnik stipendije će dobiti sveobuhvatnu podršku, koja uključuje:</font></p><ul><li style=\"text-align: justify; line-height: 150%;\"><font color=\"#f7f7f7\">Smještaj u hotelu za vrijeme trajanja programa</font></li><li style=\"text-align: justify; line-height: 150%;\"><span style=\"font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); letter-spacing: 0px;\"><font color=\"#f7f7f7\">Obroke i osvježenja</font></span></li><li style=\"text-align: justify; line-height: 150%;\"><font color=\"#f7f7f7\">Putnički grant koji će pokriti sve troškove tokom Vašeg boravka u Sarajevu</font></li></ul><p style=\"text-align: justify; line-height: 150%;\"><font color=\"#f7f7f7\">Ne brinite se o troškovima - mi i naši partneri smo pokrili sve vaše troškove! Naše stipendije imaju za cilj da ovaj obogaćujući doživljaj učine dostupnim svima koji su strastveni u vezi sa kreativnosti i inovacijama.</font></p><p style=\"text-align: justify; line-height: 150%;\"><font color=\"#f7f7f7\">Za prijavu za stipendiju, jednostavno se registrujte i odaberite program koji odgovara vašim interesima. Naši programi uključuju:</font></p><ol><li style=\"text-align: justify; line-height: 150%;\"><font color=\"#f7f7f7\">KREATIVNO PISANJE: Pisanje komedije</font></li><li style=\"text-align: justify; line-height: 150%;\"><span style=\"font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); letter-spacing: 0px;\"><font color=\"#f7f7f7\">NOVINARSTVO: Novinarstvo i novi mediji</font></span></li><li style=\"text-align: justify; line-height: 150%;\"><font color=\"#f7f7f7\">INFORMACIJSKE TEHNOLOGIJE: Odgovorno kodiranje</font></li><li style=\"text-align: justify; line-height: 150%;\"><font color=\"#f7f7f7\">GRAFIČKI DIZAJN I ANIMACIJA: Istraživanje vizuelnih narativa</font></li><li style=\"text-align: justify; line-height: 150%;\"><font color=\"#f7f7f7\">MUZIKA: Primijenjena muzička produkcija</font></li></ol><p style=\"text-align: justify; line-height: 150%;\"><b><font color=\"#f7f7f7\">Koliko polaznika će biti upisano na telent akademiju?</font></b></p><p style=\"text-align: justify; line-height: 150%;\"><font color=\"#f7f7f7\">U malim grupama od 8 do 12 polaznika po programu, imat ćete priliku za personalizirano učenje i praktično iskustvo.</font></p><p style=\"text-align: justify; line-height: 150%;\"><font color=\"#f7f7f7\">Pridružite se Helem Nejse Talent Akademiji kako biste stekli iskustvo i vještine potrebne u dinamičnom svijetu kreativnih industrija. Iskoristite ovu priliku da učite, rastete i povežete se sa kolegama iz cijele regije.</font></p><p style=\"text-align: justify; line-height: 150%;\"><font color=\"#f7f7f7\">Za više informacija o našoj Akademiji i njenom cilju, posjetite našu web stranicu.</font></p><p style=\"text-align: justify; line-height: 150%;\"><font color=\"#f7f7f7\">Radujemo se što ćemo vas dočekati na <b>Helem Nejse Talent Akademiji!</b></font></p>', 67, '2024-04-18 19:46:40', '2024-05-09 22:09:22'),
(2, 'O nama', '-', 9, '2024-04-18 19:46:40', '2024-04-18 19:46:40'),
(3, 'Kriteriji upisa', '<div><font color=\"#f7f7f7\">Helem Nejse Talent Akademija je sedmodnevni program edukacije i usavršavanja u oblasti kreativnih industrija.</font></div><div><font color=\"#f7f7f7\"><br></font></div><div><font color=\"#f7f7f7\"><b>Ko može aplicirati: </b>Svi pojedinci od <b>18 do 27</b> godina iz <b>Bosne i Hercegovine, Srbije, Crne Gore, Hrvatske i Slovenije</b> imaju pravo aplicirati za jedan od programa na akademiji.</font></div><div><font color=\"#f7f7f7\"><br></font></div><div><font color=\"#f7f7f7\"><b>Kriteriji ocjenjivanja i izbor:</b><i> Helem Nejse Talent Akademija</i> pruža jednake šanse za upis svim budućim profesionalcima iz srodnih domena kreativnih industrija. Ne zahtijevamo da aplikanti budu studenti ili imaju završene fakultete, ali pri ocjenjivanju aplikacija uzimamo u obzir svako relevantno iskustvo iz polja koje aplikant/ica navede.</font></div><div><font color=\"#f7f7f7\"><br></font></div><div><font color=\"#f7f7f7\"><b>Datumi apliciranja</b>: Aplikacije su otvorene od <b>16. maja do 6. juna 2024.</b> godine.</font></div><div><font color=\"#f7f7f7\"><br></font></div><div><font color=\"#f7f7f7\">Proces selekcije: Kandidati koji uđu u uži izbor bit će pozvani na online intervjue koji će se održati od <b>25. juna do 10. jula</b>. Konačna odluka o primljenim kandidatima bit će objavljena <b>20.&nbsp;jula 2024.</b></font></div><div><font color=\"#f7f7f7\"><br></font></div><div><font color=\"#f7f7f7\">Potpisivanje ugovora: Nakon obavijesti o uspješnom upisu na akademiju, polaznici će potpisati <b>ugovor o stipendiranju.</b></font></div><div><font color=\"#f7f7f7\"><br></font></div><div><font color=\"#f7f7f7\"><b style=\"\">Helem Nejse Talent Akademija</b> srdačno poziva sve zainteresirane mlade kreativce da se prijave i budu dio ovog jedinstvenog iskustva usavršavanja u kreativnim industrijama.</font></div>', 9, '2024-04-18 19:46:40', '2024-05-09 21:02:01'),
(4, 'Kako nas kontaktirati?', '<p><b><font color=\"#f7f7f7\">Fondacija Ekipa</font></b></p><p><font color=\"#f7f7f7\">Gabelina 14,&nbsp;</font></p><p><font color=\"#f7f7f7\">71000 Sarajevo, </font></p><p><font color=\"#f7f7f7\">BiH</font></p><p><i><font color=\"#f7f7f7\">info[at]fondacijaekipa.ba</font></i></p><p><i><font color=\"#f7f7f7\"><br></font></i></p><p><i><font color=\"#f7f7f7\"><br></font></i></p><p><span style=\"font-weight: bolder;\"><font color=\"#f7f7f7\">Helem Nejse</font></span></p><p><font color=\"#f7f7f7\">Gabelina 14,&nbsp;</font></p><p><font color=\"#f7f7f7\">71000 Sarajevo,</font></p><p><font color=\"#f7f7f7\">BiH</font></p><p><i><font color=\"#f7f7f7\">gmail[at]helemnejse.ba</font></i></p><p><i><font color=\"#f7f7f7\"><br></font></i></p><p><i><font color=\"#f7f7f7\"><br></font></i></p>', 9, '2024-04-18 19:46:40', '2024-05-09 21:09:53'),
(5, 'Politika privatnosti', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 9, '2024-04-18 19:46:40', '2024-04-18 17:57:16'),
(6, 'Uslovi korištenja', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 9, '2024-04-18 19:46:40', '2024-04-18 17:57:16'),
(7, 'Korisni kolačići', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 9, '2024-04-18 19:46:40', '2024-04-18 17:57:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api__countries`
--
ALTER TABLE `api__countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog__galery`
--
ALTER TABLE `blog__galery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog__galery_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs__applications`
--
ALTER TABLE `programs__applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programs__applications_program_id_foreign` (`program_id`),
  ADD KEY `programs__applications_attendee_id_foreign` (`attendee_id`);

--
-- Indexes for table `programs__sessions`
--
ALTER TABLE `programs__sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programs__sessions_program_id_foreign` (`program_id`),
  ADD KEY `programs__sessions_location_id_foreign` (`location_id`),
  ADD KEY `programs__sessions_presenter_id_foreign` (`presenter_id`);

--
-- Indexes for table `programs__sessions_attendees`
--
ALTER TABLE `programs__sessions_attendees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programs__sessions_attendees_program_id_foreign` (`program_id`),
  ADD KEY `programs__sessions_attendees_attendee_id_foreign` (`attendee_id`);

--
-- Indexes for table `programs__sessions_files`
--
ALTER TABLE `programs__sessions_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programs__sessions_files_session_id_foreign` (`session_id`),
  ADD KEY `programs__sessions_files_file_id_foreign` (`file_id`);

--
-- Indexes for table `programs__sessions_links`
--
ALTER TABLE `programs__sessions_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programs__sessions_links_session_id_foreign` (`session_id`);

--
-- Indexes for table `programs__sessions_notes`
--
ALTER TABLE `programs__sessions_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programs__sessions_notes_attendee_id_foreign` (`attendee_id`),
  ADD KEY `programs__sessions_notes_session_id_foreign` (`session_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `__faqs`
--
ALTER TABLE `__faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `__files`
--
ALTER TABLE `__files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `__inbox`
--
ALTER TABLE `__inbox`
  ADD PRIMARY KEY (`id`),
  ADD KEY `__inbox_from_foreign` (`from`);

--
-- Indexes for table `__inbox__to`
--
ALTER TABLE `__inbox__to`
  ADD PRIMARY KEY (`id`),
  ADD KEY `__inbox__to_inbox_id_foreign` (`inbox_id`),
  ADD KEY `__inbox__to_to_foreign` (`to`);

--
-- Indexes for table `__locations`
--
ALTER TABLE `__locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `__single_pages`
--
ALTER TABLE `__single_pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api__countries`
--
ALTER TABLE `api__countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `blog__galery`
--
ALTER TABLE `blog__galery`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `programs__applications`
--
ALTER TABLE `programs__applications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `programs__sessions`
--
ALTER TABLE `programs__sessions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `programs__sessions_attendees`
--
ALTER TABLE `programs__sessions_attendees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs__sessions_files`
--
ALTER TABLE `programs__sessions_files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `programs__sessions_links`
--
ALTER TABLE `programs__sessions_links`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `programs__sessions_notes`
--
ALTER TABLE `programs__sessions_notes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `__faqs`
--
ALTER TABLE `__faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `__files`
--
ALTER TABLE `__files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `__inbox`
--
ALTER TABLE `__inbox`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `__inbox__to`
--
ALTER TABLE `__inbox__to`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `__locations`
--
ALTER TABLE `__locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `__single_pages`
--
ALTER TABLE `__single_pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
