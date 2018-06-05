-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2018 at 07:04 AM
-- Server version: 5.5.52-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p-6107_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE `channel` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`id`, `name`) VALUES
(1, 'sms'),
(2, 'email'),
(3, 'manual');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `fiirstname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `patronymic` varchar(100) CHARACTER SET latin1 NOT NULL,
  `rate` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `organization` varchar(200) NOT NULL,
  `source_inf` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fiirstname`, `lastname`, `patronymic`, `rate`, `code`, `organization`, `source_inf`, `age`, `created_at`) VALUES
(1, 'Magzhan', 'Sabazbekov', 'Berikovich', 3, 'Промоутеры', 'Narxoz', 'Филиал', 19, '2017-11-23 13:38:21'),
(2, 'Nursultan', 'Nietbaev', 'Abiddauly', 3, 'Промоутеры', 'Narxoz', 'Филиал', 19, '2017-11-23 13:38:21'),
(3, 'Viktor', 'Glushko', '', 3, 'Промоутеры', 'Narxoz', 'Филиал', 19, '2017-11-23 13:38:21'),
(4, 'Dmitry', 'Volkovskii', '', 1, 'Детракторы', 'Narxoz', 'Техподдержки', 32, '2017-11-23 13:37:42'),
(5, 'Ulpan', 'Salamatova', '', 1, 'Детракторы', 'Narxoz', 'Техподдержки', 32, '2017-11-23 13:37:42'),
(6, 'Polina', 'Antonova', '', 1, 'Детракторы', 'Narxoz', 'Техподдержки', 32, '2017-11-23 13:37:42'),
(7, 'Renata', 'Korkunova', '', 2, 'Нейтралы', 'Narxoz', 'Контакт-центры', 23, '2017-11-23 13:13:08'),
(8, 'Elena', 'Korenkova', '', 2, 'Нейтралы', 'Narxoz', 'Контакт-центры', 23, '2017-11-23 13:13:08'),
(9, 'Tatiana', 'Sarkisova', '', 2, 'Нейтралы', 'Narxoz', 'Контакт-центры', 23, '2017-11-23 13:13:08'),
(10, 'Zhazira', 'Saparova', '', 3, 'Промоутеры', 'Narxoz', 'Филиал', 19, '2017-11-23 13:38:21'),
(11, 'Akzhol', 'Kanapya', '', 3, 'Промоутеры', 'Narxoz', 'Филиал', 19, '2017-11-23 13:38:21'),
(12, 'Shuak', 'Rahat', '', 3, 'Промоутеры', 'Narxoz', 'Филиал', 19, '2017-11-23 13:38:21'),
(13, 'Adil', 'Yergali', '', 3, 'Промоутеры', 'Narxoz', 'Филиал', 19, '2017-11-23 13:38:21'),
(14, 'Ulia', 'Ivahno', '', 3, 'Промоутеры', 'Narxoz', 'Филиал', 19, '2017-11-23 13:38:21'),
(15, 'Semen', 'Sobolev', '', 2, 'Нейтралы', 'Narxoz', 'Контакт-центры', 23, '2017-11-23 13:13:08'),
(16, 'Ivan', 'Ivanov', '', 2, 'Нейтралы', 'Narxoz', 'Контакт-центры', 23, '2017-11-23 13:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `clients_contact`
--

CREATE TABLE `clients_contact` (
  `id` bigint(20) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `firtsname` varchar(255) DEFAULT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `sex` varchar(15) NOT NULL,
  `channel` varchar(50) NOT NULL,
  `point_of_interaction` varchar(200) NOT NULL,
  `avgcheck` varchar(50) NOT NULL,
  `servicetime` int(11) NOT NULL,
  `product` varchar(10) NOT NULL,
  `duration_of_service` int(11) NOT NULL,
  `transactions` int(10) NOT NULL,
  `company_id` int(11) NOT NULL,
  `manager_id` varchar(150) NOT NULL,
  `is_active` int(11) NOT NULL,
  `res` varchar(255) NOT NULL,
  `req_url_1` varchar(255) NOT NULL,
  `req_url_2` varchar(255) NOT NULL,
  `res_1` varchar(255) NOT NULL,
  `is_send` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients_contact`
--

INSERT INTO `clients_contact` (`id`, `lastname`, `firtsname`, `patronymic`, `age`, `email`, `phone`, `sex`, `channel`, `point_of_interaction`, `avgcheck`, `servicetime`, `product`, `duration_of_service`, `transactions`, `company_id`, `manager_id`, `is_active`, `res`, `req_url_1`, `req_url_2`, `res_1`, `is_send`) VALUES
(1, 'Nietbayev', 'Nursultan', 'Abi', 27, 'nurik-0791@mail.ru', '77789933211', '1', '1', '1', '5000', 2, 'A', 2, 5, 1, '1', 0, '', '', '', '', 0),
(2, 'Sabazbekov', 'Magzhan', '', 26, 'hitch911@mail.ru', '77079616940', '1', '2', '2', '15000', 3, 'B', 1, 3, 1, '1', 0, '', '', '', '', 0),
(3, 'test', 'test', 'test', 26, 'hitch911@mail.ru', '77079616940', '2', '3', '3', '20000', 2, 'C', 2, 4, 1, '1', 0, '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` bigint(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `region` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `status`, `region`) VALUES
(1, 'Parmigano group Almaty', 1, 'ALA'),
(17, 'Narxoz', 1, 'AST');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `group_questions`
--

CREATE TABLE `group_questions` (
  `id` bigint(20) NOT NULL,
  `title` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_questions`
--

INSERT INTO `group_questions` (`id`, `title`) VALUES
(1, 'Ваш пол?'),
(2, 'Как часто Вы приходите к нам?'),
(3, 'Что Вам наиболее нравится у нас?'),
(4, 'Ваше любимое блюдо/напиток?'),
(5, 'то бы Вы хотели у нас увидеть еще (в меню, программе, обстановке)?'),
(6, 'Что, по Вашему мнению, заслуживает изменений?'),
(7, 'Что, по Вашему мнению, заслуживает изменений?'),
(8, 'Откуда Вы узнали о нашем заведении?'),
(9, ' Нравится ли Вам оформление зала и обстановка?'),
(10, 'Устраивает ли Вас уровень обслуживания?'),
(11, 'Какие из выбранных блюд Вам:'),
(12, 'Если Вам у нас понравилось, будете ли Вы рекомендовать наше заведение своим друзьям и знакомым.'),
(13, 'Как Вы узнали о кафе?'),
(14, 'Ваш возраст?'),
(15, 'Насколько Вы удовлетворены нашими услугами/продуктом?'),
(16, 'Решился ли ваш вопрос?'),
(17, 'Вы удовлетворены?');

-- --------------------------------------------------------

--
-- Table structure for table `linechart`
--

CREATE TABLE `linechart` (
  `date` date NOT NULL,
  `value` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `linechart`
--

INSERT INTO `linechart` (`date`, `value`) VALUES
('2012-07-27', 13),
('2012-07-28', 11),
('2012-07-29', 15),
('2012-07-30', 16),
('2012-07-31', 18),
('2012-08-01', 13),
('2012-08-02', 22),
('2012-08-03', 23),
('2012-08-04', 20),
('2012-08-05', 17),
('2012-08-06', 16),
('2012-08-07', 18),
('2012-08-08', 21),
('2012-08-09', 26),
('2012-08-10', 24),
('2012-08-11', 29),
('2012-08-12', 32),
('2012-08-13', 18),
('2012-08-14', 24),
('2012-08-15', 22),
('2012-08-16', 18),
('2012-08-17', 19),
('2012-08-18', 14),
('2012-08-19', 15),
('2012-08-20', 12),
('2012-08-21', 8),
('2012-08-22', 9),
('2012-08-23', 8),
('2012-08-24', 7),
('2012-08-25', 5),
('2012-08-26', 11),
('2012-08-27', 13),
('2012-08-28', 18),
('2012-08-29', 20),
('2012-08-30', 29),
('2012-08-31', 33),
('2012-09-01', 42),
('2012-09-02', 35),
('2012-09-03', 31),
('2012-09-04', 47),
('2012-09-05', 52),
('2012-09-06', 46),
('2012-09-07', 41),
('2012-09-08', 43),
('2012-09-09', 40),
('2012-09-10', 39),
('2012-09-11', 34),
('2012-09-12', 29),
('2012-09-13', 34),
('2012-09-14', 37),
('2012-09-15', 42),
('2012-09-16', 49),
('2012-09-17', 46),
('2012-09-18', 47),
('2012-09-19', 55),
('2012-09-20', 59),
('2012-09-21', 58),
('2012-09-22', 57),
('2012-09-23', 61),
('2012-09-24', 59),
('2012-09-25', 67),
('2012-09-26', 65),
('2012-09-27', 61),
('2012-09-28', 66),
('2012-09-29', 69),
('2012-09-30', 71),
('2012-10-01', 67),
('2012-10-02', 63),
('2012-10-03', 46),
('2012-10-04', 32),
('2012-10-05', 21),
('2012-10-06', 18),
('2012-10-07', 21),
('2012-10-08', 28),
('2012-10-09', 27),
('2012-10-10', 36),
('2012-10-11', 33),
('2012-10-12', 31),
('2012-10-13', 30),
('2012-10-14', 34),
('2012-10-15', 38),
('2012-10-16', 37),
('2012-10-17', 44),
('2012-10-18', 49),
('2012-10-19', 53),
('2012-10-20', 57),
('2012-10-21', 60),
('2012-10-22', 61),
('2012-10-23', 69),
('2012-10-24', 67),
('2012-10-25', 72),
('2012-10-26', 77),
('2012-10-27', 75),
('2012-10-28', 70),
('2012-10-29', 72),
('2012-10-30', 70),
('2012-10-31', 72),
('2012-11-01', 73),
('2012-11-02', 67),
('2012-11-03', 68),
('2012-11-04', 65),
('2012-11-05', 71),
('2012-11-06', 75),
('2012-11-07', 74),
('2012-11-08', 71),
('2012-11-09', 76),
('2012-11-10', 77),
('2012-11-11', 81),
('2012-11-12', 83),
('2012-11-13', 80),
('2012-11-14', 81),
('2012-11-15', 87),
('2012-11-16', 82),
('2012-11-17', 86),
('2012-11-18', 80),
('2012-11-19', 87),
('2012-11-20', 83),
('2012-11-21', 85),
('2012-11-22', 84),
('2012-11-23', 82),
('2012-11-24', 73),
('2012-11-25', 71),
('2012-11-26', 75),
('2012-11-27', 79),
('2012-11-28', 70),
('2012-11-29', 73),
('2012-11-30', 61),
('2012-12-01', 62),
('2012-12-02', 66),
('2012-12-03', 65),
('2012-12-04', 73),
('2012-12-05', 79),
('2012-12-06', 78),
('2012-12-07', 78),
('2012-12-08', 78),
('2012-12-09', 74),
('2012-12-10', 73),
('2012-12-11', 75),
('2012-12-12', 70),
('2012-12-13', 77),
('2012-12-14', 67),
('2012-12-15', 62),
('2012-12-16', 64),
('2012-12-17', 61),
('2012-12-18', 59),
('2012-12-19', 53),
('2012-12-20', 54),
('2012-12-21', 56),
('2012-12-22', 59),
('2012-12-23', 58),
('2012-12-24', 55),
('2012-12-25', 52),
('2012-12-26', 54),
('2012-12-27', 50),
('2012-12-28', 50),
('2012-12-29', 51),
('2012-12-30', 52),
('2012-12-31', 58),
('2013-01-01', 60),
('2013-01-02', 67),
('2013-01-03', 64),
('2013-01-04', 66),
('2013-01-05', 60),
('2013-01-06', 63),
('2013-01-07', 61),
('2013-01-08', 60),
('2013-01-09', 65),
('2013-01-10', 75),
('2013-01-11', 77),
('2013-01-12', 78),
('2013-01-13', 70),
('2013-01-14', 70),
('2013-01-15', 73),
('2013-01-16', 71),
('2013-01-17', 74),
('2013-01-18', 78),
('2013-01-19', 85),
('2013-01-20', 82),
('2013-01-21', 83),
('2013-01-22', 88),
('2013-01-23', 85),
('2013-01-24', 85),
('2013-01-25', 80),
('2013-01-26', 87),
('2013-01-27', 84),
('2013-01-28', 83),
('2013-01-29', 84),
('2013-01-30', 81);

-- --------------------------------------------------------

--
-- Table structure for table `logquestions`
--

CREATE TABLE `logquestions` (
  `id` int(11) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_quee` int(11) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logquestions`
--

INSERT INTO `logquestions` (`id`, `created_at`, `question_id`, `question_quee`, `phone_number`, `answer`, `type`) VALUES
(217, '2018/01/08 11:25:12', 1, 1, '\n        77777731859', '2', 0),
(218, '2018/01/08 11:25:15', 1, 2, '\n        77777731859', '3', 0),
(219, '2018/01/08 11:25:17', 1, 3, '\n        77777731859', '1', 0),
(220, '2018/01/08 11:25:20', 1, 4, '\n        77777731859', '4', 0),
(221, '2018/01/08 11:25:24', 1, 5, '\n        77777731859', 'пвап', 0),
(222, '2018/01/08 11:28:00', 1, 1, '\n        77476364086', '2', 0),
(223, '2018/01/08 11:28:08', 1, 2, '\n        77476364086', '5', 0),
(224, '2018/01/08 11:28:15', 1, 3, '\n        77476364086', '1', 0),
(225, '2018/01/08 11:28:18', 1, 4, '\n        77476364086', '4', 0),
(226, '2018/01/08 14:29:09', 1, 1, '\n        77789933211', '3', 0),
(227, '2018/01/08 14:29:32', 1, 2, '\n        77789933211', '3', 0),
(228, '2018/01/08 14:29:35', 1, 3, '\n        77789933211', '4', 0),
(229, '2018/01/08 14:29:37', 1, 4, '\n        77789933211', '4', 0),
(230, '2018/01/08 14:29:46', 1, 5, '\n        77789933211', 'Fff', 0),
(231, '2018/01/08 17:49:07', 1, 1, '\n        77777731851', '3', 0),
(232, '2018/01/08 17:49:20', 1, 2, '\n        77777731851', '2', 0),
(233, '2018/01/08 17:49:32', 1, 3, '\n        77777731851', '4', 0),
(234, '2018/01/08 17:49:36', 1, 4, '\n        77777731851', '1', 0),
(235, '2018/01/08 17:49:47', 1, 5, '\n        77777731851', 'test', 0),
(236, '2018/01/09 14:42:24', 1, 6, '\n        77476364086', '7', -1),
(237, '2018/01/09 14:44:37', 1, 1, '\n            ', '1', 0),
(238, '2018/01/09 14:44:59', 1, 2, '\n            ', '2', 0),
(239, '2018/01/12 14:42:05', 1, 3, '\n            ', '9', 1),
(240, '2018/01/12 14:42:33', 1, 4, '\n            ', '3', 1),
(241, '2018/01/12 14:42:42', 1, 5, '\n            ', '5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logsms`
--

CREATE TABLE `logsms` (
  `id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `to_phone` varchar(100) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `answer_date` varchar(100) DEFAULT NULL,
  `question_quee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log_random_questions`
--

CREATE TABLE `log_random_questions` (
  `id` int(11) NOT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `question_quee` int(11) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `answer` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_random_questions`
--

INSERT INTO `log_random_questions` (`id`, `created_at`, `question_id`, `question_quee`, `phone_number`, `answer`) VALUES
(6, '2018/01/12 01:24:13', 10, 1, '77789933211', '2'),
(7, '2018/01/12 01:24:13', 7, 2, '77789933211', '2'),
(8, '2018/01/12 01:24:13', 9, 3, '77789933211', '4'),
(9, '2018/01/12 01:24:13', 5, 4, '77789933211', '4'),
(10, '2018/01/12 01:24:13', 4, 5, '77789933211', '4'),
(11, '2018/01/12 11:37:55', 1, 1, '77789933211', '2'),
(12, '2018/01/12 11:37:55', 13, 2, '77789933211', '3'),
(13, '2018/01/12 11:37:55', 7, 3, '77789933211', '3'),
(14, '2018/01/12 11:37:55', 8, 4, '77789933211', '3'),
(15, '2018/01/12 11:37:55', 10, 5, '77789933211', '3'),
(16, '2018/01/12 14:44:09', 4, 1, '77789933211', '3'),
(17, '2018/01/12 14:44:09', 3, 2, '77789933211', '4'),
(18, '2018/01/12 14:44:09', 10, 3, '77789933211', '3'),
(19, '2018/01/12 14:44:09', 13, 4, '77789933211', '2'),
(20, '2018/01/12 14:44:09', 8, 5, '77789933211', '3');

-- --------------------------------------------------------

--
-- Table structure for table `log_simple_questions`
--

CREATE TABLE `log_simple_questions` (
  `id` int(11) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_quee` int(11) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_simple_questions`
--

INSERT INTO `log_simple_questions` (`id`, `created_at`, `question_id`, `question_quee`, `phone_number`, `answer`, `type`) VALUES
(67, '2018/01/08 11:24:55', 1, 1, '', '5', 0),
(68, '2018/01/08 11:25:00', 2, 2, '', '3', 0),
(69, '2018/01/08 11:25:02', 3, 3, '', '3', 0),
(70, '2018/01/08 11:25:04', 4, 4, '', '4', 0),
(71, '2018/01/08 11:25:07', 5, 5, '', 'dsdsdsdsd', 0),
(72, '2018/01/08 17:51:31', 1, 1, '77476364086', '6', 0),
(73, '2018/01/08 17:51:37', 2, 2, '77476364086', '4', 0),
(74, '2018/01/08 17:51:41', 3, 3, '77476364086', '5', 0),
(75, '2018/01/08 17:51:45', 4, 4, '77476364086', '5', 0),
(76, '2018/01/08 17:51:54', 5, 5, '77476364086', 'yefywehfo', 0),
(77, '2018/01/16 16:06:13', 1, 1, '77479054273', '2', 0),
(78, '2018/01/16 16:06:17', 2, 2, '77479054273', '4', 0),
(79, '2018/01/16 16:06:24', 3, 3, '77479054273', '4', 0),
(80, '2018/01/16 16:06:27', 4, 4, '77479054273', '1', 0),
(81, '2018/01/16 16:06:35', 5, 5, '77479054273', 'йцук', 0),
(82, '2018/01/16 16:12:07', 1, 1, '77777731859', '3', 0),
(83, '2018/01/16 16:12:09', 2, 2, '77777731859', '5', 0),
(84, '2018/01/16 16:12:11', 3, 3, '77777731859', '2', 0),
(85, '2018/01/16 16:12:13', 4, 4, '77777731859', '4', 0),
(86, '2018/01/16 16:12:26', 5, 5, '77777731859', 'Все понравилось ', 0),
(87, '2018/01/16 16:16:11', 1, 1, '77079616940', '5', 0),
(88, '2018/01/16 16:16:12', 2, 2, '77079616940', '3', 0),
(89, '2018/01/16 16:16:14', 3, 3, '77079616940', '3', 0),
(90, '2018/01/16 16:16:15', 4, 4, '77079616940', '2', 0),
(91, '2018/01/16 16:16:30', 5, 5, '77079616940', '3втвоов', 0),
(92, '2018/01/16 16:49:26', 1, 1, '77476364089', '1', 0),
(93, '2018/01/16 16:49:29', 2, 2, '77476364089', '3', 0),
(94, '2018/01/16 16:49:31', 3, 3, '77476364089', '5', 0),
(95, '2018/01/16 16:49:33', 4, 4, '77476364089', '1', 0),
(96, '2018/01/16 16:49:37', 5, 5, '77476364089', 'IHYIUYHI;0OI', 0),
(97, '2018/01/16 18:25:07', 1, 1, '77476364083', '5', 0),
(98, '2018/01/16 18:25:09', 2, 2, '77476364083', '4', 0),
(99, '2018/01/16 18:25:11', 3, 3, '77476364083', '5', 0),
(100, '2018/01/16 18:25:13', 4, 4, '77476364083', '1', 0),
(101, '2018/01/16 18:25:16', 5, 5, '77476364083', 'Tesy', 0),
(102, '2018/01/16 18:27:23', 1, 1, '77777055514', '4', 0),
(103, '2018/01/16 18:27:30', 2, 2, '77777055514', '3', 0),
(104, '2018/01/16 18:27:36', 3, 3, '77777055514', '4', 0),
(105, '2018/01/16 18:30:29', 1, 1, '77777055514', '4', 0),
(106, '2018/01/16 18:30:34', 2, 2, '77777055514', '4', 0),
(107, '2018/01/16 18:30:39', 3, 3, '77777055514', '4', 0),
(108, '2018/01/16 18:30:44', 4, 4, '77777055514', '5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `patronymic` varchar(150) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `lastname`, `firstname`, `patronymic`, `company_id`) VALUES
(1, 'Test', 'Test', 'Test', 1),
(3, 'Nurs', 'Nurs', 'Nurs', 17),
(4, 'nureke', 'Nureke@mail.ru', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `point_of_interaction`
--

CREATE TABLE `point_of_interaction` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `point_of_interaction`
--

INSERT INTO `point_of_interaction` (`id`, `name`) VALUES
(1, 'Call-Center'),
(2, 'Тех.поддержка'),
(3, 'Офис продаж');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `code`, `title`, `created`, `status`) VALUES
(1, '1', 'Оцените по 10-бальной шкале вероятность того что Вы порекомендуете наши услуги/продукты своим друзьям и родным', '2017-12-26 04:29:28', 0),
(2, '2', 'Насколько Вы удовлетворены нашими услугами/продуктом', '2017-12-25 09:54:23', 0),
(3, '3', 'Понравилось ли Вам в нашем ресторане', '2017-12-25 09:54:26', 0),
(4, '4', 'Уточните пожалуйста, что именно вам понравилось', '2017-12-25 09:54:29', 0),
(5, '5', 'Оставьте пожалуйста свой комментарий или пожелание', '2017-12-25 09:54:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(11) NOT NULL,
  `id_sys` varchar(100) NOT NULL,
  `received` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `message` text NOT NULL,
  `to_phone` varchar(12) NOT NULL,
  `sent_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reponse`
--

INSERT INTO `reponse` (`id`, `id_sys`, `received`, `phone`, `message`, `to_phone`, `sent_date`) VALUES
(1, '41358471', '27.12.2017 08:21:51', 'BeeInfo', 'Не хватает средств для месячной платы 890тг. Списано 35тг и доступен безлимит на Beeline на сутки. Пополнитесь до 890тг и получите безлимит на Beeline на месяц', '77762015718', '27.12.2017 08:21:33\n'),
(2, '41460852', '02.01.2018 08:26:00', 'BeeInfo', 'Не хватает средств для месячной платы 890тг. Списано 35тг и доступен безлимит на Beeline на сутки. Пополнитесь до 890тг и получите безлимит на Beeline на месяц', '77762015718', '02.01.2018 08:25:42\n'),
(3, '41459030', '02.01.2018 02:11:51', 'BeeInfo', 'Ваш баланс ниже 35тг. Безлимитные звонки на Beeline недоступны. Пополнитесь до 890тг и получите безлимит на Beeline на месяц и 40мин на др.моб.сети', '77762015718', '02.01.2018 02:11:35\n'),
(4, '41473786', '03.01.2018 12:23:42', 'BeeInfo', 'Ваш счёт пополнен на 500.00 тенге. Баланс 503.00 тг. Не забудьте', '77762015718', '03.01.2018 12:23:19\n'),
(5, '41502749', '05.01.2018 09:03:23', 'BeeInfo', 'Ваш баланс менее 40 тг. Пополните баланс услугой \"Доверительный Платеж\". Наберите *141#. Цена 59тг. Инфо http://bee.gg/1NE6gsi или 064046', '77762015718', '05.01.2018 09:03:07\n'),
(6, '41502564', '05.01.2018 08:22:03', 'BeeInfo', 'Не хватает средств для месячной платы 890тг. Списано 35тг и доступен безлимит на Beeline на сутки. Пополнитесь до 890тг и получите безлимит на Beeline на месяц', '77762015718', '05.01.2018 08:21:46\n');

-- --------------------------------------------------------

--
-- Table structure for table `respond_average_per_year`
--

CREATE TABLE `respond_average_per_year` (
  `id` int(11) NOT NULL,
  `providers` float NOT NULL,
  `neutrals` float NOT NULL,
  `detructors` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `respond_average_per_year`
--

INSERT INTO `respond_average_per_year` (`id`, `providers`, `neutrals`, `detructors`) VALUES
(1, 7, 3.9, 5.9),
(2, 6.9, 4.2, 4.2),
(3, 9.5, 8.5, 3.5),
(4, 14.5, 11.9, 16.9),
(5, 18.4, 15.2, 15.2),
(6, 21.5, 17, 14),
(7, 25.2, 16.6, 12.6),
(8, 26.5, 14.2, 12.2),
(9, 23.3, 10.3, 20.3),
(10, 13.9, 6.6, 9.6),
(11, 9.6, 4.8, 4.8),
(12, 18.3, 10.3, 20.3);

-- --------------------------------------------------------

--
-- Table structure for table `respond_rate_per_year`
--

CREATE TABLE `respond_rate_per_year` (
  `id` int(11) NOT NULL,
  `count_question` int(11) NOT NULL,
  `count_respond` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `respond_rate_per_year`
--

INSERT INTO `respond_rate_per_year` (`id`, `count_question`, `count_respond`) VALUES
(1, 67, 50),
(2, 87, 16),
(3, 64, 21),
(4, 81, 11),
(5, 65, 22),
(6, 36, 12),
(7, 54, 23),
(8, 43, 15),
(9, 74, 37),
(10, 58, 42),
(11, 14, 11),
(12, 38, 31);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'auhtor'),
(3, 'editor');

-- --------------------------------------------------------

--
-- Table structure for table `simple_questions`
--

CREATE TABLE `simple_questions` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `question_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `simple_questions`
--

INSERT INTO `simple_questions` (`id`, `code`, `title`, `created`, `status`, `question_type`) VALUES
(1, '1', 'В настоящее время Ваш проект в нашей компании находится в активной стадии или уже завершен?', '2018-01-04 02:18:03', 0, 1),
(2, '2', 'Насколько хорошо специалист по обслуживанию клиентов справился с Вашим проектом?', '2018-01-04 02:18:22', 0, 0),
(3, '3', 'Насколько точно нашей компанией был соблюден график реализации проекта?', '2018-01-04 02:18:50', 0, 1),
(4, '4', 'Какова вероятность того, что Вы обратитесь в нашу компанию снова?', '2018-01-04 02:19:32', 0, 1),
(5, '5', 'Оставьте пожалуйста свой комментарий или пожелание http://prostartup.kz/gentelella/production/askQuestions.php', '2017-12-25 08:16:11', 0, 0),
(6, ' ', 'hduiHDAWUDHAWID	58485948', '2018-01-15 12:43:31', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_question`
--

CREATE TABLE `sub_question` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `quee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_question`
--

INSERT INTO `sub_question` (`id`, `title`, `parent_id`, `type`, `quee`) VALUES
(3, 'test1', 1, 1, 1),
(4, 'test2', 1, 1, 2),
(5, 'test3', 1, 1, 3),
(6, 'test4', 1, 1, 4),
(7, 'test1 neg', 1, 0, 1),
(8, 'test2 neg', 1, 0, 2),
(9, 'test3 neg', 1, 0, 3),
(10, 'test4 neg', 1, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `patronymic` varchar(150) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `position` varchar(200) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `patronymic`, `status`, `company_id`, `role_id`, `position`, `login`, `password`) VALUES
(1, 'Airi', 'Satou', NULL, 1, 1, 3, 'Accountant', 'Satou', NULL),
(2, 'Angelica', 'Ramos', NULL, 1, 2, 3, 'Software Engineer', 'Ramos', NULL),
(3, 'Ashton', 'Cox', NULL, 1, 3, 3, 'Software Engineer', 'Cox', NULL),
(4, 'Bradley', 'Greer', NULL, 1, 3, 3, 'Software Engineer', 'Greer', NULL),
(5, 'Brenden', 'Wagner', NULL, 1, 4, 3, 'Software Engineer', 'Wagner', NULL),
(6, 'Brielle', 'Williamson', NULL, 1, 4, 3, 'Sales Assistant', 'Williamson', NULL),
(7, 'Bruno', 'Nash', 'Nash', 1, 4, 3, 'Sales Assistant', 'Nash', NULL),
(8, 'Caesar', 'Vance', 'Caesar', 1, 3, 3, 'Sales Assistant', 'Vance', NULL),
(9, 'Cara', 'Stevens', 'Stevens', 1, 2, 3, 'Sales Assistant', 'Stevens', NULL),
(10, 'Cedric', 'Cedric', 'Cedric', 1, 1, 3, 'Accountant', 'user', 'e10adc3949ba59abbe56e057f20f883e'),
(11, 'Admin', 'Admin', NULL, 1, 0, 1, 'Accountant', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(12, 'Дана', 'Жусип', 'Калыбайкызы', 1, 0, 3, 'Бухгалтер', 'dana', 'c26be8aaf53b15054896983b43eb6a65'),
(13, 'nyes', 'nrs', '', 1, 1, 2, 'test', 'test', '14e1b600b1fd579f47433b88e8d85291');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_contact`
--
ALTER TABLE `clients_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_questions`
--
ALTER TABLE `group_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logquestions`
--
ALTER TABLE `logquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logsms`
--
ALTER TABLE `logsms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_random_questions`
--
ALTER TABLE `log_random_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_simple_questions`
--
ALTER TABLE `log_simple_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_of_interaction`
--
ALTER TABLE `point_of_interaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respond_average_per_year`
--
ALTER TABLE `respond_average_per_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respond_rate_per_year`
--
ALTER TABLE `respond_rate_per_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simple_questions`
--
ALTER TABLE `simple_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_question`
--
ALTER TABLE `sub_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channel`
--
ALTER TABLE `channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `clients_contact`
--
ALTER TABLE `clients_contact`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `group_questions`
--
ALTER TABLE `group_questions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `logquestions`
--
ALTER TABLE `logquestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
--
-- AUTO_INCREMENT for table `logsms`
--
ALTER TABLE `logsms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log_random_questions`
--
ALTER TABLE `log_random_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `log_simple_questions`
--
ALTER TABLE `log_simple_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `point_of_interaction`
--
ALTER TABLE `point_of_interaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `respond_average_per_year`
--
ALTER TABLE `respond_average_per_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `respond_rate_per_year`
--
ALTER TABLE `respond_rate_per_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `simple_questions`
--
ALTER TABLE `simple_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sub_question`
--
ALTER TABLE `sub_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
