-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2023 at 03:17 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matchmingle`
--

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int NOT NULL,
  `male_user_id` int NOT NULL,
  `female_user_id` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `male_user_id`, `female_user_id`, `created_at`) VALUES
(1, 1, 2, '2023-12-08 19:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int NOT NULL,
  `Username` varchar(50) CHARACTER SET utf8mb4  NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `Fname` varchar(50) CHARACTER SET utf8mb4  NOT NULL,
  `Mname` varchar(50) CHARACTER SET utf8mb4  NOT NULL,
  `Lname` varchar(50) CHARACTER SET utf8mb4  NOT NULL,
  `Position` varchar(50) CHARACTER SET utf8mb4  NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `address` text CHARACTER SET utf8mb4  NOT NULL,
  `hobbies` text CHARACTER SET utf8mb4  NOT NULL,
  `about_me` text CHARACTER SET utf8mb4  NOT NULL,
  `profile_pic` longtext CHARACTER SET utf8mb4  NOT NULL,
  `gallery_pic_1` longtext  NOT NULL,
  `gallery_pic_2` longtext  NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Username`, `Password`, `Fname`, `Mname`, `Lname`, `Position`, `name`, `address`, `hobbies`, `about_me`, `profile_pic`, `gallery_pic_1`, `gallery_pic_2`, `gender`) VALUES
(1, 'taham6408@gmail.com', '$2y$10$Aja74MVcA.n65WFLSCNeLey151nyvlE9eOJK82efy/PfU/OoNAAwa', 'Taha', 'admin', 'Mustafa', 'Employee', 'test', 'test', '{\"sleeping\":\"sleeping\",\"eating\":\"eating\"}', 'sdvbsdgsdg', 'KYzEp1f3P1L7FUNGp471.png', 'dKc84MoVrkTZeNxJ0KB7.png', 'VSo6TX98DfPdHi0DYtGP.png', 'male'),
(2, 'admin@gmail.com', '$2y$10$0sjdSP.D5dI1CfqOZNyQZegop/wo3C.joaGUsFC3tujV7wnqQEz22', 'yo', 'yo', 'yo', 'Employee', 'test1', 'test', '{\"sleeping\":\"sleeping\",\"eating\":\"eating\"}', 'sdgsgsgsdg', 'oJe9YBZ9hGeeergZBhrT.png', 'W1YRSoC5CknAQ79ffKzs.png', 'WcpUVQWNDaQCRoupzMGI.png', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
