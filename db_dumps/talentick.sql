-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 11, 2020 at 02:58 PM
-- Server version: 8.0.20-0ubuntu0.20.04.1
-- PHP Version: 7.3.19-1+ubuntu20.04.1+deb.sury.org+1

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
(14, 'Electrical and Electronics', 3),
(15, 'Electronics & Communications', 1),
(16, 'Nano Technology', 1);

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
  `job_title` varchar(100) NOT NULL,
  `job_description` text NOT NULL,
  `job_type` int NOT NULL,
  `district_id` int NOT NULL,
  `qualified_branches` text,
  `CGPA_min` double NOT NULL,
  `backlog_count` int NOT NULL,
  `salary_min` double NOT NULL,
  `salary_max` double NOT NULL,
  `vacancies` tinyint(1) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `last_date_to_apply` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `recruiter`, `job_title`, `job_description`, `job_type`, `district_id`, `qualified_branches`, `CGPA_min`, `backlog_count`, `salary_min`, `salary_max`, `vacancies`, `status`, `last_date_to_apply`, `created_at`) VALUES
(1, 1, 'Coding', 'core php codeing', 1, 6, '[\"9\"]', 60, 2, 12000, 15000, 10, 'active', '2020-07-24', '2020-07-10 08:00:46'),
(2, 2, 'Testing', 'testing', 1, 13, '[\"9\"]', 60, 2, 12000, 15000, 10, 'active', '2020-07-24', '2020-07-10 08:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int NOT NULL,
  `user` int NOT NULL,
  `job` int NOT NULL,
  `status` enum('pending','accepted','rejected') NOT NULL DEFAULT 'pending',
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
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
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
  `district` varchar(35) NOT NULL,
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
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `action_link` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `type` enum('info','warning','error') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'info',
  `status` enum('active','inactive') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user`, `title`, `description`, `action_link`, `type`, `status`, `created_at`) VALUES
(1, 1, 'New Student Registered', 'New Student Registerd in Portal.', '', 'info', 'active', '2020-07-10 07:55:10'),
(2, 1, 'New Recruiter Registered', 'New Recruiter Registerd in Portal.\n Please check & verify', '', 'info', 'active', '2020-07-10 07:56:46'),
(3, 1, 'Job Posted By Recruiter', '\r\n		Job Posted By Recruiter.<br>\r\n\r\n		Job Title : Coding  <br>\r\n\r\n		Job Description : core php codeing  <br>\r\n\r\n		Last Date to Apply : 2020-07-24  <br>\r\n\r\n		Please check <br> ', '', 'info', 'active', '2020-07-10 08:00:47'),
(4, 3, 'Your Profile has been approved by Talentick Admin', '\n		Dear MAXIMPROF<br>\n		Your Profile has been approved by Talentick Admin <br> ', '', 'info', 'active', '2020-07-10 10:20:26'),
(5, 3, 'Your Profile has been approved by Talentick Admin', '\n		Dear MAXIMPROF<br>\n		Your Profile has been approved by Talentick Admin <br> ', '', 'info', 'active', '2020-07-10 10:23:42'),
(6, 3, 'Your Profile has been approved by Talentick Admin', '\n		Dear MAXIMPROF<br>\n		Your Profile has been approved by Talentick Admin <br> ', '', 'info', 'active', '2020-07-10 10:25:56'),
(7, 3, 'Your Profile has been approved by Talentick Admin', '\n		Dear MAXIMPROF<br>\n		Your Profile has been approved by Talentick Admin <br> ', '', 'info', 'active', '2020-07-10 10:26:53'),
(8, 3, 'Your Profile has been approved by Talentick Admin', '\n		Dear MAXIMPROF<br>\n		Your Profile has been approved by Talentick Admin <br> ', '', 'info', 'active', '2020-07-10 10:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `reciept` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_id` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_id` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `signature` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(40) DEFAULT NULL,
  `addressline2` varchar(50) DEFAULT NULL,
  `state_id` int NOT NULL,
  `district_id` int NOT NULL,
  `pincode` int NOT NULL,
  `cgpa` float DEFAULT NULL,
  `gpg` float DEFAULT NULL,
  `gug` float DEFAULT NULL,
  `gplus` float DEFAULT NULL,
  `g10` float DEFAULT NULL,
  `backlogs` int DEFAULT NULL,
  `sslc_certificate` text,
  `highersecondary_certificate` text,
  `resume` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `student_id`, `dob`, `address`, `addressline2`, `state_id`, `district_id`, `pincode`, `cgpa`, `gpg`, `gug`, `gplus`, `g10`, `backlogs`, `sslc_certificate`, `highersecondary_certificate`, `resume`) VALUES
(1, 1, '2001-11-28', 'shiva', 'ssss', 13, 5, 859623, 85, NULL, 0, 85, 55, 0, 'U1NMQ19hYWEucGRmMg==.pdf', 'YWFhLnBkZjI=.pdf', 'YWFhLnBkZjI=.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `recruiters`
--

CREATE TABLE `recruiters` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `website` text,
  `phone` varchar(15) NOT NULL,
  `address` varchar(40) NOT NULL,
  `license` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `image` varchar(255) DEFAULT 'default.jpg',
  `license_file` text,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruiters`
--

INSERT INTO `recruiters` (`id`, `user_id`, `company_name`, `email`, `website`, `phone`, `address`, `license`, `city`, `pincode`, `image`, `license_file`, `status`, `created_at`) VALUES
(1, 3, 'MAXIMPROF', 'sreekuttan@maximprof.com', 'https://maximprof.com', '8956232562', 'MACIMPROF', 'tcs5263698526', 'dubai', '256369', 'default.jpg', 'TElDRU5TRV9hYWEucGRmMw==.pdf', 'approved', '2020-07-10 07:56:46'),
(2, 4, 'SYSNATURA', 'info@sysnatura.com', 'https://sysnatura.com', '8956232562', 'SYSNATURA', 'tcs5263698526', 'dubai', '256369', 'default.jpg', 'TElDRU5TRV9hYWEucGRmMw==.pdf', 'approved', '2020-07-10 07:56:46');

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
  `gender` enum('Male','Female','Other') DEFAULT 'Other',
  `branch_id` int DEFAULT NULL,
  `payment_status` enum('pending','paid') NOT NULL DEFAULT 'pending',
  `payment_id` varchar(100) DEFAULT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `payment_date` varchar(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'default.jpg',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `firstname`, `lastname`, `mobile_number`, `gender`, `branch_id`, `payment_status`, `payment_id`, `payment_method`, `payment_date`, `image`, `created_at`) VALUES
(1, 2, 'sruthy', 'kumar', '8956230236', 'Female', 9, 'paid', 'pay_FCiYnJ2sIMohAn', 'card', '2020-07-10', 'U1RVREVOVF9wbHVzIHR3by5qcGcy.jpg', '2020-07-10 07:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int NOT NULL,
  `user` int NOT NULL,
  `user_type` enum('student','recruiter') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('approved','pending','rejected') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
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
  `password` varchar(100) NOT NULL,
  `type` enum('admin','recruiter','student','guest') NOT NULL DEFAULT 'guest',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`, `status`, `created_at`) VALUES
(1, 'admin@talentick.com', '2138cb5b0302e84382dd9b3677576b24', 'admin', 'active', '2020-05-31 08:00:17'),
(2, 'sruthyskumar@mca.ajce.in', '2138cb5b0302e84382dd9b3677576b24', 'student', 'active', '2020-07-10 07:55:10'),
(3, 'sreekuttan@maximprof.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', 'active', '2020-07-10 07:56:46'),
(4, 'hareez@sysnatura.com', '2138cb5b0302e84382dd9b3677576b24', 'recruiter', 'active', '2020-07-10 07:56:46');

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reciept` (`reciept`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recruiters`
--
ALTER TABLE `recruiters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`job_type`) REFERENCES `job_types` (`id`),
  ADD CONSTRAINT `jobs_ibfk_4` FOREIGN KEY (`district_id`) REFERENCES `location_districts` (`id`);

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
  ADD CONSTRAINT `location_districts_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `location_states` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `profiles_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `location_districts` (`id`),
  ADD CONSTRAINT `profiles_ibfk_3` FOREIGN KEY (`state_id`) REFERENCES `location_states` (`id`);

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
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`);

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
