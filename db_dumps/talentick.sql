-- phpMyAdmin SQL Dump
-- version 4.9.1deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2020 at 08:35 PM
-- Server version: 8.0.19-0ubuntu0.19.10.3
-- PHP Version: 7.3.11-0ubuntu0.19.10.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talentick`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `bid` int NOT NULL,
  `branch` varchar(30) NOT NULL,
  `dpid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`bid`, `branch`, `dpid`) VALUES
(1, 'Civil Engineering', 1),
(2, 'Software Engineering', 1),
(3, 'Mechanical Engineering', 1),
(4, 'Electrical Engineering', 1),
(5, 'Electrical And Electronics', 1),
(6, 'Integrated MCA', 2),
(7, 'Regular MCA', 2),
(8, 'Lateral MCA', 2),
(9, 'Civil Engineering', 3),
(10, 'Information Technology', 3),
(11, 'Computer Science', 3),
(12, 'Electrical Engineering', 3),
(13, 'Mechanical Engineering', 3),
(14, 'Electrical and Electronics Eng', 3);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dpid` int NOT NULL,
  `department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dpid`, `department`) VALUES
(1, 'M.Tech'),
(2, 'MCA'),
(3, 'B.Tech');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `jid` int NOT NULL,
  `logid` int NOT NULL,
  `pid` int NOT NULL,
  `jobss` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`jid`, `logid`, `pid`, `jobss`) VALUES
(13, 23, 35, 1),
(15, 24, 35, 1),
(16, 24, 43, 1),
(17, 24, 44, 1),
(18, 9, 45, 1),
(19, 9, 50, 1),
(20, 24, 50, 1),
(21, 26, 50, 1),
(22, 27, 50, 1),
(26, 27, 46, 1),
(27, 27, 44, 1),
(28, 24, 45, 1),
(29, 28, 43, 1),
(30, 8, 43, 1),
(31, 32, 44, 1),
(32, 32, 35, 1),
(33, 36, 51, 1),
(34, 36, 50, 1),
(35, 34, 52, 1),
(36, 9, 43, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE `job_posts` (
  `pid` int NOT NULL,
  `cid` int NOT NULL,
  `cname` varchar(30) NOT NULL,
  `job title` varchar(30) NOT NULL,
  `job type` int NOT NULL,
  `location` varchar(30) NOT NULL,
  `last date to apply` date NOT NULL,
  `backlog` int NOT NULL,
  `CGPA` double NOT NULL,
  `jobss` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`pid`, `cid`, `cname`, `job title`, `job type`, `location`, `last date to apply`, `backlog`, `CGPA`, `jobss`) VALUES
(35, 6, 'UST', 'CODING', 1, 'PATHANAMTHITTA', '2020-02-12', 2, 98, 1),
(43, 7, 'SOFTWARE', 'EXECUTE MANAGER', 1, 'MALAPURAM', '2020-02-26', 1, 50, 1),
(44, 1, 'TCS', 'FRONT-END MANAGER', 5, 'KOTTAYAM', '2020-02-26', 0, 75, 0),
(45, 5, 'FEDERAL', 'ADMINISTATOR', 1, 'TRIVANDRUM', '2020-02-26', 3, 85, 0),
(46, 3, 'Ibm', 'TESTING', 2, 'PALAKKAD', '2020-02-27', 1, 65, 0),
(50, 3, 'Ibm', 'FRONT-END MANAGER', 1, 'WAYYANADU', '2020-02-27', 2, 63, 0),
(51, 1, 'TCS', 'EXECUTE MANAGER', 1, 'KOZHIKOD', '2020-03-27', 0, 90, 0),
(52, 1, 'TCS', 'ADMINISTATOR', 1, 'KASARGOD', '2020-03-01', 1, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` int NOT NULL,
  `job_type` varchar(30) NOT NULL,
  `status` enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `job_type`, `status`) VALUES
