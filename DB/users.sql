-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 01, 2017 at 10:38 AM
-- Server version: 5.7.14
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctruyen`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `date_created`, `date_updated`) VALUES
(2, 'Nguyễn Quốc Sử', 'nqsu381@gmail.com', 'nongdanit', '$2a$10$RJX6k5GCxNuTzsD6FtBzQe8F.aQgMbX/QeKKM4G5nAGsTyyanCsTK', '2013-10-31 03:24:42', '2014-12-10 21:01:28'),
(65, 'Loan', 'nqsu381@gmail.com', 'tuyetloan', '$2a$10$MEEQeiTY8ebDoINH7w.Bb.xPac8MSce.HXSWSXXiONXrlOhmyUsaa', '2013-10-31 03:24:42', '2014-12-10 21:01:28'),
(66, 'Loan', 'nqsu381@gmail.com', 'tuyetloan', '$2a$10$MEEQeiTY8ebDoINH7w.Bb.xPac8MSce.HXSWSXXiONXrlOhmyUsaa', '2013-10-31 03:24:42', '2014-12-10 21:01:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
