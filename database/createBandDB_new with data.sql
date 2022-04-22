-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2022 at 12:06 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Band_Database`
--
DROP DATABASE IF EXISTS `Band_Database`;
CREATE DATABASE IF NOT EXISTS `Band_Database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Band_Database`;

-- --------------------------------------------------------

--
-- Table structure for table `CARD_T`
--

CREATE TABLE `CARD_T` (
  `idCard` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `imageUrl` varchar(1024) DEFAULT NULL,
  `heading` varchar(75) DEFAULT NULL,
  `subHeading` varchar(75) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `btnStyle` varchar(45) DEFAULT NULL,
  `btnURL` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `CONCERT_T`
--

CREATE TABLE `CONCERT_T` (
  `idConcert` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `location` varchar(75) DEFAULT NULL,
  `schedule` datetime DEFAULT NULL,
  `capacity` int(10) UNSIGNED ZEROFILL NOT NULL,
  `imageUrl` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CONCERT_T`
--

INSERT INTO `CONCERT_T` (`idConcert`, `name`, `description`, `location`, `schedule`, `capacity`, `imageUrl`) VALUES
(1, 'Concert for the Children', 'think of the children!', 'Dhaka, Bangladesh', '2022-06-02 18:00:00', 0000010000, 'images/concert/concert-1.jpg'),
(2, 'Album 3 Tour - India 1', 'south asia tour for album 3', 'Mumbai, India', '2022-05-20 17:00:00', 0000050000, 'images/concert/concert-2.jpg'),
(3, 'Album 3 Tour - India 2', 'south asia tour for album 3', 'New Delhi, India', '2022-05-25 17:00:00', 0000040000, 'images/concert/concert-3.jpeg'),
(4, 'Album 3 Tour - Bangladesh 2', 'south asia tour for album 3', 'Dhaka, Bangladesh', '2022-05-12 17:00:00', 0000040000, 'images/concert/concert-4.jpg'),
(5, 'Album 3 Tour - Bangladesh 1', 'south asia tour for album 3', 'Chittagong, Bangladesh', '2022-05-02 17:00:00', 0000030000, 'images/concert/concert-5.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `MERCH_T`
--

CREATE TABLE `MERCH_T` (
  `idMerch` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `imageUrl` varchar(1024) DEFAULT NULL,
  `category` enum('other','tshirt','jacket','hat','sweatshirt','wristband','album') NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `stock` int(10) UNSIGNED ZEROFILL NOT NULL,
  `discount` decimal(2,0) UNSIGNED ZEROFILL NOT NULL,
  `isAvailable` tinyint(1) UNSIGNED ZEROFILL NOT NULL,
  `isFeatured` tinyint(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `MERCH_T`
--

INSERT INTO `MERCH_T` (`idMerch`, `name`, `description`, `imageUrl`, `category`, `price`, `stock`, `discount`, `isAvailable`, `isFeatured`) VALUES
(1, 'T Shirt 1', 'rock our tshirt!', 'images/merch/tshirt-1.png', 'tshirt', '500.00', 0000000050, '00', 1, 1),
(2, 'T Shirt 2', 'rock our tshirt!', 'images/merch/tshirt-2.jpg', 'tshirt', '500.00', 0000000045, '00', 1, 0),
(3, 'T Shirt 3', 'rock our tshirt!', 'images/merch/tshirt-3.webp', 'tshirt', '500.00', 0000000030, '00', 1, 0),
(4, 'T Shirt 4', 'rock our tshirt!', 'images/merch/tshirt-4.webp', 'tshirt', '500.00', 0000000024, '00', 1, 0),
(5, 'Sweatshirt 1', 'rock our sweatshirt!', 'images/merch/sweatshirt-1.webp', 'sweatshirt', '700.00', 0000000020, '00', 1, 1),
(6, 'Sweatshirt 2', 'rock our sweatshirt!', 'images/merch/sweatshirt-2.jpg', 'sweatshirt', '700.00', 0000000010, '00', 1, 0),
(7, 'Sweatshirt 3', 'rock our sweatshirt!', 'images/merch/sweatshirt-3.webp', 'sweatshirt', '700.00', 0000000005, '00', 1, 1),
(8, 'Hat 1', 'rock our hat!', 'images/merch/hat-1.jpg', 'hat', '250.00', 0000000050, '20', 0, 0),
(9, 'Hat 2', 'rock our hat!', 'images/merch/hat-2.webp', 'hat', '250.00', 0000000050, '20', 0, 0),
(10, 'Hat 3', 'rock our hat!', 'images/merch/hat-3.webp', 'hat', '250.00', 0000000050, '20', 0, 1),
(11, 'Hat 4', 'rock our hat!', 'images/merch/hat-4.webp', 'hat', '250.00', 0000000050, '20', 0, 0),
(12, 'Jacket 1', 'rock our jacket!', 'images/merch/jacket-1.jpg', 'jacket', '900.00', 0000000023, '00', 1, 0),
(13, 'Wristband 1', 'rock our wristband!', 'images/merch/wristband-1.jpg', 'wristband', '100.00', 0000000100, '20', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `MESSAGES_T`
--

CREATE TABLE `MESSAGES_T` (
  `idMessages` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(2048) NOT NULL,
  `topic` enum('BOOKING','QUERY','BUSINESS','MERCH','TICKET','OTHER') NOT NULL,
  `receivedTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `MESSAGES_T`
--

INSERT INTO `MESSAGES_T` (`idMessages`, `idUser`, `fname`, `lname`, `email`, `subject`, `message`, `topic`, `receivedTime`) VALUES
(1, 3, '', '', 'myemail@mail.com', '', 'PLES PLAY AT BDAY', 'BOOKING', '0000-00-00 00:00:00'),
(2, 3, '', '', 'eeee@mail.com', '', 'AAAAAAAA', 'MERCH', '2022-04-22 16:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `ORDER_ITEM_T`
--

CREATE TABLE `ORDER_ITEM_T` (
  `idMerch` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `quantity` tinyint(2) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ORDER_T`
--

CREATE TABLE `ORDER_T` (
  `idOrder` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `orderTime` datetime NOT NULL,
  `paidStatus` enum('PAID','UNPAID','REFUNDED','REFUNDING') NOT NULL,
  `paymentMethod` enum('CASH','CARD','MOBILE') NOT NULL,
  `deliveryStatus` enum('PROCESSING','ON-TRANSIT','DELIVERED') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `SLIDESHOW_CARD_T`
--

CREATE TABLE `SLIDESHOW_CARD_T` (
  `idSlideshow` int(11) NOT NULL,
  `idCard` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `SLIDESHOW_T`
--

CREATE TABLE `SLIDESHOW_T` (
  `idSlideshow` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `TICKET_T`
--

CREATE TABLE `TICKET_T` (
  `idTicket` int(11) NOT NULL,
  `idConcert` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `comment` varchar(100) DEFAULT NULL,
  `buyDate` datetime NOT NULL,
  `idTicketTier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `TICKET_T`
--

INSERT INTO `TICKET_T` (`idTicket`, `idConcert`, `idUser`, `comment`, `buyDate`, `idTicketTier`) VALUES
(1, 5, 3, NULL, '2022-04-22 11:12:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `TICKET_TIER_T`
--

CREATE TABLE `TICKET_TIER_T` (
  `idTicketTier` int(11) NOT NULL,
  `tierName` varchar(45) NOT NULL,
  `tierDescription` varchar(150) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `TICKET_TIER_T`
--

INSERT INTO `TICKET_TIER_T` (`idTicketTier`, `tierName`, `tierDescription`, `price`) VALUES
(1, 'DELUXE', 'MEET YOUR FAVE ROCKSTAR', '1000.00'),
(2, 'STANDARD', 'WATCH CONCERT FROM THE BACK', '100.00'),
(3, 'ECONOMY', 'EVEN WORSE', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `USER_T`
--

CREATE TABLE `USER_T` (
  `idUser` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `zipCode` varchar(45) DEFAULT NULL,
  `country` varchar(45) NOT NULL,
  `subscribedToNewsletter` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `joined` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `USER_T`
--

INSERT INTO `USER_T` (`idUser`, `email`, `password`, `fname`, `lname`, `phone`, `address`, `zipCode`, `country`, `subscribedToNewsletter`, `joined`) VALUES
(3, 'fahim@gmail.com', '$2y$10$4zdNNDCsEGq.F7VScSy.kupnmmGi3z9KKB9CqiLa58WRp3bmMQkOy', 'Fahim', 'Ahmed', '123456789', '', '', 'Bangladesh', 000, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CARD_T`
--
ALTER TABLE `CARD_T`
  ADD PRIMARY KEY (`idCard`);

--
-- Indexes for table `CONCERT_T`
--
ALTER TABLE `CONCERT_T`
  ADD PRIMARY KEY (`idConcert`);

--
-- Indexes for table `MERCH_T`
--
ALTER TABLE `MERCH_T`
  ADD PRIMARY KEY (`idMerch`);

--
-- Indexes for table `MESSAGES_T`
--
ALTER TABLE `MESSAGES_T`
  ADD PRIMARY KEY (`idMessages`),
  ADD KEY `fk_MESSAGES_T_1_idx` (`idUser`);

--
-- Indexes for table `ORDER_ITEM_T`
--
ALTER TABLE `ORDER_ITEM_T`
  ADD PRIMARY KEY (`idMerch`,`idOrder`),
  ADD KEY `fk_PURCHASE_T_1_idx` (`idMerch`),
  ADD KEY `fk_PURCHASE_T_2_idx` (`idOrder`);

--
-- Indexes for table `ORDER_T`
--
ALTER TABLE `ORDER_T`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `fk_ORDER_T_1_idx` (`idUser`);

--
-- Indexes for table `SLIDESHOW_CARD_T`
--
ALTER TABLE `SLIDESHOW_CARD_T`
  ADD PRIMARY KEY (`idSlideshow`,`idCard`),
  ADD KEY `fk_SLIDESHOW_CARD_T_1_idx` (`idCard`);

--
-- Indexes for table `SLIDESHOW_T`
--
ALTER TABLE `SLIDESHOW_T`
  ADD PRIMARY KEY (`idSlideshow`);

--
-- Indexes for table `TICKET_T`
--
ALTER TABLE `TICKET_T`
  ADD PRIMARY KEY (`idTicket`),
  ADD KEY `fk_TICKET_T_1_idx` (`idConcert`),
  ADD KEY `fk_TICKET_T_2_idx` (`idUser`),
  ADD KEY `fk_TICKET_T_3_idx` (`idTicketTier`);

--
-- Indexes for table `TICKET_TIER_T`
--
ALTER TABLE `TICKET_TIER_T`
  ADD PRIMARY KEY (`idTicketTier`);

--
-- Indexes for table `USER_T`
--
ALTER TABLE `USER_T`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CARD_T`
--
ALTER TABLE `CARD_T`
  MODIFY `idCard` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `CONCERT_T`
--
ALTER TABLE `CONCERT_T`
  MODIFY `idConcert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `MERCH_T`
--
ALTER TABLE `MERCH_T`
  MODIFY `idMerch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `MESSAGES_T`
--
ALTER TABLE `MESSAGES_T`
  MODIFY `idMessages` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ORDER_T`
--
ALTER TABLE `ORDER_T`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `SLIDESHOW_T`
--
ALTER TABLE `SLIDESHOW_T`
  MODIFY `idSlideshow` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `TICKET_T`
--
ALTER TABLE `TICKET_T`
  MODIFY `idTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `TICKET_TIER_T`
--
ALTER TABLE `TICKET_TIER_T`
  MODIFY `idTicketTier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `USER_T`
--
ALTER TABLE `USER_T`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `MESSAGES_T`
--
ALTER TABLE `MESSAGES_T`
  ADD CONSTRAINT `fk_MESSAGES_T_1` FOREIGN KEY (`idUser`) REFERENCES `USER_T` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ORDER_ITEM_T`
--
ALTER TABLE `ORDER_ITEM_T`
  ADD CONSTRAINT `fk_PURCHASE_T_1` FOREIGN KEY (`idMerch`) REFERENCES `MERCH_T` (`idMerch`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PURCHASE_T_2` FOREIGN KEY (`idOrder`) REFERENCES `ORDER_T` (`idOrder`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ORDER_T`
--
ALTER TABLE `ORDER_T`
  ADD CONSTRAINT `fk_ORDER_T_1` FOREIGN KEY (`idUser`) REFERENCES `USER_T` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `SLIDESHOW_CARD_T`
--
ALTER TABLE `SLIDESHOW_CARD_T`
  ADD CONSTRAINT `fk_SLIDESHOW_CARD_T_1` FOREIGN KEY (`idCard`) REFERENCES `CARD_T` (`idCard`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SLIDESHOW_CARD_T_2` FOREIGN KEY (`idSlideshow`) REFERENCES `SLIDESHOW_T` (`idSlideshow`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `TICKET_T`
--
ALTER TABLE `TICKET_T`
  ADD CONSTRAINT `fk_TICKET_T_1` FOREIGN KEY (`idConcert`) REFERENCES `CONCERT_T` (`idConcert`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TICKET_T_2` FOREIGN KEY (`idUser`) REFERENCES `USER_T` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TICKET_T_3` FOREIGN KEY (`idTicketTier`) REFERENCES `TICKET_TIER_T` (`idTicketTier`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
