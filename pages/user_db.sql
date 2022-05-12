-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 12, 2022 at 05:10 PM
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
  `content` varchar(300) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`r_id`, `rating`, `content`, `id`) VALUES
(1, 5, 'Beautiful product with much attention to detail', 1),
(2, 5, 'Awesome staff!', 2),
(4, 5, 'I absolutely love this pc machine! It works so well. ', 4),
(5, 5, 'Great service.', 5),
(6, 5, 'I have bought a brand new mainboard. Very satisfied with this purchase.', 6),
(7, 5, 'Wonderful Store', 7);

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
(1, 'tuan', 'tuan@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'fb.png'),
(2, 'nam', 'nam@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'tw.png'),
(4, 'trung', 'trung@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'intel.png'),
(5, 'hau', 'hau@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'nvidia.png'),
(6, 'tin', 'tin@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'corsair.png'),
(7, 'nhat', 'nhat@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'dell.png'),
(8, 'delete', 'delete@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'delete.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `r_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_form` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
