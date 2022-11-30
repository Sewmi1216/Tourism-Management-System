-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 05:24 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pack2paradise`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `admin_reservation`
--

CREATE TABLE `admin_reservation` (
  `reservationID` int(11) NOT NULL,
  `bookingDateTime` datetime NOT NULL,
  `guestName` varchar(100) NOT NULL,
  `guestPhone` int(10) NOT NULL,
  `guestEmail` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `checkInDate` date NOT NULL,
  `checkOutDate` date NOT NULL,
  `adminID` int(11) NOT NULL,
  `hotelPkgID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `adminID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `guestID` int(11) NOT NULL,
  `guestName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `subTotal` int(11) NOT NULL,
  `touristID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `cart_itemID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cartID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `craftorder`
--

CREATE TABLE `craftorder` (
  `orderID` int(11) NOT NULL,
  `orderDateTime` datetime NOT NULL,
  `totalAmount` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `touristID` int(11) NOT NULL,
  `cartID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `entrepreneur`
--

CREATE TABLE `entrepreneur` (
  `userID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `profileImg` longblob NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `document` longblob NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `entrepreneur_product`
--

CREATE TABLE `entrepreneur_product` (
  `entrepreneurID` int(11) NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guest_reservation`
--

CREATE TABLE `guest_reservation` (
  `reservationID` int(11) NOT NULL,
  `bookingDateTime` datetime NOT NULL,
  `guestName` varchar(200) NOT NULL,
  `guestPhone` int(10) NOT NULL,
  `guestEmail` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `checkInDate` date NOT NULL,
  `checkOutDate` date NOT NULL,
  `touristID` int(11) NOT NULL,
  `hotelPkgID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `adress` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `profileImg` longblob NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `managerName` varchar(150) NOT NULL,
  `managerPhone` int(10) NOT NULL,
  `managerEmail` varchar(100) NOT NULL,
  `managerNic` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `document` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelID`, `name`, `adress`, `email`, `phone`, `profileImg`, `username`, `password`, `managerName`, `managerPhone`, `managerEmail`, `managerNic`, `status`, `document`) VALUES
(1, 'hotel', 'abc', 'abc', 78888888, '', 'hotel', '234', 'abc', 88888888, 'abc', 'abc', 'abc', '');

-- --------------------------------------------------------

--
-- Table structure for table `hotelpackage`
--

CREATE TABLE `hotelpackage` (
  `packageID` int(11) NOT NULL,
  `packageName` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` longblob NOT NULL,
  `status` varchar(50) NOT NULL,
  `hotelID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `usersUid` int(11) NOT NULL,
  `usersName` varchar(50) NOT NULL,
  `usersEmail` varchar(50) NOT NULL,
  `usersPwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`usersUid`, `usersName`, `usersEmail`, `usersPwd`) VALUES
(1, 'hotel', 'hotel@', '123');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msgID` int(11) NOT NULL,
  `incomingMsgID` int(11) NOT NULL,
  `outgoingMsgID` int(11) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `tourBookingID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `reservationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomNo` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `noOfBeds` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `occupiedFrom` date NOT NULL,
  `occupiedTo` date NOT NULL,
  `hotelPkgID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room_reservation`
--

CREATE TABLE `room_reservation` (
  `roomNo` int(11) NOT NULL,
  `reservationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tourbooking`
--

CREATE TABLE `tourbooking` (
  `bookingID` int(11) NOT NULL,
  `bookingDateTime` datetime NOT NULL,
  `bookingStatus` varchar(20) NOT NULL,
  `passportNo` varchar(50) NOT NULL,
  `passportExpDate` date NOT NULL,
  `passportIssueDate` date NOT NULL,
  `guestName` varchar(100) NOT NULL,
  `guestPhone` int(10) NOT NULL,
  `guestEmail` varchar(100) NOT NULL,
  `noOfGuests` int(11) NOT NULL,
  `vaccinationStatus` varchar(50) NOT NULL,
  `tourPkgID` int(11) NOT NULL,
  `touristID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tourguide`
--

CREATE TABLE `tourguide` (
  `userID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `profileImg` longblob NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `document` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tourguide_language`
--

CREATE TABLE `tourguide_language` (
  `tourguideID` int(11) NOT NULL,
  `language` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tourist`
--

CREATE TABLE `tourist` (
  `userID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `profileImg` longblob NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tourist_language`
--

CREATE TABLE `tourist_language` (
  `touristID` int(11) NOT NULL,
  `language` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tourpackage`
--

CREATE TABLE `tourpackage` (
  `packageID` int(11) NOT NULL,
  `packageName` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `image` longblob NOT NULL,
  `adminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `admin_reservation`
--
ALTER TABLE `admin_reservation`
  ADD PRIMARY KEY (`reservationID`),
  ADD UNIQUE KEY `hotelPkgID3` (`hotelPkgID`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`adminID`,`userID`),
  ADD KEY `adminID` (`adminID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD UNIQUE KEY `touristID` (`touristID`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cart_itemID`),
  ADD KEY `cartID` (`cartID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `craftorder`
--
ALTER TABLE `craftorder`
  ADD PRIMARY KEY (`orderID`),
  ADD UNIQUE KEY `touristID` (`touristID`),
  ADD UNIQUE KEY `cartID` (`cartID`);

--
-- Indexes for table `entrepreneur`
--
ALTER TABLE `entrepreneur`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `entrepreneur_product`
--
ALTER TABLE `entrepreneur_product`
  ADD PRIMARY KEY (`entrepreneurID`,`productID`),
  ADD KEY `entrepreneurID` (`entrepreneurID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `guest_reservation`
--
ALTER TABLE `guest_reservation`
  ADD PRIMARY KEY (`reservationID`),
  ADD UNIQUE KEY `touristID` (`touristID`),
  ADD KEY `hotelPkgID` (`hotelPkgID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indexes for table `hotelpackage`
--
ALTER TABLE `hotelpackage`
  ADD PRIMARY KEY (`packageID`),
  ADD KEY `hotelID` (`hotelID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`usersUid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msgID`),
  ADD KEY `incomingMsgID` (`incomingMsgID`),
  ADD KEY `outgoingMsgID` (`outgoingMsgID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD KEY `tourBookingID` (`tourBookingID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `reservationID` (`reservationID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomNo`),
  ADD UNIQUE KEY `hotelPkgID` (`hotelPkgID`);

--
-- Indexes for table `room_reservation`
--
ALTER TABLE `room_reservation`
  ADD PRIMARY KEY (`roomNo`,`reservationID`);

--
-- Indexes for table `tourbooking`
--
ALTER TABLE `tourbooking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `packageID` (`tourPkgID`),
  ADD KEY `touristID` (`touristID`);

--
-- Indexes for table `tourist`
--
ALTER TABLE `tourist`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `tourpackage`
--
ALTER TABLE `tourpackage`
  ADD PRIMARY KEY (`packageID`),
  ADD KEY `adminID` (`adminID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cart_itemID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `craftorder`
--
ALTER TABLE `craftorder`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entrepreneur`
--
ALTER TABLE `entrepreneur`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest_reservation`
--
ALTER TABLE `guest_reservation`
  MODIFY `reservationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotelpackage`
--
ALTER TABLE `hotelpackage`
  MODIFY `packageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msgID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tourbooking`
--
ALTER TABLE `tourbooking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tourist`
--
ALTER TABLE `tourist`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tourpackage`
--
ALTER TABLE `tourpackage`
  MODIFY `packageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_reservation`
--
ALTER TABLE `admin_reservation`
  ADD CONSTRAINT `adminID` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`),
  ADD CONSTRAINT `hotelPkgID3` FOREIGN KEY (`hotelPkgID`) REFERENCES `hotelpackage` (`packageID`);

--
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `FK_adminID` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `touristID4` FOREIGN KEY (`touristID`) REFERENCES `tourist` (`userID`);

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cartID` FOREIGN KEY (`cartID`) REFERENCES `cart` (`cartID`),
  ADD CONSTRAINT `orderID` FOREIGN KEY (`orderID`) REFERENCES `craftorder` (`orderID`),
  ADD CONSTRAINT `productID2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `craftorder`
--
ALTER TABLE `craftorder`
  ADD CONSTRAINT `cartID2` FOREIGN KEY (`cartID`) REFERENCES `cart` (`cartID`),
  ADD CONSTRAINT `touristID3` FOREIGN KEY (`touristID`) REFERENCES `tourist` (`userID`);

--
-- Constraints for table `entrepreneur_product`
--
ALTER TABLE `entrepreneur_product`
  ADD CONSTRAINT `entrepreneurID` FOREIGN KEY (`entrepreneurID`) REFERENCES `entrepreneur` (`userID`),
  ADD CONSTRAINT `productID` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `guest_reservation`
--
ALTER TABLE `guest_reservation`
  ADD CONSTRAINT `hotelPkgID2` FOREIGN KEY (`hotelPkgID`) REFERENCES `hotelpackage` (`packageID`),
  ADD CONSTRAINT `touristID2` FOREIGN KEY (`touristID`) REFERENCES `tourist` (`userID`);

--
-- Constraints for table `hotelpackage`
--
ALTER TABLE `hotelpackage`
  ADD CONSTRAINT `hotelID` FOREIGN KEY (`hotelID`) REFERENCES `hotel` (`hotelID`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `incomingID` FOREIGN KEY (`incomingMsgID`) REFERENCES `admin` (`adminID`),
  ADD CONSTRAINT `outgoingID` FOREIGN KEY (`outgoingMsgID`) REFERENCES `hotel` (`hotelID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `orderID2` FOREIGN KEY (`orderID`) REFERENCES `craftorder` (`orderID`),
  ADD CONSTRAINT `reservationID` FOREIGN KEY (`reservationID`) REFERENCES `guest_reservation` (`reservationID`),
  ADD CONSTRAINT `tourBookingID` FOREIGN KEY (`tourBookingID`) REFERENCES `tourbooking` (`bookingID`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `hotelPkgID` FOREIGN KEY (`hotelPkgID`) REFERENCES `hotelpackage` (`packageID`);

--
-- Constraints for table `tourbooking`
--
ALTER TABLE `tourbooking`
  ADD CONSTRAINT `touristID` FOREIGN KEY (`touristID`) REFERENCES `tourist` (`userID`),
  ADD CONSTRAINT `tourpackageID` FOREIGN KEY (`tourPkgID`) REFERENCES `tourpackage` (`packageID`) ON DELETE CASCADE;

--
-- Constraints for table `tourpackage`
--
ALTER TABLE `tourpackage`
  ADD CONSTRAINT `adminID1` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
