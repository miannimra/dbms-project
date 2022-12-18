-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2022 at 03:22 AM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library-management-sys`
--
CREATE DATABASE IF NOT EXISTS `library-management-sys` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `library-management-sys`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `ISBN` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  KEY `ISBN` (`ISBN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1863256815 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ISBN`, `genre`, `title`, `author`) VALUES
(143134183, 'NONFICTION', 'BIRDS BY THE SHORE: OBSERVING THE NATURAL LIFE OF THE ATLANTIC COAST', 'JENNIFER ACKERMAN'),
(345528670, 'HISTORICAL FICTION', 'THE AVIATOR''S WIFE', 'MELANIE BENJAMIN'),
(375826696, 'FANTASY', 'ERAGON', 'CHRISTOPHER PAOLINI'),
(394724550, 'NONFICTION', 'GIFT FROM THE SEA', 'ANNE MORROW LINDBERG'),
(553588486, 'FANTASY', 'A GAME OF THRONES', 'GEORGE MARTIN'),
(593099323, 'SCIENCE FICTION', 'DUNE', 'FRANK HERBERT'),
(1400052920, 'SCIENCE FICTION', 'THE HITCHHIKER''S GUIDE TO THE GALAXY', 'DOUGLAS ADAMS'),
(1542023912, 'THRILLER', 'THE APARTMENT', 'K.L. SLATER'),
(1786816652, 'THRILLER', 'CLOSER', 'K.L. SLATER'),
(1863256814, 'MYSTERY', 'I CAME TO SAY GOODBYE', 'CAROLINE OVERINGTON');

-- --------------------------------------------------------

--
-- Table structure for table `checks_out`
--

CREATE TABLE IF NOT EXISTS `checks_out` (
  `checkoutdate` date NOT NULL,
  `duedate` date NOT NULL,
  `readerID` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  PRIMARY KEY (`checkoutdate`),
  KEY `readerID` (`readerID`),
  KEY `ISBN` (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checks_out`
--

INSERT INTO `checks_out` (`checkoutdate`, `duedate`, `readerID`, `ISBN`) VALUES
('2022-06-08', '2022-06-18', 100001, 345528670),
('2022-07-01', '2022-07-10', 100004, 553588486),
('2022-09-07', '2022-09-17', 100007, 1786816652),
('2022-09-17', '2022-09-27', 100007, 1542023912),
('2022-11-01', '2022-11-10', 100003, 375826696),
('2022-12-01', '2022-12-10', 100004, 143134183),
('2022-12-03', '2022-12-13', 100005, 1400052920),
('2022-12-04', '2022-12-14', 100005, 593099323),
('2022-12-13', '2022-12-23', 100009, 1863256814),
('2022-12-17', '2022-12-27', 100008, 1400052920);

-- --------------------------------------------------------

--
-- Table structure for table `maintains`
--

CREATE TABLE IF NOT EXISTS `maintains` (
  `staffID` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  KEY `staffID` (`staffID`),
  KEY `ISBN` (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintains`
--

INSERT INTO `maintains` (`staffID`, `ISBN`) VALUES
(235647, 143134183),
(235647, 345528670),
(235647, 375826696),
(235647, 394724550),
(235647, 553588486),
(235647, 593099323),
(235647, 1400052920),
(235647, 1542023912),
(235647, 1786816652),
(235647, 1786816652),
(235647, 1863256814);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `publishID` int(11) NOT NULL AUTO_INCREMENT,
  `publishyear` year(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`publishID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publishID`, `publishyear`, `name`) VALUES
(1, 2018, 'BOOKOUTURE'),
(2, 2010, 'RANDOM HOUSE AUSTRALIA'),
(3, 2019, 'ACE BOOKS'),
(4, 2016, 'METROPOLITAN BOOKS'),
(5, 2019, 'PENGUIN BOOKS');

-- --------------------------------------------------------

--
-- Table structure for table `publishes`
--

CREATE TABLE IF NOT EXISTS `publishes` (
  `publishID` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  KEY `ISBN` (`ISBN`),
  KEY `publishID` (`publishID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publishes`
--

INSERT INTO `publishes` (`publishID`, `ISBN`) VALUES
(1, 1542023912),
(1, 1786816652),
(4, 143134183),
(3, 345528670),
(4, 375826696),
(5, 394724550),
(3, 553588486),
(3, 593099323),
(5, 593099323),
(5, 1400052920),
(3, 1863256814);

-- --------------------------------------------------------

--
-- Table structure for table `reader`
--

CREATE TABLE IF NOT EXISTS `reader` (
  `readerID` int(6) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `lastname` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`readerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100011 ;

--
-- Dumping data for table `reader`
--

INSERT INTO `reader` (`readerID`, `firstname`, `lastname`, `email`) VALUES
(100000, 'John', 'Paul', 'JohnPaul@email.com'),
(100001, 'Connie', 'Kline', 'conniekline@email.com'),
(100003, 'Bennet', 'Miles', 'bennetmiles@email.com'),
(100004, 'Sidney', 'McDonald', 'sidneymcdonald@email.com'),
(100005, 'Foster', 'Webb', 'FosterWebb@email.com'),
(100006, 'Fred', 'McDaniel', 'fredmcdaniel@email.com'),
(100007, 'Rae', 'Oconner', 'raeoconner@email.com'),
(100008, 'Merle', 'West', 'merlewest@email.com'),
(100009, 'Una', 'Lucas', 'unalucas@email.com'),
(100010, 'Holly', 'Webb', 'hollywebb@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staffID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`staffID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=235648 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `name`) VALUES
(235647, 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE IF NOT EXISTS `tracks` (
  `staffID` int(11) NOT NULL,
  `readerID` int(11) NOT NULL,
  KEY `staffID` (`staffID`),
  KEY `readerID` (`readerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`staffID`, `readerID`) VALUES
(235647, 100000),
(235647, 100001),
(235647, 100003),
(235647, 100004),
(235647, 100005),
(235647, 100006),
(235647, 100007),
(235647, 100008),
(235647, 100009),
(235647, 100010);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `loginID` int(6) NOT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY (`loginID`),
  UNIQUE KEY `password` (`password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`loginID`, `password`) VALUES
(235647, 'passwd1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checks_out`
--
ALTER TABLE `checks_out`
  ADD CONSTRAINT `fk_checkout-book` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`),
  ADD CONSTRAINT `fk_reader-checksout` FOREIGN KEY (`readerID`) REFERENCES `reader` (`readerID`);

--
-- Constraints for table `maintains`
--
ALTER TABLE `maintains`
  ADD CONSTRAINT `fk_maintains-book` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`),
  ADD CONSTRAINT `fk_staff-maintains` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`);

--
-- Constraints for table `publishes`
--
ALTER TABLE `publishes`
  ADD CONSTRAINT `fk_publish-publisher` FOREIGN KEY (`publishID`) REFERENCES `publisher` (`publishID`),
  ADD CONSTRAINT `fk_publishes-book` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`);

--
-- Constraints for table `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `fk_staff-tracks` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`),
  ADD CONSTRAINT `fk_tracks-reader` FOREIGN KEY (`readerID`) REFERENCES `reader` (`readerID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_staff-login` FOREIGN KEY (`loginID`) REFERENCES `staff` (`staffID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
