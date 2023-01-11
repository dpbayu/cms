-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 04:44 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Game'),
(4, 'Health'),
(7, 'Fashion'),
(8, 'Computer'),
(12, 'IT'),
(13, 'Anime'),
(14, 'Travel'),
(15, 'Movie'),
(16, 'Song'),
(17, 'Bussiness'),
(19, 'World');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `news_content` text NOT NULL,
  `news_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `news_images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `category_id`, `news_content`, `news_date`, `news_images`) VALUES
(1, 'Final Fantasy XV anime adaption by Square Enix!!', 1, 'Page content', '2022-12-07 05:29:42', 'test.jpg'),
(2, 'Tifa Lockhart sexy in Final Fantasy VII Remake', 2, 'Description news', '2022-12-08 10:17:10', '08122022111710FFXV.jpg'),
(3, 'Final Fantasy XVI', 13, 'Final Fantasy XV description update', '2022-12-08 10:17:21', '08122022111721Lunafreya.jpg'),
(6, 'People already dead in 2023', 18, 'Because of a fatal disease', '2022-12-09 07:16:39', '09122022081639Wallpaper 2.jpg'),
(8, 'Corona is over', 4, 'I am still live', '2022-12-12 07:47:03', '12122022084630Wallpaper 11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pages_id` int(11) NOT NULL,
  `pages_name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pages_id`, `pages_name`, `description`) VALUES
(2, 'Contact Us', 'Description contact us'),
(3, 'Profile', 'Description profile'),
(4, 'Homepage', 'Description homepage new                                    '),
(5, 'About Me', 'Description about me'),
(6, 'Dashboard Fix', 'Dashboard description New                    ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_description` text NOT NULL,
  `user_role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_description`, `user_role`) VALUES
(1, 'Dwi Putra Bayuu', 'bayu@gmail.com', '$2y$10$4/690hBCs2VTTpMdC9lXmuUdhFMbX3STjIQ82xwKohgyfLfxmVHhW', 'Deskripsi user', 'admin'),
(2, 'Syifa Khairunnisa', 'syifa@gmail.com', '$2y$10$EdK8vPFNVM7kRDHmMEmWMuj7qpUJKgfWb7Xw/v.Y5ULNxpqjy3b1G', 'Deskripsi user 2', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `news_category` (`category_id`) USING BTREE;

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pages_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
