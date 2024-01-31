-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 07:57 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
                       `id` int(11) NOT NULL,
                       `title` int(50) NOT NULL,
                       `price` double NOT NULL,
                       `artist` varchar(20) NOT NULL,
                       `desc` varchar(500) NOT NULL,
                       `countryOfOrigin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
                        `id` int(11) NOT NULL,
                        `art_id` int(11) NOT NULL,
                        `quantity` double NOT NULL,
                        `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
                         `id` int(11) NOT NULL,
                         `user_id` int(11) NOT NULL,
                         `art_id` int(11) NOT NULL,
                         `title` varchar(50) NOT NULL,
                         `venue` varchar(500) NOT NULL,
                         `size` int(200) NOT NULL,
                         `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
                         `id` int(11) NOT NULL,
                         `cart_id` int(11) NOT NULL,
                         `art_id` int(11) NOT NULL,
                         `price` double NOT NULL,
                         `user_id` int(11) NOT NULL,
                         `quantity` int(10) NOT NULL,
                         `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
                          `id` varchar(10) NOT NULL,
                          `event` varchar(50) NOT NULL,
                          `date` varchar(10) NOT NULL,
                          `price` double NOT NULL,
                          `fname` varchar(15) NOT NULL,
                          `lname` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
                        `id` int(11) NOT NULL,
                        `username` varchar(25) NOT NULL,
                        `firstname` varchar(25) NOT NULL,
                        `lastname` varchar(20) NOT NULL,
                        `email` varchar(100) NOT NULL,
                        `password` varchar(15) NOT NULL,
                        `D.O.B` varchar(10) NOT NULL,
                        `userType` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art`
--
ALTER TABLE `art`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `art_id` (`art_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `art_id` (`art_id`),
    ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `art_id` (`art_id`),
    ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
