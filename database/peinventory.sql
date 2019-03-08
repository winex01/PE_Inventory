-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 08, 2019 at 10:27 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peinventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`id`, `description`, `created_at`) VALUES
(1, 'New', '2019-03-08 16:49:59'),
(2, 'Used', '2019-03-08 16:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `equipmentid` int(12) NOT NULL,
  `equipmentname` varchar(255) NOT NULL,
  `quantity` int(11) UNSIGNED NOT NULL,
  `brand` varchar(255) NOT NULL,
  `datearrived` date NOT NULL,
  `dateadded` date NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `condition_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`equipmentid`, `equipmentname`, `quantity`, `brand`, `datearrived`, `dateadded`, `added_by`, `condition_id`) VALUES
(15, 'Basketball', 13, 'Nikez', '2019-02-20', '2019-02-24', 'admin', 1),
(16, 'Volleyball Net', 14, 'Nike', '2019-02-20', '2019-02-24', 'admin', 2),
(19, 'Softball', 2, 'Puma', '2019-03-08', '2019-03-08', 'admin', 1),
(21, 'Badminton Racket', 2, 'Nikkon', '2019-03-08', '2019-03-08', 'admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportid` int(20) NOT NULL,
  `studentid` int(20) NOT NULL,
  `studentname` varchar(255) NOT NULL,
  `studentcourse` varchar(255) NOT NULL,
  `lostitem` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `datelost` date NOT NULL,
  `dateadded` date NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportid`, `studentid`, `studentname`, `studentcourse`, `lostitem`, `reason`, `datelost`, `dateadded`, `quantity`, `brand`) VALUES
(9, 100, 'Louel', 'BSIT-4', 'Basketball	', 'ga tanga', '2019-03-30', '2019-03-05', 1, 'Nikez'),
(11, 15, 'Louelism', 'BSIT-4', 'Basketball	', 'ga tama', '2019-03-29', '2019-03-05', 1, 'Nikez'),
(12, 15, 'Louelism', 'BSIT-4', 'Basketball	', 'ga tama', '2019-03-29', '2019-03-05', 1, 'Nikez'),
(13, 1312123, 'john dela cruz', 'BS-MARE', 'Again', 'testing reason', '2019-03-08', '2019-03-08', 5, 'Puma'),
(14, 13131, 'john', 'BSIT', 'Volleyball Net', 'test test', '2019-03-08', '2019-03-08', 1, 'Nike'),
(15, 131212, 'stuydent 101', 'BSMAR', 'Softball', 'test again', '2019-03-08', '2019-03-08', 1, 'Puma'),
(16, 1313232, 'watdaaa', 'BSBS', 'Basketball', 'test ad test', '2019-03-08', '2019-03-08', 1, 'Nikez');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `added_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `added_by`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', ' --', '--'),
(4, 'janedough', 'f5bb0c8de146c67b44babbf4e6584cc0', 'jane1', 'dough', 'admin'),
(5, 'another123', '100dd7b1b68ad8bd57e5b2212988fe13', 'anothers', 'one123123', 'admin'),
(7, 'onemoretime13', 'd334799a492274f20f48c141ebfd850d', 'onemore', 'time', 'admin'),
(8, 'onceonethre', '686ae905724adb82bc9ecf210f9c309c', 'niceone', 'two', 'admin'),
(9, 'firstnamelast', 'f3e839cd4f22dfd9cf5ea050c6490baa', 'firstname', 'lastn', 'admin'),
(11, '123123213', '2d53a981069f53c9483b2c14ac738a16', 'thelastthelist', 'one two three', 'admin'),
(12, 'onethin', 'd64e8f97204e2bd0f9df4d5459ac21d2', 'onething', 'thingmoe', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`equipmentid`),
  ADD KEY `condition_id` (`condition_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `equipmentid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipments`
--
ALTER TABLE `equipments`
  ADD CONSTRAINT `equipments_ibfk_1` FOREIGN KEY (`condition_id`) REFERENCES `conditions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
