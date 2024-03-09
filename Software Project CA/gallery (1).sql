DROP DATABASE IF EXISTS gallery;
CREATE DATABASE IF NOT EXISTS gallery;

USE gallery;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 02:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
                                                                                          (1, 'Starry Night', 'Vincent van Gogh', 'Starry Night is one of the most well-known paintings in modern culture and has been hailed as Van Gogh\'s magnum opus.', 'Netherlands', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg/800px-Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg'),
(2, 'Mona Lisa', 'Leonardo da Vinci', 'The Mona Lisa is a half-length portrait painting by the Italian artist Leonardo da Vinci.', 'Italy', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg/270px-Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg'),
(3, 'The Persistence of Memory', 'Salvador Dalí', 'The Persistence of Memory is perhaps the most famous of Salvador Dalí\'s surrealist artworks.', 'Spain', 'https://cdn.britannica.com/96/240496-138-66D89FAD/Salvador-Dali-Persistence-of-Memory.jpg?w=800&h=450&c=crop'),
                                                                                          (5, 'Girl with a Pearl Earring', 'Johannes Vermeer', 'Girl with a Pearl Earring is one of Johannes Vermeer\'s most famous paintings.', 'Netherlands', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/1665_Girl_with_a_Pearl_Earring.jpg/800px-1665_Girl_with_a_Pearl_Earring.jpg');

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
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `venue`, `start_date`, `end_date`, `month`) VALUES
(1, 'Event 1', 'Venue 1', '2024-03-05', '2024-03-05', 3),
(2, 'Event 2', 'Venue 2', '2024-03-15', '2024-03-16', 3),
(3, 'Event 3', 'Venue 3', '2024-03-25', '2024-03-27', 3);

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
  `quantity` int(11) NOT NULL,
  `url` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `quantity`, `url`, `description`) VALUES
(2, 'Canvas Print - Mona Lisa', 60, 15, 'https://upload.wikimedia.org/wikipedia/commons/e/ec/Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg', 'The Mona Lisa is a half-length portrait painting by Italian artist Leonardo da Vinci. Considered an archetypal masterpiece of the Italian Renaissance, it has been described as \"the best known, the most visited, the most written about, the most sung about, [and] the most parodied work of art in the world\".'),
(3, 'Canvas Print - The Persistence of Memory', 70, 8, 'https://cdn.britannica.com/96/240496-138-66D89FAD/Salvador-Dali-Persistence-of-Memory.jpg?w=800&h=450&c=crop', 'The Persistence of Memory is a 1931 painting by artist Salvador Dalí and one of the most recognizable works of Surrealism. First shown at the Julien Levy Gallery in 1932, since 1934 the painting has been in the collection of the Museum of Modern Art in New York City, which received it from an anonymous donor.'),
                                                                                           (5, 'Canvas Print - Girl with a Pearl Earring', 65, 7, 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/1665_Girl_with_a_Pearl_Earring.jpg/800px-1665_Girl_with_a_Pearl_Earring.jpg', 'Girl with a Pearl Earring is an oil painting by Dutch Golden Age painter Johannes Vermeer, dated c. 1665. Going by various names over the centuries, it became known by its present title towards the end of the 20th century after the earring worn by the girl portrayed there.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `username` varchar(50) NOT NULL,
                         `name` varchar(100) NOT NULL,
                         `email` varchar(100) NOT NULL,
                         `password` varchar(60) NOT NULL,
                         `DateOfBirth` date NOT NULL,
                         `userType` enum('admin','basic','artist','premium','guest') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `DateOfBirth`, `userType`) VALUES
                                                                                                   (1, 'Marco ', 'sa', 'sa@gmail', 'sa', '0000-00-00', 'admin'),
                                                                                                   (3, 'Marco2', 'sasa', 'sasa', '', '0000-00-00', 'admin'),
                                                                                                   (5, 'Duck', 'gooseduck1', 'goose@Duck.com', '20000', '0000-00-00', 'admin'),
                                                                                                   (6, 'marco ladeira', 'ladeira', 'fristtysteam@gmail.com', '$2y$10$lYyPjt/b1bfKRxH7rV95/.taDeARx8ZlNGkBfAIMAHF', '2024-03-02', 'admin'),
                                                                                                   (9, '21 21', '21', 'fristtysteam@g', '$2y$10$6s6FxDoew/4bbqKvG1es/OK6hZlCXRb4yam.EjKADNu', '2024-03-01', 'admin'),
                                                                                                   (10, 'as as', 'as', 'as@1', '$2y$10$vnsuOZuyLyolMKBk1bacaeQAGIuIBt5hAZ7RZG8HtDB', '2024-03-02', 'admin'),
                                                                                                   (11, 'test test', 'test', 'test@1', '$2y$10$otjiFB2B/jVODgOaOuNpGO5cAWJXQBHvU0TJ7hu5UmH', '2024-03-02', 'admin'),
                                                                                                   (12, 'a a', 'a', 'a@gmail', '$2y$10$ZbnzCiImzMIISVcP7C5O3e9dnE2SxoxUMyu679HKmrD', '2024-03-02', 'admin'),
                                                                                                   (13, 'b b', 'b', 'b@gmail.com', '$2y$10$0V.6qIotF0EdP79e8BZugOLVQ1/cvHJxVdx2nyBKXFG', '2024-03-01', 'admin'),
                                                                                                   (14, 'c c', 'c', 'c@gmail', '$2y$10$Lrm5nI7bGQ6YQcpBD0afu.RU4.D0Ns7WPB9tz56v0WG', '2024-03-01', 'admin'),
                                                                                                   (15, 'd d', 'd', 'd@gmail', '$2y$10$YCgpy2.mYPNnIHLc3f22L.2tibmS4fdgaZ07R4cwPBsDEW66dKUc6', '2024-03-02', 'admin'),
                                                                                                   (16, 'e e', 'e', 'e@gmail', '$2y$10$qvrw9xuy5hmI9BPrWX6HEuTOMabrfaEnskq/hFCYcS4DF8XI2FxY2', '2024-03-01', 'admin'),
                                                                                                   (17, 'nintendo nintendo', 'nintendo', 'nintendo@gmail', '$2y$10$lU75r4NuXMoQQ9BMqQk.ke0Zn6MwjK3X0k/1NLQZHI3.h9G.TJ4zK', '2024-03-02', 'admin'),
                                                                                                   (18, 'f f', 'f', 'f@gmail', '$2y$10$oSki.tppLNNyeeX0XZMAjeqba0LqcRrwA/7H65NyHom1t9zyagFxG', '2024-03-02', 'admin'),
                                                                                                   (20, 'fas fas', 'fas', 'fas@gm', '$2y$10$RHk8YzudaKFpuyWriCx5w.qn/b8t/3CA7ID7oe20QaOGuqh98nLxm', '2024-03-03', 'admin'),
                                                                                                   (21, 'hy hy', 'hy', 'hy@gm', '$2y$10$CsDuLme7oQCt8aI6Ns2P7eagcnyB9S51p2klbxTQdTYtQ3BP70Ui6', '2024-03-02', 'admin'),
                                                                                                   (22, 'oii oii', 'oii', 'o@gm', '$2y$10$3VtPaIJ1NSrsljuFuvGJT.0xGEklRoTuTURuigMPVYtVNNd4Kcw3q', '2024-03-01', 'admin'),
                                                                                                   (23, '877 877', '877', '877@gmail', '$2y$10$JKAyFii.XMZI6olfDlPZlO6beItvoWIkl74pwfjJGLVdN3hgyZiaS', '2024-03-02', 'admin'),
                                                                                                   (24, 'ase ase', 'ase', 'ase@gm', '$2y$10$7vXHtRl9w2Uu0qCJA/Jeu.5qLpMuFN5lmxRNKtQWpxW3XTUj6frjC', '2024-03-03', 'admin'),
                                                                                                   (25, 'asas asas', 'asas', 'asas@gm', '$2y$10$xi5.2FIE8v39yhrW.vz5cOQRE006PoXOQAm8jCGSu3rZp0EhaG2ny', '2024-03-02', 'admin'),
                                                                                                   (26, 'ta ta', 'ta', 'ta@gm', '$2y$10$x.H5Z.WeAKZIb0dVqLbXmOsJQENOTAfG40UZ1FvCANmoCJzQXUPpG', '2024-03-03', 'admin'),
                                                                                                   (27, 'gas gas', 'gas', 'gas@g', '$2y$10$xUfIXYIw3xX8mAhtSwfiRe63uHJOrDxcJGaGpwzob.buJCv/J7XkS', '2024-03-03', 'admin');

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
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

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
