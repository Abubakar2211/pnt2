-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 09:39 PM
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
-- Database: `pnterp`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_contacts`
--

CREATE TABLE `add_contacts` (
  `id` int(11) NOT NULL,
  `firstName` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lastName` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cell` int(110) NOT NULL,
  `landline` int(110) NOT NULL,
  `category` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sub-category` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `country` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `religion` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Email` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `website` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `designation` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `companyName` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `contact` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cellPhone` varchar(255) NOT NULL,
  `cellNumber` varchar(255) NOT NULL,
  `joining` varchar(255) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `clientStatus` varchar(255) NOT NULL,
  `clientBoardcast` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `contact`, `cellPhone`, `cellNumber`, `joining`, `companyName`, `clientStatus`, `clientBoardcast`, `date_time`) VALUES
(16, 'Abubakar', 'Abubakar192005@gmail.com', '03122082355', '', '', '', '', '', '', '2024-11-06 11:19:52'),
(17, 'Abubakar Baig', 'abubakar192005@gmail.com', '03122082355', '', '', '', '', '', '', '2024-11-06 11:19:52'),
(18, 'Abubakar Baig', 'abubakar192005@gmail.com', '03122082355', '', '', '', '', '', '', '2024-11-06 11:19:52'),
(20, 'Abubakar Baig', 'abubakar192005@gmail.com', '03122082355', '', '', '', '', '', '', '2024-11-06 11:19:52'),
(22, 'Abubakar Baig', 'abubakar192005@gmail.com', '03122082355', '03122082355', '031220235', '2024-11-06', 'OG Technologies', 'active', 'active', '2024-11-06 11:20:13'),
(23, 'Abubakar baig', 'Abubakar192005@gamil.com', '03122082355', '03122082355', '031128235', '2024-11-06', 'Abubakar', 'active', 'active', '2024-11-06 11:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `contact` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cellPhone` varchar(255) NOT NULL,
  `cellNumber` varchar(255) NOT NULL,
  `joining` varchar(255) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `contactStatus` varchar(255) NOT NULL,
  `contactBoardcast` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `contact`, `cellPhone`, `cellNumber`, `joining`, `companyName`, `contactStatus`, `contactBoardcast`, `date_time`) VALUES
(1, 'Abubakar Baig', 'abubakar192005@gmail.com', '03122082355', '03122082355', '03122082355', '2024-11-06', 'feature developer', 'active', 'active', '2024-11-06 15:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `id` int(11) NOT NULL,
  `list-name` varchar(110) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `list-emails` text NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `list-name`, `quantity`, `country`, `category`, `list-emails`, `status`) VALUES
(29, 'Team-PNT', '5', '', 'Team', '[\"shahid@pntglobal.com\",\"syedasehar567@gmail.com\",\"sanapretyintezar@gmail.com\",\"afiahsan23@gmail.com\",\"ayesha25arif@gmail.com\"]', 'no-record'),
(30, 'hhh', '3', 'South Georgia', 'Team', '[\"shahid@pntglobal.com\",\"syedasehar567@gmail.com\",\"sanapretyintezar@gmail.com\"]', 'no-record'),
(31, 'kjlkjkj', '3', 'South Georgia', '', '', 'no-record'),
(32, 'php dev', '7', 'Palestine', 'Team', '', 'no-record');

-- --------------------------------------------------------

--
-- Table structure for table `sub_types`
--

CREATE TABLE `sub_types` (
  `id` int(11) NOT NULL,
  `sub_type` varchar(255) NOT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_types`
--

INSERT INTO `sub_types` (`id`, `sub_type`, `type_id`) VALUES
(6, 'Morning', 1),
(7, 'Best Team', 1),
(9, 'aaaaaaa', 5),
(10, 'Software Engineer', 4);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `contact`, `category`, `password`, `date_time`) VALUES
(3, 'Abubakar Baig', 'abubakar192005@gmail.com', '03122082355', '2', '1f32aa4c9a1d2ea010adcf2348166a04', '2024-10-30 23:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `email`, `contact`, `designation`, `category`, `password`, `date_time`) VALUES
(2, 'Abubakar Baig', 'abubakar192005@gmail.com', '03122082355', 'sdfdsf', '1', '803c1f47a32d8a17adeeb578391d85fb', '2024-10-30 23:25:24'),
(5, 'hasan', 'hasan@gmail.com', '03122082355', 'hasan baig', '2', 'd9b1d7db4cd6e70935368a1efb10e377', '2024-10-30 23:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(1, 'Teams'),
(3, 'Team'),
(4, 'Supplier'),
(5, 'Contact');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_contacts`
--
ALTER TABLE `add_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_types`
--
ALTER TABLE `sub_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_contacts`
--
ALTER TABLE `add_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_types`
--
ALTER TABLE `sub_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_types`
--
ALTER TABLE `sub_types`
  ADD CONSTRAINT `sub_types_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
