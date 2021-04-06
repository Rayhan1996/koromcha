-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 07:44 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koromcha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `profilePicture` varchar(255) NOT NULL,
  `profileTitle` varchar(255) NOT NULL,
  `profileDescription` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `portfolioLink` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `lastLogin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminId`, `userId`, `profilePicture`, `profileTitle`, `profileDescription`, `address`, `portfolioLink`, `rate`, `skill`, `lastLogin`) VALUES
(5, 8, '', 'ee', '', 'ere', '', 0, '', '0000-00-00'),
(6, 11, '', 'web', 'dfd', 'et', '', 0, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `admintypes`
--

CREATE TABLE `admintypes` (
  `typeId` int(11) NOT NULL,
  `adminId` int(11) NOT NULL,
  `adminRoleName` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admintypes`
--

INSERT INTO `admintypes` (`typeId`, `adminId`, `adminRoleName`) VALUES
(1, 1, 'Main admin'),
(2, 2, 'pro admin'),
(3, 3, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `applyId` int(11) NOT NULL,
  `applyJobId` int(11) NOT NULL,
  `applyBy` int(11) NOT NULL,
  `applyConfirm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`applyId`, `applyJobId`, `applyBy`, `applyConfirm`) VALUES
(3, 8, 10, 0),
(4, 8, 9, 0),
(5, 8, 15, 0),
(6, 9, 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `buyerId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `profilePicture` varchar(255) NOT NULL,
  `profileTitle` varchar(255) NOT NULL,
  `profileDescription` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `portfolioLink` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `lastLogin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`buyerId`, `userId`, `profilePicture`, `profileTitle`, `profileDescription`, `address`, `portfolioLink`, `rate`, `skill`, `lastLogin`) VALUES
(38, 9, '', 'ee', '', 'ere', '', 0, '', '0000-00-00'),
(39, 12, '', 'fgseg', 'dg', 'fsgsdfg', 'aefged', 0, '', '0000-00-00'),
(40, 13, '', 'web01', 'sfdvsd', 'sdfsd', 'http://localhost/koromcha/profile-edit.php', 78, 'sfgsf', '0000-00-00'),
(41, 14, '', 'dhd', 'gfhgf', 'fghgf', 'fgfhgf', 54, 'gngf', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `discountId` int(11) NOT NULL,
  `discountBy` varchar(55) NOT NULL,
  `discountAmount` int(55) NOT NULL,
  `offerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`discountId`, `discountBy`, `discountAmount`, `offerId`) VALUES
(1, 'Rajib', 120, 1),
(2, 'parvin', 150, 2),
(3, 'khatun', 500, 3);

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `guestId` int(11) NOT NULL,
  `guestRegion` varchar(55) NOT NULL,
  `guestIp` varchar(55) NOT NULL,
  `visitedAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`guestId`, `guestRegion`, `guestIp`, `visitedAt`) VALUES
(1, 'Bangladesh', '172.168.01.23', '2021-02-17'),
(2, 'India', '172.168.01.24', '2021-02-17'),
(3, 'USA', '172.168.01.27', '2021-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobId` int(11) NOT NULL,
  `jobCategory` varchar(255) NOT NULL,
  `jobDeadline` varchar(255) NOT NULL,
  `jobAddress` varchar(255) NOT NULL,
  `jobSalary` int(11) NOT NULL,
  `jobExperience` int(11) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `jobDescription` varchar(255) NOT NULL,
  `jobApplyProcess` varchar(255) NOT NULL,
  `jobRequirements` varchar(255) NOT NULL,
  `jobPostedBy` int(11) NOT NULL,
  `jobPostedOn` varchar(11) NOT NULL,
  `jobBanner` varchar(255) NOT NULL,
  `jobRunning` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobId`, `jobCategory`, `jobDeadline`, `jobAddress`, `jobSalary`, `jobExperience`, `jobTitle`, `jobDescription`, `jobApplyProcess`, `jobRequirements`, `jobPostedBy`, `jobPostedOn`, `jobBanner`, `jobRunning`) VALUES
(1, 'Web Developers', '28-Oct-2021', 'A/F west jalkuri, Narayangonj.', 100, 3, 'Junior Web developer', 'This Is job description. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks. ', 'This Is Job Apply. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.', 'This Is job requirements. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.', 30, ' 12 janu', '', 0),
(2, 'Marketing', '29-Oct-2021', '17/3 west kawran bazar, Dhaka-1215', 50, 2, 'Digital Marketing ', 'job Description 2. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.\r\n', 'Job apply process 2. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.\r\n', 'job requirements 2. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.\r\n', 32, '13 janu', '', 0),
(3, 'Marketing3', '30-Oct-2021', 'Job Address3. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.\r\n', 25, 1, 'Job Title3.', 'Job discriptions3. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.\r\n', 'Job Apply process3. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.\r\n', 'Job Requirments3. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.\r\n', 14, '14 janu', '', 0),
(4, 'rg', 'ere', 're', 4, 534, 'tfr', 'dfrg', 'dfgd', 'dfgdf', 10, '2021-03-20', '20210104', 0),
(5, 'rg', 'ere', 're', 4, 534, 'tfr', 'dfrg', 'dfgd', 'dfgdf', 10, '2021-03-20', '20210104', 0),
(6, 'dfgds', '454', 'dfd', 0, 0, '', '', '', '', 12, '2021-03-20', '0', 0),
(7, 'euiyhri', 'fdg', 'sfgfg', 356, 34, 'fgf', 'fgg', 'fgd', 'fggffd', 13, '2021-03-23', '0', 0),
(8, 'new job', 'thgt', 'gfhfg', 5, 45, 'bgg', 'gbgf', 'fgh', 'cbg', 14, '2021-03-23', '0', 1),
(9, 'yyy', 'tuy', '', 0, 0, '', '', '', '', 14, '2021-03-23', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offerId` int(11) NOT NULL,
  `buyerId` int(11) NOT NULL,
  `acceptedBy` varchar(55) NOT NULL,
  `offerbanner` varchar(55) NOT NULL,
  `offerTitle` varchar(255) NOT NULL,
  `offerDiscriotion` varchar(255) NOT NULL,
  `offerPrice` int(11) NOT NULL,
  `offerStatus` varchar(55) NOT NULL,
  `offerPostedOn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offerId`, `buyerId`, `acceptedBy`, `offerbanner`, `offerTitle`, `offerDiscriotion`, `offerPrice`, `offerStatus`, `offerPostedOn`) VALUES
(1, 1, 'rajia parvin', 'banner1.jpg', 'Offer1212', 'condition applied', 200, 'active', '2021-03-03'),
(2, 2, 'rabea parvin', 'banner2.jpg', 'Offer1212', 'condition applied', 250, 'dactive', '2021-01-12'),
(3, 3, 'ashik', 'banner13.jpg', 'Offer1212', 'condition applied', 120, 'active', '2021-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentId` int(11) NOT NULL,
  `offerId` int(11) NOT NULL,
  `paymentTo` varchar(55) NOT NULL,
  `paymentsFrom` varchar(55) NOT NULL,
  `paymentAmount` int(11) NOT NULL,
  `paymentOn` date NOT NULL,
  `paymentBy` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentId`, `offerId`, `paymentTo`, `paymentsFrom`, `paymentAmount`, `paymentOn`, `paymentBy`) VALUES
(1, 1, 'ashik', 'rayhan', 400, '2021-02-18', 'Bkash'),
(2, 2, 'roni', 'joni', 453, '2021-02-09', 'DBBL'),
(3, 3, 'molla', 'sourav', 353, '2021-02-18', 'Bkash');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `sellerId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `profilePicture` varchar(255) NOT NULL,
  `profileTitle` varchar(255) NOT NULL,
  `profileDescription` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `portfolioLink` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `lastLogin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`sellerId`, `userId`, `profilePicture`, `profileTitle`, `profileDescription`, `address`, `portfolioLink`, `rate`, `skill`, `lastLogin`) VALUES
(4, 10, '', 'ee', '', '', '', 0, '', '0000-00-00'),
(5, 15, '', 'ee', '', 'rte', 'ret', 0, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstname`, `lastname`, `email`, `password`, `userType`) VALUES
(8, 'Shahin', 'Alam', 'shahin@gmail.com', '$2y$10$rFhnO2EP1e.Ujcx7DO5BPeuTYbdNpmNrkpOB0ivNwIuiFK4uDc7Li', 1),
(9, 'bonga', 'bonga', 'bonga@gmail.com', '$2y$10$yghSypTvjLRTAouintXqJO9TdFnFGk0RBTw./z9nMETuAJSqqbNUu', 3),
(10, 'seller', 'seller', 'seller@gmail.com', '$2y$10$Mg/bJbCtr.k3d2StGuhgV.7Vh6VvaqQLsk0aIAVJ/nn1YUkNqJpXq', 3),
(11, 'orun ', 'sunny', 'orun@gmail.com', '$2y$10$Qy2PVnMwP8wHxHDO0Uq.3.t1BCCWCrZkLB4JA4YteK3xTXPB9AK7e', 1),
(12, 'ftrt', 'rtrt', 'sunny@gmail.com', '$2y$10$GeaAspKyFplWdFEOs3XPPe5Ooj68vyyrF5CNN4G1jKAom8pPKK2/2', 2),
(13, 'joybangla', 'kl', 'joybangla@gmail.com', '$2y$10$hIrwu1bb6DLaGKpJnb3FXum7ngLrf3DoqADfsf0hmYb5gfw4CeAWK', 2),
(14, 'buyer', 'buyer', 'buyer@gmail.com', '$2y$10$avZYO9f.O28YL1w3Xi441./F6JeQb.V6LrE6rSAPVhCKIX2uH6V4i', 2),
(15, 'seller1', 'seller1', 'seller1@gmail.com', '$2y$10$1Ah5vdFmAZjU73MtV/zC2uJB/GTxYSxS/h6C60jhL.mZlr4aNie2O', 3);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `userTypeId` int(11) NOT NULL,
  `userTypeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`userTypeId`, `userTypeName`) VALUES
(1, 'Admin'),
(2, 'Buyer'),
(3, 'Seller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `admintypes`
--
ALTER TABLE `admintypes`
  ADD PRIMARY KEY (`typeId`);

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`applyId`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`buyerId`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`discountId`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`guestId`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobId`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offerId`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`sellerId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`) USING BTREE;

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`userTypeId`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admintypes`
--
ALTER TABLE `admintypes`
  MODIFY `typeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `applyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `buyerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `discountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `guestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `sellerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `userTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
