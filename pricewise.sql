-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2016 at 11:04 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pricewise`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryNAME` varchar(50) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryNAME`) VALUES
(13, 'RICE'),
(14, 'CORN'),
(15, 'MEAT & POULTRY'),
(16, 'FISH'),
(17, 'VEGETABLE'),
(18, 'FRUITS');

-- --------------------------------------------------------

--
-- Stand-in structure for view `latestupdates_view`
--
CREATE TABLE IF NOT EXISTS `latestupdates_view` (
`latest` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `latest_province_upload_view`
--
CREATE TABLE IF NOT EXISTS `latest_province_upload_view` (
`max(province_update.province_updateID)` int(11)
,`status` varchar(50)
,`placeName` varchar(50)
,`placeID` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `placeNAME` varchar(50) NOT NULL,
  `markets` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`ID`, `placeNAME`, `markets`) VALUES
(5, 'Bukidnon', 'Malaybalay & Valencia Public Markets'),
(6, 'Camiguin', 'Mambajao Public Market'),
(7, 'Iligan City', 'Pala-o Public Market'),
(8, 'Ozamis City', 'Ozamis Public Market'),
(9, 'Cagayan de Oro City', 'Cogon & Carmen Public Markets');

-- --------------------------------------------------------

--
-- Table structure for table `price_update`
--

CREATE TABLE IF NOT EXISTS `price_update` (
  `price_updateID` int(11) NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  PRIMARY KEY (`price_updateID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `price_update`
--

