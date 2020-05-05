-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2020 at 11:47 PM
-- Server version: 8.0.20-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

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
(14, 'Electrical and Electronics Eng', 3),
(15, 'Electronics & Communications', 1);

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
(3, 'B.Tech'),
(1, 'M.Tech'),
(2, 'MCA');

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
  `district_id` int NOT NULL,
  `qualified_branches` text,
  `CGPA_min` double NOT NULL,
  `backlog_count` int NOT NULL,
  `salary_min` double NOT NULL,
  `salary_max` double NOT NULL,
  `vacancies` tinyint(1) NOT NULL,
  `status` enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active',
  `last_date_to_apply` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 'CONTRACT', 'active');

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
(1, 1, 'Tetsimonial Posted/Updated By Member', 'Tetsimonial Posted/Updated By Member. \n  Please check and validate ', '', 'info', 'active', '2020-04-28 09:20:40'),
(2, 1, 'Tetsimonial Posted/Updated By Member', 'Tetsimonial Posted/Updated By Member. \n  Please check and validate ', '', 'info', 'active', '2020-04-28 10:16:29'),
(3, 1, 'Tetsimonial Posted/Updated By Member', 'Tetsimonial Posted/Updated By Member. \n  Please check and validate ', '', 'info', 'active', '2020-04-28 10:18:07'),
(4, 1, 'New Recruiter Registered', 'New Recruiter Registerd in Portal.\n Please check & verify', '', 'info', 'active', '2020-04-28 16:31:55'),
(7, 1, 'Tetsimonial Posted/Updated By Member', 'Tetsimonial Posted/Updated By Member. \n  Please check and validate ', '', 'info', 'active', '2020-04-28 19:45:34'),
(8, 1, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : WEB DEVELOPER  <br>\n\n		Job Description : zczxczxc  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-04-28 19:46:56'),
(9, 38, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : WEB DEVELOPER  <br>\n\n		Job Description : zczxczxc  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-04-28 19:46:56'),
(10, 36, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : WEB DEVELOPER  <br>\n\n		Job Description : zczxczxc  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-04-28 19:46:56'),
(11, 34, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : WEB DEVELOPER  <br>\n\n		Job Description : zczxczxc  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-04-28 19:46:56'),
(12, 32, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : WEB DEVELOPER  <br>\n\n		Job Description : zczxczxc  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-04-28 19:46:56'),
(13, 28, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : WEB DEVELOPER  <br>\n\n		Job Description : zczxczxc  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-04-28 19:46:56'),
(14, 27, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : WEB DEVELOPER  <br>\n\n		Job Description : zczxczxc  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-04-28 19:46:56'),
(15, 18, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : WEB DEVELOPER  <br>\n\n		Job Description : zczxczxc  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-04-28 19:46:56'),
(16, 9, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : WEB DEVELOPER  <br>\n\n		Job Description : zczxczxc  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-04-28 19:46:56'),
(17, 1, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : WEB DEVELOPER  <br>\n\n		Job Description : asds dsd  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-04-30 14:04:39'),
(18, 24, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : WEB DEVELOPER  <br>\n\n		Job Description : asds dsd  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'inactive', '2020-04-30 14:04:39'),
(19, 1, 'Tetsimonial Posted/Updated By Member', 'Tetsimonial Posted/Updated By Member. \n  Please check and validate ', '', 'info', 'active', '2020-04-30 22:37:03'),
(20, 1, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : test  <br>\n\n		Job Description : sdfsd  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-05-01 10:33:30'),
(21, 38, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : test  <br>\n\n		Job Description : sdfsd  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-05-01 10:33:33'),
(22, 36, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : test  <br>\n\n		Job Description : sdfsd  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-05-01 10:33:37'),
(23, 34, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : test  <br>\n\n		Job Description : sdfsd  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-05-01 10:33:40'),
(24, 32, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : test  <br>\n\n		Job Description : sdfsd  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-05-01 10:33:44'),
(25, 28, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : test  <br>\n\n		Job Description : sdfsd  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-05-01 10:33:47'),
(26, 27, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : test  <br>\n\n		Job Description : sdfsd  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-05-01 10:33:50'),
(27, 18, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : test  <br>\n\n		Job Description : sdfsd  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-05-01 10:33:53'),
(28, 9, 'Job Posted By Recruiter', '\n		Job Posted By Recruiter.<br>\n\n		Job Title : test  <br>\n\n		Job Description : sdfsd  <br>\n\n		Last Date to Apply : 27-08-2020  <br>\n\n		Please check <br> ', '', 'info', 'active', '2020-05-01 10:33:56'),
(29, 15, 'Your Application has been accepted by Recruiter', ' Dear Student .<br>  Your Application has been accepted by Recruiter <br> Please check your account <br> ', '', 'info', 'active', '2020-05-02 18:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(40) NOT NULL,
  `addressline2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
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
  `image` varchar(255) DEFAULT 'default.jpg',
  `status` enum('pending','approved','rejected') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `branch_id` int DEFAULT NULL,
  `payment_status` enum('pending','paid') NOT NULL DEFAULT 'pending',
  `image` varchar(255) DEFAULT 'default.jpg',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
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

INSERT INTO `users` (`id`, `username`, `password`, `type`, `status`, `created_at`) VALUES
(1, 'admin@talentick.com', '2138cb5b0302e84382dd9b3677576b24', 'admin', 'active', '2020-04-22 07:59:44');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department` (`department`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`recruiter`),
  ADD KEY `job type` (`job_type`),
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
  ADD PRIMARY KEY (`id`),
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recruiters`
--
ALTER TABLE `recruiters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `jobs_ibfk_4` FOREIGN KEY (`district_id`) REFERENCES `location_districts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `logid` FOREIGN KEY (`user`) REFERENCES `users` (`id`),
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
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
  ADD CONSTRAINT `recruiters_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
