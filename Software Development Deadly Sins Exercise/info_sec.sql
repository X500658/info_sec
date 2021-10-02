-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2021 at 11:19 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `info sec`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uuid`, `username`, `password`, `data_created`) VALUES
('AZDQGWJJcTGMDcGMQJMWADZcMADTcWgc', 'asdf', 'asdf', '2021-10-01 17:48:26'),
('gAgcTTAZcZcQMJADQgZcJTDADgAMccMM', 'z', '$2y$10$z0PdZWJqn9QApHhPvin3LOv7sAjGLc7kCKUzbF3.ghRHbyQRCiotW', '2021-10-02 03:17:55'),
('MJAWJgGMWcDTDDJTcDTJQZGQMDGJQZQg', 'aa', '$2y$10$OlepJOvjsw1Izw.8VIgr4OV4Cb7NlvZ5q3Mw.n34F2k1MVKGcWSOa', '2021-10-02 03:13:22'),
('WcZDMTJJTAAZQJcDAGWJAZWgAZDDWZAJ', 'zxcv', 'zxcv', '2021-10-01 20:36:08'),
('WQQQAAJgMccZDgZMAgZQQMJJZcAAMAgJ', 'W', '1022021', '2021-10-01 18:31:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uuid`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD UNIQUE KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
