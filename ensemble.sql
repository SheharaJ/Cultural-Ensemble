-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 11:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ensemble`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` varchar(5) NOT NULL,
  `FirstName` varchar(10) NOT NULL,
  `LastName` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `Tp` int(10) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `HouseNo` varchar(6) NOT NULL,
  `Street` varchar(15) NOT NULL,
  `City` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customerschedule`
--

CREATE TABLE `customerschedule` (
  `Schedule_ID` varchar(5) NOT NULL,
  `Customer_ID` varchar(5) NOT NULL,
  `AdultQuantity` int(2) NOT NULL,
  `ChildQuantity` int(2) NOT NULL,
  `Amount` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `Event_ID` varchar(5) NOT NULL,
  `E_Name` varchar(25) NOT NULL,
  `Description` varchar(25) NOT NULL,
  `Price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eventreservation`
--

CREATE TABLE `eventreservation` (
  `Event_ID` varchar(5) NOT NULL,
  `Reservation_ID` varchar(5) NOT NULL,
  `Date` date NOT NULL,
  `Time` time(1) NOT NULL,
  `Place` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `Group_ID` varchar(5) NOT NULL,
  `Event_ID` varchar(5) NOT NULL,
  `Grp_Name` varchar(20) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `No_Of_Members` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `Inquiry_ID` varchar(5) NOT NULL,
  `Customer_ID` varchar(5) NOT NULL,
  `Subject` varchar(10) NOT NULL,
  `Message` varchar(100) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `Invoice_ID` varchar(5) NOT NULL,
  `Customer_ID` varchar(5) NOT NULL,
  `Reservation_ID` varchar(5) NOT NULL,
  `Payment_Method` char(4) NOT NULL,
  `Amount` int(6) NOT NULL,
  `Date` date NOT NULL,
  `Type` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Reservation_ID` varchar(5) NOT NULL,
  `Customer_ID` varchar(5) NOT NULL,
  `R_Date` date NOT NULL,
  `RequestedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `Schedule_ID` varchar(5) NOT NULL,
  `Show_ID` varchar(5) NOT NULL,
  `StartTime` time(1) NOT NULL,
  `Date` date NOT NULL,
  `Location` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `show`
--

CREATE TABLE `show` (
  `Show_ID` varchar(5) NOT NULL,
  `ShowName` varchar(25) NOT NULL,
  `AdultPrice` int(4) NOT NULL,
  `ChildPrice` int(4) NOT NULL,
  `Duration` time(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `customerschedule`
--
ALTER TABLE `customerschedule`
  ADD PRIMARY KEY (`Customer_ID`,`Schedule_ID`),
  ADD KEY `Schedule_ID` (`Schedule_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`Event_ID`);

--
-- Indexes for table `eventreservation`
--
ALTER TABLE `eventreservation`
  ADD PRIMARY KEY (`Event_ID`,`Reservation_ID`),
  ADD KEY `Reservation_ID` (`Reservation_ID`),
  ADD KEY `Event_ID` (`Event_ID`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`Group_ID`),
  ADD KEY `Event_ID` (`Event_ID`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`Inquiry_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`Invoice_ID`),
  ADD KEY `Reservation_ID` (`Reservation_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Reservation_ID`),
  ADD KEY `fk` (`Customer_ID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`Schedule_ID`),
  ADD KEY `Show_ID` (`Show_ID`);

--
-- Indexes for table `show`
--
ALTER TABLE `show`
  ADD PRIMARY KEY (`Show_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerschedule`
--
ALTER TABLE `customerschedule`
  ADD CONSTRAINT `customerschedule_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customerschedule_ibfk_2` FOREIGN KEY (`Schedule_ID`) REFERENCES `schedule` (`Schedule_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customerschedule_ibfk_3` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customerschedule_ibfk_4` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customerschedule_ibfk_5` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customerschedule_ibfk_6` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eventreservation`
--
ALTER TABLE `eventreservation`
  ADD CONSTRAINT `eventreservation_ibfk_1` FOREIGN KEY (`Event_ID`) REFERENCES `event` (`Event_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eventreservation_ibfk_2` FOREIGN KEY (`Reservation_ID`) REFERENCES `reservation` (`Reservation_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eventreservation_ibfk_3` FOREIGN KEY (`Event_ID`) REFERENCES `event` (`Event_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eventreservation_ibfk_4` FOREIGN KEY (`Event_ID`) REFERENCES `event` (`Event_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eventreservation_ibfk_5` FOREIGN KEY (`Event_ID`) REFERENCES `event` (`Event_ID`);

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`Event_ID`) REFERENCES `event` (`Event_ID`);

--
-- Constraints for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD CONSTRAINT `inquiry_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`Reservation_ID`) REFERENCES `reservation` (`Reservation_ID`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`Show_ID`) REFERENCES `show` (`Show_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
