DROP DATABASE IF EXISTS gallery;
CREATE DATABASE IF NOT EXISTS gallery;

USE gallery;
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 04:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `username` varchar(50) NOT NULL,
                         `name` varchar(100) NOT NULL,
                         `email` varchar(100) NOT NULL,
                         `password` varchar(60) NOT NULL,
                         `DateOfBirth` date NOT NULL,
                         `userType` enum('basic','admin','artist','premium','guest') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `DateOfBirth`, `userType`) VALUES
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
                                                                                                   (27, 'gas gas', 'gas', 'gas@g', '$2y$10$xUfIXYIw3xX8mAhtSwfiRe63uHJOrDxcJGaGpwzob.buJCv/J7XkS', '2024-03-03', 'admin'),
                                                                                                   (28, 'g g', 'g', 'g@gmail', '$2y$10$suz.y8Kovw.JTvAZg3fEee3XmHWvjwjFB/3csM.RAeJXc./ax2aTy', '2024-03-02', 'premium'),
                                                                                                   (29, 'j j', 'j', 'j@gmail', '$2y$10$xzelHNmExQigEuK1h7hSCO8VCVwDCf5IDd08jnzI0Fec9tHnLJ.F6', '2024-03-03', 'basic'),
                                                                                                   (30, 'm m', 'm', 'm@g', '$2y$10$xsymQmRiM2qsliiXghOJTOMdXmcqQ.Zkl3Yn2vYzmnpk3QNwpTuD2', '2024-03-02', 'artist'),
                                                                                                   (31, 't t', 't', 't@g', '$2y$10$ehzQwQiudGvdgEfSOgnRXe9my6JDVSg.PR3/Ej8yPMm61.fj0Nqhu', '2024-03-01', 'basic'),
                                                                                                   (32, 'u u', 'u', 'u@g', '$2y$10$p/GwPu21dVjMPkavwvRazedvDwjBbv7Nt/8mN9B1KA..EqcAcTY2i', '2024-03-22', 'premium'),
                                                                                                   (33, 'will iam', 'iam', 'will@iam', '$2y$10$Z1Do1oGE65SlxUWuNJkTTuNJaL2gI6VyW/EUCMSCyiPyBVR9IqwNO', '2023-11-02', 'artist'),
                                                                                                   (34, 'fifi doo', 'doo', 'fifi@doo', '$2y$10$aeXgqad85nvMFqf9726Bw.dmSLbvtPUYWW95zEe5n3/pm6UxT7Q8a', '2023-09-13', 'artist'),
                                                                                                   (35, 'l l', 'l', 'l@l', '$2y$10$nApsNbTPTInPpfzizEWpl.x1h3crkDGoaxm8IrbUqIWo01MpeifBm', '2024-03-08', 'basic');

--
-- Indexes for dumped tables
--

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
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Constraints for table `userart`
--
ALTER TABLE `userart`
    ADD CONSTRAINT `fk_userArt_users` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
