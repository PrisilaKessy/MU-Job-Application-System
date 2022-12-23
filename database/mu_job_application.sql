-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 06:30 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mu_job_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `applicant_num` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `level` varchar(25) NOT NULL,
  `next_of_kin` varchar(50) NOT NULL,
  `next_of_kin_phone` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`applicant_num`, `address`, `level`, `next_of_kin`, `next_of_kin_phone`, `user_id`) VALUES
(8, 'P. o Box 19, Gairo.', 'Degree', 'George Sengana', '0764328910', 23),
(9, 'P. o Box 12, Gairo', 'Degree', 'George Emmanuel', '0768726834', 24),
(10, 'P. o Box 19, Gairo', 'Degree', 'George Emmanuel', '0766725614', 25),
(11, 'P. o Box 2345, Dar es Salaam', 'Degree', 'George', '0766543219', 26),
(12, 'Dar', 'Degree', 'George', '0768726834', 27);

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `application_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `app_status` varchar(25) NOT NULL DEFAULT 'processing',
  `cv` varchar(100) DEFAULT NULL,
  `certificate` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `applicant_id`, `post`, `date`, `app_status`, `cv`, `certificate`) VALUES
(15, 8, 6, '2022-06-06 18:10:33', 'proccessed', 'LOGIC.pdf', 'Generating Functions.pdf'),
(16, 9, 7, '2022-06-06 20:00:34', 'proccessed', 'LOGIC.pdf', 'GROUP - NYERERE - ICTM & ITS.pdf'),
(17, 10, 9, '2022-06-06 20:16:05', 'proccessed', 'LOGIC.pdf', 'Generating Functions.pdf'),
(18, 12, 9, '2022-06-08 15:54:59', 'proccessed', 'mu_arms_print_out_form2022-04-28.pdf', 'This is my cv.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `deptName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `faculty_id`, `deptName`) VALUES
(1, 10, 'COMPUTING SCIENCE STUDIES'),
(2, 11, 'DEPARTMENT OF LAW'),
(3, 10, 'DEPARTMENT OF MATHEMATICS'),
(4, 14, 'DEPARTMENT OF BUSINESS'),
(5, 15, 'USAFI'),
(6, 15, 'ULINZI'),
(7, 13, 'PUBLIC SERVICE AND HUMAN RESOURCE MANAGEMENT'),
(8, 13, 'LOCAL GOVERNEMENT MANAGEMENT'),
(9, 13, 'HEALTH SERVICE MANAGEMENT'),
(10, 17, 'TEACHING AND LEARNING ACTIVITIES DEPARTEMNT'),
(11, 17, 'SUPPORT SERVICE DEPARTEMNT'),
(12, 11, 'CONSTITUTIONAL AND ADMINSTRATIVE LAW'),
(13, 11, 'ECONOMIC LAW'),
(14, 11, 'CIVIL AND CRIMINAL LAW'),
(15, 11, 'INTERNATIONAL LAW'),
(16, 12, 'DEPARTEMNT OF ECONOMICS'),
(17, 12, 'LANGUAGES AND COMMUNICATION STUDIES'),
(18, 12, 'EDUCATIONAL FOUNDATIONAL AND TESTING MANAGEMENT'),
(19, 12, 'CENTRE FOR POPULATION STUDIES'),
(20, 10, 'ENGINEERING MANAGEMENT STUDIES'),
(21, 14, 'ACCOUNTING AND FINANCE'),
(22, 14, 'PROCUREMENT AND LOGISTICES MANAGEMENT'),
(23, 14, 'MARKETING AND ENTRERPRENEURSHIP');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`) VALUES
(10, 'FST'),
(11, 'FOL'),
(12, 'FSS'),
(13, 'SOPAM'),
(14, 'SOB'),
(15, 'SOCIAL'),
(16, 'DICT'),
(17, 'DQA');

-- --------------------------------------------------------

--
-- Stand-in structure for view `faculty_list`
-- (See below for the actual view)
--
CREATE TABLE `faculty_list` (
`faculty_name` varchar(50)
,`faculty_id` int(11)
,`dept_id` int(11)
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reason` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `application_id`, `user_id`, `status`, `date`, `reason`) VALUES
(16, 15, 17, 'selected', '2022-06-06 18:10:33', ''),
(17, 16, 17, 'not selected', '2022-06-06 20:00:34', ''),
(18, 17, 17, 'not selected', '2022-06-06 20:16:05', 'high comptition'),
(19, 17, 17, 'not selected', '2022-06-06 20:16:15', 'high comptition'),
(20, 18, 17, 'selected', '2022-06-08 15:37:36', ''),
(21, 18, 17, 'selected', '2022-06-08 15:54:59', '');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `jobtitle` varchar(70) NOT NULL,
  `description` varchar(250) NOT NULL,
  `required` int(25) NOT NULL,
  `available` char(3) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `dept_id`, `jobtitle`, `description`, `required`, `available`) VALUES
