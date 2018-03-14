-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2018 at 09:58 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `place`
--

-- --------------------------------------------------------

--
-- Table structure for table `location_city`
--

CREATE TABLE `location_city` (
  `city_id` int(4) NOT NULL,
  `city_code` varchar(2) NOT NULL,
  `city_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location_country`
--

CREATE TABLE `location_country` (
  `country_region_id` int(1) NOT NULL,
  `country_id` int(3) NOT NULL,
  `country_name` varchar(128) NOT NULL,
  `country_code` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location_geography`
--

CREATE TABLE `location_geography` (
  `geo_id` int(2) NOT NULL,
  `geo_name` varchar(128) NOT NULL,
  `geo_sequence` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location_region`
--

CREATE TABLE `location_region` (
  `region_id` int(1) NOT NULL,
  `region_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_building_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `property_name` varchar(128) NOT NULL,
  `property_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `property_building`
--

CREATE TABLE `property_building` (
  `building_id` int(11) NOT NULL,
  `building_name` varchar(160) NOT NULL,
  `building_type` int(4) NOT NULL,
  `building_zone` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `property_facilities`
--

CREATE TABLE `property_facilities` (
  `facilitie_id` int(4) NOT NULL,
  `facilitie_name` varchar(128) NOT NULL,
  `facilitie_enabled` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `property_payment_options`
--

CREATE TABLE `property_payment_options` (
  `payment_id` int(2) NOT NULL,
  `payment_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `property_room_amenities`
--

CREATE TABLE `property_room_amenities` (
  `amenitie_id` int(2) NOT NULL,
  `amenitie_name` varchar(128) NOT NULL,
  `amenitie_disabled` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `property_room_offers`
--

CREATE TABLE `property_room_offers` (
  `offer_id` int(2) NOT NULL,
  `offer_name` varchar(128) NOT NULL,
  `offer_disabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `property_transportation`
--

CREATE TABLE `property_transportation` (
  `transport_id` int(2) NOT NULL,
  `transport_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

CREATE TABLE `property_type` (
  `type_id` int(4) NOT NULL,
  `type_code` varchar(2) NOT NULL,
  `type_name` varchar(128) NOT NULL,
  `type_enabled` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_type`
--

INSERT INTO `property_type` (`type_id`, `type_code`, `type_name`, `type_enabled`) VALUES
(1, 'ap', 'Apartment', 1),
(2, 'co', 'Condominium', 1),
(3, 'ht', 'Hotel', 1),
(4, '', 'House', NULL),
(5, '', 'dsfdsfds', 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_zone`
--

CREATE TABLE `property_zone` (
  `zone_id` int(4) NOT NULL,
  `zone_code` varchar(2) NOT NULL,
  `zone_name` varchar(128) NOT NULL,
  `zone_enabled` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_zone`
--

INSERT INTO `property_zone` (`zone_id`, `zone_code`, `zone_name`, `zone_enabled`) VALUES
(2, '', 'rryr', 1),
(3, '', 'sdfdsf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(3) NOT NULL,
  `option_name` varchar(160) NOT NULL,
  `option_value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `option_name`, `option_value`) VALUES
(1, 'type', 'article'),
(2, 'name', 'Place'),
(3, 'title', 'Place'),
(5, 'description', 'Place');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_role_id` int(2) NOT NULL,
  `user_id` int(4) NOT NULL,
  `user_created` datetime DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `user_login` varchar(15) DEFAULT NULL,
  `user_pass` varchar(64) DEFAULT NULL,
  `user_lang` varchar(2) DEFAULT 'en',
  `user_email` varchar(45) DEFAULT NULL,
  `user_is_owner` tinyint(1) NOT NULL DEFAULT '0',
  `user_updated` datetime DEFAULT NULL,
  `user_mode` varchar(10) NOT NULL,
  `user_lastvisit` datetime DEFAULT NULL,
  `user_enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_role_id`, `user_id`, `user_created`, `user_name`, `user_login`, `user_pass`, `user_lang`, `user_email`, `user_is_owner`, `user_updated`, `user_mode`, `user_lastvisit`, `user_enabled`) VALUES
(1, 1, NULL, 'ชง', 'admin', 'e0e7405461d32116315ea39fc4de2eed522770a73accabdcfa1a8d0b15a93d47', 'th', 'monkey.d.chong@gmail.com', 1, '2018-01-31 13:08:58', 'blue', '2018-01-31 13:08:58', 1),
(2, 2, '2018-01-24 23:17:37', 'asdsldsad', 'asdlsadlsad', 'bc3ab98af3f1f348810b34553d7154d00ce3ba1153e9fb3a0b89a0c3470a7efa', 'en', NULL, 0, '2018-01-25 01:03:12', '', NULL, 1),
(2, 3, '2018-01-24 23:49:47', 'asdsad', 'asdas', 'f8e185a3b68e74d4fd69f6f75a5dda24686344f1cff160b81e121d0443de8467', 'en', NULL, 0, '2018-01-25 00:36:46', '', NULL, 1),
(2, 5, '2018-01-24 23:53:04', 'test13', 'test13', 'a45ca7d9764916f9af07ace58de5215a10858f63a1eb4c29ccb4d6984664d542', 'en', NULL, 0, '2018-01-25 00:52:59', '', NULL, 0),
(2, 6, '2018-01-24 23:56:26', 'dfsdf', 'sdfffsd', '2b23c8c5fc4072a26ae7c9e053c77493a008356f8cd096de23a74efa4a8a8308', 'en', NULL, 0, '2018-01-24 23:56:26', '', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `role_id` int(2) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`role_id`, `role_name`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Editor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location_city`
--
ALTER TABLE `location_city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `location_country`
--
ALTER TABLE `location_country`
  ADD PRIMARY KEY (`country_id`),
  ADD KEY `country_region_id` (`country_region_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `location_geography`
--
ALTER TABLE `location_geography`
  ADD PRIMARY KEY (`geo_id`),
  ADD KEY `geo_id` (`geo_id`);

--
-- Indexes for table `location_region`
--
ALTER TABLE `location_region`
  ADD PRIMARY KEY (`region_id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `property_building_id` (`property_building_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `property_building`
--
ALTER TABLE `property_building`
  ADD PRIMARY KEY (`building_id`),
  ADD KEY `building_type` (`building_type`),
  ADD KEY `building_zone` (`building_zone`),
  ADD KEY `building_id` (`building_id`);

--
-- Indexes for table `property_facilities`
--
ALTER TABLE `property_facilities`
  ADD PRIMARY KEY (`facilitie_id`);

--
-- Indexes for table `property_payment_options`
--
ALTER TABLE `property_payment_options`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `property_room_amenities`
--
ALTER TABLE `property_room_amenities`
  ADD PRIMARY KEY (`amenitie_id`),
  ADD KEY `amenitie_id` (`amenitie_id`);

--
-- Indexes for table `property_room_offers`
--
ALTER TABLE `property_room_offers`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `offer_id` (`offer_id`);

--
-- Indexes for table `property_transportation`
--
ALTER TABLE `property_transportation`
  ADD PRIMARY KEY (`transport_id`);

--
-- Indexes for table `property_type`
--
ALTER TABLE `property_type`
  ADD PRIMARY KEY (`type_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `property_zone`
--
ALTER TABLE `property_zone`
  ADD PRIMARY KEY (`zone_id`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_name` (`option_name`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role_id` (`user_role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location_city`
--
ALTER TABLE `location_city`
  MODIFY `city_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location_country`
--
ALTER TABLE `location_country`
  MODIFY `country_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location_geography`
--
ALTER TABLE `location_geography`
  MODIFY `geo_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location_region`
--
ALTER TABLE `location_region`
  MODIFY `region_id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_building`
--
ALTER TABLE `property_building`
  MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_facilities`
--
ALTER TABLE `property_facilities`
  MODIFY `facilitie_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_payment_options`
--
ALTER TABLE `property_payment_options`
  MODIFY `payment_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_room_amenities`
--
ALTER TABLE `property_room_amenities`
  MODIFY `amenitie_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_room_offers`
--
ALTER TABLE `property_room_offers`
  MODIFY `offer_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_transportation`
--
ALTER TABLE `property_transportation`
  MODIFY `transport_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_type`
--
ALTER TABLE `property_type`
  MODIFY `type_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property_zone`
--
ALTER TABLE `property_zone`
  MODIFY `zone_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `role_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
