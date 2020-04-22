-- phpMyAdmin SQL Dump
-- version 4.9.1deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2020 at 04:19 PM
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
-- Database: `talenttick`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `bid` int NOT NULL,
  `branch` varchar(30) NOT NULL,
  `dpid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`bid`, `branch`, `dpid`) VALUES
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
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `comid` int NOT NULL,
  `company` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`comid`, `company`, `status`) VALUES
(5, 'FEDERAL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `compnygetdetails`
--

CREATE TABLE `compnygetdetails` (
  `studid` int NOT NULL,
  `regid` int NOT NULL,
  `attended` int NOT NULL,
  `passed` int NOT NULL,
  `failed` int NOT NULL,
  `college _namw` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cregister`
--

CREATE TABLE `cregister` (
  `cid` int NOT NULL,
  `loginid` int NOT NULL,
  `cname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phno` bigint NOT NULL,
  `address` varchar(40) NOT NULL,
  `license` varchar(11) NOT NULL,
  `city` varchar(30) NOT NULL,
  `pincode` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cregister`
--

INSERT INTO `cregister` (`cid`, `loginid`, `cname`, `email`, `phno`, `address`, `license`, `city`, `pincode`) VALUES
(1, 3, 'TCS', 'tcs@gmail.com', 9856231478, 'tcstcs', '0', 'Bihar', 985623),
(3, 13, 'Ibm', 'ibm@gmail.com', 9856231478, 'ibmcity', '0', 'delhi', 985623),
(5, 16, 'FEDERAL', 'federal@gmail.com', 9856231147, 'federal care ', '0', 'Kerala', 985623),
(6, 20, 'UST GLOBAL', 'ust@gmail.com', 8956231478, 'ust global tvm', '0', 'Kerala', 895623),
(7, 22, 'SOFTWARE SOLUTIONS', 'soft@gmail.com', 89562314566, 'software solutions private limited', '0', 'Bihar', 859623),
(8, 30, 'mu', 'ww@gmail.com', 856, 'adafsd', '0', 'Arunachal pradesh', 12232),
(9, 43, 'jhhhhhhhhhhhhhhh', 's@gmail.com', 203, 'k', '44', 'Bihar', 85),
(10, 44, 'ABC', 'abc@gmail.com', 8956231023, 'abcdhiiu', '789632', 'Kerala', 784523),
(11, 46, 'ABCD', 'abcd@gmail.com', 9856230233, 'abcdoijug', '12365985', 'Bihar', 985623);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dpid` int NOT NULL,
  `department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dpid`, `department`) VALUES
(1, 'M.Tech'),
(2, 'MCA'),
(3, 'B.Tech');

-- --------------------------------------------------------

--
-- Table structure for table `jobpost`
--

