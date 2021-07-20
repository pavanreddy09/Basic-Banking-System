-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 11:21 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `balance`) VALUES
(1, 'deepika', 'deepu@gmail.com', 30000),
(2, 'nithin', 'nithin@gmail.com', 45700),
(3, 'ramu', 'ram@gmail.com', 38600),
(4, 'vandana', 'vandana@gmail.com', 22700),
(5, 'pavan', 'pavan@gmail.com', 47000),
(6, 'amith', 'amith@gmail.com', 57600),
(7, 'nikita', 'nikita@gmail.com', 59500),
(8, 'bharath', 'bharath@gmail.com', 47800),
(9, 'chandu', 'chandu@gmail.com', 59000),
(10, 'preethi', 'preethi@gmail.com', 59000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `sno` int(3) NOT NULL,
  `fromcustomer` varchar(50) NOT NULL,
  `tocustomer` varchar(50) NOT NULL,
  `amount` int(10) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sno`, `fromcustomer`, `tocustomer`, `amount`, `datetime`) VALUES
(1, 'deepika', 'vandana', 1000, '2021-07-05 13:15:57'),
(2, 'ramu', 'amith', 500, '2021-07-05 13:37:15'),
(3, 'vandana', 'bharath', 800, '2021-07-05 13:38:46'),
(4, 'nikita', 'vandana', 1000, '2021-07-05 13:43:13'),
(5, 'pavan', 'deepika', 1000, '2021-07-05 13:46:01'),
(6, 'nithin', 'ramu', 1200, '2021-07-05 13:46:54'),
(7, 'nithin', 'amith', 100, '2021-07-05 13:47:30'),
(8, 'nikita', 'pavan', 500, '2021-07-05 13:48:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
