-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 10:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms_iconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_config`
--

CREATE TABLE `tbl_config` (
  `id` int(11) NOT NULL,
  `config_key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_config`
--

INSERT INTO `tbl_config` (`id`, `config_key`, `value`, `created_at`) VALUES
(1, 'logo', '1614987431.png', '2021-03-17 12:26:15'),
(2, 'site_name', 'IConnect SMSer', '2021-03-17 12:26:15'),
(3, 'favicon', '1615985715.png', '2021-03-17 12:26:15'),
(4, 'site_keywords', 'sms, iconnect, africa', '2021-03-17 12:26:15'),
(5, 'site_description', 'Description of app and more\r\n', '2021-03-17 12:26:15'),
(6, 'site_currency', 'RWF', '2021-03-17 12:26:15'),
(7, 'footer_about', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&nbsp; tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br>', '2021-03-17 12:26:15'),
(8, 'footer_address', '<ul><li>Tel: 0989375987</li><li>E-mail: sms@iconnect.com<br></li></ul>', '2021-03-17 12:26:15'),
(9, 'footer_facebook', 'https://mobile.facebook.com', '2021-03-17 12:26:15'),
(10, 'footer_twitter', 'https://twitter.com/', '2021-03-17 12:26:15'),
(11, 'footer_youtube', 'https://youtube.com', '2021-03-17 12:26:15'),
(12, 'footer_linkedin', 'https://linkedin.com', '2021-03-17 12:26:15'),
(13, 'site_about', 'About', '2021-03-17 12:26:15'),
(14, 'site_email', 'support@iconnect.rw', '2021-03-17 12:26:15'),
(15, 'site_terms', '<p align=\"center\"><b>Terms and condition.</b></p><div align=\"left\"><br></div><p align=\"center\"><br><br></p>', '2021-03-17 12:26:15'),
(16, 'site_privacy', '<div align=\"center\"><b>Privacy policy</b></div><div align=\"center\"><div align=\"left\"><br></div><br></div>', '2021-03-17 12:26:15'),
(17, 'inbox_mode', 'shortcode', '2021-03-17 12:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_groups`
--