CREATE TABLE `jobpost` (
  `pid` int NOT NULL,
  `cid` int NOT NULL,
  `cname` varchar(30) NOT NULL,
  `job title` varchar(30) NOT NULL,
  `job type` varchar(20) NOT NULL,
  `location` varchar(30) NOT NULL,
  `last date to apply` date NOT NULL,
  `backlog` int NOT NULL,
  `CGPA` double NOT NULL,
  `jobss` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobpost`
--

INSERT INTO `jobpost` (`pid`, `cid`, `cname`, `job title`, `job type`, `location`, `last date to apply`, `backlog`, `CGPA`, `jobss`) VALUES
(35, 6, 'UST', 'CODING', 'PART-TIME', 'PATHANAMTHITTA', '2020-02-12', 2, 98, 1),
(43, 7, 'SOFTWARE', 'EXECUTE MANAGER', 'PART-TIME', 'MALAPURAM', '2020-02-26', 1, 50, 1),
(44, 1, 'TCS', 'FRONT-END MANAGER', 'PART-TIME', 'KOTTAYAM', '2020-02-26', 0, 75, 0),
(45, 5, 'FEDERAL', 'ADMINISTATOR', 'PERMANENT', 'TRIVANDRUM', '2020-02-26', 3, 85, 0),
(46, 3, 'Ibm', 'TESTING', 'PERMANENT', 'PALAKKAD', '2020-02-27', 1, 65, 0),
(50, 3, 'Ibm', 'FRONT-END MANAGER', 'PERMANENT', 'WAYYANADU', '2020-02-27', 2, 63, 0),
(51, 1, 'TCS', 'EXECUTE MANAGER', 'PART-TIME', 'KOZHIKOD', '2020-03-27', 0, 90, 0),
(52, 1, 'TCS', 'ADMINISTATOR', 'FULL-TIME', 'KASARGOD', '2020-03-01', 1, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_apply`
--

CREATE TABLE `job_apply` (
  `jid` int NOT NULL,
  `logid` int NOT NULL,
  `pid` int NOT NULL,
  `jobss` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_apply`
--

INSERT INTO `job_apply` (`jid`, `logid`, `pid`, `jobss`) VALUES
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
-- Table structure for table `job_title`
--

CREATE TABLE `job_title` (
  `jobid` int NOT NULL,
  `job_title` varchar(30) NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_title`
--

INSERT INTO `job_title` (`jobid`, `job_title`, `status`) VALUES
(1, 'TESTING', 1),
(2, 'CODING', 1),
(3, 'FRONT-END MANAGER', 1),
(4, 'ADMINISTATOR', 1),
(5, 'EXECUTE MANAGER', 1),
(6, 'WEB DEVELOPER', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE `job_type` (
  `typeid` int NOT NULL,
  `job_type` varchar(30) NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`typeid`, `job_type`, `status`) VALUES
(1, 'FULL-TIME', 1),
(2, 'PART-TIME', 1),
(5, 'PERMANENT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationid` int NOT NULL,
  `location` varchar(35) NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationid`, `location`, `status`) VALUES
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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `pid` int NOT NULL,
  `regid` int NOT NULL,
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
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`pid`, `regid`, `dob`, `address`, `addressline2`, `addressline3`, `gpg`, `gug`, `gplus`, `g10`, `backlogs`, `resume`, `city`, `Highest Qualification`, `pincode`) VALUES
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
-- Table structure for table `recent_status`
--

CREATE TABLE `recent_status` (
  `id` int NOT NULL,
  `cname` varchar(30) NOT NULL,
  `job_title` varchar(30) NOT NULL,
  `job_type` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `last_date_to_apply` date NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `regid` int NOT NULL,
  `loginid` int NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `mobileno` bigint NOT NULL,
  `gender` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`regid`, `loginid`, `firstname`, `lastname`, `mobileno`, `gender`, `status`) VALUES
(5, 8, 'Haritha', 'N H', 9856231478, 'Female', 1),
(6, 9, 'athul', 'S N', 9947266566, 'Male', 1),
(7, 15, 'sruthi', 'kumar', 9633679875, 'Female', 1),
(8, 17, 'anitta', 's', 6677889900, 'Male', 1),
(9, 18, 'anu', 'a', 9876543212, 'Male', 1),
(10, 23, 'ammu', 's', 8956231452, 'Female', 1),
(11, 24, 'asif', 'ali', 8956231478, 'Male', 1),
(12, 25, 'arya', 'kumar', 9856231478, 'Female', 1),
(13, 26, 'arun', 'k s', 8956231478, 'Male', 1),
(14, 27, 'Achu', 'l', 8956231478, 'Male', 1),
(15, 28, 'aathira', 'ajith', 9895623145, 'Female', 1),
(16, 29, 'akil', 'achu', 9865231478, 'Male', 1),
(17, 31, 'athira', 'Ajith', 9856231478, 'Female', 1),
(18, 32, 'sharon ', 'kurian', 9856231455, 'Female', 1),
(19, 34, 'smriti', 'kumar', 8956231478, 'Female', 1),
(20, 35, 'anju', 'mathew', 9856231230, 'Female', 1),
(21, 36, 'teenu', 'v therese', 0, 'Female', 1),
(22, 37, 'Raj', 's', 8956231478, 'Male', 1),
(23, 38, 'amala', 'saji', 9856231230, 'Female', 1),
(24, 39, 'Rincy', 'mol', 8956231452, 'Female', 1),
(25, 40, 'sruthi', 'kumar', 9856231452, 'Gender', 1),
(26, 42, 'lavanya', 's', 8596321230, 'Female', 1),
(27, 45, 'ganesh', 'prakash', 9856230236, 'Male', 1),
(28, 47, 'rahul', 's', 8956231023, 'Male', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stud_recent_job`
--

CREATE TABLE `stud_recent_job` (
  `id` int NOT NULL,
  `loginid` int NOT NULL,
  `cid` int NOT NULL,
  `cname` varchar(30) NOT NULL,
  `job_title` varchar(30) NOT NULL,
  `job_type` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `last_date_to_apply` date NOT NULL,
  `backlogs` int NOT NULL,
  `CGPA` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `type` enum('admin','recruiter','student','guest') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'guest',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `type`, `created_at`) VALUES
(1, 'admin@talentick.com', '2138cb5b0302e84382dd9b3677576b24', 'admin', '2020-04-22 07:59:44'),
(3, 'tcs@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', '2020-04-22 07:59:44'),
(6, 'wipro@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', '2020-04-22 07:59:44'),
(8, 'haritha@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(9, 'athul@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(13, 'ibm@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', '2020-04-22 07:59:44'),
(15, 'sruthi@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(16, 'federal@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', '2020-04-22 07:59:44'),
(17, 'anitta@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(18, 'a@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(20, 'ust@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', '2020-04-22 07:59:44'),
(22, 'soft@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', '2020-04-22 07:59:44'),
(23, 'ammu@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(24, 'asif@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(25, 'arya@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(26, 'arun@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(27, 'achu@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(28, 'athira@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(29, 'akil@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(30, 'percyjack288@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', '2020-04-22 07:59:44'),
(31, 'athira@gail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(32, 'sharon@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(34, 'smriti@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(35, 'Anju@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(36, 'teenuvtherese@amaljyothi.ac.in', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(37, 'raj@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(38, 'amala@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(39, 'rincymol.reji@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(40, 'shrutiskumar9633@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(42, 'lavanya@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(43, 's@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', '2020-04-22 07:59:44'),
(44, 'abc@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', '2020-04-22 07:59:44'),
(45, 'ganesh@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44'),
(46, 'abcd@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', '2020-04-22 07:59:44'),
(47, 'rahul@gmail.com', '2138cb5b0302e84382dd9b3677576b24', 'student', '2020-04-22 07:59:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `dpid` (`dpid`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`comid`);

--
-- Indexes for table `compnygetdetails`
--
ALTER TABLE `compnygetdetails`
  ADD PRIMARY KEY (`studid`);

--
-- Indexes for table `cregister`
--
ALTER TABLE `cregister`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `loginid` (`loginid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dpid`);

--
-- Indexes for table `jobpost`
--
ALTER TABLE `jobpost`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `job_apply`
--
ALTER TABLE `job_apply`
  ADD PRIMARY KEY (`jid`),
  ADD KEY `logid` (`logid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `job_title`
--
ALTER TABLE `job_title`
  ADD PRIMARY KEY (`jobid`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`typeid`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `regid` (`regid`);

--
-- Indexes for table `recent_status`
--
ALTER TABLE `recent_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`regid`),
  ADD KEY `login-id` (`loginid`);

--
-- Indexes for table `stud_recent_job`
--
ALTER TABLE `stud_recent_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loginid` (`loginid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `loginid_2` (`loginid`);

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
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `bid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `comid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `compnygetdetails`
--
ALTER TABLE `compnygetdetails`
  MODIFY `studid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cregister`
--
ALTER TABLE `cregister`
  MODIFY `cid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dpid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobpost`
--
ALTER TABLE `jobpost`
  MODIFY `pid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `job_apply`
--
ALTER TABLE `job_apply`
  MODIFY `jid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `job_title`
--
ALTER TABLE `job_title`
  MODIFY `jobid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_type`
--
ALTER TABLE `job_type`
  MODIFY `typeid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `pid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `recent_status`
--
ALTER TABLE `recent_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `regid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `stud_recent_job`
--
ALTER TABLE `stud_recent_job`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`dpid`) REFERENCES `department` (`dpid`);

--
-- Constraints for table `cregister`
--
ALTER TABLE `cregister`
  ADD CONSTRAINT `cregister_ibfk_1` FOREIGN KEY (`loginid`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `jobpost`
--
ALTER TABLE `jobpost`
  ADD CONSTRAINT `jobpost_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `cregister` (`cid`);

--
-- Constraints for table `job_apply`
--
ALTER TABLE `job_apply`
  ADD CONSTRAINT `logid` FOREIGN KEY (`logid`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `pid` FOREIGN KEY (`pid`) REFERENCES `jobpost` (`pid`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`regid`) REFERENCES `register` (`regid`);

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`loginid`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `stud_recent_job`
--
ALTER TABLE `stud_recent_job`
  ADD CONSTRAINT `stud_recent_job_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `cregister` (`cid`),
  ADD CONSTRAINT `stud_recent_job_ibfk_2` FOREIGN KEY (`loginid`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
