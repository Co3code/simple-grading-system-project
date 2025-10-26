-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2025 at 03:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grading_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@ckcgingoog.edu.ph', '$2y$10$Q8algaS.NC4LBq/KMsKK2u.gJGmcQumIkp/IvNF2NVB8BmuhFhrLq');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `id_number` varchar(20) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `first_name`, `last_name`, `id_number`, `password`, `gender`, `email`, `phone_number`, `created_at`) VALUES
(2, 'Elizabeth', 'Rebonza', 'CF-102532', '$2y$10$tq9Cd2ltNJ4gcHelUvwCvOR9n0yKk9wNHvWbqKxrTOzzh6HOTj2TS', 'Female', 'elizabethrebonza@gmail.com', '0966356587', '2025-10-12 02:29:59'),
(3, 'Joshua', 'Atis', 'CF-102420', '$2y$10$F8MBTptkXhU98otOM9EspumsOB.El2C9tlDsBn6Hou.caW1sNwYyu', 'Male', 'joshuaAtis@ckcgingoog.edu.ph', '0952648976', '2025-10-12 03:43:27'),
(5, 'Calvin Joshua', 'Kiunisala', 'CF-102418', '$2y$10$BU1RVucUHBjaCtIi2IZiB.dC3ZtxFi8LHEiqjkRyx.OGCeCqDT5Ye', 'Male', 'calvin@gmail.com', '0963548975', '2025-10-12 04:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `grading`
--

CREATE TABLE `grading` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `prelim` varchar(10) DEFAULT NULL,
  `midterm` varchar(10) DEFAULT NULL,
  `finals` varchar(10) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grading`
--

INSERT INTO `grading` (`id`, `subject_id`, `student_id`, `prelim`, `midterm`, `finals`, `status`) VALUES
(26, 1, 37, '90', '94', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `receiver_id` varchar(50) NOT NULL,
  `sender_id` varchar(50) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `receiver_id`, `sender_id`, `title`, `message`, `link`, `is_read`, `created_at`) VALUES
(1, '2', '3', 'New Grade Posted', 'Your grade in Data Warehousing for finals has been posted by your instructor.', '/subjectGrade/4', 0, '2025-10-14 14:06:18'),
(2, '37', '3', 'New Grade Posted', 'Your grade in Computer Programming 1 for prelim has been posted by your instructor.', '/subjectGrade/1', 1, '2025-10-14 17:59:23'),
(3, '37', '3', 'New Grade Posted', 'Your grade in Computer Programming 1 for midterm has been posted by your instructor.', '/subjectGrade/1', 1, '2025-10-15 01:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `parent_login_attempts`
--

CREATE TABLE `parent_login_attempts` (
  `id` int(11) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `attempts` int(11) NOT NULL DEFAULT 0,
  `last_attempt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reject_archive`
--

CREATE TABLE `reject_archive` (
  `id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `origin` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reject_archive`
--

INSERT INTO `reject_archive` (`id`, `id_number`, `subject_id`, `origin`, `created_at`) VALUES
(1, 2, 3, 'student', '2025-10-14 05:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `year_level` tinyint(4) DEFAULT NULL,
  `id_number` varchar(10) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  `verification_code` varchar(255) DEFAULT NULL,
  `verification_created_at` datetime DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `security_question` varchar(255) NOT NULL,
  `security_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `middle_name`, `last_name`, `suffix`, `year_level`, `id_number`, `phone_number`, `email`, `password`, `is_verified`, `verification_code`, `verification_created_at`, `created_at`, `security_question`, `security_answer`) VALUES
