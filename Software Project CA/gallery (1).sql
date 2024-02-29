DROP DATABASE IF EXISTS gallery;
CREATE DATABASE IF NOT EXISTS gallery;

USE gallery;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 12:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
                       `product_id` int(11) NOT NULL,
                       `title` varchar(50) NOT NULL,
                       `artist` varchar(50) NOT NULL,
                       `desc` varchar(250) NOT NULL,
                       `countryOfOrigin` varchar(50) NOT NULL,
                       `url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`product_id`, `title`, `artist`, `desc`, `countryOfOrigin`, `url`) VALUES
                                                                                          (1, 'Starry Night', 'Vincent van Gogh', 'Starry Night is one of the most well-known paintings in modern culture and has been hailed as Van Gogh\'s magnum opus.', 'Netherlands', ''),
(2, 'Mona Lisa', 'Leonardo da Vinci', 'The Mona Lisa is a half-length portrait painting by the Italian artist Leonardo da Vinci.', 'Italy', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg/270px-Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg'),
(3, 'The Persistence of Memory', 'Salvador Dalí', 'The Persistence of Memory is perhaps the most famous of Salvador Dalí\'s surrealist artworks.', 'Spain', 'https://cdn.britannica.com/96/240496-138-66D89FAD/Salvador-Dali-Persistence-of-Memory.jpg?w=800&h=450&c=crop'),
                                                                                          (5, 'Girl with a Pearl Earring', 'Johannes Vermeer', 'Girl with a Pearl Earring is one of Johannes Vermeer\'s most famous paintings.', 'Netherlands', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `venue` varchar(500) NOT NULL,
  `size` int(200) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderline`
--

CREATE TABLE `orderline` (
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `quantity`) VALUES
(1, 'Canvas Print - Starry Night', 50, 10),
(2, 'Canvas Print - Mona Lisa', 60, 15),
(3, 'Canvas Print - The Persistence of Memory', 70, 8),
(4, 'Canvas Print - The Starry Night', 55, 12),
(5, 'Canvas Print - Girl with a Pearl Earring', 65, 7);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--
-- Error reading structure for table gallery.ticket: #1932 - Table 'gallery.ticket' doesn't exist in engine
-- Error reading data for table gallery.ticket: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `gallery`.`ticket`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `D.O.B` date NOT NULL,
  `userType` enum('admin','basic','artist','premium','guest') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `D.O.B`, `userType`) VALUES
                                                                                             (1, 'Marco ', 'sa', 'sa@gmail', 'sa', '0000-00-00', 'admin'),
                                                                                             (3, 'Marco2', 'sasa', 'sasa', '', '0000-00-00', 'admin'),
                                                                                             (5, 'Duck', 'gooseduck1', 'goose@Duck.com', '20000', '0000-00-00', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art`
--
ALTER TABLE `art`
    ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_id` (`product_id`),
  ADD UNIQUE KEY `product_id_2` (`product_id`),
  ADD UNIQUE KEY `product_id_3` (`product_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `art_id` (`product_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `art_id` (`product_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `cart_id` (`cart_id`);

--
-- Indexes for table `orderline`
--
ALTER TABLE `orderline`
    ADD UNIQUE KEY `product_id` (`product_id`),
    ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `art`
--
ALTER TABLE `art`
    ADD CONSTRAINT `art_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
    ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
    ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orderline`
--
ALTER TABLE `orderline`
    ADD CONSTRAINT `orderline_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orderline_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
