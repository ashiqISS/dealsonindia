-- phpMyAdmin SQL Dump
-- version 4.2.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 08, 2016 at 09:46 AM
-- Server version: 5.6.17
-- PHP Version: 5.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `newgen_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_post`
--

CREATE TABLE IF NOT EXISTS `admin_post` (
`id` int(11) NOT NULL,
  `post_name` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL,
  `products` varchar(100) NOT NULL,
  `orders` int(11) NOT NULL,
  `coupons` int(11) NOT NULL,
  `cms` int(11) NOT NULL,
  `masters` int(11) NOT NULL,
  `user_details` int(11) NOT NULL,
  `reports` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `CB` int(100) NOT NULL,
  `UB` int(100) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_post`
--

INSERT INTO `admin_post` (`id`, `post_name`, `admin`, `products`, `orders`, `coupons`, `cms`, `masters`, `user_details`, `reports`, `status`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, 'admin', '1', '1', 1, 1, 1, 1, 0, 1, 1, 4, 4, '2016-05-25', '2016-05-25'),
(2, 'user', '0', '0', 0, 0, 0, 0, 1, 0, 1, 4, 0, '2016-05-25', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
`id` int(11) NOT NULL,
  `admin_post_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `cb` int(100) NOT NULL,
  `UB` int(100) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `admin_post_id`, `username`, `password`, `name`, `email`, `phone`, `cb`, `UB`, `DOC`, `DOU`) VALUES
