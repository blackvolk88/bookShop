-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2015 at 08:09 PM
-- Server version: 5.5.41-0ubuntu0.14.10.1
-- PHP Version: 5.5.12-2ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookShop`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
`ID` int(11) unsigned NOT NULL,
  `FullName` varchar(255) NOT NULL DEFAULT 'John Doe'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`ID`, `FullName`) VALUES
(4, 'Test Four'),
(1, 'Test One'),
(3, 'Test Three'),
(2, 'Test Two');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
`ID` int(11) unsigned NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Description` text CHARACTER SET utf8,
  `ImagePath` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ID`, `Name`, `Description`, `ImagePath`, `Price`) VALUES
(1, 'War and Peace', 'sdg lshg gl dds ljkdfgnl; dshgl;df ngdfl; gndf gjbhdkgjsdbg jkfdbgk dfsbjh vgjwe', NULL, 100),
(2, 'Little sword', 'ada skjhflasdh lksh gkg kdk jnbdl ksdbnlkg jglk jdbgskl bdgbdjfk ndfk nkdjn df...', NULL, 150),
(3, 'Amazyng Book', 'asdasdasd jshadkjhas kjdhas khdaskd jsahkdj shakdjas kdjasbk djasbkdj abskdjsabkd ba', NULL, 100),
(4, 'Chooh chooh', 'Chooh choohChooh choohChooh choohChooh choohChooh choohChooh choohChooh choohChooh choohChooh choohChooh chooh', NULL, 150);

-- --------------------------------------------------------

--
-- Table structure for table `bookToAuthor`
--

CREATE TABLE IF NOT EXISTS `bookToAuthor` (
  `BookID` int(11) unsigned NOT NULL,
  `AuthorID` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookToGenre`
--

CREATE TABLE IF NOT EXISTS `bookToGenre` (
  `BookID` int(11) unsigned NOT NULL,
  `GenreID` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE IF NOT EXISTS `discounts` (
`ID` int(11) unsigned NOT NULL,
  `Percent` int(2) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
`ID` int(11) unsigned NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`ID`, `Name`) VALUES
(1, 'SomeGenre1'),
(2, 'SomeGenre2'),
(3, 'SomeGenre3'),
(4, 'SomeGenre4');

-- --------------------------------------------------------

--
-- Table structure for table `orderItems`
--

CREATE TABLE IF NOT EXISTS `orderItems` (
  `OrderID` int(11) unsigned NOT NULL,
  `ProductID` int(11) unsigned NOT NULL,
  `Count` int(11) unsigned NOT NULL DEFAULT '1',
  `Price` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`ID` int(11) unsigned NOT NULL,
  `UserID` int(11) unsigned NOT NULL,
  `CreationDate` datetime NOT NULL,
  `RenewalDate` datetime DEFAULT NULL,
  `Status` enum('PENDING','CREATED','COMPLITED','DECLINED') CHARACTER SET utf8 NOT NULL DEFAULT 'PENDING',
  `PaymentID` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `paymentMethods`
--

CREATE TABLE IF NOT EXISTS `paymentMethods` (
`ID` int(11) unsigned NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Session`
--

CREATE TABLE IF NOT EXISTS `Session` (
`id_session` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `sid` char(10) NOT NULL,
  `time_start` datetime NOT NULL,
  `time_last` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Session`
--

INSERT INTO `Session` (`id_session`, `id_user`, `sid`, `time_start`, `time_last`) VALUES
(3, 1, 'jCosAq19uD', '2015-04-09 19:55:35', '2015-04-09 19:55:35'),
(4, 1, 'SA8p26ez9i', '2015-04-09 20:07:41', '2015-04-09 20:07:41'),
(5, 1, 'ZF2uw3ZCdU', '2015-04-09 20:08:18', '2015-04-09 20:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingCart`
--

CREATE TABLE IF NOT EXISTS `shoppingCart` (
`ID` int(11) unsigned NOT NULL,
  `UserID` int(11) unsigned NOT NULL,
  `BookID` int(11) unsigned NOT NULL,
  `Count` int(11) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `shoppingCart`
--

INSERT INTO `shoppingCart` (`ID`, `UserID`, `BookID`, `Count`) VALUES
(4, 1, 2, 2),
(5, 1, 4, 1),
(8, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`ID` int(11) unsigned NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `FullName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Password` varchar(255) CHARACTER SET utf16 NOT NULL,
  `DiscountID` int(11) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Email`, `FullName`, `Password`, `DiscountID`) VALUES
(1, 'test@test.com', 'John Doe', 'cc03e747a6afbbcbf8be7668acfebee5', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `FullName` (`FullName`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
 ADD PRIMARY KEY (`ID`), ADD KEY `Name` (`Name`);

--
-- Indexes for table `bookToAuthor`
--
ALTER TABLE `bookToAuthor`
 ADD PRIMARY KEY (`BookID`,`AuthorID`);

--
-- Indexes for table `bookToGenre`
--
ALTER TABLE `bookToGenre`
 ADD PRIMARY KEY (`BookID`,`GenreID`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `orderItems`
--
ALTER TABLE `orderItems`
 ADD PRIMARY KEY (`OrderID`,`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `paymentMethods`
--
ALTER TABLE `paymentMethods`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `Session`
--
ALTER TABLE `Session`
 ADD PRIMARY KEY (`id_session`), ADD UNIQUE KEY `ixSession` (`sid`);

--
-- Indexes for table `shoppingCart`
--
ALTER TABLE `shoppingCart`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `UserID` (`UserID`,`BookID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
MODIFY `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
MODIFY `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
MODIFY `ID` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
MODIFY `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `ID` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paymentMethods`
--
ALTER TABLE `paymentMethods`
MODIFY `ID` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Session`
--
ALTER TABLE `Session`
MODIFY `id_session` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `shoppingCart`
--
ALTER TABLE `shoppingCart`
MODIFY `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
