-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 12:12 PM
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

--
-- Dumping data for table `add_contacts`
--

INSERT INTO `add_contacts` (`id`, `firstName`, `lastName`, `cell`, `landline`, `category`, `sub-category`, `country`, `religion`, `Email`, `website`, `designation`, `companyName`, `status`) VALUES
(1, 'Name', 'Sell Number', 0, 0, 'Contact Number', 'Client Status', 'Joining', '', 'Company Name', NULL, 'Client Boardcast', '', ''),
(2, 'Cheryl Lin', '(698)797-8852x156', 1, 0, '529-907-6129x70422', 'Active', '12/07/2021', '', 'Lane, Butler and Elliott', NULL, 'Yes', '', ''),
(3, 'Rebecca Adams', '429-089-7519x8928', 1, 0, '952-821-6018x068', 'Active', '12/03/2022', '', 'Brooks and Sons', NULL, 'Yes', '', ''),
(4, 'James Gonzales', '688.337.3287x56729', 728153, 0, '(486)810-7648x7329', 'Active', '24/05/2022', '', 'Garcia, Larson and Glenn', NULL, 'Yes', '', ''),
(5, 'Brenda Reed', '(680)915-6924', 24, 0, '801-871-5825x70929', 'Active', '30/09/2021', '', 'Hanson PLC', NULL, 'Yes', '', ''),
(6, 'Darrell Valdez', '(936)066-8362', 679, 0, '446-912-9956x05635', 'Active', '16/11/2021', '', 'Scott and Sons', NULL, 'Yes', '', ''),
(7, 'Brian Smith', '+1-738-123-4088x3100', 0, 0, '361.237.5515', 'Active', '06/10/2020', '', 'Payne Group', NULL, 'Yes', '', ''),
(8, 'Benjamin Moore', '(162)381-2763', 202771, 0, '(587)717-7568x32944', 'Active', '08/09/2024', '', 'Jackson, Stewart and Wright', NULL, 'Yes', '', ''),
(9, 'Christina Diaz', '(192)144-8463x569', 1, 0, '923.127.3164x94848', 'Active', '19/03/2024', '', 'Burke, Singh and Conway', NULL, 'Yes', '', ''),
(10, 'Kimberly Cook', '(315)234-7921x00124', 970701, 0, '(382)115-4406', 'Active', '05/03/2021', '', 'Noble, Hall and Fuller', NULL, 'Yes', '', ''),
(11, 'James Moore', '+1-666-221-7856x72658', 740730, 0, '128-168-5940x419', 'Active', '04/01/2022', '', 'Young-Carroll', NULL, 'Yes', '', '');

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
(3, 'Team'),
(4, 'Supplier'),
(5, 'Contact'),
(7, 'Clerks');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
