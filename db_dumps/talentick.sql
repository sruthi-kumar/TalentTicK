-- phpMyAdmin SQL Dump
-- version 4.9.1deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2020 at 12:30 AM
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
  `id` int NOT NULL,
  `branch` varchar(30) NOT NULL,
  `department_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch`, `department_id`) VALUES
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
  `id` int NOT NULL,
  `department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`) VALUES
(1, 'M.Tech'),
(2, 'MCA'),
(3, 'B.Tech');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int NOT NULL,
  `recruiter` int NOT NULL,
  `job_title` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `job_description` text NOT NULL,
  `job_type` int NOT NULL,
  `state_id` int NOT NULL,
  `district_id` int NOT NULL,
  `last_date_to_apply` date NOT NULL,
  `backlog_count` int NOT NULL,
  `CGPA_min` double NOT NULL,
  `CGPA_max` double NOT NULL,
  `salary_min` double NOT NULL,
  `salary_max` double NOT NULL,
  `vacancies` tinyint(1) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `recruiter`, `job_title`, `job_description`, `job_type`, `state_id`, `district_id`, `last_date_to_apply`, `backlog_count`, `CGPA_min`, `CGPA_max`, `salary_min`, `salary_max`, `vacancies`, `status`, `created_at`) VALUES
(35, 6, 'CODING', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, 1, '2020-02-12', 2, 98, 0, 0, 0, 1, 'active', '2020-04-27 05:36:41'),
(43, 7, 'EXECUTE MANAGER', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, 1, '2020-02-26', 1, 50, 0, 0, 0, 1, 'active', '2020-04-27 05:36:41'),
(44, 1, 'FRONT-END MANAGER', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', 5, 1, 1, '2020-02-26', 0, 75, 0, 0, 0, 0, 'active', '2020-04-27 05:36:41'),
(45, 5, 'ADMINISTATOR', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, 1, '2020-02-26', 3, 85, 0, 0, 0, 0, 'active', '2020-04-27 05:36:41'),
(46, 3, 'TESTING', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', 2, 1, 1, '2020-02-27', 1, 65, 0, 0, 0, 0, 'active', '2020-04-27 05:36:41'),
(50, 3, 'FRONT-END MANAGER', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, 1, '2020-02-27', 2, 63, 0, 0, 0, 0, 'active', '2020-04-27 05:36:41'),
(51, 1, 'EXECUTE MANAGER', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', 1, 1, 1, '2020-03-27', 0, 90, 0, 0, 0, 0, 'active', '2020-04-27 05:36:41'),
(52, 1, 'ADMINISTATOR', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, 1, '2020-03-01', 1, 20, 0, 0, 0, 0, 'active', '2020-04-27 05:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int NOT NULL,
  `user` int NOT NULL,
  `job` int NOT NULL,
  `status` enum('pending','accepted','rejected') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `user`, `job`, `status`, `created_at`) VALUES
(13, 23, 35, 'pending', '2020-04-27 13:36:29'),
(15, 24, 35, 'pending', '2020-04-27 13:36:29'),
(16, 24, 43, 'pending', '2020-04-27 13:36:29'),
(17, 24, 44, 'pending', '2020-04-27 13:36:29'),
(18, 9, 45, 'pending', '2020-04-27 13:36:29'),
(19, 9, 50, 'pending', '2020-04-27 13:36:29'),
(20, 24, 50, 'pending', '2020-04-27 13:36:29'),
(21, 26, 50, 'pending', '2020-04-27 13:36:29'),
(22, 27, 50, 'pending', '2020-04-27 13:36:29'),
(26, 27, 46, 'pending', '2020-04-27 13:36:29'),
(27, 27, 44, 'pending', '2020-04-27 13:36:29'),
(28, 24, 45, 'pending', '2020-04-27 13:36:29'),
(29, 28, 43, 'pending', '2020-04-27 13:36:29'),
(30, 8, 43, 'pending', '2020-04-27 13:36:29'),
(31, 32, 44, 'pending', '2020-04-27 13:36:29'),
(32, 32, 35, 'pending', '2020-04-27 13:36:29'),
(33, 36, 51, 'pending', '2020-04-27 13:36:29'),
(34, 36, 50, 'pending', '2020-04-27 13:36:29'),
(35, 34, 52, 'pending', '2020-04-27 13:36:29'),
(36, 9, 43, 'pending', '2020-04-27 13:36:29');

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
-- Table structure for table `location_districts`
--

CREATE TABLE `location_districts` (
  `id` int NOT NULL,
  `state_id` int NOT NULL,
  `district` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_districts`
--

INSERT INTO `location_districts` (`id`, `state_id`, `district`, `status`) VALUES
(1, 13, 'ALAPPUZHA', 1),
(2, 13, 'ERANAKULAM', 1),
(3, 13, 'IDUKKI', 1),
(4, 13, 'KANNUR', 1),
(5, 13, 'KASARGOD', 1),
(6, 13, 'KOLLAM', 1),
(7, 13, 'KOTTAYAM', 1),
(8, 13, 'KOZHIKOD', 1),
(9, 13, 'MALAPURAM', 1),
(10, 13, 'PATHANAMTHITTA', 1),
(11, 13, 'PALAKKAD', 1),
(12, 13, 'THRISSUR', 1),
(13, 13, 'TRIVANDRUM', 1),
(14, 13, 'WAYYANADU', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location_states`
--

CREATE TABLE `location_states` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location_states`
--

INSERT INTO `location_states` (`id`, `name`) VALUES
(1, 'Andra Pradesh'),
(2, 'Arunachal Pradesh'),
(3, 'Assam'),
(4, 'Bihar'),
(5, 'Chhattisgarh'),
(6, 'Goa'),
(7, 'Gujarat'),
(8, 'Haryana'),
(9, 'Himachal Pradesh'),
(10, 'Jammu and Kashmir'),
(11, 'Jharkhand'),
(12, 'Karnataka'),
(13, 'Kerala'),
(14, 'Madhya Pradesh'),
(15, 'Maharashtra'),
(16, 'Manipur'),
(17, 'Meghalaya'),
(18, 'Mizoram'),
(19, 'Nagaland'),
(20, 'Odisha'),
(21, 'Punjab'),
(22, 'Rajasthan'),
(23, 'Sikkim'),
(24, 'Tamil Nadu'),
(25, 'Telangana'),
(26, 'Tripura'),
(27, 'Uttaranchal'),
(28, 'Uttar Pradesh'),
(29, 'West Bengal'),
(30, 'Andaman and Nicobar Islands'),
(31, 'Chandigarh'),
(32, 'Dadar and Nagar Haveli'),
(33, 'Daman and Diu'),
(34, 'Delhi'),
(35, 'Lakshadeep'),
(36, 'Pondicherry');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint NOT NULL,
  `user` int NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `action_link` text COLLATE utf8_unicode_ci,
  `type` enum('info','warning','error') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'info',
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user`, `title`, `description`, `action_link`, `type`, `status`, `created_at`) VALUES
(1, 1, 'Test Notification', 'Test Notification details', '', 'info', 'active', '2020-04-26 19:07:52'),
(2, 1, 'Test Notification 2', 'Test Notification 2 details', '/student/test2', 'info', 'active', '2020-04-26 19:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profile_id` int NOT NULL,
  `student_id` int NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(40) NOT NULL,
  `addressline2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `addressline3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `state_id` int NOT NULL,
  `district_id` int NOT NULL,
  `pincode` int NOT NULL,
  `cgpa` float NOT NULL,
  `gpg` float NOT NULL,
  `gug` float NOT NULL,
  `gplus` float NOT NULL,
  `g10` float NOT NULL,
  `backlogs` int NOT NULL,
  `resume` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `highest_qualification` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profile_id`, `student_id`, `dob`, `address`, `addressline2`, `addressline3`, `state_id`, `district_id`, `pincode`, `cgpa`, `gpg`, `gug`, `gplus`, `g10`, `backlogs`, `resume`, `highest_qualification`) VALUES
(8, 5, '2001-12-07', 'haritha bhavan', 'guruvayoor', 'thrissur', 13, 1, 985623, 0, 89, 65, 78, 87, 0, NULL, NULL),
(9, 6, '2001-12-20', 'athul villa', 'kottiyam', 'kollam', 13, 1, 688034, 0, 76, 85, 87, 98, 0, NULL, NULL),
(18, 9, '2001-12-19', 'adsffsdgDS', 'ewaar', '', 13, 1, 654321, 0, 80, 6.77778e20, 0, 655444, 0, NULL, NULL),
(24, 11, '2001-12-10', 'asif manzil', 'kottiyam', 'kollam', 13, 1, 895623, 0, 89, 87, 0, 0, 0, NULL, NULL),
(26, 13, '1999-07-07', 'arun villa', 'karunagapally', '', 13, 1, 895623, 0, 89, 85, 65, 85, 2, NULL, NULL),
(27, 14, '1999-02-08', 'Achubhavan', 'palarivattam', '', 13, 1, 985623, 0, 80, 85, 0, 91, 0, NULL, NULL),
(28, 15, '1997-06-18', 'villa', 'mavelikara', '', 13, 1, 989562, 0, 89, 65, 0, 75, 0, NULL, NULL),
(32, 18, '1998-02-18', 'sharon villa', 'kanjirapally', '', 13, 1, 985623, 0, 99, 99, 98, 89, 0, NULL, NULL),
(34, 19, '1997-06-30', 'gananadam', 'kappil', '', 13, 1, 895623, 0, 73, 69, 85, 93, 0, NULL, NULL),
(36, 21, '2001-11-25', 'asdfg', 'asdf', '', 13, 1, 6865188, 0, 99, 99, 99, 99, 0, NULL, NULL),
(38, 23, '2001-11-25', 'amala villa', 'manimala', '', 13, 1, 895623, 0, 85, 80, 75, 90, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recruiters`
--

CREATE TABLE `recruiters` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `company_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(40) NOT NULL,
  `website` text,
  `phone` varchar(15) NOT NULL,
  `address` varchar(40) NOT NULL,
  `license` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `city` varchar(30) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `status` enum('pending','approved') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruiters`
--

INSERT INTO `recruiters` (`id`, `user_id`, `company_name`, `email`, `website`, `phone`, `address`, `license`, `city`, `pincode`, `status`, `created_at`) VALUES
(1, 3, 'TCS', 'tcs@gmail.com', NULL, '9856231478', 'tcstcs', '0', 'Bihar', '985623', 'pending', '2020-04-27 05:41:02'),
(3, 13, 'Ibm', 'ibm@gmail.com', NULL, '9856231478', 'ibmcity', '0', 'delhi', '985623', 'pending', '2020-04-27 05:41:02'),
(5, 16, 'FEDERAL', 'federal@gmail.com', NULL, '9856231147', 'federal care ', '0', 'Kerala', '985623', 'pending', '2020-04-27 05:41:02'),
(6, 20, 'UST GLOBAL', 'ust@gmail.com', NULL, '8956231478', 'ust global tvm', '0', 'Kerala', '895623', 'pending', '2020-04-27 05:41:02'),
(7, 22, 'SOFTWARE SOLUTIONS', 'soft@gmail.com', NULL, '89562314566', 'software solutions private limited', '0', 'Bihar', '859623', 'pending', '2020-04-27 05:41:02'),
(8, 30, 'mu', 'ww@gmail.com', NULL, '856', 'adafsd', '0', 'Arunachal pradesh', '12232', 'pending', '2020-04-27 05:41:02'),
(9, 43, 'jhhhhhhhhhhhhhhh', 's@gmail.com', NULL, '203', 'k', '44', 'Bihar', '85', 'pending', '2020-04-27 05:41:02'),
(10, 44, 'ABC', 'abc@gmail.com', NULL, '8956231023', 'abcdhiiu', '789632', 'Kerala', '784523', 'pending', '2020-04-27 05:41:02'),
(11, 46, 'ABCD', 'abcd@gmail.com', NULL, '9856230233', 'abcdoijug', '12365985', 'Bihar', '985623', 'pending', '2020-04-27 05:41:02'),
(14, 76, 'MAXIMPROF', 'info@maximprof.com', 'maximprof.com', '+919847980829', '21/1, 20th I Cross, Ejippura', 'UIHIUHC3495846', 'Bangalore', '560047', 'pending', '2020-04-27 05:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `gender` enum('Male','Female','Other') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'Other',
  `branch_id` int NOT NULL,
  `payment_status` enum('pending','paid') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `firstname`, `lastname`, `mobile_number`, `gender`, `branch_id`, `payment_status`, `created_at`) VALUES
(5, 8, 'Haritha', 'N H', '9856231478', 'Female', 3, 'pending', '2020-04-26 21:23:40'),
(6, 9, 'athul', 'S N', '9947266566', 'Female', 1, 'pending', '2020-04-26 21:23:40'),
(7, 15, 'sruthi', 'kumar', '9633679875', 'Female', 7, 'pending', '2020-04-26 21:23:40'),
(8, 17, 'anitta', 's', '6677889900', 'Female', 1, 'pending', '2020-04-26 21:23:40'),
(9, 18, 'anu', 'a', '9876543212', 'Female', 1, 'pending', '2020-04-26 21:23:40'),
(10, 23, 'ammu', 's', '8956231452', 'Female', 1, 'pending', '2020-04-26 21:23:40'),
(11, 24, 'asif', 'ali', '8956231478', 'Female', 10, 'pending', '2020-04-26 21:23:40'),
(12, 25, 'arya', 'kumar', '9856231478', 'Female', 1, 'pending', '2020-04-26 21:23:40'),
(13, 26, 'arun', 'k s', '8956231478', 'Female', 12, 'pending', '2020-04-26 21:23:40'),
(14, 27, 'Achu', 'l', '8956231478', 'Female', 1, 'pending', '2020-04-26 21:23:40'),
(15, 28, 'aathira', 'ajith', '9895623145', 'Female', 1, 'pending', '2020-04-26 21:23:40'),
(16, 29, 'akil', 'achu', '9865231478', 'Male', 1, 'pending', '2020-04-26 21:23:40'),
(17, 31, 'athira', 'Ajith', '9856231478', 'Male', 1, 'pending', '2020-04-26 21:23:40'),
(18, 32, 'sharon ', 'kurian', '9856231455', 'Female', 1, 'pending', '2020-04-26 21:23:40'),
(19, 34, 'smriti', 'kumar', '8956231478', 'Female', 1, 'pending', '2020-04-26 21:23:40'),
(20, 35, 'anju', 'mathew', '9856231230', 'Female', 1, 'pending', '2020-04-26 21:23:40'),
(21, 36, 'teenu', 'v therese', '0', 'Female', 1, 'pending', '2020-04-26 21:23:40'),
(22, 37, 'Raj', 's', '8956231478', 'Female', 1, 'pending', '2020-04-26 21:23:40'),
(23, 38, 'amala', 'saji', '9856231230', 'Female', 1, 'pending', '2020-04-26 21:23:40'),
(24, 39, 'Rincy', 'mol', '8956231452', 'Female', 1, 'pending', '2020-04-26 21:23:40'),
(25, 40, 'sruthi', 'kumar', '9856231452', 'Female', 4, 'pending', '2020-04-26 21:23:40'),
(26, 42, 'lavanya', 's', '8596321230', 'Female', 1, 'pending', '2020-04-26 21:23:40'),
(27, 45, 'ganesh', 'prakash', '9856230236', 'Female', 1, 'pending', '2020-04-26 21:23:40'),
(28, 47, 'rahul', 's', '8956231023', 'Female', 1, 'pending', '2020-04-26 21:23:40'),
(29, 62, 'Krishnapriya', 'TM', '9497133973', 'Female', 6, 'pending', '2020-04-26 21:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int NOT NULL,
  `user` int NOT NULL,
  `user_type` enum('student','recruiter') COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('approved','pending','rejected') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `show_in_web` enum('yes','no') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `user`, `user_type`, `description`, `status`, `show_in_web`, `created_at`) VALUES
(1, 15, 'student', 'Blah Bhalh lzkdncklnsd sdl dsdfh knfkvjn xckvnxcjkvn xckjv c vxcjvncbv', 'pending', 'no', '2020-04-26 21:06:37'),
(2, 8, 'student', 'Blah Bhalh lzkdncklnsd sdl dsdfh knfkvjn xckvnxcjkvn xckjv c vxcjvncbv', 'pending', 'yes', '2020-04-26 21:06:37'),
(3, 6, 'recruiter', 'Blah Bhalh lzkdncklnsd sdl dsdfh knfkvjn xckvnxcjkvn xckjv c vxcjvncbv', 'pending', 'no', '2020-04-26 21:06:37');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `dpid` (`department_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`recruiter`),
  ADD KEY `job type` (`job_type`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logid` (`user`),
  ADD KEY `pid` (`job`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_districts`
--
ALTER TABLE `location_districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `location_states`
--
ALTER TABLE `location_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `regid` (`student_id`),
  ADD KEY `district_id` (`district_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `recruiters`
--
ALTER TABLE `recruiters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loginid` (`user_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login-id` (`user_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `location_districts`
--
ALTER TABLE `location_districts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `location_states`
--
ALTER TABLE `location_states`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `recruiters`
--
ALTER TABLE `recruiters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`recruiter`) REFERENCES `recruiters` (`id`),
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`job_type`) REFERENCES `job_types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jobs_ibfk_3` FOREIGN KEY (`state_id`) REFERENCES `location_states` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jobs_ibfk_4` FOREIGN KEY (`district_id`) REFERENCES `location_districts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `logid` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `pid` FOREIGN KEY (`job`) REFERENCES `jobs` (`id`);

--
-- Constraints for table `location_districts`
--
ALTER TABLE `location_districts`
  ADD CONSTRAINT `location_districts_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `location_states` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `profiles_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `location_districts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `profiles_ibfk_3` FOREIGN KEY (`state_id`) REFERENCES `location_states` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `recruiters`
--
ALTER TABLE `recruiters`
  ADD CONSTRAINT `recruiters_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
