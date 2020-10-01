-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2020 at 11:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticker`
--

-- --------------------------------------------------------

--
-- Table structure for table `ticker`
--

CREATE TABLE `ticker` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticker` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `marketcap` varchar(250) NOT NULL,
  `exchange` varchar(250) NOT NULL,
  `day_high` varchar(250) NOT NULL,
  `day_low` varchar(250) NOT NULL,
  `week_high` varchar(250) NOT NULL,
  `week_low` varchar(250) NOT NULL,
  `open` varchar(250) NOT NULL,
  `close` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `total_stock` varchar(250) NOT NULL,
  `total_purchase` varchar(250) NOT NULL,
  `current_value` varchar(250) NOT NULL,
  `Profit` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticker`
--

INSERT INTO `ticker` (`id`, `user_id`, `ticker`, `company`, `marketcap`, `exchange`, `day_high`, `day_low`, `week_high`, `week_low`, `open`, `close`, `price`, `total_stock`, `total_purchase`, `current_value`, `Profit`, `date`) VALUES
(1, 1, 'IBM', 'International Business Machines Corporation', '111196176384', 'NYSE', '122.9100', '120.8000', '158.75', '90.56', '121.3800', '120.9400', '121.6700', '75499003904', '75499003904', '23.076', '36489000000', '2020-10-01'),
(2, 1, 'TRV', 'The Travelers Companies, Inc', '27392735232', 'NYSE', '109.1300', '107.2200', '145.21', '76.99', '107.8100', '107.4400', '108.1900', '31384999936', '31384999936', '106.41', '7847000000', '2020-10-01'),
(3, 2, 'KNDI', 'Kandi Technologies Group, Inc', '382751616', 'NASDAQ', '7.1400', '6.1300', '17.4', '2.17', '7.1400', '7.1800', '6.2000', '119336144', '119336144', '4.057', '25430909', '2020-10-01'),
(4, 2, 'TEVA', 'Teva Pharmaceutical Industries Limited', '9828198400', 'NYSE', '9.1975', '8.8900', '13.76', '6.25', '8.9400', '8.8500', '9.0100', '16787999744', '16787999744', '12.642', '7536000000', '2020-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `phone`, `created_at`) VALUES
(1, 'kalidass1910@gmail.com', 'WjlEeFVzUnYwNDNYZXQzRnhnVW92QT09', 'kalidas', '5435435434', '2020-10-01 09:02:49'),
(2, 'kalidass1911@gmail.com', 'WjlEeFVzUnYwNDNYZXQzRnhnVW92QT09', 'fgfdg fdfdsfds', '565656566', '2020-10-01 09:04:01'),
(3, 'kalidass1909@gmail.com', 'WjlEeFVzUnYwNDNYZXQzRnhnVW92QT09', 'kalidas', '546456546', '2020-10-01 09:09:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ticker`
--
ALTER TABLE `ticker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticker`
--
ALTER TABLE `ticker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
