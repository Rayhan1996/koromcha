-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 06:45 PM
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
  `lastLogin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminId`, `userId`, `profilePicture`, `profileTitle`, `profileDescription`, `lastLogin`) VALUES
(1, 1, 'rabbe.jpg', 'senior developer', 'highly skilled in php', '2021-02-15'),
(2, 2, 'rajibul.jpg', 'senior developer', 'highly skilled in java', '2021-02-14'),
(3, 5, 'ashik.jpg', 'junior developer', 'highly skilled in seo', '2021-02-11');

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
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `buyerId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `profilePicture` varchar(255) NOT NULL,
  `profileTitle` varchar(255) NOT NULL,
  `profileDescriptions` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `portfolioLink` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `lastLogin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`buyerId`, `userId`, `profilePicture`, `profileTitle`, `profileDescriptions`, `address`, `portfolioLink`, `rate`, `skill`, `lastLogin`) VALUES
(36, 1, 'rgrt', 'dfgfd', 'dfgfd', '', '', 0, '', '0000-00-00'),
(37, 5, '', 'ee', 'dafd', 'ere', 'dsfdf', 4, 'dsfd', '0000-00-00');

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
  `jobTiming` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobId`, `jobCategory`, `jobDeadline`, `jobAddress`, `jobSalary`, `jobExperience`, `jobTitle`, `jobDescription`, `jobApplyProcess`, `jobRequirements`, `jobPostedBy`, `jobPostedOn`, `jobTiming`) VALUES
(1, 'Web Developers', '28-Oct-2021', 'A/F west jalkuri, Narayangonj.', 100, 3, 'Junior Web developer', 'This Is job description. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks. ', 'This Is Job Apply. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.', 'This Is job requirements. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.', 30, ' 12 janu', 'Part Time'),
(2, 'Marketing', '29-Oct-2021', '17/3 west kawran bazar, Dhaka-1215', 50, 2, 'Digital Marketing ', 'job Description 2. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.\r\n', 'Job apply process 2. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.\r\n', 'job requirements 2. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.\r\n', 32, '13 janu', 'Full Time'),
(3, 'Marketing3', '30-Oct-2021', 'Job Address3. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.\r\n', 25, 1, 'Job Title3.', 'Job discriptions3. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.\r\n', 'Job Apply process3. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.\r\n', 'Job Requirments3. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.\r\n', 33, '14 janu', 'Part Time');

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
  `profileDescriptions` varchar(255) NOT NULL,
  `lastLogin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`sellerId`, `userId`, `profilePicture`, `profileTitle`, `profileDescriptions`, `lastLogin`) VALUES
(1, 1, 'manik.jpg', 'sales Executive', 'active and punctual', '2021-02-09'),
(2, 2, 'rajia.jpg', 'sales Executive', 'active and punctual', '2021-02-17'),
(3, 3, 'rafia.jpg', 'sales Executive', 'active and punctual', '2021-02-18');

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
(2, 's', 's', 'shahin@gmail.com', '$2y$10$apRV4TvM9cAgGdAn/F2O..N5VHcYYvLmVc9q1neKS3NXgX2e1fym2', 2),
(3, 's', 's', 'ahnabshahin@gmail.com', '$2y$10$po/Hnzp1EtAAWQhvXqBf3uTgiUPdeShiZ730JzDAQ3OuoUchkrCQO', 1),
(5, 'shahin', 'alam', 'shahin12@gmail.com', '$2y$10$kRaONlUwmDzQii2/u4gEVegYbznbg0p9zv3J8wkjd4ghuuh2n6BBe', 1);

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
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admintypes`
--
ALTER TABLE `admintypes`
  MODIFY `typeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `buyerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `jobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `sellerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `userTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