CREATE TABLE `tbl_groups` (
  `id` int(11) NOT NULL,
  `group_name` text NOT NULL,
  `group_description` text NOT NULL,
  `group_icon` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `shortcode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_groups`
--

INSERT INTO `tbl_groups` (`id`, `group_name`, `group_description`, `group_icon`, `user_id`, `shortcode`, `created_at`) VALUES
(1, 'Group 1', '<p>Group description<br></p>', '1615991048.jpg', 1, NULL, '2021-03-17 14:24:08'),
(2, 'My Gees', '<p>Desc<br></p>', '1616073944.jpg', 1, NULL, '2021-03-18 13:25:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_members`
--

CREATE TABLE `tbl_group_members` (
  `id` int(11) NOT NULL,
  `names` text NOT NULL,
  `phone` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_group_members`
--

INSERT INTO `tbl_group_members` (`id`, `names`, `phone`, `group_id`, `created_at`) VALUES
(217, 'Anaclet Ahish', '784354460', 1, '2021-03-18 13:24:01'),
(218, 'John Doe', '727598920', 1, '2021-03-18 13:24:01'),
(219, 'Smith E', '780989760', 1, '2021-03-18 13:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_incoming_sms`
--

CREATE TABLE `tbl_incoming_sms` (
  `id` int(11) NOT NULL,
  `sms_id` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `linkId` varchar(50) NOT NULL,
  `date` text NOT NULL,
  `from_` varchar(355) NOT NULL,
  `to_` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_incoming_sms`
--

INSERT INTO `tbl_incoming_sms` (`id`, `sms_id`, `text`, `linkId`, `date`, `from_`, `to_`, `created_at`) VALUES
(17, '56212', 'ook', '0e1ea9ea-e3bf-4fc1-9b82-58ff9bb0bf4e', '2021-03-18T15:16:34.882Z', '+250784354460', '4460', '2021-03-18 19:55:06'),
(18, '56213', 'jhghhjjg gdfj', '22d4c2f3-032e-4d52-90be-9f7e6adfe8bb', '2021-03-18T15:17:24.893Z', '+250784354460', '4460', '2021-03-18 19:55:06'),
(19, '56213', 'jhghhjjg gdfj', '22d4c2f3-032e-4d52-90be-9f7e6adfe8bb', '2021-03-18T15:17:24.893Z', '+250784354460', '4460', '2021-03-18 19:55:11'),
(20, '56214', 'Hello admin', '6d966975-eeab-40f3-a3a7-ace88b20bc41', '2021-03-18T20:06:56.901Z', '+250727598920', '4460', '2021-03-18 20:06:59'),
(21, '56215', 'fdfvdf', '471820b9-f895-4b68-8b75-fd35dba329a3', '2021-03-18T20:07:44.842Z', '+250727598920', '4460', '2021-03-18 20:07:48'),
(22, '56215', 'fdfvdf', '471820b9-f895-4b68-8b75-fd35dba329a3', '2021-03-18T20:07:44.842Z', '+250727598920', '4460', '2021-03-18 20:07:55'),
(23, '56215', 'fdfvdf', '471820b9-f895-4b68-8b75-fd35dba329a3', '2021-03-18T20:07:44.842Z', '+250727598920', '4460', '2021-03-18 20:08:03'),
(24, '56215', 'fdfvdf', '471820b9-f895-4b68-8b75-fd35dba329a3', '2021-03-18T20:07:44.842Z', '+250727598920', '4460', '2021-03-18 20:08:09'),
(25, '56215', 'fdfvdf', '471820b9-f895-4b68-8b75-fd35dba329a3', '2021-03-18T20:07:44.842Z', '+250727598920', '4460', '2021-03-18 20:08:17'),
(26, '56215', 'fdfvdf', '471820b9-f895-4b68-8b75-fd35dba329a3', '2021-03-18T20:07:44.842Z', '+250727598920', '4460', '2021-03-18 20:08:24'),
(27, '56215', 'fdfvdf', '471820b9-f895-4b68-8b75-fd35dba329a3', '2021-03-18T20:07:44.842Z', '+250727598920', '4460', '2021-03-18 20:08:36'),
(28, '56215', 'fdfvdf', '471820b9-f895-4b68-8b75-fd35dba329a3', '2021-03-18T20:07:44.842Z', '+250727598920', '4460', '2021-03-18 20:08:42'),
(29, '56215', 'fdfvdf', '471820b9-f895-4b68-8b75-fd35dba329a3', '2021-03-18T20:07:44.842Z', '+250727598920', '4460', '2021-03-18 20:08:52'),
(30, '56215', 'fdfvdf', '471820b9-f895-4b68-8b75-fd35dba329a3', '2021-03-18T20:07:44.842Z', '+250727598920', '4460', '2021-03-18 20:08:58'),
(31, '56215', 'fdfvdf', '471820b9-f895-4b68-8b75-fd35dba329a3', '2021-03-18T20:07:44.842Z', '+250727598920', '4460', '2021-03-18 20:09:05'),
(32, '56215', 'fdfvdf', '471820b9-f895-4b68-8b75-fd35dba329a3', '2021-03-18T20:07:44.842Z', '+250727598920', '4460', '2021-03-18 20:09:13'),
(33, '56215', 'fdfvdf', '471820b9-f895-4b68-8b75-fd35dba329a3', '2021-03-18T20:07:44.842Z', '+250727598920', '4460', '2021-03-18 20:09:21'),
(34, '56216', 'qqewr', 'bad3231a-8529-49ef-8155-3020a99b18da', '2021-03-18T20:09:52.342Z', '+250727598920', '4460', '2021-03-18 20:09:58'),
(35, '56217', 'yoooo ', '799a1ce3-1748-4b06-8aec-f4882cd32b9c', '2021-03-18T20:11:29.241Z', '+250727598920', '4460', '2021-03-18 20:11:31'),
(36, '56218', 'ppp', 'b7bb7e2f-9e73-4d83-bfe3-edb6b8a4b112', '2021-03-18T20:12:24.381Z', '+250727598920', '4460', '2021-03-18 20:12:28'),
(37, '56219', 'Iye', '27201315-4ef6-4639-8cb3-0bbdd2480b7e', '2021-03-18T20:18:35.661Z', '+250727598920', '4460', '2021-03-18 20:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sent_sms`
--

CREATE TABLE `tbl_sent_sms` (
  `id` int(11) NOT NULL,
  `sms` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Sent',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sent_sms`
--

INSERT INTO `tbl_sent_sms` (`id`, `sms`, `group_id`, `user_id`, `status`, `created_at`) VALUES
(2, 'Test it', 1, 1, 'Sent', '2021-03-18 14:51:24'),
(3, 'Test it k', 1, 1, 'Fail', '2021-03-18 14:51:48'),
(4, 'Test it k', 1, 1, 'Fail', '2021-03-18 14:52:06'),
(5, 'Tesi ib', 1, 1, 'Sent', '2021-03-18 14:52:41'),
(6, 'okikj', 1, 1, 'Sent', '2021-03-18 15:04:36'),
(7, 'Message', 1, 1, 'Sent', '2021-03-18 20:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_short_codes`
--

CREATE TABLE `tbl_short_codes` (
  `id` int(11) NOT NULL,
  `short_code` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `alias` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_short_codes`
--

INSERT INTO `tbl_short_codes` (`id`, `short_code`, `user_id`, `group_id`, `alias`, `created_at`) VALUES
(1, '45430', 1, 0, '', '2021-03-18 17:29:20'),
(2, '9090', 2, 0, '', '2021-03-18 17:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `profile_pic` text NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 0,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `sms_username` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `first_name`, `last_name`, `email`, `password`, `profile_pic`, `balance`, `role`, `sms_username`, `active`, `updated_at`) VALUES
(1, 'Anaclet', 'Ahishakiye', 'a.anaclet920@gmail.com', '13399D110A67A367366B39C57E03DB848784C7B35BDB8E09F76B16584BB5921A9179F1657ABEEB5F69C8AD3CA923D09E2E2BDA273E116674937A8DAF23F06F02', '1615986369.jpg', 11, 'admin', '', 1, '2021-03-14 05:34:07'),
(2, 'Anaclet', 'Ahish', 'anaclet921@gmail.com', '13399D110A67A367366B39C57E03DB848784C7B35BDB8E09F76B16584BB5921A9179F1657ABEEB5F69C8AD3CA923D09E2E2BDA273E116674937A8DAF23F06F02', '1614993918.png', 0, 'member', '', 0, '2021-03-14 05:34:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_config`
--
ALTER TABLE `tbl_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_groups`
--
ALTER TABLE `tbl_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_group_members`
--
ALTER TABLE `tbl_group_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_incoming_sms`
--
ALTER TABLE `tbl_incoming_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sent_sms`
--
ALTER TABLE `tbl_sent_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_short_codes`
--
ALTER TABLE `tbl_short_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_config`
--
ALTER TABLE `tbl_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_groups`
--
ALTER TABLE `tbl_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_group_members`
--
ALTER TABLE `tbl_group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `tbl_incoming_sms`
--
ALTER TABLE `tbl_incoming_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_sent_sms`
--
ALTER TABLE `tbl_sent_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_short_codes`
--
ALTER TABLE `tbl_short_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
