-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 06:40 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hitmeup`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_categories`
--

CREATE TABLE `business_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_categories`
--

INSERT INTO `business_categories` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'grocery', 1, '2021-11-11 10:44:25', NULL),
(2, 'departmental stores', 1, '2021-11-11 10:44:26', NULL),
(3, 'clothing', 1, '2021-11-11 10:44:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'AS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua And Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas The'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CD', 'Congo The Democratic Republic Of The'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)'),
(54, 'HR', 'Croatia (Hrvatska)'),
(55, 'CU', 'Cuba'),
(56, 'CY', 'Cyprus'),
(57, 'CZ', 'Czech Republic'),
(58, 'DK', 'Denmark'),
(59, 'DJ', 'Djibouti'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'TP', 'East Timor'),
(63, 'EC', 'Ecuador'),
(64, 'EG', 'Egypt'),
(65, 'SV', 'El Salvador'),
(66, 'GQ', 'Equatorial Guinea'),
(67, 'ER', 'Eritrea'),
(68, 'EE', 'Estonia'),
(69, 'ET', 'Ethiopia'),
(70, 'XA', 'External Territories of Australia'),
(71, 'FK', 'Falkland Islands'),
(72, 'FO', 'Faroe Islands'),
(73, 'FJ', 'Fiji Islands'),
(74, 'FI', 'Finland'),
(75, 'FR', 'France'),
(76, 'GF', 'French Guiana'),
(77, 'PF', 'French Polynesia'),
(78, 'TF', 'French Southern Territories'),
(79, 'GA', 'Gabon'),
(80, 'GM', 'Gambia The'),
(81, 'GE', 'Georgia'),
(82, 'DE', 'Germany'),
(83, 'GH', 'Ghana'),
(84, 'GI', 'Gibraltar'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'XU', 'Guernsey and Alderney'),
(92, 'GN', 'Guinea'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HT', 'Haiti'),
(96, 'HM', 'Heard and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HK', 'Hong Kong S.A.R.'),
(99, 'HU', 'Hungary'),
(100, 'IS', 'Iceland'),
(101, 'IN', 'India'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'JM', 'Jamaica'),
(109, 'JP', 'Japan'),
(110, 'XJ', 'Jersey'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea North'),
(116, 'KR', 'Korea South'),
(117, 'KW', 'Kuwait'),
(118, 'KG', 'Kyrgyzstan'),
(119, 'LA', 'Laos'),
(120, 'LV', 'Latvia'),
(121, 'LB', 'Lebanon'),
(122, 'LS', 'Lesotho'),
(123, 'LR', 'Liberia'),
(124, 'LY', 'Libya'),
(125, 'LI', 'Liechtenstein'),
(126, 'LT', 'Lithuania'),
(127, 'LU', 'Luxembourg'),
(128, 'MO', 'Macau S.A.R.'),
(129, 'MK', 'Macedonia'),
(130, 'MG', 'Madagascar'),
(131, 'MW', 'Malawi'),
(132, 'MY', 'Malaysia'),
(133, 'MV', 'Maldives'),
(134, 'ML', 'Mali'),
(135, 'MT', 'Malta'),
(136, 'XM', 'Man (Isle of)'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'YT', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia'),
(144, 'MD', 'Moldova'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'MS', 'Montserrat'),
(148, 'MA', 'Morocco'),
(149, 'MZ', 'Mozambique'),
(150, 'MM', 'Myanmar'),
(151, 'NA', 'Namibia'),
(152, 'NR', 'Nauru'),
(153, 'NP', 'Nepal'),
(154, 'AN', 'Netherlands Antilles'),
(155, 'NL', 'Netherlands The'),
(156, 'NC', 'New Caledonia'),
(157, 'NZ', 'New Zealand'),
(158, 'NI', 'Nicaragua'),
(159, 'NE', 'Niger'),
(160, 'NG', 'Nigeria'),
(161, 'NU', 'Niue'),
(162, 'NF', 'Norfolk Island'),
(163, 'MP', 'Northern Mariana Islands'),
(164, 'NO', 'Norway'),
(165, 'OM', 'Oman'),
(166, 'PK', 'Pakistan'),
(167, 'PW', 'Palau'),
(168, 'PS', 'Palestinian Territory Occupied'),
(169, 'PA', 'Panama'),
(170, 'PG', 'Papua new Guinea'),
(171, 'PY', 'Paraguay'),
(172, 'PE', 'Peru'),
(173, 'PH', 'Philippines'),
(174, 'PN', 'Pitcairn Island'),
(175, 'PL', 'Poland'),
(176, 'PT', 'Portugal'),
(177, 'PR', 'Puerto Rico'),
(178, 'QA', 'Qatar'),
(179, 'RE', 'Reunion'),
(180, 'RO', 'Romania'),
(181, 'RU', 'Russia'),
(182, 'RW', 'Rwanda'),
(183, 'SH', 'Saint Helena'),
(184, 'KN', 'Saint Kitts And Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'PM', 'Saint Pierre and Miquelon'),
(187, 'VC', 'Saint Vincent And The Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'XG', 'Smaller Territories of the UK'),
(200, 'SB', 'Solomon Islands'),
(201, 'SO', 'Somalia'),
(202, 'ZA', 'South Africa'),
(203, 'GS', 'South Georgia'),
(204, 'SS', 'South Sudan'),
(205, 'ES', 'Spain'),
(206, 'LK', 'Sri Lanka'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard And Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syria'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad And Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks And Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States Minor Outlying Islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State (Holy See)'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (US)'),
(241, 'WF', 'Wallis And Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'YU', 'Yugoslavia'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `country_seq`
--

CREATE TABLE `country_seq` (
  `next_not_cached_value` bigint(21) NOT NULL,
  `minimum_value` bigint(21) NOT NULL,
  `maximum_value` bigint(21) NOT NULL,
  `start_value` bigint(21) NOT NULL COMMENT 'start value when sequences is created or value if RESTART is used',
  `increment` bigint(21) NOT NULL COMMENT 'increment value',
  `cache_size` bigint(21) UNSIGNED NOT NULL,
  `cycle_option` tinyint(1) UNSIGNED NOT NULL COMMENT '0 if no cycles are allowed, 1 if the sequence should begin a new cycle when maximum_value is passed',
  `cycle_count` bigint(21) NOT NULL COMMENT 'How many cycles have been done'
) ENGINE=InnoDB;

--
-- Dumping data for table `country_seq`
--

INSERT INTO `country_seq` (`next_not_cached_value`, `minimum_value`, `maximum_value`, `start_value`, `increment`, `cache_size`, `cycle_option`, `cycle_count`) VALUES
(1, 1, 9223372036854775806, 1, 1, 1000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_01_09_050221_create_countries_table', 1),
(6, '2021_01_09_052719_create_states_table', 1),
(7, '2021_09_10_053059_create_user_details_table', 1),
(8, '2021_09_10_054917_create_user_addresses_table', 1),
(9, '2021_09_10_102810_create_user_verifies_table', 1),
(10, '2021_09_13_104833_create_categories_table', 1),
(11, '2021_09_14_080100_create_products_table', 1),
(12, '2021_09_14_085838_create_options_table', 1),
(13, '2021_09_14_094130_create_product_options_table', 1),
(14, '2021_09_14_095016_create_media_table', 1),
(15, '2021_09_14_120727_create_vouchers_table', 1),
(16, '2021_09_14_121430_create_voucher_conditions_table', 1),
(17, '2021_09_14_121635_create_voucher_condition_types_table', 1),
(18, '2021_09_15_063634_add_paid_to_update_voucher_table', 1),
(19, '2021_09_15_113246_create_user_carts_table', 2),
(20, '2021_09_17_071521_create_user_wishlists_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phonecodes`
--

CREATE TABLE `phonecodes` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phonecodes`
--

INSERT INTO `phonecodes` (`id`, `name`, `phonecode`) VALUES
(1, 'AFGHANISTAN', 93),
(2, 'ALBANIA', 355),
(3, 'ALGERIA', 213),
(4, 'AMERICAN SAMOA', 1684),
(5, 'ANDORRA', 376),
(6, 'ANGOLA', 244),
(7, 'ANGUILLA', 1264),
(8, 'ANTARCTICA', 0),
(9, 'ANTIGUA AND BARBUDA', 1268),
(10, 'ARGENTINA', 54),
(11, 'ARMENIA', 374),
(12, 'ARUBA', 297),
(13, 'AUSTRALIA', 61),
(14, 'AUSTRIA', 43),
(15, 'AZERBAIJAN', 994),
(16, 'BAHAMAS', 1242),
(17, 'BAHRAIN', 973),
(18, 'BANGLADESH', 880),
(19, 'BARBADOS', 1246),
(20, 'BELARUS', 375),
(21, 'BELGIUM', 32),
(22, 'BELIZE', 501),
(23, 'BENIN', 229),
(24, 'BERMUDA', 1441),
(25, 'BHUTAN', 975),
(26, 'BOLIVIA', 591),
(27, 'BOSNIA AND HERZEGOVINA', 387),
(28, 'BOTSWANA', 267),
(29, 'BOUVET ISLAND', 0),
(30, 'BRAZIL', 55),
(31, 'BRITISH INDIAN OCEAN TERRITORY', 246),
(32, 'BRUNEI DARUSSALAM', 673),
(33, 'BULGARIA', 359),
(34, 'BURKINA FASO', 226),
(35, 'BURUNDI', 257),
(36, 'CAMBODIA', 855),
(37, 'CAMEROON', 237),
(38, 'CANADA', 1),
(39, 'CAPE VERDE', 238),
(40, 'CAYMAN ISLANDS', 1345),
(41, 'CENTRAL AFRICAN REPUBLIC', 236),
(42, 'CHAD', 235),
(43, 'CHILE', 56),
(44, 'CHINA', 86),
(45, 'CHRISTMAS ISLAND', 61),
(46, 'COCOS (KEELING) ISLANDS', 672),
(47, 'COLOMBIA', 57),
(48, 'COMOROS', 269),
(49, 'CONGO', 242),
(50, 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 242),
(51, 'COOK ISLANDS', 682),
(52, 'COSTA RICA', 506),
(53, 'COTE D\'IVOIRE', 225),
(54, 'CROATIA', 385),
(55, 'CUBA', 53),
(56, 'CYPRUS', 357),
(57, 'CZECHIA', 420),
(58, 'DENMARK', 45),
(59, 'DJIBOUTI', 253),
(60, 'DOMINICA', 1767),
(61, 'DOMINICAN REPUBLIC', 1),
(62, 'ECUADOR', 593),
(63, 'EGYPT', 20),
(64, 'EL SALVADOR', 503),
(65, 'EQUATORIAL GUINEA', 240),
(66, 'ERITREA', 291),
(67, 'ESTONIA', 372),
(68, 'ETHIOPIA', 251),
(69, 'FALKLAND ISLANDS (MALVINAS)', 500),
(70, 'FAROE ISLANDS', 298),
(71, 'FIJI', 679),
(72, 'FINLAND', 358),
(73, 'FRANCE', 33),
(74, 'FRENCH GUIANA', 594),
(75, 'FRENCH POLYNESIA', 689),
(76, 'FRENCH SOUTHERN TERRITORIES', 0),
(77, 'GABON', 241),
(78, 'GAMBIA', 220),
(79, 'GEORGIA', 995),
(80, 'GERMANY', 49),
(81, 'GHANA', 233),
(82, 'GIBRALTAR', 350),
(83, 'GREECE', 30),
(84, 'GREENLAND', 299),
(85, 'GRENADA', 1473),
(86, 'GUADELOUPE', 590),
(87, 'GUAM', 1671),
(88, 'GUATEMALA', 502),
(89, 'GUINEA', 224),
(90, 'GUINEA-BISSAU', 245),
(91, 'GUYANA', 592),
(92, 'HAITI', 509),
(93, 'HEARD ISLAND AND MCDONALD ISLANDS', 0),
(94, 'HOLY SEE (VATICAN CITY STATE)', 39),
(95, 'HONDURAS', 504),
(96, 'HONG KONG', 852),
(97, 'HUNGARY', 36),
(98, 'ICELAND', 354),
(99, 'INDIA', 91),
(100, 'INDONESIA', 62),
(101, 'IRAN, ISLAMIC REPUBLIC OF', 98),
(102, 'IRAQ', 964),
(103, 'IRELAND', 353),
(104, 'ISRAEL', 972),
(105, 'ITALY', 39),
(106, 'JAMAICA', 1876),
(107, 'JAPAN', 81),
(108, 'JORDAN', 962),
(109, 'KAZAKHSTAN', 7),
(110, 'KENYA', 254),
(111, 'KIRIBATI', 686),
(112, 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 850),
(113, 'KOREA, REPUBLIC OF', 82),
(114, 'KUWAIT', 965),
(115, 'KYRGYZSTAN', 996),
(116, 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 856),
(117, 'LATVIA', 371),
(118, 'LEBANON', 961),
(119, 'LESOTHO', 266),
(120, 'LIBERIA', 231),
(121, 'LIBYAN ARAB JAMAHIRIYA', 218),
(122, 'LIECHTENSTEIN', 423),
(123, 'LITHUANIA', 370),
(124, 'LUXEMBOURG', 352),
(125, 'MACAO', 853),
(126, 'NORTH MACEDONIA', 389),
(127, 'MADAGASCAR', 261),
(128, 'MALAWI', 265),
(129, 'MALAYSIA', 60),
(130, 'MALDIVES', 960),
(131, 'MALI', 223),
(132, 'MALTA', 356),
(133, 'MARSHALL ISLANDS', 692),
(134, 'MARTINIQUE', 596),
(135, 'MAURITANIA', 222),
(136, 'MAURITIUS', 230),
(137, 'MAYOTTE', 269),
(138, 'MEXICO', 52),
(139, 'MICRONESIA, FEDERATED STATES OF', 691),
(140, 'MOLDOVA, REPUBLIC OF', 373),
(141, 'MONACO', 377),
(142, 'MONGOLIA', 976),
(143, 'MONTSERRAT', 1664),
(144, 'MOROCCO', 212),
(145, 'MOZAMBIQUE', 258),
(146, 'MYANMAR', 95),
(147, 'NAMIBIA', 264),
(148, 'NAURU', 674),
(149, 'NEPAL', 977),
(150, 'NETHERLANDS', 31),
(151, 'NETHERLANDS ANTILLES', 599),
(152, 'NEW CALEDONIA', 687),
(153, 'NEW ZEALAND', 64),
(154, 'NICARAGUA', 505),
(155, 'NIGER', 227),
(156, 'NIGERIA', 234),
(157, 'NIUE', 683),
(158, 'NORFOLK ISLAND', 672),
(159, 'NORTHERN MARIANA ISLANDS', 1670),
(160, 'NORWAY', 47),
(161, 'OMAN', 968),
(162, 'PAKISTAN', 92),
(163, 'PALAU', 680),
(164, 'PALESTINIAN TERRITORY, OCCUPIED', 970),
(165, 'PANAMA', 507),
(166, 'PAPUA NEW GUINEA', 675),
(167, 'PARAGUAY', 595),
(168, 'PERU', 51),
(169, 'PHILIPPINES', 63),
(170, 'PITCAIRN', 0),
(171, 'POLAND', 48),
(172, 'PORTUGAL', 351),
(173, 'PUERTO RICO', 1787),
(174, 'QATAR', 974),
(175, 'REUNION', 262),
(176, 'ROMANIA', 40),
(177, 'RUSSIAN FEDERATION', 7),
(178, 'RWANDA', 250),
(179, 'SAINT HELENA', 290),
(180, 'SAINT KITTS AND NEVIS', 1869),
(181, 'SAINT LUCIA', 1758),
(182, 'SAINT PIERRE AND MIQUELON', 508),
(183, 'SAINT VINCENT AND THE GRENADINES', 1784),
(184, 'SAMOA', 684),
(185, 'SAN MARINO', 378),
(186, 'SAO TOME AND PRINCIPE', 239),
(187, 'SAUDI ARABIA', 966),
(188, 'SENEGAL', 221),
(189, 'SERBIA', 381),
(190, 'SEYCHELLES', 248),
(191, 'SIERRA LEONE', 232),
(192, 'SINGAPORE', 65),
(193, 'SLOVAKIA', 421),
(194, 'SLOVENIA', 386),
(195, 'SOLOMON ISLANDS', 677),
(196, 'SOMALIA', 252),
(197, 'SOUTH AFRICA', 27),
(198, 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 0),
(199, 'SPAIN', 34),
(200, 'SRI LANKA', 94),
(201, 'SUDAN', 249),
(202, 'SURINAME', 597),
(203, 'SVALBARD AND JAN MAYEN', 47),
(204, 'SWAZILAND', 268),
(205, 'SWEDEN', 46),
(206, 'SWITZERLAND', 41),
(207, 'SYRIAN ARAB REPUBLIC', 963),
(208, 'TAIWAN, PROVINCE OF CHINA', 886),
(209, 'TAJIKISTAN', 992),
(210, 'TANZANIA, UNITED REPUBLIC OF', 255),
(211, 'THAILAND', 66),
(212, 'TIMOR-LESTE', 670),
(213, 'TOGO', 228),
(214, 'TOKELAU', 690),
(215, 'TONGA', 676),
(216, 'TRINIDAD AND TOBAGO', 1868),
(217, 'TUNISIA', 216),
(218, 'TURKEY', 90),
(219, 'TURKMENISTAN', 993),
(220, 'TURKS AND CAICOS ISLANDS', 1649),
(221, 'TUVALU', 688),
(222, 'UGANDA', 256),
(223, 'UKRAINE', 380),
(224, 'UNITED ARAB EMIRATES', 971),
(225, 'UNITED KINGDOM', 44),
(226, 'UNITED STATES', 1),
(227, 'UNITED STATES MINOR OUTLYING ISLANDS', 1),
(228, 'URUGUAY', 598),
(229, 'UZBEKISTAN', 998),
(230, 'VANUATU', 678),
(231, 'VENEZUELA', 58),
(232, 'VIET NAM', 84),
(233, 'VIRGIN ISLANDS, BRITISH', 1284),
(234, 'VIRGIN ISLANDS, U.S.', 1340),
(235, 'WALLIS AND FUTUNA', 681),
(236, 'WESTERN SAHARA', 212),
(237, 'YEMEN', 967),
(238, 'ZAMBIA', 260),
(239, 'ZIMBABWE', 263),
(240, 'MONTENEGRO', 382),
(241, 'KOSOVO', 383),
(242, 'ALAND ISLANDS', 358),
(243, 'BONAIRE, SINT EUSTATIUS AND SABA', 599),
(244, 'CURACAO', 599),
(245, 'GUERNSEY', 44),
(246, 'ISLE OF MAN', 44),
(247, 'JERSEY', 44),
(248, 'SAINT BARTHELEMY', 590),
(249, 'SAINT MARTIN', 590),
(250, 'SINT MAARTEN', 1),
(251, 'SOUTH SUDAN', 211);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'Andaman and Nicobar Islands', 101),
(2, 'Andhra Pradesh', 101),
(3, 'Arunachal Pradesh', 101),
(4, 'Assam', 101),
(5, 'Bihar', 101),
(6, 'Chandigarh', 101),
(7, 'Chhattisgarh', 101),
(8, 'Dadra and Nagar Haveli', 101),
(9, 'Daman and Diu', 101),
(10, 'Delhi-NCR', 101),
(11, 'Goa', 101),
(12, 'Gujarat', 101),
(13, 'Haryana', 101),
(14, 'Himachal Pradesh', 101),
(15, 'Jammu and Kashmir', 101),
(16, 'Jharkhand', 101),
(17, 'Karnataka', 101),
(18, 'Kenmore', 101),
(19, 'Kerala', 101),
(20, 'Lakshadweep', 101),
(21, 'Madhya Pradesh', 101),
(22, 'Maharashtra', 101),
(23, 'Manipur', 101),
(24, 'Meghalaya', 101),
(25, 'Mizoram', 101),
(26, 'Nagaland', 101),
(27, 'Narora', 101),
(28, 'Natwar', 101),
(29, 'Odisha', 101),
(30, 'Paschim Medinipur', 101),
(31, 'Pondicherry', 101),
(32, 'Punjab', 101),
(33, 'Rajasthan', 101),
(34, 'Sikkim', 101),
(35, 'Tamil Nadu', 101),
(36, 'Telangana', 101),
(37, 'Tripura', 101),
(38, 'TEST', 101),
(39, 'UP-1', 101),
(40, 'xxxxxx', 101),
(41, 'West Bengal', 101),
(42, 'UP-2', 101);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(11) NOT NULL,
  `validity` int(11) NOT NULL,
  `validity_unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `name`, `price`, `validity`, `validity_unit`) VALUES
(1, 'Starter Package', 100, 1, 'year'),
(2, 'Deluxe Package', 150, 2, 'year');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `otp_flag` int(11) NOT NULL DEFAULT 0 COMMENT '1-used, 0=unused',
  `otp_time` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1-active, 0=deactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `is_phone_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `mobile`, `email`, `email_verified_at`, `password`, `otp`, `otp_flag`, `otp_time`, `status`, `remember_token`, `created_at`, `updated_at`, `is_email_verified`, `is_phone_verified`) VALUES
(3, 3, 'naveen', '917710368332', 'naveen.negi@ldh.01s.in', NULL, '$2y$10$xaL1sXyhR3jOqxHTJQocWOw7.irOuCeT65SAH7kycIf6lqT67ft0m', 1234, 1, '2021-11-13 02:32:48', 1, NULL, '2021-11-13 01:58:16', '2021-11-13 02:32:57', 1, 1),
(5, 3, 'naveen', '919815830553', 'rishi.kumar@ldh.01s.in', NULL, '$2y$10$BtXTTpYsuU1.806hBt6XAO1BqDuUpJyWanGFmxAScKdhs3RSZ68Rq', 1234, 1, '2021-11-13 02:43:25', 0, NULL, '2021-11-13 02:35:17', '2021-11-13 02:43:27', 0, 1),
(9, 3, 'naveen1', '919815830552', 'rishi.kumar1@ldh.01s.in', NULL, '$2y$10$KjBCFXmMK9OIR0gOZboXzuPRUNwrMVzVUB38vvJcFQexsr.B1ldEe', NULL, 0, NULL, 0, NULL, '2021-11-13 06:38:03', '2021-11-13 06:38:03', 0, 0),
(10, 3, 'lovepreet', '448437582976', 'lovepreet.singh@ldh.01s.in', NULL, '$2y$10$wR9.FCcm/QH053/tYXWZaOaLE0x3mnsitZPgxhR.JS2k4nLZrD6N2', NULL, 0, NULL, 1, NULL, '2021-11-13 06:50:20', '2021-11-13 07:40:10', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_verify`
--

CREATE TABLE `users_verify` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_verify`
--

INSERT INTO `users_verify` (`id`, `user_id`, `token`, `created_at`, `updated_at`) VALUES
(3, 4, 'NLQg5bTPHboXMDG2VsAdMs8zYmkZqyOgt2FwMsWstilAEuEreFDDXEQJqke029dc', '2021-11-13 02:34:42', '2021-11-13 02:34:42'),
(5, 5, 'iVxwJhyiURpGdBHhEUZ5bu4xCI0NAbX5HLnbbpIwNRVtXCv8czzIXVvNjW6GwCHx', '2021-11-13 02:47:40', '2021-11-13 02:47:40'),
(6, 9, 'H9EkuZvs14wxr7YhzaaIlrlfvg6525ZK1c0S6b9F9kXs36AUiVqsHK8rKIUJTAzk', '2021-11-13 06:38:04', '2021-11-13 06:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonecode` int(11) NOT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `country_id`, `state_id`, `city`, `phonecode`, `mobile`, `address`, `created_at`, `updated_at`) VALUES
(3, 3, 101, 32, 'Ludhiana', 91, '7710368332', 'giaspura', '2021-11-13 01:58:16', NULL),
(5, 5, 101, 32, 'Ludhiana', 91, '9815830553', 'giaspura', '2021-11-13 02:35:17', NULL),
(6, 9, 101, 32, 'Ludhiana', 91, '9815830552', 'giaspura', '2021-11-13 06:38:03', NULL),
(7, 10, 101, 32, 'ludhiana', 44, '8437582976', 'Ldh', '2021-11-13 06:50:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions`
--

CREATE TABLE `user_subscriptions` (
  `id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `starts_at` date NOT NULL,
  `expires_at` date NOT NULL,
  `type` int(11) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_subscriptions`
--

INSERT INTO `user_subscriptions` (`id`, `sub_id`, `user_id`, `starts_at`, `expires_at`, `type`, `payment_id`, `status`) VALUES
(12, 0, 3, '2021-11-13', '2021-11-12', 0, NULL, 1),
(15, 1, 3, '2021-11-13', '2022-11-13', 1, 'TEST123', 1),
(16, 1, 3, '2021-11-13', '2022-11-13', 1, NULL, 0),
(17, 0, 3, '2021-11-13', '2021-11-16', 0, NULL, 1),
(18, 0, 10, '2021-11-13', '2021-11-16', 0, NULL, 1),
(19, 0, 10, '2021-11-13', '2021-11-16', 0, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_categories`
--
ALTER TABLE `business_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `phonecodes`
--
ALTER TABLE `phonecodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_number_unique` (`mobile`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_verify`
--
ALTER TABLE `users_verify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_categories`
--
ALTER TABLE `business_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_verify`
--
ALTER TABLE `users_verify`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
