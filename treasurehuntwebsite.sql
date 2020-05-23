-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2020 at 06:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `treasurehuntwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(150) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `organizer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `event_date`, `event_time`, `organizer_id`) VALUES
(1, 'Easter Hunt', '2020-05-31', '08:30:00', 1),
(4, 'Christmas Hunt', '2020-12-25', '08:30:00', 2),
(5, 'New Year Hunt', '2021-01-01', '09:00:00', 3),
(8, 'Merdeka Hunt', '2020-08-31', '10:00:00', 2),
(9, 'UM Treasure Hunt', '2020-08-14', '08:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `event_team`
--

CREATE TABLE `event_team` (
  `team_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE `organizer` (
  `organizer_id` int(11) NOT NULL,
  `organizer_name` varchar(150) NOT NULL,
  `organizer_email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organizer`
--

INSERT INTO `organizer` (`organizer_id`, `organizer_name`, `organizer_email`, `password`) VALUES
(1, 'Company X', 'xcompany@gmail.com', 'password'),
(2, 'Company Y', 'ycompany@gmail.com', 'password'),
(3, 'Company Z', 'zcompany@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `organizer_event`
--

CREATE TABLE `organizer_event` (
  `organizer_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organizer_event`
--

INSERT INTO `organizer_event` (`organizer_id`, `event_id`) VALUES
(1, 4),
(2, 5),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `participant_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`participant_id`, `first_name`, `last_name`, `email`, `birthday`, `password`) VALUES
(1, 'James', 'Pang', 'abc@gmail.com', NULL, 'password'),
(2, 'Charles', 'Lee', 'abcd@gmail.com', '2018-10-17', 'password'),
(3, 'Abdul', 'Saleh', 'xyz@gmail.com', '2018-09-20', 'password'),
(4, 'Michael', 'Jackson', 'mj222@gmail.com', '1958-08-29', 'password'),
(5, 'Elton', 'John', 'ej123@gmail.com', '1947-03-25', 'password'),
(6, 'Justin', 'Bieber', 'jb123@gmail.com', '1994-03-08', 'password'),
(7, 'Ariana', 'Grande', 'ag222@gmail.com', '1993-06-26', 'password'),
(8, 'Taylor', 'Swift', 'ts222@gmail.com', '1989-12-13', 'password'),
(9, 'Tom', 'Holland', 'th222@gmail.com', '1996-06-01', 'password'),
(10, 'Dwayne', 'Johnson', 'dj222@gmail.com', '1972-05-02', 'password'),
(11, 'Will', 'Smith', 'ws222@gmail.com', '1968-09-25', 'password'),
(12, 'Robert', 'Downey Jr.', 'rdj222@gmail.com', '1965-04-04', 'password'),
(13, 'Chris', 'Hemsworth', 'ch222@gmail.com', '1983-08-11', 'password'),
(14, 'Johnny', 'Depp', 'jd222@gmail.com', '1963-06-09', 'password'),
(15, 'Chris', 'Evans', 'ce222@gmail.com', '1981-06-13', 'password'),
(16, 'Channing', 'Tatum', 'ct222@gmail.com', '1980-04-26', 'password'),
(17, 'Ryan', 'Reynolds', 'rr222@gmail.com', '1976-10-23', 'password'),
(18, 'Vin', 'Diesel', 'vd222@gmail.com', '1967-07-18', 'password'),
(19, 'Jackie', 'Chan', 'jc222@gmail.com', '1954-04-07', 'password'),
(20, 'Emma', 'Watson', 'ew123@gmail.com', '1990-04-15', 'password'),
(21, 'Jennifer', 'Lawrence', 'jl222@gmail.com', '1990-08-15', 'password'),
(22, 'Angelina', 'Jolie', 'aj222@gmail.com', '1975-06-04', 'password'),
(23, 'Scarlett', 'Johansson', 'sj222@gmail.com', '1984-11-22', 'password'),
(24, 'Mila', 'Kunis', 'ml222@gmail.com', '1983-08-14', 'password'),
(25, 'Gal', 'Gadot', 'gg222@gmail.com', '1985-04-30', 'password'),
(26, 'Kobe', 'Bryant', 'kb123@gmail.com', '1978-08-23', ''),
(27, 'Lebron', 'James', 'lj123@gmail.com', '1984-12-30', ''),
(28, 'Stephen', 'Curry', 'sc30@gmail.com', '1988-03-14', ''),
(29, 'Kevin', 'Durant', 'kd35@gmail.com', '1988-09-29', ''),
(30, 'Kyrie', 'Irving', 'ki11@gmail.com', '1992-03-23', ''),
(31, 'Russell', 'Westbrook', 'wb00@gmail.com', '1988-11-12', ''),
(32, 'Dwyane', 'Wade', 'dw123@gmail.com', '1982-01-17', ''),
(33, 'James', 'Harden', 'jh13@gmail.com', '1989-08-26', ''),
(34, 'Kawhi', 'Leonard', 'kl02@gmail.com', '1991-06-29', ''),
(35, 'Derrick', 'Rose', 'dr25@gmail.com', '1988-10-04', '');

-- --------------------------------------------------------

--
-- Table structure for table `participant_team`
--

CREATE TABLE `participant_team` (
  `participant_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `organizer_id` (`organizer_id`) USING BTREE;

--
-- Indexes for table `event_team`
--
ALTER TABLE `event_team`
  ADD KEY `team_id` (`team_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `organizer`
--
ALTER TABLE `organizer`
  ADD PRIMARY KEY (`organizer_id`),
  ADD UNIQUE KEY `organizer_email` (`organizer_email`);

--
-- Indexes for table `organizer_event`
--
ALTER TABLE `organizer_event`
  ADD KEY `organizer_id` (`organizer_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`participant_id`),
  ADD UNIQUE KEY `ID` (`participant_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `participant_team`
--
ALTER TABLE `participant_team`
  ADD KEY `participant_id` (`participant_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`),
  ADD UNIQUE KEY `team_name` (`team_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `organizer`
--
ALTER TABLE `organizer`
  MODIFY `organizer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `participant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_organizer_id` FOREIGN KEY (`organizer_id`) REFERENCES `organizer` (`organizer_id`),
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`organizer_id`) REFERENCES `organizer` (`organizer_id`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`organizer_id`) REFERENCES `organizer` (`organizer_id`);

--
-- Constraints for table `event_team`
--
ALTER TABLE `event_team`
  ADD CONSTRAINT `event_team_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`),
  ADD CONSTRAINT `event_team_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);

--
-- Constraints for table `organizer_event`
--
ALTER TABLE `organizer_event`
  ADD CONSTRAINT `organizer_event_ibfk_1` FOREIGN KEY (`organizer_id`) REFERENCES `organizer` (`organizer_id`),
  ADD CONSTRAINT `organizer_event_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);

--
-- Constraints for table `participant_team`
--
ALTER TABLE `participant_team`
  ADD CONSTRAINT `participant_team_ibfk_1` FOREIGN KEY (`participant_id`) REFERENCES `participant` (`participant_id`),
  ADD CONSTRAINT `participant_team_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