(5, 13, 'Tutorial Assistant', 'With 3.8 GPA', 2, 'yes'),
(6, 1, 'Tutorial Assistant', 'With 3.8', 4, 'yes'),
(7, 15, 'HR', 'Masters', 2, 'yes'),
(8, 16, 'Cleaner', 'With olevel', 10, 'yes'),
(9, 10, 'Assistant lecturer', 'With 3.0 GPA', 1, 'yes');

-- --------------------------------------------------------

--
-- Stand-in structure for view `post_list`
-- (See below for the actual view)
--
CREATE TABLE `post_list` (
`post_id` int(11)
,`faculty` int(11)
,`faculty_name` varchar(50)
,`deptName` varchar(100)
,`jobtitle` varchar(70)
,`description` varchar(250)
,`required` int(25)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `sex` char(1) NOT NULL,
  `phone` bigint(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `type` varchar(15) NOT NULL DEFAULT 'applicant',
  `is_admin` char(1) NOT NULL,
  `is_active` char(1) NOT NULL DEFAULT '1',
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `sex`, `phone`, `email`, `username`, `type`, `is_admin`, `is_active`, `password`) VALUES
(17, 'Raphia', 'Mzumbe', 'F', 626478346, 'lu@gmail.com', 'raphia', 'admin', '1', '1', '827ccb0eea8a706c4c34a16891f84e7b'),
(23, 'George', 'Emmanuel', 'M', 768726834, 'ehgets@gmail.com', 'george', 'applicant', '', '1', '827ccb0eea8a706c4c34a16891f84e7b'),
(24, 'Samira', 'Omary', 'F', 655420141, 'samira@gmail.com', 'samira', 'applicant', '', '1', '827ccb0eea8a706c4c34a16891f84e7b'),
(25, 'Mussa', 'Antony', 'M', 768726834, 'ehgets@gmail.com', 'mussa', 'applicant', '', '1', '827ccb0eea8a706c4c34a16891f84e7b'),
(26, 'Yasmin', 'Iddi', 'F', 626478346, 'yasmin@gmail.com', 'yasmin', 'applicant', '', '1', '827ccb0eea8a706c4c34a16891f84e7b'),
(27, 'Sesilia', 'Chalamila', 'F', 766531441, 'sesilia@gmail.com', 'sesi', 'applicant', '', '1', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Structure for view `faculty_list`
--
DROP TABLE IF EXISTS `faculty_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `faculty_list`  AS  select `faculty`.`faculty_name` AS `faculty_name`,`faculty`.`faculty_id` AS `faculty_id`,`department`.`dept_id` AS `dept_id`,count(0) AS `total` from ((`faculty` join `department`) join `post`) where ((`department`.`faculty_id` = `faculty`.`faculty_id`) and (`post`.`dept_id` = `department`.`dept_id`) and (`post`.`available` = 'yes')) group by `faculty`.`faculty_name` ;

-- --------------------------------------------------------

--
-- Structure for view `post_list`
--
DROP TABLE IF EXISTS `post_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_list`  AS  select `post`.`post_id` AS `post_id`,`faculty`.`faculty_id` AS `faculty`,`faculty`.`faculty_name` AS `faculty_name`,`department`.`deptName` AS `deptName`,`post`.`jobtitle` AS `jobtitle`,`post`.`description` AS `description`,`post`.`required` AS `required` from ((`faculty` join `department`) join `post`) where ((`department`.`faculty_id` = `faculty`.`faculty_id`) and (`post`.`dept_id` = `department`.`dept_id`) and (`post`.`available` = 'yes')) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`applicant_num`),
  ADD KEY `applicant_user` (`user_id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `application_applicant` (`applicant_id`),
  ADD KEY `application_department` (`post`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `department_faculty` (`faculty_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `feedback_application` (`application_id`),
  ADD KEY `feedback_user` (`user_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `department_post_fk` (`dept_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `applicant_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `applicant_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_applicant` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`applicant_num`) ON UPDATE CASCADE,
  ADD CONSTRAINT `application_department` FOREIGN KEY (`post`) REFERENCES `post` (`post_id`) ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_faculty` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_application` FOREIGN KEY (`application_id`) REFERENCES `application` (`application_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `department_post_fk` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
