-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2018 at 10:08 PM
-- Server version: 10.1.30-MariaDB-0ubuntu0.17.10.1
-- PHP Version: 7.1.17-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmgt406_04_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Community`
--

CREATE TABLE `Community` (
  `CID` int(11) NOT NULL,
  `communityName` varchar(60) NOT NULL,
  `communityDesciption` text NOT NULL,
  `communityCreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Community`
--

INSERT INTO `Community` (`CID`, `communityName`, `communityDesciption`, `communityCreatedDate`) VALUES
(1, 'DC area wind energy group', 'We are wind energy enthusiasts living in Washington DC area', '2018-12-12 17:10:10'),
(2, 'Solar Energy in Arizona', 'we are solar energy community in Arizona', '2018-12-12 17:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `CommunityPosts`
--

CREATE TABLE `CommunityPosts` (
  `postID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CommunityPosts`
--

INSERT INTO `CommunityPosts` (`postID`, `CID`, `userID`, `title`, `content`) VALUES
(6, 1, 1, 'Offshore Wind farm near Maryland', 'Anyone here feel like backing up a offshore wind farm out of the coast of Maryland?');

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `fundID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectID` int(11) NOT NULL,
  `projectName` varchar(60) NOT NULL,
  `projectSummery` text NOT NULL,
  `projectDescription` longtext NOT NULL,
  `projectStartDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `projectEndDate` datetime DEFAULT NULL,
  `projectImage` varchar(100) NOT NULL DEFAULT './uploads/default.jpeg',
  `targetAmount` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectID`, `projectName`, `projectSummery`, `projectDescription`, `projectStartDate`, `projectEndDate`, `projectImage`, `targetAmount`) VALUES
(2, 'Offshore Wind Farm near Maryland', 'Build a big offshore wind farm near Maryland', 'Build a big offshore wind farm near Maryland. Expected 300MW', '2018-12-09 17:59:43', NULL, './uploads/default.jpeg', '5000000.00'),
(3, 'Offshore wind farm near Boston', 'Build a big offshore wind farm near Boston', 'Build a big offshore wind farm near Boston', '2018-12-10 17:40:04', '2019-01-24 00:00:00', './uploads/default.jpeg', '10000000.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `email`, `password`) VALUES
(1, 'Raymond Chen', 'raymond@umd.edu', '12345'),
(2, 'Bruce Ji', 'bruce@umd.edu', '12345'),
(5, 'Ray', 'a@umd.edu', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Community`
--
ALTER TABLE `Community`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `CommunityPosts`
--
ALTER TABLE `CommunityPosts`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `CommunityPosts_CID_Community_CID_FK` (`CID`),
  ADD KEY `CommunityPosts_userID_user_userID_FK` (`userID`);

--
-- Indexes for table `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`fundID`),
  ADD KEY `users_funds_FK` (`userID`),
  ADD KEY `projects_funds_FK` (`projectID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Community`
--
ALTER TABLE `Community`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `CommunityPosts`
--
ALTER TABLE `CommunityPosts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `funds`
--
ALTER TABLE `funds`
  MODIFY `fundID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `CommunityPosts`
--
ALTER TABLE `CommunityPosts`
  ADD CONSTRAINT `CommunityPosts_CID_Community_CID_FK` FOREIGN KEY (`CID`) REFERENCES `Community` (`CID`),
  ADD CONSTRAINT `CommunityPosts_userID_user_userID_FK` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `funds`
--
ALTER TABLE `funds`
  ADD CONSTRAINT `projects_funds_FK` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`),
  ADD CONSTRAINT `users_funds_FK` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
