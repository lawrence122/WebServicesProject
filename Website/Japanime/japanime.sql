-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 01:51 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `japanime`
--
CREATE DATABASE IF NOT EXISTS `japanime` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `japanime`;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `country_code` char(2) NOT NULL,
  `country_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_code`, `country_name`) VALUES
('AD', 'Andorra'),
('AE', 'United Arab Emirates'),
('AF', 'Afghanistan'),
('AG', 'Antigua and Barbuda'),
('AI', 'Anguilla'),
('AL', 'Albania'),
('AM', 'Armenia'),
('AN', 'Netherlands Antilles'),
('AO', 'Angola'),
('AQ', 'Antarctica'),
('AR', 'Argentina'),
('AT', 'Austria'),
('AU', 'Australia'),
('AW', 'Aruba'),
('AZ', 'Azerbaijan'),
('BA', 'Bosnia and Herzegovina'),
('BB', 'Barbados'),
('BD', 'Bangladesh'),
('BE', 'Belgium'),
('BF', 'Burkina Faso'),
('BG', 'Bulgaria'),
('BH', 'Bahrain'),
('BI', 'Burundi'),
('BJ', 'Benin'),
('BM', 'Bermuda'),
('BN', 'Brunei Darussalam'),
('BO', 'Bolivia'),
('BR', 'Brazil'),
('BS', 'Bahamas'),
('BT', 'Bhutan'),
('BV', 'Bouvet Island'),
('BW', 'Botswana'),
('BY', 'Belarus'),
('BZ', 'Belize'),
('CA', 'Canada'),
('CC', 'Cocos (Keeling) Islands'),
('CF', 'Central African Republic'),
('CG', 'Congo'),
('CH', 'Switzerland'),
('CI', 'Ivory Coast'),
('CK', 'Cook Islands'),
('CL', 'Chile'),
('CM', 'Cameroon'),
('CN', 'China'),
('CO', 'Colombia'),
('CR', 'Costa Rica'),
('CU', 'Cuba'),
('CV', 'Cape Verde'),
('CX', 'Christmas Island'),
('CY', 'Cyprus'),
('CZ', 'Czechia'),
('DE', 'Germany'),
('DJ', 'Djibouti'),
('DK', 'Denmark'),
('DM', 'Dominica'),
('DO', 'Dominican Republic'),
('DS', 'American Samoa'),
('DZ', 'Algeria'),
('EC', 'Ecuador'),
('EE', 'Estonia'),
('EG', 'Egypt'),
('EH', 'Western Sahara'),
('ER', 'Eritrea'),
('ES', 'Spain'),
('ET', 'Ethiopia'),
('FI', 'Finland'),
('FJ', 'Fiji'),
('FK', 'Falkland Islands (Malvinas)'),
('FM', 'Micronesia, Federated States of'),
('FO', 'Faroe Islands'),
('FR', 'France'),
('FX', 'France, Metropolitan'),
('GA', 'Gabon'),
('GB', 'United Kingdom'),
('GD', 'Grenada'),
('GE', 'Georgia'),
('GF', 'French Guiana'),
('GH', 'Ghana'),
('GI', 'Gibraltar'),
('GK', 'Guernsey'),
('GL', 'Greenland'),
('GM', 'Gambia'),
('GN', 'Guinea'),
('GP', 'Guadeloupe'),
('GQ', 'Equatorial Guinea'),
('GR', 'Greece'),
('GS', 'South Georgia South Sandwich Islands'),
('GT', 'Guatemala'),
('GU', 'Guam'),
('GW', 'Guinea-Bissau'),
('GY', 'Guyana'),
('HK', 'Hong Kong'),
('HM', 'Heard and Mc Donald Islands'),
('HN', 'Honduras'),
('HR', 'Croatia (Hrvatska)'),
('HT', 'Haiti'),
('HU', 'Hungary'),
('ID', 'Indonesia'),
('IE', 'Ireland'),
('IL', 'Israel'),
('IM', 'Isle of Man'),
('IN', 'India'),
('IO', 'British Indian Ocean Territory'),
('IQ', 'Iraq'),
('IR', 'Iran (Islamic Republic of)'),
('IS', 'Iceland'),
('IT', 'Italy'),
('JE', 'Jersey'),
('JM', 'Jamaica'),
('JO', 'Jordan'),
('JP', 'Japan'),
('KE', 'Kenya'),
('KG', 'Kyrgyzstan'),
('KH', 'Cambodia'),
('KI', 'Kiribati'),
('KM', 'Comoros'),
('KN', 'Saint Kitts and Nevis'),
('KP', 'Korea, Democratic People\'s Republic of'),
('KR', 'Korea, Republic of'),
('KW', 'Kuwait'),
('KY', 'Cayman Islands'),
('KZ', 'Kazakhstan'),
('LA', 'Lao People\'s Democratic Republic'),
('LB', 'Lebanon'),
('LC', 'Saint Lucia'),
('LI', 'Liechtenstein'),
('LK', 'Sri Lanka'),
('LR', 'Liberia'),
('LS', 'Lesotho'),
('LT', 'Lithuania'),
('LU', 'Luxembourg'),
('LV', 'Latvia'),
('LY', 'Libyan Arab Jamahiriya'),
('MA', 'Morocco'),
('MC', 'Monaco'),
('MD', 'Moldova, Republic of'),
('ME', 'Montenegro'),
('MG', 'Madagascar'),
('MH', 'Marshall Islands'),
('MK', 'Macedonia'),
('ML', 'Mali'),
('MM', 'Myanmar'),
('MN', 'Mongolia'),
('MO', 'Macau'),
('MP', 'Northern Mariana Islands'),
('MQ', 'Martinique'),
('MR', 'Mauritania'),
('MS', 'Montserrat'),
('MT', 'Malta'),
('MU', 'Mauritius'),
('MV', 'Maldives'),
('MW', 'Malawi'),
('MX', 'Mexico'),
('MY', 'Malaysia'),
('MZ', 'Mozambique'),
('NA', 'Namibia'),
('NC', 'New Caledonia'),
('NE', 'Niger'),
('NF', 'Norfolk Island'),
('NG', 'Nigeria'),
('NI', 'Nicaragua'),
('NL', 'Netherlands'),
('NO', 'Norway'),
('NP', 'Nepal'),
('NR', 'Nauru'),
('NU', 'Niue'),
('NZ', 'New Zealand'),
('OM', 'Oman'),
('PA', 'Panama'),
('PE', 'Peru'),
('PF', 'French Polynesia'),
('PG', 'Papua New Guinea'),
('PH', 'Philippines'),
('PK', 'Pakistan'),
('PL', 'Poland'),
('PM', 'St. Pierre and Miquelon'),
('PN', 'Pitcairn'),
('PR', 'Puerto Rico'),
('PS', 'Palestine'),
('PT', 'Portugal'),
('PW', 'Palau'),
('PY', 'Paraguay'),
('QA', 'Qatar'),
('RE', 'Reunion'),
('RO', 'Romania'),
('RS', 'Serbia'),
('RU', 'Russian Federation'),
('RW', 'Rwanda'),
('SA', 'Saudi Arabia'),
('SB', 'Solomon Islands'),
('SC', 'Seychelles'),
('SD', 'Sudan'),
('SE', 'Sweden'),
('SG', 'Singapore'),
('SH', 'St. Helena'),
('SI', 'Slovenia'),
('SJ', 'Svalbard and Jan Mayen Islands'),
('SK', 'Slovakia'),
('SL', 'Sierra Leone'),
('SM', 'San Marino'),
('SN', 'Senegal'),
('SO', 'Somalia'),
('SR', 'Suriname'),
('ST', 'Sao Tome and Principe'),
('SV', 'El Salvador'),
('SY', 'Syrian Arab Republic'),
('SZ', 'Swaziland'),
('TC', 'Turks and Caicos Islands'),
('TD', 'Chad'),
('TF', 'French Southern Territories'),
('TG', 'Togo'),
('TH', 'Thailand'),
('TJ', 'Tajikistan'),
('TK', 'Tokelau'),
('TM', 'Turkmenistan'),
('TN', 'Tunisia'),
('TO', 'Tonga'),
('TP', 'East Timor'),
('TR', 'Turkey'),
('TT', 'Trinidad and Tobago'),
('TV', 'Tuvalu'),
('TW', 'Taiwan'),
('TY', 'Mayotte'),
('TZ', 'Tanzania, United Republic of'),
('UA', 'Ukraine'),
('UG', 'Uganda'),
('UM', 'United States minor outlying islands'),
('US', 'United States'),
('UY', 'Uruguay'),
('UZ', 'Uzbekistan'),
('VA', 'Vatican City State'),
('VC', 'Saint Vincent and the Grenadines'),
('VE', 'Venezuela'),
('VG', 'Virgin Islands (British)'),
('VI', 'Virgin Islands (U.S.)'),
('VN', 'Vietnam'),
('VU', 'Vanuatu'),
('WF', 'Wallis and Futuna Islands'),
('WS', 'Samoa'),
('XK', 'Kosovo'),
('YE', 'Yemen'),
('ZA', 'South Africa'),
('ZM', 'Zambia'),
('ZR', 'Zaire'),
('ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(56) NOT NULL,
  `product_price` float(7,2) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_id`, `user_id`, `product_name`, `product_price`, `product_quantity`) VALUES
(37, 1, 27, 9, 'Ash Lynx Banana Fish Firearm Figure', 125.99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(56) NOT NULL,
  `filename` varchar(64) NOT NULL,
  `description` varchar(128) NOT NULL,
  `price` float(7,2) NOT NULL,
  `qoh` int(8) NOT NULL,
  `stock_status` enum('In Stock','Sold Out') NOT NULL,
  `category` enum('Anime DVD','Manga','Figure') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `filename`, `description`, `price`, `qoh`, `stock_status`, `category`) VALUES
(5, 'Blue Exorcist: The Movie Blu Ray', '608346533299d.jpeg', 'Blue Exorcist: The Movie Collector\'s Edition on Blu Ray.', 32.98, 32, 'In Stock', 'Anime DVD'),
(6, 'Black Butler Season 1 Blu Ray', '60834f073167c.jpeg', 'The complete first season of Black Butler on Blu-Ray and DVD.', 69.99, 12, 'In Stock', 'Anime DVD'),
(7, 'Cowboy Bebop Blu Ray', '60834f2952eb4.jpeg', 'The complete series of Cowboy Bebop on Blu-Ray.', 35.99, 8, 'In Stock', 'Anime DVD'),
(8, 'Date A Live Season 1-3 + Movie + OVA', '60834f41a906d.jpeg', 'The complete three seasons of Date A Live including the movie and OVAs.', 60.98, 0, 'Sold Out', 'Anime DVD'),
(9, 'Haikyuu!! Complete Season 1', '60834f5fbf6fa.jpeg', 'The complete first season of Haikyuu!! on 4 discs Limited Edition.', 37.99, 22, 'In Stock', 'Anime DVD'),
(10, 'High School DxD Season 3 Blu Ray', '60834f817d019.jpeg', 'The complete third season of High School DxD BorN on Blu Ray and DVD.', 40.99, 15, 'In Stock', 'Anime DVD'),
(11, 'Overlord Season 1 Blu Ray', '60834f9f78354.jpeg', 'The complete series of Overlord on Blu Ray and DVD.', 43.49, 0, 'Sold Out', 'Anime DVD'),
(12, 'Steins;Gate Season 1 Blu Ray', '60834fbb0b655.jpeg', 'The complete series of Steins;Gate on Blu Ray and DVD.', 58.99, 18, 'In Stock', 'Anime DVD'),
(13, 'Yowamushi Pedal Season 1', '60834fd57a191.jpeg', 'The complete first season of Yowamushi Pedal.', 24.99, 7, 'In Stock', 'Anime DVD'),
(14, 'Yuri On Ice!!! Blu Ray', '60834ff2100c1.jpeg', 'The complete series of Yuri On Ice!!! on Blu Ray and DVD.', 42.99, 0, 'Sold Out', 'Anime DVD'),
(15, 'Akira Manga Box Vol.1-6', '608364e071d98.jpeg', 'The complete series of Akira in a hard cover manga box set.', 99.99, 12, 'In Stock', 'Manga'),
(16, 'Attack on Titan Manga Box Vol.1-4', '6083651b9a7f1.jpeg', 'The first four volumes of the Attack on Titan series.', 32.97, 23, 'In Stock', 'Manga'),
(17, 'Attack on Titan Manga Box Vol.5-8', '6083655620b2b.jpeg', 'The next four volumes of the Attack on Titan series.', 32.97, 16, 'In Stock', 'Manga'),
(18, 'Banana Fish Manga Box Vol.1-5', '6083656ede379.jpeg', 'The first five volumes of the Banana Fish series.', 55.99, 13, 'In Stock', 'Manga'),
(19, 'Bleach Manga Box 3 Vol.49-74', '6083658d84f11.jpeg', 'The last 26 volumes of the Bleach series.', 212.45, 0, 'Sold Out', 'Manga'),
(20, 'Claymore Manga Box Set', '608365b5da2d2.jpeg', 'The complete manga collection of the Claymore series.', 180.74, 9, 'In Stock', 'Manga'),
(21, 'Death Note All-in-One Edition', '608365d1f2d86.jpeg', 'The complete Death Note series in one book.', 50.89, 2, 'In Stock', 'Manga'),
(22, 'Dragon Ball Manga Box Set', '608365e990b66.jpeg', 'The complete manga collection of the  Dragon Ball series.', 87.71, 1, 'In Stock', 'Manga'),
(23, 'Kaichou Wa Maid Sama Vol.1-4', '60836610add3d.jpeg', 'The first four original Japanese volumes of Kaichou Wa Maid-Sama.', 28.99, 24, 'In Stock', 'Manga'),
(24, 'A Silent Voice Manga Box Vol.1-7', '6083662dbc359.jpeg', 'The complete manga collection of A Silent Voice series.', 45.99, 15, 'In Stock', 'Manga'),
(25, 'Naruto Manga Box Vol.1-27', '6083664fd10d5.jpeg', 'The first 27 volumes of the Naruto series.', 210.54, 0, 'Sold Out', 'Manga'),
(26, 'Princess Jellyfish Manga Box', '60836668b376e.png', 'The complete manga collection of the Princess Jellyfish series.', 62.99, 11, 'In Stock', 'Manga'),
(27, 'Ash Lynx Banana Fish Firearm Figure', '6083681ef0735.png', 'From the Banana Fish series comes a 1/7 scale figure of Ash Lynx.', 125.99, 3, 'In Stock', 'Figure'),
(28, 'Astolfo Fate/Grand Order Figure', '6083683aefc6b.jpeg', 'From the Fate/Grand Order series comes a 1/7 scale figure of Astolfo.', 249.98, 5, 'In Stock', 'Figure'),
(29, 'Celestia Dangan Ronpa Figure', '60836852dc7e4.png', 'From the Danganronpa game comes a 1/7 scake figure of Celestia Ludenberg.', 129.99, 12, 'In Stock', 'Figure'),
(30, 'Ciel Phantomhive Black Butler Figure', '6083686ccc5f0.jpeg', 'From the Black Butler series comes a 1/6 scale figure of Ciel Phantomhive.', 84.98, 21, 'In Stock', 'Figure'),
(31, 'Kanna Kamui Maid Dragon Figure', '6083688501e9a.jpeg', 'From the Maid Dragon series comes a 1/6 scale figure of Kanna Kamui.', 98.99, 1, 'In Stock', 'Figure'),
(32, 'Kirigiri Dangan Ronpa Figure', '6083689a5df0a.jpeg', 'From the Dangan Ronpa game comes a 1/8 scale figure of Kirigiri Kyoko.', 110.50, 12, 'In Stock', 'Figure'),
(33, 'Levi Attack on Titan Figure', '608368b38b0fb.jpeg', 'From the Attack on Titan series comes a 1/7 scale figure of Ackerman.', 150.99, 0, 'In Stock', 'Figure'),
(34, 'Makise Kurisu Steins;Gate Figure', '608368e3ea593.jpeg', 'From the Steins;Gate series comes a 1/8 scale figure of Makise Kurisu.', 75.99, 14, 'In Stock', 'Figure'),
(35, 'Megumin Konosuba!! Figure', '60836905c404a.jpeg', 'From the Konosuba!! series comes a 1/7 scale figure of Megumin.', 309.69, 5, 'In Stock', 'Figure'),
(36, 'Hatsune Miku Vocaloid Figure', '608369200f0d2.jpeg', 'Hatsune Miku 1/8 scale figure Symphony 2019 Ver. Vocaloid.', 124.00, 23, 'In Stock', 'Figure'),
(37, 'Nadeko Monogatari Series Figure', '6083694036d13.jpeg', 'From the Monogatari series comes a 1/6 scale figure of Nadeko Sengoku.', 150.54, 3, 'In Stock', 'Figure'),
(38, 'Rem and Subaru Re:Zero Figure', '6083695cd1976.jpeg', 'From the Re:Zero series comes a 11.8\"x6.3\" figure of Rem and Subaru.', 242.19, 0, 'Sold Out', 'Figure'),
(39, 'Saitama One-Punch Man Figure', '6083697631da1.jpeg', 'From the One-Punch Man series comes a 1/10 scale figure of Saitama.', 74.54, 2, 'In Stock', 'Figure'),
(40, 'Hitagi Monogatari Series Figure', '6083698d22ada.jpeg', 'From the Monogatari series comes a 1/7 scale figure of Senjougahara Hitagi.', 165.99, 18, 'In Stock', 'Figure'),
(45, 'Attack on Titan Season 1', '609081bb1e9a5.jpeg', 'The complete first season of the Attack on Titan series on Blu-Ray DVD.', 36.99, 24, 'In Stock', 'Anime DVD');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(56) NOT NULL,
  `password_hash` varchar(256) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `full_name`, `email`) VALUES
(9, 'Emilie1', '$2y$10$HTNBObGT3tm4QPVhIbiFzOkfLH.Fu2XP8eeI1jD.1M6M9O/L8v68m', 'Émilie Mayodon', 'emayodon@gmail.com'),
(10, 'admin', '$2y$10$TZicISRBoNmpxIJNuxJyIuq90ynzbviBPWzIQQE52l5ivWyk1vGPG', 'Admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

DROP TABLE IF EXISTS `user_order`;
CREATE TABLE `user_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `street_address` varchar(56) DEFAULT NULL,
  `country_code` varchar(56) DEFAULT NULL,
  `city` varchar(56) DEFAULT NULL,
  `total_price` float(7,2) DEFAULT NULL,
  `postal_code` varchar(6) DEFAULT NULL,
  `name_card` varchar(128) DEFAULT NULL,
  `card_no` int(16) DEFAULT NULL,
  `exp_month` varchar(10) DEFAULT NULL,
  `exp_year` int(4) DEFAULT NULL,
  `cvv` int(3) DEFAULT NULL,
  `status` enum('Fulfilled','Cart') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`order_id`, `user_id`, `street_address`, `country_code`, `city`, `total_price`, `postal_code`, `name_card`, `card_no`, `exp_month`, `exp_year`, `cvv`, `status`) VALUES
(1, 9, '234 Sainte-Croix', 'CA', 'Montreal', 187.51, 'T7R2Y4', 'Émilie Mayodon', 2147483647, 'July', 2024, 343, 'Fulfilled');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `user_id`, `product_id`, `product_name`) VALUES
(17, 9, 9, 'Haikyuu!! Complete Season 1'),
(18, 9, 28, 'Astolfo Fate/Grand Order Figure');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_code`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `FK_userid_detail` (`user_id`),
  ADD KEY `FK_order_ID` (`order_id`),
  ADD KEY `FK_productid_detail` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_user_id_Order` (`user_id`),
  ADD KEY `FK_country_Order` (`country_code`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `FK_userID_Wishlist` (`user_id`),
  ADD KEY `FK_productId_Wishlist` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `FK_order_ID` FOREIGN KEY (`order_id`) REFERENCES `user_order` (`order_id`),
  ADD CONSTRAINT `FK_productid_detail` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `FK_userid_detail` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `FK_country_Order` FOREIGN KEY (`country_code`) REFERENCES `country` (`country_code`),
  ADD CONSTRAINT `FK_user_id_Order` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `FK_User_ID` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `FK_productId_Wishlist` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `FK_userID_Wishlist` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
