-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 06:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `r_id` int(100) NOT NULL,
  `rating` int(1) NOT NULL,
  `content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`r_id`, `rating`, `content`) VALUES
(1, 5, 'Beautiful product with much attention to detail'),
(2, 5, 'Awesome staff!'),
(3, 5, 'I can’t say enough about these headphones. They’re excellent for gamers'),
(4, 5, 'I absolutely love this pc machine! It works so well. '),
(5, 5, 'Great service.'),
(6, 5, 'I\'ve bought a brand new mainboard. Very satisfied with this purchase.');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'tuan', 'tuan@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'eco-5465425_960_720.png'),
(2, 'nam', 'nam@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'Can_Tho_University_Logo.png'),
(3, 'nhat', 'nhat@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'images.png'),
(4, 'trung', 'trung@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'cs.png'),
(5, 'hau', 'hau@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'sq.png'),
(6, 'tin', 'tin@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'scf.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD KEY `r_id_fk` (`r_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `user_form` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