INSERT INTO `price_update` (`price_updateID`, `date_start`, `date_end`) VALUES
(1, '2016-01-18', '2016-01-24'),
(2, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `price_update_view`
--
CREATE TABLE IF NOT EXISTS `price_update_view` (
`province_updateID` int(11)
,`productID` int(11)
,`name` char(50)
,`imageURL` varchar(100)
,`price` float
,`unitofmeasure` varchar(50)
);
-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `imageURL` varchar(100) DEFAULT NULL,
  `categoryID` int(11) NOT NULL,
  PRIMARY KEY (`productID`),
  KEY `FK_product_category` (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `name`, `description`, `imageURL`, `categoryID`) VALUES
(7, 'Rice, Well-milled', 'Bugas', 'http://leofamilyfarm.weebly.com/uploads/1/4/1/5/14150624/s672462095468863756_p14_i1_w782.jpeg', 13),
(8, 'Rice, Regular-milled', 'Bugas', 'http://www.pk.all.biz/img/pk/catalog/8845.jpeg', 13),
(9, 'Rice, Premium', 'Bugas', 'http://www.phoenixcommodities.com/Images/preminu-rice.jpg', 13),
(10, 'NFA Rice', 'Bugas', 'http://metrocebu.com.ph/wp-content/uploads/2015/07/Rice.jpg', 13),
(11, 'Yellow Corngrits', 'Mais', 'https://nuts.com/images/auto/801x534/assets/b062d815e404934c.jpg', 14),
(12, 'White Corngrits', 'Mais', 'http://xawaash.com/wp-content/uploads/2012/01/Soor-furfur-3.jpg', 14),
(13, 'Pork, Liempo', 'Liempo', 'http://www.maangchi.com/wp-content/uploads/2009/09/grilled-porkbelly_precut.jpg', 15),
(14, 'Pork Lean Meat', 'Lean Meat', 'http://appforhealth.com/wp-content/uploads/2012/02/leanrawmeat-350x350.jpg', 14),
(15, 'Beef Lean Meat', 'Baka', 'http://hcgnaturalweightloss.com/wp-content/uploads/2011/08/meats-that-make-you-thin.jpg', 15),
(16, 'Dressed Chicken, Broiler', 'Manok', 'http://g03.s.alicdn.com/kf/UT8zhroXsXXXXagOFbXl/whole-dressed-frozen-chicken-direct-Suppliers-From.j', 15),
(17, 'Chicken Egg', 'Itlog', 'http://www.freeimageslive.co.uk/image/view/8477/_original', 15),
(18, 'Bangus', 'Bangus', 'http://filipinotimes.ae/wp-content/uploads/2014/04/185_bangus1.jpg', 16),
(19, 'Galunggong', 'Galunggong', 'http://www.interaksyon.com/assets/images/articles/interphoto_1328324551.jpg', 16),
(20, 'Tilapia', 'Tilapia', 'http://www.athifishfarmandhatchery.com/wp-content/uploads/2012/11/tilapia_feat.jpg', 16),
(21, 'Alumahan', 'Alumahan', 'http://1.bp.blogspot.com/-fRRiTdLxMd0/Tox71PPS5HI/AAAAAAAAAFU/lcD5iFUPt5Y/s1600/Hasa-hasa+Kabayas.jp', 16),
(22, 'Matangbaka', 'Matangbaka', 'http://www.marketmanila.com/images/aaafish4.JPG', 16),
(23, 'Tamban', 'Tamban', 'http://cebudailynews.inquirer.net/files/2015/04/tamban-300x184.jpg', 16);

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_category_place_view`
--
CREATE TABLE IF NOT EXISTS `product_category_place_view` (
`name` char(50)
,`description` varchar(50)
,`categoryNAME` varchar(50)
,`placeName` varchar(50)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `product_view_category`
--
CREATE TABLE IF NOT EXISTS `product_view_category` (
`categoryNAME` varchar(50)
,`productID` int(11)
,`name` char(50)
,`description` varchar(50)
,`imageURL` varchar(100)
);
-- --------------------------------------------------------

--
-- Table structure for table `province_price_update`
--

CREATE TABLE IF NOT EXISTS `province_price_update` (
  `province_price_updateID` int(11) NOT NULL AUTO_INCREMENT,
  `province_updateID` int(11),
  `productID` int(11) NOT NULL,
  `price` float NOT NULL,
  `unitofmeasure` int(11) NOT NULL,
  PRIMARY KEY (`province_price_updateID`),
  KEY `FK__product` (`productID`),
  KEY `FK__unitofmeasure` (`unitofmeasure`),
  KEY `FK_province_price_update_province_update` (`province_updateID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `province_price_update`
--

INSERT INTO `province_price_update` (`province_price_updateID`, `province_updateID`, `productID`, `price`, `unitofmeasure`) VALUES
(1, 1, 7, 42, 2),
(2, 1, 8, 40, 2),
(3, 1, 9, 45, 2),
(4, 1, 10, 32, 2),
(5, 2, 11, 30, 2),
(6, 2, 12, 31, 2),
(7, 3, 13, 180, 2),
(8, 3, 14, 190, 2),
(9, 3, 15, 240, 2),
(10, 3, 16, 130, 2),
(11, 4, 17, 5, 3),
(12, 5, 18, 130, 2),
(13, 5, 19, 140, 2),
(14, 5, 20, 100, 2),
(15, 5, 21, 160, 2),
(16, 5, 22, 160, 2),
(17, 5, 23, 40, 2),
(18, 6, 7, 12, 2),
(19, 6, 8, 34, 2),
(20, 7, 23, 45, 2),
(21, 7, 23, 56, 2),
(22, 8, 21, 34, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `province_price_update_view`
--
CREATE TABLE IF NOT EXISTS `province_price_update_view` (
`province_price_updateID` int(11)
,`name` char(50)
,`imageURL` varchar(100)
,`productID` int(11)
,`price` float
,`unitofmeasure` varchar(50)
,`unitofmeasureID` int(11)
,`province_updateID` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `province_update`
--

CREATE TABLE IF NOT EXISTS `province_update` (
  `province_updateID` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `placeID` int(11) NOT NULL,
  PRIMARY KEY (`province_updateID`),
  KEY `FK__place` (`placeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `province_update`
--

INSERT INTO `province_update` (`province_updateID`, `date`, `status`, `placeID`) VALUES
(1, '2016-01-16', 'Uploaded', 5),
(2, '2016-01-16', 'Uploaded', 6),
(3, '2016-01-16', 'Uploaded', 7),
(4, '2016-01-16', 'Uploaded', 8),
(5, '2016-01-16', 'Uploaded', 9),
(6, '2016-01-19', 'Uploaded', 5),
(7, '2016-01-19', 'Uploaded', 6),
(8, '2016-01-19', 'Pending', 6);

-- --------------------------------------------------------

--
-- Stand-in structure for view `province_update_view`
--
CREATE TABLE IF NOT EXISTS `province_update_view` (
`province_updateID` int(11)
,`date` date
,`status` varchar(50)
,`placeName` varchar(50)
);
-- --------------------------------------------------------

--
-- Table structure for table `unitofmeasure`
--

CREATE TABLE IF NOT EXISTS `unitofmeasure` (
  `unitofmeasureID` int(11) NOT NULL AUTO_INCREMENT,
  `unitofmeasure` varchar(50) NOT NULL,
  PRIMARY KEY (`unitofmeasureID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `unitofmeasure`
--

INSERT INTO `unitofmeasure` (`unitofmeasureID`, `unitofmeasure`) VALUES
(2, 'Kilo'),
(3, 'Piece');

-- --------------------------------------------------------

--
-- Stand-in structure for view `updates_groupby_name_category_place`
--
CREATE TABLE IF NOT EXISTS `updates_groupby_name_category_place` (
`province_updateID` int(11)
,`placeID` int(11)
,`placeName` varchar(50)
,`province_price_updateID` int(11)
,`productID` int(11)
,`name` char(50)
,`description` varchar(50)
,`categoryID` int(11)
,`categoryNAME` varchar(50)
,`price` float
,`unitofmeasureID` int(11)
,`unitofmeasure` varchar(50)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `uploaded_views`
--
CREATE TABLE IF NOT EXISTS `uploaded_views` (
`province_updateID` int(11)
,`status` varchar(50)
,`placeID` int(11)
,`placeName` varchar(50)
,`province_price_updateID` int(11)
,`productID` int(11)
,`name` char(50)
,`imageURL` varchar(100)
,`price` float
,`unitofmeasure` varchar(50)
);
-- --------------------------------------------------------

--
-- Table structure for table `upload_updates`
--

CREATE TABLE IF NOT EXISTS `upload_updates` (
  `upload_updatesID` int(11) NOT NULL AUTO_INCREMENT,
  `price_updateID` int(11) NOT NULL,
  `province_updateID` int(11) NOT NULL,
  PRIMARY KEY (`upload_updatesID`),
  KEY `FK_upload_updates_price_update` (`price_updateID`),
  KEY `FK_upload_updates_province_update` (`province_updateID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `upload_updates`
--

INSERT INTO `upload_updates` (`upload_updatesID`, `price_updateID`, `province_updateID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 6),
(7, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userNAME` varchar(50) NOT NULL,
  `userPASSWORD` varchar(150) NOT NULL,
  `employeeName` varchar(50) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userNAME`, `userPASSWORD`, `employeeName`) VALUES
(3, 'admin', '123456', '1'),
(9, 'Chejei', 'oZtVRzRzeuo3udJ7+6YLdQA3pU/MT55U0CXUwD28zYpLuW42Z2FhEnt0vcKzu+9gFt5aw1ZvLUASrMfIXPMplw==', 'Chejei Vallecera');

-- --------------------------------------------------------

--
-- Table structure for table `user_mobile`
--

CREATE TABLE IF NOT EXISTS `user_mobile` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact#` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `completename` varchar(50) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_mobile`
--

INSERT INTO `user_mobile` (`userID`, `username`, `password`, `email`, `contact#`, `address`, `completename`) VALUES
(1, 'Chejei', '7xEVJ8O9v9fIYA5uL5SQyFq2pL2uCir1fCXfEdNsKGOzo9kM6u', 'chejei.vallecera@gmail.com', 2147483647, 'CDO', 'Vallecera cheei'),
(2, 'Chejei', 'FyTE0tb6PmyhldnX681jM1Q+fJWCbUHnBi+zBzApdYucJEoO77', 'chejei.vallecera@gmail.com', 2147483647, 'CDO', 'Vallecera cheei'),
(3, 'Chejei', '3ebHdyLYJUGBTNM7qljawn7YGyrjlPeeq5+qPWTdGds9dnnn73', 'chejei.vallecera@gmail.com', 2147483647, 'CDO', 'Vallecera cheei');

-- --------------------------------------------------------

--
-- Structure for view `latestupdates_view`
--
DROP TABLE IF EXISTS `latestupdates_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `latestupdates_view` AS select max(`upload_updates`.`upload_updatesID`) AS `latest` from `upload_updates`;

-- --------------------------------------------------------

--
-- Structure for view `latest_province_upload_view`
--
DROP TABLE IF EXISTS `latest_province_upload_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `latest_province_upload_view` AS select `province_update`.`province_updateID` AS `max(province_update.province_updateID)`,`province_update`.`status` AS `status`,`place`.`placeNAME` AS `placeName`,`province_update`.`placeID` AS `placeID` from (`place` join `province_update` on((`place`.`ID` = `province_update`.`placeID`)));

-- --------------------------------------------------------

--
-- Structure for view `price_update_view`
--
DROP TABLE IF EXISTS `price_update_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `price_update_view` AS select `province_update`.`province_updateID` AS `province_updateID`,`province_price_update`.`productID` AS `productID`,`product`.`name` AS `name`,`product`.`imageURL` AS `imageURL`,`province_price_update`.`price` AS `price`,`unitofmeasure`.`unitofmeasure` AS `unitofmeasure` from (`unitofmeasure` join (`province_update` join (`product` join `province_price_update` on((`product`.`productID` = `province_price_update`.`productID`))) on((`province_update`.`province_updateID` = `province_price_update`.`province_updateID`))) on((`unitofmeasure`.`unitofmeasureID` = `province_price_update`.`unitofmeasure`)));

-- --------------------------------------------------------

--
-- Structure for view `product_category_place_view`
--
DROP TABLE IF EXISTS `product_category_place_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_category_place_view` AS select `product`.`name` AS `name`,`product`.`description` AS `description`,`category`.`categoryNAME` AS `categoryNAME`,`place`.`placeNAME` AS `placeName` from (`place` join (`category` join `product` on((`category`.`categoryID` = `product`.`categoryID`))));

-- --------------------------------------------------------

--
-- Structure for view `product_view_category`
--
DROP TABLE IF EXISTS `product_view_category`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_view_category` AS select `category`.`categoryNAME` AS `categoryNAME`,`product`.`productID` AS `productID`,`product`.`name` AS `name`,`product`.`description` AS `description`,`product`.`imageURL` AS `imageURL` from (`category` join `product` on((`category`.`categoryID` = `product`.`categoryID`)));

-- --------------------------------------------------------

--
-- Structure for view `province_price_update_view`
--
DROP TABLE IF EXISTS `province_price_update_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `province_price_update_view` AS select `province_price_update`.`province_price_updateID` AS `province_price_updateID`,`product`.`name` AS `name`,`product`.`imageURL` AS `imageURL`,`product`.`productID` AS `productID`,`province_price_update`.`price` AS `price`,`unitofmeasure`.`unitofmeasure` AS `unitofmeasure`,`unitofmeasure`.`unitofmeasureID` AS `unitofmeasureID`,`province_price_update`.`province_updateID` AS `province_updateID` from (`unitofmeasure` join (`product` join `province_price_update` on((`product`.`productID` = `province_price_update`.`productID`))) on((`unitofmeasure`.`unitofmeasureID` = `province_price_update`.`unitofmeasure`)));

-- --------------------------------------------------------

--
-- Structure for view `province_update_view`
--
DROP TABLE IF EXISTS `province_update_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `province_update_view` AS select `province_update`.`province_updateID` AS `province_updateID`,`province_update`.`date` AS `date`,`province_update`.`status` AS `status`,`place`.`placeNAME` AS `placeName` from (`place` join `province_update` on((`place`.`ID` = `province_update`.`placeID`)));

-- --------------------------------------------------------

--
-- Structure for view `updates_groupby_name_category_place`
--
DROP TABLE IF EXISTS `updates_groupby_name_category_place`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `updates_groupby_name_category_place` AS select `province_update`.`province_updateID` AS `province_updateID`,`province_update`.`placeID` AS `placeID`,`place`.`placeNAME` AS `placeName`,`province_price_update`.`province_price_updateID` AS `province_price_updateID`,`province_price_update`.`productID` AS `productID`,`product`.`name` AS `name`,`product`.`description` AS `description`,`product`.`categoryID` AS `categoryID`,`category`.`categoryNAME` AS `categoryNAME`,`province_price_update`.`price` AS `price`,`province_price_update`.`unitofmeasure` AS `unitofmeasureID`,`unitofmeasure`.`unitofmeasure` AS `unitofmeasure` from (`unitofmeasure` join ((`place` join `province_update` on((`place`.`ID` = `province_update`.`placeID`))) join ((`category` join `product` on((`category`.`categoryID` = `product`.`categoryID`))) join `province_price_update` on((`product`.`productID` = `province_price_update`.`productID`))) on((`province_update`.`province_updateID` = `province_price_update`.`province_updateID`))) on((`unitofmeasure`.`unitofmeasureID` = `province_price_update`.`unitofmeasure`))) group by `place`.`placeNAME`,`product`.`name`,`category`.`categoryNAME`;

-- --------------------------------------------------------

--
-- Structure for view `uploaded_views`
--
DROP TABLE IF EXISTS `uploaded_views`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `uploaded_views` AS select `province_update`.`province_updateID` AS `province_updateID`,`province_update`.`status` AS `status`,`province_update`.`placeID` AS `placeID`,`place`.`placeNAME` AS `placeName`,`province_price_update`.`province_price_updateID` AS `province_price_updateID`,`province_price_update`.`productID` AS `productID`,`product`.`name` AS `name`,`product`.`imageURL` AS `imageURL`,`province_price_update`.`price` AS `price`,`unitofmeasure`.`unitofmeasure` AS `unitofmeasure` from (`place` join (`unitofmeasure` join (`product` join (`province_update` join `province_price_update` on((`province_update`.`province_updateID` = `province_price_update`.`province_updateID`))) on((`product`.`productID` = `province_price_update`.`productID`))) on((`unitofmeasure`.`unitofmeasureID` = `province_price_update`.`unitofmeasure`))) on((`place`.`ID` = `province_update`.`placeID`)));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product_category` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`) ON UPDATE CASCADE;

--
-- Constraints for table `province_price_update`
--
ALTER TABLE `province_price_update`
  ADD CONSTRAINT `FK_province_price_update_province_update` FOREIGN KEY (`province_updateID`) REFERENCES `province_update` (`province_updateID`),
  ADD CONSTRAINT `FK__product` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`),
  ADD CONSTRAINT `FK__unitofmeasure` FOREIGN KEY (`unitofmeasure`) REFERENCES `unitofmeasure` (`unitofmeasureID`);

--
-- Constraints for table `province_update`
--
ALTER TABLE `province_update`
  ADD CONSTRAINT `FK__place` FOREIGN KEY (`placeID`) REFERENCES `place` (`ID`);

--
-- Constraints for table `upload_updates`
--
ALTER TABLE `upload_updates`
  ADD CONSTRAINT `FK_upload_updates_price_update` FOREIGN KEY (`price_updateID`) REFERENCES `price_update` (`price_updateID`),
  ADD CONSTRAINT `FK_upload_updates_province_update` FOREIGN KEY (`province_updateID`) REFERENCES `province_update` (`province_updateID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
