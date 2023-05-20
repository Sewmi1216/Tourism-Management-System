-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 10:48 AM
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
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `email`, `password`, `name`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `craftorder`
--

CREATE TABLE `craftorder` (
  `orderID` int(11) NOT NULL,
  `orderDateTime` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `touristID` int(11) NOT NULL,
  `customerName` varchar(100) NOT NULL,
  `customerPhone` int(11) NOT NULL,
  `customerAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `craftorder`
--

INSERT INTO `craftorder` (`orderID`, `orderDateTime`, `status`, `touristID`, `customerName`, `customerPhone`, `customerAddress`) VALUES
(502, '2023-05-15 13:53:29', 'Pending', 27, 'Lithu', 756456765, '21, Temple Rd, Colombo');

-- --------------------------------------------------------

--
-- Table structure for table `craftorder_items`
--

CREATE TABLE `craftorder_items` (
  `itemId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `craftorder_items`
--

INSERT INTO `craftorder_items` (`itemId`, `orderId`, `productId`, `quantity`) VALUES
(23, 502, 18, 3),
(24, 502, 19, 3);

-- --------------------------------------------------------

--
-- Table structure for table `craftorder_payment`
--

CREATE TABLE `craftorder_payment` (
  `orderPaymentId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `paymentDateTime` datetime NOT NULL,
  `amount` double NOT NULL,
  `paymentStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `craftorder_payment`
--

INSERT INTO `craftorder_payment` (`orderPaymentId`, `orderId`, `paymentDateTime`, `amount`, `paymentStatus`) VALUES
(15, 502, '2023-05-15 13:53:29', 1488, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `entrepreneur`
--

CREATE TABLE `entrepreneur` (
  `entID` int(11) NOT NULL,
  `businessName` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `profileImg` longblob NOT NULL,
  `password` varchar(50) NOT NULL,
  `entrepreneurName` varchar(100) NOT NULL,
  `entrepreneurNic` varchar(50) NOT NULL,
  `entrepreneurPhone` int(10) NOT NULL,
  `entrepreneurEmail` varchar(100) NOT NULL,
  `document` longblob NOT NULL,
  `status` tinyint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entrepreneur`
--

INSERT INTO `entrepreneur` (`entID`, `businessName`, `address`, `email`, `phone`, `profileImg`, `password`, `entrepreneurName`, `entrepreneurNic`, `entrepreneurPhone`, `entrepreneurEmail`, `document`, `status`) VALUES
(9, 'Crystal', '21, Temple Road, Colombo', 'udariwijamuni@gmail.com', 715645676, 0x333133353731352e706e67, 'fdec09f746c82416683e6f31feefce6c', 'Perera', '355565446789', 756544456, 'per@gmail.com', 0x6e6f6e2d646973636c6f737572652d61677265656d656e742d75706c6561642d37393178313032342e6a7067, 1),
(10, 'Alankara', '21, Temple Road, Colombo', 'alankara@gmail.com', 112675678, 0x626c616e6b2d70726f66696c652d706963747572652d3937333436305f313238302e77656270, 'f59f601d7b4735cc1fedc12d0d0a5463', 'perera', '199876554567', 765644456, 'perera@gmail.com', 0x726567697374726174696f6e2d61732d6c6567616c2d646f63756d656e742d617373697374616e742d7265676973747261722d7265636f726465722d2e6a7067, 1);

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
  `total_amount` varchar(50) NOT NULL,
  `checkInDate` date NOT NULL,
  `checkOutDate` date NOT NULL,
  `touristID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_reservation`
--

INSERT INTO `guest_reservation` (`reservationID`, `bookingDateTime`, `guestName`, `guestPhone`, `guestEmail`, `status`, `total_amount`, `checkInDate`, `checkOutDate`, `touristID`, `roomID`, `hotelId`) VALUES
(54363, '2023-05-15 13:50:53', 'Lithu', 765654565, 'lithurshikasri777@gmail.com', 'Confirmed', '100', '2023-05-18', '2023-05-19', 27, 101, 1502859376),
(54364, '2023-05-15 14:16:23', 'lithurshikasri', 756455567, 'lithurshikasri777@gmail.com', 'Confirmed', '400', '2023-05-21', '2023-05-23', 27, 201, 1502859376),
(54365, '2023-05-15 14:29:11', 'Lithu', 715467876, 'lithurshikasri777@gmail.com', 'Confirmed', '300', '2023-05-23', '2023-05-26', 27, 101, 1502859376),
(54366, '2023-05-15 14:32:49', 'Lithu', 715644456, 'lithurshikasri777@gmail.com', 'Confirmed', '600', '2023-05-26', '2023-05-29', 27, 201, 1502859376),
(54367, '2023-05-15 16:00:21', 'Lithurshika', 774193765, 'lithurshikasri777@gmail.com', 'Confirmed', '100', '2023-05-15', '2023-05-16', 27, 101, 1502859376);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `profileImg` longblob NOT NULL,
  `password` varchar(50) NOT NULL,
  `managerName` varchar(150) NOT NULL,
  `managerPhone` int(10) NOT NULL,
  `managerEmail` varchar(100) NOT NULL,
  `managerNic` varchar(50) NOT NULL,
  `status` tinyint(100) NOT NULL,
  `document` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelID`, `name`, `address`, `email`, `phone`, `profileImg`, `password`, `managerName`, `managerPhone`, `managerEmail`, `managerNic`, `status`, `document`) VALUES
(1502859374, 'Grand Bell', '21, Temple Road, Colombo 3', 'sewmithimaya248@gmail.com', 112765610, 0x6665726e616e646f2d616c766172657a2d726f6472696775657a2d4d3747646450714a6f77672d756e73706c6173682e6a7067, '25d55ad283aa400af464c76d713c07ad', 'Nihal Perera', 712677789, 'nihal@gmail.com', '199765446789', 0, 0x32346566663033323336353363376130303438316336373164613264376436392e6a7067),
(1502859376, 'Marino Beach', '21, Temple Road, Colombo 7', 'marino@gmail.com', 786545654, 0x4c6567616c2d41677265656d656e742d466f726d2e77656270, 'd6b0ab7f1c8ab8f514db9a6d85de160a', 'Kamal Perera', 765456765, 'kamal@gmail.com', '188767556787', 1, 0x6369756461642d6d6164657261732d4d58624d314e72527174492d756e73706c6173682e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_payment`
--

CREATE TABLE `hotel_payment` (
  `paymentID` int(11) NOT NULL,
  `paymentDateTime` datetime NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `paymentStatus` varchar(100) NOT NULL,
  `reservationID` int(11) NOT NULL,
  `hotelID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_payment`
--

INSERT INTO `hotel_payment` (`paymentID`, `paymentDateTime`, `type`, `amount`, `paymentStatus`, `reservationID`, `hotelID`) VALUES
(0, '2023-05-15 16:00:21', 'Card', 100, 'Completed', 54367, 1502859376),
(1, '2023-05-15 13:50:53', 'Card', 100, 'Completed', 54363, 1502859376),
(2, '2023-05-15 14:16:23', 'Card', 400, 'Completed', 54364, 1502859376);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msgId` int(11) NOT NULL,
  `user_to` varchar(100) NOT NULL,
  `user_from` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msgId`, `user_to`, `user_from`, `body`, `date`) VALUES
(69, 'admin', 'marino@gmail.com', 'Hello Admin', '2023-05-15 13:16:31'),
(70, 'admin', 'lithurshikasri777@gmail.com', 'Hi Admin', '2023-05-15 13:53:59'),
(71, 'marino@gmail.com', 'lithurshikasri777@gmail.com', 'Hi', '2023-05-15 13:54:07'),
(72, 'lithurshikasri777@gmail.com', 'marino@gmail.com', 'hello', '2023-05-15 14:08:54'),
(73, 'admin', 'lithurshikasri777@gmail.com', 'hello', '2023-05-15 14:11:59'),
(74, 'lithurshikasri777@gmail.com', 'admin', 'hi', '2023-05-15 15:08:41'),
(75, '', 'alankara@gmail.com', 'admin', '2023-05-15 16:10:46'),
(76, 'admin', 'marino@gmail.com', 'hi', '2023-05-15 16:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `entID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `categoryId`, `quantity`, `price`, `entID`) VALUES
(16, 'Bathik Saree', 7, 50, 100, 10),
(17, 'Bathik Skirt', 7, 50, 175, 10),
(18, 'Clay Pot', 8, 25, 250, 10),
(19, 'Clay jar', 8, 25, 246, 10),
(20, 'Crane Bag', 9, 25, 250, 10),
(21, 'Crane mat', 9, 25, 350, 10),
(22, 'Handloom Saree', 10, 30, 250, 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_categoryId` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `entID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_categoryId`, `categoryName`, `description`, `entID`) VALUES
(7, 'Bathik', 'Dresses', 10),
(8, 'Clay', 'Ornaments', 10),
(9, 'Crane', 'Bags', 10),
(10, 'Handloom', 'Dresses', 10),
(11, 'Wood Carving', 'Ornaments', 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_img`
--

CREATE TABLE `product_img` (
  `id` int(11) NOT NULL,
  `image` longblob NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_img`
--

INSERT INTO `product_img` (`id`, `image`, `productID`) VALUES
(9, 0x30312e6a7067, 16),
(10, 0x37363762366631366638353436313637616564613338363534383432663662332e6a7067, 16),
(11, 0x3134393731323830372d2d312d2d313632333335373136332e6a706567, 16),
(12, 0x63663434353331652d306538632d343532642d623037632d3865383132393764306564332e6a7067, 17),
(13, 0x4453435f303333375f496e506978696f2e6a7067, 17),
(14, 0x35343834343938333335617474722e706e67, 17),
(15, 0x617661696c61626c652d666f722d7069636b75702d64656c69766572792d706f74746572792d636c61792d706f742d31342d696e63682d33303334383030303130303534342e6a7067, 18),
(16, 0x4561727468656e576172652e6a7067, 18),
(17, 0x696d616765202831292e6a7067, 18),
(18, 0x696d616765732e6a706567, 19),
(19, 0x766172696f75732d636572616d69632d70726f64756374732d636c61792d766172696f75732d636572616d69632d70726f64756374732d636c61792d636f6d666f727461626c652d66756e6374696f6e616c2d646966666572656e742d73686170652d62726f776e2d3133343139343537362e6a7067, 19),
(20, 0x696d6167652e6a7067, 19),
(21, 0x6172742d63726166742d7372696c616e6b612e6a7067, 21),
(22, 0x646f776e6c6f61642e6a706567, 21),
(23, 0x696d616765202832292e6a7067, 21),
(24, 0x6172742d63726166742d7372696c616e6b612e6a7067, 20),
(25, 0x646f776e6c6f61642e6a706567, 20),
(26, 0x696d616765202832292e6a7067, 20),
(27, 0x31363237352e6a7067, 22),
(28, 0x646f776e6c6f6164202831292e6a706567, 22),
(29, 0x696d616765732e6a706567, 22),
(30, 0x646f776e6c6f61642e6a706567, 22);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomNo` int(11) NOT NULL,
  `view` varchar(50) NOT NULL,
  `typeID` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomNo`, `view`, `typeID`, `hotelId`) VALUES
(101, 'Ocean View', 57, 1502859376),
(102, 'City View', 57, 1502859376),
(103, 'Garden View', 57, 1502859376),
(201, 'Ocean View', 58, 1502859376),
(202, 'Garden View', 58, 1502859376),
(302, 'Pool View', 59, 1502859376),
(303, 'Garden View', 59, 1502859376);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `roomTypeId` int(11) NOT NULL,
  `typeName` varchar(100) NOT NULL,
  `hotelId` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `noOfPersons` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`roomTypeId`, `typeName`, `hotelId`, `description`, `price`, `noOfPersons`) VALUES
(57, 'Standard Room', 1502859376, ' It is a type of single room, which has a king-size bed, or as two beds — this room is decorated with two queen-size beds. A standard room includes all kinds of basic facilities such as a table, chair, desk, cupboard, dressing table, DVD player, tele', 100, 1),
(58, 'Moderate Room', 1502859376, ' The Moderate Room offers a stunning view and seamless comfort compared to the standard rooms. It can include the semi-double beds in the room. Each room of moderate room can be converted into a twin room with an extra bed. This room is designed to s', 200, 2),
(59, 'Delux Room', 1502859376, ' Large writing desk, flattering flowers, upgraded bathroom and beautiful bathrobes. This room maximum comes in 4- and 5-star categories. Their facilities also depend on the types of hotels. ', 300, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype_img`
--

CREATE TABLE `roomtype_img` (
  `id` int(11) NOT NULL,
  `roomTypeId` int(11) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomtype_img`
--

INSERT INTO `roomtype_img` (`id`, `roomTypeId`, `image`) VALUES
(131, 57, 0x3232333232353232382e6a7067),
(132, 57, 0x7468756d625f3333363839335f313538333537303838365f393237312e6a706567),
(133, 57, 0x3833353635363238372e6a706567),
(134, 58, 0x4c6f6467655f5375706572696f7220526f6f6d20313039302078203631302e6a7067),
(135, 58, 0x5369676e61747572652d4c6976696e672d312e6a7067),
(136, 58, 0x3833353635363238372e6a706567),
(137, 59, 0x4c6f6467655f5375706572696f7220526f6f6d20313039302078203631302e6a7067),
(138, 59, 0x484b5f53555045522d4c55585552592d53554954452d3732332d4152502e4c4b2d352d322e6a7067),
(139, 59, 0x4c6f6467655f5375706572696f7220526f6f6d20313039302078203631302e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `tourbooking`
--

CREATE TABLE `tourbooking` (
  `bookingID` int(11) NOT NULL,
  `bookingDateTime` datetime NOT NULL,
  `bookingStatus` varchar(20) NOT NULL,
  `guestName` varchar(100) NOT NULL,
  `guestPhone` int(10) NOT NULL,
  `guestEmail` varchar(100) NOT NULL,
  `arrivalDate` date NOT NULL,
  `departureDate` date NOT NULL,
  `noOfGuests` int(11) NOT NULL,
  `tourPkgID` int(11) NOT NULL,
  `touristID` int(11) NOT NULL,
  `tourGuideId` int(11) DEFAULT NULL,
  `preferredVehicleType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourbooking`
--

INSERT INTO `tourbooking` (`bookingID`, `bookingDateTime`, `bookingStatus`, `guestName`, `guestPhone`, `guestEmail`, `arrivalDate`, `departureDate`, `noOfGuests`, `tourPkgID`, `touristID`, `tourGuideId`, `preferredVehicleType`) VALUES
(236, '2023-05-15 15:05:49', 'Pending', 'Lithu', 76567654, 'lithurshikasri777@gmail.com', '2023-05-16', '2023-05-18', 2, 10, 27, 1, 'Van');

-- --------------------------------------------------------

--
-- Table structure for table `tourbooking_payment`
--

CREATE TABLE `tourbooking_payment` (
  `tourPaymentId` int(11) NOT NULL,
  `paymentDateTime` int(11) NOT NULL,
  `amount` double NOT NULL,
  `paymentStatus` varchar(100) NOT NULL,
  `tourBookingId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourbooking_payment`
--

INSERT INTO `tourbooking_payment` (`tourPaymentId`, `paymentDateTime`, `amount`, `paymentStatus`, `tourBookingId`) VALUES
(6, 2147483647, 500, 'Completed', 236);

-- --------------------------------------------------------

--
-- Table structure for table `tourguide`
--

CREATE TABLE `tourguide` (
  `tourguideID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `profileImg` longblob NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(50) NOT NULL,
  `languages` varchar(50) NOT NULL,
  `document` longblob NOT NULL,
  `vehicleNumber` varchar(11) NOT NULL,
  `vehicleType` varchar(50) NOT NULL,
  `passenger` int(11) NOT NULL,
  `unavailable_from` date DEFAULT NULL,
  `unavailable_to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourguide`
--

INSERT INTO `tourguide` (`tourguideID`, `name`, `email`, `phone`, `nic`, `profileImg`, `password`, `status`, `languages`, `document`, `vehicleNumber`, `vehicleType`, `passenger`, `unavailable_from`, `unavailable_to`) VALUES
(1, 'dfd', 'sewmi@gmail.com', 1231231232, '123123123123', 0x6d6f64656c2e504e47, '10b8e822d03fb4fd946188e852a4c3e2', 1, 'englisj', 0x64622e504e47, 'sdsd23', 'van', 2, '2023-05-16', '2023-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `tourist`
--

CREATE TABLE `tourist` (
  `userID` int(11) NOT NULL,
  `nic_passportNo` varchar(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `profileImg` longblob NOT NULL,
  `password` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourist`
--

INSERT INTO `tourist` (`userID`, `nic_passportNo`, `name`, `address`, `email`, `phone`, `profileImg`, `password`, `dob`, `country`) VALUES
(27, '2342345675', 'Lithu ', '21, Temple Road, Colombo 3 ', 'lithurshikasri777@gmail.com', 712657667, 0x6c696e6b6564696e2d70726f66696c652d706963747572652e6a7067, '51f281c8e7efd2b66c6754ce9131cfb2', '2023-05-09', 'India ');

-- --------------------------------------------------------

--
-- Table structure for table `tourpackage`
--

CREATE TABLE `tourpackage` (
  `packageID` int(11) NOT NULL,
  `packageName` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `adminID` int(11) NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `max_part` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourpackage`
--

INSERT INTO `tourpackage` (`packageID`, `packageName`, `description`, `price`, `status`, `adminID`, `no_of_days`, `max_part`) VALUES
(9, 'Over the costal', 'Over the costal', 500, 'Available', 1, 5, 15),
(10, 'Coastal Drive - Sri Lanka', 'abc', 250, 'Available', 1, 4, 8),
(11, 'abc', 'bh', 78, 'Unavailable', 1, 1, 7),
(12, 'Across the mountains', 'description', 350, 'Available', 1, 4, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tourpackage_img`
--

CREATE TABLE `tourpackage_img` (
  `id` int(11) NOT NULL,
  `tourpackageId` int(11) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourpackage_img`
--

INSERT INTO `tourpackage_img` (`id`, `tourpackageId`, `image`) VALUES
(31, 10, 0x646f776e6c6f6164202834292e6a7067),
(32, 10, 0x444a495f30353630206564742e6a7067),
(33, 9, 0x576861747341707020496d61676520323032332d30352d31342061742031382e33362e30392e6a706567);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `craftorder`
--
ALTER TABLE `craftorder`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `touristid5` (`touristID`);

--
-- Indexes for table `craftorder_items`
--
ALTER TABLE `craftorder_items`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `craftorder_payment`
--
ALTER TABLE `craftorder_payment`
  ADD PRIMARY KEY (`orderPaymentId`),
  ADD KEY `ordeID` (`orderId`);

--
-- Indexes for table `entrepreneur`
--
ALTER TABLE `entrepreneur`
  ADD PRIMARY KEY (`entID`);

--
-- Indexes for table `guest_reservation`
--
ALTER TABLE `guest_reservation`
  ADD PRIMARY KEY (`reservationID`),
  ADD KEY `fk_typeID` (`roomID`),
  ADD KEY `touristID` (`touristID`) USING BTREE,
  ADD KEY `hotelId` (`hotelId`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indexes for table `hotel_payment`
--
ALTER TABLE `hotel_payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `reservationID` (`reservationID`),
  ADD KEY `hotelID` (`hotelID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msgId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `entID` (`entID`),
  ADD KEY `category` (`categoryId`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_categoryId`),
  ADD KEY `entid` (`entID`);

--
-- Indexes for table `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomNo`),
  ADD KEY `fk_typeID` (`typeID`),
  ADD KEY `hotelId` (`hotelId`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`roomTypeId`),
  ADD KEY `fk_hotelId` (`hotelId`);

--
-- Indexes for table `roomtype_img`
--
ALTER TABLE `roomtype_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_roomtype` (`roomTypeId`);

--
-- Indexes for table `tourbooking`
--
ALTER TABLE `tourbooking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `packageID` (`tourPkgID`),
  ADD KEY `touristID` (`touristID`),
  ADD KEY `guideid` (`tourGuideId`);

--
-- Indexes for table `tourbooking_payment`
--
ALTER TABLE `tourbooking_payment`
  ADD PRIMARY KEY (`tourPaymentId`),
  ADD KEY `tourBookingId` (`tourBookingId`);

--
-- Indexes for table `tourguide`
--
ALTER TABLE `tourguide`
  ADD PRIMARY KEY (`tourguideID`);

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
-- Indexes for table `tourpackage_img`
--
ALTER TABLE `tourpackage_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tour` (`tourpackageId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `craftorder`
--
ALTER TABLE `craftorder`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;

--
-- AUTO_INCREMENT for table `craftorder_items`
--
ALTER TABLE `craftorder_items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `craftorder_payment`
--
ALTER TABLE `craftorder_payment`
  MODIFY `orderPaymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `entrepreneur`
--
ALTER TABLE `entrepreneur`
  MODIFY `entID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `guest_reservation`
--
ALTER TABLE `guest_reservation`
  MODIFY `reservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54368;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1502859377;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_img`
--
ALTER TABLE `product_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `roomTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `roomtype_img`
--
ALTER TABLE `roomtype_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `tourbooking`
--
ALTER TABLE `tourbooking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `tourbooking_payment`
--
ALTER TABLE `tourbooking_payment`
  MODIFY `tourPaymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tourist`
--
ALTER TABLE `tourist`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tourpackage`
--
ALTER TABLE `tourpackage`
  MODIFY `packageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tourpackage_img`
--
ALTER TABLE `tourpackage_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `craftorder`
--
ALTER TABLE `craftorder`
  ADD CONSTRAINT `touristid5` FOREIGN KEY (`touristID`) REFERENCES `tourist` (`userID`);

--
-- Constraints for table `craftorder_items`
--
ALTER TABLE `craftorder_items`
  ADD CONSTRAINT `orderId` FOREIGN KEY (`orderId`) REFERENCES `craftorder` (`orderID`),
  ADD CONSTRAINT `productId` FOREIGN KEY (`productId`) REFERENCES `product` (`productID`);

--
-- Constraints for table `craftorder_payment`
--
ALTER TABLE `craftorder_payment`
  ADD CONSTRAINT `ordeID` FOREIGN KEY (`orderId`) REFERENCES `craftorder` (`orderID`);

--
-- Constraints for table `guest_reservation`
--
ALTER TABLE `guest_reservation`
  ADD CONSTRAINT `fk_room` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomNo`),
  ADD CONSTRAINT `guest_reservation_ibfk_1` FOREIGN KEY (`hotelId`) REFERENCES `hotel` (`hotelID`),
  ADD CONSTRAINT `touristID2` FOREIGN KEY (`touristID`) REFERENCES `tourist` (`userID`);

--
-- Constraints for table `hotel_payment`
--
ALTER TABLE `hotel_payment`
  ADD CONSTRAINT `hotelID` FOREIGN KEY (`hotelID`) REFERENCES `hotel` (`hotelID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservationID` FOREIGN KEY (`reservationID`) REFERENCES `guest_reservation` (`reservationID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category` FOREIGN KEY (`categoryId`) REFERENCES `product_category` (`product_categoryId`),
  ADD CONSTRAINT `entid` FOREIGN KEY (`entID`) REFERENCES `entrepreneur` (`entID`);

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `ent_fk` FOREIGN KEY (`entID`) REFERENCES `entrepreneur` (`entID`);

--
-- Constraints for table `product_img`
--
ALTER TABLE `product_img`
  ADD CONSTRAINT `product` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_typeId` FOREIGN KEY (`typeID`) REFERENCES `roomtype` (`roomTypeId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`hotelId`) REFERENCES `hotel` (`hotelID`);

--
-- Constraints for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD CONSTRAINT `fk_hotelId` FOREIGN KEY (`hotelId`) REFERENCES `hotel` (`hotelID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roomtype_img`
--
ALTER TABLE `roomtype_img`
  ADD CONSTRAINT `fk_roomtype` FOREIGN KEY (`roomTypeId`) REFERENCES `roomtype` (`roomTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tourbooking`
--
ALTER TABLE `tourbooking`
  ADD CONSTRAINT `guideid` FOREIGN KEY (`tourGuideId`) REFERENCES `tourguide` (`tourguideID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `touristID` FOREIGN KEY (`touristID`) REFERENCES `tourist` (`userID`),
  ADD CONSTRAINT `tourpackageID` FOREIGN KEY (`tourPkgID`) REFERENCES `tourpackage` (`packageID`) ON DELETE CASCADE;

--
-- Constraints for table `tourbooking_payment`
--
ALTER TABLE `tourbooking_payment`
  ADD CONSTRAINT `tourbooking` FOREIGN KEY (`tourBookingId`) REFERENCES `tourbooking` (`bookingID`);

--
-- Constraints for table `tourpackage`
--
ALTER TABLE `tourpackage`
  ADD CONSTRAINT `adminID1` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`);

--
-- Constraints for table `tourpackage_img`
--
ALTER TABLE `tourpackage_img`
  ADD CONSTRAINT `fk_tour` FOREIGN KEY (`tourpackageId`) REFERENCES `tourpackage` (`packageID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
