-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 27, 2012 at 05:34 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mineerp`
--

-- --------------------------------------------------------

--
-- Table structure for table `diesel`
--

DROP TABLE IF EXISTS `diesel`;
CREATE TABLE IF NOT EXISTS `diesel` (
  `filling_no` int(11) NOT NULL AUTO_INCREMENT,
  `fillingDate` date NOT NULL,
  `Quentity` int(11) NOT NULL,
  `vehicle` int(11) NOT NULL,
  PRIMARY KEY (`filling_no`),
  KEY `vehicle_2` (`vehicle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `diesel`
--

INSERT INTO `diesel` (`filling_no`, `fillingDate`, `Quentity`, `vehicle`) VALUES
(1, '2012-08-28', 50, 4),
(2, '2012-08-28', 50, 4),
(3, '2012-08-28', 100, 3),
(5, '2012-08-29', 55, 3),
(6, '2012-08-29', 150, 1),
(7, '2012-08-30', 15, 2),
(8, '2012-08-28', 350, 1),
(10, '2012-09-27', 25, 4);

-- --------------------------------------------------------

--
-- Table structure for table `dieselin`
--

DROP TABLE IF EXISTS `dieselin`;
CREATE TABLE IF NOT EXISTS `dieselin` (
  `filling_no` int(11) NOT NULL AUTO_INCREMENT,
  `fillingDate` date NOT NULL,
  `Quentity` int(11) NOT NULL,
  PRIMARY KEY (`filling_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `dieselin`
--

INSERT INTO `dieselin` (`filling_no`, `fillingDate`, `Quentity`) VALUES
(1, '2012-08-28', 1150),
(6, '2012-08-29', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `kmlog`
--

DROP TABLE IF EXISTS `kmlog`;
CREATE TABLE IF NOT EXISTS `kmlog` (
  `KMLOGS` int(11) NOT NULL AUTO_INCREMENT,
  `Openingdate` date NOT NULL,
  `Closingdate` date NOT NULL,
  `vehicle` int(11) NOT NULL,
  `OpeningKm` float NOT NULL,
  `ClosingKm` float NOT NULL,
  `OpeningHours` int(11) NOT NULL,
  `ClosingHours` int(11) NOT NULL,
  PRIMARY KEY (`KMLOGS`),
  UNIQUE KEY `Openingdate` (`Openingdate`,`Closingdate`,`vehicle`),
  KEY `vehicle` (`vehicle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kmlog`
--

INSERT INTO `kmlog` (`KMLOGS`, `Openingdate`, `Closingdate`, `vehicle`, `OpeningKm`, `ClosingKm`, `OpeningHours`, `ClosingHours`) VALUES
(1, '2012-08-01', '2012-08-23', 8, 10, 25, 1, 10),
(2, '2012-08-01', '2012-08-23', 3, 25, 78, 524, 600),
(3, '2012-08-01', '2012-08-23', 2, 23, 43, 345, 500);

-- --------------------------------------------------------

--
-- Table structure for table `leveldiff`
--

DROP TABLE IF EXISTS `leveldiff`;
CREATE TABLE IF NOT EXISTS `leveldiff` (
  `leveldiffdate` date NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`leveldiffdate`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leveldiff`
--

INSERT INTO `leveldiff` (`leveldiffdate`, `amount`) VALUES
('2012-09-05', -3000);

-- --------------------------------------------------------

--
-- Table structure for table `monthlydata`
--

DROP TABLE IF EXISTS `monthlydata`;
CREATE TABLE IF NOT EXISTS `monthlydata` (
  `datalog` int(11) NOT NULL AUTO_INCREMENT,
  `dumperfactor` float NOT NULL,
  `dailytarget` int(11) NOT NULL,
  `dateofmonth` date NOT NULL,
  PRIMARY KEY (`datalog`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `monthlydata`
--

INSERT INTO `monthlydata` (`datalog`, `dumperfactor`, `dailytarget`, `dateofmonth`) VALUES
(1, 16.555, 11750, '2012-09-26'),
(2, 14, 3125, '2012-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `penalty`
--

DROP TABLE IF EXISTS `penalty`;
CREATE TABLE IF NOT EXISTS `penalty` (
  `penno` int(11) NOT NULL AUTO_INCREMENT,
  `penDate` date NOT NULL,
  `Reportedtrips` int(11) NOT NULL,
  `Hindrencefreeday` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`penno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `penalty`
--

INSERT INTO `penalty` (`penno`, `penDate`, `Reportedtrips`, `Hindrencefreeday`) VALUES
(1, '2012-08-28', 300, '1'),
(2, '2012-08-31', 400, '1'),
(3, '2012-08-30', 500, '1'),
(4, '2012-08-22', 500, '1'),
(5, '2012-09-12', 60, '0');

-- --------------------------------------------------------

--
-- Table structure for table `qty`
--

DROP TABLE IF EXISTS `qty`;
CREATE TABLE IF NOT EXISTS `qty` (
  `TransactionNO` int(11) NOT NULL AUTO_INCREMENT,
  `trip_Date` date NOT NULL,
  `Shift` enum('1','2','3','4') NOT NULL,
  `trips` int(2) NOT NULL DEFAULT '0',
  `capacity` double NOT NULL,
  `vehicle` int(11) NOT NULL,
  `comments` tinytext NOT NULL,
  PRIMARY KEY (`TransactionNO`),
  KEY `vehicle` (`vehicle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=153 ;

--
-- Dumping data for table `qty`
--

INSERT INTO `qty` (`TransactionNO`, `trip_Date`, `Shift`, `trips`, `capacity`, `vehicle`, `comments`) VALUES
(1, '2012-08-27', '1', 48, 15, 1, ''),
(49, '2012-09-23', '1', 45, 15, 2, ''),
(51, '2012-08-28', '1', 40, 15, 3, ''),
(53, '2012-08-28', '1', 25, 15, 4, ''),
(66, '2012-09-20', '4', 35, 15, 8, ''),
(69, '2012-09-26', '2', 0, 0, 9, ''),
(80, '2012-09-01', '2', 25, 15, 1, ''),
(96, '2012-09-25', '1', 25, 50, 3, ''),
(143, '2012-09-27', '1', 35, 45, 9, ''),
(144, '2012-09-26', '3', 45, 45, 9, ''),
(151, '2012-09-25', '1', 25, 45, 8, ''),
(152, '2012-09-26', '3', 25, 10, 12, '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `qtyparday`
--
DROP VIEW IF EXISTS `qtyparday`;
CREATE TABLE IF NOT EXISTS `qtyparday` (
`total_par_day` double
,`single_date` date
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `qtyparmonth`
--
DROP VIEW IF EXISTS `qtyparmonth`;
CREATE TABLE IF NOT EXISTS `qtyparmonth` (
`total_par_month` double
,`month` int(2)
,`year` int(4)
);
-- --------------------------------------------------------

--
-- Table structure for table `qty_bill`
--

DROP TABLE IF EXISTS `qty_bill`;
CREATE TABLE IF NOT EXISTS `qty_bill` (
  `bill_date` date NOT NULL,
  `bill_amount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bill_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qty_bill`
--

INSERT INTO `qty_bill` (`bill_date`, `bill_amount`) VALUES
('2012-08-28', 78000),
('2012-09-05', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `rain`
--

DROP TABLE IF EXISTS `rain`;
CREATE TABLE IF NOT EXISTS `rain` (
  `DATE` date NOT NULL,
  `rain` float NOT NULL,
  UNIQUE KEY `DATE` (`DATE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rippp`
--

DROP TABLE IF EXISTS `rippp`;
CREATE TABLE IF NOT EXISTS `rippp` (
  `pppdate` date NOT NULL,
  `repottedqty` int(11) NOT NULL,
  `repotteddiesel` int(11) NOT NULL,
  `g3` int(11) NOT NULL,
  `dieselincome` int(11) NOT NULL,
  `pppid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pppid`),
  UNIQUE KEY `pppid` (`pppid`),
  KEY `g3` (`g3`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `serviceid` int(11) NOT NULL AUTO_INCREMENT,
  `servicedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `service_vehicle` int(11) NOT NULL,
  `part` int(11) NOT NULL,
  PRIMARY KEY (`serviceid`),
  KEY `service_vehicle` (`service_vehicle`),
  KEY `part` (`part`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceid`, `servicedate`, `service_vehicle`, `part`) VALUES
(1, '2012-09-27 06:18:55', 21, 2),
(2, '2012-09-27 06:18:55', 21, 1),
(3, '2012-09-27 06:18:55', 21, 3);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

DROP TABLE IF EXISTS `store`;
CREATE TABLE IF NOT EXISTS `store` (
  `partid` int(11) NOT NULL AUTO_INCREMENT,
  `logdate` date NOT NULL,
  `partprice` int(11) NOT NULL,
  `part_name` varchar(100) NOT NULL,
  PRIMARY KEY (`partid`),
  KEY `service_vehicle` (`partprice`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`partid`, `logdate`, `partprice`, `part_name`) VALUES
(1, '2012-09-12', 25, 'oil'),
(2, '2012-09-26', 25, 'oik'),
(3, '2012-09-25', 25, 'oil');

-- --------------------------------------------------------

--
-- Stand-in structure for view `totalqtyparday`
--
DROP VIEW IF EXISTS `totalqtyparday`;
CREATE TABLE IF NOT EXISTS `totalqtyparday` (
`super_total_par_day` double
,`single_date` date
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `totalqtyparmonth`
--
DROP VIEW IF EXISTS `totalqtyparmonth`;
CREATE TABLE IF NOT EXISTS `totalqtyparmonth` (
`total_par_month` double
,`month` int(2)
,`year` int(4)
);
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'bob', '9a618248b64db62d15b300a07b00580b');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `vehicelid` int(11) NOT NULL AUTO_INCREMENT,
  `vehiclename` varchar(50) NOT NULL,
  `vehicleno` int(11) NOT NULL,
  `vehicletype` enum('trucks','extra vehicles','outer_party') NOT NULL,
  PRIMARY KEY (`vehicelid`),
  KEY `vehicelid` (`vehicelid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicelid`, `vehiclename`, `vehicleno`, `vehicletype`) VALUES
(1, 'volvo', 3, 'trucks'),
(2, 'tata', 1, 'trucks'),
(3, 'tata', 2, 'trucks'),
(4, 'tata', 3, 'trucks'),
(7, 'tata', 4, 'trucks'),
(8, 'tata', 5, 'trucks'),
(9, 'tata', 6, 'trucks'),
(12, 'shri_enter', 1, 'outer_party'),
(14, 'volvo', 2, 'outer_party'),
(15, 'volvo', 2, 'outer_party'),
(16, 'volvo', 2, 'outer_party'),
(17, 'volvo', 2, 'outer_party'),
(18, 'volvo', 2, 'outer_party'),
(19, 'volvo', 2, 'trucks'),
(20, 'volvo', 2, 'extra vehicles'),
(21, 'volvo', 2, 'extra vehicles'),
(22, 'volvo', 2, 'extra vehicles');

-- --------------------------------------------------------

--
-- Structure for view `qtyparday`
--
DROP TABLE IF EXISTS `qtyparday`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qtyparday` AS select sum((`qty`.`trips` * `qty`.`capacity`)) AS `total_par_day`,`qty`.`trip_Date` AS `single_date` from (`qty` join `vehicles` on((`qty`.`vehicle` = `vehicles`.`vehicelid`))) where (`vehicles`.`vehicletype` <> 'outer_party') group by `qty`.`trip_Date`;

-- --------------------------------------------------------

--
-- Structure for view `qtyparmonth`
--
DROP TABLE IF EXISTS `qtyparmonth`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qtyparmonth` AS select sum(`qtyparday`.`total_par_day`) AS `total_par_month`,month(`qtyparday`.`single_date`) AS `month`,year(`qtyparday`.`single_date`) AS `year` from `qtyparday` group by extract(year_month from `qtyparday`.`single_date`);

-- --------------------------------------------------------

--
-- Structure for view `totalqtyparday`
--
DROP TABLE IF EXISTS `totalqtyparday`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalqtyparday` AS select sum((`qty`.`trips` * `qty`.`capacity`)) AS `super_total_par_day`,`qty`.`trip_Date` AS `single_date` from `qty` group by `qty`.`trip_Date`;

-- --------------------------------------------------------

--
-- Structure for view `totalqtyparmonth`
--
DROP TABLE IF EXISTS `totalqtyparmonth`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalqtyparmonth` AS select sum(`totalqtyparday`.`super_total_par_day`) AS `total_par_month`,month(`totalqtyparday`.`single_date`) AS `month`,year(`totalqtyparday`.`single_date`) AS `year` from `totalqtyparday` group by extract(year_month from `totalqtyparday`.`single_date`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diesel`
--
ALTER TABLE `diesel`
  ADD CONSTRAINT `diesel_ibfk_2` FOREIGN KEY (`vehicle`) REFERENCES `vehicles` (`vehicelid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kmlog`
--
ALTER TABLE `kmlog`
  ADD CONSTRAINT `kmlog_ibfk_2` FOREIGN KEY (`vehicle`) REFERENCES `vehicles` (`vehicelid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `qty`
--
ALTER TABLE `qty`
  ADD CONSTRAINT `qty_ibfk_2` FOREIGN KEY (`vehicle`) REFERENCES `vehicles` (`vehicelid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`service_vehicle`) REFERENCES `vehicles` (`vehicelid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `services_ibfk_2` FOREIGN KEY (`part`) REFERENCES `store` (`partid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
