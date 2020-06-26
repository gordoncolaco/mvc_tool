-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2019 at 11:08 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(500) NOT NULL,
  `id_user_role` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `passwd`, `id_user_role`, `status`) VALUES
(1, 'Gordon', 'gordon@colaco.com', 'd00f5d5217896fb7fd601412cb890830', 1, 1),
(2, 'Gcolaco', 'gordon@ef.com', 'd00f5d5217896fb7fd601412cb890830', 3, 1),
(10, 'mike', 'mike@ef.com', 'd00f5d5217896fb7fd601412cb890830', 2, 1),
(11, 'ziggy', 'ziggy@ef.com', 'd00f5d5217896fb7fd601412cb890830', 2, 1),
(12, 'mike', 'mike2@ef.com', 'd00f5d5217896fb7fd601412cb890830', 2, 1),
(13, 'clement', 'clement@ef.com', 'd00f5d5217896fb7fd601412cb890830', 2, 1),
(14, 'jack1123', 'jack@ef.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 1),
(15, 'vijay', 'vijay@ef.com', 'd00f5d5217896fb7fd601412cb890830', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id_user_role` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id_user_role`, `code`, `name`) VALUES
(1, 'superadmin', 'Super Admin'),
(2, 'admin', 'Admin'),
(3, 'user', 'User'),
(4, 'systemadmin', 'System Admin'),
(5, 'manager', 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id_user_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