(1, 'FULL-TIME', 'active'),
(2, 'PART-TIME', 'active'),
(5, 'CONTRACT', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `locationid` int NOT NULL,
  `location` varchar(35) NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locationid`, `location`, `status`) VALUES
(1, 'ALAPPUZHA', 1),
(2, 'ERANAKULAM', 1),
(3, 'IDUKKI', 1),
(4, 'KANNUR', 1),
(5, 'KASARGOD', 1),
(6, 'KOLLAM', 1),
(7, 'KOTTAYAM', 1),
(8, 'KOZHIKOD', 1),
(9, 'MALAPURAM', 1),
(10, 'PATHANAMTHITTA', 1),
(11, 'PALAKKAD', 1),
(12, 'THRISSUR', 1),
(13, 'TRIVANDRUM', 1),
(14, 'WAYYANADU', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `action_link` text COLLATE utf8_unicode_ci,
  `type` int NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_types`
--

CREATE TABLE `notification_types` (
  `id` int NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profile_id` int NOT NULL,
  `student_id` int NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(40) NOT NULL,
  `addressline2` varchar(50) NOT NULL,
  `addressline3` varchar(50) NOT NULL,
  `gpg` float NOT NULL,
  `gug` float NOT NULL,
  `gplus` float NOT NULL,
  `g10` float NOT NULL,
  `backlogs` int NOT NULL,
  `resume` varchar(30) NOT NULL,
  `city` varchar(40) NOT NULL,
  `Highest Qualification` varchar(30) NOT NULL,
  `pincode` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profile_id`, `student_id`, `dob`, `address`, `addressline2`, `addressline3`, `gpg`, `gug`, `gplus`, `g10`, `backlogs`, `resume`, `city`, `Highest Qualification`, `pincode`) VALUES
(8, 5, '2001-12-07', 'haritha bhavan', 'guruvayoor', 'thrissur', 89, 65, 78, 87, 0, '', 'Kottayam', '', 985623),
(9, 6, '2001-12-20', 'athul villa', 'kottiyam', 'kollam', 76, 85, 87, 98, 0, '', 'Kollam', '', 688034),
(18, 9, '2001-12-19', 'adsffsdgDS', 'ewaar', '', 80, 6.77778e20, 0, 655444, 0, '', 'Trivandrum', '', 654321),
(24, 11, '2001-12-10', 'asif manzil', 'kottiyam', 'kollam', 89, 87, 0, 0, 0, '', 'Kollam', '', 895623),
(26, 13, '1999-07-07', 'arun villa', 'karunagapally', '', 89, 85, 65, 85, 2, '', 'Kollam', '', 895623),
(27, 14, '1999-02-08', 'Achubhavan', 'palarivattam', '', 80, 85, 0, 91, 0, '', 'Ernakulam', '', 985623),
(28, 15, '1997-06-18', 'villa', 'mavelikara', '', 89, 65, 0, 75, 0, '', 'Alappuzha', '', 989562),
(32, 18, '1998-02-18', 'sharon villa', 'kanjirapally', '', 99, 99, 98, 89, 0, '', 'Kottayam', '', 985623),
(34, 19, '1997-06-30', 'gananadam', 'kappil', '', 73, 69, 85, 93, 0, '', 'Trivandrum', '', 895623),
(36, 21, '2001-11-25', 'asdfg', 'asdf', '', 99, 99, 99, 99, 0, '', 'Trivandrum', '', 6865188),
(38, 23, '0000-00-00', 'amala villa', 'manimala', '', 85, 80, 75, 90, 0, 'sruthicv.docx', 'Kottayam', '', 895623);

-- --------------------------------------------------------

--
-- Table structure for table `recruiters`
--

CREATE TABLE `recruiters` (
  `recruiter_id` int NOT NULL,
  `user_id` int NOT NULL,
  `company_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(40) NOT NULL,
  `website` text,
  `phone` varchar(15) NOT NULL,
  `address` varchar(40) NOT NULL,
  `license` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `city` varchar(30) NOT NULL,
  `pincode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruiters`
--

INSERT INTO `recruiters` (`recruiter_id`, `user_id`, `company_name`, `email`, `website`, `phone`, `address`, `license`, `city`, `pincode`) VALUES
(1, 3, 'TCS', 'tcs@gmail.com', NULL, '9856231478', 'tcstcs', '0', 'Bihar', '985623'),
(3, 13, 'Ibm', 'ibm@gmail.com', NULL, '9856231478', 'ibmcity', '0', 'delhi', '985623'),
(5, 16, 'FEDERAL', 'federal@gmail.com', NULL, '9856231147', 'federal care ', '0', 'Kerala', '985623'),
(6, 20, 'UST GLOBAL', 'ust@gmail.com', NULL, '8956231478', 'ust global tvm', '0', 'Kerala', '895623'),
(7, 22, 'SOFTWARE SOLUTIONS', 'soft@gmail.com', NULL, '89562314566', 'software solutions private limited', '0', 'Bihar', '859623'),
(8, 30, 'mu', 'ww@gmail.com', NULL, '856', 'adafsd', '0', 'Arunachal pradesh', '12232'),
(9, 43, 'jhhhhhhhhhhhhhhh', 's@gmail.com', NULL, '203', 'k', '44', 'Bihar', '85'),
(10, 44, 'ABC', 'abc@gmail.com', NULL, '8956231023', 'abcdhiiu', '789632', 'Kerala', '784523'),
(11, 46, 'ABCD', 'abcd@gmail.com', NULL, '9856230233', 'abcdoijug', '12365985', 'Bihar', '985623'),
(14, 76, 'MAXIMPROF', 'info@maximprof.com', 'maximprof.com', '+919847980829', '21/1, 20th I Cross, Ejippura', 'UIHIUHC3495846', 'Bangalore', '560047');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int NOT NULL,
  `user_id` int NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `gender` enum('Male','Female','Other') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'Other'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `user_id`, `firstname`, `lastname`, `mobile_number`, `gender`) VALUES
(5, 8, 'Haritha', 'N H', '9856231478', 'Female'),
(6, 9, 'athul', 'S N', '9947266566', 'Female'),
(7, 15, 'sruthi', 'kumar', '9633679875', 'Female'),
(8, 17, 'anitta', 's', '6677889900', 'Female'),
(9, 18, 'anu', 'a', '9876543212', 'Female'),
(10, 23, 'ammu', 's', '8956231452', 'Female'),
(11, 24, 'asif', 'ali', '8956231478', 'Female'),
(12, 25, 'arya', 'kumar', '9856231478', 'Female'),
(13, 26, 'arun', 'k s', '8956231478', 'Female'),
(14, 27, 'Achu', 'l', '8956231478', 'Female'),
(15, 28, 'aathira', 'ajith', '9895623145', 'Female'),
(16, 29, 'akil', 'achu', '9865231478', 'Male'),
(17, 31, 'athira', 'Ajith', '9856231478', 'Male'),
(18, 32, 'sharon ', 'kurian', '9856231455', 'Female'),
(19, 34, 'smriti', 'kumar', '8956231478', 'Female'),
(20, 35, 'anju', 'mathew', '9856231230', 'Female'),
(21, 36, 'teenu', 'v therese', '0', 'Female'),
(22, 37, 'Raj', 's', '8956231478', 'Female'),
(23, 38, 'amala', 'saji', '9856231230', 'Female'),
(24, 39, 'Rincy', 'mol', '8956231452', 'Female'),
(25, 40, 'sruthi', 'kumar', '9856231452', 'Female'),
(26, 42, 'lavanya', 's', '8596321230', 'Female'),
(27, 45, 'ganesh', 'prakash', '9856230236', 'Female'),
(28, 47, 'rahul', 's', '8956231023', 'Female'),
(29, 62, 'Krishnapriya', 'TM', '9497133973', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `type` enum('admin','recruiter','student','guest') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'guest',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `type`, `status`, `created_at`) VALUES
(1, 'admin@talentick.com', '2138cb5b0302e84382dd9b3677576b24', 'admin', 'active', '2020-04-22 07:59:44'),
(3, 'tcs@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', 'active', '2020-04-22 07:59:44'),
(6, 'wipro@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', 'active', '2020-04-22 07:59:44'),
(8, 'haritha@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(9, 'athul@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(13, 'ibm@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', 'active', '2020-04-22 07:59:44'),
(15, 'sruthi@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(16, 'federal@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', 'active', '2020-04-22 07:59:44'),
(17, 'anitta@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(18, 'a@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(20, 'ust@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', 'active', '2020-04-22 07:59:44'),
(22, 'soft@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', 'active', '2020-04-22 07:59:44'),
(23, 'ammu@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(24, 'asif@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(25, 'arya@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(26, 'arun@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(27, 'achu@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(28, 'athira@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(29, 'akil@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(30, 'percyjack288@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', 'active', '2020-04-22 07:59:44'),
(31, 'athira@gail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(32, 'sharon@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(34, 'smriti@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(35, 'Anju@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(36, 'teenuvtherese@amaljyothi.ac.in', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(37, 'raj@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(38, 'amala@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(39, 'rincymol.reji@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(40, 'shrutiskumar9633@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(42, 'lavanya@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(43, 's@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', 'active', '2020-04-22 07:59:44'),
(44, 'abc@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', 'active', '2020-04-22 07:59:44'),
(45, 'ganesh@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(46, 'abcd@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', 'active', '2020-04-22 07:59:44'),
(47, 'rahul@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-04-22 07:59:44'),
(62, 'krishnapriyatm777@gmail.com', '1fbd909ece4fcd4c1def26b7fae817d5', 'student', 'active', '2020-04-22 13:59:45'),
(76, 'sreekuttan@maximprof.com', '1fbd909ece4fcd4c1def26b7fae817d5', 'recruiter', 'active', '2020-04-22 16:45:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `dpid` (`dpid`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dpid`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`jid`),
  ADD KEY `logid` (`logid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `job type` (`job type`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`locationid`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `notification_types`
--
ALTER TABLE `notification_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `regid` (`student_id`);

--
-- Indexes for table `recruiters`
--
ALTER TABLE `recruiters`
  ADD PRIMARY KEY (`recruiter_id`),
  ADD KEY `loginid` (`user_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `login-id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `bid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dpid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `jid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `job_posts`
--
ALTER TABLE `job_posts`
  MODIFY `pid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `locationid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `recruiters`
--
ALTER TABLE `recruiters`
  MODIFY `recruiter_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`dpid`) REFERENCES `departments` (`dpid`);

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `logid` FOREIGN KEY (`logid`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `pid` FOREIGN KEY (`pid`) REFERENCES `job_posts` (`pid`);

--
-- Constraints for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD CONSTRAINT `job_posts_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `recruiters` (`recruiter_id`),
  ADD CONSTRAINT `job_posts_ibfk_2` FOREIGN KEY (`job type`) REFERENCES `job_types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`type`) REFERENCES `notification_types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `recruiters`
--
ALTER TABLE `recruiters`
  ADD CONSTRAINT `recruiters_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