(36, 'Elizabeth', NULL, 'Rebonza', NULL, NULL, 'C23-0139', NULL, 'elizabethrebonza@ckcgingoog.edu.ph', '$2y$10$BltPJ0CvGbF94WX8NN/h/.gLp7v5PTOpqS2zssN.bi9rpDmERNcGS', 1, NULL, '2025-10-15 00:41:31', '2025-10-14 16:41:31', 'What is the name of your first pet?', '$2y$10$lpmBWzLyOWkP.o56PzHqN.90Oi9DpkBlB8G4QJLcdQZAqL.amF6S2'),
(37, 'Cris Martin', NULL, 'Tirariray', NULL, NULL, 'C23-0149', NULL, 'crismartintirariray@ckcgingoog.edu.ph', '$2y$10$pFoyio/NIfTOt4FFZsFNleIb1IuXGxNuvAwNpDJcEN5g9ZzlJuBHe', 1, NULL, '2025-10-15 01:53:22', '2025-10-14 17:53:22', 'What was your first car?', '$2y$10$3ObP9jRzD/dzbPHI0KHTmezO79q7OwavAxXbWrr5gewbYJuWvGQ4S'),
(38, 'Patrick John', 'Dy', 'Sagrado', NULL, 3, 'C23-0374', '09202940386', 'psagrado@ckcgingoog.edu.ph', '$2y$10$YCnpYFRvhDxC3vOa5JEAluKF/8Ah2gWQkjiYD12mj9ugnQ/Sh.1lm', 1, NULL, '2025-10-15 20:02:02', '2025-10-15 12:02:02', 'What was your first car?', '$2y$10$Azj9erxFMny0VoTEjaEfVOaWNpePDdQ/g43s0cvkp910QdZH2llcm'),
(39, 'Test', 'Test', 'Test', NULL, 3, 'C23-0123', '09202940385', '1@ckcgingoog.edu.ph', '$2y$10$Q8algaS.NC4LBq/KMsKK2u.gJGmcQumIkp/IvNF2NVB8BmuhFhrLq', 1, NULL, '2025-10-15 20:51:13', '2025-10-15 12:51:13', 'What is your mother\'s maiden name?', '$2y$10$dGWeNv1cG8Q2rnxVH6olZ.c3M6WWtVsYYORQQABHD.fCdbVcgaUW2');

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_subject`
--

INSERT INTO `student_subject` (`id`, `student_id`, `subject_id`, `status`, `created_at`) VALUES
(20, 37, 4, 'pending', '2025-10-14 17:53:51'),
(21, 37, 1, 'approved', '2025-10-14 17:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `year_level` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `credit_units` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_name`, `year_level`, `semester`, `credit_units`) VALUES
(1, 'IT101', 'Computer Programming 1', '1st Year', '1st Semester', 3),
(2, 'IT303', 'Networking 2', '3rd Year', '1st Semester', 3),
(3, 'IT201', 'Networking 1', '1st Year', '1st Semester', 3),
(4, 'IT305', 'Data Warehousing', '3rd Year', '1st Semester', 2);

-- --------------------------------------------------------

--
-- Table structure for table `subject_allocations`
--

CREATE TABLE `subject_allocations` (
  `id` int(11) NOT NULL,
  `subject_id` varchar(20) NOT NULL,
  `faculty_id` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_allocations`
--

INSERT INTO `subject_allocations` (`id`, `subject_id`, `faculty_id`, `status`, `created_at`) VALUES
(4, '3', '3', 'Approved', '2025-10-12 04:10:36'),
(5, '1', '3', 'Approved', '2025-10-12 04:30:27'),
(6, '4', '3', 'Approved', '2025-10-13 18:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `temp_registrations`
--

CREATE TABLE `temp_registrations` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `id_number` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `verification_code` varchar(6) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `grading`
--
ALTER TABLE `grading`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_login_attempts`
--
ALTER TABLE `parent_login_attempts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_number` (`id_number`),
  ADD KEY `id_number_2` (`id_number`);

--
-- Indexes for table `reject_archive`
--
ALTER TABLE `reject_archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `username` (`id_number`),
  ADD KEY `idx_phone_number` (`phone_number`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `subject_allocations`
--
ALTER TABLE `subject_allocations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `temp_registrations`
--
ALTER TABLE `temp_registrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grading`
--
ALTER TABLE `grading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parent_login_attempts`
--
ALTER TABLE `parent_login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `reject_archive`
--
ALTER TABLE `reject_archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `student_subject`
--
ALTER TABLE `student_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject_allocations`
--
ALTER TABLE `subject_allocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `temp_registrations`
--
ALTER TABLE `temp_registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grading`
--
ALTER TABLE `grading`
  ADD CONSTRAINT `grading_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `grading_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`);

--
-- Constraints for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD CONSTRAINT `student_subject_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `student_subject_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
