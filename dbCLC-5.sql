-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2021 at 01:39 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbCLC`
--
CREATE DATABASE IF NOT EXISTS `dbCLC` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dbCLC`;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_range` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `location`, `type`, `pay_range`, `company`, `employment`, `phonenumber`, `email`, `created_at`, `updated_at`) VALUES
(7, 'GCU', 'descriptions', 'New York', 'On-Ground', '100,000,000,000', 'companys', 'Seasonal', '1231246789', 'email123@email.com', '2021-02-22 11:20:33', '2021-02-23 07:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_02_09_033746_add_blocked_at_to_users_table', 2),
(4, '2021_02_21_201457_jobs', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `ID` bigint(20) NOT NULL,
  `UserID` bigint(20) UNSIGNED DEFAULT NULL,
  `PhoneNumber` int(11) DEFAULT '0',
  `Street` varchar(100) DEFAULT 'n/a',
  `City` varchar(100) DEFAULT 'n/a',
  `State` varchar(2) DEFAULT 'na',
  `ZipCode` int(11) DEFAULT '0',
  `EmploymentStatus` varchar(100) DEFAULT 'n/a',
  `Occupation` varchar(100) DEFAULT 'n/a',
  `CompanyName` varchar(100) DEFAULT 'n/a',
  `EducationalBackground` varchar(100) DEFAULT 'n/a',
  `Skills` varchar(1000) NOT NULL DEFAULT 'n/a',
  `JobHistory` varchar(1000) NOT NULL DEFAULT 'n/a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`ID`, `UserID`, `PhoneNumber`, `Street`, `City`, `State`, `ZipCode`, `EmploymentStatus`, `Occupation`, `CompanyName`, `EducationalBackground`, `Skills`, `JobHistory`) VALUES
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n/a', 'n/a'),
(16, 7, 1234123423, '123 s north', 'street', 'az', 12345, 'employed', 'code', 'gcu', 'college', 'candy', 'n/a'),
(21, 6, 1231234123, '123 s street', 'street', 'az', 12345, 'employed', 'mcd', 'mcd', 'college', 'n/a', 'n/a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `usertype`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'admin1', 'admin', 'admin1@live.com', NULL, '$2y$10$x.c1tb3q2PS3cEt5CwOphuFdY85QwWpcq7uy1Gb8Ao3FL/vdVKNvW', 'VsLSvL9NgVux4TSW7nlNZ1pXgPlnlbgxqNG9Km8OZs1TyCLDiAzkslTs1uVv', '2021-02-09 11:46:14', '2021-02-09 11:46:14', NULL),
(7, 'katie', NULL, 'katie@live.com', NULL, '$2y$10$aGabZJqq8p30Mety3xYcHuZH1h0x/QobeVyuFOHSwZc4amiXg806u', NULL, '2021-02-09 16:00:40', '2021-02-22 05:48:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usertags`
--

CREATE TABLE `usertags` (
  `ID` bigint(20) NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `TagID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_userID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usertags`
--
ALTER TABLE `usertags`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_TagID` (`TagID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usertags`
--
ALTER TABLE `usertags`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `fk_userID` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