(10, 1, 'admin', 'admin', 'Aathira', 'aathira@intersmart.in', '1234567891', 0, 1, '2016-07-14', '2016-07-14 06:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_details`
--

CREATE TABLE IF NOT EXISTS `buyer_details` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone_no_2` varchar(100) NOT NULL,
  `newsletter` int(11) NOT NULL,
  `wallet_amt` decimal(10,0) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` datetime NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `field2` int(11) DEFAULT NULL,
  `field3` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `buyer_details`
--

INSERT INTO `buyer_details` (`id`, `user_id`, `first_name`, `last_name`, `dob`, `gender`, `phone_no_2`, `newsletter`, `wallet_amt`, `CB`, `UB`, `DOC`, `DOU`, `field2`, `field3`) VALUES
(7, 6, 'Anamika', 'anu', '2000-08-09', 'female', '', 1, '0', 10, 10, '2016-08-05 00:00:00', '2016-08-07 18:30:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
`id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=247 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'American Samoa'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antarctica'),
(9, 'Antigua and Barbuda'),
(10, 'Argentina'),
(11, 'Armenia'),
(12, 'Aruba'),
(13, 'Australia'),
(14, 'Austria'),
(15, 'Azerbaijan'),
(16, 'Bahamas'),
(17, 'Bahrain'),
(18, 'Bangladesh'),
(19, 'Barbados'),
(20, 'Belarus'),
(21, 'Belgium'),
(22, 'Belize'),
(23, 'Benin'),
(24, 'Bermuda'),
(25, 'Bhutan'),
(26, 'Bolivia'),
(27, 'Bosnia and Herzegovina'),
(28, 'Botswana'),
(29, 'Bouvet Island'),
(30, 'Brazil'),
(31, 'British Indian Ocean Territory'),
(32, 'Brunei Darussalam'),
(33, 'Bulgaria'),
(34, 'Burkina Faso'),
(35, 'Burundi'),
(36, 'Cambodia'),
(37, 'Cameroon'),
(38, 'Canada'),
(39, 'Cape Verde'),
(40, 'Cayman Islands'),
(41, 'Central African Republic'),
(42, 'Chad'),
(43, 'Chile'),
(44, 'China'),
(45, 'Christmas Island'),
(46, 'Cocos (Keeling) Islands'),
(47, 'Colombia'),
(48, 'Comoros'),
(49, 'Congo'),
(50, 'Cook Islands'),
(51, 'Costa Rica'),
(52, 'Croatia (Hrvatska)'),
(53, 'Cuba'),
(54, 'Cyprus'),
(55, 'Czech Republic'),
(56, 'Denmark'),
(57, 'Djibouti'),
(58, 'Dominica'),
(59, 'Dominican Republic'),
(60, 'East Timor'),
(61, 'Ecuador'),
(62, 'Egypt'),
(63, 'El Salvador'),
(64, 'Equatorial Guinea'),
(65, 'Eritrea'),
(66, 'Estonia'),
(67, 'Ethiopia'),
(68, 'Falkland Islands (Malvinas)'),
(69, 'Faroe Islands'),
(70, 'Fiji'),
(71, 'Finland'),
(72, 'France'),
(73, 'France, Metropolitan'),
(74, 'French Guiana'),
(75, 'French Polynesia'),
(76, 'French Southern Territories'),
(77, 'Gabon'),
(78, 'Gambia'),
(79, 'Georgia'),
(80, 'Germany'),
(81, 'Ghana'),
(82, 'Gibraltar'),
(83, 'Guernsey'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guinea'),
(91, 'Guinea-Bissau'),
(92, 'Guyana'),
(93, 'Haiti'),
(94, 'Heard and Mc Donald Islands'),
(95, 'Honduras'),
(96, 'Hong Kong'),
(97, 'Hungary'),
(98, 'Iceland'),
(99, 'India'),
(100, 'Isle of Man'),
(101, 'Indonesia'),
(102, 'Iran (Islamic Republic of)'),
(103, 'Iraq'),
(104, 'Ireland'),
(105, 'Israel'),
(106, 'Italy'),
(107, 'Ivory Coast'),
(108, 'Jersey'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jordan'),
(112, 'Kazakhstan'),
(113, 'Kenya'),
(114, 'Kiribati'),
(115, 'Korea, Democratic People''s Republic of'),
(116, 'Korea, Republic of'),
(117, 'Kosovo'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People''s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macau'),
(130, 'Macedonia'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States of'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestine'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint Kitts and Nevis'),
(185, 'Saint Lucia'),
(186, 'Saint Vincent and the Grenadines'),
(187, 'Samoa'),
(188, 'San Marino'),
(189, 'Sao Tome and Principe'),
(190, 'Saudi Arabia'),
(191, 'Senegal'),
(192, 'Serbia'),
(193, 'Seychelles'),
(194, 'Sierra Leone'),
(195, 'Singapore'),
(196, 'Slovakia'),
(197, 'Slovenia'),
(198, 'Solomon Islands'),
(199, 'Somalia'),
(200, 'South Africa'),
(201, 'South Georgia South Sandwich Islands'),
(202, 'Spain'),
(203, 'Sri Lanka'),
(204, 'St. Helena'),
(205, 'St. Pierre and Miquelon'),
(206, 'Sudan'),
(207, 'Suriname'),
(208, 'Svalbard and Jan Mayen Islands'),
(209, 'Swaziland'),
(210, 'Sweden'),
(211, 'Switzerland'),
(212, 'Syrian Arab Republic'),
(213, 'Taiwan'),
(214, 'Tajikistan'),
(215, 'Tanzania, United Republic of'),
(216, 'Thailand'),
(217, 'Togo'),
(218, 'Tokelau'),
(219, 'Tonga'),
(220, 'Trinidad and Tobago'),
(221, 'Tunisia'),
(222, 'Turkey'),
(223, 'Turkmenistan'),
(224, 'Turks and Caicos Islands'),
(225, 'Tuvalu'),
(226, 'Uganda'),
(227, 'Ukraine'),
(228, 'United Arab Emirates'),
(229, 'United Kingdom'),
(230, 'United States'),
(231, 'United States minor outlying islands'),
(232, 'Uruguay'),
(233, 'Uzbekistan'),
(234, 'Vanuatu'),
(235, 'Vatican City State'),
(236, 'Venezuela'),
(237, 'Vietnam'),
(238, 'Virgin Islands (British)'),
(239, 'Virgin Islands (U.S.)'),
(240, 'Wallis and Futuna Islands'),
(241, 'Western Sahara'),
(242, 'Yemen'),
(243, 'Yugoslavia'),
(244, 'Zaire'),
(245, 'Zambia'),
(246, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
`id` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `currency_code` varchar(50) NOT NULL,
  `symbol` varchar(225) NOT NULL,
  `rate` float NOT NULL,
  `image` varchar(225) NOT NULL,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL,
  `doc` date NOT NULL,
  `dou` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `country`, `currency`, `currency_code`, `symbol`, `rate`, `image`, `cb`, `ub`, `doc`, `dou`) VALUES
(3, 'India', 'Rupee', 'INR', 'fa-inr', 1, 'jpg', 0, 0, '0000-00-00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
`Id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`Id`, `country_id`, `state_id`, `district_name`) VALUES
(1, 99, 18, 'Alappuzha'),
(2, 99, 18, 'Ernakulam'),
(3, 99, 18, 'Idukki'),
(4, 99, 18, 'Kannur'),
(5, 99, 18, 'Kasaragod'),
(6, 99, 18, 'Kollam'),
(7, 99, 18, 'Kottayam'),
(8, 99, 18, 'Kozhikode'),
(9, 99, 18, 'Malappuram'),
(10, 99, 18, 'Palakkad'),
(11, 99, 18, 'Pathanamthitta'),
(12, 99, 18, 'Thiruvananthapuram'),
(13, 99, 18, 'Thrissur'),
(14, 99, 18, 'Wayanad');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE IF NOT EXISTS `forgot_password` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `DOC` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `make_product_payment`
--

CREATE TABLE IF NOT EXISTS `make_product_payment` (
`id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_code` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `amount_type` varchar(15) NOT NULL,
  `total_amount` varchar(25) NOT NULL,
  `payment_mode` varchar(15) NOT NULL COMMENT '1=wallet,2=gateway,3=paypal,4=wallet+netbanking ',
  `netbanking` varchar(100) NOT NULL,
  `paypal` varchar(100) NOT NULL,
  `wallet` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(15) NOT NULL COMMENT '0:notpaid, 1:paid, 2:failed',
  `transaction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `master_category_tags`
--

CREATE TABLE IF NOT EXISTS `master_category_tags` (
`id` int(11) NOT NULL,
  `category_tag` varchar(200) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `master_category_tags`
--

INSERT INTO `master_category_tags` (`id`, `category_tag`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(11, 'wedding', 4, 4, '2016-07-20', '2016-07-20 09:01:44'),
(12, 'gifts', 4, 4, '2016-07-20', '2016-07-20 09:02:16'),
(13, 'wedding-gifts', 4, 4, '2016-07-20', '2016-07-20 09:02:23'),
(14, 'wedding-store', 4, 4, '2016-07-20', '2016-07-20 09:02:30'),
(15, 'Wedding Favors Gifts', 4, 4, '2016-07-20', '2016-07-20 09:04:48'),
(16, 'roses', 4, 4, '2016-07-20', '2016-07-20 09:18:40'),
(17, 'dfg', 10, 10, '2016-07-25', '2016-07-25 07:33:23'),
(18, '1', 10, 10, '2016-07-25', '2016-07-25 08:23:14'),
(19, 'nm', 10, 10, '2016-07-25', '2016-07-25 08:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `master_history_type`
--

CREATE TABLE IF NOT EXISTS `master_history_type` (
`id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `credit_debit` int(11) NOT NULL COMMENT '1=>credit,2=>debit',
  `field1` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `master_history_type`
--

INSERT INTO `master_history_type` (`id`, `type`, `credit_debit`, `field1`) VALUES
(1, 'Registration Fees', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `master_shipping_types`
--

CREATE TABLE IF NOT EXISTS `master_shipping_types` (
`id` int(11) NOT NULL,
  `shipping_type` varchar(100) NOT NULL,
  `shipping_rate` float NOT NULL,
  `status` int(11) NOT NULL,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL,
  `doc` date NOT NULL,
  `dou` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `master_shipping_types`
--

INSERT INTO `master_shipping_types` (`id`, `shipping_type`, `shipping_rate`, `status`, `cb`, `ub`, `doc`, `dou`) VALUES
(1, 'er', 34, 1, 4, 0, '2016-07-21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE IF NOT EXISTS `merchant` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm` varchar(100) NOT NULL,
  `verification_code` varchar(50) NOT NULL,
  `email_verification` varchar(100) NOT NULL,
  `product_categories` varchar(250) NOT NULL,
  `merchant_type` int(11) NOT NULL,
  `product_count` int(11) NOT NULL,
  `shop_name` varchar(250) NOT NULL,
  `shop_logo` varchar(250) DEFAULT NULL,
  `shop_banner` varchar(250) DEFAULT NULL,
  `address` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `locality` varchar(100) NOT NULL,
  `district` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `vat_tin` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL COMMENT 'active, inactive, payment_pending, not_activated',
  `last_login` datetime NOT NULL,
  `bad_attempts` int(11) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_payment_done` int(11) NOT NULL COMMENT '1=Yes, 0=No',
  `field1` int(11) DEFAULT NULL,
  `field2` int(11) DEFAULT NULL,
  `field3` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `merchant_details`
--

CREATE TABLE IF NOT EXISTS `merchant_details` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `product_categories` varchar(250) NOT NULL,
  `merchant_type` int(11) NOT NULL,
  `product_count` int(11) NOT NULL,
  `shop_name` varchar(250) NOT NULL,
  `shop_logo` varchar(250) DEFAULT NULL,
  `shop_banner` varchar(250) DEFAULT NULL,
  `address` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `locality` varchar(100) NOT NULL,
  `district` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `vat_tin` varchar(100) DEFAULT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_payment_done` int(11) NOT NULL COMMENT '1=Yes, 0=No',
  `field2` int(11) DEFAULT NULL,
  `field3` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `merchant_details`
--

INSERT INTO `merchant_details` (`id`, `user_id`, `fullname`, `product_categories`, `merchant_type`, `product_count`, `shop_name`, `shop_logo`, `shop_banner`, `address`, `pincode`, `city`, `locality`, `district`, `state`, `country`, `vat_tin`, `CB`, `UB`, `DOC`, `DOU`, `is_payment_done`, `field2`, `field3`) VALUES
(3, 9, 'Aathira', '1', 1, 0, '1', '1', '1', '1', 1, '1', '1', 1, 1, 1, NULL, 10, 10, '2016-08-06', '2016-08-05 18:30:00', 1, NULL, NULL),
(4, 10, 'Aathira', '23,', 1, 0, 'My Shopp', NULL, 'jpg', 'Aluva', 683104, 'Cochin', 'Aluva', 2, 18, 99, NULL, 10, 10, '2016-08-08', '2016-08-07 18:30:00', 1, NULL, NULL),
(5, 11, 'Anumol', 'Gifts&gt;Gifts for him,', 1, 0, 'Nothing', 'jpg', 'jpg', 'plot no 12,  priyadarshini road, kaloor', 683109, 'Kaloor', 'Kaloor', 2, 18, 99, NULL, 10, 10, '2016-08-08', '2016-08-08 07:12:42', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `discount_rate` decimal(10,2) NOT NULL,
  `gift_option` int(11) NOT NULL COMMENT '0=no giftpack , 1= giftpack option',
  `rate` double NOT NULL,
  `ship_address_id` int(11) NOT NULL,
  `bill_address_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `payment_mode` varchar(100) NOT NULL COMMENT '1=wallet,2=gateway,3=paypal,4=wallet+netbanking ',
  `admin_comment` text NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL COMMENT '0=notpay,1=success,2=failed',
  `admin_status` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=notplaced,1=Not Delivered,2=Success,3=failed',
  `DOC` date NOT NULL,
  `netbanking` int(11) NOT NULL,
  `paypal` decimal(10,2) NOT NULL,
  `wallet` decimal(10,2) NOT NULL,
  `shipping_method` int(11) NOT NULL,
  `newgen_gift` int(11) NOT NULL COMMENT '1:gift order; 0:other'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE IF NOT EXISTS `order_history` (
`id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_status_comment` varchar(500) NOT NULL,
  `order_status` int(11) NOT NULL,
  `shipping_type` int(11) NOT NULL,
  `tracking_id` varchar(225) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE IF NOT EXISTS `order_products` (
`id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `status` int(11) NOT NULL,
  `gift_option` int(11) NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE IF NOT EXISTS `order_status` (
`id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `category_id` varchar(200) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_code` varchar(225) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `merchant_type` int(11) NOT NULL,
  `description` text NOT NULL,
  `main_image` varchar(200) NOT NULL,
  `gallery_images` varchar(200) NOT NULL,
  `hover_image` varchar(150) NOT NULL,
  `canonical_name` varchar(200) NOT NULL,
  `meta_title` varchar(225) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` varchar(225) NOT NULL,
  `header_visibility` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `display_category_name` int(11) NOT NULL,
  `price` float NOT NULL,
  `wholesale_price` float NOT NULL,
  `is_discount_available` int(11) NOT NULL,
  `discount` float NOT NULL,
  `discount_type` varchar(225) NOT NULL,
  `discount_rate` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `requires_shipping` int(11) NOT NULL,
  `enquiry_sale` int(11) NOT NULL,
  `new_from` date NOT NULL,
  `new_to` date NOT NULL,
  `sale_from` date NOT NULL,
  `sale_to` date NOT NULL,
  `special_price_from` date NOT NULL,
  `special_price_to` date NOT NULL,
  `tax` float NOT NULL,
  `gift_option` int(11) NOT NULL,
  `stock_availability` int(11) NOT NULL,
  `video_link` varchar(225) NOT NULL,
  `video` varchar(150) NOT NULL,
  `weight` float NOT NULL,
  `weight_class` int(11) NOT NULL,
  `status` varchar(225) NOT NULL,
  `exchange` int(11) NOT NULL,
  `search_tag` varchar(225) NOT NULL,
  `related_products` varchar(225) NOT NULL,
  `is_cod_available` int(11) NOT NULL,
  `is_available` int(11) NOT NULL,
  `is_featured` int(11) NOT NULL,
  `is_admin_approved` int(11) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_code`, `brand_id`, `merchant_id`, `merchant_type`, `description`, `main_image`, `gallery_images`, `hover_image`, `canonical_name`, `meta_title`, `meta_description`, `meta_keywords`, `header_visibility`, `sort_order`, `display_category_name`, `price`, `wholesale_price`, `is_discount_available`, `discount`, `discount_type`, `discount_rate`, `quantity`, `requires_shipping`, `enquiry_sale`, `new_from`, `new_to`, `sale_from`, `sale_to`, `special_price_from`, `special_price_to`, `tax`, `gift_option`, `stock_availability`, `video_link`, `video`, `weight`, `weight_class`, `status`, `exchange`, `search_tag`, `related_products`, `is_cod_available`, `is_available`, `is_featured`, `is_admin_approved`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(6, '23,', 'Titan 9154YM ', 'Titan1245', 0, 4, 0, '<ul>\r\n	<li>\r\n		<span style="color:#800080;">Case: Brass</span></li>\r\n	<li>\r\n		<span style="color:#800080;">Strap: Sheet Metal </span></li>\r\n	<li>\r\n		<span style="color:#800080;">Dial Color: Champagne</span></li>\r\n	<li>\r\n		<span style="color:#800080;">Functionality: Date </span></li>\r\n	<li>\r\n		<span style="color:#800080;">Water resistance: 30meters </span></li>\r\n	<li>\r\n		<span style="color:#800080;">Gender: Men</span></li>\r\n</ul>\r\n', 'jpg', '', 'jpg', 'Titan 9154YM ', '', '', '', 0, 0, 0, 0, 0, 0, 0, '1', 0, 0, 1, 0, '2016-07-27', '2016-07-30', '2016-07-27', '2016-07-28', '2016-07-27', '2016-07-29', 0, 1, 1, '', '', 0, 0, '1', 0, '', '', 0, 1, 1, 1, 4, 4, '0000-00-00', '2016-07-26 18:30:00'),
(7, '9,', 'Roses', 'ROSE132', 0, 4, 0, '<p>\r\n	<span style="font-family: &quot;Open Sans&quot;, sans-serif; font-size: 12px; line-height: 15px;">You will fall in love with these beautiful red roses without a doubt! These roses look really warm and passionate and will delight any recipient. This pack contains twelve such roses and these have been immaculately packed in premium and expensive tissue paper. This lends a sophisticated and elegant air to the gift pack while there is a matching ribbon bow on top. This has been tied for added effect and certainly scales up the attractiveness of this gift pack. These flowers can be used as nice gifts on a variety of occasions. Product Details: 12 Red Roses, Tissue Paper with Ribbon Bow</span></p>\r\n', 'jpg', '', '', 'roses', 'rose', 'You will fall in love with these beautiful red roses without a doubt! These roses look really warm and passionate and will delight any recipient. This pack contains twelve such roses and these have been immaculately packed in', '', 0, 0, 0, 1000, 0, 1, 0, '1', 0, 200, 1, 0, '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', 0, 1, 1, '', '', 0, 0, '1', 0, '', '', 0, 1, 1, 1, 4, 4, '2016-07-20', '2016-07-19 18:30:00'),
(9, '25,23,', 'watch', 'wtch23564', 0, 0, 0, '<ul>\r\n	<li>\r\n		stylish watches</li>\r\n	<li>\r\n		awsome designs</li>\r\n	<li>\r\n		custom offers</li>\r\n</ul>\r\n', 'jpg', '', 'jpg', 'watch', 'watch', 'watchwatchwatchwatchwatch watch', 'watch', 0, 1, 0, 1000.9, 1, 1, 83, '1', 1, 1, 1, 0, '2016-07-26', '2016-07-31', '2016-07-26', '2016-10-26', '2016-07-28', '2016-07-28', 1, 1, 1, '1', '1', 1, 3, '1', 1, 'wedding,gifts,wedding-store,', '7', 1, 1, 1, 1, 0, 0, '2016-07-26', '2016-07-26 11:08:28'),
(10, '23,', 'gift', 'gift', 0, 0, 0, '<p>\r\n	gift</p>\r\n', 'jpg', '', '', 'gift', 'gift', 'gift`', 'gift', 0, 124, 0, 2342, 3534, 1, 23, '1', 45, 6, 1, 0, '2016-07-26', '2016-07-27', '2016-07-25', '2016-07-27', '2016-07-25', '2016-07-27', 67, 1, 1, '0', '89', 0, 3, '1', 1, '', '', 1, 1, 1, 1, 0, 0, '2016-07-26', '2016-07-26 11:19:23'),
(11, '25,', 'g', 'g', 0, 0, 0, '<p>\r\n	g</p>\r\n', '', '', '', 'g', 'g', 'g', 'g', 0, 1, 0, 5, 0, 1, 0, '1', 0, 0, 1, 0, '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', 0, 1, 1, '', '', 0, 0, '1', 1, '', '', 1, 1, 1, 1, 4, 4, '2016-07-27', '2016-07-26 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
`id` int(11) NOT NULL,
  `parent` varchar(225) NOT NULL,
  `category_name` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(225) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `meta_title` varchar(225) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` varchar(225) NOT NULL,
  `header_visibility` int(11) NOT NULL,
  `search_tag` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `canonical_name` varchar(225) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `parent`, `category_name`, `description`, `image`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `header_visibility`, `search_tag`, `status`, `canonical_name`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(23, '23', 'Gifts', '<p>\r\n	Give the wedding gift they&#39;ll always remember by making it personalized. Our collection has elegant, whimsical, and joyful gifts for engagements, weddings, showers, and bridal parties. Personalized coasters, picture frames, wall art, cake cutters, champagne flutes, and tree ornaments all celebrate and commemorate the happy day and couple.</p>\r\n', 'jpg', 0, '', '', '', 1, '', 1, 'gifts', 4, 0, '2016-07-26', '2016-07-26 05:30:06'),
(25, '23', 'Gifts for him', '<p>\r\n	Standard gifts for your best ones . We are providing rare collections.</p>\r\n', 'jpg', 0, '', '', '', 1, '', 1, 'gifts-for-him', 4, 4, '2016-07-26', '2016-07-25 18:30:00'),
(27, '23', 'edgg', '<p>\r\n	sfg</p>\r\n', 'jpg', 0, '', '', '', 1, '', 1, 'edgg', 4, 0, '2016-07-26', '2016-07-26 10:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_category_path`
--

CREATE TABLE IF NOT EXISTS `product_category_path` (
`id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `product_category_path`
--

INSERT INTO `product_category_path` (`id`, `category`, `parent`, `level`) VALUES
(1, 5, 5, 0),
(2, 6, 6, 0),
(3, 7, 7, 0),
(4, 8, 7, 1),
(5, 9, 7, 1),
(6, 10, 10, 0),
(7, 11, 8, 2),
(8, 9, 9, 0),
(9, 10, 9, 2),
(10, 11, 9, 2),
(11, 12, 11, 3),
(12, 13, 9, 2),
(13, 14, 9, 2),
(14, 15, 11, 3),
(15, 16, 9, 2),
(16, 17, 9, 2),
(17, 18, 10, 1),
(18, 19, 10, 1),
(19, 20, 11, 3),
(20, 21, 9, 2),
(21, 22, 22, 0),
(22, 23, 23, 0),
(23, 24, 23, 1),
(24, 27, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE IF NOT EXISTS `shipping_charges` (
`id` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `shipping_rate` double NOT NULL,
  `doc` date NOT NULL,
  `dou` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `zone` int(11) NOT NULL,
  `weight` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
`Id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_name` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`Id`, `country_id`, `state_name`) VALUES
(1, 99, 'Andaman & Nicobar Islands'),
(2, 99, 'Andhra Pradesh'),
(3, 99, 'Arunachal Pradesh'),
(4, 99, 'Assam'),
(5, 99, 'Bihar'),
(6, 99, 'Chandigarh'),
(7, 99, 'Chhatisgarh'),
(8, 99, 'Dadra & Nagar Haveli'),
(9, 99, 'Daman & Diu'),
(10, 99, 'Delhi'),
(11, 99, 'Goa'),
(12, 99, 'Gujarat'),
(13, 99, 'Haryana'),
(14, 99, 'Himachal Pradesh'),
(15, 99, 'Jammu & Kashmir'),
(16, 99, 'Jharkhand'),
(17, 99, 'Karnataka'),
(18, 99, 'Kerala'),
(19, 99, 'Lakshadweep'),
(20, 99, 'Madhya Pradesh'),
(21, 99, 'Maharashtra'),
(22, 99, 'Manipur'),
(23, 99, 'Meghalaya'),
(24, 99, 'Mizoram'),
(25, 99, 'Nagaland'),
(26, 99, 'Orissa'),
(27, 99, 'Pondicherry'),
(28, 99, 'Punjab'),
(29, 99, 'Rajasthan'),
(30, 99, 'Sikkim'),
(31, 99, 'Tamil Nadu'),
(32, 99, 'Tripura'),
(33, 99, 'Uttaranchal'),
(34, 99, 'Uttar Pradesh'),
(35, 99, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '1= buyer , 2= merchant, 3 = BuyerToMerchant , 4 = MerchantToBuyer',
  `email` varchar(320) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `password` int(25) NOT NULL,
  `activation_link` int(100) NOT NULL COMMENT 'for email verification',
  `verification_code` int(10) NOT NULL COMMENT 'for mobile verification',
  `user_status` int(11) NOT NULL COMMENT '1 = activation pending, 2 = payment pending, 3 = enabled, 4 = disabled',
  `bad_attempts` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `field1` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `email`, `phone_number`, `password`, `activation_link`, `verification_code`, `user_status`, `bad_attempts`, `last_login`, `DOC`, `DOU`, `CB`, `UB`, `field1`) VALUES
(6, 1, 'avpsdvfg@gmail.com', 1, 123456, 0, 0, 3, 0, '0000-00-00 00:00:00', '2016-08-05', '2016-08-05 18:30:00', 10, 10, 0),
(9, 2, 'avptest1992@gmail.com', 11, 123456, 0, 0, 3, 0, '0000-00-00 00:00:00', '2016-08-06', '2016-08-05 18:30:00', 10, 10, 0),
(10, 2, 'avpin1992@gmail.com', 124356, 123456, 0, 0, 3, 0, '0000-00-00 00:00:00', '2016-08-08', '2016-08-07 18:30:00', 10, 10, 0),
(11, 2, 'anumol@gmail.com', 123456, 123456, 0, 0, 3, 0, '0000-00-00 00:00:00', '2016-08-08', '2016-08-08 07:12:42', 10, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE IF NOT EXISTS `user_address` (
`id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` int(11) NOT NULL,
  `postcode` varchar(111) NOT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `default_billing_address` varchar(111) NOT NULL,
  `default_shipping_address` varchar(111) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_history`
--

CREATE TABLE IF NOT EXISTS `wallet_history` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `entry_date` datetime NOT NULL,
  `credit_debit` int(11) NOT NULL COMMENT '1=>credit, 2=>debit',
  `balance_amt` decimal(10,2) NOT NULL,
  `ids` int(11) NOT NULL COMMENT 'eg:purchase_id',
  `field1` varchar(200) NOT NULL COMMENT 'comment',
  `field2` int(11) NOT NULL COMMENT 'status',
  `payment_method` int(11) NOT NULL COMMENT '1=>admin,2=>credit/debit/netbanking,3=>paypal',
  `transaction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `weight_class`
--

CREATE TABLE IF NOT EXISTS `weight_class` (
`id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `weight_class`
--

INSERT INTO `weight_class` (`id`, `title`, `unit`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(3, 'kilograms', 'kg', 10, 0, '2016-07-21', '2016-07-20 18:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_post`
--
ALTER TABLE `admin_post`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
 ADD PRIMARY KEY (`id`), ADD KEY `admin_post_id` (`admin_post_id`);

--
-- Indexes for table `buyer_details`
--
ALTER TABLE `buyer_details`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
 ADD PRIMARY KEY (`Id`), ADD KEY `country_id` (`country_id`), ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `make_product_payment`
--
ALTER TABLE `make_product_payment`
 ADD PRIMARY KEY (`id`), ADD KEY `userid` (`userid`), ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `master_category_tags`
--
ALTER TABLE `master_category_tags`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_history_type`
--
ALTER TABLE `master_history_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_shipping_types`
--
ALTER TABLE `master_shipping_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_details`
--
ALTER TABLE `merchant_details`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `district` (`district`,`state`,`country`), ADD KEY `district_2` (`district`), ADD KEY `state` (`state`), ADD KEY `country` (`country`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `address_book_id` (`ship_address_id`), ADD KEY `admin_status` (`admin_status`), ADD KEY `user_id_2` (`user_id`), ADD KEY `coupon_id` (`coupon_id`), ADD KEY `ship_address_id` (`ship_address_id`), ADD KEY `bill_address_id` (`bill_address_id`), ADD KEY `transaction_id` (`transaction_id`), ADD KEY `user_id_3` (`user_id`), ADD KEY `user_id_4` (`user_id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
 ADD PRIMARY KEY (`id`), ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
 ADD PRIMARY KEY (`id`), ADD KEY `order_id` (`order_id`), ADD KEY `product_id` (`product_id`), ADD KEY `order_id_2` (`order_id`), ADD KEY `product_id_2` (`product_id`), ADD KEY `order_id_3` (`order_id`), ADD KEY `product_id_3` (`product_id`), ADD KEY `order_id_4` (`order_id`), ADD KEY `product_id_4` (`product_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD KEY `merchant_id` (`merchant_id`,`merchant_type`), ADD KEY `merchant_type` (`merchant_type`), ADD KEY `merchant_id_2` (`merchant_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category_path`
--
ALTER TABLE `product_category_path`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
 ADD PRIMARY KEY (`id`), ADD KEY `country` (`country`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
 ADD PRIMARY KEY (`Id`), ADD KEY `country_id` (`country_id`), ADD KEY `country_id_2` (`country_id`), ADD KEY `country_id_3` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
 ADD PRIMARY KEY (`id`), ADD KEY `country` (`country`), ADD KEY `state` (`state`), ADD KEY `state_2` (`state`), ADD KEY `country_2` (`country`), ADD KEY `country_3` (`country`), ADD KEY `default_billing_address` (`default_billing_address`), ADD KEY `country_4` (`country`), ADD KEY `district` (`district`), ADD KEY `userid` (`userid`), ADD KEY `district_2` (`district`), ADD KEY `country_5` (`country`), ADD KEY `state_3` (`state`);

--
-- Indexes for table `wallet_history`
--
ALTER TABLE `wallet_history`
 ADD PRIMARY KEY (`id`), ADD KEY `type_id` (`type_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `weight_class`
--
ALTER TABLE `weight_class`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_post`
--
ALTER TABLE `admin_post`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `buyer_details`
--
ALTER TABLE `buyer_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `make_product_payment`
--
ALTER TABLE `make_product_payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_category_tags`
--
ALTER TABLE `master_category_tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `master_history_type`
--
ALTER TABLE `master_history_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_shipping_types`
--
ALTER TABLE `master_shipping_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `merchant_details`
--
ALTER TABLE `merchant_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `product_category_path`
--
ALTER TABLE `product_category_path`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wallet_history`
--
ALTER TABLE `wallet_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `weight_class`
--
ALTER TABLE `weight_class`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyer_details`
--
ALTER TABLE `buyer_details`
ADD CONSTRAINT `buyer_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `make_product_payment`
--
ALTER TABLE `make_product_payment`
ADD CONSTRAINT `make_product_payment_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
ADD CONSTRAINT `make_product_payment_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `merchant_details`
--
ALTER TABLE `merchant_details`
ADD CONSTRAINT `merchant_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
ADD CONSTRAINT `merchant_details_ibfk_2` FOREIGN KEY (`district`) REFERENCES `districts` (`Id`),
ADD CONSTRAINT `merchant_details_ibfk_3` FOREIGN KEY (`state`) REFERENCES `states` (`Id`),
ADD CONSTRAINT `merchant_details_ibfk_4` FOREIGN KEY (`country`) REFERENCES `countries` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`ship_address_id`) REFERENCES `user_address` (`id`),
ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`bill_address_id`) REFERENCES `user_address` (`id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
ADD CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `states`
--
ALTER TABLE `states`
ADD CONSTRAINT `states_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
ADD CONSTRAINT `user_address_ibfk_2` FOREIGN KEY (`district`) REFERENCES `districts` (`Id`),
ADD CONSTRAINT `user_address_ibfk_3` FOREIGN KEY (`country`) REFERENCES `countries` (`id`),
ADD CONSTRAINT `user_address_ibfk_4` FOREIGN KEY (`state`) REFERENCES `states` (`Id`);

--
-- Constraints for table `wallet_history`
--
ALTER TABLE `wallet_history`
ADD CONSTRAINT `wallet_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
