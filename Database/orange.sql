-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 10:53 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orange`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `Cell_Phone` int(100) NOT NULL,
  `Comment` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `User_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`Cell_Phone`, `Comment`, `Email`, `User_Name`) VALUES
(1126785910, 'hjbkjnjknjkllmk', 'nessimboula@gmail.com', 'Boula');

-- --------------------------------------------------------

--
-- Table structure for table `creataccount`
--

CREATE TABLE `creataccount` (
  `Confirm_Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `My_Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `creataccount`
--

INSERT INTO `creataccount` (`Confirm_Password`, `Email`, `First_Name`, `Last_Name`, `My_Password`) VALUES
('solimanyoussef', 'nessimboula@gmail.com', 'Boula', 'Nessim', 'solimanyoussef');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `Price_disc` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`Price_disc`, `name`, `Price`) VALUES
(2000, '1.jpg', 2500),
(3000, '2.jpg', 3999),
(1000, '3.jpg', 1500),
(10000, '4.jpg', 12000),
(500, '5.jpg', 1000),
(6000, '6.jpg', 9000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
